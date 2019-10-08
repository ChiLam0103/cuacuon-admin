@extends('layouts.admin')
@section('content')
@can('permission_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">Thêm ảnh bìa trang
            chủ</button>
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
                <h4 class="modal-title">Thêm ảnh bìa trang chủ</h4>
            </div>
            <form action="{{ route('admin.home_banners.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="main_title" class="form-control" value="">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Phụ đề</label>
                        <input type="text" name="sub_title" class="form-control" value="">
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Nút đường dẫn</label>
                        <input type="text" name="button_link" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ảnh bìa:
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image_link"
                                onchange="readURL(event, 1)">
                            <label class="custom-file-label" for="customFile">
                                Chọn hình ảnh
                            </label>
                        </div>
                        <img id="img1" width="200" height="200" src="/storage/not-found.jpeg">
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
                <h4 class="modal-title">Chỉnh sửa ảnh bìa trang chủ</h4>
            </div>
            <form action="{{ url('admin/home_banners/edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" id="form-edit">
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
        Danh sách ảnh bìa trang chủ
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Ảnh bìa</th>
                        <th>Tiêu đề</th>
                        <th>Phụ đề</th>
                        <th>Nút đường dẫn</th>
                        <th>Ngày tạo </th>
                        <th>Ngày chỉnh sửa </th>
                        <th> &nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($home_banners as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td><img src="{{url('/') .'/public' .$k->image_link ?? '' }}" width="150"></td>
                        <td> {{ $k->main_title?? '' }}</td>
                        <td> {{ $k->sub_title ?? '' }}</td>
                        <td> {{ $k->button_link ?? '' }}</td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}
                        </td>
                        <td>{{($k->updated_at==null)|| ($k->updated_at=='0000-00-00 00:00:00')?'': date('d/m/Y H:i:s', strtotime($k->updated_at))}}
                        </td>
                        <td>
                            @can('permission_edit')
                            <a class="btn btn-xs btn-info" id="btnEdit" href="#" data-id="{{$k->id}}"
                                data-toggle="modal" data-target="#edit">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('permission_delete')
                            <form action="{{ route('admin.home_banners.destroy', $k->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
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
$(document).ready(function() {
    $(document).on('click', '#btnEdit', function() {
        var id = $(this).data('id');
        $('#form-data').remove();
        $.ajax({
            url: '{{ url("admin/home_banners/ajax/getedit") }}',
            method: "POST",
            data: {
                id: id,
                _token: "{{csrf_token()}}"
            },
            dataType: "text",
            success: function(data) {
                if (data != '') {
                    $('#form-edit').append(data);
                } else {
                    console.log(1);
                }
            }
        });
    });
});
//hiển thị hình ảnh khi chọn file
function readURL(event, id) {
    var output = document.getElementById('img' + id);
    output.src = URL.createObjectURL(event.target.files[0]);
};
$('.type_id').on('change', function(e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if (valueSelected == 1 || valueSelected == 2) {
        $('.range_id').css('display', 'inline-block');
        $('.range_id').css('margin-right', '1em');
    } else {
        $('.range_id').css('display', 'none');
    }
});

function edit(id, name, price, brand_id, type_id, description, image_link) {
    $('#id').val(id);
    $('#name').val(name);
    $('#price').val(price);
    $('#description').val(description);
    if (image_link != '') {
        $('#img2').attr('src', image_link);
    }
    $('#brand_id option').each(function() {
        if ($(this).val() == brand_id) {
            $(this).prop("selected", true);
        }
    });
    $('#type_id option').each(function() {
        if ($(this).val() == type_id) {
            $(this).prop("selected", true);
        }
    });
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
});
</script>
@endsection
@endsection