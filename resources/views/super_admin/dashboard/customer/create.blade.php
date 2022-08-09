@extends('super_admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.customer-index')}}">Customer</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.customer-create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" id="first_name" required>
                @if ($errors->has('first_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="second_name">Second Name</label>
                <input type="text" class="form-control" value="{{old('second_name')}}" name="second_name" id="second_name" required>
                @if ($errors->has('second_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('second_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="third_name">Third Name</label>
                <input type="text" class="form-control" value="{{old('third_name')}}" name="third_name" id="third_name" required>
                @if ($errors->has('third_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('third_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" id="last_name" required>
                @if ($errors->has('last_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="nationality_id">Nationality ID</label>
                <input type="text" class="form-control" value="{{old('nationality_id')}}" name="nationality_id" id="nationality_id" required>
                @if ($errors->has('nationality_id'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('nationality_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="mother_name">Mother Name</label>
                <input type="text" class="form-control" value="{{old('mother_name')}}" name="mother_name" id="mother_name" required>
                @if ($errors->has('mother_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('mother_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" value="{{old('phone_number')}}" name="phone_number" id="phone_number" required>
                @if ($errors->has('phone_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{old('email')}}" name="email" id="email" required>
                @if ($errors->has('email'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="{{old('username')}}" name="username" id="username" required>
                @if ($errors->has('username'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" value="{{old('customer_password')}}" name="password" id="password" required>
                    <div class="input-group-append">
                        <span class="input-group-text hide"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <button type="button" class="btn btn-outline-primary generate-password">Generate</button>
                </div>
            </div>

            <div class="form-group">
                <label for="address_1">Address 1</label>
                <input type="text" class="form-control" value="{{old('address_1')}}" name="address_1" id="address_1" required>
                @if ($errors->has('address_1'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('address_1') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="address_2">Address 2</label>
                <input type="text" class="form-control" value="{{old('address_2')}}" name="address_2" id="address_2" required>
                @if ($errors->has('address_2'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('address_2') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="city_id">City</label>
                <select class="form-control" name="city_id" id="city_id" required>
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" {{ (old("city_id") == $city->id ? "selected":"") }}>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="birth_city_id">Birth City</label>
                <select class="form-control" name="birth_city_id" id="birth_city_id" required>
                    <option value="">Select Birth City</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" {{ (old("birth_city_id") == $city->id ? "selected":"") }}>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date Of Birth</label>
                <input type="text" class="form-control" value="{{old('date_of_birth')}}" name="date_of_birth" id="date_of_birth" required>
            </div>
            <hr>
            <div class="form-group">
                <label for="id_number">ID Number</label>
                <input type="text" class="form-control" value="{{old('id_number')}}" name="id_number" id="id_number" required>
                @if ($errors->has('id_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('id_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="id_expiry_date">ID Expiry Date</label>
                <input type="text" class="form-control" value="{{old('id_expiry_date')}}" name="id_expiry_date" id="id_expiry_date" required>
            </div>
            <div class="form-group">
                <label>Choose ID Images</label>
                <input type="file" class="form-control" id="id_images" name="id_images[]" onchange="preview_image('id_images','#id_images_preview');" multiple required>
            </div>
            <div id="id_images_preview" class="text-center mb-3"></div>
            <hr>
            <div class="form-group">
                <label for="license_number">License Number</label>
                <input type="text" class="form-control" value="{{old('license_number')}}" name="license_number" id="license_number" required>
                @if ($errors->has('license_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('license_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="license_issue_date">License Issue Date</label>
                <input type="text" class="form-control" value="{{old('license_issue_date')}}" name="license_issue_date" id="license_issue_date" required>
            </div>
            <div class="form-group">
                <label for="license_expiry_date">License Expiry Date</label>
                <input type="text" class="form-control" value="{{old('license_expiry_date')}}" name="license_expiry_date" id="license_expiry_date" required>
            </div>
            <div class="form-group">
                <label>Choose License Image</label>
                <input type="file" class="form-control" id="license_image" name="license_image" onchange="preview_image('license_image','#license_images_preview');" required>
            </div>
            <div id="license_images_preview" class="text-center mb-3"></div>
            <hr>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/customer.js")}}></script>
@endsection