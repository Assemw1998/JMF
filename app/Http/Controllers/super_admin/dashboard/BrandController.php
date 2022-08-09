<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function index()
    {
        $brands= Brand::all();
        return view('super_admin.dashboard.brand.index', ['brands' => $brands]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.brand.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $brand = new Brand;
        $brand->name = $request->name;
  

        if ($brand->save()) {
            return redirect()->route('super-admin.dashboard.brand-view', ['id' => $brand->id]);
        }
    }

    public function view($id)
    {
        $brand = Brand::find($id);
        return view('super_admin.dashboard.brand.view', ['brand' => $brand]);
    }
    public function viewUpdate($id)
    {
        $brand = Brand::find($id);
        return view('super_admin.dashboard.brand.update', ['brand' => $brand]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;

        if ($brand->save()) {
            return redirect()->route('super-admin.dashboard.brand-view', ['id' => $brand->id]);  
        }
    }

    public function delete(Request $request)
    {

        Brand::where('id', $request->id)->delete();
        return true;
    }


    
}
