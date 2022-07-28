<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;


class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('super_admin.dashboard.color.index', ['colors' => $colors]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.color.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $color = new Color;
        $color->name = $request->name;
  

        if ($color->save()) {
            return redirect()->route('super-admin.dashboard.color-view', ['id' => $color->id]);
        }
    }

    public function view($id)
    {
        $color = Color::find($id);
        return view('super_admin.dashboard.color.view', ['color' => $color]);
    }
    public function viewUpdate($id)
    {
        $color = Color::find($id);
        return view('super_admin.dashboard.color.update', ['color' => $color]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $color = Color::find($id);
        $color->name = $request->name;

        if ($color->save()) {
            return redirect()->route('super-admin.dashboard.color-view', ['id' => $color->id]);  
        }
    }

    public function delete(Request $request)
    {

        Color::where('id', $request->id)->delete();
        return true;
    }


    
}
