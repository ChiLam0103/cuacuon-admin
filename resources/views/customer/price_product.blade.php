@extends('layouts.customer')
@section('pageTitle', 'Báo giá sản phẩm')
@section('content')

<section id="breadcrumb-wrapper5" class="breadcrumb-w-img">
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-content">
        <div class="wrapper">
            <div class="inner text-center">
                <div class="breadcrumb-big">
                    <h2>
                        Báo giá sản phẩm
                    </h2>
                </div>
                <div class="breadcrumb-small">
                    <a href="{{url('/')}}" title="Quay trở về trang chủ">Trang chủ</a>
                    <span aria-hidden="true">/</span>
                    <span>Báo giá sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</section>
<form method="post" enctype="multipart/form-data">
 @csrf
<!-- nhập kích thước cửa -->
<main class="main-content" role="main">
    <div id="page-wrapper">
        <div class="wrapper">
            <div class="inner">
                <div class="grid">
                    <div class="grid__item large--one-whole">
                        <div class="page-contact-wrapper">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                            @elseif((\Session::has('fail')))
                            <div class="alert alert-error">
                                {!! \Session::get('fail') !!}
                            </div>
                            @endif
                            <div class="page-head wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                                <h1>Nhập kích thước cửa</h1>
                            </div>

                            <div class="container" style="display: flex;">
                                <span style="padding-top: 5px;">Chiều rộng(m):</span>
                                <input type="number" class="form-control" name="width" placeholder="Chiều rộng(m)" value="1">

                                <span style="padding-top: 5px;margin-left:20px">Chiều cao(m):</span>
                                <input type="number" class=" form-control" name="height" placeholder="Chiều cao(m)" value="1">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- chọn sản phẩm -->
<main class="main-content" role="main">
    <div id="page-wrapper">
        <div class="wrapper">
            <div class="inner">
                <div class="grid">

                    <div class="grid__item large--one-whole">
                        <div class="page-contact-wrapper">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                            @elseif((\Session::has('fail')))
                            <div class="alert alert-error">
                                {!! \Session::get('fail') !!}
                            </div>
                            @endif
                            <div class="page-head wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                                <h1>Chọn sản phẩm</h1>
                            </div>
                            <div class="page-head wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                <div class="list-product" id="list-product">
                                    <div class="item">
                                        <div class="item-name">1. Cửa cuốn</div>
                                        <div class="choose-item" id="item-1">
                                            <button type="button" class="build-product btn-choose-product" onclick="openChooseProductPopup(this, 1)">
                                                Chọn sản phẩm
                                            </button>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-name">2. Motor</div>
                                        <div class="choose-item" id="item-2">
                                            <button type="button" class="build-product btn-choose-product" onclick="openChooseProductPopup(this, 2)">
                                                Chọn sản phẩm
                                            </button>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-name">3. Bình lưu điện</div>
                                        <div class="choose-item" id="item-3">
                                            <button type="button" class="build-product btn-choose-product" onclick="openChooseProductPopup(this, 3)">
                                                Chọn sản phẩm
                                            </button>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-name">4. Phụ kiện cửa cuốn</div>
                                        <div class="choose-item" id="item-4">
                                            <button type="button" class="build-product btn-choose-product" onclick="openChooseProductPopup(this, 4)">
                                                Chọn sản phẩm
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="build-product" onclick="rebuildProduct()"><i class="fa fa-recycle"></i> Build
                                        lại
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- nhập thông tin -->
<main class="main-content" role="main">
    <div id="page-wrapper">
        <div class="wrapper">
            <div class="inner">
                <div class="grid">
                    <div class="grid__item large--one-whole">
                        <div class="page-contact-wrapper">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                            @elseif((\Session::has('fail')))
                            <div class="alert alert-error">
                                {!! \Session::get('fail') !!}
                            </div>
                            @endif
                            <div class="page-head wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                                <h1>Nhập thông tin để được giá tốt nhất</h1>
                            </div>
                            <div class="container">
                                <label>Họ tên : <span class="alert-danger" id="errorName"></span></label>
                                <input type="text" class="input-full" id="name" name="name" placeholder="Nhập họ tên của bạn" required>
                                <label>Số điện thoại : <span class="alert-danger" id="errorPhone"></span></label>
                                <input type="number" class="input-full" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" required data-inputmask="'alias':'number','mask':' 999 999 9999','placeholder':''" data-mask="" >
                                <label>Email : <span class="alert-danger" id="errorEmail"></span></label>
                                <input type="email" class="input-full" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" required>

                                <button type="submit" formaction="exportExcel" id="exportExcel" class="build-product" disabled><i class="fa fa-download" disabled></i> Tải file Excel </button>
                                <button type="submit" formaction="receiveAdvice" id="receiveAdvice" class="build-product"  disabled><i class="fa fa-phone" disabled></i> Nhận tư vấn </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</form>
