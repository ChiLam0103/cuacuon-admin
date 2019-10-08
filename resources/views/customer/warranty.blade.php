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
                            Bảo hành
                        </h2>
                    </div>
                    <div class="breadcrumb-small">
                        <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                        <span aria-hidden="true">/</span>
                        <span>Chính sách bảo hành</span>
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
                            @foreach($warranty as $k)
                            <article class="float-right grid__item large--nine-twelfths medium--one-whole small--one-whole content" itemscope="" itemtype="http://schema.org/Article" id="content_{{$k->id}}" style="display:none">
                                <div class="article-content">
                                    <div class="article-head">
                                        <h1>{{$k->name}}</h1>
                                        <div class="grid mg-left-15">
                                            <div class="grid__item large--one-half medium--one-half small--one-half pd-left15">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-body">
                                        {!!$k->content!!}
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            <div class="grid__item large--three-twelfths medium--one-whole small--one-whole">
                                <div class="blog-sidebar">
                                    <div class="list-categories">
                                        <div class="blog-sb-title clearfix">
                                            <h3>
                                                Bảo hành
                                            </h3>
                                        </div>
                                        <ul class="no-bullets">
                                            @foreach($warranty as $k)
                                            <li @if($k->id==1) class="active" @endif id="warranty_{{$k->id}}">
                                                <svg class="svg-inline--fa fa-caret-right fa-w-6" aria-hidden="true" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                                    <path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                                                    </path>
                                                </svg><!-- <i class="fas fa-caret-right"></i> -->
                                                <a href="#">{{$k->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
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

<script>
    $(document).ready(function() {
        $("#content_1").css('display','block');
        $('ul.no-bullets li').click(function(e) {
            $('.no-bullets li').removeClass('active');
            $(this).addClass('active');
            $('.grid .content').hide();
            var id = $(this).attr('id').split("_").pop();
            // console.log($(".grid #content_2").show());

            $(".grid #content_" + id).show();
        });
    });
</script>
@endsection