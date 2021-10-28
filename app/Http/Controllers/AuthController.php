<?php

namespace App\Http\Controllers;

use App\Title;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            //Login Success
            return redirect()->route($this->checkRoleRoute());
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $data = [
                'email'     => $request->input('email'),
                'password'  => $request->input('password'),
            ];

            Auth::attempt($data);

            if (Auth::check()) {

                $user = Auth::user();
                if(!$user->title_id) {
                    $title = Title::where('name', 'like', '%Newbie%')->first();
                    $user->title_id = $title->id;
                    $user->save();
                }
                //Login Success
                return redirect()->route($this->checkRoleRoute());
            } else {
                //Login Fail
                return redirect()->back()->withInput()->with('error', 'Your Email and password do not match our records');
            }
        }
        return redirect()->back()->withInput();
    }


    public function logout()
    {
        Auth::logout(); // delete active session
        return redirect()->route('login');
    }

    /**
     * check role user login
     * then return their home route
     *
     */
    private function checkRoleRoute()
    {
        if (Auth::user()->role->roles == 'customer') {
            return 'home.customer.dish-list';
        }else if(Auth::user()->role->roles == 'home-chef'){
            return 'home.home-chef.leaderboard';
        }else if(Auth::user()->role->roles == 'chef-manager'){
            return 'home.chef-manager.notification.list';
        }else{
            return 'login';
        }
    }

    public function redirectToProvider(Request $request, $provider)
    {
        // remove session from register
        $request->session()->forget('sign_up_sociallite');

        $request->session()->put('role_type', $request->role);
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $roleType = session()->get('role_type');
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider, $roleType);
        Auth::login($authUser, true);
        return redirect('/');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider, $roleType = 'customer')
    {
        DB::beginTransaction();
        try {
            $authUser = User::where('provider_id', $user->id)
                ->when($user->email, function ($query, $email) {
                    $query->orWhere('email', $email);
                })->whereHas('role', function (Builder $query) use ($roleType){
                    $query->where('roles', $roleType);
                })->first();

            if ($authUser) {
                $authUser->provider = $provider;
                $authUser->provider_id = $user->id;
                $authUser->save();
            } else {

                // register home-chef
                if ($roleType === "home-chef") {
                    $data = [
                        'provider' => $provider,
                        'user' => $user
                    ];
                    session()->put('sign_up_sociallite', $data);

                    // force redirect
                    return redirect()->route('signup.homechef')->send();
                } else {
                    $authUser = User::create([
                        'username' => $user->name,
                        'email'    => !empty($user->email) ? $user->email : '',
                        'provider' => $provider,
                        'provider_id' => $user->id
                    ]);

                    //make role user
                    $authUser->role()->create([
                        'roles' => 'customer',
                        'user_id' => $user->id
                    ]);
                }
            }

            DB::commit();
            return $authUser;

        } catch (\Exception $ex) {
            DB::rollback();
        }

        if($user->email) {
            $message = "This email {$user->email} is already being used, please try to use register with email.";
        } else {
            $message = "This email address is already being used, please try to use register with email.";
        }

        return redirect()->route('login')->with('error', $message)->send();
    }

}
