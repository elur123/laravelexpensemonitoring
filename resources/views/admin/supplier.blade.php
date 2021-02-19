@extends('layouts.admin')

@section('content')

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="#addnewsupplier" data-toggle="modal" class="btn btn-primary btn-md btn-flat"><i class="fa fa-plus"></i> New Supplier</a>
                <br><br>
            </div>
            <div class="box-body">
                <table id="zero_configuration_table" class="table table-bordered">
                    <thead>
                        <th>Supplier ID</th>
                        <th>Supplier Name</th>
                        <th>Description</th>
                        <th>status</th>

                        <th>Tools</th>
                    </thead>
                    <tbody>
                        @foreach( $suppliers as $supplier)

                        <tr>
                            <td>{{$supplier->id}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->description}}</td>
                            <td>{{$supplier->status}}</td>

                            <td>

                                <a href="#edit{{$supplier->name}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                <a href="#delete{{$supplier->name}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                            </td>
                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach( $suppliers as $supplier)
@include('includes.edit_delete_supplier')
@endforeach

@include('includes.add_supplier')

@endsection
