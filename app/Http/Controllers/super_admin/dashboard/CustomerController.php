<?php

namespace App\Http\Controllers\super_admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\Customer;
use App\Models\City;
use App\Models\IdImage;
use App\Models\LicenseImage;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('super_admin.dashboard.customer.index', ['customers' => $customers]);
    }
    public function viewCreate()
    {
        $cities = City::all();
        return view('super_admin.dashboard.customer.create', ['cities' => $cities]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nationality_id' => 'required|string|between:1,10',
            'mother_name' => 'required|string|max:255',
            'phone_number' => 'required|string|between:1,10',
            'email' => 'required|email|unique:customers',
            'username' => 'required|unique:customers',
            'address_1' => 'required|string|max:255',
            'address_2' => 'required|string|max:255',
            'id_number' => 'required|string|between:1,8',
            'license_number' => 'required|string|between:1,8',
        ]);

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->second_name = $request->second_name;
        $customer->third_name = $request->third_name;
        $customer->last_name = $request->last_name;
        $customer->nationality_id = $request->nationality_id;
        $customer->mother_name = $request->mother_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->username = $request->username;
        $customer->password = $customer->setPasswordAttribute($request->password);
        $customer->address_1 = $request->address_1;
        $customer->address_2 = $request->address_2;
        $customer->city_id = $request->city_id;
        $customer->birth_city_id = $request->birth_city_id;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->id_number = $request->id_number;       
        $customer->id_expiry_date = $request->id_expiry_date;
        $customer->license_number = $request->license_number;
        $customer->license_expiry_date = $request->license_expiry_date;
        $customer->license_issue_date = $request->license_issue_date;

        if ($customer->save()) {
            foreach ($request->file('id_images') as $IdImageFile) {
                $IdImage = new IdImage;
                $path = $IdImageFile->store('/images/resource', ['disk' =>   'images']);
                $IdImage->url = $path;
                $IdImage->customer_id = $customer->id;
                $IdImage->save();
            }

            $licenseImageFile=$request->file('license_image');
            $licenseImage = new LicenseImage;
            $path = $licenseImageFile->store('/images/resource', ['disk' =>   'images']);
            $licenseImage->url = $path;
            $licenseImage->customer_id = $customer->id;
            $licenseImage->save();
        }
        return redirect()->route('super-admin.dashboard.customer-view', ['id' => $customer->id]);
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        return view('super_admin.dashboard.customer.view', ['customer' => $customer]);
    }
    public function viewUpdate($id)
    {
        $customer = Customer::find($id);
        $cities = City::all();
        return view('super_admin.dashboard.customer.update', ['customer' => $customer, 'cities' => $cities]);
    }


    public function deleteImage(Request $request)
    {
        switch ($request->model_name) {
            case "IdImage":
                IdImage::where('id', $request->id)->delete();
              break;
            case "LicenseImage":
                LicenseImage::where('id', $request->id)->delete();
              break;
          }

        return true;
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nationality_id' => 'required|string|between:1,10',
            'mother_name' => 'required|string|max:255',
            'phone_number' => 'required|string|between:1,10',
            'email' => 'required|email|unique:customers',
            'username' => 'required|unique:customers',
            'address_1' => 'required|string|max:255',
            'address_2' => 'required|string|max:255',
            'id_number' => 'required|string|between:1,8',
            'license_number' => 'required|string|between:1,8',
        ]);

        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->second_name = $request->second_name;
        $customer->third_name = $request->third_name;
        $customer->last_name = $request->last_name;
        $customer->nationality_id = $request->nationality_id;
        $customer->mother_name = $request->mother_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->username = $request->username;
        if ($request->password)
            $customer->password = $customer->setPasswordAttribute($request->password);
        $customer->address_1 = $request->address_1;
        $customer->address_2 = $request->address_2;
        $customer->city_id = $request->city_id;
        $customer->birth_city_id = $request->birth_city_id;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->id_number = $request->id_number;
        $customer->id_expiry_date = $request->id_expiry_date;
        $customer->license_number = $request->license_number;
        $customer->license_expiry_date = $request->license_expiry_date;
        $customer->license_issue_date = $request->license_issue_date;

        if ($customer->save()) {
            if ($request->file('id_images')) {
                foreach ($request->file('id_images') as $IdImageFile) {
                    $IdImage = new IdImage;
                    $path = $IdImageFile->store('/images/resource', ['disk' =>   'images']);
                    $IdImage->url = $path;
                    $IdImage->customer_id = $customer->id;
                    $IdImage->save();
                }
            }
            if ($request->file('license_image')) {
                $licenseImageFile = $request->file('license_image');
                $licenseImage = new LicenseImage;
                $path = $licenseImageFile->store('/images/resource', ['disk' =>   'images']);
                $licenseImage->url = $path;
                $licenseImage->customer_id = $customer->id;
                $licenseImage->save();
            }
        }
        return redirect()->route('super-admin.dashboard.customer-view', ['id' => $customer->id]);
    }

    public function activateDeactivate(Request $request){
        $customer = Customer::find($request->id);
        if ($request->status==1){
            $customer->status=0;
        }elseif($request->status==0){
            $customer->status=0;
        }
        $customer->save();
        return redirect()->route('super-admin.dashboard.customer-view', ['id' => $customer->id]);
    }

    public function delete(Request $request)
    {
        Customer::where('id', $request->id)->delete();
        return true;
    }


    
}