</div>
<!-- Modal cua cuon -->
<div id="popup-choose-cuacuon" class="popup" style="display: none;">
    <!-- Modal content -->
    <div class="popup-content  animate down">
        <span class="close-popup">
            <i class="fa fa-times"></i>
        </span>
        <div class="choose-item-wrapper">
            <div class="choose-item-header">
                <div class="w40 choosed-item-name">1 Cửa cuốn</div>
            </div>
            <div class="choose-item-body">
                <div class="w40 item-left">
                <?php $brands = (App\Models\Brands::getByType(1))?>
                    @foreach($brands as $k)
                    <div class="sub-item">
                        <div class="w100 sub-item-chooser" data-id="{{$k->id}}" style="width:95%;background:white !important">{{$k->name}}</div>
                    </div>
                    @endforeach
                    <?php $brands = (App\Models\ProductStyle::getByType(1))?>
                    @foreach($brands as $k)
                    <div class="sub-item" >
                        <div class="w100 sub-item-chooser2" data-id="{{$k->id}}" style="width:95%;background:white !important;padding-left: 2em;">{{$k->name}}</div>
                    </div>
                    @endforeach
                </div>
                <div class="w60 item-right">
                    @foreach($products_cuacuon as $k)
                    <div class="item-chosen brand_{{$k->brand_id}}">
                        <div class="item-image w20">
                            <a href="#">
                                <img src="{{$k->image_link}}">
                            </a>
                        </div>
                        <div class="item-info w60">
                            <div class="name">
                                <a href="#">
                                    {{$k->name}}
                                </a>
                            </div>
                            <div class="price">{{number_format($k->price)}} đ</div>
                        </div>
                        <div class="item-button w20">
                            <button type="button" class="add-to-cart-yes" data-id="{{$k->id}}" onclick="addToCart({{$k->id}})">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal motor -->
<div id="popup-choose-motor" class="popup" style="display: none;">
    <!-- Modal content -->
    <div class="popup-content  animate down">
        <span class="close-popup">
            <i class="fa fa-times"></i>
        </span>
        <div class="choose-item-wrapper">
            <div class="choose-item-header">
                <div class="w40 choosed-item-name">2. Motor</div>
            </div>
            <div class="choose-item-body">
                <div class="w40 item-left">
                <?php $brands = (App\Models\Brands::getByType(2))?>
                    @foreach($brands as $k)
                    <div class="sub-item">
                        <div class="w100 sub-item-chooser" data-id="{{$k->id}}" style="width:95%;background:white !important">{{$k->name}}</div>
                    </div>
                    @endforeach
                </div>
                <div class="w60 item-right">
                    @foreach($products_motor as $k)
                    <div class="item-chosen brand_{{$k->brand_id}}" >
                        <div class=" item-image w20">
                        <a href="#">
                            <img src="{{$k->image_link}}">
                        </a>
                    </div>
                    <div class="item-info w60">
                        <div class="name">
                            <a href="#">
                                {{$k->name}}
                            </a>
                        </div>
                        <div class="price">{{number_format($k->price)}} đ</div>
                    </div>
                    <div class="item-button w20">
                        <button type="button" class="add-to-cart-no">
                            <i class="fa fa-ban"></i>
                        </button>
                        <button type="button" class="add-to-cart-yes" data-id=" {{$k->id}}" onclick="addToCart({{$k->id}})">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal binh luu dien -->
