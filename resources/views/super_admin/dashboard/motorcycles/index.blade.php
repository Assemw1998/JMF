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
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="row col-12 text-right mb-4">
            <a href="{{ route('super-admin.dashboard.motorcycles-create-view')}}" class="btn btn-outline-primary"><i class="nav-icon fa fa-motorcycle"></i> Add New  </a>
        </div>
        <div class="row col-12 text-center">
            <table id="motorcycles_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Chassis Number</th>
                        <th>Year</th>
                        <th>Cylinder</th>
                        <th>Engine Serial Number</th>
                        <th>Color</th>
                        <th>Extra Information</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motorcycles as $motorcycle)
                        <tr>
                            <td>{{$motorcycle->id}}</td>
                            <td>{{$motorcycle->make->name}}</td>
                            <td>{{$motorcycle->model->name}}</td>
                            <td>{{$motorcycle->chassis}}</td>
                            <td>{{$motorcycle->year}}</td>
                            <td>{{$motorcycle->cylinder->name}}</td>
                            <td>{{$motorcycle->engine_serial_number}}</td>
                            <td>{{$motorcycle->color->name}}</td>
                            <td>{{$motorcycle->extra_information}}</td>
                            <td>{{$motorcycle->superAdminCreatedBy->full_name}}</td>
                            <td>{{$motorcycle->superAdminUpdatedBy->full_name}}</td>
                            <td>{{$motorcycle->created_at}}</td>
                            <td>{{$motorcycle->updated_at}}</td>
                            <td>
                                <a href="{{ route('super-admin.dashboard.motorcycles-view',['id' => $motorcycle->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Chassis Number</th>
                        <th>Year</th>
                        <th>Cylinder</th>
                        <th>Engine Serial Number</th>
                        <th>Color</th>
                        <th>Extra Information</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/motorcycle.js")}}></script>
@endsection