<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = \App\Models\User::count();
        $totalProducts = \App\Models\Product::count();

        return view('admin.dashboard', compact('totalUsers', 'totalProducts'));
    }
}
