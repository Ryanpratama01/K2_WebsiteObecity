<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request) {
      $credentials = $request->only(["email","password"]);
      // dd($credentials);
      if (!$token = Auth::guard('api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
      return $this->respondWithToken($token);
    }

    function get_user() {
      return response()->json(
        [
          'user'=> Auth::guard('api')->user(),
        ]
      );
    }

     protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user'=> Auth::guard('api')->user(),
        ]);
    }
    public function apiRegister(Request $request)
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
    ]);

    $tinggi = $request->tinggi_badan / 100;
    $imt = $request->berat_badan / ($tinggi * $tinggi);

    $user = User::create([
        'nama'          => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'usia'          => $request->usia,
        'tinggi_badan'  => $request->tinggi_badan,
        'berat_badan'   => $request->berat_badan,
        'date'          => $request->date,
        'email'         => $request->email,
        'password'      => Hash::make($request->password),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Registrasi berhasil',
        'data'    => $user
    ], 201);
}
}


