<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();

        if ($user == null) {
            return redirect()->back()->with('error', 'User Tidak Ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password Salah!');
        }

        $request->session()->regenerate();
        $request->session()->put('isLogged', true);
        $request->session()->put('userId', $user->id);
        $request->session()->put('userName', $user->name);
        $request->session()->put('role', strtolower($user->role->name));

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        session()->forget('isLogged');
        session()->forget('userId');
        session()->forget('userName');
        session()->forget('role');
        session()->flush();

        return redirect()->route('auth.login');
    }
}
