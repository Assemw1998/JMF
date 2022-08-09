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
    <section class="mt-3 content text-dark center pb-5">
        <div class="row col-12 text-right mb-4">
            <a href="{{ route('super-admin.dashboard.customer-create-view')}}" class="btn btn-outline-primary"><i class="nav-icon fa fa-user"></i> Add New Customer</a>
        </div>
        <div class="row col-12 text-center">
            <table id="customer_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Third Name</th>
                        <th>Last Name</th>
                        <th>Nationality ID</th>
                        <th>Mother Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Address 1</th>
                        <th>Address 2</th>
                        <th>City</th>
                        <th>Birth City</th>
                        <th>Date Of Birth</th>
                        <th>ID Number</th>
                        <th>ID Expiry Date</th>
                        <th>License Number</th>
                        <th>License Issue Date</th>
                        <th>License Expiry Date</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>      
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->second_name}}</td>
                            <td>{{$customer->third_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->nationality_id}}</td>
                            <td>{{$customer->mother_name}}</td>
                            <td>{{$customer->phone_number}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->username}}</td>
                            <td>{{$customer->address_1}}</td>
                            <td>{{$customer->address_2}}</td>
                            <td>{{$customer->city->name}}</td>
                            <td>{{$customer->birthCity->name}}</td>
                            <td>{{$customer->date_of_birth}}</td>
                            <td>{{$customer->id_number}}</td>
                            <td>{{$customer->id_expiry_date}}</td>
                            <td>{{$customer->license_number}}</td>
                            <td>{{$customer->license_issue_date}}</td>
                            <td>{{$customer->license_expiry_date}}</td>
                            <td>{{$customer->status}}</td>
                            <td>{{$customer->superAdminCreatedBy->full_name}}</td>
                            <td>{{$customer->superAdminUpdatedBy->full_name}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>{{$customer->updated_at}}</td>
                            <td>
                                <a href="{{ route('super-admin.dashboard.customer-view',['id' => $customer->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Third Name</th>
                        <th>Last Name</th>
                        <th>Nationality ID</th>
                        <th>Mother Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Address 1</th>
                        <th>Address 2</th>
                        <th>City</th>
                        <th>Birth City</th>
                        <th>Date Of Birth</th>
                        <th>ID Number</th>
                        <th>ID Expiry Date</th>
                        <th>License Number</th>
                        <th>License Issue Date</th>
                        <th>License Expiry Date</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>   
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/customer.js")}}></script>
@endsection