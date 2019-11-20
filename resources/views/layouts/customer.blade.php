<!DOCTYPE html>
<!-- saved from url=(0038)https://suplo-company-2.myharavan.com/ -->
<html
    class="supports-js supports-no-touch supports-csstransforms supports-csstransforms3d supports-fontface fontawesome-i2svg-active fontawesome-i2svg-complete"
    lang="vi" style="">
<!--<![endif]-->

<head>
    <?php $seotags = (App\Models\SeoTags::getAll())?>
    @foreach($seotags as $i)
    {!! $i->meta_tag!!}
    @endforeach
    <link rel="shortcut icon" href="{{ asset('public/customer/img/favicon.png') }}" type="image/png">
    <!-- Title and description ================================================== -->
    <title>
        @yield('pageTitle')
    </title>
    <!-- Helpers ================================================== -->
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <!-- CSS ================================================== -->
    <link href="{{ asset('public/customer/css/style.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/timber.scss.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/suplo-style.scss.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/owl.theme.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/owl.transitions.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/slick.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/slick-theme.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/css/jquery-fab-button.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('public/customer/css/_build-product.css') }}" rel="stylesheet" type="text/css" media="all">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('public/customer/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/slick.min.js') }}" type="text/javascript"></script>
    <!-- Font Aweseome -->
    <script defer="" src="{{ asset('public/customer/js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/customer/css/all.css') }}">
    <script src="{{ asset('public/customer/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/customer/js/lazyload.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
    window.addEventListener("load", function(event) {
        lazyload();
    });
    </script>

</head>

