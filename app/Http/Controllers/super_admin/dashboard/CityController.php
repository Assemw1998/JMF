<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('super_admin.dashboard.city.index', ['cities' => $cities]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.city.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $city = new City;
        $city->name = $request->name;
  

        if ($city->save()) {
            return redirect()->route('super-admin.dashboard.city-view', ['id' => $city->id]);
        }
    }

    public function view($id)
    {
        $city = city::find($id);
        return view('super_admin.dashboard.city.view', ['city' => $city]);
    }
    public function viewUpdate($id)
    {
        $city = City::find($id);
        return view('super_admin.dashboard.city.update', ['city' => $city]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $city = City::find($id);
        $city->name = $request->name;

        if ($city->save()) {
            return redirect()->route('super-admin.dashboard.city-view', ['id' => $city->id]);  
        }
    }

    public function delete(Request $request)
    {

        City::where('id', $request->id)->delete();
        return true;
    }


    
}
