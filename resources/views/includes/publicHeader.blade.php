@include('includes.publicCss')
<head>
    <style>
        body{
            background-image : url("{{asset("assets/img/empty-road.jpg")}}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 0.85;
        }

    </style>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href=" {{URL::route('home')}} ">{{__("messagesHeader.home")}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href=" {{URL::route('drivers')}} ">{{__("messagesHeader.drivers")}}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href=" {{URL::route('rides')}} ">{{__("messagesHeader.rides")}}</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{__("messagesHeader.language")}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a class="dropdown-item" hreflang=" {{$localeCode}} "
                      href=" {{LaravelLocalization::getLocalizedURL($localeCode , null , [] , true)}} ">
                      {{ $properties['native'] }}
                  </a>
                @endforeach
                {{-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a> --}}
              </div>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
          </ul>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">{{__("messagesHeader.login")}}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">{{__("messagesHeader.register")}}</a>
                        </li>
                    @endif
                @else
                    @if(\App\Helper\ModelsHelper::number_of_unread_notifications() > 0)
                        <a class="nav-link text-danger" href="{{route('show.notifications' , Auth()->id())}}">
                            <i class="nav-item fa fa-2x fa-bell"></i> {{\App\Helper\ModelsHelper::number_of_unread_notifications()}}</a>
                        @else
                    <a class="nav-link text-primary" href="{{route('show.notifications' , Auth()->id())}}">
                        <i class="nav-item fa fa-bell"></i>0</a>
                    @endif
                        @if(Auth::user()->profile == null)
                            <img src="{{asset('assets/img/default.jpg')}}" alt="" width="40" height="40" class="rounded-circle">
                        @else
                            <img src="{{asset('assets/img/profile/' . Auth::user()->profile)}}" alt="" width="40" height="40" class="rounded-circle">
                        @endif


                    <li class="nav-item active dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                              {{__("messagesHeader.logout")}}
                       </a>
                       <a class="dropdown-item" href="{{ route('updateAccount' , Auth::user()->id) }}" >
                           {{ __('messagesHeader.updateAccount') }}
                        </a>

                        {{--  if user is auth and driver  --}}

                        @if(\App\Helper\Helper::isThisUserDriver())
                            <a class="dropdown-item" href="{{ route('createRideIndex' , Auth::user()->driver->id) }}" >
                                {{__("messagesHeader.createRide")}}
                            </a>
                            <a class="dropdown-item" href="{{ route('show.driver.rides' , Auth::user()->driver->id) }}" >
                                {{__("messagesHeader.showRides")}}
                            </a>
                         @endif

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
          <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get" >
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="{{__("messagesHeader.search")}}" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__("messagesHeader.search")}}</button>
          </form>
        </div>

      </nav>
</header>
