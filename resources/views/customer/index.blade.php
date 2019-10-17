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
                            Đồng hành cùng phát triển
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
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp. Với sự chuyên nghiệp và am hiểu của
                                    mình, Suplo tự tin đồng hành cùng khách hàng và đối tác cùng nhau phát triển bền
                                    vững.
                                </p>


                                <p>
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp. Với sự chuyên nghiệp và am hiểu của
                                    mình, Suplo tự tin đồng hành cùng khách hàng và đối tác cùng nhau phát triển bền
                                    vững.
                                </p>


                            </div>
                            <div class="btn-viewmore">
                                <a href='gioi-thieu'>Về chúng tôi</a>
                            </div>
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
                            Các dịch vụ của Suplo
                        </h2>
                        <span class="section-title-border"></span>
                    </div>
                    <div class="grid-uniform md-mg-left-10">
                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="0.2s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img src="public/customer/img/hservice_icon1.png" alt="Công nghệ tiên phong">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">Công
                                        nghệ tiên phong</a>
                                </div>
                                <div class="hservice-desc">
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp.
                                </div>
                            </div>
                        </div>


                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="0.4s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.4s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img src="public/customer/img/hservice_icon2.png" alt="Nội dung số hấp dẫn">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">Nội
                                        dung số hấp dẫn</a>
                                </div>
                                <div class="hservice-desc">
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp.
                                </div>
                            </div>
                        </div>


                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="0.6s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.6s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img src="public/customer/img/hservice_icon3.png" alt="Hoạch định chiến lược">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">Hoạch
                                        định chiến lược</a>
                                </div>
                                <div class="hservice-desc">
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp.
                                </div>
                            </div>
                        </div>


                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="0.8s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.8s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img src="public/customer/img/hservice_icon4.png" alt="Vận hành tổ chức">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">Vận
                                        hành tổ chức</a>
                                </div>
                                <div class="hservice-desc">
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp.
                                </div>
                            </div>
                        </div>


                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="1s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 1s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img src="public/customer/img/hservice_icon5.png" alt="Quản lý tài chính">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">Quản
                                        lý tài chính</a>
                                </div>
                                <div class="hservice-desc">
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp.
                                </div>
                            </div>
                        </div>
                        <div class="grid__item wow fadeInUp md-pd-left10 large--one-third medium--one-half small--one-whole"
                            data-wow-delay="1.2s" data-wow-duration="0.75s"
                            style="visibility: hidden; animation-duration: 0.75s; animation-delay: 1.2s; animation-name: none;">
                            <div class="hservice-item text-center">
                                <div class="hservice-img">
                                    <img src="public/customer/img/hservice_icon6.png" alt="Phát triển vượt bậc">
                                </div>
                                <div class="hservice-title">
                                    <a href="#" onclick="(function(e){e.preventDefault();})(event)">Phát
                                        triển vượt bậc</a>
                                </div>
                                <div class="hservice-desc">
                                    Các dịch vụ của Suplo được dựa trên hơn 20 năm kinh nghiệm giúp đỡ khách hàng và đối
                                    tác trong kinh doanh và quản lý doanh nghiệp.
                                </div>
                            </div>
                        </div>
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
                                                    alt="Thay đổi mô hình kinh doanh đã lạc hậu giúp tăng doanh thu cho doanh nghiệp">
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
                                                <img id="img1"height="400" src="{{url('/') .'/' . $k->image_link}}" onerror="
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
    </main>
</div>
@endsection