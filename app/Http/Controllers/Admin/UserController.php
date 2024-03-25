<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\Admin\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(private UserService $userService){}

    public function index()
    {
        $users = User::all();

        return view('admin.all_users', compact('users'));

    }


    public function show(User $user)
    {

        return view('admin.show_user', compact('user'));

    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.edit_user', compact('user', 'roles'));

    }

    public function update(User $user, UpdateRequest $request)
    {
        $data = $request->validated();

        if($this->userService->update($data, $user)) {

            return redirect()->route('admin.users.show', $user);
        }

    }
}
