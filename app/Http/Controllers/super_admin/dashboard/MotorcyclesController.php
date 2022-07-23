<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motorcycles;

class MotorcyclesController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycles::all();

        return view('super_admin.dashboard.motorcycles.index',['motorcycles'=>$motorcycles]);
    }  
}
