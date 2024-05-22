<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //AuthController handles authentication. Login, logout.

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        //Checks does user exists
        $user = User::where('username', $request->username);
        if(!$user) {
            return redirect()->back()->withErrors([
                'login' => 'Käyttäjätunnus tai salasana väärä'
            ]);
        }

        //Tries to authenticate user
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withErrors([
                'login' => 'Käyttäjätunnus tai salasana väärä'
            ]);
        }
    }

    //Shows login page
    public function show() {
        return view('login');
    }

    //Logout function
    public function logout(Request $request)
    {
        \auth()->logout();
        return redirect()->route('login');
    }
}
