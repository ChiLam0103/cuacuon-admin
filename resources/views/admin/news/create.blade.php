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
<form action="{{ url('admin/news/create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            Thêm tin tức
            <button style="float: right;" class="btn btn-danger" type="submit"> Lưu</button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Tên tiêu đề*</label>
                        <input type="text" name="title" class="form-control" value="" required>
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Mô tả ngắn*</label>
                        <input type="text" name="sub_content" class="form-control" value="" required>
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Loại tin tức</label>
                        <select class="form-control sltTypeNew" name="new_type">
                            @foreach($new_types as $k)
                            <option value="{{$k->id}}">{{$k->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ảnh đại diện:
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="new_image" onchange="readURL(event, 1)">
                            <label class="custom-file-label" for="customFile">
                                Chọn hình ảnh
                            </label>
                        </div>
                        <img id="img1" width="200" height="200" src="../../public/storage/not-found.jpeg">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Mô tả</label>
                        <textarea name="content" class="form-control my-editor"></textarea>
                    </div>
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