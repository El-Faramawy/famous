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
              <a class="active" href="{{url('profile-orders')}}"> <i class="fad fa-box-check me-2"></i> طلبات الاعلانات </a>
              <a href="{{url('profile-rating')}}"> <i class="fas fa-star me-2"></i> التقييمات </a>
              <a href="{{url('profile-Notifications')}}"> <i class="fas fa-bell me-2"></i> الاشعارات </a>
              <a href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
              <a href="{{url('login')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
            </div>
          </div>

          <div class=" col-md-9 p-2 mt-1">

            <div class="order">
              <div class="Company">
                <img class="CompanyLogo" src="{{url('site')}}/img/Pepsi.png">
                <div>
                  <h5 class="CompanyName"> شركة بيبسي </h5>
                  <p class="CompanyMail"> <i class="fas fa-envelope"></i> <a href="mailto:mail@mail.com "
                      target="_blank"> mail@mail.com </a> </p>
                </div>
              </div>
              <div class="Admin">
                <h6 class="AdminName"> <i class="fa fa-user"></i> المسؤل : <span> تامر محمد </span> </h6>
                <h6 class="AdminPhone"> <i class="fa fa-phone"></i> رقم الهاتف : <span> 0123456789</span> </h6>
              </div>

              <div class="product">
                <h5 class="productName"> اسم المنتج : <span> بيبسي كانز الجدبد </span> </h5>
                <div class="productPics row">
                  <div class="col-lg-3 col-md-4 col-6 p-1 ">
                    <img src="{{url('site')}}/img/p1.png">
                  </div>
                  <div class="col-lg-3 col-md-4 col-6 p-1 ">
                    <img src="{{url('site')}}/img/p2.png">
                  </div>
                  <div class="col-lg-3 col-md-4 col-6 p-1 ">
                    <img src="{{url('site')}}/img/p3.png">
                  </div>
                  <div class="col-lg-3 col-md-4 col-6 p-1 ">
                    <img src="{{url('site')}}/img/p4.png">
                  </div>

                </div>
              </div>
              <div class="Action">
                <button class="btn btn-success"> قبول </button>
                <button class="btn btn-danger"> رفض </button>
              </div>


            </div>

          </div>
        </div>
      </div>
    </section>

  </content>

@endsection
