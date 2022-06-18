<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function adminRegister()
   {
    return view('admin.register');
   }

   public function register(Request $request)
   {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()]
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['name'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/login')->with('Success','Registrasi berhasil');
   }

   public function logout(Request $request)
   {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
   }
}
