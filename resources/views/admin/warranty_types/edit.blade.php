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
<form action="{{ url('admin/warranty_types/edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            Chỉnh sửa chính sách bảo hành
            <button style="float: right;" class="btn btn-danger" type="submit"> Lưu</button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="id" class="form-control" value="{{$warranty_types->id}}">
                    <div class="form-group ">
                        <label for="title">Tên *</label>
                        <input type="text" name="name" class="form-control" value="{{$warranty_types->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Mô tả ngắn</label>
                        <textarea type="text" name="content" class="form-control my-editor" rows="30">{{$warranty_types->content}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@section('scripts')
@parent

@endsection
@endsection