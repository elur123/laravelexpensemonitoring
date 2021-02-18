<!-- Add -->
<div class="modal fade" id="edit{{$client->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Update Client Transaction</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('clients.update', $client->id) }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $client->id }}">
                    <input type="hidden" id="paid_user" name="paid_user" value="{{ $client->paid_user_id }}">
                    <input type="hidden" id="method" name="method" value="{{ $client->method }}">
                    <div class="form-group">
                        <label for="main_user" class="col-sm-3 control-label">Users</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="main_user" name="main_user" required>
                                <option value="" selected>- Select -</option>
                                @foreach($users as $user)
                                    <option {{ $user->id == $client->main_user_id ? "selected" : "" }} value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="supplier" class="col-sm-3 control-label">Client Name</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="customer" name="customer" required>
                                <option value="" selected>- Select -</option>
                                @foreach($customers as $customer)
                                <option {{ $customer->id == $client->customer_id  ? "selected" : ""}} value="{{$customer->id}}">{{$customer->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product" class="col-sm-3 control-label">Product</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="product" name="product" required>
                                <option value="" selected>- Select -</option>
                                @foreach($products as $product)
                                <option {{ $product->id == $client->product_id ? "selected" : "" }} value="{{$product->id}}">{{$product->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="qty" class="col-sm-3 control-label">QTY</label>

                        <div class="col-sm-9">
                            <input value="{{ $client->qty }}" type="text" class="form-control" id="qty" name="qty" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <input value="{{ $client->price }}" type="text" class="form-control" id="price" name="price" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit" class="col-sm-3 control-label">Unit</label>

                        <div class="col-sm-9">
                            <input value="{{ $client->unit }}" type="text" class="form-control" id="unit" name="unit" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="" selected>- Select -</option>
                                <option {{ $client->status == "Active" ? "selected" : "" }} value="Active"> Paid </option>
                                <option {{ $client->status == "Pending" ? "selected" : "" }} value="Pending"> Pending </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="paid_user" class="col-sm-3 control-label">Paid By:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="paid_user" name="paid_user" required {{ $client->status == "Pending" ? "disabled" : "" }}>
                                <option value="" selected>- Select -</option>
                                @foreach($users as $user)
                                <option {{ $user->id == $client->paid_user_id ? "selected" : "" }} value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="method" class="col-sm-3 control-label">Method</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="method" name="method" required {{ $client->status == "Pending" ? "disabled" : "" }}>
                                <option value="" selected>- Select -</option>
                                <option {{ $client->method == "Bank" ? "selected" : "" }} value="Bank"> Bank </option>
                                <option {{ $client->method == "Paypal" ? "selected" : "" }} value="Paypal"> Paypal </option>
                                <option {{ $client->method == "Cash" ? "selected" : "" }} value="Cash"> Cash </option>
                            </select>
                        </div>
                    </div>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
