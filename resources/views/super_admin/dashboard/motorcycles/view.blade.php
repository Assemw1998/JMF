@extends('super_admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$motorcycle->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.motorcycles-index')}}">Motorcycle</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="col-6 p-0 mb-2">
            <a class="btn btn-outline-success  update" href="{{ route('super-admin.dashboard.motorcycles-update-view',['id' => $motorcycle->id])}}" data-id="">Update</a>
            <a class="btn btn-outline-danger delete delete" data-id="{{$motorcycle->id}}">Delete</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Make</label>
                    <div>{{$motorcycle->make->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Model</label>
                    <div>{{$motorcycle->model->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Chassis</label>
                    <div>{{$motorcycle->chassis}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Year</label>
                    <div>{{$motorcycle->year}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Cylinder</label>
                    <div>{{$motorcycle->cylinder->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Engine Serial Number</label>
                    <div>{{$motorcycle->engine_serial_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Color</label>
                    <div>{{$motorcycle->color->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Extra Information</label>
                    <div>{{$motorcycle->extra_information}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label class=" d-block">Images</label>
                    @foreach($motorcycle->motorcycleImage as $image)
                    <img width='200' height='150' class='rounded p-2' src="{{ asset($image->url) }}">
                    @endforeach
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created By</label>
                    <div>{{$motorcycle->superAdminCreatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated By</label>
                    <div>{{$motorcycle->superAdminUpdatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created At</label>
                    <div>{{$motorcycle->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated At</label>
                    <div>{{$motorcycle->updated_at}}</div>
                </div>
            </li>
        </ul>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/motorcycle.js")}}></script>
@endsection