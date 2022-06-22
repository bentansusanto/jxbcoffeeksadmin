<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function adminLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated))
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginErr','Please login again');
    }
}
