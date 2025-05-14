<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'nama'           => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'usia'           => 'required|numeric',
            'tinggi_badan'   => 'required|numeric',
            'berat_badan'    => 'required|numeric',
            'date'           => 'required|date',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|confirmed|min:6',
            'role'           => 'required|string',
        ]);
        $tinggi = $request->tinggi_badan / 100;
        $imt = $request->berat_badan / ($tinggi * $tinggi);
        User::create([
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia'          => $request->usia,
            'tinggi_badan'  => $request->tinggi_badan,
            'berat_badan'   => $request->berat_badan,
            'imt'           => round($imt, 2),
            'date'          => $request->date,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
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
        // dd(Auth::attempt($credentials));

        // if (!Auth::attempt($credentials)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'These credentials do not match our records.',
        //     ]);
        // }
        if ($user = Auth::attempt($credentials)) {
            # code...
            dd($user);
            return redirect()->route('dashboard.index');
        }

        // $request->session()->regenerate();
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
}