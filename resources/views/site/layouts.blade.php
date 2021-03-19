<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Flattern  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
   <!-- css -->
   <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" />
   <link href="{{ asset('frontend/css/bootstrap-responsive.css') }}" rel="stylesheet" />
   <link href="{{ asset('frontend/css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
   <link href="{{ asset('frontend/css/jcarousel.css') }}" rel="stylesheet" />
   <link href="{{ asset('frontend/css/flexslider.css') }}" rel="stylesheet" />
   <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
   <link href="{{ asset('frontend/skins/default.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/all.css') }}"> --}}
   <!-- Fav and touch icons -->
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/ico/apple-touch-icon-144-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/ico/apple-touch-icon-114-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/ico/apple-touch-icon-72-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/ico/apple-touch-icon-57-precomposed.png') }}" />
  <link rel="shortcut icon" href="{{ asset('frontend/ico/favicon.png') }}" />

  <!-- =======================================================
    Theme Name: Flattern
    Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
    <div id="app">


  <div id="wrapper"  style="margin-top: 50px" >

    <!-- end toggle top area -->
    <!-- start header -->
    <header >
      <div class="container" >
<!-- Push top header side -->
        <top-header></top-header>

      </div>
    </header>
    <!-- end header -->
    <!-- Push Home Master side -->
<home-master></home-master>

{{-- ekhane home content show korce....post and right side bar --}}

      {{-- <home></home> --}}


    <!-- Push right side bar -->
          {{-- <right-sidebar></right-sidebar> --}}

    <footer>
      <div class="container">
        <div class="row">
          <div class="span3">
            <div class="widget">
              <h5 class="widgetheading">Browse pages</h5>
              <ul class="link-list">
                <li><a href="#">About our company</a></li>
                <li><a href="#">Our services</a></li>
                <li><a href="#">Meet our team</a></li>
                <li><a href="#">Explore our portfolio</a></li>
                <li><a href="#">Get in touch with us</a></li>
              </ul>
            </div>
          </div>
          <div class="span3">
            <div class="widget">
              <h5 class="widgetheading">Important stuff</h5>
              <ul class="link-list">
                <li><a href="#">Press release</a></li>
                <li><a href="#">Terms and conditions</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Career center</a></li>
                <li><a href="#">Flattern forum</a></li>
              </ul>
            </div>
          </div>

          <div class="span3">
            <div class="widget">
              <h5 class="widgetheading">Get in touch with us</h5>
              <address>
								<strong>Flattern studio, Pte Ltd</strong><br>
								 Springville center X264, Park Ave S.01<br>
								 Semarang 16425 Indonesia
					 		</address>
              <p>
                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                <i class="icon-envelope-alt"></i> email@domainname.com
              </p>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p>
                  <span>&copy; Flattern - All right reserved.</span>
                </p>
                <div class="credits">
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                  -->
                  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
              </div>
            </div>
            <div class="span6">
              <ul class="social-network">
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  <!-- javascript

    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="{{ asset('js/app2.js') }}"></script>

   <script src="{{ asset('frontend/js/jquery.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
   <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/jcarousel/jquery.jcarousel.min.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.fancybox.pack.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.fancybox-media.js') }}"></script>
   <script src="{{ asset('frontend/js/google-code-prettify/prettify.js') }}"></script>
   <script src="{{ asset('frontend/js/portfolio/jquery.quicksand.js') }}"></script>
   <script src="{{ asset('frontend/js/portfolio/setting.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.nivo.slider.js') }}"></script>
   <script src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.ba-cond.min.js') }}"></script>
   <script src="{{ asset('frontend/js/jquery.slitslider.js') }}"></script>
   <script src="{{ asset('frontend/js/animate.js') }}"></script>
   <script src="{{ asset('frontend/js/custom.js') }}"></script>
   <!-- Template Custom JavaScript File -->
   {{-- <script src="{{ asset('frontend/js/all.js') }}"></script> --}}


</body>

</html>
