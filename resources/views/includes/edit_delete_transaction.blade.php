<!-- Add -->
<div class="modal fade" id="edit{{$transaction->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Transaction</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $transaction->id }}">
                    <input type="hidden" id="paid_user" name="paid_user" value="{{ $transaction->paid_user_id }}">
                    <input type="hidden" id="method" name="method" value="{{ $transaction->method }}">
                    <div class="form-group">
                        <label for="main_user" class="col-sm-3 control-label">Users</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="main_user" name="main_user" required>
                                <option value="" >- Select -</option>
                                @foreach($users as $user)
                                    <option {{ $user->id == $transaction->main_user_id ? "selected" : "" }} value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="supplier" class="col-sm-3 control-label">Supplier</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="supplier" name="supplier" required>
                                <option value="">- Select -</option>
                                @foreach($suppliers as $supplier)

                                    <option {{ $supplier->id == $transaction->supplier_id ? "selected" : "" }} value="{{$supplier->id}}">{{$supplier->name}} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product" class="col-sm-3 control-label">Product</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="product" name="product" required>
                                <option value="">- Select -</option>
                                @foreach($products as $product)
                                    <option {{ $product->id == $transaction->product_id ? "selected" : "" }} value="{{$product->id}}">{{$product->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="qty" class="col-sm-3 control-label">QTY</label>

                        <div class="col-sm-9">
                            <input value="{{ $transaction->qty }}" type="text" class="form-control" id="qty" name="qty" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <input value="{{ $transaction->price }}" type="text" class="form-control" id="price" name="price" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit" class="col-sm-3 control-label">Unit</label>

                        <div class="col-sm-9">
                            <input value="{{ $transaction->unit }}" type="text" class="form-control" id="unit" name="unit" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">- Select -</option>
                                <option {{ $transaction->status == "Pending" ? "selected" : "" }} value="Pending"> Pending </option>
                                <option {{ $transaction->status == "Active" ? "selected" : "" }} value="Active"> Paid </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="paid_user" class="col-sm-3 control-label">Paid By:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="paid_user" name="paid_user" required {{ $transaction->status == "Pending" ? "disabled" : "" }}>
                                <option value="">- Select -</option>
                                @foreach($users as $user)
                                    <option {{ $user->id == $transaction->paid_user_id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="method" class="col-sm-3 control-label">Method</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="method" name="method" required {{ $transaction->status == "Pending" ? "disabled" : "" }}>
                                <option value="" selected>- Select -</option>
                                <option {{ $transaction->method == "Bank" ? "selected" : "" }} value="Bank"> Bank </option>
                                <option {{ $transaction->method == "Paypal" ? "selected" : "" }} value="Paypal"> Paypal </option>
                                <option {{ $transaction->method == "Cash" ? "selected" : "" }} value="Cash"> Cash </option>
                            </select>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
