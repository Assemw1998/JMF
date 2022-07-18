<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.index');
    }  


    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::guard('admin')->attempt($credentials))
            return redirect()->back()->withInput()->withErrors(trans('auth.failed'));


        $admin = Auth::guard('admin')->attempt($credentials);


        return $this->authenticated($request, $admin);
    }

   
    protected function authenticated(Request $request, $admin) 
    {
        return redirect()->route('admin.dashboard.index');
    }
}
