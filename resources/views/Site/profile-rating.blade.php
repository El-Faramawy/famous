@extends('layouts.site.app')
@section('rating') active @endsection
@section('site_content')
    <content>
        <section class="profilePage">
            <div class="container">
                @include('layouts.site.profileHeader')
                <div class="row">
                 @include('layouts.site.profile_sidebar')
          <div class=" col-md-9 p-2 mt-1">

            <div class="secondTitle">
              <h5> اخر التقييمات </h5>
                @if(auth()->check())
                    @if(auth()->user()->id != $user->id)
              <a href="#rateForm" class="edit"><i class="fad fa-pencil-alt"></i>
                اكتب تعليقك </a>
                    @endif
                @endif
            </div>

            <ul>
              @foreach($rates as $rate)
              <li class="rate">
                <div class="clintRate">
                  <div class="clintInfo">
                    <img src="{{get_file($rate->user->image)}}">
                    <div class="rating">
                      <h6> {{$rate->user->name}} </h6>
                      <span>
                        @for($i = 0 ; $i < $rate -> rate ;$i++)
                            <i class='fas fa-star'></i>
                        @endfor
                        @for($i = 5 ; $i > $rate -> rate ;$i--)
                            <i class='fas fa-star' style="color: #c6c6c6"></i>
                        @endfor
                      </span>
                    </div>
                  </div>
                  <div class=" date" style="direction: ltr">  {{date_format(new DateTime($rate->date) , 'Y / m / d')}} <i class="far fa-calendar-alt me-2 color2"></i></div>
                </div>

                <p>{{$rate->comment}}</p>
              </li>
              @endforeach
            </ul>

              @if(auth()->check())
                  @if(auth()->user()->id != $user->id)
                      <form class="rateForm" id="rateForm" action="{{route('giveRate')}}" method="POST">
                          @csrf
              <div class="secondTitle">
                <h5> اكتب تعليقك </h5>
                <div class="stars">
                  <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                  <label class="star star-5" for="star-5"></label>

                  <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                  <label class="star star-4" for="star-4"></label>

                  <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                  <label class="star star-3" for="star-3"></label>

                  <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                  <label class="star star-2" for="star-2"></label>

                  <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                  <label class="star star-1" for="star-1"></label>
                </div>
              </div>

              <input type="hidden" name="famous_id" value="{{$user->id}}">
              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

              <textarea class="form-control mb-4" placeholder="اكتب تعليقك" rows="5" name="comment">  </textarea>
              <button type="submit" href="#!" class="animateBTN"> ارسال </button>
            </form>
                  @endif
              @endif

          </div>

        </div>
      </div>
    </section>

  </content>

@endsection
