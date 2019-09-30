@extends('layouts.admin')
@section('content')
@can('permission_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">Thêm sản phẩm</button>
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
                <h4 class="modal-title">Thêm sản phẩm</h4>
            </div>
            <form action="{{ route('admin.products.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Tên sản phẩm*</label>
                                <input type="text" name="name" class="form-control" value="" required>
                            </div>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Giá sản phẩm*</label>
                                <input type="text" name="price" class="form-control" value="" required>
                            </div>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Mô tả</label>
                                <textarea type="text" name="description" class="form-control" rows="5"></textarea>
                            </div>
                            @foreach($ranges as $r)
                            <div class="range_id" style="display: none">
                                <label class="checkbox-inline range_id"><input type="checkbox" name="range_id[]" value="{{$r->id}}">{{$r->size_name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Thương hiệu</label>
                                <select class="form-control" name="brand_id">
                                    @foreach($brands as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Loại sản phẩm</label>
                                <select class="form-control sltTypeNew" name="type_id" >
                                    @foreach($types as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Ảnh sản phẩm:
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="product_image" onchange="readURL(event, 1)">
                                    <label class="custom-file-label" for="customFile">
                                        Chọn hình ảnh
                                    </label>
                                </div>
                                <img id="img1" width="200" height="200" src="/storage/not-found.jpeg">
                            </div>
                        </div>
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
                <h4 class="modal-title">Chỉnh sửa sản phẩm</h4>
            </div>
            <form action="{{ url('admin/products/edit') }}" method="post" enctype="multipart/form-data">
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
        Danh sách sản phẩm
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10"> </th>
                        <th>Tên sản phẩm </th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Giá</th>
                        <th>Thương hiệu</th>
                        <th>Loại sản phẩm</th>
                        <th>Tương thích</th>
                        <th>Mô tả</th>
                        <th>Ngày tạo </th>
                        <th>Ngày chỉnh sửa </th>
                        <th>&nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td> </td>
                        <td> {{ $k->name ?? '' }} </td>
                        <td><img src="{{ $k->image_link ?? '' }}" width="150"> </td>
                        <td> {{number_format($k->price) ?? '' }}</td>
                        <td> {{ $k->brand_name ?? '' }}</td>
                        <td> {{ $k->type_name ?? '' }}</td>
                        <td>
                            @foreach($range_product as $rp)
                            @if($rp->product_id == $k->id)
                            {{ $rp->size_name ?? '' }},
                            @endif
                            @endforeach</td>
                        <td> {{ $k->description ?? '' }}</td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}</td>
                        <td>{{($k->updated_at==null)|| ($k->updated_at=='0000-00-00 00:00:00')?'': date('d/m/Y H:i:s', strtotime($k->updated_at))}}</td>
                        <td>
                            @can('permission_edit')
                            <a class="btn btn-xs btn-info" id="btnEdit" href="#" data-id="{{$k->id}}" data-toggle="modal" data-target="#edit">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('permission_delete')
                            <form action="{{ route('admin.products.destroy', $k->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                url: '{{ url("admin/products/ajax/getedit") }}',
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
    function sltType(selectObject){
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