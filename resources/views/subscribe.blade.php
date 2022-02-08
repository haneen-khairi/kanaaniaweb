@extends('layouts.default')
@section('content')

    <!-- end Header Area -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/'.Session::get('homeLang')) }}"><i class="fa fa-home b-green"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.subscribe') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- google map start -->
        <!-- <div class="map-area section-padding">
            <div id="google-map"></div>
        </div> -->
        <!-- google map end -->
        <!-- contact area start -->
        <div class="contact-area section-padding pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h5 class="contact-title">{{ Lang::get('main.subscribewithus') }}</h5>
                            <div class="col-lg-12">
                                <div class="contact-info">
                                    <p>
                                        {{ Lang::get('main.subscribe1') }}  </p>
                                </div>
                            </div>
                            <form id="subscribe-form" action="" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="full_name" id="full_name" placeholder="{{ Lang::get('main.name') }}" type="text" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" id="phone" placeholder="{{ Lang::get('main.Phone') }}" type="text" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" id="email_address" placeholder="{{ Lang::get('main.Email') }}" type="text" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="contact-btn">
                                        <button class="btn btn-sqr" id="jq_subscribe" type="button">{{ Lang::get('main.subscribeNow') }}</button>
                                    </div> </div>
                    </div>
                    </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('img/banner/img3-top.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
    </main>


@stop
