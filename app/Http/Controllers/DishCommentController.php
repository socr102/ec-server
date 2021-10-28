<?php

namespace App\Http\Controllers;

use App\DishComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishCommentController extends Controller
{
    public function index($id)
    {
        $comments = DishComment::where(['dish_id' => $id])->orderBy('created_at', 'DESC')->get();

        if (Auth::user()->role->roles == 'home-chef') {
            return view('home.home-chef.dish.dish', ['comments' => $comments, 'id' => $id]);
        } else {
            return view('home.customer.dish.dish', ['comments' => $comments, 'id' => $id]);
        }
    }

    public function create(Request $request, $id)
    {
        $comment = DishComment::create([
            'user_id' => Auth::user()->id,
            'dish_id' => $id,
            'comment' => $request->comment
        ]);

        if (Auth::user()->role->roles == 'home-chef') {
            return redirect()->route('home.home-chef.dish.dish', ['id' => $id])->with('success', 'comment added');
        } else {
            return redirect()->route('home.customer.dish.dish', ['id' => $id])->with('success', 'comment added');
        }
    }
}
