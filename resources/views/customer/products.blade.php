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
                        <li data-id="{{$t->id}}"><a href="#tab_{{$t->id}}" data-toggle="tab">{{$t->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content" id='load-data'>
                        <img src="public/customer/img/tongquancuacuon.png">
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
            url: '{{url("ajax/getProduct_Type")}}',
            method: "get",
            data: {
                type_ID: type_ID,
                _token: "{{csrf_token()}}"
            },
            dataType: "text",
            success: function(data) {
                $('.panel-body #load-data').remove();
                if (data != '') {
                    $('.panel-body').append(data);
                }
            }
        });
    });
    $(".brands").click(function() {
        e.preventDefault();
        alert(1);
        var type_ID = $(this).attr('data-id');
        console.log(type_ID);
        alert(type_ID);
    });

    // $(document).ready(function() {
    //     var selected = [];
    //     $("input[type=checkbox]").change(function() {
    //         var sThisVal = (this.checked ? $(this).val() : "");

    //         selected.push($(this).attr('name') + '_' + $(this).val());
    //         var numberOfChecked = $('input:checkbox:checked').length;
    //         var name = $('input:checkbox:checked').attr('name');
    //         // if (numberOfChecked == 0) {
    //         //     $('.product-list .grid__item').show();
    //         // } else {
    //         //     $('.product-list .grid__item').hide();
    //         //     $.ajax({
    //         //         url: '{{ url("ajax/filterProduct") }}',
    //         //         method: "POST",
    //         //         data: {
    //         //             selected: selected,
    //         //             _token: "{{csrf_token()}}"
    //         //         },
    //         //         success: function(data) {
    //         //             console.log(data);

    //         //         }
    //         //     });
    //         // }
    //     });
    // });
</script>
@endsection