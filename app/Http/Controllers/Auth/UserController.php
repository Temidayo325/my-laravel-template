<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
     {
        $user = \App\Models\User::where('email', auth()->user()->email)->first();
        return view('auth-user.dashboard' , ['data' => $user]);
     }
}