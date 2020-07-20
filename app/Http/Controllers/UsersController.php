<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin/manage');
    }

    public function show(Request $request)
    {
        $email = $request->email;
        $users = User::where('email', $email)->orWhere('email', 'like', $email . '%')->get();
        return view('admin/manage', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $oneUser = User::find($id);
        $roles = Role::all();

        return view('admin/manage', [
            'oneUser' => $oneUser,
            'roles' => $roles
        ]);
    }

    public function update($id, Request $request)
    {
        $newRoles = $request->roles;
        $user = User::find($id);

        $user->roles()->sync($newRoles);

        Session::flash('success', 'Uspesno izmenjena uloga');

        return redirect(route('admin.manage.user', $user));
    }
}
