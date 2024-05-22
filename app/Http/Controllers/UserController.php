<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['user_edit', 'user_update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $is_admin = $request->has('is_admin');
        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'is_admin' => $is_admin,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(\auth()->user()->id != $user->id) {
            return redirect()->route('admin.index');
        }

        return view('dashboard.users.show', ['user' => $user]);
    }

    public function user_edit()
    {
        $user = Auth::user();
        return view('dashboard.users.account', compact('user'));
    }

    public function user_update(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        \auth()->user()->update([
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $userFound = User::where('username', $request->input('username'))->exists();
        if($request->username != $user->username && $userFound) {
            return redirect()->back()->withErrors([
                'edit' => 'Käyttäjätunnus on varattu!',
            ]);
        }

        $is_admin = $request->has('is_admin');
        $user->update([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'is_admin' => $is_admin,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
