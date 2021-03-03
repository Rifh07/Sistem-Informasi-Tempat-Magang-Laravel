<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createUsersViews()
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            return view('users.create-admin');
        else :
            abort(404);
        endif;
    }

    public function createUsers(Request $request)
    {
        $role = \Auth::user()->role;
        if ($role == "Admin") :
            $this->validate($request, [
                'username' => ['required', 'string', 'max:15', 'unique:users'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'role' => ['required', 'string', 'max:20'],
                'telp' => ['required', 'string', 'max:13'],
                'alamat' => ['required', 'string', 'max:200'],
            ]);
            
            User::create([
                'username' => $request['username'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['telp']),
                'role' => $request['role'],
                'telp' => $request['telp'],
                'alamat' => $request['alamat'],
            ]);
            return redirect()->back()->with('pesan', "Create Users is Successful!");
        else :
            abort(404);
        endif;

    }
}
