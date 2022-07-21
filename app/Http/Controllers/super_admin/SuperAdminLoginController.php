<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SuperAdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class SuperAdminLoginController extends Controller
{
    public function index()
    {
        return view('super_admin.auth.index');
    }  


    public function login(SuperAdminLoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::guard('super_admin')->attempt($credentials))
            return redirect()->back()->withInput()->withErrors(trans('auth.failed'));


        $super_admin = Auth::guard('super_admin')->attempt($credentials);


        return $this->authenticated($request, $super_admin);
    }

   
    protected function authenticated(Request $request, $super_admin) 
    {
        return redirect()->route('super-admin.dashboard.index');
    }
}
