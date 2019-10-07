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
                            Tất cả tin tức
                        </h2>
                    </div>
                    <div class="breadcrumb-small">
                        <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                        <span aria-hidden="true">/</span>
                        <span>Tất cả tin tức</span>
                    </div>
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
                            <article
                                class="float-right grid__item large--nine-twelfths medium--one-whole small--one-whole"
                                itemscope="" itemtype="http://schema.org/Article">

                                <div class="article-content">
                                    <div class="article-head">
                                        <h1>{{$new->title}}</h1>
                                        <div class="grid mg-left-15">
                                            <div
                                                class="grid__item large--one-half medium--one-half small--one-half pd-left15">
                                                <div class="article-date-comment">
                                                    <div class="date"><svg
                                                            class="svg-inline--fa fa-calendar-alt fa-w-14"
                                                            aria-hidden="true" data-prefix="fas"
                                                            data-icon="calendar-alt" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                            data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z">
                                                            </path>
                                                        </svg><!-- <i class="fas fa-calendar-alt"></i> --> {{date('d-m-Y', strtotime($new->created_at))}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="article-tldr clearfix">
                                        <p>{!!str_limit($new->content,250)!!}</p>
                                    </div>

                                    <div class="article-body">
                                    {!!$new->content!!}
                                    </div>
                                </div>
                                <!-- chỗ này để nguyên -->
                                <div class="social-network-actions-outside text-right">
                                    <div class="fb-send"
                                        data-href="https://suplo-company-2.myharavan.com/blogs/cac-du-an-noi-bat/ke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc">
                                    </div>
                                    <div class="fb-like fb_iframe_widget"
                                        data-href="https://suplo-company-2.myharavan.com/blogs/cac-du-an-noi-bat/ke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc"
                                        data-layout="button" data-action="like" data-size="small" data-show-faces="true"
                                        data-share="true" fb-xfbml-state="rendered"
                                        fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=833&amp;href=https%3A%2F%2Fsuplo-company-2.myharavan.com%2Fblogs%2Fcac-du-an-noi-bat%2Fke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc&amp;layout=button&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small">
                                        <span style="vertical-align: bottom; width: 112px; height: 20px;"><iframe
                                                name="f3122bcfc46a2e" width="1000px" height="1000px"
                                                title="fb:like Facebook Social Plugin" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                allow="encrypted-media"
                                                src="https://www.facebook.com/v2.11/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df2d46637434e5a8%26domain%3Dsuplo-company-2.myharavan.com%26origin%3Dhttps%253A%252F%252Fsuplo-company-2.myharavan.com%252Ff3e783c196e7c78%26relation%3Dparent.parent&amp;container_width=833&amp;href=https%3A%2F%2Fsuplo-company-2.myharavan.com%2Fblogs%2Fcac-du-an-noi-bat%2Fke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc&amp;layout=button&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"
                                                style="border: none; visibility: visible; width: 112px; height: 20px;"
                                                class=""></iframe></span></div>
                                </div>
                                <div id="section-fbcomment" class="fb-comments-wrapper">
                                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop"
                                        data-href="https://suplo-company-2.myharavan.com/blogs/cac-du-an-noi-bat/ke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc"
                                        data-width="100%" data-numposts="5" fb-xfbml-state="rendered"
                                        fb-iframe-plugin-query="app_id=&amp;container_width=848&amp;height=100&amp;href=https%3A%2F%2Fsuplo-company-2.myharavan.com%2Fblogs%2Fcac-du-an-noi-bat%2Fke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v2.11"
                                        style="width: 100%;"><span
                                            style="vertical-align: bottom; width: 100%; height: 178px;"><iframe
                                                name="f2491548af2213c" width="1000px" height="100px"
                                                title="fb:comments Facebook Social Plugin" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                allow="encrypted-media"
                                                src="https://www.facebook.com/v2.11/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df10cae8195c735c%26domain%3Dsuplo-company-2.myharavan.com%26origin%3Dhttps%253A%252F%252Fsuplo-company-2.myharavan.com%252Ff3e783c196e7c78%26relation%3Dparent.parent&amp;container_width=848&amp;height=100&amp;href=https%3A%2F%2Fsuplo-company-2.myharavan.com%2Fblogs%2Fcac-du-an-noi-bat%2Fke-hoach-dua-doanh-nghiep-phat-trien-va-thanh-cong-trong-cac-linh-vuc&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v2.11"
                                                style="border: none; visibility: visible; width: 100%; height: 178px;"
                                                class=""></iframe></span></div>
                                </div>
                                <!-- <div class="related-articles">
                                    <div class="related-articles-head">
                                        <h3>
                                            Các bài viết liên quan
                                        </h3>
                                    </div>
                                    <div class="related-articles-body">
                                        <ul class="no-bullets">
                                            <li>
                                                <a
                                                    href="/blogs/cac-du-an-noi-bat/lien-ket-tai-chinh-da-nganh-de-thu-ve-nguon-loi-khong-lo">Liên
                                                    kết tài chính đa ngành để thu về nguồn lợi khổng lồ</a>
                                            </li>

                                            <li>
                                                <a
                                                    href="/blogs/cac-du-an-noi-bat/hoach-dinh-tuong-lai-cho-cac-cong-trinh-kien-truc">Hoạch
                                                    định tương lai cho các công trình kiến trúc</a>
                                            </li>



                                            <li>
                                                <a
                                                    href="/blogs/cac-du-an-noi-bat/he-thong-quan-ly-moi-quan-he-giua-nguoi-dung-va-doanh-nghiep">Hệ
                                                    thống quản lý mối quan hệ giữa người dùng và doanh nghiệp</a>
                                            </li>



                                            <li>
                                                <a
                                                    href="/blogs/cac-du-an-noi-bat/ap-dung-cac-cong-nghe-va-nguon-luc-tien-tien-nhat">Áp
                                                    dụng các công nghệ và nguồn lực tiên tiến nhất</a>
                                            </li>



                                            <li>
                                                <a
                                                    href="/blogs/cac-du-an-noi-bat/nghien-cuu-ve-tuong-lai-cua-nganh-van-tai-va-xuat-nhap-khau">Nghiên
                                                    cứu về tương lai của ngành vận tải và xuất nhập khẩu</a>
                                            </li>


                                        </ul>
                                    </div>
                                </div> -->
                            </article>
                            <div class="grid__item large--three-twelfths medium--one-whole small--one-whole">
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection