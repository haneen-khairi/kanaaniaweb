@extends('layouts.default')
@section('content')
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
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.about') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- about us area start -->
        <section class="about-us section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="about-thumb">
                            <img src="{{ asset('img/a12.jpg') }}" alt="about thumb">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-content">
                            <h2 class="about-title">{{ Lang::get('main.about') }}</h2>
                            <h5 class="about-sub-title">
                            {{ Lang::get('main.abouttext') }}
                        </h5>
                        <p>
                        {{ Lang::get('main.abouttext') }}
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us area end -->

        <!-- choosing area start -->
        <div class="choosing-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{ Lang::get('main.about2') }}</h2>
                            <p> {{ Lang::get('main.about3') }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mbn-30">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-choose-item text-center mb-30 b-green">
                            <i class="fa fa-globe"></i>
                            <h4> {{ Lang::get('main.about4') }}</h4>
                            <p> {{ Lang::get('main.about3') }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-choose-item text-center mb-30 b-green">
                            <i class="fa fa-plane"></i>
                            <h4>{{ Lang::get('main.about5') }}</h4>
                            <p>{{ Lang::get('main.about3') }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-choose-item text-center mb-30 b-green">
                            <i class="fa fa-comments"></i>
                            <h4> {{ Lang::get('main.about6') }}</h4>
                            <p> {{ Lang::get('main.about3') }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      



    </main>

  




@stop
