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
              <a href="{{url('profile-PreviousAds')}}"> <i class="fad fa-play me-2"></i> الاعلانات السابقة </a>
              <a href="{{url('profile-orders')}}"> <i class="fad fa-box-check me-2"></i> طلبات الاعلانات </a>
              <a href="{{url('profile-rating')}}"> <i class="fas fa-star me-2"></i>  التقييمات  </a>
              <a class="active" href="{{url('profile-Notifications')}}"> <i class="fas fa-bell me-2"></i> الاشعارات </a>
              <a href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
              <a href="{{url('login')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
            </div>
          </div>

          <div class=" col-md-9 p-2 mt-1">


            <div class="notifications">
              <img src="{{url('site')}}/img/Users/15.jpg">
              <div class="notification">
                <a href="#">
                  <h6> هشام ابراهيم </h6>
                  <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium, ea in
                    asperiores consectetur minus autem error officiis sequi, omnis beatae sapiente ut similique,
                    deserunt non dolor commodi. Temporibus, fugiat. </p>
                </a>
                <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
              </div>
              <span class="closeIcon"><i class="fas fa-times"></i></span>
            </div>

            <div class="notifications">
              <img src="{{url('site')}}/img/Users/15.jpg">
              <div class="notification">
                <a href="#">
                  <h6> هشام ابراهيم </h6>
                  <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium, ea in
                    asperiores consectetur minus autem error officiis sequi, omnis beatae sapiente ut similique,
                    deserunt non dolor commodi. Temporibus, fugiat. </p>
                </a>
                <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
              </div>
              <span class="closeIcon"><i class="fas fa-times"></i></span>
            </div>

            <div class="notifications">
              <img src="{{url('site')}}/img/Users/15.jpg">
              <div class="notification">
                <a href="#">
                  <h6> هشام ابراهيم </h6>
                  <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis accusantium, ea in
                    asperiores consectetur minus autem error officiis sequi, omnis beatae sapiente ut similique,
                    deserunt non dolor commodi. Temporibus, fugiat. </p>
                </a>
                <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
              </div>
              <span class="closeIcon"><i class="fas fa-times"></i></span>
            </div>

          </div>
        </div>
      </div>
    </section>

  </content>

@endsection
