@extends('layouts.site.app')
@section('PreviousAds') active @endsection
<style>
.dropify-wrapper{
    height: 140px!important;
}
.tab {
overflow: hidden;
border: 1px solid #ccc;
background-color: #fff;
}

/* Style the buttons inside the tab */
.tab button {
background-color: inherit;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 16px;
transition: 0.3s;
font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
background-color: #77B750;
    color: white!important;
}

/* Create an active/current tablink class */
.tab button.active {
background-color: #77B750;
    color: white!important;
}

/* Style the tab content */
.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
}
</style>
@section('site_content')
  <content>
          <section class="profilePage">
              <div class="container">
                  @include('layouts.site.profileHeader')

                  <div class="row">
                      @include('layouts.site.profile_sidebar')
          <div class=" col-md-9 p-2 mt-1">
            <div class="secondTitle">
              <h5> اخر الاعلانات </h5>
                @if(auth()->check())
                    @if(auth()->user()->id == $user->id)
                        <a href="" class="edit" data-toggle="modal" data-target="#uploadAds"><i class="fas fa-plus-hexagon"></i>
                اضافة </a>
                    @endif
                @endif
            </div>

            <div class="PreviousAds">
              <div class="row">
                  @foreach($user->previos_ads as $ad)
                      @if($ad->video != null)
                      <div class=" col-sm-6 p-1">
                  <div class="ADS">
                    <video class="adsVideo" controls loop="loop" muted="muted">
                      <source src="{{asset($ad->video)}}" type="video/mp4">
                    </video>
                    <div class="description">
                      <h6> {{$ad->name}} </h6>
                    </div>
                      <div class="date" style="direction: ltr">
                          @if(auth()->check())
                              @if(auth()->user()->id == $user->id)
                                  <span class="DleteItem delete_element" data_delete="{{url('delete_previousAd')}}"
                                        data_id="{{$ad->id}}" > <i class="fas fa-trash text-danger"></i> </span>
                                  {{date_format(new DateTime($ad->date),'Y / m / d')}}  <i class="far fa-calendar-alt me-2 color2"></i>
                              @endif
                          @endif

                      </div>
                  </div>
                </div>
                      @endif
                  @endforeach
                @foreach($user->previos_ads as $ad)
                  @if($ad->video == null)
                          <div class=" col-sm-6 p-1">
                  <div class="ADS">
                    <iframe src="{{$ad->link}}" title="{{$ad->name}}" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                    <div class="description">
                      <h6> {{$ad->name}} </h6>
                    </div>
                      <div class="date" style="direction: ltr">
                          @if(auth()->check())
                              @if(auth()->user()->id == $user->id)
                                  <span class="DleteItem delete_element" data_delete="{{url('delete_previousAd')}}"
                                  data_id="{{$ad->id}}" > <i class="fas fa-trash text-danger"></i> </span>
                                  {{date_format(new DateTime($ad->date),'Y / m / d')}}  <i class="far fa-calendar-alt me-2 color2"></i>
                              @endif
                          @endif

                      </div>
                  </div>
                </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </content>

  <!-- Modal -->
  <div class="modal fade" id="uploadAds" tabindex="-1" role="dialog" aria-hidden="true">
   <form action="{{route('create-PreviousAds')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> بيانات الاعلان </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6 class="text-center mb-4"> من فضلك ادخل بيانات المنتج الذي تم الاعلان عنه </h6>

          <div class="form-outline">
            <input type="text" class="form-control" required name="name" />
            <label class="form-label"> اسم الاعلان </label>
          </div>
            <div class="form-outline">
                <input type="date" class="form-control date " required name="date">
                <label class="form-label"> تاريخ الاعلان </label>
            </div>
            <p>المنتج المعلن عنه</p>
            <div class="tab">
                <button class="tablinks" type="button"  style="color: #777777" onclick="openCity(event, 'productImg')">رفع فيديو</button>
                <button class="tablinks active" type="button"  style="color: #777777" onclick="openCity(event, 'videoLink')">رابط يوتيوب</button>
            </div>
            <div class="productImg tabcontent" id="productImg">
                <label> <i class="fas fa-video"></i> فيديو الاعلان</label>
                <input type="file" class="dropify" name="video"/>
            </div>
            <div class="videoLink tabcontent" id="videoLink" style="display: block">
                <label  style="color: #77B750;margin-bottom: 10px "> <i class="fab fa-youtube"></i> رابط الفيديو</label>
                <textarea class="form-control" placeholder="انسخ رابط الفيديو" name="link" style="height: 149px"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success"> نشر </button>
        </div>
      </div>
    </div>
   </form>
  </div>

@endsection
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

