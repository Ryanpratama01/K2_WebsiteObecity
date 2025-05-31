<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
       $request->validate([
            'Nama'           => 'required|string|max:255',
            'Jenis_Kelamin'  => 'required|in:Laki-laki,Perempuan',
            'Usia'           => 'required|numeric',
            'Berat_Badan'    => 'required|numeric',
            'Tinggi_Badan'   => 'required|numeric',
            'IMT'            => 'required|numeric',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|confirmed|min:6',

            // dd($request->all())  
        ]);
        User::create([
            'Nama'          => $request->Nama,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'Usia'          => $request->Usia,
            'Tinggi_Badan'  => $request->Tinggi_Badan,
            'Berat_Badan'   => $request->Berat_Badan,
            'IMT'           => $request->IMT,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Registration successful, please login.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile()
    {
        return view('web_admin.profile');
    }

    // ===============================
    // Tambahan untuk Forgot Password
    // ===============================
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = password::sendResetLink(
            $request->only('email')
        );

        return $status === password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}