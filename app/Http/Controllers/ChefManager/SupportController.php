<?php

namespace App\Http\Controllers\ChefManager;

use App\Help;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $helps = Help::orderBy('created_at', 'desc')->get();

        $data = [
            'helps' => $helps
        ];
        return view('home.chef-manager.customer-support', $data);
    }

    public function show(Help $help)
    {
        $data = [
            'help' => $help
        ];
        return view('home.chef-manager.support-details', $data);
    }
}
