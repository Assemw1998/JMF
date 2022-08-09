<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\Brand;
use App\Models\Model;
use App\Models\Color;
use App\Models\EngineType;
use App\Models\MotorcycleImage;
use DB;

class MotorcyclesController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::all();
        return view('super_admin.dashboard.motorcycles.index', ['motorcycles' => $motorcycles]);
    }
    public function viewCreate()
    {
        $brands = Brand::all();
        $models = Model::all();
        $colors = Color::all();
        $engineTypes = EngineType::all();

        return view('super_admin.dashboard.motorcycles.create', ['brands' => $brands, 'models' => $models, 'colors' => $colors, 'engineTypes' => $engineTypes]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'chassis' => 'required|string|min:17',
            'engine_serial_number' => 'required|string|min:17',
            'extra_information' => 'required|string|max:255',
        ]);
        $motorcycle = new Motorcycle;
        $motorcycle->make_id = $request->make_id;
        $motorcycle->model_id = $request->model_id;
        $motorcycle->year = $request->year;
        $motorcycle->chassis = $request->chassis;
        $motorcycle->engine_type_id = $request->engine_type_id;
        $motorcycle->color_id = $request->color_id;
        $motorcycle->engine_serial_number = $request->engine_serial_number;
        $motorcycle->extra_information = $request->extra_information;

        if ($motorcycle->save()) {
            foreach ($request->file('images') as $imagefile) {
                $image = new MotorcycleImage;
                $path = $imagefile->store('/images/resource', ['disk' =>   'images']);
                $image->url = $path;
                $image->motorcycle_id = $motorcycle->id;
                $image->save();
            }
        }
        return redirect()->route('super-admin.dashboard.motorcycles-view', ['id' => $motorcycle->id]);
    }

    public function view($id)
    {
        $motorcycle = Motorcycle::find($id);
        return view('super_admin.dashboard.motorcycles.view', ['motorcycle' => $motorcycle]);
    }
    public function viewUpdate($id)
    {
        $motorcycle = Motorcycle::find($id);
        $brands = Brand::all();
        $models = Model::all();
        $colors = Color::all();
        $engineTypes = Enginetype::all();
        return view('super_admin.dashboard.motorcycles.update', ['motorcycle' => $motorcycle, 'brands' => $brands, 'models' => $models, 'colors' => $colors, 'engineTypes' => $engineTypes]);
    }


    public function deleteImage(Request $request)
    {

        MotorcycleImage::where('id', $request->id)->delete();
        return true;
    }

    public function update($id,Request $request)
    {

        $this->validate($request, [
            'chassis' => 'required|string|min:17',
            'engine_serial_number' => 'required|string|min:17',
            'extra_information' => 'required|string|max:255',
        ]);

        $motorcycle = Motorcycle::find($id);
        $motorcycle->brand_id = $request->brand_id;
        $motorcycle->model_id = $request->model_id;
        $motorcycle->year = $request->year;
        $motorcycle->chassis = $request->chassis;
        $motorcycle->engine_type_id = $request->engine_type_id;
        $motorcycle->color_id = $request->color_id;
        $motorcycle->engine_serial_number = $request->engine_serial_number;
        $motorcycle->extra_information = $request->extra_information;

        if ($motorcycle->save()) {
            if($request->file('images')){
                foreach ($request->file('images') as $imagefile) {
                    $image = new MotorcycleImage;
                    $path = $imagefile->store('/images/resource', ['disk' =>   'images']);
                    $image->url = $path;
                    $image->motorcycle_id = $motorcycle->id;
                    $image->save();
                }
            }            
        }
        return redirect()->route('super-admin.dashboard.motorcycles-view', ['id' => $motorcycle->id]);
    }

    public function delete(Request $request)
    {

        Motorcycle::where('id', $request->id)->delete();
        return true;
    }


    
}
