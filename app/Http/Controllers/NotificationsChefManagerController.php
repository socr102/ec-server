<?php

namespace App\Http\Controllers;

use App\ApprovalDish;
use App\Dish;
use App\Mail\ManagerAcceptDishMail;
use App\Mail\ManagerDeclineDishMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationsChefManagerController extends Controller
{
    public function index()
    {
        $listNotification = ApprovalDish::where(['status' => 'Pending'])->orderBy('created_at', 'desc')->get();
        return view('home.chef-manager.notification.list', ['listNotification' => $listNotification]);
    }

    public function tasteApproval(ApprovalDish $approvalDish)
    {
        return view('home.chef-manager.notification.taste-approval', ['dish' => $approvalDish]);
    }

    public function tasteApprovalDish(Request $request)
    {
        DB::beginTransaction();
        try {
            $approval = ApprovalDish::where(['id_approval_dish' => $request->id_approval])->firstOrFail();
            $approval->status = $request->status;
            $approval->approval_message = $request->message;
            $approval->approval_at = date("Y-m-d H:i:s");
            $approval->approval_by_user_id = Auth::user()->id;
            $approval->save();

            //set dish
            $dish = Dish::where(['id_dish' => $approval->dish_id])->first();
            $dish->approve = $request->status;
            $dish->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }

        if ($approval instanceof ApprovalDish) {
            if ($request->status === 'Accepted') {
                Mail::to($dish->chef->email)->send(new ManagerAcceptDishMail($approval));
            } else {
                Mail::to($dish->chef->email)->send(new ManagerDeclineDishMail($approval));
            }
        }

        return redirect()->route('home.chef-manager.notification.list')->with('success', $request->status . ' Dish Successfully');
    }
}