<body class=" template-index" cz-shortcut-listen="true">
    <!-- Trigger/Open The Modal -->
    <button id="popup-btn"></button>

    <!-- The Modal -->
    <!-- <div id="popup-subscribe" class="popup" style="display: none;">
        <div id="popup-modal" class="popup-content  animate down">
            <span class="close-popup">
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
            <div class="grid">
                <div class="grid__item push--large--one-half large--six-twelfths medium--one-whole small--one-whole">
                    <div class="popup-wrapper">
                        <div class="popup-title">
                            ĐĂNG KÝ NHẬN TIN NGAY HÔM NAY
                        </div>
                        <div class="popup-desc">
                            Suplo hứa sẽ không gửi những mail với nội dung không quan trọng hoặc spam. Các bạn là người
                            đầu
                            tiên biết được về:
                        </div>
                        <div class="popup-list">
                            <ul class="no-bullets">
                                <li> Các sản phẩm khuyến mại với mức giá không thể thấp hơn.</li>
                                <li> Tin tức mới nhất về các sản phẩm mới, sản phẩm hot, flash sale, hot deal, ... </li>
                                <li> Các sản phẩm khuyến mại với mức giá không thể thấp hơn. </li>
                                <li> Tin tức mới nhất về các sản phẩm mới, sản phẩm hot, flash sale, hot deal, ... </li>
                            </ul>
                        </div>
                        <div class="popup-form">
                            <div class="form-desc"> Đăng ký: </div>
                            <form accept-charset="UTF-8" action="https://suplo-company-2.myharavan.com/account/contact"
                                class="contact-form" method="post">
                                <input name="form_type" type="hidden" value="/customer">
                                <input name="utf8" type="hidden" value="✓">
                                <div class="input-group">
                                    <input type="email" value="" placeholder="Nhập email của bạn..."
                                        name="contact[email]" id="Email" class="input-group-field"
                                        aria-label="email@example.com">
                                    <input type="hidden" name="contact[tags]" value="newsletter">
                                    <button type="submit" name="subscribe" id="subscribe" value="GỬI">
                                        <i class="fab fa-telegram-plane"></i>
                                    </button>
                                    <div>
                                        <a href="https://www.facebook.com/SuploTeam/" class="popup-social-network"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <script>
    var modal = document.getElementById('popup-subscribe');
    var span = document.getElementsByClassName("close-popup")[0];

    var btn = document.getElementById("popup-btn");
    btn.onclick = function() {
        modal.style.display = "block";
        setTimeout(function() {
            $('#popup-modal').addClass('show');
        }, 500)
    }
    span.onclick = function() {
        hidePopupSub(modal)
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            hidePopupSub(modal)
        }
    }

    function hidePopupSub(modal) {
        $('#popup-modal').removeClass('show');
        setTimeout(function() {
            modal.style.display = "none";
        }, 500)
    }
    </script> -->

    <div id="NavDrawer" class="drawer drawer--right">
        <div class="drawer__header">
            <div class="drawer__close js-drawer-close">
                <button type="button" class="icon-fallback-text">
                    <span>Đóng</span>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <!-- begin mobile-nav -->
        <ul class="mobile-nav">
            <li class="mobile-nav__item mobile-nav__search">
            </li>
            <li class="mobile-nav__item mobile-nav__item--active">
                <a href="" class="mobile-nav__link">Trang chủ</a>
            </li>
            <li class="mobile-nav__item">
                <a href="gioi-thieu" class="mobile-nav__link">Giới thiệu</a>
            </li>
            <li class="mobile-nav__item" aria-haspopup="true">
                <div class="mobile-nav__has-sublist">
                    <a href="https://suplo-company-2.myharavan.com/blogs/cac-dich-vu" class="mobile-nav__link">Sản
                        phẩm</a>
                    <div class="mobile-nav__toggle">
                        <button type="button" class="icon-fallback-text mobile-nav__toggle-open">
                            <span class="icon icon-plus" aria-hidden="true"></span>
                            <span class="fallback-text">See More</span>
                        </button>
                        <button type="button" class="icon-fallback-text mobile-nav__toggle-close">
                            <span class="icon icon-minus" aria-hidden="true"></span>
                            <span class="fallback-text">"Đóng"</span>
                        </button>
                    </div>
                </div>
                <ul class="mobile-nav__sublist">
                    <?php $seotags = (App\Models\Types::getAll())?>
                    @foreach($seotags as $i)
                    <li class="mobile-nav__item" aria-haspopup="true">
                        <div class="mobile-nav__has-sublist">
                            <a href="https://suplo-company-2.myharavan.com/blogs/cac-dich-vu"
                                class="mobile-nav__link">Lá cửa</a>
                            <div class="mobile-nav__toggle">
                                <button type="button" class="icon-fallback-text mobile-nav__toggle-open">
                                    <span class="icon icon-plus" aria-hidden="true"></span>
                                    <span class="fallback-text">See More</span>
                                </button>
                                <button type="button" class="icon-fallback-text mobile-nav__toggle-close">
                                    <span class="icon icon-minus" aria-hidden="true"></span>
                                    <span class="fallback-text">"Đóng"</span>
                                </button>
                            </div>
                        </div>
                        <ul class="mobile-nav__sublist">
                            <li class="mobile-nav__item  mobile-nav__item--active">
                                <a href=# class="mobile-nav__link">Mita door</a>
                            </li>
                        </ul>
                    </li>
                    @endforeach

                </ul>
            </li>
            <li class="mobile-nav__item">
                <a href="bao-gia" class="mobile-nav__link">Báo giá</a>
            </li>
            <li class="mobile-nav__item">
                <a href="bao-hanh" class="mobile-nav__link">Bảo hành</a>
            </li>
            <li class="mobile-nav__item">
                <a href="tin-tuc" class="mobile-nav__link">Tin tức</a>
            </li>
            <li class="mobile-nav__item">
                <a href="lien-he" class="mobile-nav__link">Liên hệ</a>
            </li>
        </ul>
        <!-- //mobile-nav -->
    </div>

    <div class="cart-overlay"></div>

    <div id="CartDrawer" class="drawer drawer--left">
        <div class="drawer__header">
            <div class="drawer__title h3">Giỏ hàng</div>
            <div class="drawer__close js-drawer-close">
                <button type="button" class="icon-fallback-text">
                    <span class="icon icon-x" aria-hidden="true"></span>
                    <span class="fallback-text">"Đóng"</span>
                </button>
            </div>
        </div>
        <div id="CartContainer"></div>
    </div>

    <header id="header" style="border-bottom: 3px solid #11b5e6">
        <div class="desktop-header medium--hide small--hide">
            <div class="desktop-header-navbar">
                <div class="wrapper">
                    <div class="inner">
                        <ul class="no-bullets" style="font-size: 18px">
                            <li class="active wow fadeInLeft" data-wow-duration="0.75s" data-wow-delay="0.2s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                <a href="{{url('/')}}">
                                    <img src="{{ asset('public/customer/img/logo.png') }}" alt="Cửa cuốn"
                                        class="menu-logo" style="height: 40px; max-width: 200px"> </a>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="0.75s" data-wow-delay="0.4s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                <a href="{{url('gioi-thieu')}}">Giới thiệu </a>
                            </li>
                            <li class="wow fadeInLeft dropdown" data-wow-duration="0.75s" data-wow-delay="0.8s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 0.8s; animation-name: fadeInLeft;">
                                <a href="{{url('san-pham')}}">Sản phẩm
                                    <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="no-bullets">
                                    <?php $seotags = (App\Models\Types::getAll())?>
                                    @foreach($seotags as $i)
                                    <li class="has-child">
                                        <i class="fas fa-caret-right"></i>
                                        <a href="{{url('san-pham?type=').$i->id}}">{{$i->name}}
                                            <!-- <i class="fas fa-angle-right"></i> -->
                                        </a>
                                        <!-- <ul class="no-bullets">
                                            <?php $brands = (App\Models\Brands::getByType($i->id))?>
                                            @foreach($brands as $i)
                                            <li>
                                                <i class="fas fa-caret-right"></i>
                                                <a href=#>{{$i->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul> -->
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="0.75s" data-wow-delay="0.6s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                <a href="{{url('bao-gia')}}">Báo giá </a>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="0.75s" data-wow-delay="0.4s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                <a href="{{url('bao-hanh')}}">Bảo hành </a>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="0.75s" data-wow-delay="1.2s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="{{url('tin-tuc')}}">Tin tức </a>
                            </li>
                            <li class="wow fadeInLeft" data-wow-duration="0.75s" data-wow-delay="1.4s"
                                style="visibility: visible; animation-duration: 0.75s; animation-delay: 1.4s; animation-name: fadeInLeft;">
                                <a href="{{url('lien-he')}}">Liên hệ </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-header large--hide">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item medium--one-third small--one-half">
                            <div class="hd-logo text-left">

                                <a href="/">
                                    <img src="{{ asset('public/customer/img/logo.png') }}" alt="as">
                                </a>

                            </div>
                        </div>
                        <div
                            class="grid__item large--two-twelfths push--large--eight-twelfths medium--two-thirds small--one-half clearfix text-right">
                            <div class="hd-btnMenu">
                                <a href="javascript:void(0)"
                                    class="icon-fallback-text site-nav__link js-drawer-open-right"
                                    aria-controls="NavDrawer" aria-expanded="false">
                                    <span>Menu</span>
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <style>
    .fb_dialog {
        margin-bottom: 70px !important;
    }
    </style>
    <div class="fixed-action-btn" style="margin-bottom: 140px">
        <a id="first-fab" class="btn-floating btn-large red" data-fabcolor="#45d1ff" href="tel:1234567">
            <i class="material-icons">local_phone</i>
        </a>
    </div>
    <div id="fb-root"></div>
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="2509210899291446">
      </div>
    <script>
    $(document).ready(function() {
        $('#hero-slider').on('init', function(e, slick) {
            var $firstAnimatingElements = $('div.hero-slide:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        $('#hero-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('div.hero-slide[data-slick-index="' + nextSlide + '"]').find(
                '[data-animation]');
            doAnimations($animatingElements);
        });
        $('#hero-slider').slick({
            autoplay: true,
            autoplaySpeed: 10000,
            dots: true,
            fade: true
        });

        function doAnimations(elements) {
            var animationEndEvents =
                'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function() {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function() {
                    $this.removeClass($animationType);
                });
            });
        }
    });
    </script>
    @yield('content')
    <div id="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>


    <footer id="footer">
        <div class="footer-content">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid-uniform">
                        <div class="grid__item large--one-quarter medium--one-half small--one-whole wow fadeInLeft"
                            style="visibility: hidden; animation-name: none;">
                            <div class="ft-contact">
                                <h3 class="ft-title">
                                    Thông tin liên hệ
                                </h3>
                                <div class="ft-contact-address">
                                    <span class="ft-contact-icon"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12"
                                            aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-map-marker-alt"></i> --></span>
                                    <div class="ft-contact-detail">
                                    Văn phòng đại diện: 94 Nguyễn Du, Phường 7, Quận Gò Vấp, TP.Hồ Chí Minh
                                    </div>
                                </div>
                                <div class="ft-contact-address">
                                    <span class="ft-contact-icon"><svg class="svg-inline--fa fa-map-marker-alt fa-w-12"
                                            aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-map-marker-alt"></i> --></span>
                                    <div class="ft-contact-detail">
                                    Showroom: 63 Lê Đức Thọ, Phường 7, Quận Gò Vấp, TP.Hồ Chí Minh
                                    </div>
                                </div>
                                <div class="ft-contact-tel">
                                    <span class="ft-contact-icon"><svg class="svg-inline--fa fa-phone fa-w-16"
                                            aria-hidden="true" data-prefix="fas" data-icon="phone" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M493.397 24.615l-104-23.997c-11.314-2.611-22.879 3.252-27.456 13.931l-48 111.997a24 24 0 0 0 6.862 28.029l60.617 49.596c-35.973 76.675-98.938 140.508-177.249 177.248l-49.596-60.616a24 24 0 0 0-28.029-6.862l-111.997 48C3.873 366.516-1.994 378.08.618 389.397l23.997 104C27.109 504.204 36.748 512 48 512c256.087 0 464-207.532 464-464 0-11.176-7.714-20.873-18.603-23.385z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-phone"></i> --></span>
                                    <div class="ft-contact-detail">
                                        Số điện thoại: <a href="tel:0901772802">0901.772.802</a>
                                    </div>
                                </div>
                                <div class="ft-contact-email">
                                    <span class="ft-contact-icon"><svg class="svg-inline--fa fa-envelope fa-w-16"
                                            aria-hidden="true" data-prefix="fas" data-icon="envelope" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                            </path>
                                        </svg>
                                        <!-- <i class="fas fa-envelope"></i> --></span>
                                    <div class="ft-contact-detail">
                                        Email: <a href="mailto:cuacuon.anshin@gmail.com">cuacuon.anshin@gmail.com</a>
                                    </div>
                                </div>
                                <div class="ft-contact-email">
                                    <span class="ft-contact-icon">
                                        <i class="fas fa-barcode"></i></span>
                                    <div class="ft-contact-detail">
                                        Mã số thuế: <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid__item large--one-quarter medium--one-half small--one-whole wow fadeInUp"
                            style="visibility: hidden; animation-name: none;">
                            <div class="ft-nav">
                            </div>
                        </div>

                        <div class="grid__item large--one-quarter medium--one-half small--one-whole wow fadeInUp"
                            style="visibility: hidden; animation-name: none;">
                            <div class="ft-nav">
                            </div>
                        </div>

                        <div class="grid__item large--one-quarter medium--one-half small--one-whole wow fadeInLeft"
                            style="visibility: hidden; animation-name: none;">
                            <div class="ft-contact">
                                <div class="ft-contact-address">
                                    <div class="ft-contact-detail">
                                        <img src="{{ asset('public/customer/img/logo2.png') }}" alt="as">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyrights">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item large--one-half medium--one-whole small--one-whole float-right">
                            <div class="ft-copyrights-link text-right">
                                <ul class="no-bullets">
                                    <li class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.75s"
                                        style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                                        <a href='gioi-thieu'>Giới thiệu</a></li>
                                    <li class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.75s"
                                        style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.4s; animation-name: none;">
                                        <a href="bao-hanh">Bảo hành</a></li>
                                    <li class="wow fadeInRight" data-wow-delay="0.6s" data-wow-duration="0.75s"
                                        style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.6s; animation-name: none;">
                                        <a href='lien-he'>Liên hệ</a></li>
                                    <li class="wow fadeInRight" data-wow-delay="0.6s" data-wow-duration="0.75s"
                                        style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.6s; animation-name: none;">
                                        <a href='https://www.facebook.com/cuacuonthehemoi'><img style="height: 25px"
                                                src="{{ asset('public/customer/img/facebook.png') }}"></a>
                                    </li>
                                    <!-- <li class="wow fadeInRight" data-wow-delay="0.6s" data-wow-duration="0.75s"
                                        style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.6s; animation-name: none;">
                                        <a href='lien-he'><img style="height: 25px"
                                                src="{{ asset('public/customer/img/youtube.png') }}"></a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="grid__item large--one-half medium--one-whole small--one-whole">
                            <div class="ft-copyrights-content wow fadeInLeft" data-wow-duration="0.75s"
                                data-wow-delay="0.2s"
                                style="visibility: hidden; animation-duration: 0.75s; animation-delay: 0.2s; animation-name: none;">
                                Copyrights © 2019 by <a target="_blank" href="#">NAD</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div id="modalAddComplete">
    </div>

    <button type="button" id="modalAddCompleteBtn" style="display: none;"></button>

    <script>
    // Get the modal
    var modalAddComplete = document.getElementById('modalAddComplete');

    // Get the button that opens the modal
    var modalAddCompleteBtn = document.getElementById("modalAddCompleteBtn");

    // When the user clicks the button, open the modal
    modalAddCompleteBtn.onclick = function() {
        modalAddComplete.style.display = "block";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalAddComplete) {
            modalAddComplete.style.display = "none";
        }
    }
    </script>

    <script src="{{ asset('public/customer/js/api.jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/option_selection.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/fastclick.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/timber.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/customer/js/handlebars.min.js') }}" type="text/javascript"></script>
    <!-- Custom script -->

    <script id="CartTemplate" type="text/template">

        <form action="/cart" method="post" novalidate class="cart ajaxcart">
        <div class="ajaxcart__inner">
            #items
            <div class="ajaxcart__product">
                <div class="ajaxcart__row" data-line="line">
                    <div class="grid">
                        <div class="grid__item one-quarter">
                            <a href="url" class="ajaxcart__product-image"><img src="img" alt=""></a>
                        </div>
                        <div class="grid__item three-quarters">
                            <p>
                                <a href="url" class="ajaxcart__product-name">name</a>
                                #if variation
                                <span class="ajaxcart__product-meta">variation</span>
                                /if
                                #properties
                                #each this
                                #if this
                                <span class="ajaxcart__product-meta">@key: this</span>
                                /if
                                /each
                                /properties

                            </p>

                            <div class="grid--full display-table">
                                <div class="grid__item display-table-cell one-half">
                                    <div class="ajaxcart__qty">
                                        <button type="button"
                                                class="ajaxcart__qty-adjust ajaxcart__qty--minus icon-fallback-text"
                                                data-id="key" data-qty="itemMinus" data-line="line">
                                            <span class="icon icon-minus" aria-hidden="true"></span>
                                            <span class="fallback-text" aria-hidden="true">&minus;</span>
                                            <span class="visually-hidden">Giảm số lượng sản phẩm đi 1</span>
                                        </button>
                                        <input type="text" name="updates[]" class="ajaxcart__qty-num"
                                               value="itemQty" min="0" data-id="key" data-line="line"
                                               aria-label="quantity" pattern="[0-9]*">
                                        <button type="button"
                                                class="ajaxcart__qty-adjust ajaxcart__qty--plus icon-fallback-text"
                                                data-id="key" data-line="line" data-qty="itemAdd">
                                            <span class="icon icon-plus" aria-hidden="true"></span>
                                            <span class="fallback-text" aria-hidden="true">+</span>
                                            <span class="visually-hidden">Tăng số lượng sản phẩm lên 1</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="grid__item display-table-cell one-half text-right">
                                    #if discountsApplied
                                    <small class="ajaxcart-item__price-strikethrough"><s>{originalLinePrice}</s>
                                    </small>
                                    <br><span>{linePrice}</span>
                                    else
                                    <span>{linePrice}</span>
                                    /if
                                </div>
                            </div>
                            #if discountsApplied
                            <div class="grid--full display-table">
                                <div class="grid__item text-right">
                                    #each discounts
                                    <small class="ajaxcart-item__discount"> this.title </small>
                                    <br>
                                    /each
                                </div>
                            </div>
                            /if
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        /items


        <div>
            <label for="CartSpecialInstructions">Chú thích cho chủ cửa hàng</label>
            <textarea name="note" class="input-full" id="CartSpecialInstructions"> note </textarea>
        </div>

        </div>
        <div class="ajaxcart__footer">
            <div class="grid--full">
                <div class="grid__item two-thirds">
                    <p>Tổng tiền</p>
                </div>
                <div class="grid__item one-third text-right">
                    <p>{totalPrice}</p>
                </div>
                #if totalCartDiscount
                <p class="ajaxcart__savings text-center"><em>{totalCartDiscount}</em></p>
                /if
            </div>
            <p class="text-center">Vận chuyển</p>
            <button type="submit" class="btn--secondary btn--full cart__checkout" name="checkout">
                Thanh toán &rarr;
            </button>

        </div>
    </form>

