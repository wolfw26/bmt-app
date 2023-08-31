<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class logout extends Controller
{


    public function logout()
    {
        Auth::logout();
        session()->invalidate();

        return redirect()->route('login');
    }
}
