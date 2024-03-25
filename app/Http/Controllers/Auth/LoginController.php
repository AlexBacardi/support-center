<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\StoreRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(StoreRequest $request)
    {
        $rememberMe = $request->boolean('remember');

        $data = $request->validated();

        if(! Auth::attempt($data, $rememberMe)) {

            throw ValidationException::withMessages([
                'email' => 'введенные данные не корректные',
            ]);

            //
            // return back()->withInput()->withErrors([
            //     'email' => 'введенные данные не корректные',
            // ]);

        }

        $request->session()->regenerate();

        if (auth()->user()->isAdmin()) {

            return redirect()->route('admin.index');
        }

        return redirect()->intended(RouteServiceProvider::HOME);

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
