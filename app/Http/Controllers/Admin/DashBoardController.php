<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        $data['no_of_orders'] = Order::all()->where('is_confirmed', '=', 1)->count();
        $data['no_of_consumer'] = User::all()->where('isAdmin', 0)->count();
        $order = Order::with('product')
            ->where('is_confirmed', '=', 1);
        $data['completed'] = $order
            ->where('status', '=', 'completed')
            ->count();
        $data['pending'] = $order
            ->where('status', '=', 'pending')
            ->count();
        $data['orders'] = Order::all()->where('is_confirmed', '=', 1);
        // return $data;
        return view('admin.dashboard.index', compact('data'));
        // return view('admin.dashboard.index');
    }
}
