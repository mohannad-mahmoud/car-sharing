@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop

@section('content')

    @foreach($data as $d)
        <a href="{{route('user.info' , $d->id)}}">{{$d->name}}</a><br>
    @endforeach
@stop

@section('footer')
    @include('includes.publicFooter')
@stop
