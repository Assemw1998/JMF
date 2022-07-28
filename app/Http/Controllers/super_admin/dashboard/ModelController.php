<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model;


class ModelController extends Controller
{
    public function index()
    {
        $model = Model::all();
        return view('super_admin.dashboard.model.index', ['models' => $model]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.model.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $model = new Model;
        $model->name = $request->name;
  

        if ($model->save()) {
            return redirect()->route('super-admin.dashboard.model-view', ['id' => $model->id]);
        }
    }

    public function view($id)
    {
        $model = Model::find($id);
        return view('super_admin.dashboard.model.view', ['model' => $model]);
    }
    public function viewUpdate($id)
    {
        $model = Model::find($id);
        return view('super_admin.dashboard.model.update', ['model' => $model]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $model = Model::find($id);
        $model->name = $request->name;

        if ($model->save()) {
            return redirect()->route('super-admin.dashboard.model-view', ['id' => $model->id]);  
        }
    }

    public function delete(Request $request)
    {

        Model::where('id', $request->id)->delete();
        return true;
    }


    
}
