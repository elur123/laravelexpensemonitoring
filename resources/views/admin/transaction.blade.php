@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mt-4 mb-2">Paid</h5>
            <p class="card-text text-mute">Total Amount : {{ $stats['paid_user1'] + $stats['paid_user2'] }}</p>
        </div>
        <div class="card-body bg-dark text-white">
            <div class="ul-widget-card__info"><span>
                    <p>{{ $stats['paid_user1'] }}</p>
                    <p class="text-mute">User 1</p>
                </span><span>
                    <p>{{ $stats['paid_user2'] }}</p>
                    <p class="text-mute m-0">User 2</p>
                </span></div>
        </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mt-4 mb-2">Credit</h5>
            <p class="card-text text-mute">Total Amount: {{ $stats['credit_user1'] + $stats['credit_user2'] }}</p>
        </div>
        <div class="card-body bg-dark text-white">
            <div class="ul-widget-card__info"><span>
                    <p>{{ $stats['credit_user1'] }}</p>
                    <p class="text-mute">User 1</p>
                </span><span>
                    <p>{{ $stats['credit_user2'] }}</p>
                    <p class="text-mute m-0">User 2</p>
                </span></div>
        </div>
    </div>
  </div>
</div>

<br><br>




  <div class="col-xs-12">
      <div class="box">
          <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-bg btn-flat"><i class="fa fa-plus"></i> New Transaction</a>
          </div>
          <br>
          <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered">
                  <thead>

                      <th>User</th>
                      <th>Supplier</th>
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
                      @foreach( $transactions as $transaction)

                      <tr>

                          <td>{{$transaction->users->name}}</td>
                          <td>{{$transaction->suppliers->name}}</td>
                          <td>{{$transaction->products->name}}</td>
                          <td>{{$transaction->qty}}</td>
                          <td>{{$transaction->price}}</td>
                          <td>{{$transaction->unit}}</td>
                          <td>{{$transaction->total}}</td>
                          <td>{{$transaction->status}}</td>
                          <td>{{$transaction->paids->name}}</td>
                          <td>{{$transaction->method}}</td>
                          <td>

                              <a href="#edit{{$transaction->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                              <a href="{{ route('transactions.destroy', $transaction->id) }}" onclick="event.preventDefault();
                              document.getElementById('delete-form').submit();" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                              <form id="delete-form" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: none;">
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


@foreach( $transactions as $transaction)
@include('includes.edit_delete_transaction')
@endforeach

@include('includes.add_transaction')

@endsection
