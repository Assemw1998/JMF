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
                   <a href="{{ route('super-admin.dashboard.motorcycles-index')}}">Motorcycle</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.motorcycles-create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id" id="brand_id" required>
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{ (old("brand_id") == $brand->id ? "selected":"") }}>{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="model_id">Model</label>
                <select class="form-control" name="model_id" id="model_id" required>
                    <option value="">Select Model</option>
                    @foreach($models as $model)
                        <option value="{{$model->id}}" {{ (old("model_id") == $model->id ? "selected":"") }} >{{$model->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" value="{{old('year')}}" name="year" id="year" required>
            </div>
            <div class="form-group">
                <label for="chassis">Chassis</label>
                <input type="text" class="form-control" name="chassis" value="{{old('chassis')}}" id="chassis" maxlength='17' required>
                @if ($errors->has('chassis'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('chassis') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="engineType">Engine Type</label>
                <select class="form-control" name="engine_type_id" id="engine_type_id" required>
                    <option value="">Select Engine Type</option>
                    @foreach($engineTypes as $engineType)
                    <option value="{{$engineType->id}}" {{ (old("engine_type_id") == $engineType->id ? "selected":"") }}>{{$engineType->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="engine_serial_number">Engine Serial Number</label>
                <input type="text" class="form-control" name="engine_serial_number" value="{{old('engine_serial_number')}}" id="engine_serial_number" maxlength='17' required>
                @if ($errors->has('engine_serial_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('engine_serial_number') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <select class="form-control" name="color_id" id="color" required>
                    <option value="">Select Color</option>
                    @foreach($colors as $color)
                    <option value="{{$color->id}}" {{ (old("color_id") == $color->id ? "selected":"") }} >{{$color->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="extra_information">Extra Information (Description)</label>
                <textarea class="form-control" id="extra_information" name="extra_information" rows="3" required>{{ old('extra_information') }}</textarea>
                @if ($errors->has('extra_information'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('extra_information') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Choose Images</label>
                <input type="file" class="form-control" id="images" name="images[]" onchange="preview_image();" multiple required>
            </div>
            <div id="images_preview" class="text-center mb-3"></div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/motorcycle.js")}}></script>
@endsection