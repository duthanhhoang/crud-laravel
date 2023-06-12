<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = \App\Models\User::all();
        return view('user.list', compact('users'));
    }

    public function show($id)
    {
        $user = \App\Models\User::find($id);
        return view('user.detail', compact('user'));
    }
}
