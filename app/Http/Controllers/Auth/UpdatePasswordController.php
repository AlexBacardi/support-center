<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Password\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function edit(User $user)
    {

        return view('cabinet.profile_update_password', compact('user'));

    }

    public function update(User $user, UpdateRequest $request)
    {

        $data = $request->validated();

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('profiles.show', $user)->with('status', 'Пароль успешно обновлен');

    }
}
