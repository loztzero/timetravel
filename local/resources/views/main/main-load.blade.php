<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Holidayku</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ url('assets/image/favicon.ico') }}" type="img/ico">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('assets/css/flexslider.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ url('assets/js/jquery.flexslider-min.js') }}"></script>
        <script src="{{ url('assets/js/scrolling-nav.js') }}"></script>
        <script>
             //slideshow plugin
        $(window).load(function() {
            $('.flexslider').flexslider({animation: "slide"});
        });
        </script>
    </head>
    <body>
<!--        Container-->
        <div class="container">
<!--            Top header-->
            <div class="row" id="header">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span class="fs-20 fw-1">&#215;</span></button>
                            <img src="{{ url('assets') }}/image/logo.png" class="img-responsive">
                            <div class="modal-title fw-6 fs-15 color-skyblue"><i class="fa fa-sign-in fa-lg"></i> Login to</div>
                            
                        </div>
                        <div class="modal-body">
                            <form role="form" class="form-horizontal">
                                <div class="form-group">
                                   <div class="row modal-input">
                                        <div class="col-sm-4">
                                        <label class="color-skyblue fs-15 fw-2 modal-label"><i class="fa fa-envelope-o"></i> E-mail</label></div>
                                     <div class="col-sm-8">
                                        <input type="email" class="form-control height-4" placeholder="Type your password here"></div>
                                     </div>
                                </div>
                                 <div class="form-group ">
                                    <div class="row modal-input">
                                        <div class="col-sm-4">
                                        <label class="color-skyblue fs-15 fw-2 modal-label"><i class="fa fa-key"></i> Password</label></div>
                                     <div class="col-sm-8">
                                        <input type="password" class="form-control height-4" placeholder="Type your password here"></div>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-5 ">
                                        <button type="submit" class="btn btn-default custom-submit border-orange height-3">Login</button>
                                    </div>
                                    <div class="col-md-2 text-center margin-0-auto fs-15 height-3 color-skyblue" style="padding-top:.5em;font-weight:800;color:">- OR -</div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-default custom-submit bg-skyblue border-skyblue height-3"><i class="fa fa-facebook-official fa-lg"></i> Login with Facebook</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="checkbox" value="Subscribe" class="border-skyblue" id="subs-news">
                                        <label for="subs-news" class="form-caption"><small>Biarkan saya tetap masuk</small></label>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a>Forgot Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <span>Not a member yet? Please click </span><a href="#">here</a>
                        </div>
                    </div>
                </div>
            </div>
<!--                Header-->
                <header class="row md-display-none" style="padding:0;margin:0 1.5em;">
                    <div class="col-md-1 padd-0 bg-skyblue height-fill"></div>
                    <div class="col-md-3 padd-0 padd-lr-1">
                        <img src="{{ url('assets') }}/image/logo.png" class="img-responsive">
                    </div>
                    <div class="col-md-8 padd-0 bg-skyblue height-fill"></div>
                </header>
<!--                section end-->
                
<!--                Seasons secion-->
                <div id="season-bg">
                    
                </div>
<!--                section end-->
                
<!--                Navigator section-->
                <nav class="navbar navbar-inverse margin-lr-1 bg-white border-rad-0  border-transparent">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle bg-skyblue  border-transparent" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                      </button>
                      <a class="navbar-brand md-display-block" href="#"><img src="{{ url('assets') }}/image/logo.png" class="img-responsive"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                      <ul class="nav navbar-nav navbar-right" id="unsignin">
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus fa-lg"></i> Register</a></li>
                        <li><a href="#"><i class="fa fa-sign-in fa-lg"></i> Login</a></li>
                        <li><a href="#"><i class="fa fa-users fa-lg"></i> Join Us</a></li>
                        <li><span class="empty-box"></span></li>
                      </ul>
                        
                    </div>
                  </div>
                </nav>
            </div>
<!--            section end-->
            
<!--            slider section-->
            <div id="section-slider" >
                <div class="text-center text-uppercase color-white" id="welcome-box">
                    <div>
                        <i class="fa fa-star-o fa-2x"></i>
                         <i class="fa fa-star-o fa-2x"></i>
                         <i class="fa fa-heart fa-3x"></i>
                         <i class="fa fa-star-o fa-2x"></i>
                         <i class="fa fa-star-o fa-2x"></i>
                    </div>
                    <hr>
                    <h3 class="fw-2">Keep Calm</h3>
                    <h3 class="fw-2">&amp;</h3>
                    <h4 class="fw-2">Find Your Favourite</h4>
                    <h3 class="fw-7">Destination</h3>
                    <h3 class="fw-7">Here</h3>
                    <hr>
                </div>
                <div class="flexslider">
                    <ul class="slides" >
                        <li>
                            <div class="subtitle">Area 1, <i>Country A</i></div>
                            <img src="{{ url('assets') }}/image/slide1.jpg">
                        </li>
                        <li>
                            <div class="subtitle">Area 2, <i>Country B</i></div>
                            <img src="{{ url('assets') }}/image/slide2.jpg">
                        </li>
                        <li>
                            <div class="subtitle">Area 3, <i>Country C</i></div>
                            <img src="{{ url('assets') }}/image/slide3.jpg">
                        </li>
                        <li>
                            <div class="subtitle">Area 4, <i>Country D</i></div>
                            <img src="{{ url('assets') }}/image/slide4.jpg">
                        </li>
                    </ul>
                </div>
                
            </div>
<!--            end-line slider section-->
            
