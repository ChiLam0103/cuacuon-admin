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
        Thông tin khách hàng
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>ID đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Nội dung</th>
                        <th>Ngày tạo </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td>{{ $k->pq_id ?? '' }} </td>
                        <td> {{ $k->name ?? '' }} </td>
                        <td> {{ $k->email ?? '' }} </td>
                        <td> {{ $k->phone ?? '' }} </td>
                        <td> {{ $k->content ?? '' }} </td>
                        <td>{{($k->created_at==null) || ($k->created_at=='0000-00-00 00:00:00')?'':date('d/m/Y H:i:s', strtotime($k->created_at))}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Thông tin sản phẩm
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Loại sản phẩm </th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $k)
                    <tr data-entry-id="{{ $k->id }}">
                        <td width="100"><img src="{{ url('/'). '/' .  $k->image_link ?? '' }}" width="100"> </td>
                        <td> {{ $k->name ?? '' }} </td>
                        <td> {{ $k->brand_name ?? '' }} </td>
                        <td> {{ $k->type_name ?? '' }} </td>
                        <td> {{number_format($k->price) ?? '' }} đ</td>
                        <td> {{ $k->quantity ?? '' }} </td>
                        <td>{{number_format($k->price*$k->quantity) ?? '' }} đ</td>
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

</script>
@endsection
@endsection