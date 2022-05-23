@extends('layouts.master')


@section('header')
    @include('includes.publicHeader')

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('messagesAddCar.updateCar')}}</div>

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

                        <form method="POST" action=" {{ route('update.driver.car' , $car->id) }} " enctype="multipart/form-data">
                            @csrf


                            {{-- Car Maker --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesAddCar.carMaker')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$car->maker}}" type="text" class="form-control" name="maker">
                                </div>
                            </div>

                            {{-- Car Model --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" >{{__('messagesAddCar.carModel')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$car->model}}" type="text" class="form-control" name="model">
                                </div>
                            </div>

                            {{-- Car Type --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesAddCar.carType')}}</label>

                                <div class="col-md-6">
                                    <select name="car_type" class="form-control">
                                        <option value="touring" @if($car->car_type=='touring') selected @endif>{{__('messagesAddCar.touring')}}</option>
                                        <option value="pick_up" @if($car->car_type=='pick_up') selected @endif>{{__('messagesAddCar.pickUp')}}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Color --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesAddCar.color')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$car->color}}"  type="text" class="form-control" name="color">
                                </div>
                            </div>


                            {{-- Max Of Seats --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesAddCar.maxNumberOfSeats')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$car->max_of_seats}}" type="number" class="form-control" name="max_of_seats">
                                </div>
                            </div>

                            {{-- make year --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesAddCar.yearMake')}}</label>

                                <div class="col-md-6">
                                    <input id="number-of-clients" value="{{$car->make_year}}" type="text" class="form-control" name="make_year">
                                </div>
                            </div>

                            {{-- Car image --}}
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('messagesAddCar.image')}}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('messagesAddCar.updateCar')}}
                                    </button>
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
