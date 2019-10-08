@extends('layouts.admin')
@section('content')
@can('permission_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">Thêm chính sách bảo hành</button>
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
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm chính sách bảo hành</h4>
            </div>
            <form action="{{ url('admin/warranty_types/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Tên chính sách bảo hành*</label>
                        <input type="text" name="name" class="form-control" value="">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Mô tả</label>
                                    <textarea name="content" class="form-control my-editor"></textarea>
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
        Danh sách thương hiệu
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th> Tên chính sách bảo hành </th>
                        <th> Ngày tạo </th>
                        <th> Ngày chỉnh sửa </th>
                        <th> &nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warranty_types as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td> {{ $k->name ?? '' }} </td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}</td>
                        <td>{{($k->updated_at==null)|| ($k->updated_at=='0000-00-00 00:00:00')?'': date('d/m/Y H:i:s', strtotime($k->updated_at))}}</td>
                        <td>
                            @can('permission_edit')
                            <a class="btn btn-xs btn-info" href="{{ url('admin/warranty_types/edit',$k->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            <input type="hidden" id='content_{{$k->id}}' value="{{$k->content}}">
                            @endcan
                            @can('permission_delete')
                            <form action="{{ route('admin.warranty_types.destroy', $k->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    $(function() {
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {text: deleteButtonTrans,className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({selected: true}).nodes(), function(entry) {
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