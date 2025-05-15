<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
