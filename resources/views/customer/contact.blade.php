@extends('layouts.customer')
@section('pageTitle', 'Giới thiệu công ty')
@section('content')
<div>
    <section id="breadcrumb-wrapper5" class="breadcrumb-w-img">
        <div class="breadcrumb-overlay"></div>
        <div class="breadcrumb-content">
            <div class="wrapper">
                <div class="inner text-center">
                    <div class="breadcrumb-big">
                        <h2>
                            Liên hệ
                        </h2>
                    </div>
                    <!-- <div class="breadcrumb-small">
                        <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                        <span aria-hidden="true">/</span>
                        <span>Liên hệ</span>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <div id="PageContainer" class="is-moved-by-drawer">
        <main class="main-content" role="main">
            <div id="page-wrapper">
                <div class="wrapper">
                    <div class="inner">
                        <div class="grid">
                            <div class="grid__item large--one-whole">

                                <div class="page-contact-wrapper">
                                    <div class="page-head">
                                        <h1>Liên hệ</h1>
                                    </div>
                                    <div class="page-body">
                                        <div class="page-body-inner">

                                            <div class="grid">
                                                <div
                                                    class="grid__item large--one-half medium--one-half small--one-whole">
                                                    <div class="contact-wrapper">
                                                        <div class="contact-title">
                                                            <h4>
                                                            Văn phòng đại diện:
                                                            </h4>
                                                        </div>
                                                        <div class="contact-info">
                                                        94 Nguyễn Du, Phường 7, Quận Gò Vấp, TP.Hồ Chí Minh
                                                        </div>
                                                        <div class="contact-title">
                                                            <h4>
                                                            Showroom:
                                                            </h4>
                                                        </div>
                                                        <div class="contact-info">
                                                        63 Lê Đức Thọ, Phường 7, Quận Gò Vấp, TP.Hồ Chí Minh
                                                        </div>
                                                        <div class="contact-map">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7900329111444!2d106.68407131533434!3d10.827374161210619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528fa2354b9e5%3A0x4ae7c43db71eb2d0!2zOTQgxJDGsOG7nW5nIE5ndXnDqsyDbiBEdSwgUGjGsOG7nW5nIDcsIEfDsiBW4bqlcCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1574216990089!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>                                                        </div>
                                                        <div class="contact-title">
                                                            <h4>
                                                                Số điện thoại:
                                                            </h4>
                                                        </div>
                                                        <div class="contact-info">
                                                            <a href="tel:0901772802">0901.77.2802</a>
                                                        </div>
                                                        <div class="contact-title">
                                                            <h4>
                                                                Email:
                                                            </h4>
                                                        </div>
                                                        <div class="contact-info">
                                                            <a href="mailto: cuacuon.anshin@gmail.com"> cuacuon.anshin@gmail.com</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="grid__item large--one-half medium--one-half small--one-whole">
                                                    <div class="form-vertical clearfix">
                                                        @if (\Session::has('success'))
                                                        <div class="alert alert-success">
                                                            {!! \Session::get('success') !!}
                                                        </div>
                                                        @elseif((\Session::has('fail')))
                                                        <div class="alert alert-error">
                                                            {!! \Session::get('fail') !!}
                                                        </div>
                                                        @endif
                                                        <form action="{{ url('lien-he') }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input name="form_type" type="hidden" value="contact">
                                                            <input name="utf8" type="hidden" value="✓">
                                                            <label for="ContactFormName" class="hidden-label">Họ tên của
                                                                bạn</label>
                                                            <input type="text" id="ContactFormName" class="input-full"
                                                                name="name" placeholder="Họ tên của bạn"
                                                                autocapitalize="words" value="" required>

                                                            <label for="ContactFormEmail" class="hidden-label">Địa chỉ
                                                                email của bạn</label>
                                                            <input type="email" id="ContactFormEmail" class="input-full"
                                                                name="email" placeholder="Địa chỉ email của bạn"
                                                                autocorrect="off" autocapitalize="off" value=""
                                                                required>


                                                            <label for="ContactFormPhone" class="hidden-label">Số điện
                                                                thoại của bạn</label>
                                                            <input type="tel" id="ContactFormPhone" class="input-full"
                                                                name="phone" placeholder="Số điện thoại của bạn"
                                                                pattern="[0-9\-]*" value="" required>

                                                            <label for="ContactFormMessage" class="hidden-label">Nội
                                                                dung</label>
                                                            <textarea rows="10" id="ContactFormMessage"
                                                                class="input-full" name="content"
                                                                placeholder="Nội dung"></textarea>

                                                            <input type="submit" class="btn right btnContactSubmit"
                                                                value="Gửi">
                                                        </form>
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



        </main>
    </div>
</div>
@endsection
