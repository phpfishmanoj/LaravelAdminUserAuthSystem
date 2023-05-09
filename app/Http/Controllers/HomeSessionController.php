<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeSessionController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
}
