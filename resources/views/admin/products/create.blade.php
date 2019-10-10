@extends('layouts.admin')
@section('content')
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@elseif((\Session::has('fail')))
<div class="alert alert-error">
    {!! \Session::get('fail') !!}
</div>
@endif
<form action="{{ url('admin/products/create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            Thêm sản phẩm
            <button style="float: right;" class="btn btn-danger" type="submit"> Lưu</button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="title">Tên sản phẩm*</label>
                        <input type="text" name="name" class="form-control" value="" required>
                    </div>
                    <div class="form-group ">
                        <label for="title">Giá sản phẩm*</label>
                        <input type="text" name="price" class="form-control" value="" required>
                    </div>
                    <div class="form-group ">
                        <label for="title">Thương hiệu</label>
                        <select class="form-control" name="brand_id">
                            @foreach($brands as $b)
                            <option value="{{$b->id}}">{{$b->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="title">Loại sản phẩm</label>
                        <select class="form-control sltTypeNew" name="type_id">
                            @foreach($types as $t)
                            <option value="{{$t->id}}">{{$t->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach($ranges as $r)
                    <div class="range_id" style="display: none">
                        <label class="checkbox-inline range_id"><input type="checkbox" name="range_id[]"
                                value="{{$r->id}}">{{$r->size_name}}</label>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ảnh sản phẩm:
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="product_image"
                                onchange="readURL(event, 1)">
                            <label class="custom-file-label" for="customFile">
                                Chọn hình ảnh
                            </label>
                        </div>
                        <img id="img1" width="200" height="200" src="../../public/storage/not-found.jpeg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Mô tả ngắn</label>
                        <textarea type="text" name="short_description" class="form-control my-editor"
                            rows="5"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="title">Mô tả</label>
                        <textarea type="text" name="description" class="form-control my-editor" rows="5"></textarea>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</form>
@section('scripts')
@parent
<script>
//hiển thị hình ảnh khi chọn file
function readURL(event, id) {
    var output = document.getElementById('img' + id);
    output.src = URL.createObjectURL(event.target.files[0]);
};
$(".sltTypeNew").on('change', function(e) {
    var value = $(this).val();
    if (value == 1 || value == 2) {
        $('.range_id').css('display', 'inline-block');
    } else {
        $('.range_id').css('display', 'none');
    }
});
</script>
@endsection
@endsection