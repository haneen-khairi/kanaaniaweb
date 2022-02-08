<!-- Scroll to top start -->
<div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
</div>
<footer class="footer-widget-area">
      <div class="footer-top  ">
          <div class="container">
              <div class="row ppp-whitee">
                  <div class="col-lg-3 col-md-6">
                      <div class="widget-item w-logo">
                          <div class="widget-title1">
                              <div class="widget-logo ">
                                  <a href="{{ url('/') }}">
                                      <img src="{{ asset('img/klogo.png') }}" alt="brand logo" width="200" >
                                  </a>
                              </div>
                          </div>
                          <div class="widget-body">
                              <p>   {{ Lang::get('main.f1') }}</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                      <div class="widget-item">
                          <h6 class="widget-title">{{ Lang::get('main.contact') }}</h6>
                          <div class="widget-body ">
                              <address class="contact-block">
                                  <ul>
                                      <li><i class="pe-7s-home"></i> {{ Lang::get('main.locationa') }}</li>
                                      <li><i class="pe-7s-mail"></i> <a href="mailto:info@kanaania.com">{{ Lang::get('main.mailf') }} </a></li>
                                      <li><i class="pe-7s-call"></i> <a href="tel:+962 7 9089 89337"> {{ Lang::get('main.numf') }} </a></li>
                                  </ul>
                              </address>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                      <div class="widget-item">
                          <h6 class="widget-title">{{ Lang::get('main.informaition') }}</h6>
                          <div class="widget-body">
                              <ul class="info-list">
                                  <li><a href="{{ url('/'.$lang.'/about-us') }}">{{ Lang::get('main.about') }}</a></li>
                                  <li><a href="{{ url('/'.$lang.'/contact-us') }}">{{ Lang::get('main.contact') }}</a></li>
                                  <li><a href="{{ url('/'.$lang.'/deliver') }}">{{ Lang::get('main.delivery') }}</a></li>
                                  <li><a href="{{ url('/'.$lang.'/privacy') }}">{{ Lang::get('main.privacy') }}</a></li>
                                  <li><a href="{{ url('/'.$lang.'/term-condition') }}">{{ Lang::get('main.term') }} </a></li>
                                  <li><a href="{{ url('/'.$lang.'/founder') }}">{{ Lang::get('main.founder') }} </a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                      <div class="widget-item">
                          <h6 class="widget-title">{{ Lang::get('main.follow') }} </h6>
                          <div class="widget-body social-link">
                              <a href="https://www.facebook.com/Kanaania.Jewelry/" target="_blank"><i class="fa fa-facebook" ></i></a>
                              <a href="https://twitter.com/kanaaniajewell" target="_blank"><i class="fa fa-twitter" ></i></a>
                              <a href="https://www.instagram.com/kanaania_jewelry/" target="_blank"><i class="fa fa-instagram" ></i></a>
                              <a href="https://www.youtube.com/channel/UC6xF0zs3_Jel3r1lOPKavuQ" target="_blank"><i class="fa fa-youtube"></i></a>
                          </div>
                      </div>
                      <div class="widget-item">
                          <h6 class="widget-title">{{ Lang::get('main.paymentmethods') }} </h6>
                          <div class="widget-body social-link">
                              <a href=""><i class="fa fa-cc-visa"></i></a>
                              <a href=""><i class="fa fa-cc-mastercard"></i></a>
                              <a href=""><i class="fa fa-paypal"></i></a>
                              <a href=""><i class="fa fa-cc-discover"></i></a>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="row text-center">
                  <div class="col-lg-12 col-md-9 col-sm-3">
                          <div class="power-b">
                             <p>{{ Lang::get('main.Power') }}<a href="https://fasttechno.net/" target="_blank"><img src="{{ asset('img/fasttechno-logo.png') }}" class="f-p" width="80" /></a></p>
                       </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </footer>

  <!-- JS
  ============================================ -->
  <!-- Modernizer JS -->
  <!-- jQuery JS -->
  <script src="{{ asset('js/vendor/jquery-3.6.0.min.js')  }}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ asset('js/vendor/bootstrap.bundle.min.js')  }}"></script>
  <!-- slick Slider JS -->
  <script src="{{ asset('js/plugins/slick.min.js')  }}"></script>
  <!-- Countdown JS -->
  <script src="{{ asset('js/plugins/countdown.min.js')  }}"></script>
  <!-- Nice Select JS -->
  <script src="{{ asset('js/plugins/nice-select.min.js')  }}"></script>
  <!-- jquery UI JS -->
  <script src="{{ asset('js/plugins/jqueryui.min.js')  }}"></script>
  <!-- Image zoom JS -->
  <script src="{{ asset('js/plugins/image-zoom.min.js')  }}"></script>
  <!-- Images loaded JS -->
  <script src="{{ asset('js/plugins/imagesloaded.pkgd.min.js')  }}"></script>
  <!-- mail-chimp active js -->
  <script src="{{ asset('js/plugins/ajaxchimp.js')  }}"></script>
  <!-- contact form dynamic js -->
  <script src="{{ asset('js/plugins/ajax-mail.js')  }}"></script>
  <!-- google map api -->
  <script src="../../maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
  <!-- google map active js -->
  <script src="{{ asset('js/plugins/google-map.js')  }}"></script>
  <!-- Main JS -->

<script>
function myFunctions() {

}
</script>
  <script src="{{ asset('js/main.js')  }}"></script>
  <script>
      var par = document.getElementById('par');
      var div = document.getElementById('div-gold');
      var w = 400;
      div.style.width = w + 'px';
      var s = 0;
      function movefunction() {

          par.style.left = s + 'px';
          if (s <= 0 - w + 1) {
              s = w - 1;
          } else {
              s = s - 1;
          }
        //   console.log(div.style.width);
      }


      window.onload = setInterval(movefunction, 30);
  </script>
   <script>
      setTimeout(function () {
          $('.loader-bg').fadeToggle();
      }, 1500);
  </script>
<script>
function myFunctiones() {
  var x = document.getElementById("show-section");
  console.log("working",x.style.display);
  if (x.style.display == "block")  {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

  </body>

</html>
