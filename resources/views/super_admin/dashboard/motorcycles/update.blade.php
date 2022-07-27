@extends('super_admin.layouts.dashboard')
@section('content')
<link href={{asset("custom/super_admin/css/motorcycle.css")}} rel="stylesheet" >
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$motorcycle->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.motorcycles-index')}}">Motorcycle</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.motorcycles-update',['id'=>$motorcycle->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="make">Make</label>
                <select class="form-control" name="make_id" id="make" required>
                    <option value="">Select Make</option>
                    @foreach($makes as $make)
                        @if(old("make_id"))
                            <option value="{{$make->id}}" {{ (old("make_id") == $make->id ? "selected":"") }}>{{$make->name}}</option>
                        @else
                            <option value="{{$make->id}}" {{ ( $motorcycle->make_id == $make->id ? "selected":"") }}>{{$make->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <select class="form-control" name="model_id" id="make" required>
                    <option value="">Select Model</option>
                    @foreach($models as $model)
                        @if(old("model_id"))
                            <option value="{{$model->id}}" {{ (old("model_id") == $model->id ? "selected":"") }}>{{$model->name}}</option>
                        @else
                            <option value="{{$model->id}}" {{ ( $motorcycle->model_id == $model->id ? "selected":"") }}>{{$model->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" value="{{(old('model_id')? old('year'): $motorcycle->year )}}" name="year" id="year" required>
            </div>
            <div class="form-group">
                <label for="chassis">Chassis</label>
                <input type="text" class="form-control" name="chassis" value="{{(old('chassis')? old('chassis'): $motorcycle->chassis )}}" id="chassis" maxlength='17' required>
                @if ($errors->has('chassis'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('chassis') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="model">Cylinder</label>
                <select class="form-control" name="cylinder_id" id="cylinder" required>
                    <option value="">Select Cylinder</option>
                    @foreach($cylinders as $cylinder)
                        @if(old("cylinder_id"))
                            <option value="{{$cylinder->id}}" {{ (old("cylinder_id") == $cylinder->id ? "selected":"") }}>{{$cylinder->name}}</option>
                        @else
                            <option value="{{$model->id}}" {{ ( $motorcycle->cylinder_id == $cylinder->id ? "selected":"") }}>{{$cylinder->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="engine_serial_number">Engine Serial Number</label>
                <input type="text" class="form-control" name="engine_serial_number" value="{{(old('engine_serial_number')? old('engine_serial_number'): $motorcycle->engine_serial_number )}}" id="engine_serial_number" maxlength='17' required>
                @if ($errors->has('engine_serial_number'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('engine_serial_number') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <select class="form-control" name="color_id" id="color" required>
                    <option value="">Select Color</option>
                    @foreach($colors as $color)
                        @if(old("color_id"))
                            <option value="{{$color->id}}" {{ (old("color_id") == $color->id ? "selected":"") }}>{{$color->name}}</option>
                        @else
                            <option value="{{$color->id}}" {{ ( $motorcycle->color_id == $color->id ? "selected":"") }}>{{$color->name}}</option>
                        @endif
                    @endforeach 
                </select>
            </div>
            <div class="form-group">
                <label for="extra_information">Extra Information (Description)</label>
                <textarea class="form-control" id="extra_information" name="extra_information" rows="3" required>{{(old('extra_information')? old('extra_information'): $motorcycle->extra_information )}}</textarea>
                @if ($errors->has('extra_information'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('extra_information') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Choose Images</label>
                <input type="file" class="form-control" id="images" name="images[]" onchange="preview_image();" multiple {{($motorcycle->motorcycleImage->isEmpty()?"required":"")}}>
            </div>
            <div id="images_preview" class="text-center mb-3">
                @foreach($motorcycle->motorcycleImage as $image)
                <div class="image-area">
                    <button type="button" data-id={{$image->id}} class="close AClass rounded-lg image-delete-button">
                        <span>&times;</span>
                    </button>
                    <img width='200' height='150' class='rounded p-2' src="{{ asset($image->url) }}">
                </div>
                   
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/motorcycle.js")}}></script>
@endsection