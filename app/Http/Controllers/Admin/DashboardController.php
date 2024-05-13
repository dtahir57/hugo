<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all()->count();
        $users = User::doesntHave('roles')->get()->count();
        return view('admin.dashboard', compact('opportunities', 'users'));
    }
}
