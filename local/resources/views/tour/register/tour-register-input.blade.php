@extends('layouts.vendor-layout')
@section('content')

    <!--Container Section-->
        <script>
            $(document).scroll(function(){
                if($(window).scrollTop() > $("header").height() && $(window).width() > 768)  {
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
        
        <section class="container">
            <div class="space-1"></div>
            <h3 class="section-title text-center m-0"><span class="c-java">VENDOR ALBUM</span></h3>
                    <hr class="bc-java s-title">
            <div class="row user-panel vendor">
                <div class="col-sm-3">
                    <div class=" vendor-header">
                        <div class="public-profile">
                        <img src="image/travelmate_img.jpg" class="img-responsive">
                    </div>
                    <h3 class="fw-700 c-white text-center">PT. Main Omega Indonesia</h3>
                    <h4 class="c-white text-center">Jl. Jend. Sudirman Kav 7-8 Jakarta 11250, Indonesia</h4>
                    <hr>
                    <div class="fa-lg c-white vendor-contact">
                        <div class="mb-1"><a href="#" class="c-white"><i class="fa fa-phone"></i> +62-21-5555-5555</a></div>
                        <div class="mb-1"><a href="#" class="c-white"><i class="fa fa-envelope"></i> Send Message</a></div>
                        <div class=""><a href="public-vendor.html" class="c-white"><i class="fa fa-list"></i> Daftar Tour</a></div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <!--My Album-->
                    
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-unstyled vendor-album">
                                <li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
                                <li class="text-center">
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white"><i class="fa fa-thumbs-up"></i> Like it</a></div>
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white" data-toggle="modal" data-target="#commento"><i class="fa fa-comment"></i> Comment</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled vendor-album">
                                <li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
                                <li class="text-center">
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white"><i class="fa fa-thumbs-up"></i> Like it</a></div>
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white" data-toggle="modal" data-target="#commento"><i class="fa fa-comment"></i> Comment</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled vendor-album">
                                <li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
                                <li class="text-center">
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white"><i class="fa fa-thumbs-up"></i> Like it</a></div>
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white" data-toggle="modal" data-target="#commento"><i class="fa fa-comment"></i> Comment</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled vendor-album">
                                <li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
                                <li class="text-center">
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white"><i class="fa fa-thumbs-up"></i> Like it</a></div>
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white" data-toggle="modal" data-target="#commento"><i class="fa fa-comment"></i> Comment</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled vendor-album">
                                <li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
                                <li class="text-center">
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white"><i class="fa fa-thumbs-up"></i> Like it</a></div>
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white" data-toggle="modal" data-target="#commento"><i class="fa fa-comment"></i> Comment</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled vendor-album">
                                <li class="of-hidden"><img src="image/hk.jpg" class="img-responsive wh-100"></li>
                                <li class="text-center">
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white"><i class="fa fa-thumbs-up"></i> Like it</a></div>
                                    <div class="col-xs-6 p-1"><a href="#" class="c-white" data-toggle="modal" data-target="#commento"><i class="fa fa-comment"></i> Comment</a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="space-2"></div>
                    <div class="row load-more">
                <div class="col-sm-4 md-none"><hr class="bc-dodger-blue"></div>
                <div class="col-sm-4 text-center" style="margin-top:.25em;"><a href="#" class="c-dodger-blue">Load More</a></div>
                <div class="col-sm-4 md-none"><hr class="bc-dodger-blue"></div>
            </div>
                    </div>
                    <!--My Itinerary End-->
                </div>
            </div>
            <br>
        </section>
    <!--Container Section End-->
        
@stop