@extends('layouts.master')


@section('header')
    @include('includes.publicHeader')

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messagesRegister.register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf
                        {{-- Name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Profile --}}
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.profile') }}</label>

                            <div class="col-md-6">
                                <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{ old('profile') }}" autocomplete="profile">

                                @error('profile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Facebook --}}
                        <div class="form-group row">
                            <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.facebook') }}</label>

                            <div class="col-md-6">
                                <input id="facebook" placeholder="{{__('messagesRegister.notRequired')}}" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" autocomplete="facebook">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password  --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.confirmPassword') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- mobile  --}}
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror"
                                    name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- gender --}}
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.gender') }}</label>

                            <div class="col-md-6">
{{--                                <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror"--}}
{{--                                    name="gender" value="{{ old('gender') }}" required autocomplete="gender">--}}

                                <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror"
                                        name="gender" value="{{ old('gender') }}" required autocomplete="gender">
                                    <option value="male">{{__('messagesRegister.male')}}</option>
                                    <option value="female">{{__('messagesRegister.female')}}</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- birthday --}}
                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                                    name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- user_type  --}}
                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.userType') }}</label>

                            <div class="col-md-6">
{{--                                <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror"--}}
{{--                                     name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type">--}}
                                <select id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror"
                                        name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type">
                                    <option value="driver">{{__('messagesRegister.driver')}}</option>
                                    <option value="client">{{__('messagesRegister.client')}}</option>
                                </select>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        {{-- about  --}}
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('messagesRegister.about') }}</label>

                            <div class="col-md-6">
                                <textarea id="about" placeholder="{{__('messagesRegister.notRequired')}}" type="text" class="form-control @error('about') is-invalid @enderror"
                                          name="about" value="{{ old('about') }}"  autocomplete="about"></textarea>

                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <small><a href="{{route('our-terms')}}">By clicking on Register you agree on our terms and conditions</small></a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messagesRegister.register') }}
                                </button>
                            </div>
                            <br><br>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('login')}}">
                                    {{ __('messagesRegister.alreadyHaveAccount') }}
                                </a>
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
