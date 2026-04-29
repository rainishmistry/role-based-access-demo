<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 1)->count();
        $inactiveUsers = User::where('status', 0)->count();
        return view('admin.dashboard', ['totalUsers' => $totalUsers, 'activeUsers' => $activeUsers, 'inactiveUsers' => $inactiveUsers]);
    }
}
