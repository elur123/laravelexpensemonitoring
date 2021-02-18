@extends('layouts.admin')

@section('content')

<div class="main-content">

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="#addnewcustomer" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Customer</a>
                <br><br>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th>Description</th>
                        <th>status</th>

                        <th>Tools</th>
                    </thead>
                    <tbody>
                        @foreach( $customers as $customer)

                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->description}}</td>
                            <td>{{$customer->status}}</td>

                            <td>

                                <a href="#edit{{$customer->name}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                <a href="#delete{{$customer->name}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                            </td>
                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@foreach( $customers as $customer)
@include('includes.edit_delete_customer')
@endforeach

@include('includes.add_customer')

@endsection
