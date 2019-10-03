@extends('layouts.customer')
@section('pageTitle', 'Chi tiết sản phẩm')
@section('content')
<section id="breadcrumb-wrapper5" class="breadcrumb-w-img">
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-content">
        <div class="wrapper">
            <div class="inner text-center">
                <div class="breadcrumb-big">
                    <h2>
                        {{$product->name}}
                    </h2>
                </div>
                <div class="breadcrumb-small">
                    <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                    <!-- <span aria-hidden="true">/</span>
                    <a href="/collections/hot-products" title="">Sản phẩm nổi bật</a> -->
                    <span aria-hidden="true">/</span>
                    <span> {{$product->name}}</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product-wrapper">
    <div class="wrapper">
        <div class="inner">
            <div itemscope="" itemtype="http://schema.org/Product">
                <div class="grid product-single">
                    <div class="grid__item large--six-twelfths medium--one-whole small--one-whole">
                        <div class="customize-product-slider clearfix">
                            <div id="surround" class="clearfix">
                                <div class="product-images" id="ProductPhoto">
                                    <img class="product-image-feature" src="{{$product->image_link}}" alt="{{$product->name}}" data-zoom-image="{{$product->image_link}}">
                                    <div id="sliderproduct" style="display: none !important;">
                                        <ul class="slides">
                                            <li class="product-thumb active">
                                                <a href="javascript:" class="product__thumbnail--target-1 zoomGalleryActive" data-image="{{$product->image_link}}" data-zoom-image="{{$product->image_link}}">
                                                    <img alt="{{$product->name}}" data-image="{{$product->image_link}}" src="{{$product->image_link}}">
                                                </a></li>
                                            <li class="product-thumb">
                                                <a href="javascript:" class="product__thumbnail--target-2" data-image="{{$product->image_link}}" data-zoom-image="{{$product->image_link}}">
                                                    <img alt="{{$product->name}}" data-image="{{$product->image_link}}" src="{{$product->image_link}}">
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="product-single__thumbnails inline-list">
                                    <ul class="product-single__thumbnails inline-list" id="ProductThumbs" style="max-height: 443px;">
                                        <div class="inner">
                                            <li class="thumbnail-item" data-alt="">
                                                <a href="{{$product->image_link}}" class="product-single__thumbnail active" data-trigger="1">
                                                    <img src="{{$product->image_link}}" alt="">
                                                </a>
                                            </li>
                                            <li class="thumbnail-item" data-alt="">
                                                <a href="{{$product->image_link}}" class="product-single__thumbnail" data-trigger="2">
                                                    <img src="{{$product->image_link}}" alt="">
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="customize-variants-products-slider text-center" style="display: none !important;">
                                <div id="owl-customize-variants-products-slider" class="owl-carousel owl-theme" style="opacity: 0; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 40px; left: 0px; display: block;">
                                            <div class="owl-item" style="width: 20px;">
                                                <div class="item product_variant_item active" data-variant-color="Default Title" data-alt="" data-image="{{$product->image_link}}" data-feature-image="{{$product->image_link}}">
                                                    <img src="{{$product->image_link}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="owl-controls clickable" style="display: none;">
                                        <div class="owl-buttons">
                                            <div class="owl-prev">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            </div>
                                            <div class="owl-next">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="grid__item large--six-twelfths medium--one-whole small--one-whole">
                        <div class="product-content">
                            <div class="pro-content-head clearfix">
                                <h1 itemprop="name"> {{$product->name}}</h1>
                                <div class="pro-brand">
                                    <span class="title">Thương hiệu:</span> <a href="https://suplo-company-2.myharavan.com/collections/vendors?q=rewa&amp;view=vendor-alt">{{$product->brand_name}}</a>
                                </div>
                                <span>|</span>
                                <div class="pro-type">
                                    <span class="title">Loại: <a href="https://suplo-company-2.myharavan.com/collections/types?q=may-loc-nuoc&amp;view=type-alt">{{$product->type_name}}</a></span>
                                </div>
                                <!-- <span>|</span>
                                <div class="pro-sku ProductSku">
                                <span class="title">Mã SP:</span> <span class="sku-number">SUPLO-013A</span>
                                </div> -->
                            </div>

                            <div class="pro-short-desc">
                                {!!$product->short_description!!}
                            </div>

                            <form action="#" method="post" enctype="multipart/form-data" id="AddToCartForm" class="form-vertical">
                                <div class="product-variants-wrapper">

                                    <div class="selector-wrapper" style="display: none;"><label for="productSelect-option-0">Tiêu
                                            đề</label><select class="single-option-selector" data-option="option1" id="productSelect-option-0">
                                            <option value="Default Title">Default Title</option>
                                        </select></div>
                                    <select name="id" id="productSelect" class="product-single__variants" style="display: none;">
                                        <option selected="selected" data-sku="SUPLO-013A" value="1030768709">Default Title - 2,790,000 VND
                                        </option>
                                    </select>
                                    <div class="product-size-hotline">
                                        <div class="product-hotline">
                                            <i class="fa fa-mobile" aria-hidden="true"></i> Hotline hỗ trợ: <a href="tel:(+84) 934 323 882">(+84) 934 323 882</a>
                                        </div>
                                        <span>|</span>
                                        <div class="social-network-actions text-left">
                                            <!-- like fb here -->
                                        </div>
                                    </div>
                                </div>

                                <div class="grid mg-left-5">
                                    <div class="grid__item large--two-thirds medium--two-thirds small--one-whole pd-left5">
                                        <div class="product-actions clearfix">
                                        <button type="button" name="buy" id="buy-now" class="btnBuyNow">Nhận tư vấn</button>
                                            <button type="button" name="buy" id="buy-now" class="btnBuyNow" onclick="location.href='/bao-gia'">Báo giá</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="grid">
                    <div class="grid__item large--nine-twelfths medium--one-whole small--one-whole">
                        <div class="product-description-wrapper">
                            <div class="tab clearfix">

                                <button class="pro-tablinks" onclick="openProTabs(event, &#39;protab2&#39;)">Mô tả sản phẩm</button>
                            </div>
                            <div id="protab1" class="pro-tabcontent" style="display: block;">
                                {!!$product->description!!}
                            </div>
                        </div>
                    </div>
                    <div class="grid__item large--three-twelfths medium--one-whole small--one-whole">


                        <section id="related-products">
                            <div class="home-section-head clearfix">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                            <div class="home-section-body">
                                <ul class="no-bullets">


                                    <li class="grid mg-left-15 rsp-item">
                                        <div class="grid__item large--one-third medium--one-quarter small--one-quarter pd-left15">
                                            <div class="rsp-img">
                                                <a href="https://suplo-company-2.myharavan.com/products/bo-loc-thay-the-pureit">
                                                    <img src="./img/suplo-001a-01_medium.jpg" alt="Bộ Lọc Thay Thế Pureit">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="grid__item large--two-thirds medium--three-quarters small--three-quarters pd-left15">
                                            <div class="rsp-title">
                                                <a href="https://suplo-company-2.myharavan.com/products/bo-loc-thay-the-pureit">Bộ Lọc Thay Thế
                                                    Pureit</a>
                                            </div>
                                            <div class="rsp-price">
                                                <span class="rsp-current-price">450,000₫</span>

                                            </div>
                                        </div>
                                    </li>


                                    <li class="grid mg-left-15 rsp-item">
                                        <div class="grid__item large--one-third medium--one-quarter small--one-quarter pd-left15">
                                            <div class="rsp-img">
                                                <a href="https://suplo-company-2.myharavan.com/products/bo-loi-loc-cap-1-2-3-may-loc-nuoc-ro-aquafilter">
                                                    <img src="./img/suplo-007a-01_medium.jpg" alt="Bộ Lõi Lọc Cấp 1,2,3 Máy Lọc Nước RO Aquafilter">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="grid__item large--two-thirds medium--three-quarters small--three-quarters pd-left15">
                                            <div class="rsp-title">
                                                <a href="https://suplo-company-2.myharavan.com/products/bo-loi-loc-cap-1-2-3-may-loc-nuoc-ro-aquafilter">Bộ
                                                    Lõi Lọc Cấp 1,2,3 Máy Lọc Nước RO Aquafilter</a>
                                            </div>
                                            <div class="rsp-price">
                                                <span class="rsp-current-price">435,000₫</span>

                                            </div>
                                        </div>
                                    </li>


                                    <li class="grid mg-left-15 rsp-item">
                                        <div class="grid__item large--one-third medium--one-quarter small--one-quarter pd-left15">
                                            <div class="rsp-img">
                                                <a href="https://suplo-company-2.myharavan.com/products/loi-loc-nuoc-rewa-post-carbon">
                                                    <img src="./img/suplo-006a-01_medium.jpg" alt="Lõi Lọc Nước Rewa Post Carbon">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="grid__item large--two-thirds medium--three-quarters small--three-quarters pd-left15">
                                            <div class="rsp-title">
                                                <a href="https://suplo-company-2.myharavan.com/products/loi-loc-nuoc-rewa-post-carbon">Lõi Lọc
                                                    Nước Rewa Post Carbon</a>
                                            </div>
                                            <div class="rsp-price">
                                                <span class="rsp-current-price">299,000₫</span>

                                            </div>
                                        </div>
                                    </li>


                                    <li class="grid mg-left-15 rsp-item">
                                        <div class="grid__item large--one-third medium--one-quarter small--one-quarter pd-left15">
                                            <div class="rsp-img">
                                                <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-a-o-smith-100ar600cs1-94l-h">
                                                    <img src="./img/suplo-010a-01_medium.jpg" alt="Máy Lọc Nước A.O.Smith 100AR600CS1 (94L/h)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="grid__item large--two-thirds medium--three-quarters small--three-quarters pd-left15">
                                            <div class="rsp-title">
                                                <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-a-o-smith-100ar600cs1-94l-h">Máy
                                                    Lọc Nước A.O.Smith 100AR600CS1 (94L/h)</a>
                                            </div>
                                            <div class="rsp-price">
                                                <span class="rsp-current-price">16,500,000₫</span>

                                            </div>
                                        </div>
                                    </li>


                                    <li class="grid mg-left-15 rsp-item">
                                        <div class="grid__item large--one-third medium--one-quarter small--one-quarter pd-left15">
                                            <div class="rsp-img">
                                                <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-a-o-smith-100ar600u3-94l-h">
                                                    <img src="./img/suplo-012a-01_medium.jpg" alt="Máy Lọc Nước A.O.Smith 100AR600U3 (94L/h)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="grid__item large--two-thirds medium--three-quarters small--three-quarters pd-left15">
                                            <div class="rsp-title">
                                                <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-a-o-smith-100ar600u3-94l-h">Máy
                                                    Lọc Nước A.O.Smith 100AR600U3 (94L/h)</a>
                                            </div>
                                            <div class="rsp-price">
                                                <span class="rsp-current-price">18,600,000₫</span>

                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </section>


                        <div id="seen-products" class="seen-products-slider">
                            <div class="home-section-head clearfix">
                                <h2>Sản phẩm đã xem</h2>
                            </div>
                            <div class="home-section-body">
                                <div class="show">
                                    <div class="product-seen grid mg-left-15">
                                        <div id="owl-spdx" class="owl-carousel new-slide owl-theme" style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer">
                                                <div class="owl-wrapper" style="width: 492px; left: 0px; display: block;">
                                                    <div class="owl-item" style="width: 246px;">
                                                        <div class="grid__item item pd-left15">

                                                            <div class="seen-item">
                                                                <div class="product-img">
                                                                    <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-treo-tuong-rewa-rw-na-50pb1">
                                                                        <img id="" src="./img/suplo-013a-01_large.jpg" alt="">
                                                                    </a>
                                                                    <div class="tag-saleoff text-center">
                                                                        -<span>30</span>%
                                                                    </div>
                                                                </div>

                                                                <div class="product-item-info text-center">
                                                                    <div class="product-title">
                                                                        <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-treo-tuong-rewa-rw-na-50pb1">Máy
                                                                            Lọc Nước Treo Tường Rewa RW-NA-50PB1</a>
                                                                    </div>

                                                                    <div class="product-price clearfix">
                                                                        <span class="current-price">2,790,000₫</span>
                                                                        <span class="original-price"><s>4,000,000₫</s></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-controls clickable" style="display: none;">
                                                <div class="owl-buttons">
                                                    <div class="owl-prev">
                                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="owl-next">
                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="clone-item">
                                            <div class="grid__item item pd-left15 hide">

                                                <div class="seen-item">
                                                    <div class="product-img">
                                                        <a href="https://suplo-company-2.myharavan.com/collections/hot-products">
                                                            <img id="" src="./img/noDefaultImage6_medium.gif" alt="">
                                                        </a>
                                                        <div class="tag-saleoff text-center">
                                                            -<span></span>%
                                                        </div>
                                                    </div>

                                                    <div class="product-item-info text-center">
                                                        <div class="product-title">
                                                            <a href="https://suplo-company-2.myharavan.com/products/may-loc-nuoc-treo-tuong-rewa-rw-na-50pb1"></a>
                                                        </div>

                                                        <div class="product-price clearfix">
                                                            <span class="current-price">0₫</span>
                                                            <span class="original-price"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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

@endsection