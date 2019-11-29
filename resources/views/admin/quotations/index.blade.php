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
        Danh sách đơn hàng
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>ID đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th> Email</th>
                        <th> SĐT</th>
                        <th> Nội dung</th>
                        <th> Ngày tạo </th>
                        <th>&nbsp; </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotations as $key => $k)
                    <tr data-entry-id="{{ $k->pq_id }}">
                        <td>{{ $k->pq_id ?? '' }} </td>
                        <td> {{ $k->name ?? '' }} </td>
                        <td> {{ $k->email ?? '' }} </td>
                        <td> {{ $k->phone ?? '' }} </td>
                        <td> {{ $k->content ?? '' }} </td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}</td>
                        <td> <a class="btn btn-xs btn-info" href="{{ url('admin/quotations/detail',$k->pq_id) }}">
                                Chi tiết
                            </a></td>
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

        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
    })
</script>
@endsection
@endsection