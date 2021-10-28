<?php

namespace App\Http\Controllers\ChefManager;

use App\Http\Controllers\Controller;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        $user = $request->user;
        $data = [
            'users' => User::getCustomer()->when($user, function ($query, $user) {
                return $query->where('username','like',"%{$user}%");
            })->get()
        ];
        return view('home.chef-manager.list.users', $data);
    }

    public function getHomeChef(Request $request)
    {
        $user = $request->user;
        $data = [
            'users' => User::getHomeChef()->when($user, function ($query, $user) {
                return $query->where('username', 'like', "%{$user}%");
            })->get()
        ];
        return view('home.chef-manager.list.home-chefs', $data);
    }

    public function promote(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            if (!$user->IsBasicChef) {
                $title = Title::where('name', 'Basic Chef')->first();
                $user->title_id = $title->id;
                $user->save();

                DB::commit();
                return redirect()->back()->with('success', "Chef $user->username has been promoted to $title->name");
            }

        } catch (\Exception $ex) {
            DB::rollback();
        }

        return redirect()->back()->with('error', "Whoops, looks like something went wrong.");
    }

    public function destroyUser(Request $request)
    {
        DB::beginTransaction();
        try {

            if($request->userId) {
                $user = User::findOrFail($request->userId);
                $user->delete();
                DB::commit();
                return redirect()->back()->with('success', "$user->username has been deleted");
            }

        } catch (\Exception $ex) {
            DB::rollback();
        }

        return redirect()->back()->with('error', "Whoops, looks like something went wrong.");
    }
}
