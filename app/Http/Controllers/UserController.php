<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function storePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $user = User::find(auth()->user()->id);

            if ($request->has('photo')) {

                // Remove Old Photo
                $pathOldFile = 'user_photo/' . $user->photo;
                if ($user->photo != "default.jpg" && Storage::disk('public')->exists($pathOldFile)) {
                    Storage::disk('public')->delete($pathOldFile);
                }

                $userPhoto = $user->id . '_user' . time() . '.' . request()->photo->getClientOriginalExtension();

                $request->photo->storeAs('public/user_photo', $userPhoto);

                $user->photo = $userPhoto;
                $user->save();
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }

        return redirect()->back();
    }
}
