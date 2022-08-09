<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EngineType;


class EngineTypeController extends Controller
{
    public function index()
    {
        $engineTypes = EngineType::all();
        return view('super_admin.dashboard.engineType.index', ['engineTypes' => $engineTypes]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.engineType.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $engineType = new EngineType;
        $engineType->name = $request->name;
  

        if ($engineType->save()) {
            return redirect()->route('super-admin.dashboard.engineType-view', ['id' => $engineType->id]);
        }
    }

    public function view($id)
    {
        $engineType = EngineType::find($id);
        return view('super_admin.dashboard.engineType.view', ['engineType' => $engineType]);
    }
    public function viewUpdate($id)
    {
        $engineType = EngineType::find($id);
        return view('super_admin.dashboard.engineType.update', ['engineType' => $engineType]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $engineType = EngineType::find($id);
        $engineType->name = $request->name;

        if ($engineType->save()) {
            return redirect()->route('super-admin.dashboard.engineType-view', ['id' => $engineType->id]);  
        }
    }

    public function delete(Request $request)
    {

        EngineType::where('id', $request->id)->delete();
        return true;
    }


    
}
