@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop


@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/user-info-style.css')}}">
    <style>
        .card{
            margin: 2%;
            margin-bottom: 40px;
        }
    </style>
    <div class="container-fluid mt-5">
        @foreach($drivers as $driver)
        <div class="card">
            <!-- Start Top Section-->
            <div class="row justify-content-start">
                <div class="col-7 p-5">
                    <h3>{{$driver->user->name}}</h3>
                    <div class="row justify-content-start mt-3">
                        <!--Ratings Div-->
                        <div class="col-md-5 col-sm-12 mt-3">

                            <div class="ratings">
                                <h5 class="ratingNum">Ratings: {{$rates = \App\Helper\ModelsHelper::rates($driver->id)}}</h5>
                                @if($rates > 0&& $rates <1)
                                    <span class="fa fa-star-half checked"></span>
                                @elseif($rates > 0 )
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star unchecked"></span>
                                @endif

                                @if($rates > 1&& $rates <2)
                                    <span class="fa fa-star-half checked"></span>
                                @elseif($rates > 1 )
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star unchecked"></span>
                                @endif

                                @if($rates > 2 && $rates <3)
                                    <span class="fa fa-star-half checked"></span>
                                @elseif($rates > 2)
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star unchecked"></span>
                                @endif

                                @if($rates > 3 && $rates <4)
                                    <span class="fa fa-star-half checked"></span>
                                @elseif($rates > 3)
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star unchecked"></span>
                                @endif

                                @if($rates > 4 && $rates <5)
                                    <span class="fa fa-star-half checked"></span>
                                @elseif($rates > 4 )
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star unchecked"></span>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 mt-3">
                            <a href="{{route('driver-rating' , $driver->id)}}"><button class="btn btn-success">{{__('messagesUserInfo.rateDriver')}}</button></a>
                        </div>
                        <!-- End Ratings Div-->
                    </div>
                    <!--Personal Info Div-->
                    <div class="row justify-content-start mt-3">
                        <div class="col-md-9 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">About {{$driver->user->name}}</div>
{{--                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>--}}
                                    <p class="card-text">{{$driver->user->about}}</p>
{{--                                    <a href="#" class="card-link">Card link</a>--}}
{{--                                    <a href="#" class="card-link">Another link</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Personal Info Div-->
                </div>
                <div class="col-5 p-5 img-container">
                    <div class="card card-img">
                        @if($driver->user->profile == null)
                            <img src="{{asset('assets/img/default.jpg')}}" alt="">
                        @else
                            <img src="{{asset('assets/img/profile/' . $driver->user->profile)}}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <!-- END Start Top Section-->
            <!--Start Second Section-->
            <div class="row justify-content-start">
                <div class="col-md-6 col-sm-12 p-5 carCarouseDiv ">
                    <div class="card">
                        <div class="owl-carousel owl-theme" id="car-carousel">
                            @if(isset($drivers->cars))
                                @foreach($drivers->cars as $car)
                                    <div class="car">
                                        <a href="#">
                                            <img class="img-thumbnail" src="{{asset('assets/img/cars/driver_' . $car->driver_id . '/' . $car->image)}}" alt="">
                                        </a>
                                        <div class="card-body text-center mt-2">
                                            <p>{{$car->model}}</p>
                                        </div>
                                    </div>


                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 col-sm-12 p-5">
                    <div class="card contactInfo">
                        <div class="card-body">
                            <div class="card-title text-center">Contact Info</div>
                            <hr>
                            <div class="row p-2">
                                <div class="col-md-4"><i class="fa fa-envelope"></i></div>
                                <div class="col-md-8" style="white-space: nowrap;"><small>{{$driver->user->email}}</small></div>
                            </div>
                            @if($driver->user->facebook != null)
                                <a href="{{$driver->user->facebook}}"><div class="row p-2">
                                        <div class="col-md-4"><i class="fab fa-facebook-square"></i></div>
                                        <div class="col-md-8">Facebook</div>
                                    </div></a>
                            @endif
                            <div class="row p-2">
                                <div class="col-md-4"><i class="fa fa-phone"></i></div>
                                <div class="col-md-8">{{$driver->user->mobile}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Second Section-->
            <div class="row justify-content-between">
                <div class="col-md-4 p-5">
                    <a href="{{route('show.driver.rides' , $driver->id)}}">
                        <button class="btn btn-secondary">Show Rides</button></a>
                </div>
                @if(\Illuminate\Support\Facades\Auth::id() == $driver->user_id)
                    <div class="col-md-4 p-5">
                        <a href="{{route('updateAccount' , \Illuminate\Support\Facades\Auth::id())}}"><button class="btn btn-success">{{__('messagesRegister.updateAccount')}}</button></a>
                    </div>
                @endif
        </div>
@endforeach
{{$drivers->links()}}
    </div>

@stop

@section('footer')
    @include('includes.publicFooter')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $("#car-carousel").owlCarousel({
                loop: true,
                dots: true,
                nav: true,
                margin: 5,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>
@stop

