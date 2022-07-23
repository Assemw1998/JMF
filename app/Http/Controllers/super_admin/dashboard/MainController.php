<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('super_admin.dashboard.index');
    }  
}
