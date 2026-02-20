<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // list semua user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // form create
    public function create()
    {
        return view('users.create');
    }

    // simpan user
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'number'   => $request->number,
            'password' => Hash::make($request->password),
        ]);

        // return redirect()->route('users.index');
        return redirect()->route('login');
    }

    // form edit
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // update
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'number' => $request->number,
        ]);

        return redirect()->route('users.index');
    }

    // delete
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    // ------------------------------------------------------------------
    // AUTH
    // ------------------------------------------------------------------

    // login form
    public function loginForm()
    {
        return view('auth.login');
    }

    // proses login
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('number','password'))) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['number' => 'Login gagal!']);
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
