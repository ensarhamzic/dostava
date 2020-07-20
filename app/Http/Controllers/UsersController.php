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
        $oneUser = User::find($id);
        $roles = Role::all();

        return view('admin/manage', [
            'oneUser' => $oneUser,
            'roles' => $roles
        ]);
    }

    public function update($id, Request $request) {
        $user = User::find($id);
        $adminRole = $request->admin;
        $moderatorRole = $request->moderator;
        $userRole = $request->user;

        $data = [$adminRole, $moderatorRole, $userRole];

        foreach($data as $role) {
            if($role != null){
                if(! $user->roles->pluck('id')->contains($role)){
                    $user->roles()->attach($role);
                }
            }
        }

    }
}
