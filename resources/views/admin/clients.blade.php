@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mt-4 mb-2">User 1</h5>
                <p class="card-text text-mute">
                    <span class="float-left">Total Unpaid : {{ $stats['user_pending1'] }}</span>
                    <span class="float-right">Total Paid : {{ $stats['user_paid1'] }}</span>
                </p>
            </div>
            <div class="card-body bg-dark text-white">
                <div class="ul-widget-card__info">
                    <span>
                        <p>{{ $stats['bank_user1'] }}</p>
                        <p class="text-mute">Bank</p>
                    </span>
                    <span>
                        <p>{{ $stats['paypal_user1'] }}</p>
                        <p class="text-mute m-0">Paypal</p>
                    </span>
                    <span>
                        <p>{{ $stats['cash_user1'] }}</p>
                        <p class="text-mute m-0">Cash</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mt-4 mb-2">User 2</h5>
                <p class="card-text text-mute">
                    <span class="float-left">Total Unpaid : {{ $stats['user_pending2'] }}</span>
                    <span class="float-right">Total Paid : {{ $stats['user_paid2'] }}</span>
                </p>
            </div>
            <div class="card-body bg-dark text-white">
                <div class="ul-widget-card__info">
                    <span>
                        <p>{{ $stats['bank_user2'] }}</p>
                        <p class="text-mute">Bank</p>
                    </span>
                    <span>
                        <p>{{ $stats['paypal_user2'] }}</p>
                        <p class="text-mute m-0">Paypal</p>
                    </span>
                    <span>
                        <p>{{ $stats['cash_user2'] }}</p>
                        <p class="text-mute m-0">Cash</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mt-4 mb-2">Total</h5>
                <p class="card-text text-mute">
                    <span class="float-left">Total Pending : {{ $stats['user_pending1'] + $stats['user_pending2'] }}</span>
                    <span class="float-right">Total Paid : {{ $stats['user_paid1'] + $stats['user_paid2'] }}</span>
                </p>
            </div>
            <div class="card-body bg-dark text-white">
                <div class="ul-widget-card__info">
                    <span>
                        <p>{{ $stats['bank_user1'] + $stats['bank_user2'] }}</p>
                        <p class="text-mute">Bank</p>
                    </span>
                    <span>
                        <p>{{ $stats['paypal_user1'] + $stats['paypal_user2'] }}</p>
                        <p class="text-mute m-0">Paypal</p>
                    </span>
                    <span>
                        <p>{{ $stats['cash_user2'] + $stats['cash_user2'] }}</p>
                        <p class="text-mute m-0">Cash</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>






<div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New
                Client Transaction</a>
        </div>
        <br>
        <div class="box-body">
            <table id="zero_configuration_table" class="table table-bordered">
                <thead>

                    <th>User</th>
                    <th>Client Name</th>
                    <th>Product</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Paid User</th>
                    <th>Method</th>
                    <th>Tools</th>
                </thead>
                <tbody>
                    @foreach( $clients as $client)

                    <tr>

                        <td>{{$client->users->name}}</td>
                        <td>{{$client->customers->name}}</td>
                        <td>{{$client->products->name}}</td>
                        <td>{{$client->qty}}</td>
                        <td>{{$client->price}}</td>
                        <td>{{$client->unit}}</td>
                        <td>{{$client->total}}</td>
                        <td><span class="badge {{ $client->status == 'Active' ? "badge-success" : "badge-danger" }}"> {{$client->status == 'Active' ? "Paid" : "Unpaid"}} </span></td>
                        <td>{{$client->paids->name}}</td>
                        <td>{{$client->method}}</td>
                        <td>

                            <a href="#edit{{$client->id}}" data-toggle="modal"
                                class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                            <a href="{{ route('clients.destroy', $client->id) }}" onclick="event.preventDefault();
                                      document.getElementById('delete-form').submit();"
                                class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                            <form id="delete-form" action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@foreach( $clients as $client)
@include('includes.edit_delete_client')
@endforeach

@include('includes.add_client')

@endsection
