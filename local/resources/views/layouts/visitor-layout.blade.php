<!DOCTYPE html>
<html lang="en" ng-app="ui.project">
    <head>
        <title>Holidayku</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:200,300,400,400italic,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="{{ url('assets/image/favicon.ico') }}" type="img/ico">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('assets/css/flexslider.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        <script src="{{ url('assets/js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.flexslider-min.js') }}"></script>
        <script src="{{ url('assets/js/scrolling-nav.js') }}"></script>
        <script>
          //slideshow plugin
            $(window).load(function() {
                $('.flexslider').flexslider({animation: "slide"});
            });
            
            //Scroll To Top plugin
            $(document).ready(function(){
                //Check to see if the window is top if not then display button
                $(window).scroll(function(){
                    if ($(this).scrollTop() > 100) {$('.scrollToTop').fadeIn();}
                    else {$('.scrollToTop').fadeOut();}
                });

                //Click event to scroll to top
                $('.scrollToTop').click(function(){
                    $('html, body').animate({scrollTop : 0},800);
                    return false;
                });
            });
        </script>
        <style>
            .stickk{top: 0;position: fixed;z-index: 100;width: 100%;background: white;border-bottom: 6px solid #20b1c5;box-shadow: 0 2px 4px rgba(18,99,110,.75);}
            .fs1-right{font-size: .75em;text-align: right;padding-top: 1em;}
            .bg-light-java{background: rgba(32, 177, 197,.05);}
        </style>
    </head>
    <body>
<!--scroll to top-->
        {{-- url() --}}
        <a href="#" class="scrollToTop text-center"><i class="fa fa-arrow-circle-o-up fa-3x"></i><br>Scroll<br>To Top</a>
        <!--scroll to top end-->
        <!--Modals-->
        <div id="modals">
            <!--Modal Login-->
            <div class="modal fade" id="modlogin" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
                            <img src="{{ url('assets/image/logo.png') }}" class="img-responsive" id="mod-logo">
                            <div class="min-title text-center">
                                <hr class="bc-dodger-blue">
                                <div class="c-dodger-blue text-center"><span class="bg-white"><i class="fa fa-sign-in"></i> LOGIN</span></div>
                            </div>
                        </div>
                       
                        <div class="modal-body">
                            <form role="form" class="form-horizontal" method="POST" action="{{ url('main/check') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <div class="modal-input">
                                        <div class="col-xs-4">
                                            <label class="c-dodger-blue"><i class="fa fa-envelope-o"></i> E-mail</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="email" class="form-control" placeholder="Your e-mail address" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="modal-input">
                                        <div class="col-xs-4">
                                            <label class="c-dodger-blue"><i class="fa fa-key"></i> Password</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="password" class="form-control" placeholder="Your password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="space-1"></div>
                                <div class="row form-group">
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-default bg-cinnabar"><span class="fw-700">LOGIN</span></button>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <label class="control-label c-lightgrey">- OR -</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="button" onclick="javascript: window.location = '{{ url('facebook') }}'" class="btn btn-default bg-facebook"><i class="fa fa-facebook-official"></i> Login with Facebook</button>
                                    </div>
                                </div>
                                <div class="space-1"></div>
                                <div class="row form-group">
                                    <div class="col-sm-8 md-center">
                                        <input type="checkbox" id="keep-in">
                                        <label for="keep-in" class="fw-200">Biarkan saya tetap masuk</label>
                                    </div>
                                    <div class="col-sm-4 text-right md-center" >
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <span>Not a member yet? Please click </span><a href="traveller-register.html" class="fw-700">here</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Modal Register-->
            <div class="modal fade" id="modregister" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&#215;</span></button>
                            <img src="{{ url('assets/image/logo.png') }}" class="img-responsive" id="mod-logo">
                            <div class="min-title text-center">
                                <hr class="bc-dodger-blue">
                                <div class="c-dodger-blue text-center"><span class="bg-white"><i class="fa fa-sign-in"></i> REGISTER</span></div>
                            </div>
                        </div>
                       
                        <div class="modal-body">
                            <form role="form" class="form-horizontal" action="{{ url('main/register') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <div class="modal-input">
                                        <div class="col-xs-4">
                                            <label class="c-dodger-blue"><i class="fa fa-envelope-o"></i> E-mail</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="email" name="email" class="form-control" placeholder="Your e-mail address">
                                        </div>
                                    </div>
                                </div>
                                <div class="space-1"></div>
                                <div class="form-group">
                                    <div class="col-sm-3 md-none"></div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-default bg-cinnabar"><span class="fw-700">REGISTER</span></button>
                                    </div>
                                    <div class="col-sm-3 md-none"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <span>Are you a vendor? Please click </span><a href="vendor-register.html" class="fw-700">here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modals End-->
        
        <!--Header Section-->
        <header>
            <nav class="navbar bg-dodger-blue">
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navi">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                    <a class="navbar-brand zi-1000" href="#" style="position:relative;">
                        <img src="{{ url('assets/image/logo.png') }}" class="p-absolute zi-1000" style="margin:0 0 0 .4em;">
                        <span class="md-none"><img src="{{ url('assets/image/pita.png') }}"></span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="Navi">
                     <ul class="nav navbar-nav navbar-right">
                        @if(!Auth::check())
                            <li><a href="#" data-toggle="modal" data-target="#modregister" class="bg-tree-poppy c-white"><i class="fa fa-user-plus"></i> Register</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modlogin" class="bg-cinnabar c-white"><i class="fa fa-sign-in"></i> Login</a></li>
                            <li><a href="vendor-register.html" class="bg-tall-poppy c-white"><i class="fa fa-users"></i> Join Us</a></li>
                        @else
                            <li class="dropdown">
                                 <a class="dropdown-toggle c-white" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> {{ 'Hi, '. Auth::user()->email }} <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('visitor-profile') }}" class=""><i class="fa fa-user"></i> My Profile</a></li>
                                        <li><a href="{{ url('visitor-favorite-tour') }}" class=""><i class="fa fa-heart"></i> My Favourite Tour</a></li>
                                        <li><a href="{{ url('visitor-itenary') }}" class=""><i class="fa fa-map"></i> My Itinerary</a></li>
                                        <li><a href="{{ url('visitor-journey') }}" class=""><i class="fa fa-location-arrow"></i> My Journey</a></li> 
                                    </ul>
                             </li>
                             <li><a href="#" class="c-white"><i class="fa fa-envelope-o"></i> Messages</a></li>
                             <li><a href="{{ url('auth/logout') }}" class="c-white"><i class="fa fa-sign-out"></i> Logout</a></li>
                         @endif
                    </ul> 
                </div>
              </div>
            </nav>
        </header>
        <!--Header End-->
        
        <!--Season Banner-->
        <div class="season md-none">
            
        </div>
        <!--Season Banner End-->
        
        <!--Slideshow-->
        <div id="section-slider" class="container">
            <div class="flexslider">
                <ul class="slides" >
                    <li><img src="{{ url('assets/image/slide1.jpg') }}" alt="slide1"></li>
                    <li><img src="{{ url('assets/image/slide2.jpg') }}" alt="slide2"></li>
                    <li><img src="{{ url('assets/image/slide3.jpg') }}" alt="slide3"></li>
                    <li><img src="{{ url('assets/image/slide4.jpg') }}" alt="slide4"></li>
                </ul>
            </div> 
        </div>
        <!--Slideshow End-->
        <!--Form Section-->
        <div class="container-fluid" id="sb-wrapper">
            <div class="container">
                <form class="form-inline p-0" role="form" id="SearchBar">
                    <img src="{{ url('assets/image/logo.png') }}" class="img-responsive d-none" id="sub-logo">
                    <div class="col-sm-2 text-center" id="s-label">
                        <label class="control-label c-java">Search by</label>
                    </div>
                    <div class="col-sm-10 md-center">
                        <div class="col-sm-2">
                            <select class="form-control bc-java">
                                <option>Category 1</option>
                                <option>Category 2</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control bc-java" placeholder="Range budget from">
                            <label class="control-label c-java">s/d</label>
                            <input type="text" class="form-control bc-java" placeholder="Range budget to">
                        </div>
                         <div class="col-sm-2">
                            <select class="form-control bc-java">
                                <option>Country 1</option>
                                <option>Country 2</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control bc-java">
                                <option>City 1</option>
                                <option>City 2</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-block bg-tree-poppy c-white fw-700"> <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--StickyBar script-->
        <script>
            $(document).scroll(function(){
                if($(window).scrollTop() > 400 && $(window).width() > 768)  {
                    $("#sb-wrapper").addClass("stickk");
                    $("#sub-logo").removeClass("d-none");
                    $("#s-label").addClass("fs1-right");
                    $("#SearchBar").css({"background":"none"});
                }else {
                    $("#sb-wrapper").removeClass("stickk");
                    $("#sub-logo").addClass("d-none");
                    $("#s-label").removeClass("fs1-right");
                    $("#SearchBar").css({"background":"rgb(250,250,250)"});
                }
            });
        </script>
        <!--Form Section End-->
        
        <!--Container Section-->
        @yield('content')
        <!--Container Section End-->
        
        <!--Footer Section-->
        <div class="container">
            <br>
            <img id="footer-img" src="{{ url('assets/image/bottom-landmarks.png') }}" class="img-responsive">
        </div>
        <footer class="bg-dodger-blue">
            <div class="container">
                <div class="row">
                     <div class="col-md-4 md-center">
                        <ul class="list-inline">
                            <li><a  href="#" class="c-white">About Us</a></li>
                            <li><a href="#" class="c-white">FAQ</a></li>
                            <li><a href="#" class="c-white">Contact Us</a></li>
                            <li><a href="vendor-register.html" class="c-white">Join Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8 text-right md-center">
                        <ul class="list-inline">
                            <li><a href="#" class="c-white"><i class="fa fa-facebook-official fa-lg"></i></a></li>
                            <li><a href="#" class="c-white"><i class="fa fa-twitter fa-lg"></i></a></li>
                            <li><a href="#" class="c-white"><i class="fa fa-instagram fa-lg"></i></a></li>
                            <li><a href="#" class="c-white"><i class="fa fa-pinterest fa-lg"></i></a></li>
                            <li><a href="#" class="c-white"><i class="fa fa-linkedin fa-lg"></i></a></li>
                            <li><a href="#" class="c-white"><i class="fa fa-youtube fa-lg"></i></a></li>
                            <li><a href="#" class="c-white"><i class="fa fa-google-plus fa-lg"></i></a></li>
                        </ul>
                    </div>
                </div>
                <hr class="p-0 m-0-auto">
                <div class="row">
                    <div class="col-md-4 md-center va-middle">
                        <a href="#" class="va-middle"><img src="{{ url('assets/image/logo-white.png') }}" class="va-middle"></a>
                    </div>
                    <div class="col-md-8 text-right md-center va-middle">
                        <ul class="list-inline  color-white">
                            <li><a class="c-white">Terms &amp; Conditions</a></li>
                            <li><a class="c-white">Privacy Policy</a></li>
                            <li class="c-white">Copyright &copy; 2016 Holidayku. All Rights Reserved.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer End-->
    </body>
    @yield('script')
</html>