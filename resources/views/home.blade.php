
@extends('layouts.master')

@section('header')
@include('includes.publicHeader')

@stop

@section('content')
    <body id="page-top">
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">{{__('messagesHome.welcome')}}</h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">{{__('messagesHome.feelFree')}}</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{route('rides')}}">{{__('messagesHome.findRides')}}</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
{{--    <section class="page-section bg-primary" id="about">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-8 text-center">--}}
{{--                    <h2 class="text-white mt-0">We've got what you need!</h2>--}}
{{--                    <hr class="divider light my-4" />--}}
{{--                    <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>--}}
{{--                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">{{__('messagesHome.lets')}}</h2>
            <hr class="divider my-4" />
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-smile-wink text-primary mb-4" ></i>
                        <h3 class="h4 mb-2">{{__('messagesHome.iconSaveMoney')}}</h3>
                        <p class="text-muted mb-0">{{__('messagesHome.iconSaveMoneyText')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-users text-primary mb-4"></i>
                        <h3 class="h4 mb-2">{{__('messagesHome.iconMakeFriends')}}</h3>
                        <p class="text-muted mb-0">{{__('messagesHome.iconMakeFriendsText')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-car text-primary mb-4"></i>
                        <h3 class="h4 mb-2">{{__('messagesHome.iconShareRides')}}</h3>
                        <p class="text-muted mb-0">{{__('messagesHome.iconShareRidesText')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">{{__('messagesHome.iconHaveFun')}}</h3>
                        <p class="text-muted mb-0">{{__('messagesHome.iconHaveFunText')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
{{--    <div id="portfolio">--}}
{{--        <div class="container-fluid p-0">--}}
{{--            <div class="row no-gutters">--}}
{{--                <div class="col-lg-4 col-sm-6">--}}
{{--                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">--}}
{{--                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />--}}
{{--                        <div class="portfolio-box-caption">--}}
{{--                            <div class="project-category text-white-50">Category</div>--}}
{{--                            <div class="project-name">Project Name</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-sm-6">--}}
{{--                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">--}}
{{--                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />--}}
{{--                        <div class="portfolio-box-caption">--}}
{{--                            <div class="project-category text-white-50">Category</div>--}}
{{--                            <div class="project-name">Project Name</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-sm-6">--}}
{{--                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">--}}
{{--                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />--}}
{{--                        <div class="portfolio-box-caption">--}}
{{--                            <div class="project-category text-white-50">Category</div>--}}
{{--                            <div class="project-name">Project Name</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-sm-6">--}}
{{--                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">--}}
{{--                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />--}}
{{--                        <div class="portfolio-box-caption">--}}
{{--                            <div class="project-category text-white-50">Category</div>--}}
{{--                            <div class="project-name">Project Name</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-sm-6">--}}
{{--                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">--}}
{{--                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />--}}
{{--                        <div class="portfolio-box-caption">--}}
{{--                            <div class="project-category text-white-50">Category</div>--}}
{{--                            <div class="project-name">Project Name</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-sm-6">--}}
{{--                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">--}}
{{--                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />--}}
{{--                        <div class="portfolio-box-caption p-3">--}}
{{--                            <div class="project-category text-white-50">Category</div>--}}
{{--                            <div class="project-name">Project Name</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    </body>
@stop

@section('footer')
@include('includes.publicFooter')
@stop

