<?php

namespace App\Http\Controllers\backend;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    protected $redirectTo = '/';

    //trait for handling reset Password
    use ResetsPasswords;

    //Show form to seller where they can reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('backend.user.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    public function reset()
    {
        //
    }
    public function broker()
    {
        return Password::broker('users');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('web');
    }
}
