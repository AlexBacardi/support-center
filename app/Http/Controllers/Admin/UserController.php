<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.all_users', compact('users'));

    }


    public function show(User $user)
    {

        return view('admin.show_user', compact('user'));
        
    }
}
