@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop

@section('content')
    <table class="table table-bordered"  style="text-align: center">
        <div class="table-secondary">{{__('messagesDrivers.driverName')}} : {{$driver->user->name}}</div>
        <thead class="table-dark">
        <tr>
            <th scope="col">{{__('messagesAddCar.carModel')}}</th>
            <th scope="col">{{__('messagesAddCar.color')}}</th>
            <th scope="col">{{__('messagesAddCar.carMaker')}}</th>
            <th scope="col">{{__('messagesAddCar.yearMake')}}</th>
            <th scope="col">{{__('messagesAddCar.maxNumberOfSeats')}}</th>
            <th scope="col">{{__('messagesAddCar.edit')}}</th>
            <th scope="col">{{__('messagesAddCar.remove')}}</th>

        </tr>
        </thead>

        <tbody>
            @foreach($driver->cars as $car)
                <tr>
                    <td>{{$car->model}}</td>
                    <td>{{$car->color}}</td>
                    <td>{{$car->maker}}</td>
                    <td>{{$car->make_year}}</td>
                    <td>{{$car->max_of_seats}}</td>
                    <td><a href="{{route('edit.driver.car' , $car->id)}}"><button class="btn-success">{{__('messagesAddCar.edit')}}</button></a></td>
                    <td><a href="{{route('delete.driver.car' , $car->id)}}"><button
                                onclick="confirm('Are you sure you want to Delete this car ?')"
                                class="btn-danger">{{__('messagesAddCar.remove')}}</button></a></td>

                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('footer')
    @include('includes.publicFooter')
@stop