</script>
    <script id="AjaxQty" type="text/template">

        <div class="ajaxcart__qty">
        <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus icon-fallback-text" data-id="key"
                data-qty="itemMinus">
            <span class="icon icon-minus" aria-hidden="true"></span>
            <span class="fallback-text" aria-hidden="true">&minus;</span>
            <span class="visually-hidden">Giảm số lượng sản phẩm đi 1</span>
        </button>
        <input type="text" class="ajaxcart__qty-num" value="itemQty" min="0" data-id="key" aria-label="quantity"
               pattern="[0-9]*">
        <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus icon-fallback-text" data-id="key"
                data-qty="itemAdd">
            <span class="icon icon-plus" aria-hidden="true"></span>
            <span class="fallback-text" aria-hidden="true">+</span>
            <span class="visually-hidden">Tăng số lượng sản phẩm lên 1</span>
        </button>
    </div>

</script>
    <script id="JsQty" type="text/template">

        <div class="js-qty">
        <button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="key"
                data-qty="itemMinus">
            <span class="icon icon-minus" aria-hidden="true"></span>
            <span class="fallback-text" aria-hidden="true">&minus;</span>
            <span class="visually-hidden">Giảm số lượng sản phẩm đi 1</span>
        </button>
        <input type="number" class="js-qty__num" value="itemQty" min="1" data-id="key" aria-label="quantity"
               pattern="[0-9]*" name="inputName" id="inputId">
        <button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="key"
                data-qty="itemAdd">
            <span class="icon icon-plus" aria-hidden="true"></span>
            <span class="fallback-text" aria-hidden="true">+</span>
            <span class="visually-hidden">Tăng số lượng sản phẩm lên 1</span>
        </button>
    </div>

