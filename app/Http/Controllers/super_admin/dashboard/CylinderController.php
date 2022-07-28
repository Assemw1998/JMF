<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cylinder;


class CylinderController extends Controller
{
    public function index()
    {
        $cylinders = Cylinder::all();
        return view('super_admin.dashboard.cylinder.index', ['cylinders' => $cylinders]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.cylinder.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $cylinder = new Cylinder;
        $cylinder->name = $request->name;
  

        if ($cylinder->save()) {
            return redirect()->route('super-admin.dashboard.cylinder-view', ['id' => $cylinder->id]);
        }
    }

    public function view($id)
    {
        $cylinder = Cylinder::find($id);
        return view('super_admin.dashboard.cylinder.view', ['cylinder' => $cylinder]);
    }
    public function viewUpdate($id)
    {
        $cylinder = Cylinder::find($id);
        return view('super_admin.dashboard.cylinder.update', ['cylinder' => $cylinder]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $cylinder = Cylinder::find($id);
        $cylinder->name = $request->name;

        if ($cylinder->save()) {
            return redirect()->route('super-admin.dashboard.cylinder-view', ['id' => $cylinder->id]);  
        }
    }

    public function delete(Request $request)
    {

        Cylinder::where('id', $request->id)->delete();
        return true;
    }


    
}
