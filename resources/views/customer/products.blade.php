@extends('layouts.customer')
@section('pageTitle', 'Danh sách sản phẩm')
@section('content')
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
<div id="PageContainer" class="is-moved-by-drawer">
    <main class="main-content" role="main">
        <section id="collection-wrapper">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item large--three-quarters medium--one-whole small--one-whole float-right">

                            <div class="collection-content-wrapper">
                                <div class="collection-head">
                                    <div class="grid">
                                        <div class="grid__item large--two-thirds medium--one-whole small--one-whole">
                                            <div class="collection-title">
                                                <h1>Tất cả sản phẩm</h1>
                                            </div>
                                        </div>
                                        <!-- <div class="grid__item large--one-third medium--one-whole small--one-whole">
                                            <div class="collection-sorting-wrapper">
                                        <div class="form-horizontal text-right">
                                            <label for="SortBy">Sắp xếp</label>
                                            <select name="SortBy" id="SortBy">
                                                <option value="manual">Tùy chọn</option>
                                                <option value="best-selling">Sản phẩm bán chạy</option>
                                                <option value="title-ascending">Theo bảng chữ cái từ A-Z
                                                </option>
                                                <option value="title-descending">Theo bảng chữ cái từ Z-A
                                                </option>
                                                <option value="price-ascending">Giá từ thấp tới cao</option>
                                                <option value="price-descending">Giá từ cao tới thấp</option>
                                                <option value="created-descending">Mới nhất</option>
                                                <option value="created-ascending">Cũ nhất</option>
                                            </select>
                                        </div>

                                    </div>
                                </div> -->
                                    </div>

                                </div>
                                <div class="collection-body">
                                    <div class="grid-uniform md-mg-left-15 product-list">
                                        @foreach($products as $k)
                                        <div
                                            class="grid__item large--one-third medium--one-third small--one-half md-pd-left15">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="/chi-tiet-san-pham/{{$k->id}}">
                                                        <img id="1016170018" height="300" src="{{$k->image_link}}"
                                                            alt="Máy Lọc Nước Treo Tường Rewa RW-NA-50PB1">
                                                    </a>
                                                    <!-- <div class="tag-saleoff text-center">
                                                        -30%
                                                    </div> -->
                                                    <div class="product-actions text-center clearfix">
                                                        <div>

                                                            <button type="button"
                                                                class="btnBuyNow buy-now medium--hide small--hide"
                                                                data-id="1030768709"><span>Nhận tư vấn</span></button>
                                                            <button type="button"
                                                                class="btnBuyNow buy-now medium--hide small--hide"
                                                                data-id="1030768709"
                                                                onclick="location.href='/bao-gia'"><span>Báo
                                                                    giá</span></button>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-item-info text-center">
                                                    <div class="product-title">
                                                        <a href="/chi-tiet-san-pham/{{$k->id}}">
                                                            {{$k->name}}</a>
                                                    </div>
                                                    <!-- <div class="product-price clearfix">
                                                        <span class="current-price">{{number_format($k->price)}} đ</span>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="pagination not-filter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__item large--one-quarter medium--one-whole small--one-whole">
                            <div class="collection-sidebar-wrapper">
                                <div class="grid">
                                    <div class="grid__item large--one-whole medium--one-half small--one-whole">
                                        <div class="collection-filter-vendor">
                                            <button class="accordion cs-title col-sb-trigger active">
                                                <span>Thương hiệu</span>
                                            </button>
                                            <div class="panel sidebar-sort" style="max-height: 221px;">
                                                <ul class="no-bullets filter-vendor clearfix">
                                                    @foreach($brands as $k)
                                                    <li>
                                                        <label data-filter="Pureit" class="filter-vendor__item pureit">
                                                            <input type="checkbox" value="{{$k->id}}">
                                                            <span>{{$k->name}}</span>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid__item large--one-whole medium--one-half small--one-whole">
                                        <div class="collection-filter-type">
                                            <button class="accordion cs-title col-sb-trigger active">
                                                <span>Loại sản phẩm</span>
                                            </button>
                                            <div class="panel sidebar-sort" style="max-height: 118px;">
                                                <ul class="no-bullets filter-type clearfix">
                                                    @foreach($types as $k)
                                                    <li>
                                                        <label data-filter="Máy lọc nước"
                                                            class="filter-vendor__item may-loc-nuoc">
                                                            <input type="checkbox" value="{{$k->id}}">
                                                            <span>{{$k->name}}</span>
                                                        </label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
@endsection