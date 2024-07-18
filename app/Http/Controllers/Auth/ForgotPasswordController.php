<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function requestPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->insert([
            'email'       => $request->email,
            'token'       => $token,
            'created_at'  => Carbon::now()
        ]);

        Mail::send('emails.password-reset', ['token' => $token, 'email' => $request->email], function ($message) use ($request){
            $message->from('noreply@csmonline.net', 'IMC - HRMS');
            $message->to($request->email);
            $message->subject('Password Reset');
        });
        return redirect()
            ->route('password.request')
            ->with('success', __('Kindly Check your email to reset the password'));
    }
}
