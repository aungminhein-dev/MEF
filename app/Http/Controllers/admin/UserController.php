<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('admin.user.list',compact('users'));
    }
}
