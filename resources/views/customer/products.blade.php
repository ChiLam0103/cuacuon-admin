@extends('layouts.customer')
@section('pageTitle', 'Danh sách sản phẩm')
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<section id="breadcrumb-wrapper2" class="breadcrumb-w-img">
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-content">
        <div class="wrapper">
            <div class="inner text-center">
                <div class="breadcrumb-big">
                    <h2>
                        Tất cả sản phẩm
                    </h2>
                </div>
                <div class="breadcrumb-small">
                    <a href="#" title="Quay trở về trang chủ">Trang chủ</a>
                    <span aria-hidden="true">/</span>
                    <span>Tất cả sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row" id="collection-wrapper">
        <div class="collection-head col-md-12">
            <div class="collection-title">
                <h1>Tất cả sản phẩm</h1>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        @foreach($types as $t)
                        <li data-id="{{$t->id}}" @if($t->id==1) class="active" @endif ><a href="#tab_{{$t->id}}" data-toggle="tab">{{$t->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content" id='load-data'>
                        @foreach($types as $t)
                        <div class="tab-pane fade in @if($t->id==1) active @endif" id="tab_{{$t->id}}">
                            <div class="panel sidebar-sort" style="max-height: 100%">
                                <ul class="no-bullets filter-vendor clearfix" style="display: flex;">
                                <?php $brands = (App\Models\Brands::getByType($t->id))?>
                                    @foreach($brands as $b)
                                    <li style="margin-right: 1em;">
                                        <label class="filter-vendor__item pureit checkboxes">
                                            <input name="ckBrands" type="checkbox" value="{{$b->id}}">
                                            <span>{{$b->name}}</span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="collection-body">
                                <div class="grid-uniform  product-list">
                                    @foreach($products as $p)
                                    <div class="grid__item large--one-quarter medium--one-third small--one-first md-pd-left15">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="chi-tiet-san-pham/{{$p->id}}">
                                                    <img height="200" src="{{$p->image_link}}" alt="{{$p->name}}">
                                                </a>
                                            </div>
                                            <div class="product-item-info text-center">
                                                <div class="product-title">
                                                    <a href="/chi-tiet-san-pham/{{$p->id}}">
                                                        {{$p->name}}</a>
                                                </div>
                                                <div class="product-price clearfix">
                                                    <span class="current-price">{{number_format($p->price)}} đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <?php $products_style = (App\Models\ProductStyle::getByType(1))?>
                            
                            @foreach($products_style as $p)
                                <p>{{$p->name}}</p>

                            @endforeach
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('li').on('click', function(e) {
        var type_ID = $(this).attr('data-id');
        $.ajax({
            url: '{{ url("ajax/getProduct_Type") }}',
            method: "POST",
            data: {
                type_ID: type_ID,
                _token: "{{csrf_token()}}"
            },
            dataType: "text",
            success: function(data) {
                console.log(data);
                $('#load-data .tab-pane').remove();
                if (data != '') {
                    $('#load-data').append(data);
                }
            }
        });
    });
    $(document).ready(function() {
        var selected = [];
        $("input[type=checkbox]").change(function() {
            var sThisVal = (this.checked ? $(this).val() : "");
            console.log(sThisVal);
            selected.push($(this).attr('name') + '_' + $(this).val());
            var numberOfChecked = $('input:checkbox:checked').length;
            var name = $('input:checkbox:checked').attr('name');
            if (numberOfChecked == 0) {
                $('.product-list .grid__item').show();
            } else {
                $('.product-list .grid__item').hide();
                $.ajax({
                    url: '{{ url("ajax/filterProduct") }}',
                    method: "POST",
                    data: {
                        selected: selected,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        console.log(data);

                    }
                });
            }
        });
    });
</script>
@endsection