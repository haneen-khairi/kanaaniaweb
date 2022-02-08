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
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.Cart') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered b-blacks">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">{{ Lang::get('main.Thumbnail') }}</th>
                                            <th class="pro-title">{{ Lang::get('main.Product') }}</th>
                                            <th class="pro-price">{{ Lang::get('main.price') }}</th>
                                            <th class="pro-quantity">{{ Lang::get('main.quantity') }}</th>
                                            <th class="pro-subtotal">{{ Lang::get('main.total') }}</th>
                                            <th class="pro-remove">{{ Lang::get('main.Remove') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $totalP=0;
                                      ?>
                                  @foreach ($products as $product)
                                  <?php
                                      if(!is_numeric($product['total_price'])){
                                          $product['total_price']=1;
                                      }
                                      if(!is_numeric($cart[$product['productid']]['qty'])){
                                          $cart[$product['productid']]['qty']=1;
                                      }

                                  $totalP+=(float)$product['total_price']*(float)$cart[$product['productid']]['qty'];
                                  ?>
                                        <tr class="jq_item" data-id="{{$product['productid']}}">
                                            <td class="pro-thumbnail"><a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">
                                              <img class="img-fluid" src="{{ asset('img/product/product-'.$product['productid'].'.jpg') }}" alt="Product"></a></td>
                                            <td class="pro-title"><a href="products/{{$product['productid']}}/{{$product['title_'.$lang]}}">{{$product['title_'.$lang]}}</a></td>
                                            <td class="pro-price"><span class="jq_price" data="{{$product['total_price']}}">${{$product['total_price']}}</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" class="jq_qty" value="{{$cart[$product['productid']]['qty']}}"></div>
                                            </td>
                                            <td class="pro-subtotal"><span class="jq_totalrow">${{$product['total_price']*$cart[$product['productid']]['qty']}}</span></td>
                                            <td class="pro-remove"><a class="jq_removeitem" data-id='{{$product['productid']}}'><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                  @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between" style="display:none!important;">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required="">
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr b-whites">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>{{ Lang::get('main.CartTotals') }}</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>{{ Lang::get('main.SubTotal') }}</td>
                                                <td class="jq_subtotal">${{$totalP}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ Lang::get('main.Shipping') }}</td>
                                                <td class="jq_shipping" data="{{config('web.shipping')}}">${{config('web.shipping')}}</td>
                                            </tr>
                                            <tr class="total">
                                                <td>{{ Lang::get('main.total') }}</td>
                                                <td class="total-amount jq_grandtotal">${{$totalP+config('web.shipping');}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a id="checkout" class="btn btn-sqr d-block b-whites">{{ Lang::get('main.checkout')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>



@stop
