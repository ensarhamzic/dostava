<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function index(){
        return view('admin/manage');
    }

    public function show(Request $request){
        $email = $request->email;
        $users = User::where('email', $email)->orWhere('email', 'like', $email .'%')->get();
        return view('admin/manage', [
            'users' => $users
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        $roles = $user->roles;
    }
}
