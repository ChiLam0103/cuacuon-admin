<!DOCTYPE html>
<html lang="">

<body>
    <table>
        <thead>
            <tr>
                <th style="height:50"></th>
            </tr>
        </thead>
    </table>
    <table>
        <thead>
            <tr>
                <td colspan="10" style="text-align: center">
                    <h1 style="color: yellow">PHIẾU BÁO GIÁ</h1>
                </td>
            </tr>
        </thead>
    </table>
    <h5>Tên KH: {{$infoCustomer->name}}</h5>
    <h5>Số điện thoại: {{$infoCustomer->phone}}</h5>
    <h5>Email: {{$infoCustomer->email}}</h5>
    <h5>Quy cách bộ cửa: Ngang {{$infoCustomer->width}}m, Cao: {{$infoCustomer->height}}m</h5>

    <table>
        <thead>
            <tr style="background-color: #0B90C4">
                <th>STT</th>
                <th>Mô tả</th>
                <th>Mã số</th>
                <th>Diện tích</th>
                <th>Đơn vị</th>
                <th>Đơn giá</th>
                <!-- <th>Thành tiền</th> -->
                <!-- <th>Chiết khấu</th> -->
                <!-- <th>Giá sau chiết khấu</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($listResult as $k => $value)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $value->type_name ??''}}</td>
                <td>{{ $value->name ??''}}</td>
                <td>@if($infoCustomer->cuacuon_id==$value->id) {{$infoCustomer->width*$infoCustomer->height}} @else 1 @endif</td>
                <td>@if($infoCustomer->cuacuon_id==$value->id) m2 @else bộ @endif</td>
                <td>{{ number_format($value->price) ??''}}</td>
                <!-- <td>{{ number_format($value->price) ??''}}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <tr>
            <th style="color:red">Tổng tiền cửa: {{number_format($listResult->sum('price'))}} vnđ</th>
        </tr>
    </table>
    <h3>Ghi chú:</h3>
    <h5>-Đơn giá trên chưa bao gồm 10% VAT<h5>

</body>

</html>