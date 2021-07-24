@extends('layouts.site.app')
@section('site_content')
  <content>

    <section class="profilePage">
      <div class="container">
        <div class=" profileHeader ">
          <div class="UserInfo">
            <div class="UserImg">
              <img src="{{url('site')}}/img/Users/16.jpg">
            </div>
            <div class="Info">
                            <h5> خالد سلطان  <span class="Vip"> <i class="fas fa-medal"></i> </span> </h5>
              <div class="d-md-flex align-items-center">
                <h6> فنان </h6>
                <div class="rating">
                  <span>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                  </span>
                  <span class="count"> من : ( 140 ) زائر </span>
                </div>
              </div>

            </div>
          </div>
          <div class="social">
            <a href="#!" class="icon" style="background-color: #4267B2;"> <i class="fab fa-facebook"></i> </a>
            <a href="#!" class="icon" style="background-color: #E1306C;"> <i class="fab fa-instagram"></i> </a>
            <a href="#!" class="icon" style="background-color: #1DA1F2;"> <i class="fab fa-twitter"></i> </a>
            <a href="#!" class="icon" style="background-color: #FF0000;"> <i class="fab fa-youtube"></i> </a>
            <a href="#!" class="icon" style="background-color: #FFFC00;"> <i class="fab fa-snapchat-ghost"></i> </a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 p-1">
            <div class="profileNavCol">
              <a href="{{url('profile')}}"> <i class="fas fa-user me-2"></i> البروفايل </a>
              <a class="active" href="{{url('profile-PreviousAds')}}"> <i class="fad fa-play me-2"></i> الاعلانات السابقة </a>
              <a href="{{url('profile-orders')}}"> <i class="fad fa-box-check me-2"></i> طلبات الاعلانات </a>
              <a href="{{url('profile-rating')}}"> <i class="fas fa-star me-2"></i>  التقييمات  </a>
              <a href="{{url('profile-Notifications')}}"> <i class="fas fa-bell me-2"></i> الاشعارات </a>
              <a href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
              <a href="{{url('login')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
            </div>
          </div>

          <div class=" col-md-9 p-2 mt-1">

            <div class="secondTitle">
              <h5> اخر الاعلانات </h5>
              <a href="#!" class="edit" data-toggle="modal" data-target="#uploadAds"><i class="fas fa-plus-hexagon"></i>
                اضافة </a>
            </div>

            <div class="PreviousAds">
              <div class="row">
                <div class=" col-sm-6 p-1">
                  <div class="ADS">
                    <video class="adsVideo" controls loop="loop" muted="muted">
                      <source src="{{url('site')}}/video/video.mp4" type="video/mp4">
                    </video>
                    <div class="description">
                      <h6> اعلان لشركة بيبسي </h6>
                    </div>
                    <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                  </div>
                </div>
                <div class=" col-sm-6 p-1">
                  <div class="ADS">
                    <iframe src="https://www.youtube.com/embed/kQxpGPINlvQ" title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                    <div class="description">
                      <h6> اعلان لشركة ليز </h6>
                    </div>
                    <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                  </div>
                </div>
                <div class=" col-sm-6 p-1">
                  <div class="ADS">
                    <video class="adsVideo" controls loop="loop" muted="muted">
                      <source src="{{url('site')}}/video/video.mp4" type="video/mp4">
                    </video>
                    <div class="description">
                      <h6> اعلان لشركة بيبسي </h6>
                    </div>
                    <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                  </div>
                </div>
                <div class=" col-sm-6 p-1">
                  <div class="ADS">
                    <iframe src="https://www.youtube.com/embed/kQxpGPINlvQ" title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                    <div class="description">
                      <h6> اعلان لشركة ليز </h6>
                    </div>
                    <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </section>

  </content>



  <!-- Modal -->
  <div class="modal fade" id="uploadAds" tabindex="-1" role="dialog" aria-hidden="true">
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

          <div class="form-outline ">
            <input type=" text" class="form-control" />
            <label class="form-label"> اسم الاعلان </label>
          </div>

          <div class="productImg">
            <label> <i class="fas fa-video"></i> فديو الاعلان</label>
            <input type="file" class="dropify" />
          </div>

          <div class="videoLink">
            <input type="text" class="form-control" placeholder="أو ضع رابط اليوتيوب ">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"> نشر </button>
        </div>
      </div>
    </div>
  </div>

@endsection
