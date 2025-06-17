<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
   public function sendOtp(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = rand(100000, 999999);
        $expiredAt = now()->addMinutes(5);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['otp' => $otp, 'expired_at' => $expiredAt, 'created_at' => now()]
        );

        Mail::raw("Kode OTP kamu: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('OTP Reset Password');
        });

        return response()->json(['message' => 'OTP dikirim ke email']);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Terjadi error di server',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
