<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPasswordPost (Request $request) {

        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'confirmed', 'min:8', 'max:20'],
            'password_confirmation' => ['required']
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (! $updatePassword) {
            return redirect()->route('password.reset')->with('error', 'Please Try again');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password) ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', __('Password updated successfully'));
    }
}
