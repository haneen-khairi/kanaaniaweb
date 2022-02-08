@extends('layouts.default')
@section('content')


<main>
<!-- hero slider area start -->
<section class="slider-area"   dir="ltr" >
    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style" style="color:white" dir="ltr">
        <!-- single slider item start -->
        @foreach($sliders as $slider)
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" dir="ltr" data-bg=" {{ asset('img/slider/'.$slider['slid'].'.jpg')  }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-1" style="color:white">
                                    <h2 class="slide-title">{{ $slider['title_'.$lang] }}<span></span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- hero slider area end -->
<!-- service policy area start -->
<div class=" pproduct-area service-policy  " dir="ltr" >
    <div class="container">
        <div class=" policy-block section-padding">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6> {{ Lang::get('main.shipping') }}</h6>
                            <p> {{ Lang::get('main.shippinga') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>{{ Lang::get('main.support') }}</h6>
                            <p>{{ Lang::get('main.supporta') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>{{ Lang::get('main.moneyreturn') }}</h6>
                            <p>{{ Lang::get('main.moneyreturna') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>{{ Lang::get('main.paymentsecure') }}</h6>
                            <p>{{ Lang::get('main.paymentsecurea') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service policy area end -->
<!-- product area start -->
<section class=" product-area section-padding " dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">{{ Lang::get('main.ourproducts') }}</h2>
                    <p class="sub-title" style="display: none;">{{ Lang::get('main.ourproductsa') }}</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container psps">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        <ul class="nav justify-content-center">
                            <li><a href="#tab2" data-bs-toggle="tab">{{ Lang::get('main.gold1') }}</a></li>
                            <li><a href="#tab3" data-bs-toggle="tab">{{ Lang::get('main.gold2') }}</a></li>
                            <li><a href="#tab4" data-bs-toggle="tab">{{ Lang::get('main.gold3') }}</a></li>
                        </ul>
                    </div>
                    <!-- product tab menu end -->
                    <!-- product tab content start -->
                    <div class="tab-content">
                        <div class="tab-pane fade active" id="tab2">
                            <div class="product-carousel-4 slick-row-10 slick-arrow-style" dir="ltr">
                                <!-- product item start -->
                                @foreach($products18 as $product)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">
                                                <img class="pri-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                                <img class="sec-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                            </a>
                                            <div class="product-badge" style="display:none;">
                                                <div class="product-label new" style="display:none;">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount" style="display:none;">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group b-blackss" style="display:none;">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart jq_addtocart" data-price="{{$product['total_price']}}" data-id="{{$product['productid']}}">{{ Lang::get('main.addToCart') }}</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['ctitle_'.$lang]}}</a></p>
                                            </div>

                                            <h6 class="product-name">
                                                <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['title_'.$lang]}}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">${{$product['total_price']}}</span>
                                                <span class="price-old" style="display:none;"><del>$70.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                @foreach($products21 as $product)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">
                                                <img class="pri-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                                <img class="sec-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                            </a>
                                            <div class="product-badge" style="display:none;">
                                                <div class="product-label new" style="display:none;">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount" style="display:none;">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group b-blackss" style="display:none;">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart jq_addtocart" data-price="{{$product['total_price']}}" data-id="{{$product['productid']}}">{{ Lang::get('main.addToCart') }}</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['ctitle_'.$lang]}}</a></p>
                                            </div>

                                            <h6 class="product-name">
                                                <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['title_'.$lang]}}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">${{$product['total_price']}}</span>
                                                <span class="price-old" style="display:none;"><del>$70.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4">
                            <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                @foreach($products24 as $product)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">
                                                <img class="pri-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                                <img class="sec-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                            </a>
                                            <div class="product-badge" style="display:none;">
                                                <div class="product-label new" style="display:none;">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount" style="display:none;">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group b-blackss" style="display:none;">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart jq_addtocart" data-price="{{$product['total_price']}}" data-id="{{$product['productid']}}">{{ Lang::get('main.addToCart') }}</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['ctitle_'.$lang]}}</a></p>
                                            </div>

                                            <h6 class="product-name">
                                                <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['title_'.$lang]}}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">${{$product['total_price']}}</span>
                                                <span class="price-old" style="display:none;"><del>$70.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product area end -->
<section class="video">
    <div class="videos">
    <div class="container">
   <div class="row">
       <div class="col-12">
   <div class="section-title text-center">
    <h2 class="title">{{ Lang::get('main.Kanaaniavision') }}</h2>

</div>
</div>

<div class="col-lg-10 col-md-6 col-sm-3">
<div class="video-mar" style="text-align: center;margin-bottom: 50px;">
        <video style="width:100%;" src="{{ asset('img/home.mp4') }}" class="vid" controls></video>
    </div>
</div>
<!-- <div class="col-lg-5 col-md-4  col-sm-3">
    <div class="vision text-center" >
    <h2 style=" color:white"> Kanaania Vision's </h1>
    <br><br>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores nesciunt fugit tenetur ab. Voluptates, similique veritatis dolores necessitatibus, provident qui aspernatur quia reprehenderit consequatur laborum, repellat soluta aut aperiam? Omnis?

    </p>
    <br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, beatae eveniet neque consequuntur error ipsum rerum minima fugit dolor quasi dolores pariatur culpa doloremque quos aspernatur asperiores, ab totam fugiat.</p>
</div> -->
</div>
</div>
</div>
</div>
</section>

<!-- banner statistics area start -->
<div class="banner-statistics-area" dir="ltr">
    <div class="container">
        <div class="row row-20 mtn-20">
            @foreach ($homeCategories as $homeCategory)
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20" >
                        <a href="{{URL::to('/'.$lang.'/products?type[]='.$homeCategory['typeid'])}}">
                            <img src="{{ asset('img/categories/'.$homeCategory['hcid'].'.jpg?v='.$cash) }}" alt="product banner">
                        </a>
                        <div class="banner-content text-right pp-banner">
                            <h2 class="banner-text2">{{ $homeCategory['title_'.$lang] }}</span></h2>
                            <!-- <a href="#" class="btn btn-text">Shop Now</a> -->
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- banner statistics area end -->
<!-- featured product area start -->
<section class="feature-product section-padding" dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">{{ Lang::get('main.featuredproducts') }}</h2>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style psps">
                    @foreach($newProducts as $product)
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">
                                    <img class="pri-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                    <img class="sec-img" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="product">
                                </a>
                                <div class="product-badge" style="display:none;">
                                    <div class="product-label new" style="display:none;">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount" style="display:none;">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group b-blackss" style="display:none;">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart jq_addtocart" data-price="{{$product['total_price']}}" data-id="{{$product['productid']}}">{{ Lang::get('main.addToCart') }}</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['ctitle_'.$lang]}}</a></p>
                                </div>

                                <h6 class="product-name">
                                    <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">{{$product['title_'.$lang]}}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">${{$product['total_price']}}</span>
                                    <span class="price-old" style="display:none;"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- featured product area end -->
<!-- testimonial area start -->
<section class="testimonial-area section-padding bg-img" data-bg="" dir="ltr">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">{{ Lang::get('main.testimonials') }}</h2>
                    <p class="sub-title">{{ Lang::get('main.testimonialsa') }}</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-thumb-wrapper">
                    <div class="testimonial-thumb-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-thumb">
                                <img src="{{ asset('img/testimonials/'.$testimonial['tsid'].'.jpg') }}" alt="testimonial-thumb">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="testimonial-content-wrapper">
                    <div class="testimonial-content-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-content">
                                <p class="pspa">{{ $testimonial['tsname_'.$lang] }}</p>
                                <h5 class="testimonial-author">{{ $testimonial['tsdesc_'.$lang] }}</h5>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->
<!-- group product start -->
<section class="group-product-area section-padding" dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="group-product-banner">
                    <figure class="banner-statistics">
                        <a href="{{URL::to('/'.$lang.'/products?type[]=1')}}">
                            <img src="{{ asset('img/banner/img-bottom-banner.jpg') }}" alt="product banner">
                        </a>
                        <div class="banner-content banner-content_style3 text-center">
                            <h6 class="banner-text1">{{ lang::get('main.Special') }}</h6>
                            <h2 class="banner-text2">{{ lang::get('main.Jewelry') }}</h2>
                            <a href="{{URL::to('/'.$lang.'/products?type[]=1')}}" class="btn btn-text">{{ lang::get('main.shopn') }}</a>
                        </div>
                    </figure>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="categories-group-wrapper">
                    <!-- section title start -->
                    <div class="section-title-append pp-2">
                        <h4>{{ Lang::get('main.onsaleproduct') }}</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->
                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">


                            @foreach($rings as $product)
                                <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">
                                                    <img src="{{ asset('img/product/product-17.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name pp-1">
                                                    <a href="{{URL::to($lang.'/products/'.$product['productid'].'/'.$product['title_'.$lang])}}">
                                                        {{$product['title_'.$lang]}}
                                                    </a>
                                                </h5>
                                                <div class="price-box">
                                                    <span class="price-regular">{{$product['total_price']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                        @endforeach


                        </div>
                    </div>
                    <!-- group list carousel start -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- group product end -->
<!-- latest blog area start -->
<section class="latest-blog-area section-padding pt-0" style="display: none;" dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">{{ Lang::get('main.latestblogs') }}</h2>
                    <p class="sub-title">{{ Lang::get('main.latestblogsa') }}</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="#">
                                <img src="{{ asset('img/blog/blog-img1.jpg') }}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Kanaania</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="#">Celebrity Daughter Opens Up About Having Her Eye Color Changed</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->
                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="#">
                                <img src="{{ asset('img/blog/blog-img2.jpg') }}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Kanaania</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="#">Children Left Home Alone For 4 Days In TV series Experiment</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->
                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="#">
                                <img src="{{ asset('img/blog/blog-img3.jpg') }}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Kanaania</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="#">Lotto Winner Offering Up Money To Any Man That Will Date Her</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->
                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="#">
                                <img src="{{ asset('img/blog/blog-img4.jpg') }}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Kanaania</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="#">People are Willing Lie When Comes Money, According to Research</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->
                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="#">
                                <img src="{{ asset('img/blog/blog-img5.jpg') }}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Kanaania</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="#">romantic Love Stories Of Hollywood’s Biggest Celebrities</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest blog area end -->
<!-- brand logo area start -->
<div class="brand-logo section-padding pt-0 " dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">{{ Lang::get('main.ourpartner') }}</h2>
                    <p class="sub-title">{{ Lang::get('main.ourpartnera') }}</p>
                </div>
                <div class="brand-logo-carousel slick-row-10 slick-arrow-style ">
                    @foreach($partners as $partner)
                        <div class="brand-item">
                            <a href="#">
                                <img src="{{ asset('img/partners/'.$partner['prid'].'.jpg') }}" alt="">
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand logo area end -->
</main>

<!-- Scroll to top start -->

@stop
