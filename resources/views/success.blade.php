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
                                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/'.$lang."/cart") }}">{{ Lang::get('main.Cart') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.Success') }}</li>
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

                    <div class="col-lg-12">
                        <div class="about-content text-center">
                            <h2 class="about-title">{{ Lang::get('main.ordersuccess') }}</h2>
                            <a href="{{ url('/') }}" class="btn btn-success btn-k" >Back to Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us area end -->





    </main>



@stop
