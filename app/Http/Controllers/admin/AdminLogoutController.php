<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminLogoutController extends Controller
{
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('admin.side');
    }
}
