<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\outlet;
use App\Models\member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = user::all()->count();
        $outlet = outlet::all()->count();
        $member = member::all()->count();

        return view('dashboard', ['user' => $user, 'outlet' => $outlet, 'member' => $member, ]);
    }
}
