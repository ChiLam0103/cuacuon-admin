@extends('layouts.admin')
@section('content')
@can('permission_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">Thêm số liệu thống kê</button>
    </div>
</div>
@endcan
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@elseif((\Session::has('fail')))
<div class="alert alert-error">
    {!! \Session::get('fail') !!}
</div>
@endif
<!-- Modal thêm-->
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm số liệu thống kê</h4>
            </div>
            <form action="{{ route('admin.statistics.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="title">Con số*</label>
                        <input type="text" name="number" class="form-control" value="">
                    </div>
                    <div class="form-group ">
                        <label for="title">Giá trị*</label>
                        <input type="text" name="value" class="form-control" value="">
                    </div>
                    <div class="form-group ">
                        <label for="title">Nội dung*</label>
                        <input type="text" name="content" class="form-control" value="">
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
<!-- Modal chinh sua-->
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chinh sửa số liệu thống kê</h4>
            </div>
            <form action="{{ route('admin.statistics.edit',0) }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input name="id" id="edit-id" type="hidden">
                    <div class="form-group">
                        <label for="title">Con số*</label>
                        <input type="text" name="number" id="edit-number" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="title">Giá trị*</label>
                        <input type="text" name="value" id="edit-value" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="title">Nội dung*</label>
                        <input type="text" name="content" id="edit-content" class="form-control" value="">
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
        Danh sách số liệu thống kê
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th> Con số </th>
                        <th>Giá trị </th>
                        <th>Nội dung </th>
                        <th> Ngày tạo</th>
                        <th> Ngày chỉnh sửa </th>
                        <th> &nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statistics as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td> {{ $k->number ?? '' }} </td>
                        <td> {{ $k->value ?? '' }} </td>
                        <td> {{ $k->content ?? '' }} </td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}
                        </td>
                        <td>{{($k->updated_at==null)|| ($k->updated_at=='0000-00-00 00:00:00')?'': date('d/m/Y H:i:s', strtotime($k->updated_at))}}
                        </td>
                        <td>
                            @can('permission_edit')
                            <a class="btn btn-xs btn-info" href="#" data-toggle="modal" data-target="#edit" onclick="edit({{$k->id}},'{{$k->number}}','{{$k->value}}','{{$k->content}}')">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('permission_delete')
                            <form action="{{ route('admin.statistics.destroy', $k->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
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
    function edit(id, number,value,content) {
        $('#edit-id').val(id);
        $('#edit-number').val(number);
        $('#edit-value').val(value);
        $('#edit-content').val(content);
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