<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile($id)
    {
        $user = User::where('id',$id)->get();
        return view('admin.profile',compact('user'));
    }
}
