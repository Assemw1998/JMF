@extends('super_admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$customer->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.customer-index')}}">Customer</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center pb-5">
        <div class="col-6 p-0 mb-2">
            <a class="btn btn-outline-success  update" href="{{ route('super-admin.dashboard.customer-update-view',['id' => $customer->id])}}" data-id="">Update</a>
            <a class="btn btn-outline-danger delete" data-id="{{$customer->id}}">Delete</a>
            <a class="btn btn-outline-info" href="{{ route('super-admin.dashboard.customer-activate-deactivate',['id' => $customer->id,'status'=>$customer->status])}}">{{($customer->status?'Deactivate':'Activate')}}</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>First Name</label>
                    <div>{{$customer->first_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Second Name</label>
                    <div>{{$customer->second_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Third Name</label>
                    <div>{{$customer->third_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Last Name</label>
                    <div>{{$customer->last_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Nationality ID</label>
                    <div>{{$customer->nationality_id}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Mother Name</label>
                    <div>{{$customer->mother_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Phone Number</label>
                    <div>{{$customer->phone_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Email</label>
                    <div>{{$customer->email}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Username</label>
                    <div>{{$customer->username}}</div>
                </div>
            </li>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Address 1</label>
                    <div>{{$customer->address_1}}</div>
                </div>
            </li>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Address 2</label>
                    <div>{{$customer->address_1}}</div>
                </div>
            </li>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>City</label>
                    <div>{{$customer->city->name}}</div>
                </div>
            </li>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Birth City</label>
                    <div>{{$customer->birthCity->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <div>{{$customer->date_of_birth}}</div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="form-group">
                    <label>ID Number</label>
                    <div>{{$customer->id_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>ID Expiry Date</label>
                    <div>{{$customer->id_expiry_date}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label class=" d-block">ID Image</label>
                    @foreach($customer->IdImage as $image)
                    <img width='200' height='150' class='rounded p-2' src="{{ asset($image->url) }}">
                    @endforeach
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>License Number</label>
                    <div>{{$customer->license_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>License Number</label>
                    <div>{{$customer->license_issue_date}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>License Issue Date</label>
                    <div>{{$customer->license_expiry_date}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label class=" d-block">License Image</label>
                    @if(isset($customer->LicenseImage->url))
                        <img width='200' height='150' class='rounded p-2' src="{{ asset($customer->LicenseImage->url) }}">
                    @endif
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Status</label>
                    <div>{{($customer->status?"Active":"Inactive")}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created By</label>
                    <div>{{$customer->superAdminCreatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated By</label>
                    <div>{{$customer->superAdminUpdatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created At</label>
                    <div>{{$customer->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated At</label>
                    <div>{{$customer->updated_at}}</div>
                </div>
            </li>
        </ul>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/customer.js")}}></script>
@endsection