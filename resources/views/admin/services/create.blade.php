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
<form action="{{ url('admin/services/create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            Thêm dịch vụ
            <button style="float: right;" class="btn btn-danger" type="submit"> Lưu</button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Tiêu đề*</label>
                        <input type="text" name="title" class="form-control" value="" required>
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Nội dung*</label>
                        <input type="text" name="content" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ảnh:
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image" onchange="readURL(event, 1)">
                            <label class="custom-file-label" for="customFile">
                                Chọn hình ảnh
                            </label>
                        </div>
                        <img id="img1" width="200" height="200" src="../../public/storage/not-found.jpeg">
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