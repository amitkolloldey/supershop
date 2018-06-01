<?php

namespace App\Http\Controllers\backend;

use App\Models\Password_reset;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('backend.user.resetpassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $user = User::whereEmail($request->email)->first();
        $sentinelUser = User::findById($user->id);
        if (count($user) == 0) {
            return redirect()->back()->with('error_message', 'Reset link is Send to Your Email');
        }
        $reminder = Password_reset::exists($sentinelUser) ?: Password_reset::create($sentinelUser);
        $this->sendEmial($user, $reminder->token);
        return redirect()->back()->with('success_message', 'Reset link is Send to Your Email');
    }

    private function sendEmial($user, $code)
    {
        Mail::send('backend.user.forget-password', [
            'user' => $user,
            'token' => $code,
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->name reset Your Password.");
        });
    }

    public function broker()
    {
        return Password::broker('users');
    }


}
