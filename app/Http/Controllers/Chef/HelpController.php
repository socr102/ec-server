<?php

namespace App\Http\Controllers\Chef;

use App\Help;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpController extends Controller
{
    public function index()
    {
        $categories = Help::$categories;

        $data = [
            'categories' => $categories
        ];
        return view('home.home-chef.help-me', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'problem' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $help = new Help();
            $help->user_id = auth()->user()->id;
            $help->category = $request->category;
            $help->problem = $request->problem;
            $help->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
        }

        return redirect()->back()->with('success', 'Added!');
    }
}
