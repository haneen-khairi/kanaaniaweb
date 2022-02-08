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
                                    <li class="breadcrumb-item active" aria-current="page">Founder of Kanaania</li>
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
                            <img src="{{ asset('img/founder.jpg') }}" alt="Mohammad Almanasrah">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-content">
                            <h2 class="about-title">Mohammad Almanasrah Founder</h2>
                            <h5 class="about-sub-title">
                           Founder of Kanaania
                        </h5>
                        <p>
                        {{ Lang::get('main.founder1') }}
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@stop