<!--            Search bar section-->
            <form role="form" class="form-inline search-bar">
                <div class="row">
                    <div class="col-md-2 text-center" >
                        <h4 class="color-skyblue fw-7 fs-15 m-padd-tb-1 m-border-bottom-skyblue text-uppercase">Search By</h4>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group m-margin-1">
                            <select class="form-control border-skyblue text-uppercase width-10" id="sel1">
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                        </div>
                        <div class="form-group m-margin-1">
                            <input type="text" class="form-control border-skyblue text-uppercase" placeholder="range budget from">
                            <span class="m-txt-center">
                                <i class="fa fa-arrows-h color-skyblue md-display-none"></i>
                                <i class="fa fa-arrows-v color-skyblue md-display-block m-margin-025"></i>
                            </span>
                            <input type="text" class="form-control border-skyblue text-uppercase" placeholder="range budget to">
                        </div>
                        <div class="form-group m-margin-1">
                            <select class="form-control border-skyblue width-10" id="sel2">
                                <option>Bandung</option>
                                <option>Jakarta</option>
                                <option>Surabaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-default custom-btn border-orange bg-orange color-white"><i class="fa fa-search fa-lg"></i></button>
                    </div>
                </div>
            </form>
<!--            Section end-->

<!--            Mengapa Holidayku section-->
             <h2 class="section-title-box bg-skyblue color-white"><i class="fa fa-check-square-o"></i> Mengapa Holidayku?</h2>
            <div class="row color-skyblue" id="why-holidayku">
                <div class="col-md-3">
                    <h3 class="border-bottom-skyblue why-box"><span class="rounded text-center color-white bg-skyblue">1</span> Easy</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>
                <div class="col-md-3">
                   <h3 class="border-bottom-skyblue why-box"><span class="rounded text-center color-white bg-skyblue">2</span> Fast</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>
                <div class="col-md-3">
                   <h3 class="border-bottom-skyblue why-box"><span class="rounded text-center color-white bg-skyblue">3</span> Cheap</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>
                <div class="col-md-3">
                    <h3 class="border-bottom-skyblue why-box"><span class="rounded text-center color-white bg-skyblue">4</span> Reliable</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac commodo urna. Donec volutpat mi id nibh blandit pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                </div>
            </div>
<!--            section end-->
<!--            Popular Destinations-->
            <h2 class="section-title-box bg-skyblue color-white"><i class="fa fa-plane"></i> Destinasi Terpopuler</h2>
            
            <div class="row" id="pop-dest">
                <div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div><div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div><div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div><div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div><div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div><div class="col-md-4">
                    <div class="pop-d-box">
                        <ul class="list-unstyled">
                            <li class="text-center"><img src="{{ url('assets') }}/image/bali.png" class="img-responsive pop-d-img"></li>
                            <li class="padd-top-1 color-skyblue pop-d-details border-bottom-skyblue margin-padd-15"><i class="fa fa-map-marker fa-2x"></i> <span class="fw-5 fs-15">Bali</span> <span class="fw-2 fs-15"> Indonesia</span> <a href="#" class="color-skyblue ask-itinerary"> <i class="fa fa-plane fa-lg"></i> Ask itinerary</a></li>
                           
                            <li class="text-center list-inline">
                                <ul class="list-unstyled pop-d-details">
                                    <li class="col-xs-4"><a><i class="fa fa-save fa-lg"></i> Save</a></li>
                                    <li class="col-xs-4 border-1px border-dot-lr border-skyblue"><a><i class="fa fa-eye fa-lg"></i> <span class="badge bg-carnation">172</span></a></li>
                                    <li class="col-xs-4"><a><i class="fa fa-thumbs-o-up fa-lg"></i> <span class="badge bg-sandy-brown">1700</span></a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<!--            section end-->
            <div class="row margin-tb-3">
                <div class="col-xs-5"><span class="separator"></span></div>
                 <div class="col-xs-2 text-center fs-15 fw-2 color-skyblue"><a href="#" class="hover-bold">Load More</a></div>
                 <div class="col-xs-5"><span class="separator"></span></div>
            </div>
<!--            Footer section-->
            <div id="upper-footer" class="row">
                <img id="footer-img" src="{{ url('assets') }}/image/bottom-landmarks.png">
            </div>
            <div class="row bg-footer padding-tb-1" id="footer">
                <div class="col-md-4  md-text-center">
                    <ul class="list-inline">
                        <li><a>About Us</a></li>
                        <li><a>FAQ</a></li>
                        <li><a>Contact Us</a></li>
                        <li><a>Join Us</a></li>
                    </ul>
                </div>
                <div class="col-md-8 text-right md-text-center">
                     <ul class="list-inline">
                        <li><a><i class="fa fa-facebook-official fa-2x"></i></a></li>
                        <li><a><i class="fa fa-twitter fa-2x"></i></a></li>
                        <li><a><i class="fa fa-instagram fa-2x"></i></a></li>
                        <li><a><i class="fa fa-pinterest fa-2x"></i></a></li>
                        <li><a><i class="fa fa-linkedin fa-2x"></i></a></li>
                        <li><a><i class="fa fa-youtube fa-2x"></i></a></li>
                        <li><a><i class="fa fa-google-plus fa-2x"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12"><hr class=" margin-tb-1"></div>
                <div class="col-md-4">
                    <a><img src="{{ url('assets') }}/image/logo-white.png"></a>
                </div>
                <div class="col-md-8 text-right  md-text-center">
                    <ul class="list-inline  color-white">
                        <li><a class="color-white">Terms &amp; Conditions</a></li>
                        <li><a class="color-white">Privacy Policy</a></li>
                        <li>Copyright &copy; 2016 Holidayku. All Rights Reserved.</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>