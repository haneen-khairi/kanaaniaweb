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
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.privacy') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- privacy policy content start -->
        <section class="policy-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="policy-list">
                            <h2 class="policy-title">{{ Lang::get('main.privacy') }}</h2>
                            <p>
                            {{ Lang::get('main.term1') }} </p>
                        </div>
                        <div class="policy-list">
                            <h2 class="policy-title">More</h2>
                            <p>
                            {{ Lang::get('main.term1') }}   </p>
                        </div>


                        <!-- policy list end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- privacy policy content end -->
    </main>



@stop
