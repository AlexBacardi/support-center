<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Reset\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->token;

        $email = $request->email;

        return view('auth.reset_password', compact('token', 'email'));

    }

    public function store(StoreRequest $request)
    {
        $request->validated();

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function($user) use ($request) {

            $user->forceFill([

                'password' => Hash::make($request->password),

                'remember_token' => Str::random(60),

            ])->save();

        });
        if ($status === Password::PASSWORD_RESET) {

            return redirect()->route('login')->with('status', 'Ваш пароль был успешно сброшен');

        }

        return back()->withInput($request->only('email'))->withErrors(['email' => 'Не верные данные']);
    }
}
