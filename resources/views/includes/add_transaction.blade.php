<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Transaction</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('transactions.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="main_user" class="col-sm-3 control-label">Users</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="main_user" name="main_user" required>
                                <option value="" selected>- Select -</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="supplier" class="col-sm-3 control-label">Supplier</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <select class="form-control" id="supplier" name="supplier" required>
                                    <option value="" selected>- Select -</option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <a href="#addnewsupplier" data-toggle="modal"  class="btn btn-primary">New</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product" class="col-sm-3 control-label">Product</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="product" name="product" required>
                                <option value="" selected>- Select -</option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="qty" class="col-sm-3 control-label">QTY</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="qty" name="qty" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit" class="col-sm-3 control-label">Unit</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="unit" name="unit" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="" selected>- Select -</option>
                                <option value="Active"> Paid </option>
                                <option value="Pending"> Pending </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="paid_user" class="col-sm-3 control-label">Paid By:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="paid_user" name="paid_user" required>
                                <option value="" selected>- Select -</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="method" class="col-sm-3 control-label">Method</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="method" name="method" required>
                                <option value="" selected>- Select -</option>
                                <option value="Bank"> Bank </option>
                                <option value="Paypal"> Paypal </option>
                                <option value="Cash"> Cash </option>
                            </select>
                        </div>
                    </div>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add -->
<div class="modal fade" id="addnewsupplier">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add Supplier</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('transactions-supplier') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Supplier Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="" selected>- Select -</option>
                                <option value="Active"> Active </option>
                                <option value="Inactive"> Inactive </option>
                            </select>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
