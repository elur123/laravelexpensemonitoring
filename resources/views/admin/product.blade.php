@extends('layouts.admin')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>
                New Product</a>
        </div> <br><br>
        <div class="box-body">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="ul-widget-card__title-info text-center mb-3">
                                <p class="m-0 text-24">{{ $product->name }} </p>
                                <p class="text-muted m-0">{{ $product->category }}</p>
                            </div>
                            <div class="user-profile mb-4">
                                <div class="ul-widget-card__user-info"><img class="profile-picture avatar-lg mb-2" src="/myfiles/ProductImage/{{ $product->image }}" alt="" /></div>
                            </div>
                            <div class="ul-widget-card__full-status mb-3">
                                <div class="ul-widget-card__status1"><span>{{ $product->user1_qty }}</span><span class="text-mute">User 1</span></div>
                                <div class="ul-widget-card__status1"><span>{{ $product->user1_qty + $product->user2_qty }}</span><span class="text-mute">Quantity</span></div>
                                <div class="ul-widget-card__status1"><span>{{ $product->user2_qty }}</span><span class="text-mute">User 2</span></div>
                            </div>
                            <div class="mt-2">
                                <a href="#edit{{$product->id}}" class="btn btn-primary btn-block m-1" data-toggle="modal">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@foreach( $products as $product)
@include('includes.edit_delete_product')
@endforeach

@include('includes.add_product')

@endsection
