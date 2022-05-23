@extends('layouts.master')


@section('header')
    @include('includes.publicHeader')

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('messagesCreateRide.updateRide')}}</div>

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

                        <form method="POST" action=" {{ route('update.driver.ride' , $ride->id) }} ">
                            @csrf

                            {{--                        <input hidden name="driver_id" value = "{{Auth::user()->id }}">--}}

                            {{-- Ride Name --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.setRideName')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" type="text" class="form-control" name="ride_name" value="{{$ride->ride_name}}">
                                </div>
                            </div>

                            {{-- Select Your Car --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.selectYourCar')}}</label>

                                <div class="col-md-6">
                                    <select name="car_id" class="form-control" value="{{$ride->car_id}}">
                                        @foreach($cars as $car)
                                            <option value="{{$car->id}}">{{$car->model}}--{{$car->color}}--{{$car->make_year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Source City --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.sourceCity')}}</label>

                                <div class="col-md-6">
                                    <select name="source_city_id" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                @if($city->id == $ride->source_city_id) selected @endif>
                                                    {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Enroute City --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.enrouteCity')}}</label>

                                <div class="col-md-6">
                                    <select name="enroute_city_id" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                @if($city->id == $ride->enroute_city_id) selected @endif>
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Destination City --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.destinationCity')}}</label>

                                <div class="col-md-6">
                                    <select name="destination_city_id" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                @if($city->id == $ride->destination_city_id) selected @endif>
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            {{-- Number Of Empty Seats --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.numberOfEmptySeats')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$ride->number_of_seats}}" type="number" class="form-control" name="number_of_seats">
                                </div>
                            </div>

                            {{-- Client Cost --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.clientCost')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$ride->client_cost}}" type="number" class="form-control" name="client_cost">
                                </div>
                            </div>

                            {{-- Smoking Allowd --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.smokingAllow')}}</label>
                                <div class="col-md-6">
                                    <input value = '1' type="radio" name="allowed_smoking"
                                        @if($ride->allowed_smoking == YES) checked @endif>{{__('messagesCreateRide.yes')}}
                                    <br>
                                    <input value="0" type="radio" name="allowed_smoking"
                                        @if($ride->allowed_smoking == NO) checked @endif>{{__('messagesCreateRide.no')}}
                                </div>
                            </div>

                            {{-- music Allowd --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.musicAllow')}}</label>
                                <div class="col-md-6">
                                    <input value = '1' type="radio" class="" name="allowed_music"
                                           @if($ride->allowed_music == YES) checked @endif>{{__('messagesCreateRide.yes')}}
                                    <br>
                                    <input value="0" type="radio" class="" name="allowed_music"
                                           @if($ride->allowed_smoking == NO) checked @endif>{{__('messagesCreateRide.no')}}
                                </div>
                            </div>

                            {{-- Animals Allowd --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.animalsAllow')}}</label>
                                <div class="col-md-6">
                                    <input value = '1' type="radio" class="" name="allowed_animals"
                                           @if($ride->allowed_animals == YES) checked @endif>{{__('messagesCreateRide.yes')}}
                                    <br>
                                    <input value="0" type="radio" class="" name="allowed_animals"
                                           @if($ride->allowed_animals == NO) checked @endif>{{__('messagesCreateRide.no')}}
                                </div>
                            </div>

                            {{-- Food Allowd --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.foodAllow')}}</label>
                                <div class="col-md-6">
                                    <input value = '1' type="radio" class="" name="allowed_food"
                                           @if($ride->allowed_food == YES) checked @endif>{{__('messagesCreateRide.yes')}}
                                    <br>
                                    <input value="0" type="radio" class="" name="allowed_food"
                                           @if($ride->allowed_food == NO) checked @endif>{{__('messagesCreateRide.no')}}
                                </div>
                            </div>

                            {{-- Start date --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.startDate')}}</label>

                                <div class="col-md-6">
                                    <input id="start-date" value="{{$ride->start_date}}" type="date" class="form-control" name="start_date">
                                </div>
                            </div>

                            {{-- Start time --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.startTime')}}</label>

                                <div class="col-md-6">
                                    <input id="start-time" value="{{$ride->start_time}}" type="time" class="form-control" name="start_time">
                                </div>
                            </div>

                            {{-- Arrive Date --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.arriveDate')}}</label>

                                <div class="col-md-6">
                                    <input id="arrive-date" value="{{$ride->arrive_date}}" type="date" class="form-control" name="arrive_date">
                                </div>
                            </div>

                            {{-- Arrive Time --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.arriveTime')}}</label>

                                <div class="col-md-6">
                                    <input id="arrive-time" value="{{$ride->arrive_time}}" type="time" class="form-control" name="arrive_time">
                                </div>
                            </div>


                            {{-- Ride Status --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesCreateRide.rideStatus')}}</label>
                                <div class="col-md-6">
                                    <input value = '1' type="radio" class="" name="ride_status"
                                           @if($ride->ride_status == RIDE_IS_ACTIVE) checked @endif>{{__('messagesCreateRide.active')}}
                                    <br>
                                    <input value="0" type="radio" class="" name="ride_status"
                                           @if($ride->ride_status == RIDE_NOT_ACTIVE) checked @endif>{{__('messagesCreateRide.notActive')}}
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('messagesCreateRide.updateRide')}}
                                    </button>

                                    <a href="{{route('show.driver.rides' , $car->driver_id)}}"><button type="button" class="btn btn-dark">
                                            {{__('messagesCreateRide.showRides')}}
                                    </button></a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.publicFooter')
@stop
