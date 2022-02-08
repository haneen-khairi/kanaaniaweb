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
                                    <li class="breadcrumb-item"><a href="{{ url('/').'/'.$lang.'/products' }}" class="b-green">{{ Lang::get('main.Products') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$product['title_'.$lang]}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper padding-product">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">

                                        <?php
                                        $path = public_path('img/product/'.$product['productid']);
                                        $thumbs='';
                                        if(File::isDirectory($path)){
                                          $files = File::files(public_path().'/img/product/'.$product['productid']);
                                          foreach ($files as $file) {
                                            ?>
                                              <div class="pro-large-img img-zoom">
                                            <img src="{{ asset('img/product/'.$product['productid'].'/'.basename($file)) }}" alt="product-details" role="presentation" >
                                        </div>
                                            <div class="pro-nav-thumb img-zoom">
                                                  <img src="{{ asset('img/product/'.$product['productid'].'/'.basename($file)) }}"  alt="product-details">
                                              </div>
                                            <?php
                                            $thumbs.='<div class="pro-nav-thumb ">
                                                <img src="'.asset('img/product/'.$product['productid'].'/'.basename($file)) .'"  alt="product-details">
                                            </div>';

                                          }
                                        }
                                        ?>
                                      </div>

                                      <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <?php
                                        echo $thumbs;
                                        ?>
                                      </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name" style="display:none;">
                                            <a href="product-details.html">HasTech</a>
                                        </div>
                                        <h3 class="product-name">{{$product['title_'.$lang]}}</h3>
                                        <div class="ratings d-flex" style="display:none!important;">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>1 Reviews</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price-regular">${{$product['total_price']}}</span>
                                            <span class="price-old" style="display:none;"><del>$90.00</del></span>
                                        </div>
                                        <h5 class="offer-text" style="display:none;"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown"  style="display:none;" data-countdown="2021/12/20"></div>
                                        <div class="availability" style="display:none;">
                                            <i class="fa fa-check-circle"></i>
                                            <span>200 in stock</span>
                                        </div>
                                        <p class="pro-desc">{{$product['description_'.$lang]}}</p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">{{ Lang::get('main.quantity') }}:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" id="jq_quantity" value="1"></div>
                                            </div>

                                        </div>
                                        <div class="pro-size">
                                            <h6 class="option-title">{{ Lang::get('main.size') }} :</h6>
                                            <select class="nice-select" id="jq_size">
                                              @foreach ($sizes as $size)
                                                <option value="{{$size['sizeid']}}">{{ $size['stitle_'.$lang] }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="pro-size">
                                            <h6 class="option-title">{{ Lang::get('main.Kerat') }}</h6>
                                            <label class="ha-nice">
                                                {{ $product['carat'] }}
                                            </label>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2 b-whites jq_addtocart btn1"
                                            onclick="myFunctions()"
                                            data-id="{{ $product['productid'] }}" data-price="{{ $product['total_price'] }}" >{{ Lang::get('main.addToCart') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

      <section class="related-products section-padding" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="section-title text-center">
                            <h2 class="title">{{ Lang::get('main.relatedProducts') }}</h2>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('img/product/product-11.jpg') }}" alt="product">
                                        <img role="presentation" class="sec-img" src="{{ asset('img/product/product-8.jpg') }}" class="zoomImg"  alt="product">
                                        <!-- <img role="presentation" alt="" src="file:///D:/fast%20techno/kanania/assets/img/product/product-details-img1.jpg" class="zoomImg" > -->
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>10%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                    </div>

                                    <h6 class="product-name">
                                        <a href="product-details.html">Perfect Diamond Jewelry</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$60.00</span>
                                        <span class="price-old"><del>$70.00</del></span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('img/product/product-12.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('img/product/product-7.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>sale</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>new</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                    </div>

                                    <h6 class="product-name">
                                        <a href="product-details.html">Handmade Golden Necklace</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$50.00</span>
                                        <span class="price-old"><del>$80.00</del></span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('img/product/product-13.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('img/product/product-6.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                                    </div>

                                    <h6 class="product-name">
                                        <a href="product-details.html">Perfect Diamond Jewelry</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$99.00</span>
                                        <span class="price-old"><del></del></span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('img/product/product-14.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('img/product/product-5.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>sale</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>15%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                                    </div>

                                    <h6 class="product-name">
                                        <a href="product-details.html">Diamond Exclusive Ornament</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$55.00</span>
                                        <span class="price-old"><del>$75.00</del></span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('img/product/product-15.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('img/product/product-4.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                    </div>

                                    <h6 class="product-name">
                                        <a href="product-details.html">Citygold Exclusive Ring</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$60.00</span>
                                        <span class="price-old"><del>$70.00</del></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>



@stop
