<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class ResetPasswordController extends Controller
{
 public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|string'
    ]);

    $reset = DB::table('password_resets')
                ->where('email', $request->email)
                ->where('otp', $request->otp)
                ->first();

    if (!$reset) {
        return response()->json(['message' => 'OTP tidak ditemukan atau salah.'], 400);
    }

    if (Carbon::parse($reset->expired_at)->isPast()) {
        return response()->json(['message' => 'OTP sudah kedaluwarsa.'], 400);
    }

    return response()->json(['message' => 'OTP valid. Silakan reset password.']);
}

 public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|string',
        'new_password' => 'required|min:6|confirmed' // butuh juga new_password_confirmation
    ]);

    $reset = DB::table('password_resets')
                ->where('email', $request->email)
                ->where('otp', $request->otp)
                ->first();

    if (!$reset) {
        return response()->json(['message' => 'OTP tidak ditemukan atau salah.'], 400);
    }

    if (Carbon::parse($reset->expired_at)->isPast()) {
        return response()->json(['message' => 'OTP sudah kedaluwarsa.'], 400);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'Pengguna tidak ditemukan.'], 404);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    DB::table('password_resets')->where('email', $request->email)->delete();

    return response()->json(['message' => 'Password berhasil direset. Silakan login.']);
}


}
