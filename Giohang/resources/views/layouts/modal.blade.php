<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product{{$item->id}}">
    Edit
</button>
<div class="modal fade" id="product{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="form-group">
                    <label for="name" class="col-form-label">ID Sản phẩm </label>
                    <input type="text" class="form-control" id="n{{$item->id}}" name="name" value="{{$item->id}}" readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên sản phẩm <span
                            class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="name{{$item->id}}" name="name" value="{{$item->name}}">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả sản phẩm</label>
                    <input type="text" class="form-control" id="description{{$item->id}}" name="description" value="{{$item->description}}">
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Giá: <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" id="price{{$item->id}}" name="price" value="{{$item->price}}">
                </div>
                <div class="form-group">
                    <label for="image" class="col-form-label">Hình ảnh<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="image{{$item->id}}" name="image" value="{{$item->image}}">
                    <span class="text-danger">Đường link của ảnh</span>
                </div>
                <div class="form-group">
                    <span class="text-danger">* : bắt buộc phải nhập</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editProduct({{$item->id}})" data-dismiss="modal">Áp dụng</button>
            </div>
        </div>
    </div>
</div>
