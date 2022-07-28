<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Make;


class MakeController extends Controller
{
    public function index()
    {
        $makes = Make::all();
        return view('super_admin.dashboard.make.index', ['makes' => $makes]);
    }
    public function viewCreate()
    {
        return view('super_admin.dashboard.make.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $make = new Make;
        $make->name = $request->name;
  

        if ($make->save()) {
            return redirect()->route('super-admin.dashboard.make-view', ['id' => $make->id]);
        }
    }

    public function view($id)
    {
        $make = Make::find($id);
        return view('super_admin.dashboard.make.view', ['make' => $make]);
    }
    public function viewUpdate($id)
    {
        $make = Make::find($id);
        return view('super_admin.dashboard.make.update', ['make' => $make]);
    }


    public function update($id,Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $make = make::find($id);
        $make->name = $request->name;

        if ($make->save()) {
            return redirect()->route('super-admin.dashboard.make-view', ['id' => $make->id]);  
        }
    }

    public function delete(Request $request)
    {

        Make::where('id', $request->id)->delete();
        return true;
    }


    
}