<div id="popup-choose-binhluudien" class="popup" style="display: none;">
    <!-- Modal content -->
    <div class="popup-content  animate down">
        <span class="close-popup">
            <i class="fa fa-times"></i>
        </span>
        <div class="choose-item-wrapper">
            <div class="choose-item-header">
                <div class="w40 choosed-item-name">3. Bình lưu điện</div>
            </div>
            <div class="choose-item-body">
                <div class="w40 item-left">
                <?php $brands = (App\Models\Brands::getByType(3))?>
                    @foreach($brands as $k)
                    <div class="sub-item">
                        <div class="w100 sub-item-chooser" data-id="{{$k->id}}" style="width:95%;background:white !important">{{$k->name}}</div>
                    </div>
                    @endforeach
                </div>
                <div class="w60 item-right">
                    @foreach($products_binhluudien as $k)
                    <div class="item-chosen brand_{{$k->brand_id}}">
                        <div class=" item-image w20">
                        <a href="#">
                            <img src="{{$k->image_link}}">
                        </a>
                    </div>
                    <div class="item-info w60">
                        <div class="name">
                            <a href="#">
                                {{$k->name}}
                            </a>
                        </div>
                        <div class="price">{{number_format($k->price)}} đ</div>
                    </div>
                    <div class="item-button w20">
                        <button type="button" class="add-to-cart-no">
                            <i class="fa fa-ban"></i>
                        </button>
                        <button type="button" class="add-to-cart-yes" data-id=" {{$k->id}}" onclick="addToCart({{$k->id}})">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal phu kien -->
