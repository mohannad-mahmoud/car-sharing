@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('messagesReadAll.rideInfo')}}
                        @if($car->driver->driver_license == null)
                            <spam class="bg-danger text-white-75">{{__('messagesReadAll.driverNotLicensed')}}</spam>
                        @endif
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger" role="success">
                                {{Session::get('error')}}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action=" {{ route('create-booking-ride') }} ">
                            @csrf
                            @auth()
                            <input type="hidden" name="ride_id" value="{{$ride->id}}">
                            <input type="hidden" name="user_id" value="{{Auth()->id()}}">
                            <input type="hidden" name="driver_id" value="{{$driver->id}}">
                            <input type="hidden" name="user_name" value="{{$user->name }}">
                            <input type="hidden" name="ride_name" value="{{$ride->ride_name}}">
                            @endauth
{{--                            Ride Name--}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.rideName')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" > {{$ride->ride_name}}</label>
                                </div>
                            </div>


                            {{--  Driver Name--}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.driverName')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" > {{$driver->name}}</label>
                                </div>
                            </div>

                            {{--  Car Details --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.carDetails')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" > model: {{$car->model}}, color : {{$car->color}}</label>
                                </div>
                            </div>

                            {{--  Number of Seats --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.numberOfSeats')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" > {{$ride->number_of_seats}} </label>
                                </div>
                            </div>

                            {{--  From City --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.from')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$city[$ride->source_city_id]->name}}</label>
                                </div>
                            </div>

                            {{--  Destintation City --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.to')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$city[$ride->destination_city_id]->name}}</label>
                                </div>
                            </div>

                            {{--  Enroute City --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.middCity')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$city[$ride->enroute_city_id]->name}}</label>
                                </div>
                            </div>

                            {{--  Allowed Smoking --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.isSmokingAllow')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$ride->allowed_smoking}}</label>
                                </div>
                            </div>

                            {{--  Allowed Music --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.isMusicAllow')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$ride->allowed_music}}</label>
                                </div>
                            </div>

                            {{--  Allowed Animals --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.isAnimalsAllow')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$ride->allowed_animals}}</label>
                                </div>
                            </div>

                            {{--  Ride Start --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.start')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$ride->start_date}} at {{$ride->start_time}}</label>
                                </div>
                            </div>

                            {{--  Ride Arrive --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.arrive')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" class="form-control" >{{$ride->arrive_date}} at {{$ride->arrive_time}}</label>
                                </div>
                            </div>

                            {{--  Ride State --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesReadAll.rideStatus')}}</label>

                                <div class="col-md-6">
                                    <label id="number-of-clients" style="background-color: {{$active_color}}" class="form-control">{{$ride->ride_status}}</label>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    @if(App\Helper\Helper::isCurrentDriverId($car->driver_id))
                                        <a href="{{route('edit.driver.ride' , $ride->id)}}"><button class="btn btn-primary" type="button" class="alert-secondary">{{__('messagesReadAll.edit')}}</button></a>
                                    @endif
                                    @if($ride->ride_status == __('messagesGlobal.rideNotActive'))
                                        <button type="submit" class="btn btn-primary" disabled>
                                            {{__('messagesReadAll.bookingRide')}}
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary">
                                            {{__('messagesReadAll.bookingRide')}}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('includes.publicFooter')
@stop
