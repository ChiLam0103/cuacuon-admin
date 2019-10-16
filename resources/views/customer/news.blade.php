@extends('layouts.customer')
@section('pageTitle', 'Danh sách sản phẩm')
@section('content')


<div>
    <section id="breadcrumb-wrapper5" class="breadcrumb-w-img">
        <div class="breadcrumb-overlay"></div>
        <div class="breadcrumb-content">
            <div class="wrapper">
                <div class="inner text-center">
                    <div class="breadcrumb-big">
                        <h2>
                            Tin tức
                        </h2>
                    </div>
                    <!-- <div class="breadcrumb-small">
                        <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                        <span aria-hidden="true">/</span>
                        <span>Tất cả tin tức</span>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <div id="PageContainer" class="is-moved-by-drawer">
        <main class="main-content" role="main">
            <section id="blog-wrapper">
                <div class="wrapper">
                    <div class="inner">
                        <div class="grid">
                            <div class="grid__item medium--one-whole small--one-whole">
                                <div class="blog-content">
                                    <div class="blog-content-wrapper">
                                        <div class="blog-head">
                                            <div class="blog-title">
                                                <h1>Danh sách tin tức</h1>
                                            </div>
                                        </div>
                                        <div class="blog-body">
                                            <div class="grid-uniform">
                                                @foreach($news as $k)
                                                <div
                                                    class="grid__item large--one-third medium--one-third small--one-whole md-pd-left15 ">
                                                    <div class="article-item">
                                                        <div class="article-img">
                                                            <a href="noi-dung-tin-tuc/{{$k->id}}">
                                                                <img id="img1" height="400"
                                                                    src="{{url('/') .'/' . $k->image_link}}"
                                                                    onerror="
                                                            this.onerror=null;this.src='public/storage/not-found.jpeg' ;">
                                                            </a>
                                                        </div>
                                                        <div class="article-info-wrapper">
                                                            <div class="article-title">
                                                                <a href="noi-dung-tin-tuc/{{$k->id}}">{{$k->title}}</a>
                                                            </div>
                                                            <div class="article-desc">{!!str_limit($k->content,250)!!}
                                                            </div>
                                                            <div class="article-info">
                                                                <div class="article-date">
                                                                    <svg class="svg-inline--fa fa-calendar-alt fa-w-14"
                                                                        aria-hidden="true" data-prefix="fas"
                                                                        data-icon="calendar-alt" role="img"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z">
                                                                        </path>
                                                                    </svg>

                                                                    {{date('d-m-Y', strtotime($k->created_at))}}
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
                            </div>
                            <!-- <div class="grid__item large--three-twelfths medium--one-whole small--one-whole">
                                <div class="blog-sidebar">
                                    <div class="all-tags">
                                        <div class="blog-sb-title clearfix">
                                            <h3>
                                                Từ khóa
                                            </h3>
                                        </div>
                                        <div class="all-tags-wrapper clearfix">
                                            <a class="tag-item" href="/blogs/news/tagged/quan-ly">Quản lý</a>
                                            <a class="tag-item" href="/blogs/news/tagged/tuyen-dung">Tuyển dụng</a>
                                            <a class="tag-item" href="/blogs/news/tagged/kinh-doanh">Kinh doanh</a>
                                            <a class="tag-item" href="/blogs/news/tagged/bao-mat">Bảo mật</a>
                                            <a class="tag-item" href="/blogs/cac-dich-vu/tagged/dich-vu">Dịch vụ</a>
                                        </div>
                                    </div>
                                    <div class="blog-sb-banner">
                                        <a href="/collections/all">
                                            <img src="//theme.hstatic.net/1000278915/1000357457/14/blog_banner_2.png?v=1962"
                                                alt="Ảnh banner 2">
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection