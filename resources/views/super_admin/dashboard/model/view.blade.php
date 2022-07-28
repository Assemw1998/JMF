@extends('super_admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$model->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                   <a href="{{ route('super-admin.dashboard.model-index')}}">Model</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="col-6 p-0 mb-2">
        <a class="btn btn-outline-success  update" href="{{ route('super-admin.dashboard.model-update-view',['id' => $model->id])}}" data-id="">Update</a>
        <a class="btn btn-outline-danger delete delete" data-id="{{$model->id}}">Delete</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label for="make">Model</label>
                    <div>{{$model->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label for="make">Created By</label>
                    <div>{{$model->superAdminCreatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label for="make">Updated By</label>
                    <div>{{$model->superAdminUpdatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label for="make">Created At</label>
                    <div>{{$model->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label for="make">Updated At</label>
                    <div>{{$model->updated_at}}</div>
                </div>
            </li>
        </ul>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/model.js")}}></script>
@endsection