<div id="popup-choose-phukien" class="popup" style="display: none;">
    <!-- Modal content -->
    <div class="popup-content  animate down">
        <span class="close-popup">
            <i class="fa fa-times"></i>
        </span>
        <div class="choose-item-wrapper">
            <div class="choose-item-header">
                <div class="w40 choosed-item-name">4. Phụ kiện cửa cuốn</div>
            </div>
            <div class="choose-item-body">
                <div class="w40 item-left">
                <?php $brands = (App\Models\Brands::getByType(4))?>
                    @foreach($brands as $k)
                    <div class="sub-item">
                        <div class="w100 sub-item-chooser" data-id="{{$k->id}}" style="width:95%;background:white !important">{{$k->name}}</div>
                    </div>
                    @endforeach
                </div>
                <div class="w60 item-right">
                    @foreach($products_phukien as $k)
                    <div class="item-chosen brand_{{$k->brand_id}}">
                        <div class=" item-image w20">
                        <a href="#">
                            <img src="{{$k->image_link}}">
                        </a>
                    </div>
                    <div class="item-info w60">
                        <div class="name">
                            <a href="#">
                                {{$k->name}}
                            </a>
                        </div>
                        <div class="price">{{number_format($k->price)}} đ</div>
                    </div>
                    <div class="item-button w20">
                        <button type="button" class="add-to-cart-yes" data-id=" {{$k->id}}" onclick="addToCart({{$k->id}})">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
    var currentChoose = "";

    jQuery(document).ready(function() {

        $('input').change(function() {
            var name = $("#name").val().trim();
            var phone = $("#phone").val().trim();
            var email = $("#email").val().trim();
            var flag = 0;

            if (!validateEmail(email)) {
                $("#errorEmail").html('Hãy nhập địa chỉ email hợp lệ! Ví dụ: abc@gmail.com');
                flag++;
            } else {
                $("#errorEmail").html('');
            }
            if (checkPhoneNumber(phone) != true) {
                $("#errorPhone").html('Hãy nhập số điện thoại hợp lệ! Ví dụ: 0987654321');
                flag++;
            } else {
                $("#errorPhone").html('');
            }
            if (flag == 0 && (name !='' && phone!='' &&email!='')) {
                $("#exportExcel").removeAttr('disabled');
                $("#receiveAdvice").removeAttr('disabled');
            } else {
                $("#exportExcel").attr('disabled', 'disabled');
                $("#receiveAdvice").attr('disabled', 'disabled');
            }
        });
        $('input').keyup(function() {
            var name = $("#name").val().trim();
            var phone = $("#phone").val().trim();
            var email = $("#email").val().trim();
            var flag = 0;

            if (!validateEmail(email)) {
                $("#errorEmail").html('Hãy nhập địa chỉ email hợp lệ! Ví dụ: abc@gmail.com');
                flag++;
            } else {
                $("#errorEmail").html('');
            }
            if (checkPhoneNumber(phone) != true) {
                $("#errorPhone").html('Hãy nhập số điện thoại hợp lệ! Ví dụ: 0987654321');
                flag++;
            } else {
                $("#errorPhone").html('');
            }
            if (flag == 0 && (name !='' && phone!='' &&email!='')) {
                $("#exportExcel").removeAttr('disabled');
                $("#receiveAdvice").removeAttr('disabled');
            } else {
                $("#exportExcel").attr('disabled', 'disabled');
                $("#receiveAdvice").attr('disabled', 'disabled');
            }
        });

        $('#popup-choose-binhluudien .add-to-cart-no').hide();
        $('#popup-choose-motor .add-to-cart-no').hide();
        jQuery('.close-popup').click(function(event) {
            event.preventDefault();
            jQuery(".popup").removeClass("show");
        });
        jQuery('.choose-item-arrow').click(function(event) {
            $(this).find("svg").toggleClass("rotate");
            $(this).parents(".sub-item").find(".list-sub-item").toggleClass("hide");
        })
        jQuery('.sub-item-chooser').click(function(event) {
            event.preventDefault();
            jQuery(".sub-item-chooser").removeClass("active");
            $(this).toggleClass("active");
            var brand_id = $(this).attr("data-id");
            jQuery(".item-chosen").hide();
            jQuery(".brand_" + brand_id).show();
        });
        jQuery('.sub-item-chooser2').click(function(event) {
            event.preventDefault();
            jQuery(".sub-item-chooser2").removeClass("active");
            $(this).toggleClass("active");
            var brand_id = $(this).attr("data-id");
            jQuery(".item-chosen").hide();
            jQuery(".brand_" + brand_id).show();
        });
    });
    //hàm kiểm tra email
    function validateEmail(email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test(email);
    }
    //kiểm tra số điện thoại
    function checkPhoneNumber(phone) {
        var flag = false;
        phone = phone.replace('(+84)', '0');
        phone = phone.replace('+84', '0');
        phone = phone.replace('0084', '0');
        phone = phone.replace(/ /g, '');
        if (phone != '') {
            var firstNumber = phone.substring(0, 2);
            if ((firstNumber == '09' || firstNumber == '08' || firstNumber == '07' || firstNumber == '05' || firstNumber == '03') && phone.length == 10) {
                if (phone.match(/^\d{10}/)) {
                    flag = true;
                }
            }
        }
        return flag;
    }

    function addToCart(id) {
        jQuery(".popup").removeClass("show");
        document.getElementById(currentChoose).innerHTML = generateCartData(id);
    }

    function openChooseProductPopup(ele, parent) {
        var item_id = '';
        if (parent == 1) {
            item_id = 'popup-choose-cuacuon';
        } else if (parent == 2) {
            item_id = 'popup-choose-motor';
        } else if (parent == 3) {
            item_id = 'popup-choose-binhluudien';
        } else if (parent == 4) {
            item_id = 'popup-choose-phukien';
        }
        document.getElementById(item_id).dataset.parent = parent;
        document.getElementById(item_id).classList.add("show");
        currentChoose = "item-" + parent;
        jQuery(".item-chosen").show();
    }
    //thêm sản phẩm vào bằng ajax
    function generateCartData(id) {
        $.ajax({
            url: '{{ url("ajax/getProduct") }}',
            method: "POST",
            data: {
                id: id,
                type: 'cuacuon',
                _token: "{{csrf_token()}}"
            },
            dataType: "text",
            success: function(data) {
                document.getElementById(currentChoose).innerHTML = data;
            }
        });
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function add(ele, type_id, size) {
        var number = $('#number').val();
        if (type_id == 1) {
            number = parseInt(number) + 1;
            if (number <= size || size == null) {
                $('#popup-choose-binhluudien .add-to-cart-no').hide();
                $('#popup-choose-binhluudien .add-to-cart-yes').show();

                $('#popup-choose-motor .add-to-cart-no').hide();
                $('#popup-choose-motor .add-to-cart-yes').show();
            } else {
                $('#popup-choose-binhluudien .add-to-cart-no').show();
                $('#popup-choose-binhluudien .add-to-cart-yes').hide();

                $('#popup-choose-motor .add-to-cart-no').show();
                $('#popup-choose-motor .add-to-cart-yes').hide();
            }
        }
        var currentQuantityElement = ele.parentElement.querySelector(".choose-item-quantity");
        currentQuantityElement.value = parseInt(currentQuantityElement.value) + 1;
        var newPrice = formatNumber(parseInt(currentQuantityElement.value) * 900000);
        findAncestor(ele, 'choose-item').querySelector(".item-total-price").innerHTML = newPrice + 'đ';
    }

    function sub(ele, type_id, size) {
        var number = $('#number').val();
        if (type_id == 1) {
            number = number - 1;
            if (number <= size || size == null) {
                $('#popup-choose-binhluudien .add-to-cart-no').hide();
                $('#popup-choose-binhluudien .add-to-cart-yes').show();

                $('#popup-choose-motor .add-to-cart-no').hide();
                $('#popup-choose-motor .add-to-cart-yes').show();
            } else {
                $('#popup-choose-binhluudien .add-to-cart-no').show();
                $('#popup-choose-binhluudien .add-to-cart-yes').hide();

                $('#popup-choose-motor .add-to-cart-no').show();
                $('#popup-choose-motor .add-to-cart-yes').hide();
            }
        }
        var currentQuantityElement = ele.parentElement.querySelector(".choose-item-quantity");
        currentQuantityElement.value = currentQuantityElement.value == 1 ? 1 : parseInt(currentQuantityElement.value) - 1;
        var newPrice = formatNumber(parseInt(currentQuantityElement.value) * 900000);
        findAncestor(ele, 'choose-item').querySelector(".item-total-price").innerHTML = newPrice + 'đ';
    }

    function checkNumber(ele, type_id, size) {
        var number = $('#number').val();
        if (type_id == 1) {
            if (number <= size || size == null) {
                $('#popup-choose-binhluudien .add-to-cart-no').hide();
                $('#popup-choose-binhluudien .add-to-cart-yes').show();

                $('#popup-choose-motor .add-to-cart-no').hide();
                $('#popup-choose-motor .add-to-cart-yes').show();
            } else {
                $('#popup-choose-binhluudien .add-to-cart-no').show();
                $('#popup-choose-binhluudien .add-to-cart-yes').hide();

                $('#popup-choose-motor .add-to-cart-no').show();
                $('#popup-choose-motor .add-to-cart-yes').hide();
            }
        }
        if (Number.isNaN(parseInt(ele.value))) {
            // ele.value = '1';
        } else {
            var newPrice = formatNumber(parseInt(ele.value) * 900000);
            findAncestor(ele, 'choose-item').querySelector(".item-total-price").innerHTML = newPrice + 'đ';
        }
    }

    function findAncestor(el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }

    function genBtnChooseProduct(parent) {
        return `<button type="button" class="build-product btn-choose-product" onclick="openChooseProductPopup(this, ` + parent + `)">Chọn sản phẩm</button>`;
    }

    function removeCart(ele, parent) {
        findAncestor(ele, "choose-item").innerHTML = genBtnChooseProduct(parent);
    }

    function rebuildProduct() {
        while (document.getElementsByClassName("remove-cart").length > 0) {
            document.getElementsByClassName("remove-cart")[0].click();
        }
    }
</script>
@endsection