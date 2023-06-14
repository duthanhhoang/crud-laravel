<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $nameSort = $request->input('name-sort');
        if($search == "")
            $users = \App\Models\User::all();
        else
            $users = User::where('name','LIKE','%'.$search.'%')->get();

        if($nameSort == "asc")
            $users = User::orderBy('name','asc')->get();
        elseif ($nameSort == "desc")
            $users = User::orderBy('name','desc')->get();

        return view('user.list', compact('users','search'));
    }

    public function show($id)
    {
        $user = \App\Models\User::find($id);
        return view('user.detail', compact('user'));
    }

}
