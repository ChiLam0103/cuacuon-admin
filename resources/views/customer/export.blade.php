<!DOCTYPE html>
<html lang="">

<body>
    <table>
        <thead>
            <tr>{{dd(1)}}
                <th>Địa Chỉ | Số 1 Lương Yên, Q.Hai Bà Trưng, Hà Nội</th>
            </tr>
            <tr>
                <th>Phone | (+84) 934 323 882</th>
            </tr>
            <tr>
                <th>Email | support@suplo.vn</th>
            </tr>
        </thead>
    </table>
    <table>
        <thead>
            <tr>
                <td colspan="13" style="text-align: center">
                    <h1 style="color: yellow">BÁO GIÁ SẢN PHẨM</h1>
                </td>
            </tr>
        </thead>
    </table>
    <table>
        <tr>
            <th>Từ Ngày: </th>
            <td>01/01/2019</td>
        </tr>
        <tr>
            <th>Đến Ngày: </th>
            <td>30/12/2019</td>
        </tr>
    </table>
    <table>
        <thead>
            <tr style="background-color: #0B90C4">
                <th>STT</th>
                <th>Tên Đơn Hàng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listResult as $k => $value)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $value->name ?? '' }}</td>
                <td>{{ $value->price ??''}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>