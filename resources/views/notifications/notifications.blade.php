@extends('layouts.master')

@section('header')
    @include('includes.publicHeader')
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('messagesNotifications.notifications')}}</div>

                    <div class="card-body">
                        <form method="GET" action=" ">
                            @csrf
                            <table class="table table-bordered"  style="text-align: center">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">{{__('messagesNotifications.unSeenMessages')}}</th>
                                    @if(\App\Helper\Helper::isThisUserDriver() )
                                        <th scope="col">{{__('messagesNotifications.acceptRequest')}}</th>
                                        <th scope="col">{{__('messagesNotifications.rejectRequest')}}</th>
                                    @endif

                                </tr>
                                </thead>
                                @foreach($notifications_unseen as $notification)
                                    <tr>
                                        <td>{{$notification -> message}}  <sup><small>received at {{$notification->created_at}}</small></sup> </td>
                                        @if(\App\Helper\Helper::isThisUserDriver() && App\Helper\Helper::checkRideBelongsToDriver($notification->ride_id))
                                            @if(collect($notification)['ride_requests']['request_status'] != '1')
                                                <td><a href="{{route('accept.ride.request' , $notification->ride_request_id)}}"><button type="button">Accept</button></a></td>
                                            @else
                                                <td><a><button disabled>{{__('messagesNotifications.accept')}}</button></a></td>
                                            @endif

                                            @if(collect($notification)['ride_requests']['request_status'] != '-1')
                                                <td><a href="{{route('reject.ride.request' , $notification->ride_request_id)}}"><button type="button" class="btn-danger">Reject</button></a></td>
                                            @else
                                                <td><a><button disabled>{{__('messagesNotifications.reject')}}</button></a></td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                            <br>
                            <table class="table table-bordered"  style="text-align: center">
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col">Seen Messages</th>
                                    @if(\App\Helper\Helper::isThisUserDriver() )
                                        <th scope="col">Accept Request</th>
                                        <th scope="col">Reject Request</th>
                                    @endif

                                </tr>
                                </thead>
                                @foreach($notifications_seen as $notification)
                                    <tr>
                                        <td><a href="{{route('user.info' , $notification->sender_user_id)}}">{{$notification -> message}}</a>  <sup><small>received at {{$notification->created_at}}</small></sup> </td>
                                        @if(\App\Helper\Helper::isThisUserDriver() && App\Helper\Helper::checkRideBelongsToDriver($notification->ride_id))
                                            @if(collect($notification)['ride_requests']['request_status'] != '1')
                                                <td><a href="{{route('accept.ride.request' , $notification->ride_request_id)}}"><button type="button">Accept</button></a></td>
                                            @else
                                                <td><a><button disabled>Accept</button></a></td>
                                            @endif

                                            @if(collect($notification)['ride_requests']['request_status'] != '-1')
                                                <td><a href="{{route('reject.ride.request' , $notification->ride_request_id)}}"><button type="button" class="btn-danger">Reject</button></a></td>
                                            @else
                                                <td><a><button disabled>Reject</button></a></td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
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
