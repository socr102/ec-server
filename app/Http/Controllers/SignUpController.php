<?php

namespace App\Http\Controllers;

use App\Role;
use App\Title;
use App\User;
use App\UserAddress;
use App\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SignUpController extends Controller
{
    /**
     * Signup user customer.
     * if request get show page
     * if request post validate request to add user
     */
    public function signUpCustomer(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
            ]);

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);

            //make role user
            Role::create([
                'roles' => 'customer',
                'user_id' => $user->id
            ]);

            Auth::login($user);

            return redirect('home/customer');
        }
        return view('auth.signup.customer');
    }


    public function showFormSignUpHomeChef()
    {
        $session = session()->get('sign_up_sociallite');
        $data = [
            'username' => isset($session['user']) ? $session['user']->name : "",
            'email' => isset($session['user']) ? $session['user']->email : "",
        ];

        return view('auth.signup.homechef.step-1', $data);
    }

    public function validateFormUserAccount(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        return true;
    }

    public function validateFormUserAddress(Request $request)
    {
        $request->validate([
            'address_line_1' => 'required|string',
            'address_line_2' => 'required|string',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'country' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
        ]);

        return true;
    }

    public function validateFormUserBankAccount(Request $request)
    {
        $request->validate([
            'bank_account_holder_name' => 'required|string',
            'account_number' => 'required',
            'routing_number' => 'required',
            'iban_number' => 'required',
        ]);

        return true;
    }

    public function signUpHomeChef(Request $request)
    {
        DB::beginTransaction();
        try {

            $dataSignUp = json_decode($request->all()['dataSignUp']);

            // dataSignup have value => step0, step1, step2 (ex : $dataSignUp->step0)
            // step0 => data user, step1 => data address, step2 => data bank

            // search id title of newbie
            $title = Title::where('name', 'like', '%Newbie%')->first();

            // get session from sociallite and checking if email from sociallite is same with field
            $session = session()->get('sign_up_sociallite');
            if (isset($session['user'])) {
                if ($session['user']->email !== $dataSignUp->step0[2]->value) {
                    session()->forget('sign_up_sociallite');
                }
            }

            // create user
            $user = User::create([
                    'username' => $dataSignUp->step0[1]->value,
                    'email' => $dataSignUp->step0[2]->value,
                    'title_id' => $title->id ?? 0,
                    'password' => bcrypt($dataSignUp->step0[3]->value),
                    'provider' => isset($session['provider']) ? $session['provider'] : null,
                    'provider_id' => isset($session['user']) ? $session['user']->id : null
                ]);

            // make role user
            Role::create([
                'roles' => 'home-chef',
                'user_id' => $user->id
            ]);

            // // create address user
            // UserAddress::create([
            //     'user_id' => $user->id,
            //     'address_line_1' => $dataSignUp->step1[1]->value,
            //     'address_line_2' => $dataSignUp->step1[2]->value,
            //     'phone_number' => $dataSignUp->step1[3]->value,
            //     'country' => $dataSignUp->step1[4]->value,
            //     'city' => $dataSignUp->step1[5]->value,
            //     'zipcode' => $dataSignUp->step1[6]->value,
            // ]);

            // // create bank user
            // UserBank::create([
            //     'user_id' => $user->id,
            //     'bank_account_name' => $dataSignUp->step2[1]->value,
            //     'account_number' => $dataSignUp->step2[2]->value,
            //     'routing_number' => $dataSignUp->step2[3]->value,
            //     'iban_number' => $dataSignUp->step2[4]->value,
            // ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }


        //make user login
        Auth::login($user);

        return redirect()->route('home.home-chef.leaderboard');
    }



    public function showFormSignUpChefManager()
    {
        return view('auth.signup.chefmanager.step-1');
    }

    public function signUpChefManager(Request $request)
    {
        DB::beginTransaction();
        try {

            $dataSignUp = json_decode($request->all()['dataSignUp']);

            // dataSignup have value => step0, step1 (ex : $dataSignUp->step0)
            // step0 => data user, step1 => data address

            // create user
            $user = User::create([
                'username' => $dataSignUp->step0[1]->value,
                'email' => $dataSignUp->step0[2]->value,
                'password' => bcrypt($dataSignUp->step0[3]->value)
            ]);

            // make role user
            Role::create([
                'roles' => 'chef-manager',
                'user_id' => $user->id
            ]);

            // // create address user
            // UserAddress::create([
            //     'user_id' => $user->id,
            //     'address_line_1' => $dataSignUp->step1[1]->value,
            //     'address_line_2' => $dataSignUp->step1[2]->value,
            //     'country' => $dataSignUp->step1[3]->value,
            //     'city' => $dataSignUp->step1[4]->value,
            //     'zipcode' => $dataSignUp->step1[5]->value,
            // ]);

            //make user login
            Auth::login($user);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }

        return redirect()->route('home.chef-manager.notification.list');
    }
}
