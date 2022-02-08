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
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home b-green"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.contact') }}</li>
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
                            <h5 class="contact-title">{{ Lang::get('main.contact') }}</h5>
                            <form id="contact-form" action="" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="full_name" id="full_name" placeholder="{{ Lang::get('main.namec') }}" type="text" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" id="phone" placeholder="{{ Lang::get('main.phonec') }}" type="text" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="emial" id="email" placeholder="{{ Lang::get('main.emailc') }}" type="text" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="{{ Lang::get('main.subjectc') }}" type="text">
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center" >
                                            <textarea id="message" placeholder="{{ Lang::get('main.messagec') }}" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn-sqr" id="jq_contactus" type="button">{{ Lang::get('main.contact2') }}</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h5 class="contact-title">{{ Lang::get('main.contact') }}</h5>
                            <p>
                            {{ Lang::get('main.contact1') }}  </p>
                            <ul>
                                <li><i class="fa fa-fax"></i>{{ Lang::get('main.addre') }} {{ Lang::get('main.addc') }}</li>
                                <li><i class="fa fa-envelope-o"></i> {{ Lang::get('main.mailcc') }} kanaania.jewelry@outlook.com</li>
                                <li><i class="fa fa-phone "></i> {{ Lang::get('main.numf') }}</li>
                            </ul>
                            <div class="working-time">
                                <h6>{{ Lang::get('main.Workingh') }}</h6>
                                <p><span>{{ Lang::get('main.Everyd') }}:</span>11:00 AM - 9:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
    </main>


@stop
