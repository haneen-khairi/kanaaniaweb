<!doctype html>
<html class="no-js" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="Description" CONTENT="Author: Kanaania, Illustrator: Gold, Category:Dold price, Gold ,Money ,Diamonds">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34="/>
    <meta name="robots" content="noindex,nofollow">
    <title>{{ Lang::get('main.KanaaniaJewelry') }}</title>
    <!--<meta name="robots" content="noindex, follow">-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/kanaania-logo (1).png') }}">
    <!-- CSS
    ============================================ -->
    <!-- google fonts -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans&display=swap" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet"> -->
    <!-- <link href="../../css.css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendor/pe-icon-7-stroke.css') }}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendor/font-awesome.min.css') }}">

    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/slick.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/nice-select.css') }}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/jqueryui.min.css') }}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{ asset('css/'.$lang.'.css') }}">
    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- loader link css -->
    <link rel="stylesheet" href="{{ asset('css/preload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btnload.css') }}">

    <link type="text/css" href="{{ asset('/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/assets/js/sweetalert2.all.min.js') }}"></script>
<style>
    /* *{direction: rtl;} */
    .loader {
    background: #000;
    background: radial-gradient(#22222214, #0009);
    bottom: 0;
    left: 0;
    overflow: hidden;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 99999;
}

.loader-inner {
    bottom: 0;
    height: 60px;
    left: 0;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 100px;
}

.loader-line-wrap {
    animation:
		spin 2000ms cubic-bezier(.175, .885, .32, 1.275) infinite
	;
    box-sizing: border-box;
    height: 50px;
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 0;
    transform-origin: 50% 100%;
    width: 100px;
}
.loader-line {
    border: 4px solid transparent;
    border-radius: 100%;
    box-sizing: border-box;
    height: 100px;
    left: 0;
    margin: 0 auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 100px;
}
.loader-line-wrap:nth-child(1) { animation-delay: -50ms; }
.loader-line-wrap:nth-child(2) { animation-delay: -100ms; }
.loader-line-wrap:nth-child(3) { animation-delay: -150ms; }
.loader-line-wrap:nth-child(4) { animation-delay: -200ms; }
.loader-line-wrap:nth-child(5) { animation-delay: -250ms; }

.loader-line-wrap:nth-child(1) .loader-line {
    border-color: hsl(0, 80%, 60%);
    height: 90px;
    width: 90px;
    top: 7px;
}
.loader-line-wrap:nth-child(2) .loader-line {
    border-color: hsl(60, 80%, 60%);
    height: 76px;
    width: 76px;
    top: 14px;
}
.loader-line-wrap:nth-child(3) .loader-line {
    border-color: hsl(120, 80%, 60%);
    height: 62px;
    width: 62px;
    top: 21px;
}
.loader-line-wrap:nth-child(4) .loader-line {
    border-color: hsl(180, 80%, 60%);
    height: 48px;
    width: 48px;
    top: 28px;
}
.loader-line-wrap:nth-child(5) .loader-line {
    border-color: hsl(240, 80%, 60%);
    height: 34px;
    width: 34px;
    top: 35px;
}

@keyframes spin {
    0%, 15% {
		transform: rotate(0);
	}
	100% {
		transform: rotate(360deg);
	}
}
</style>
    <!-- Start Header Area -->
<body>
@if(request()->route()->getName() == 'home')
    <div class="loader-bg">
        <div class="loader">
<img src="{{ asset('img/kana.gif') }}" class="des-loader" >
<img src="{{ asset('img/mload.gif') }}" class="mobile-loader" alt="">
        </div>
    </div>

@endif
<div class="loader" id="myDivs" style="display:none">
	<div class="loader-inner">
	<img src="{{ asset('img/success1.gif') }}" alt="">
	</div>
</div>
    <header class="header-area  bg-gray">

        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top bdr-bottom">
                <div class="container">
                    <div class="row align-items-center pd-pd2">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <div id="div-gold" >
                                    <p id="par" >
                                        Gold Prices for Today
                                        <img src="{{  asset('img/graph.png')  }}" />      gold-24 [48.4 - 45.6]     <img src="{{  asset('img/graph.png')  }}" />    gold-21[38.4 - 35.6]    <img src="{{  asset('img/graph.png')  }}" />      gold-18[28.4 - 25.6]  <img src="{{  asset('img/graph.png')  }}" width="15" height="10"/>
                                    </p>
                                </div>
                           </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-end">
                                    <li class="curreny-wrap" style="display:none;">
                                        $ Currency
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list ">
                                            <li><a href="#">$ USD</a></li>
                                            <li><a href="#">$ JOD</a></li>
                                        </ul>
                                    </li>
                                    <li class="language">
                                        {{$homeLang=''}}
                                        {{Session::put('homeLang','')}}
                                        @if(request()->route()->getName() == 'home')

                                            @if(strpos(Request::fullUrl(),'/ar')===false)

                                                <img src="{{  asset('img/icon/en.png')  }}" alt="flag"> English
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="dropdown-list">
                                                    <li><a href="{{  url('/ar')  }}"><img src="{{  asset('img/icon/ar.png')  }}" width="20" height="11" alt="flag"> عربي</a></li>
                                                </ul>
                                            @else
                                                {{$homeLang='ar'}}
                                                {{Session::put('homeLang','ar')}}

                                                <img src="{{  asset('img/flagjo.ico')  }}" width="20" height="20" alt="flag"> عربي
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="dropdown-list">
                                                    <li><a href="{{  url('/')  }}"><img src="{{  asset('img/icon/en.png')  }}" width="20" height="11" alt="flag">English</a></li>
                                                </ul>
                                            @endif
                                        @else
                                            @if(strpos(Request::fullUrl(),'/ar')===false)
                                                <img src="{{  asset('img/icon/en.png')  }}" alt="flag"> English
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="dropdown-list">
                                                    <li><a href="{{str_replace('/en','/ar',Request::fullUrl())}}"><img src="{{  asset('img/icon/ar.png')  }}" width="20" height="11" alt="flag"> عربي</a></li>
                                                </ul>
                                            @else
                                                {{$homeLang='ar'}}
                                                <img src="{{  asset('img/flagjo.ico')  }}" width="20" height="20" alt="flag"> عربي
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="dropdown-list">
                                                    <li><a href="{{str_replace('/ar','/en',Request::fullUrl())}}"><img src="{{  asset('img/icon/en.png')  }}" width="20" height="11" alt="flag">English</a></li>
                                                </ul>
                                            @endif
                                        @endif


                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center  pd-pd">
                          <div class="col-lg-3">
                            <div class="logo">
                                <a href="{{ url('/'.$homeLang) }}">
                                    <img src="{{ asset('img/kanaania-logo.png') }}" alt="brand logo" width="150" height="150">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="active"><a href="{{ url('/'.$homeLang) }}">{{ Lang::get('main.home') }} </i></a> </li>
                                            <li class="position-static"><a href="{{ url('/'.$lang.'/products') }}">{{ Lang::get('main.Products') }}</a></li>
                                            <li style="display:none;"><a href="{{ url('/blog') }}">Blog</a></li>
                                            <li><a href="{{ url('/'.$lang.'/about-us') }}">{{ Lang::get('main.about') }}</a></li>
                                            <li><a href="{{ url('/'.$lang.'/contact-us') }}">{{ Lang::get('main.contact') }}</a></li>
                                            <li><a href="{{ url('/'.$lang.'/subscribe') }}">{{ Lang::get('main.subscribe') }}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container" style="display:none;">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">
                                        <input type="text" placeholder="Search entire store hire" class="header-search-field bg-white">
                                        <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">

                                        <li><a href="{{ url('/'.$lang.'/cart') }}" class="minicart-btn" class="pp-white">
                                                <i class="pe-7s-shopbag"></i>
                                                <?php
                                                if(session()->has('cart')){
                                                  $cart_count=count(session()->get('cart'));
                                                }else{
                                                  $cart_count=0;
                                                }

                                                ?>
                                                <div class="notification">{{$cart_count}}</div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
<!-- mobile header start -->
<div class="mobile-header d-lg-none d-md-block sticky">
    <!--mobile header top start -->
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="mobile-main-header">
            <div id="div-gold">
                <p id="par">
                    Gold Prices for Today
                    <img src="{{ asset('img/graph.png') }}" />      gold-24 [48.4 - 45.6]     <img src="{{ asset('img/graph.png') }}" />    gold-21[38.4 - 35.6]    <img src="{{ asset('img/graph.png') }}" />      gold-18[28.4 - 25.6]  <img src="{{ asset('img/graph.png') }}" width="15" height="10"/>
                </p>
            </div>
            </div>
        </div>
            <div class="col-12 m-head">
                <div class="mobile-main-header">

                    <div class="mobile-logo">
                        <a href="{{ url('/'.$homeLang) }}">
                            <img src="{{ asset('img/klogo.png') }}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="mobile-menu-toggler">
                        <div class="mini-cart-wrap">
                            <a href="{{  url('/'.$lang.'/cart')  }}">
                                <i class="pe-7s-shopbag"></i>
                                <div class="notification">{{$cart_count}}</div>
                            </a>
                        </div>
                        <button class="mobile-menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile header top start -->
</div>
<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="pe-7s-close"></i>
        </div>

        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box-offcanvas">
                <!-- <form>
                    <input type="text" placeholder="Search Here...">
                    <button class="search-btn"><i class="pe-7s-search"></i></button>
                </form> -->
            </div>
            <!-- search box end -->
            <!-- mobile menu start -->
            <div class="mobile-navigation">

                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children bhaneen"><a href="{{ url('/'.$homeLang) }}">{{ Lang::get('main.home') }}</a></li>
                        <li class="menu-item-has-children bhaneen"><a href="{{ url('/'.$lang.'/products') }}">{{ Lang::get('main.Products') }}</a></li>
                        <li class="bhaneen"><a href="{{ url('/'.$lang.'/about-us') }}">{{ Lang::get('main.about') }}</a></li>
                        <li class="bhaneen"><a href="{{ url('/'.$lang.'/contact-us') }}">{{ Lang::get('main.contact') }}</a></li>
                        <li class="bhaneen"><a href="{{str_replace('/ar','/en',Request::fullUrl())}}"><img src="{{  asset('img/icon/en.png')  }}" width="20" height="11" alt="flag">English</a></li>
                        <!-- <li class="bhaneen"><a href="https://www.facebook.com/Kanaania.Jewelry/" target="_blank"><i class="fa fa-facebook" ></i></a><li>
                        <li class="bhaneen"> <a href="https://twitter.com/kanaaniajewell" target="_blank"><i class="fa fa-twitter" ></i></a><li>
                        <li class="bhaneen"> <a href="https://www.instagram.com/kanaania_jewelry/" target="_blank"><i class="fa fa-instagram" ></i></a><li>
                        <li class="bhaneen"> <a href="https://www.youtube.com/channel/UC6xF0zs3_Jel3r1lOPKavuQ" target="_blank"><i class="fa fa-youtube"></i></a><li>
                         -->


                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->

            <div class="mobile-settings">
                <ul class="nav">
                    <li>
                        <div class="dropdown mobile-top-dropdown">
                            <!-- <a href="#" class="dropdown-toggle" id="currency" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Currency
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="currency">
                                <a class="dropdown-item" href="{{ url('/') }}">$ USD</a>
                                <a class="dropdown-item" href="{{ url('/') }}">$ EURO</a>
                            </div> -->
                        </div>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>

            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <ul>
                        <li class="bhaneen">
                            <i class="fa fa-mobile"></i>
                            <a class="bhaneen" href="#">07 9089 8933</a>
                        </li>
                        <li class="bhaneen">
                            <i class="fa fa-envelope-o"></i>
                            <a class="bhaneen" href="#">kanaania.jewelry@outlook.com</a>
                        </li>
                    </ul>
                </div>
                <div class="off-canvas-social-widget">
                              <a href="https://www.facebook.com/Kanaania.Jewelry/" target="_blank"><i class="fa fa-facebook" ></i></a>
                              <a href="https://twitter.com/kanaaniajewell" target="_blank"><i class="fa fa-twitter" ></i></a>
                              <a href="https://www.instagram.com/kanaania_jewelry/" target="_blank"><i class="fa fa-instagram" ></i></a>
                              <a href="https://www.youtube.com/channel/UC6xF0zs3_Jel3r1lOPKavuQ" target="_blank"><i class="fa fa-youtube"></i></a>

                </div>
            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>
<!-- off-canvas menu end -->
<!-- offcanvas mobile menu end -->
</header>
<!-- end Header Area -->
