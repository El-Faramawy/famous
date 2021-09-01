@extends('layouts.site.app')
@section('notification') active @endsection
@section('site_content')

    <content>

        <section class="profilePage">
            <div class="container">

                @include('layouts.site.profileHeader')

                <div class="row">

                    @include('layouts.site.profile_sidebar')
          <div class=" col-md-9 p-2 mt-1">
             @if(auth()->user()->type == 'famous')

               @foreach($notifications as $notification)
                  <div class="notifications">

              <div class="notification">
                <a href="#">
                    @if($notification->client_id != null)
                      <h6> {{$notification->user->company_name}} </h6>
                    @endif

                    <p>
                      {{$notification->message}}
                  </p>
                </a>
                <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i>
                    {{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d')}}
                </div>
              </div>
           <form action="{{route('delete_notification')}}" method="post">
               @csrf
               <span class="closeIcon">  <button style="border:none; background: transparent" type="submit" name="id" value="{{$notification->id}}"><i class="fas fa-times"></i></button></span>
           </form>
            </div>
              @endforeach

              @elseif(auth()->user()->type == 'client')

               @foreach($notifications_client as $notification)
                  <div class="notifications">

              <img src="{{$notification->famous->image}}">

                      <div class="notification">
                <a>
                  <h6> {{$notification->famous->name}} </h6>
                  <p>
                      {{$notification->message}}
                  </p>
                </a>
                <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i>
                    {{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d')}}
                </div>
              </div>
           <form action="{{route('delete_notification')}}" method="post">
               @csrf
               <span class="closeIcon">  <button style="border:none; background: transparent" type="submit" name="id" value="{{$notification->id}}"><i class="fas fa-times"></i></button></span>
           </form>
            </div>
              @endforeach

                @endif
          </div>
        </div>
      </div>
    </section>

  </content>

@endsection
