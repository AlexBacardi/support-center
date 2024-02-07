<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPassword\StoreRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view('auth.forgot_password');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $status = Password::sendResetLink($data);

        if($status === Password::RESET_LINK_SENT) {

            return back()->with('status', 'Ссылка для сброса пароля отправлена Вам на почту' ); 

        }

        return back()->withInput($data)->withErrors(['email' => 'Введены не верные данные']);
    }
}
