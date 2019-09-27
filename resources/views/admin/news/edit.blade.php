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
<div class="card">
    <div class="card-header">
        Chỉnh sửa tin tức
    </div>
    <div class="card-body">
        <form action="{{ url('admin/news/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" class="form-control" value="{{$news->id}}">
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Tên tiêu đề*</label>
                    <input type="text" name="title" class="form-control" value="{{$news->title}}" required>
                </div>
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Loại tin tức</label>
                    <select class="form-control sltTypeNew" name="new_type">
                        @foreach($new_types as $k)
                            <option value="{{$k->id}}" @if($news->new_type==$k->id) selected @endif>{{$k->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Mô tả</label>
                    <textarea name="content" class="form-control my-editor">{{$news->content}}</textarea>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="Lưu">
                </div>
            </div>
        </form>
    </div>
</div>
@section('scripts')
@parent
<script>


</script>
@endsection
@endsection