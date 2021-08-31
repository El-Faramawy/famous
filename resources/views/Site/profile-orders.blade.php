@extends('layouts.site.app')
@section('site_content')

    <content>

        <section class="profilePage">
            <div class="container">

                @include('layouts.site.profileHeader')

                <div class="row">

                    @include('layouts.site.profile_sidebar')

          <div class=" col-md-9 p-2 mt-1">

          @foreach($adses as $ads)
              @if( $ads->package->famous_id == auth()->user()->id && ( $ads->status == 'new' ||  $ads->status == 'accepted') )
                  <div class="order">
              <div class="Company">
                <img class="CompanyLogo" src="{{get_file($ads->user->image)}}">
                <div>
                 @if($ads->user->type == 'client')
                     <h5 class="CompanyName"> {{$ads->user->company_name}}</h5>
                 @elseif($ads->user->type == 'famous')
                        <h5 class="CompanyName"> {{$ads->package->famous->company_name}}</h5>
                 @endif
                     @if($ads->user->type == 'client')
                     <p class="CompanyMail"> <i class="fas fa-envelope"></i> <a href="{{ $ads->email }}"
                      target="_blank"> {{$ads->user->company_email}}</a> </p>
                     @endif
                </div>
              </div>
              <div class="Admin">
                  @if(auth()->user()->type == 'client')
                  <h6 class="AdminName"> <i class="fa fa-user"></i> المسؤل : <span>{{$ads->user->company_person}} </span> </h6>
{{--                  @elseif(auth()->user()->type == 'famous')--}}
{{--                      <h6 class="AdminName"> <i class="fa fa-user"></i> المسؤل : <span>{{$ads->user->company_person}} </span> </h6>--}}
                  @endif

                      <h6 class="AdminPhone"> <i class="fa fa-phone"></i> رقم الهاتف : <span>{{$ads->user->phone}}</span> </h6>
              </div>

              <div class="product">
                <h5 class="productName"> اسم المنتج : <span>{{$ads->title}} </span> </h5>
                <h5 class="productName"> الباقة المختارة : <span style="color:#e1306c"  >{{$ads->package->name}} </span> </h5>
                <div class="productPics row">
                    @foreach($ads->images as $image)
                  <div class="col-lg-3 col-md-4 col-6 p-1 " style="border-radius:15px ">
                          <img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src="{{get_file($image->image)}}" >
                  </div>
                    @endforeach
                </div>
              </div>
                      <form action="{{route('accepted_ads')}}" method="post">
                          @csrf
{{--                        @if(auth()->user()->type == 'famous')--}}
                          <input type="hidden" value="{{$ads->user_id}}" name="client_id">
                          <input type="hidden" value="{{$ads->id}}" name="id">
                          <input type="hidden" value="{{$ads->title}}" name="name">
{{--                          @elseif(auth()->user()->type == 'client')--}}
                          <input type="hidden" value="{{$ads->package-> famous_id}}" name="famous_id">
{{--                          @endif--}}
                          @if(auth()->user()->type == 'famous')
                              <div class="Action">
                                  @if($ads->status == 'new')
                                      <button type="submit" class="btn btn-success" name="status" value="accepted">قبول</button>
                                      <button type="submit" class="btn btn-danger" name="status" value="refused">رفض</button>
                                  @endif
                                  @if($ads->status == 'accepted')
                                          <button type="submit" class="btn btn-primary" name="status" value="ended">انهاء</button>
                                  @endif
                              </div>
                          @endif
                      </form>
            </div>
              @endif
          @endforeach
          </div>
        </div>
      </div>
    </section>

  </content>

@endsection
