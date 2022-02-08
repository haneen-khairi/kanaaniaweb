SITE_URL= window.location.origin+'/';
Language='en';
function getLang(){
    var str =String(window.location);

    var lang = str.search("/en/");
    if(lang > 0 && lang < 40 ){
        Language ="en";
    }else{
        Language= "ar";
    }
}
getLang();
function showPreloader(){
    var x = document.getElementById("myDivs");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function hidePreloader(){

        $('.loader').fadeToggle();

}
function showError(msg,type){
    Swal.fire({
        icon: type,
        title: 'Oops...',
        text: msg,
        footer: ''
    })
}
function validationEmail(email) {

    if(email==undefined || email=='' ){
        console.log("email is null");
        return  true;
    }
    var expression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var regex = new RegExp(expression);
    if (email.match(regex)) {
        console.log("email is false");
        return true;
    }else{
        return false;
    }

}

function getBillingData(){
	data={};
    if(($("#f_name").val()).trim()==''){
        showError('first name cannot be empty','warning');
        return  false;
    }
    if(($("#l_name").val()).trim()==''){
        showError('last name cannot be empty','warning');
        return  false;
    }
    if(!validationEmail($("#email").val())){
        showError('invalid email address','warning');
        return  false;
    }

    if(($("#street-address").val()).trim()==''){
        showError('Address can not be empty','warning');
        return  false;
    }
    if(($("#town").val()).trim()==''){
        showError('City can not be empty','warning');
        return  false;
    }

	data['f_name']=$("#f_name").val();
	data['l_name']=$("#l_name").val();
	data['email']=$("#email").val();
	data['country']=$(".option.selected").attr('data-value');
	data['address']=$("#street-address").val();
	data['city']=$("#town").val();
	data['phone']=$("#phone").val();
	data['ordernote']=$("#ordernote").val();
	data['_token']=$('meta[name="csrf-token"]').attr('content');
	return data;
}
function calcCart(){
  totalPrice=0;
	$(".jq_item").each(function(){
		rowPrice=$(this).find('.jq_qty').val()*parseInt($(this).find('.jq_price').attr('data'));
		console.log('rowPrice',rowPrice);
		$(this).find('.jq_totalrow').html('$'+rowPrice.toString());
		totalPrice+=rowPrice;
	});
	setTimeout(function(){
		$('.jq_subtotal').html('$'+totalPrice.toString());
		totalPrice+=parseInt($(".jq_shipping").attr('data'));
		$('.jq_grandtotal').html('$'+totalPrice.toString());
	},100);

}

$(document).ready(function(){
	$.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
	$(".qtybtn").on("click", function() {
		setTimeout(function(){
 		 calcCart();
 	 },50);
})
	$(".jq_qty").on('input',function(){
		setTimeout(function(){
			calcCart();
		},50);
	});
	$('.jq_addtocart').on('click',function(){
		console.log('start');
				showPreloader();
        productid=$(this).attr('data-id');
				price=$(this).attr('data-price');

        $.ajax({
            url: SITE_URL+Language+"/cart/addtocart?id="+productid+'&price='+price+'&qty='+$("#jq_quantity").val()+'&size='+$("#jq_size").val(),
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            datatype:"json",
            success: function (jsonData) {
							hidePreloader();
							console.log('jsonData',jsonData);
							result=$.parseJSON(jsonData)
              $(".notification").html(result.cart_count);
							calcCart();
            }
        });
		});

		$('#checkout').on('click',function(){
				items={};
				$(".jq_item").each(function(){
					items[$(this).attr('data-id')]=$(this).find('.jq_qty').val();
				});
					showPreloader();
	        $.ajax({
	            url: SITE_URL+Language+"/cart/updatecart?items="+JSON.stringify(items),
	            type: 'GET',
	            cache: false,
	            processData: false,
	            contentType: false,
	            datatype:"json",
	            success: function (jsonData) {
								console.log(jsonData);
								window.location.href=SITE_URL+Language+"/cart/checkout"
	            }
	        });
			});

			$('#checkout_submit').on('click',function(){
				 	showPreloader();
					data=getBillingData();
                    if(data==false){
                        return false;
                    }
					if($("#cashon").is(':checked')){
						data['payment_method']='cash';
					}else{
						data['payment_method']='Visa';
					}
						$.ajax({
								url: SITE_URL+Language+"/cart/pay",
								type: 'POST',
								data:data,
								cache: false,
								datatype:"json",
								success: function (jsonData) {
								console.log(jsonData);
								result=$.parseJSON(jsonData);
								if(result['result']==1){
										window.location.href=SITE_URL+Language+"/cart/success"
								}else{//error

								}
								}
						});
				});

            $('#jq_subscribe').on('click',function(){
				 	showPreloader();
                     if($("#full_name").val()=='' && $("#phone").val()=='' && $("#email_address").val()==''){
                         showError('please enter your information','warning');
                         return false;
                     }
					data={
                        name:$("#full_name").val(),
                        phone:$("#phone").val(),
                        email:$("#email_address").val()
                    };
						$.ajax({
								url: SITE_URL+Language+"/subscribe/save",
								type: 'POST',
								data:data,
								cache: false,
								datatype:"json",
								success: function (jsonData) {
                                    hidePreloader();
								console.log(jsonData);
								result=$.parseJSON(jsonData);
								if(result['result']==1){
									$("#subscribe-form")[0].reset();
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'You have been successfully subscribed',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
								}else{//error

								}
							}
						});
				});


            $('#jq_contactus').on('click',function(){
				 	showPreloader();
                     if($("#full_name").val()=='' || $("#phone").val()=='' || $("#email").val()=='' || $("#message").val()==''){
                         showError('please fill all information','warning');
                         return false;
                     }
                data=$("#contact-form").serialize();
						$.ajax({
								url: SITE_URL+Language+"/contact/send",
								type: 'POST',
								data:data,
								cache: false,
								datatype:"json",
								success: function (jsonData) {
                                    hidePreloader();
								console.log(jsonData);
								result=$.parseJSON(jsonData);
								if(result['result']==1){
									$("#contact-form")[0].reset();
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'thank you, we will review your note as soon as possible',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
								}else{//error

								}
							}
						});
				});

		$('.jq_removeitem').on('click',function(){
			console.log('start');
					showPreloader();
					productid=$(this).attr('data-id');
					a=$(this);
					$.ajax({
							url: SITE_URL+Language+"/cart/removeitem?id="+productid,
							type: 'GET',
							cache: false,
							processData: false,
							contentType: false,
							datatype:"json",
							success: function (jsonData) {
								hidePreloader();
								a.closest('tr').remove();
								result=$.parseJSON(jsonData)
	              $(".notification").html(result.cart_count);
                                calcCart();
							}
					});
			});
});
(function ($) {
	"use strict";

	// Sticky menu
	var $window = $(window);
	$window.on('scroll', function () {
		var scroll = $window.scrollTop();
		if (scroll < 300) {
			$(".sticky").removeClass("is-sticky");
		} else {
			$(".sticky").addClass("is-sticky");
		}
	});


	// tooltip active js
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})


	// Background Image JS start
	var bgSelector = $(".bg-img");
	bgSelector.each(function (index, elem) {
		var element = $(elem),
			bgSource = element.data('bg');
		element.css('background-image', 'url(' + bgSource + ')');
	});


	// Off Canvas Open close
	$(".mobile-menu-btn").on('click', function () {
		$("body").addClass('fix');
		$(".off-canvas-wrapper").addClass('open');
	});

	$(".btn-close-off-canvas,.off-canvas-overlay").on('click', function () {
		$("body").removeClass('fix');
		$(".off-canvas-wrapper").removeClass('open');
	});

	// offcanvas mobile menu
    var $offCanvasNav = $('.mobile-menu'),
        $offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i></i></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length){
                $this.parent('li').removeClass('active');
                $this.siblings('ul').slideUp();
            } else {
                $this.parent('li').addClass('active');
                $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                $this.closest('li').siblings('li').find('ul:visible').slideUp();
                $this.siblings('ul').slideDown();
            }
        }
	});


	// hero slider active js
	$('.hero-slider-active').slick({
		fade: true,
		speed: 1000,
		dots: false,
		autoplay: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				arrows: false,
				dots: true
			}
		}]
	});

	// Hero main slider active js
    $('.hero-slider-active-4').slick({
		autoplay: true,
		speed: 1000,
        arrows: false,
        slidesToShow: 4,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
					slidesToShow: 1,
					dots: true
                }
            }
        ]
    });


	// product carousel active js
	$('.product-carousel-4').slick({
		speed: 1000,
		autoplay: true,
		slidesToShow: 4,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				arrows: false
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				arrows: false
			}
		}]
	});


	// product carousel active
	$('.product-carousel-4_2').slick({
		speed: 1000,
		slidesToShow: 4,
		autoplay: true,
		rows: 2,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				arrows: false,
				rows: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				arrows: false,
				rows: 1
			}
		}]
	});


	// product banner active js
	$('.product-banner-carousel').slick({
		autoplay: true,
		speed: 1000,
		arrows: false,
		slidesToShow: 4,
		adaptiveHeight: true,
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 3
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1
			}
		}]
	});


	// group product carousel active
	$('.group-list-carousel').each(function () {
		var $this = $(this);
		var $arrowContainer = $(this).parent().siblings('.section-title-append').find('.slick-append');
		$this.slick({
			infinite: true,
			rows: 4,
			prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
			appendArrows: $arrowContainer,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				}
			}]
		});
	});


	// blog carousel active start
	$('.group-list-carousel--3').slick({
		autoplay: true,
		speed: 1000,
		rows: 3,
		slidesToShow: 3,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}]
	});

	// blog carousel active start
	$('.blog-carousel-2').slick({
		speed: 1000,
		dots: true,
		arrows: false,
		autoplay: true,
	});


	// testimonial cariusel active js
	$('.testimonial-content-carousel').slick({
        arrows: false,
        asNavFor: '.testimonial-thumb-carousel'
    });


    // product details slider nav active
    $('.testimonial-thumb-carousel').slick({
        slidesToShow: 3,
        asNavFor: '.testimonial-content-carousel',
		centerMode: true,
		arrows: false,
        centerPadding: 0,
		focusOnSelect: true
	});


	// blog carousel active
	$('.blog-carousel-active').slick({
		autoplay: true,
		speed: 1000,
		slidesToShow: 3,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}]
	});


	//  Hot deals carousel active start
	$('.deals-carousel-active').slick({
		autoplay: true,
		speed: 1000,
		slidesToShow: 3,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 2
			}
		},
		{
			breakpoint: 576,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}]
	});

	//  Hot deals carousel active start
	$('.deals-carousel-active--two').slick({
		autoplay: true,
		speed: 1000,
		slidesToShow: 4,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 2
			}
		},
		{
			breakpoint: 576,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}]
	});


	// brand logo carousel active js
	$('.brand-logo-carousel').slick({
		speed: 1000,
		slidesToShow: 5,
		adaptiveHeight: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="pe-7s-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="pe-7s-angle-right"></i></button>',
		responsive: [{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				arrows: false
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				arrows: false
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				arrows: false
			}
		}]
	});

	// product details slider active
    $('.product-large-slider').slick({
        fade: true,
		arrows: false,
		speed: 1000,
        asNavFor: '.pro-nav'
    });


    // product details slider nav active
    $('.pro-nav').slick({
        slidesToShow: 4,
        asNavFor: '.product-large-slider',
		centerMode: true,
		speed: 1000,
        centerPadding: 0,
		focusOnSelect: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="lnr lnr-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="lnr lnr-chevron-right"></i></button>',
		responsive: [{
			breakpoint: 576,
			settings: {
				slidesToShow: 3,
			}
		}]
	});


	//nice select active start
	$('select').niceSelect();


	// Image zoom effect
	$('.img-zoom').zoom();


	// offcanvas minicart button js
	$(".minicart-btn").on('click', function(){
		$("body").addClass('fix');
		$(".minicart-inner").addClass('show')
	})

	$(".offcanvas-close, .minicart-close,.offcanvas-overlay").on('click', function(){
		$("body").removeClass('fix');
		$(".minicart-inner").removeClass('show')
	})


	// Data countdown active js
	$('[data-countdown]').each(function () {
		var $this = $(this),
			finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function (event) {
			$this.html(event.strftime('<div class="single-countdown"><span class="single-countdown__time">%D</span><span class="single-countdown__text">Days</span></div><div class="single-countdown"><span class="single-countdown__time">%H</span><span class="single-countdown__text">Hours</span></div><div class="single-countdown"><span class="single-countdown__time">%M</span><span class="single-countdown__text">Mins</span></div><div class="single-countdown"><span class="single-countdown__time">%S</span><span class="single-countdown__text">Secs</span></div>'));
		});
	});

	// quantity change js
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
    $('.pro-qty').append('<span class="inc qtybtn">+</span>');
    $('.qtybtn').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
	});


	// product view mode change js
    $('.product-view-mode a').on('click', function (e) {
        e.preventDefault();
        var shopProductWrap = $('.shop-product-wrap');
        var viewMode = $(this).data('target');
        $('.product-view-mode a').removeClass('active');
        $(this).addClass('active');
        shopProductWrap.removeClass('grid-view list-view').addClass(viewMode);
	})


	// pricing filter
	var rangeSlider = $(".price-range"),
		amount = $("#amount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	rangeSlider.slider({
		range: true,
		min: minPrice,
		max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			amount.val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	});
	amount.val(" $" + rangeSlider.slider("values", 0) +
		" - $" + rangeSlider.slider("values", 1)
	);


	// Checkout Page accordion
    $("#create_pwd").on("change", function () {
        $(".account-create").slideToggle("100");
    });

    $("#ship_to_different").on("change", function () {
        $(".ship-to-different").slideToggle("100");
	});


    // Payment Method Accordion
    $('input[name="paymentmethod"]').on('click', function () {
        var $value = $(this).attr('value');
        $('.payment-method-details').slideUp();
        $('[data-method="' + $value + '"]').slideDown();
	});


	// Scroll to top active js
	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 600) {
			$('.scroll-top').removeClass('not-visible');
		} else {
			$('.scroll-top').addClass('not-visible');
		}
	});
	$('.scroll-top').on('click', function (event) {
		$('html,body').animate({
			scrollTop: 0
		}, 1000);
	});


	// Search trigger js
	$(".search-trigger").on('click', function(){
		$(".header-search-box").toggleClass('search-box-open');
	})




    // mail-chimp active js
    function mailChimpResponse(resp) {
        if (resp.result === 'success') {
            $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
            $('.mailchimp-error').fadeOut(400);

        } else if (resp.result === 'error') {
            $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
        }
	}

	// Instagram feed carousel active
	$('.instagram-carousel').slick({
		slidesToShow: 6,
		slidesToScroll: 2,
		autoplay: true,
		speed: 1000,
		dots: false,
		arrows: false,
		responsive: [{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 4,
				}
			}
		]
	})

})(jQuery);
