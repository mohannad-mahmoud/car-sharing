@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__("messagesCreateRide.licenseRequest")}}</div>

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
                        <form method="POST" action="{{ route('send.license.request' , Auth()->user()->driver->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{__("messagesLogin.email")}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{__("messagesLogin.password")}}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            Identifier--}}
                            <div class="form-group row">
                                <label for="identifier" class="col-md-4 col-form-label text-md-right">{{__("messagesCreateRide.identifier")}}</label>

                                <div class="col-md-6">
                                    <input id="identifier" type="file" class="form-control @error('identifier') is-invalid @enderror" name="identifier" value="{{ old('identifier') }}" required autocomplete="identifier" autofocus>

                                    @error('identifier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            License--}}
                            <div class="form-group row">
                                <label for="license" class="col-md-4 col-form-label text-md-right">{{__("messagesCreateRide.license")}}</label>

                                <div class="col-md-6">
                                    <input id="license" type="file" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" required autocomplete="license" autofocus>

                                    @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            Insurance--}}
                            <div class="form-group row">
                                <label for="insurance" class="col-md-4 col-form-label text-md-right">{{__("messagesCreateRide.insurance")}}</label>

                                <div class="col-md-6">
                                    <input id="insurance" type="file" class="form-control @error('insurance') is-invalid @enderror" name="insurance" value="{{ old('insurance') }}" required autocomplete="insurance" autofocus>

                                    @error('insurance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__("messagesCreateRide.send")}}
                                    </button>
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
