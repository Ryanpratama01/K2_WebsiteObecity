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
    $validated = $request->validate([
            'Nama'           => 'required|string|max:255',
            'Jenis_Kelamin'  => 'required|in:Laki-laki,Perempuan',
            'Usia'           => 'required|numeric',
            'Tinggi_Badan'   => 'required|numeric',
            'Berat_Badan'    => 'required|numeric',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:6',
    ]);

    $user = User::create([
        'Nama'          => $validated['Nama'],
        'Jenis_Kelamin' => $validated['Jenis_Kelamin'],
        'Usia'          => $validated['Usia'],
        'email'         => $validated['email'],
        'Tinggi_Badan'  => $validated['Tinggi_Badan'],
        'Berat_Badan'   => $validated['Berat_Badan'],
        'password'      => bcrypt($validated['password']),]
    );

    return response()->json([
        'message' => 'User registered successfully',
        'user' => $user
    ], 201);
}

}
