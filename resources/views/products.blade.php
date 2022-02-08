@extends('layouts.default')
@section('content')


<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap ">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home b-green"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.Products') }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding section-paddings">
        <div class="container">
            <div class="row">

                <!-- sidebar area start -->
                <div class="col-lg-3 order-1 order-lg-1">
                    <div class="div-filter">
                        <button type="button"  onclick="myFunctiones()" class="btn btn-show-filter">{{ Lang::get('main.Filtero') }}</button>
                    </div>
                    <aside class="sidebar-wrapper" id="show-section">
                        <input type="hidden" value="1" id="jq_quantity">
                        <input type="hidden" value="1" id="jq_size">

                        <form method="get">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">{{ Lang::get('main.categories') }}</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories b-blackss">
                                        @foreach ($categories as $category)
                                        <li>
                                            <div class="custom-control jq_category custom-checkbox">
                                                <input type="checkbox" <?php if (null !== Request::input('category') && in_array($category['categoryid'], Request::input('category'))) {
                                                                            echo 'checked';
                                                                        } ?> name="category[]" value="{{$category['categoryid']}}" class="custom-control-input" id="category{{$category['categoryid']}}" data-id="{{$category['categoryid']}}">
                                                <label class="custom-control-label" for="category{{$category['categoryid']}}">{{$category['ctitle_'.$lang]}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                            <!-- single sidebar start -->
                            <div class="sidebar-single ">
                                <h5 class="sidebar-title">{{ Lang::get('main.price') }}</h5>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="1" data-max="5000"></div>
                                        <div class="range-slider">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="price-input">
                                                    <label for="amount">{{ Lang::get('main.price') }}: </label>
                                                    <input type="text" id="amount" name="amount">
                                                </div>
                                                <button type="submit" class="filter-btn">{{ Lang::get('main.Filter') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">{{ Lang::get('main.Types') }}</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        @foreach ($types as $type)
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" <?php if (null !== Request::input('type') && in_array($type['typeid'], Request::input('type'))) {
                                                                            echo 'checked';
                                                                        } ?> name="type[]" value="{{$type['typeid']}}" class="custom-control-input" id="type{{$type['typeid']}}" data-id="{{$type['typeid']}}">
                                                <label class="custom-control-label" for="type{{$type['typeid']}}">{{$type['ttitle_'.$lang]}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">{{ Lang::get('main.Sizes') }}</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        @foreach ($sizes as $size)

                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" <?php if (null !== Request::input('size') && in_array($size['sizeid'], Request::input('size'))) {
                                                                            echo 'checked';
                                                                        } ?> name="size[]" value="{{$size['sizeid']}}" class="custom-control-input" id="size{{$size['sizeid']}}" data-id="{{ $size['sizeid'] }}">
                                                <label class="custom-control-label" for="size{{$size['sizeid']}}">{{ $size['stitle_'.$lang] }}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </form>
                        <!-- single sidebar start -->
                        <div class="sidebar-banner">
                            <div class="img-container">
                                <a href="#">
                                    <img src="{{ asset('img/banner/sidebar-banner.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-2 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                    <div class="top-bar-left">
                                        <div class="product-view-mode b-blackss">
                                            <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                            <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                        </div>
                                        <div class="product-amount">
                                            <p>{{ Lang::get('main.Showing') }} {{$products->firstItem()}}–{{$products->lastItem()}} {{ Lang::get('main.Of') }} {{$products->total()}} {{ Lang::get('main.Results') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 order-1 order-md-2" style="display:none;">
                                    <div class="top-bar-right">
                                        <div class="product-short">
                                            <p>Sort By : </p>
                                            <select class="nice-select" name="sortby">
                                                <option value="trending">Relevance</option>
                                                <option value="sales">Name (A - Z)</option>
                                                <option value="sales">Name (Z - A)</option>
                                                <option value="rating">Price (Low &gt; High)</option>
                                                <option value="date">Rating (Lowest)</option>
                                                <option value="price-asc">Model (A - Z)</option>
                                                <option value="price-asc">Model (Z - A)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item list wrapper start -->
                        <div class="shop-product-wrap grid-view row mbn-30">

                            @foreach ($products as $product)



                            <!-- product single item start -->
                            <div class="col-md-4 col-sm-6">
                                <!-- product grid start -->
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">
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
                                            <p class="manufacturer-name"><a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">{{$product['ctitle_'.$lang]}}</a></p>
                                        </div>

                                        <h6 class="product-name">
                                            <a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">{{$product['title_'.$lang]}}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">${{$product['total_price']}}</span>
                                            <span class="price-old" style="display:none;"><del>$70.00</del></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- product grid end -->

                                <!-- product list item end -->
                                <div class="product-list-item">
                                    <figure class="product-thumb">
                                        <a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">
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
                                    <div class="product-content-list">
                                        <div class="manufacturer-name">
                                            <a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">{{$product['ctitle_'.$lang]}}</a>
                                        </div>


                                        <h5 class="product-name"><a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">{{$product['title_'.$lang]}}</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">{{$product['total_price']}}</span>
                                            <span class="price-old" style="display:none;"><del>$29.99</del></span>
                                        </div>
                                        <p>{{$product['description_'.$lang]}}</p>
                                    </div>
                                </div>
                                <!-- product list item end -->
                            </div>
                            <!-- product single item start -->
                            @endforeach

                        </div>
                        <!-- product item list wrapper end -->
                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center b-blackssa">
                            {{$products->links()}}
                            <!-- <ul class="pagination-box bb-b">
                                    <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                </ul> -->
                        </div>
                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
</main>


@stop