</script>
    <script src="{{ asset('public/customer/js/ajax-cart.js') }}" type="text/javascript"></script>
    <script>
    jQuery(function($) {
        ajaxCart.init({
            formSelector: '#AddToCartForm',
            cartContainer: '#CartContainer',
            addToCartSelector: '#AddToCart',
            cartCountSelector: '#CartCount',
            cartCostSelector: '#CartCost',
            moneyFormat: "amount₫"
        });
    });

    jQuery(document.body).on('afterCartLoad.ajaxCart', function(evt, cart) {
        // Bind to 'afterCartLoad.ajaxCart' to run any javascript after the cart has loaded in the DOM
        timber.RightDrawer.open();
    });
    </script>

    <script>
    new WOW().init();
    </script>


    <script>
    function Utils() {}

    Utils.prototype = {
        constructor: Utils,
        isElementInView: function(element, fullyInView, pageTop) {
            var pageBottom = pageTop + $(window).height();
            var elementTop = $(element).offset().top;
            var elementBottom = elementTop + $(element).height();

            if (fullyInView === true) {
                return ((pageTop < elementTop) && (pageBottom > elementBottom));
            } else {
                return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
            }
        }
    };
    var Utils = new Utils();
    var isElementInView = Utils.isElementInView($('#home-statistics'), false, 0);
    var counter = true;
    $(window).scroll(function() {
        if (Utils.isElementInView($('#home-statistics'), false, $(window).scrollTop())) {
            if (counter) {
                $('.hau-statistic-number > span').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 3000,
                        easing: 'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
                counter = false;
            }
        } else {}
    });
    </script>


    <!-- Tabs -->
    <script>
    function openHcTab(evt, cityName) {
        var i, hc_tabcontent, hc_tablinks;
        hc_tabcontent = document.getElementsByClassName("hc-tabcontent");
        for (i = 0; i < hc_tabcontent.length; i++) {
            hc_tabcontent[i].style.display = "none";
        }
        hc_tablinks = document.getElementsByClassName("hc-tablinks");
        for (i = 0; i < hc_tablinks.length; i++) {
            hc_tablinks[i].className = hc_tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpenHcTab").click();
    </script>


    <script>
    $(".hc-search-wrapper > a").click(function() {
        $(".search-bar-header").toggle();
    });
    </script>

    <!-- Owl carousel init -->
    <script>
    $(document).ready(function() {
        $("#owl-htesti-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1000, 3],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: false,
            pagination: true,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-home-articles-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1000, 3],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-home-articles-slider-1").owlCarousel({
            items: 3,
            itemsDesktop: [1000, 3],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });


        $("#owl-brands-slider").owlCarousel({
            items: 6,
            itemsDesktop: [1000, 6],
            itemsDesktopSmall: [900, 5],
            itemsTablet: [768, 4],
            itemsMobile: [480, 2],
            navigation: false,
            pagination: false,
            slideSpeed: 1000,
            autoPlay: 3000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-customize-variants-products-slider").owlCarousel({
            items: 5,
            itemsDesktop: [1000, 5],
            itemsDesktopSmall: [900, 5],
            itemsTablet: [768, 4],
            itemsMobile: [480, 3],
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            autoPlay: 3000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-rpa-slider").owlCarousel({
            items: 5,
            itemsDesktop: [1000, 5],
            itemsDesktopSmall: [900, 5],
            itemsTablet: [768, 4],
            itemsMobile: [480, 3],
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider1").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider2").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider3").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider4").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider5").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider6").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider7").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider8").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider9").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });

        $("#owl-blog-single-slider10").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [600, 1],
            itemsMobile: false,
            navigation: true,
            pagination: false,
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });
    });
    </script>

    <!-- Back to top -->
    <script>
    jQuery(document).ready(function() {
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('#back-to-top').fadeIn(duration);
            } else {
                jQuery('#back-to-top').fadeOut(duration);
            }
        });

        jQuery('#back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        });

        window.onscroll = changePos;

        function changePos() {
            var header = $("#header");
            var headerheight = $("#header").height();
            if (window.pageYOffset > headerheight) {
                header.addClass('scrolldown');
            } else {
                header.removeClass('scrolldown');
            }
        }
    });
    </script>


    <!-- popup loaded -->
    <script>
    $(document).ready(function() {
        var date = new Date();
        var minutes = 60;
        date.setTime(date.getTime() + (minutes * 60 * 1000));

        if (getCookie('popupNewLetterStatus') != 'closed') {
            $('#popup-btn').trigger('click');
            setCookie('popupNewLetterStatus', 'closed', date);
        };
    })
    </script>

    <!-- quick view -->
    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 99999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        transtion: all .5s;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 780px;
        transform: translatey(-30px);
        transition: all .5s;
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        right: 0;
        top: 0;
        width: 40px;
        text-align: center;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
    <div class="modal" id="productQuickView">
        <div class="modal-content">
            <span id="close" class="close">×</span>
            <form class="grid" id="form-quick-view">
                <div class="grid__item large--five-tenths">
                    <div class="image-zoom">
                        <img id="p-product-image-feature" class="p-product-image-feature" src=#>
                        <div id="p-sliderproduct" class="flexslider">
                            <ul class="slides"></ul>
                        </div>
                    </div>
                </div>
                <div class="grid__item large--five-tenths pull-right">
                    <h4 class="p-title   modal-title " id="">Tên sản phẩm</h4>
                    <p class="product-more-info">
                        <span class="product-sku">
                            Mã sản phẩm: <span id="ProductSku">01923123</span>
                        </span>
                    </p>
                    <div class="form-input product-price-wrapper">
                        <div class="product-price">
                            <span class="p-price "></span>
                            <del></del>
                        </div>
                        <em id="PriceSaving"></em>
                    </div>
                    <div class="p-option-wrapper">
                        <select name="id" class="" id="p-select-quickview"></select>
                    </div>
                    <div id="swatch-quick-view" class="select-swatch">

                    </div>
                    <div class="form-input hidden">
                        <label>Số lượng</label>


                        <div class="js-qty">
                            <button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text"
                                data-id="" data-qty="0">
                                <span class="icon icon-minus" aria-hidden="true"></span>
                                <span class="fallback-text" aria-hidden="true">−</span>
                                <span class="visually-hidden">Giảm số lượng sản phẩm đi 1</span>
                            </button>
                            <input type="number" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity"
                                pattern="[0-9]*" name="quantity" id="">
                            <button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text"
                                data-id="" data-qty="11">
                                <span class="icon icon-plus" aria-hidden="true"></span>
                                <span class="fallback-text" aria-hidden="true">+</span>
                                <span class="visually-hidden">Tăng số lượng sản phẩm lên 1</span>
                            </button>
                        </div>


                    </div>

                    <div class="form-input" style="width: 100%">
                        <button type="submit" class="btn btn-addcart" id="AddToCardQuickView">Thêm vào giỏ</button>
                        <button disabled="" class="btn btn-soldout">Hết hàng</button>
                        <div class="qv-readmore">
                            <span> hoặc </span><a class="read-more p-url" href=# role="button">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="loading">
            <div></div>
        </div>
    </div>
    <script>
    $('#AddToCardQuickView').on('click', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: '/cart/add.js',
            async: false,
            data: jQuery('#form-quick-view').serialize(),
            dataType: 'json',
            success: function() {
                $(".close").trigger('click');
                updateCart();
                updateCartModal();
            },
            error: function(XMLHttpRequest, textStatus) {
                Haravan.onError(XMLHttpRequest, textStatus);
            }
        });
    });
    var callBack = function(variant, selector) {
        if (variant) {
            modal = $('#productQuickView');
            $('.p-price').html(Haravan.formatMoney(variant.price, "amount₫"));
            if (variant.sku) {
                $('#ProductSku').html(variant.sku);
                $('.product-sku').show();
            } else {
                $('.product-sku').hide();
            }
            if (variant.compare_at_price - variant.price > 0) {
                $('#PriceSaving').html('(Bạn đã tích kiệm được ' + Haravan.formatMoney(variant.compare_at_price -
                    variant.price, "amount₫") + ')')
            } else {
                $('#PriceSaving').html('')
            }
            if (variant.compare_at_price > 0)
                modal.find('del').html(Haravan.formatMoney(variant.compare_at_price, "amount₫"));
            else
                modal.find('del').html('');
            if (variant.available) {
                modal.find('.btn-addcart').css('display', 'block');
                modal.find('.btn-soldout').css('display', 'none');
                if (variant.featured_image) {
                    var newImg = variant.featured_image,
                        el = $('.p-product-image-feature')[0];
                    Haravan.Image.switchImage(newImg, el, timber.switchImage);
                }
                check_variant_quickview = true;
            } else {
                modal.find('.btn-addcart').css('display', 'none');
                modal.find('.btn-soldout').css('display', 'block');

            }
        } else {
            modal.find('.btn-addcart').css('display', 'none');
            modal.find('.btn-soldout').css('display', 'block');
            check_variant_quickview = false;

        }
    }
    var p_select_data = $('.p-option-wrapper').html();
    var p_zoom = $('.image-zoom').html();
    var quickViewProduct = function(purl) {

        if ($(window).width() < 680) {
            window.location = purl;
            return false;
        }
        modal = $('#productQuickView');
        $.ajax({
            url: purl + '.js',
            async: false,
            success: function(product) {
                $.each(product.options, function(i, v) {
                    product.options[i] = v.name;
                })
                modal.find('.p-title').html(product.title);
                modal.find('.p-option-wrapper').html(p_select_data);
                modal.find('#swatch-quick-view').html('');
                $('.image-zoom').html(p_zoom);
                modal.find('.p-url').attr('href', product.url);

                $.each(product.variants, function(i, v) {
                    modal.find('select#p-select-quickview').append("<option value='" + v.id +
                        "'>" + v.title + ' - ' + v.price + "</option>");
                })
                if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -1)
                    $('.p-option-wrapper').hide();
                else
                    $('.p-option-wrapper').show();
                if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -
                    1) {
                    callBack(product.variants[0], null);
                } else {
                    new Haravan.OptionSelectors("p-select-quickview", {
                        product: product,
                        onVariantSelected: callBack
                    });
                    if (product.options.length == 1 && product.options[0].indexOf('Tiêu đề') == -1)
                        modal.find('.selector-wrapper:eq(0)').prepend('<label>' + product.options[0] +
                            '</label>');
                    $('.p-option-wrapper select:not(#p-select-quickview)').each(function() {
                        $(this).wrap(
                            '<span class="custom-dropdown custom-dropdown--white"></span>');
                        $(this).addClass(
                            "custom-dropdown__select custom-dropdown__select--white");
                    });
                    var filePath = window.file_url.substring(0, window.file_url.lastIndexOf('?'));
                    var assetUrl = window.asset_url.substring(0, window.asset_url.lastIndexOf('?'));

                    product.options.forEach(function(item) {

                    })
                    var variantSwatch = '';
                    for (var j = 0; j < product.options.length; j++) {
                        var option_index = j;
                        var op_index_plus = option_index + 1;
                        var swatch = product.options[option_index];
                        variantSwatch += '<div id="variant-swatch-' + option_index +
                            '-quickview" class="swatch swatch-quick-view clearfix" data-option="option' +
                            op_index_plus + '" data-option-index="' + option_index + '">';
                        variantSwatch += '<div class="header"> ' + product.options[j] +
                            ' </div><div class="select-swap">';
                        var is_color = false;
                        if (product.options[j] == "Màu sắc" || product.options[j] == "Màu") {
                            is_color = true;
                        }
                        var values = '';
                        for (var i = 0; i < product.variants.length; i++) {
                            var value = convertToSlug(product.variants[i].options[
                                option_index]); //value handle :(
                            var _value = product.variants[i].options[option_index];

                            if (values.indexOf(value) < 0) {
                                values += ',';
                                values += ',' + value;
                                values = values.split(',');
                                if (is_color) {
                                    variantSwatch += '<div data-value="' + _value +
                                        '" class="n-sd swatch-element color ' + value;

                                } else {
                                    variantSwatch += '<div data-value="' + _value +
                                        '" class="n-sd swatch-element ' + value;
                                }

                                if (option_index == 2) {
                                    variantSwatch += 'variant-3">';
                                } else {
                                    variantSwatch += '">';
                                }

                                variantSwatch += '<input class="variant-' + option_index +
                                    ' input-quickview" id="qv-swatch-' + option_index + '-' + value +
                                    '" type="radio" name="option' + op_index_plus + '" value="' +
                                    _value + '"';
                                if (j == 0) {
                                    variantSwatch += ' checked/>';
                                } else {
                                    variantSwatch += ' />';
                                }

                                if (is_color) {
                                    var img_url = '';
                                    if (product.variants[i].featured_image != null) {
                                        img_url = Haravan.resizeImage(product.variants[i].featured_image
                                            .src, 'thumb');
                                    }
                                    if (img_url !== '') {
                                        if (img_url.indexOf('noDefaultImage6') < 0) {
                                            variantSwatch += '<label class="' + value +
                                                ' has-thumb" for="qv-swatch-' + option_index + '-' +
                                                value + '" style="background: url(' + img_url +
                                                ') top left no-repeat" >';
                                        }
                                    }
                                    //fix o day
                                    else {
                                        variantSwatch += '<label class="' + value +
                                            ' no-thumb" for="qv-swatch-' + option_index + '-' + value +
                                            '">';
                                    }
                                    variantSwatch += '	<span>' + _value +
                                        '</span><img class="crossed-out" src="' + assetUrl +
                                        'soldout.png" /><img class="img-check" src="' + assetUrl +
                                        'select-pro.png" /></label>';

                                } else {
                                    variantSwatch += '<label for="qv-swatch-' + option_index + '-' +
                                        value + '">' + _value + '<img class="crossed-out" src="' +
                                        assetUrl + 'soldout.png" /><img class="img-check" src="' +
                                        assetUrl + 'select-pro.png" /></label>';
                                }
                                //console.log(variantSwatch);
                                //console.log(product.variants[i])
                                variantSwatch += '</div>';
                            }
                        }

                        variantSwatch += '</div>';
                        variantSwatch += '</div>';
                    }

                    modal.find('#swatch-quick-view').html(variantSwatch);

                    callBack(product.variants[0], null);
                    callFirstVariantQuickView();
                }
                if (product.images.length == 0) {
                    modal.find('.p-product-image-feature').attr('src',
                        '//hstatic.net/0/0/global/noDefaultImage6_large.gif');
                } else {
                    $('#p-sliderproduct').remove();
                    $('.image-zoom').append("<div id='p-sliderproduct'>");
                    $('#p-sliderproduct').append("<ul class='owl-carousel inline-list'>");
                    $.each(product.images, function(i, v) {
                        elem = $('<li class="item">').append(
                            '<a href="#" data-image="" data-zoom-image=""><img /></a>');
                        elem.find('a').attr('data-image', Haravan.resizeImage(v, 'medium'));
                        elem.find('a').attr('data-zoom-image', Haravan.resizeImage(v, 'large'));
                        elem.find('img').attr('data-image', Haravan.resizeImage(v, 'medium'));
                        elem.find('img').attr('data-zoom-image', Haravan.resizeImage(v,
                            'large'));
                        elem.find('img').attr('src', Haravan.resizeImage(v, 'medium'));
                        modal.find('.owl-carousel').append(elem);
                    });
                    var owl = $('#p-sliderproduct .owl-carousel');
                    owl.owlCarousel({
                        items: 3,
                        navigation: true,
                        navigationText: [navRightText, navLeftText]
                    });
                    $('#p-sliderproduct .owl-carousel .owl-item').first().children('.item').addClass(
                        'active');
                    modal.find('.p-product-image-feature').attr('src', Haravan.resizeImage(product
                        .featured_image, 'large'));
                    $(".modal-footer .btn-readmore").attr('href', purl);
                }
            }
        });

        return false;
    }
    $('#productQuickView').on('click', '.item img', function(event) {
        event.preventDefault();
        modal = $('#quick-view-modal');
        modal.find('.p-product-image-feature').attr('src', $(this).attr('data-zoom-image'));
        modal.find('.item').removeClass('active');
        $(this).parents('li').addClass('active');
        return false;
    });
    $(function() {
        $('#close').click(function() {
            $('#productQuickView .modal-content').css('opacity', '0');
            $('#productQuickView .modal-content').css('transform', 'translateY(-30px)');
            $('#productQuickView').css('background-color', 'rgba(0,0,0,0)');
            setTimeout(function() {
                $('#productQuickView').hide();
            }, 500);
            document.getElementById("form-quick-view").reset();
        })
        window.onclick = function(event) {
            if (event.target == document.getElementById('productQuickView')) {
                $('#productQuickView .modal-content').css('opacity', '0');
                $('#productQuickView .modal-content').css('transform', 'translateY(-30px)');
                $('#productQuickView').css('background-color', 'rgba(0,0,0,0)');
                setTimeout(function() {
                    $('#productQuickView').hide();
                }, 500);
                document.getElementById("form-quick-view").reset();
            }
        }
    })
    $(document).on("click", ".quick-view", function(event) {
        event.preventDefault();

        if (!quickViewProduct($(this).attr('data-handle'))) {
            if ($(window).width() > 680) {
                $('#productQuickView .modal-content').css('opacity', '0');
                $('#productQuickView').show();
                $('#productQuickView').css('background-color', 'rgba(0,0,0,0.4)');
                $('#loading').show();

                var images = $("#productQuickView img");
                var loadedImgNum = 0;

                images.on('load', function() {
                    loadedImgNum += 1;
                    if (loadedImgNum == images.length) {
                        var topPQZ = ($('#productQuickView').height() - $('.modal-content').height()) /
                            2;
                        $('#loading').hide();
                        $('#productQuickView .modal-content').css('opacity', '1');
                        $('#productQuickView .modal-content').css('transform', 'translateY(0)');
                        $('#productQuickView .modal-content').css('margin-top', topPQZ - 50);
                    }
                });
            }
            $('#p-sliderproduct a').on('click', function(evt) {
                evt.preventDefault();
                var newImage = $(this).data('zoom-image');
                $('.p-product-image-feature').attr('src', newImage);
            });
        }
    });

    function callFirstVariantQuickView() {
        var _chage = '';
        $('#productQuickView .swatch-element[data-value="' + $('.selector-wrapper .single-option-selector').eq(0)
            .val() + '"]').find('input').click();
        $('#productQuickView .swatch-element[data-value="' + $('.selector-wrapper .single-option-selector').eq(1)
            .val() + '"]').find('input').click();
        if (swatch_size == 2) {
            var _avi_op1 = '';
            var _avi_op2 = '';
            var _count = $('#variant-swatch-1-quickview .swatch-element').size();
            $('#variant-swatch-0-quickview .swatch-element').each(function(ind, value) {
                var _key = $(this).data('value');
                var _unavi = 0;
                $('#productQuickView .single-option-selector').eq(0).val(_key).change();
                $('#variant-swatch-1-quickview .swatch-element').each(function(i, v) {
                    var _val = $(this).data('value');
                    $('#productQuickView .single-option-selector').eq(1).val(_val).change();
                    if (check_variant_quickview == true) {
                        if (_avi_op1 == '') {
                            _avi_op1 = _key;
                        }
                        if (_avi_op2 == '') {
                            _avi_op2 = _val;
                        }
                    } else {
                        _unavi += 1;
                    }
                })
                if (_unavi == _count) {
                    $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _key + '"]').addClass(
                        'soldout');
                    $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _key + '"]').find('input')
                        .attr('disabled', 'disabled');
                }
            })
            $('#variant-swatch-1-quickview .swatch-element[data-value = "' + _avi_op2 + '"] input').click();
            $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
        } else if (swatch_size == 3) {
            var _avi_op1 = '';
            var _avi_op2 = '';
            var _avi_op3 = '';
            var _size_op2 = $('#variant-swatch-1-quickview .swatch-element').size();
            var _size_op3 = $('#variant-swatch-2-quickview .swatch-element').size();

            $('#variant-swatch-0-quickview .swatch-element').each(function(ind, value) {
                var _key_va1 = $(this).data('value');
                var _count_unavi = 0;
                $('#productQuickView .single-option-selector').eq(0).val(_key_va1).change();
                $('#variant-swatch-1-quickview .swatch-element').each(function(i, v) {
                    var _key_va2 = $(this).data('value');
                    var _unavi_2 = 0;
                    $('#productQuickView .single-option-selector').eq(1).val(_key_va2).change();
                    $('#variant-swatch-2-quickview .swatch-element').each(function(j, z) {
                        var _key_va3 = $(this).data('value');
                        $('#productQuickView .single-option-selector').eq(2).val(_key_va3)
                            .change();
                        if (check_variant_quickview == true) {
                            if (_avi_op1 == '') {
                                _avi_op1 = _key_va1;
                            }
                            if (_avi_op2 == '') {
                                _avi_op2 = _key_va2;
                            }
                            if (_avi_op3 == '') {
                                _avi_op3 = _key_va3;
                            }
                        } else {
                            _unavi_2 += 1;
                        }
                    })
                    if (_unavi_2 == _size_op3) {
                        _count_unavi += 1;
                    }
                })
                if (_size_op2 == _count_unavi) {
                    $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _key_va1 + '"]').addClass(
                        'soldout');
                    $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _key_va1 + '"]').find(
                        'input').attr('disabled', 'disabled');
                }
            })
            $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
        }
        var img_ = $('#variant-swatch-0-quickview .swatch-element[data-value = "' + _avi_op1 + '"] input').data(
            'img-src');
    }
    </script>


</body>
<script src="{{ asset('public/js/jquery-fab-button.min.js') }}" type="text/javascript"></script>

</html>