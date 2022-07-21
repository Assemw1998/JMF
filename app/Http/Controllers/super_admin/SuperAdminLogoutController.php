<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SuperAdminLogoutController extends Controller
{
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('super-admin.side');
    }
}
