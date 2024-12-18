<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user_name = $user->name;
        
        return view('Dashboard.dashboard', compact('user_name'));
    }
}
