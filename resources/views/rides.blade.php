@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop



@section('content')
    <link rel="stylesheet" href="{{asset('css/ride-page-style.css')}}">
    {{--    <table class="table table-bordered"  style="text-align: center">--}}
{{--        <thead class="table-dark">--}}
{{--        <tr>--}}
{{--            <th scope="col">{{__('messagesRides.rideName')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.driverName')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.carDetails')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.numberOfSeats')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.from')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.to')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.middCity')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.start')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.arrive')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.status')}}</th>--}}
{{--            <th scope="col">{{__('messagesRides.readAll')}}</th>--}}

{{--        </tr>--}}
{{--        </thead>--}}

{{--        <tbody>--}}
{{--        @foreach($cars as $car)--}}
{{--            @foreach($car->rides as $ride)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$ride->ride_name}}</th>--}}
{{--                    <td><a href="{{route('show.driver.rides' , $car->driver_id)}}">{{$users[$car->driver->user_id]->name}}</a></td>--}}

{{--                    <td>model: {{$car->model}}, color : {{$car->color}}</td>--}}
{{--                    <td>{{$ride->number_of_seats}}</td>--}}
{{--                    <td>{{$city[$ride->source_city_id]->name}}</td>--}}
{{--                    <td>{{$city[$ride->destination_city_id]->name}}</td>--}}
{{--                    <td>{{$city[$ride->enroute_city_id]->name}}</td>--}}
{{--                    <td>{{$ride->start_date}} at {{$ride->start_time}}</td>--}}
{{--                    <td>{{$ride->arrive_date}} at {{$ride->arrive_time}}</td>--}}
{{--                    @if($ride->ride_status == __('messagesGlobal.rideIsActive'))--}}
{{--                        <td style="background-color: green">{{$ride->ride_status}}</td>--}}
{{--                    @else--}}
{{--                        <td style="background-color: red">{{$ride->ride_status}}</td>--}}
{{--                    @endif--}}
{{--                    <td><a href="{{route('ride.read.all' , $ride->id)}}"><button class="alert-danger">{{__('messagesRides.readAll')}}</button></a></td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

        @if(Session::has('success'))
            <div class="card-body">
            <div class="alert alert-success" role="success">
                {{Session::get('success')}}
            </div>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="card-body">
            <div class="alert alert-danger" role="success">
                {{Session::get('error')}}
            </div>
            </div>
        @endif

        @foreach($cars as $car)
            @foreach($car->rides as $ride)
<div class="container-fluid mt-5">
    <!--Start Main Card-->

    <div class="parent card mt-5">

        <!--Card Body-->
        <div class="card-body">
            <!--Card Title-->
            <div class="card-title">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-3">
                        <h3>{{$ride->ride_name}}</h3>
                        @if($ride->ride_status == __('messagesGlobal.rideIsActive'))
                            <span style="background-color: green">{{$ride->ride_status}}</span>
                        @else
                            <span style="background-color: red">{{$ride->ride_status}}</span>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 mb-5">
                        <h5>{{__('messagesRides.from')}}</h5> <span class="city">{{$city[$ride->source_city_id]->name}}</span>
                        <h5>{{__('messagesRides.middCity')}}</h5> <span class="city">{{$city[$ride->enroute_city_id]->name}}</span>
                        <h5>{{__('messagesRides.to')}}</h5> <span class="city">{{$city[$ride->destination_city_id]->name}}</span>
                    </div>
                </div>
            </div>
            <!--End Card Title-->
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <!--Start Child Card-->
                    <div class="card child p-2">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <h5>{{$users[$car->driver->user_id]->name}}</h5> <a href="{{route('user.info' , $car->driver->user_id)}}" style="text-decoration: none;"><i class="fa fa-user ml-4"></i></a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 mt-5">
                                <h5>Car Model</h5><span class="text-muted ml-2">{{$car->model}}</span> <br>
                                <h5 class="mt-5">Car Color</h5> <span class="text-muted ml-2">{{$car->color}}</span>
                            </div>
                            @if($car->image == null)
                                <div class="col-md-6">
                                    <img class="img" src="assets/default.jpg" alt="car image">
                                </div>
                            @else
                                <div class="col-md-6">
                                    <img class="img" src="{{asset(\App\Helper\Helper::getCarImage($car))}}" alt="car image">
                                </div>
                            @endif
                        </div>
                        <div class="ratings">
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <h5 class="ratingNum">Ratings: {{$rates = \App\Helper\ModelsHelper::rates($car->driver->id)}}</h5>
                                </div>

                                <div class="col-md-5">
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


{{--                                        <span class="fa fa-star checked"></span>--}}
{{--                                    <span class="fa fa-star checked"></span>--}}
{{--                                    <span class="fa fa-star-half checked"></span>--}}
{{--                                    <span class="fa fa-star unchecked"></span>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Start Child-->
                </div>
                <!--Start Right Section-->
                <div class="col-lg-6">
                    <h5>Start : {{$ride->start_date}}</h5> <span>-</span>
                    <h5 class=" mr-3">{{$ride->start_time}}</h5><i class="fa fa-calendar"></i>
                    <br>
                    <h5>Arrive : {{$ride->arrive_date}}</h5> <span>-</span>
                    <h5 class=" mr-3">{{$ride->arrive_time}}</h5><i class="fa fa-calendar"></i>

                    <div class="row mt-3 ">
                        @if($ride->allowed_music == YES)
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2">
                                <i class="fa fa-music"></i>
                            </div>
                        @else
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2 strikethrough">
                                <i class="fa fa-music"></i>
                            </div>
                        @endif

                        @if($ride->allowed_smoking == YES)
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2">
                                <i class="fa fa-smoking"></i>
                            </div>
                        @else
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2 strikethrough">
                                <i class="fa fa-smoking"></i>
                            </div>
                        @endif
                        @if($ride->allowed_animals == YES)
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2">
                                <i class="fa fa-dog"></i>
                            </div>
                        @else
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2 strikethrough">
                                <i class="fa fa-dog"></i>
                            </div>
                        @endif
                        @if($ride->allowed_food == YES)
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2">
                                <i class="fa fa-hamburger"></i>
                            </div>
                        @else
                            <div class="col-lg-1 col-md-1 col-sm-1 mt-2 strikethrough">
                                <i class="fa fa-hamburger"></i>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="row mt-5">
                        <div class="col-md-5">
                            <h5>{{__('messagesRides.numberOfSeats')}}</h5>
                        </div>
                        <div class="col-md-3">
                            <span class="mr-2" style="font-size: 20px;">{{$ride->number_of_seats}}</span><i class="fas fa-chair"></i>
                        </div>
                        <div class="col-md-5">
                            <h5>{{__('messagesRides.clientCost')}}</h5>
                        </div>
                        <div class="col-md-3">
                            <span class="mr-2" style="font-size: 20px;">{{$ride->client_cost}}</span><i class="fas fa-lira-sign"></i>
                        </div>
                    </div>


                    <hr>
                    <div class="row rightthird">
                        <form method="POST" action=" {{ route('create-booking-ride') }} ">
                            @csrf
                            @auth()
                                <input type="hidden" name="user_id" value="{{Auth()->id()}}">
                                <input type="hidden" name="ride_id" value="{{$ride->id}}">
                                <input type="hidden" name="driver_id" value="{{$car->driver->user_id}}">
                                <input type="hidden" name="user_name" value="{{Auth()->user()->name }}">
                                <input type="hidden" name="ride_name" value="{{$ride->ride_name}}">
                        <div class="col-md-4 mb-3 booking">
                            <button type="submit" class="btn btn-primary ">
                                Booking Ride
                            </button>
                        </div>
                                @endauth
                        </form>
                        <div class="col-md-4 read">
                            <a href="{{route('ride.read.all' , $ride->id)}}"> <button class="btn btn-success ">
                                Read All
                            </button></a>
                        </div>
                    </div>
                </div>
                <!--End Right Section-->
            </div>
        </div>
        <!--End Card Body-->
    </div>
    <!--End MainCard-->
</div>
@endforeach
    @endforeach


















@stop

@section('footer')
    @include('includes.publicFooter')
@stop
