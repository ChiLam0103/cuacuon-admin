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
                                <p><strong>Ứng dụng công nghệ 5 bước lọc </strong></p>
                                <p>Máy lọc nước Pureit là một trong những nhãn hiệu lọc nước nổi tiếng trên thế giới và được đánh giá
                                    cao về ứng dụng công nghệ tiên tiến, hiện đại, đem lại hiệu suất sử dụng cao. Hệ thống máy lọc nước
                                    của Pureit được thực hiện với công nghệ lọc 5 bước, loại bỏ 99,99% tạp chất, kể cả các kim loại nặng
                                    như chì, sắt mang lại nguồn nước sạch cho mọi gia đình.</p>
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
                                            <button type="button" name="buy" id="buy-now" class="btnBuyNow">Báo giá</button>
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

                                <button class="pro-tablinks active" onclick="openProTabs(event, &#39;protab1&#39;)" id="defaultOpenProTabs">Thông số kỹ thuật
                                </button>
                                <button class="pro-tablinks" onclick="openProTabs(event, &#39;protab2&#39;)">Mô tả sản phẩm</button>
                            </div>
                            <div id="protab1" class="pro-tabcontent" style="display: block;">
                                <table class="mce-item-table">
                                    <tbody>
                                        <tr>
                                            <td>Thương hiệu</td>
                                            <td>Pureit</td>
                                        </tr>
                                        <tr>
                                            <td>Sản xuất tại</td>
                                            <td>Ấn Độ</td>
                                        </tr>
                                        <tr>
                                            <td>Chất liệu</td>
                                            <td>Nhựa kỹ thuật không độc hại</td>
                                        </tr>
                                        <tr>
                                            <td>Đồng hồ hiển thị áp lực</td>
                                            <td>Không</td>
                                        </tr>
                                        <tr>
                                            <td>Màu</td>
                                            <td>Trắng / Xanh</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><strong>Ứng dụng công nghệ 5 bước lọc </strong></p>
                                <p>Máy lọc nước Pureit là một trong những nhãn hiệu lọc nước nổi tiếng trên thế giới và được đánh giá
                                    cao về ứng dụng công nghệ tiên tiến, hiện đại, đem lại hiệu suất sử dụng cao. Hệ thống máy lọc nước
                                    của Pureit được thực hiện với công nghệ lọc 5 bước, loại bỏ 99,99% tạp chất, kể cả các kim loại nặng
                                    như chì, sắt mang lại nguồn nước sạch cho mọi gia đình.</p>
                                <p>Giai đoạn 1: Nước sẽ đi qua màng lọc cặn để loại bỏ các loại bụi bẩn và tạp chất nhìn thấy được bằng
                                    mắt thường.</p>
                                <p>Giai đoạn 2: Nước được chuyển qua bộ diệt khuẩn với công nghệ hiện đại. Bộ diệt khuẩn được lập trình
                                    để xác định và tiêu diệt các vi khuẩn, vi rút gây hại cho sức khỏe.</p>
                                <p>Giai đoạn 3: Các kim loại kết tủa trong nước như sắt, chì sẽ được giữ lại tại lưới lọc vi sợi.</p>
                                <p>Giai đoạn 4: Bộ đánh bóng carbon tiếp tục loại bỏ kí sinh trùng có hại và clo, giúp nước được lọc
                                    sạch, không mùi và có vị ngọt tự nhiên.</p>
                                <p>Gian đoạn 5: Nước sẽ đi qua màn lọc siêu vi để lọc và tiêu diệt các vi khuẩn một lần nữa để đảm bảo
                                    tính an toàn và nước có thể uống ngay mà không cần đun sôi.</p>
                                <p><strong>Được kiểm nghiệm bởi các tổ chức uy tín trên thế giới </strong></p>
                                <p>Dòng sản phẩm được kiểm nghiệm bởi 35 tổ chức kiểm định quốc tế, đáp ứng tiêu chuẩn diệt khuẩn của
                                    Cục Bảo Vệ Môi Trường Mỹ.</p>
                                <p><strong>Kiểu dáng sang trọng, hiện đại </strong></p>
                                <p>Không chỉ ứng dụng công nghệ lọc ưu Việt, máy lọc nước Pureit còn gây ấn tượng bởi thiết kế nhỏ gọn,
                                    màu sắc tinh tế, sang trọng, là lựa chọn hàng đầu của mọi gia đình. Sản phẩm với dung tích bình chứa
                                    lên đến 9 lít, đảm bảo cung cấp đủ lượng nước tinh khiết cho cả gia đình.</p>
                                <p><strong>An toàn, dễ sử dụng </strong></p>
                                <p>Máy lọc nước Pureit thiết kế thông minh giúp người dùng dễ dàng để lấy nước, bạn chỉ cần đẩy cần gạt
                                    là sẽ có nước liên tục để sử dụng. Bình chứa nước lọc làm bằng chất liệu nhựa cao cấp sáng bóng, không
                                    sản sinh các chất độc hại, đảm bảo các tiêu chí về an toàn cho sức khỏe người tiêu dùng. Ngoài ra, máy
                                    có thể tháo rời và lắp ráp dễ dàng, giúp người dùng vệ sinh dễ dàng, tăng tuổi thọ cho sản phẩm</p>
                            </div>
                            <div id="protab2" class="pro-tabcontent" style="display: none;">
                                <table class="mce-item-table">
                                    <tbody>
                                        <tr>
                                            <td>Thương hiệu123</td>
                                            <td>Pureit</td>
                                        </tr>
                                        <tr>
                                            <td>Sản xuất tại</td>
                                            <td>Ấn Độ</td>
                                        </tr>
                                        <tr>
                                            <td>Chất liệu</td>
                                            <td>Nhựa kỹ thuật không độc hại</td>
                                        </tr>
                                        <tr>
                                            <td>Đồng hồ hiển thị áp lực</td>
                                            <td>Không</td>
                                        </tr>
                                        <tr>
                                            <td>Màu</td>
                                            <td>Trắng / Xanh</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><strong>Ứng dụng công nghệ 5 bước lọc </strong></p>
                                <p>Máy lọc nước Pureit là một trong những nhãn hiệu lọc nước nổi tiếng trên thế giới và được đánh giá
                                    cao về ứng dụng công nghệ tiên tiến, hiện đại, đem lại hiệu suất sử dụng cao. Hệ thống máy lọc nước
                                    của Pureit được thực hiện với công nghệ lọc 5 bước, loại bỏ 99,99% tạp chất, kể cả các kim loại nặng
                                    như chì, sắt mang lại nguồn nước sạch cho mọi gia đình.</p>
                                <p>Giai đoạn 1: Nước sẽ đi qua màng lọc cặn để loại bỏ các loại bụi bẩn và tạp chất nhìn thấy được bằng
                                    mắt thường.</p>
                                <p>Giai đoạn 2: Nước được chuyển qua bộ diệt khuẩn với công nghệ hiện đại. Bộ diệt khuẩn được lập trình
                                    để xác định và tiêu diệt các vi khuẩn, vi rút gây hại cho sức khỏe.</p>
                                <p>Giai đoạn 3: Các kim loại kết tủa trong nước như sắt, chì sẽ được giữ lại tại lưới lọc vi sợi.</p>
                                <p>Giai đoạn 4: Bộ đánh bóng carbon tiếp tục loại bỏ kí sinh trùng có hại và clo, giúp nước được lọc
                                    sạch, không mùi và có vị ngọt tự nhiên.</p>
                                <p>Gian đoạn 5: Nước sẽ đi qua màn lọc siêu vi để lọc và tiêu diệt các vi khuẩn một lần nữa để đảm bảo
                                    tính an toàn và nước có thể uống ngay mà không cần đun sôi.</p>
                                <p><strong>Được kiểm nghiệm bởi các tổ chức uy tín trên thế giới </strong></p>
                                <p>Dòng sản phẩm được kiểm nghiệm bởi 35 tổ chức kiểm định quốc tế, đáp ứng tiêu chuẩn diệt khuẩn của
                                    Cục Bảo Vệ Môi Trường Mỹ.</p>
                                <p><strong>Kiểu dáng sang trọng, hiện đại </strong></p>
                                <p>Không chỉ ứng dụng công nghệ lọc ưu Việt, máy lọc nước Pureit còn gây ấn tượng bởi thiết kế nhỏ gọn,
                                    màu sắc tinh tế, sang trọng, là lựa chọn hàng đầu của mọi gia đình. Sản phẩm với dung tích bình chứa
                                    lên đến 9 lít, đảm bảo cung cấp đủ lượng nước tinh khiết cho cả gia đình.</p>
                                <p><strong>An toàn, dễ sử dụng </strong></p>
                                <p>Máy lọc nước Pureit thiết kế thông minh giúp người dùng dễ dàng để lấy nước, bạn chỉ cần đẩy cần gạt
                                    là sẽ có nước liên tục để sử dụng. Bình chứa nước lọc làm bằng chất liệu nhựa cao cấp sáng bóng, không
                                    sản sinh các chất độc hại, đảm bảo các tiêu chí về an toàn cho sức khỏe người tiêu dùng. Ngoài ra, máy
                                    có thể tháo rời và lắp ráp dễ dàng, giúp người dùng vệ sinh dễ dàng, tăng tuổi thọ cho sản phẩm</p>
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
<script>
    new WOW().init();
