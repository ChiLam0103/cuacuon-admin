@extends('layouts.customer')
@section('pageTitle', 'Trang chủ')
@section('content')
<div id="hero-slider">
    @foreach($home_banners as $k)
    <div class="hero-slide slick-slide slick-current slick-active"
        style="background-image: url({{$k->image_link}}), url('public/storage/banner-404.png'); height: 500px; width: 1519px;">
        <div class="hero-slide-content">
            <div class="wrapper">
                <div class="hero-content text-center">
                    <div class="slide-message" data-animation="fadeInDown" data-delay="0.5s"
                        style="animation-delay: 0.5s;">
                        <h4>
                            {{$k->main_title}}
                        </h4>
                        <p class="medium--hide small--hide">
                            {{$k->sub_title}}
                        </p>
                    </div>
                    <div class="slide-button">
                        <a href='{{$k->button_link}}' data-animation="fadeInUp" data-delay="1s" class="" tabindex="0"
                            style="animation-delay: 1s;">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div id="PageContainer" class="is-moved-by-drawer">
    <main class="main-content" role="main">
        <section id="home-aboutus">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center"
                        style="visibility: hidden; animation-name: none;">
                        <h2>
                            Chúng tôi là ai? Giá trị của chúng tôi
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid">
                        <div class="grid__item wow fadeInRight large--one-half medium--one-half small--one-whole float-right"
                            data-wow-delay="0.5s"
                            style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">
                            <div class="haboutus-img">
                                <img src="{{ asset('public/customer/img/haboutus_img.jpg') }}"
                                    alt="Đồng hành cùng phát triển">
                            </div>
                        </div>
                        <div class="grid__item wow fadeInLeft large--one-half medium--one-half small--one-whole"
                            data-wow-delay="0.5s"
                            style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">
                            <div class="haboutus-desc">
                                <p>
                                Anshin là ai :
                                    Nhận ra sự thiếu an toàn và hạn chế của cửa cuốn thế hệ cũ, Anshin mong muốn người việt được sử dụng sản phẩm cửa cuốn an toàn và thông minh hơn. Chính vì lẽ đó, Anshin đã lựa chọn các nhà cung cấp cửa cuốn công nghệ Đức hàng đầu tại Việt Nam như Mitadoor, Titadoor, KTNdoor và tích hợp những tích năng vượt trội của hệ thống quản lý cửa cuốn Rhino đến từ công ty công nghệ Pitech để cho ra đời sản phẩm cửa cuốn Thế Hệ Mới.
                                </p>
                                <p>
                                Điểm vượt trội của cửa cuốn Thế Hệ Mới<br>
                                - An toàn<br>
                                - Thông minh<br>
                                - Tiện lợi<br>
                                Công nghệ của chúng tôi :<br>
                                - Điều khiển bằng smartphone<br>
                                - Phát hiện xâm hại trái phép<br>
                                - Chia sẻ quyền sử dụng<br>
                                - Quản lý lịch sử sử dụng<br>
                                - An toàn cho người dùng<br>
                                Dịch vụ của chúng tôi :<br>
                                - Tư vấn miễn phí tại nhà<br>
                                - Lắp đặt chuyên nghiệp tận tâm<br>
                                - Bảo dưỡng đinh kỹ + miễn phí trong 1 năm đầu sử dụng
                                </p>
                            </div>
                            <!-- <div class="btn-viewmore">
                                <a href='gioi-thieu'>Về chúng tôi</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="home-statistics">
            <div class="hstatistics-overlay"></div>
            <div class="wrapper">
                <div class="inner">
                    <div class="grid-uniform md-mg-left-10">
                    @foreach($statistics as $k)
                        <div class="grid__item wow fadeInUp md-pd-left10 mg-bottom-30 large--one-quarter medium--one-quarter small--one-half text-center"
                            data-wow-duration="0.75s" data-wow-delay="0.2s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                            <div class="hau-statistic-number">
                                <span data-count="{{$k->number}}">0</span>{{$k->value}}
                            </div>
                            <div class="hau-stastic-border"></div>
                            <div class="hau-statistic-text">
                                {{$k->content}}
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>


        <section id="home-services">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center"
                        style="visibility: hidden; animation-name: none;">
                        <h2>
                            Dịch vụ nổi bật của chúng tôi
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid-uniform md-mg-left-10">
                        @foreach($services as $k)
                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="0.2s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img  src="{{url('/') .'/' . $k->image_link}}"
                                                    onerror="
                                                this.onerror=null;this.src='public/storage/not-found.jpeg' ;" alt="{{$k->title}}">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">{{$k->title}}</a>
                                </div>
                                <div class="hservice-desc">{{$k->content}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section id="home-articles-1">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center"
                        style="visibility: hidden; animation-name: none;">
                        <h2>
                            Sản phẩm nổi bật
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid">

                        <div id="owl-home-articles-slider-1" class="owl-carousel owl-theme">
                            @foreach($products->take(3) as $k)
                            <div class="owl-item" style="width: 390px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.2s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                                    <div class="article-item">
                                        <div class="article-img">
                                            <a href="chi-tiet-san-pham/{{$k->id}}">
                                                <img src="{{$k->image_link}}" height="400"
                                                    alt="{{$k->name}}">
                                            </a>
                                        </div>
                                        <div class="article-info-wrapper">
                                            <div class="article-title">
                                                <a href="chi-tiet-san-pham/{{$k->id}}">
                                                    {{$k->name}} </a>
                                            </div>
                                            <div class="article-desc" style="height: 150px">
                                                {!! substr($k->short_description,0, 300)!!}...
                                            </div>
                                            <div class="article-info" style="padding: 7px;">
                                                <!-- <button type="button"
                                                    style="height: 34px;line-height: 34px;padding: 0px 5px;margin-right: 5px; background: #11b5e6;color: #fff;border: 0px;outline: 0px;border-radius: 3px;"><a
                                                        style="color: white" href="{{ url('/') . '/lien-he'}}">Nhận tư
                                                        vấn</a></button> -->
                                                <button type="button"
                                                    style="width:100%;height: 34px;line-height: 34px;padding: 0px 5px;margin-right: 5px; background: #11b5e6;color: #fff;border: 0px;outline: 0px;border-radius: 3px;"><a
                                                        style="color: white" href="{{ url('/') . '/bao-gia'}}">Báo
                                                        giá</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="home-articles-2">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center"
                        style="visibility: hidden; animation-name: none;">
                        <h2>
                            Sản phẩm nổi bật
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid">

                        <div id="owl-home-articles-slider-1" class="owl-carousel owl-theme">
                            @foreach($products->take(3) as $k)
                            <div class="owl-item" style="width: 390px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.2s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                                    <div class="article-item">
                                        <div class="article-img">
                                            <a href="chi-tiet-san-pham/{{$k->id}}">
                                                <img src="{{$k->image_link}}" height="400"
                                                    alt="{{$k->name}}">
                                            </a>
                                        </div>
                                        <div class="article-info-wrapper">
                                            <div class="article-title">
                                                <a href="chi-tiet-san-pham/{{$k->id}}">
                                                    {{$k->name}} </a>
                                            </div>
                                            <div class="article-desc" style="height: 150px">
                                                {!! substr($k->short_description,0, 300)!!}...
                                            </div>
                                            <div class="article-info" style="padding: 7px;">
                                                <!-- <button type="button"
                                                    style="height: 34px;line-height: 34px;padding: 0px 5px;margin-right: 5px; background: #11b5e6;color: #fff;border: 0px;outline: 0px;border-radius: 3px;"><a
                                                        style="color: white" href="{{ url('/') . '/lien-he'}}">Nhận tư
                                                        vấn</a></button> -->
                                                <button type="button"
                                                    style="width:100%;height: 34px;line-height: 34px;padding: 0px 5px;margin-right: 5px; background: #11b5e6;color: #fff;border: 0px;outline: 0px;border-radius: 3px;"><a
                                                        style="color: white" href="{{ url('/') . '/bao-gia'}}">Báo
                                                        giá</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="home-articles">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center"
                        style="visibility: hidden; animation-name: none;">
                        <h2>
                            Tin tức nổi bật
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid">
                        <div id="owl-home-articles-slider" class="owl-carousel owl-theme">
                            @foreach($news->take(3) as $k)
                            <div class="owl-item" style="width: 390px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.2s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                                    <div class="article-item">
                                        <div class="article-img">
                                            <a href="noi-dung-tin-tuc/{{$k->id}}">
                                                <img id="img1" height="400" src="{{url('/') .'/' . $k->image_link}}"
                                                    onerror="
                                                this.onerror=null;this.src='public/storage/not-found.jpeg' ;">
                                            </a>
                                        </div>
                                        <div class="article-info-wrapper">
                                            <div class="article-title">
                                                <a href="noi-dung-tin-tuc/{{$k->id}}">{{$k->title}}</a>
                                            </div>
                                            <div class="article-desc">
                                                {!!str_limit($k->sub_content,250)!!}
                                            </div>
                                            <div class="article-info">
                                                <div class="article-date">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{($k->created_at==null) || ($k->created_at=='0000-00-00')?'':date('d/m/Y', strtotime($k->created_at))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="home-brands">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center"
                        style="visibility: hidden; animation-name: none;">
                        <h2>
                            Đối tác của chúng tôi
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid">
                        <div id="owl-brands-slider" class="owl-carousel">
                        <div class="owl-item" style="width: 195px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.4s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.4s; animation-name: none;">
                                    <a href=# class="text-center"><img src="public/customer/img/mita-door.jpg" alt="Logo hãng 2"></a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 195px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.8s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.8s; animation-name: none;">
                                    <a href=# class="text-center"><img src="public/customer/img/tita-door.jpg" alt="Logo hãng 4"></a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 195px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.2s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                                    <a href=# class="text-center"><img src="public/customer/img/ktn-door.jpg" alt="Logo hãng 1"></a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 195px;">
                                <div class="item grid__item wow fadeInUp" data-wow-delay="0.6s"
                                    data-wow-duration="0.75s"
                                    style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.6s; animation-name: none;">
                                    <a href=# class="text-center"><img src="public/customer/img/pitech.jpg" alt="Logo hãng 3"></a>
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