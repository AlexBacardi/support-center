<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\User;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct(private ProfileService $profileService){}

    public function show(User $user)
    {

        return view('cabinet.profile', compact('user'));

    }

    public function edit(User $user)
    {

        return view('cabinet.profile_edit', compact('user'));

    }

    public function update(User $user, UpdateRequest $updateRequest)
    {
        $data = $updateRequest->validated();

        if($this->profileService->update($data, $user)) {

            return redirect()->route('profiles.show', $user)->with('status', 'Профиль обновлен');

        }
    }
}