</script>

<script>
    var currentQuantity = 1;

    function openProTabs(evt, cityName) {
        var i, pro_tabcontent, pro_tablinks;
        pro_tabcontent = document.getElementsByClassName("pro-tabcontent");
        for (i = 0; i < pro_tabcontent.length; i++) {
            pro_tabcontent[i].style.display = "none";
        }
        pro_tablinks = document.getElementsByClassName("pro-tablinks");
        for (i = 0; i < pro_tablinks.length; i++) {
            pro_tablinks[i].className = pro_tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpenProTabs").click();

    function addToCart() {
        document.getElementById("modalAddComplete").style.display = "block";
        var inputEle = document.getElementById("modalAddComplete").querySelector(".js-qty__num");
        inputEle.value = currentQuantity;
        var totalPrice = currentQuantity * parseInt(inputEle.dataset.price);
        document.getElementById("modalAddComplete").querySelector(".product-money").innerHTML = formatNumber(totalPrice) + "₫";
    }

    function addOneItem(ele) {
        var value = parseInt(ele.parentElement.querySelector(".js-qty__num").value) + 1;
        ele.parentElement.querySelector(".js-qty__num").value = value;
        currentQuantity = value;
    }

    function subOneItem(ele) {
        var value = parseInt(ele.parentElement.querySelector(".js-qty__num").value);
        value = value == 1 ? 1 : value - 1;
        ele.parentElement.querySelector(".js-qty__num").value = value;
        currentQuantity = value;
    }

    function setCurrentQuantity(ele) {
        console.log(ele.value);
        currentQuantity = ele.value;
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function calcTotal(ele) {
        currentQuantity = ele.value;
        var totalPrice = currentQuantity * parseInt(ele.dataset.price);
        document.getElementById("modalAddComplete").querySelector(".product-money").innerHTML = formatNumber(totalPrice) + "₫";
    }
</script>

<script>
    function getImageByAlt(alt) {
        $('.thumbnail-item').each(function () {
            if ($(this).data('alt') != alt) {
                $(this).hide();
            } else {
                $(this).show();
            }
        })
    }

    $('.product_variant_item').click(function () {
        var vid = $(this).data('variant-color');
        var imgf = $(this).data('feature-image');
        $(".product-thumb img[data-image='" + imgf + "']").click().parents('li').addClass('active');
        $('#product-select-option-0').val(vid);
        if ($(window).width() > 480) {
            getImageByAlt($(this).data('alt'));
        }
        ;
        $('.product_variant_item').removeClass('active');
        $(this).addClass('active');
    })
    $('.product_variant_item').trigger('click');
</script>

<script>
    $(".product-thumb img").click(function () {
        $(".product-thumb").removeClass('active');
        $(this).parents('li').addClass('active');
        $(".product-image-feature").attr("src", $(this).attr("data-image"));
        $(".product-image-feature").attr("data-zoom-image", $(this).attr("data-zoom-image"));
    });

    $(".product-thumb").first().addClass('active');
</script>

<script>
    $(document).ready(function () {
        if ($(".slides .product-thumb").length > 4) {
            $('#sliderproduct').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 95,
                itemMargin: 10,
            });
        }
        if ($(window).width() > 960) {
            jQuery(".product-image-feature").elevateZoom({
                gallery: 'sliderproduct',
                scrollZoom: true
            });
        } else {

        }
        jQuery('.slide-next').click(function () {
            if ($(".product-thumb.active").prev().length > 0) {
                $(".product-thumb.active").prev().find('img').click();
            } else {
                $(".product-thumb:last img").click();
            }
        });
        jQuery('.slide-prev').click(function () {
            if ($(".product-thumb.active").next().length > 0) {
                $(".product-thumb.active").next().find('img').click();
            } else {
                $(".product-thumb:first img").click();
            }
        });
    });
</script>

<script>
    jQuery(window).on('load', function () {
        if ($('#ProductThumbs').length) {
            var productThumb = $('#ProductThumbs');
            var productThumbInner = $('#ProductThumbs .inner');
            var productFeatureImage = $('#ProductPhoto');
            var thumbControlUp = $('.product-thumb-control .up');
            var thumbControlDown = $('.product-thumb-control .down');
            var thumbImageHeight = 80;

            if ($(window).width() < 480) {
                productThumbInner.addClass('owl-carousel');
                productThumbInner.owlCarousel({
                    margin: 10,
                    items: 3,
                    itemsDesktop: [1000, 3],
                    itemsDesktopSmall: [900, 3],
                    itemsTablet: [768, 3],
                    itemsMobile: [480, 3],
                    navigation: true,
                    pagination: false,
                    slideSpeed: 1000,
                    paginationSpeed: 1000,
                    navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
                });
            } else {
                var _temp = 0;
                var _mt = parseInt(productThumbInner.css("margin-top"));
                productThumb.css('max-height', productFeatureImage.height());
                var _maxScroll = productThumb.height() - productThumbInner.height();
                if (_maxScroll === 0) {
                    $('.product-thumb-control').remove();
                }
                thumbControlUp.click(function () {
                    _temp = _mt + 110;
                    console.log(_mt);
                    if (_temp > 0) {
                        _mt = 0;
                        productThumbInner.css("margin-top", _mt)
                    } else {
                        _mt = _temp;
                        productThumbInner.css("margin-top", _mt)
                    }
                });
                thumbControlDown.click(function () {
                    _temp = _mt - 110;
                    console.log(_mt);
                    if (_temp < _maxScroll) {
                        _mt = _maxScroll;
                        productThumbInner.css("margin-top", _mt)
                    } else {
                        _mt = _temp;
                        productThumbInner.css("margin-top", _mt)
                    }
                });
            }
        }
    });

    $('.product-single__thumbnail').click(function (e) {
        e.preventDefault();
        $('.product__thumbnail--target-' + $(this).data('trigger')).trigger('click');
        $('.product-single__thumbnail').removeClass('active');
        $(".product-image-feature").attr("src", $(this).attr("href"));
        $(".product-image-feature").attr("data-zoom-image", $(this).attr("href"));
        $(this).addClass('active');
    })

</script>

<script>
    $('.swatch-element.color').click(function (e) {
        var color_name = $(this).data("value");
        console.log(color_name);
        $(".item.product_variant_item[data-variant-color='" + color_name + "']").trigger('click');
    })
</script>
@endsection