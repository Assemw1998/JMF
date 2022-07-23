<?php

namespace App\Http\Controllers\super_admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LogoutController extends Controller
{
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('super-admin.side');
    }
}
