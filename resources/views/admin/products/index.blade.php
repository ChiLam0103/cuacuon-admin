@extends('layouts.admin')
@section('content')
@can('permission_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a type="button" class="btn btn-success" href="{{ url('admin/products/create') }}">Thêm sản phẩm</a>
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
<div class="card">
    <div class="card-header">
        Danh sách sản phẩm
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Tên sản phẩm </th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Giá</th>
                        <th>Thương hiệu</th>
                        <th>Loại sản phẩm</th>
                        <th>Tương thích</th>
                        <th>Ngày tạo </th>
                        <th>Ngày chỉnh sửa </th>
                        <th>&nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td> {{ $k->name ?? '' }} </td>
                        <td><img src="$k->image_link ?? '' }}" width="150"> </td>
                        <td> {{number_format($k->price) ?? '' }} đ</td>
                        <td> {{ $k->brand_name ?? '' }}</td>
                        <td> {{ $k->type_name ?? '' }}</td>
                        <td>
                            @foreach($range_product as $rp)
                            @if($rp->product_id == $k->id)
                            {{ $rp->size_name ?? '' }},
                            @endif
                            @endforeach</td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}
                        </td>
                        <td>{{($k->updated_at==null)|| ($k->updated_at=='0000-00-00 00:00:00')?'': date('d/m/Y H:i:s', strtotime($k->updated_at))}}
                        </td>
                        <td>
                            @can('permission_edit')
                            <a class="btn btn-xs btn-info" id="btnEdit" href="{{ url('admin/products/edit',$k->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('permission_delete')
                            <form action="{{ route('admin.products.destroy', $k->id) }}" method="POST"
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
//hiển thị hình ảnh khi chọn file
function readURL(event, id) {
    var output = document.getElementById('img' + id);
    output.src = URL.createObjectURL(event.target.files[0]);
};

function sltType(selectObject) {
    var value = selectObject.value;
    if (value == 1 || value == 2) {
        $('.range_id').css('display', 'inline-block');
    } else {
        $('.range_id').css('display', 'none');
    }
}
$(".sltTypeNew").on('change', function(e) {
    var value = $(this).val();
    if (value == 1 || value == 2) {
        $('.range_id').css('display', 'inline-block');
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