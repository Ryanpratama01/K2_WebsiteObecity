<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  function login(Request $request)
  {
    $credentials = $request->only(["email", "password"]);
    // dd($credentials);
    if (!$token = Auth::guard('api')->attempt($credentials)) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }
    return $this->respondWithToken($token);
  }

  function get_user()
  {
    return response()->json(
      [
        'user' => Auth::guard('api')->user(),
      ]
    );
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'user' => Auth::guard('api')->user(),
    ]);
  }
  public function apiRegister(Request $request)
  {
    $request->validate([
      'Nama'           => 'required|string|max:255',
      'Jenis_Kelamin'  => 'required|in:Laki-laki,Perempuan',
      'Usia'           => 'required|numeric',
      'Tinggi_Badan'   => 'required|numeric',
      'Berat_Badan'    => 'required|numeric',
      'Date'           => 'required|date',
      'email'          => 'required|email|unique:users,email',
      'password'       => 'required|confirmed|min:6',
    ]);

    $user = User::create([
      'Nama'          => $request->Nama,
      'Jenis_Kelamin' => $request->Jenis_Kelamin,
      'Usia'          => $request->Usia,
      'Tinggi_Badan'  => $request->Tinggi_Badan,
      'Berat_Badan'   => $request->Berat_Badan,
      'Date'          => $request->Date,
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
