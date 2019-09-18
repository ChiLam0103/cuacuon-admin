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

<!-- Modal chinh sua-->
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chinh sửa liên hệ</h4>
            </div>
            <form action="{{ route('admin.contacts.edit',0) }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input name="id" id="id" type="hidden">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Tên</label>
                        <input type="text" name="name" id="name" class="form-control" value="">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Nội dung</label>
                        <textarea type="text" name="content" id="content" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Danh sách liên hệ
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th> Tên </th>
                        <th> Email </th>
                        <th> Số điện thoại </th>
                        <th> Nội dung </th>
                        <th> Ngày tạo </th>
                        <th> Ngày chỉnh sửa </th>
                        <th> &nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td> </td>
                        <td> {{ $k->name ?? '' }} </td>
                        <td> {{ $k->email ?? '' }} </td>
                        <td> {{ $k->phone ?? '' }} </td>
                        <td> {{ $k->content ?? '' }} </td>
                        <td>{{date('d/m/Y H:i:s', strtotime($k->created_at))}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($k->updated_at))}}</td>
                        <td>
                            <a class="btn btn-xs btn-info" href="#" data-toggle="modal" data-target="#edit" onclick="edit('{{$k->id}}','{{$k->name}}','{{$k->email}}','{{$k->phone}}','{{$k->content}}')">
                                {{ trans('global.edit') }}
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $k->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    function edit(id, name,email,phone,content) {
        $('#id').val(id);
        $('#name').val(name);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#content').val(content);
    }
    $(function() {
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans,
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert("{{ trans('global.datatables.zero_selected') }}")

                    return
                }

                if (confirm("{{ trans('global.areYouSure') }}")) {
                    $.ajax({
                            headers: {
                                "x-csrf-token": _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
    })
</script>
@endsection
@endsection