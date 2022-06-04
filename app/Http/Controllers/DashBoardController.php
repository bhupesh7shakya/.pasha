<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.index');
        // return view('admin.dashboard.index');
    }
}
