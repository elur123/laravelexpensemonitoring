<!-- Add -->
<div class="modal fade" id="edit{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Update Product</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="text" id="id" name="id" value="{{ $product->id }}" hidden>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Product Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Category</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="category" name="category" value={{ $product->category }} required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status" required>
                                <option value="" selected>- Select -</option>
                                <option {{ $product->status == 'Active' ? "selected" : "" }} value="Active"> Active </option>
                                <option {{ $product->status == 'Inactive' ? "selected" : "" }} value="Inactive"> Inactive </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Image</label>

                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="image" name="image" accept="image/x-png,image/gif,image/jpeg">
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
