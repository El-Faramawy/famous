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
              <a class="active" href="{{url('profile-rating')}}"> <i class="fas fa-star me-2"></i>  التقييمات  </a>
              <a href="{{url('profile-Notifications')}}"> <i class="fas fa-bell me-2"></i> الاشعارات </a>
              <a href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
              <a href="{{url('login')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
            </div>
          </div>

          <div class=" col-md-9 p-2 mt-1">

            <div class="secondTitle">
              <h5> اخر التقييمات </h5>
              <a href="#rateForm" class="edit"><i class="fad fa-pencil-alt"></i>
                اكتب تعليقك </a>
            </div>

            <ul>
              <li class="rate">
                <div class="clintRate">
                  <div class="clintInfo">
                    <img src="{{url('site')}}/img/Users/3.jpg">
                    <div class="rating">
                      <h6> محمد جمال النجار </h6>
                      <span>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                      </span>
                    </div>
                  </div>
                  <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                </div>

                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolorum explicabo minima
                  perferendis accusamus voluptatibus, quis provident sapiente debitis exercitationem sit est dignissimos
                  nesciunt vero nobis, ratione illum consequatur. Tempore! </p>
              </li>

              <li class="rate">
                <div class="clintRate">
                  <div class="clintInfo">
                    <img src="{{url('site')}}/img/Users/3.jpg">
                    <div class="rating">
                      <h6> محمد جمال النجار </h6>
                      <span>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                      </span>
                    </div>
                  </div>
                  <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                </div>

                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolorum explicabo minima
                  perferendis accusamus voluptatibus, quis provident sapiente debitis exercitationem sit est dignissimos
                  nesciunt vero nobis, ratione illum consequatur. Tempore! </p>
              </li>

              <li class="rate">
                <div class="clintRate">
                  <div class="clintInfo">
                    <img src="{{url('site')}}/img/Users/3.jpg">
                    <div class="rating">
                      <h6> محمد جمال النجار </h6>
                      <span>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                      </span>
                    </div>
                  </div>
                  <div class=" date"> <i class="far fa-calendar-alt me-2 color2"></i> 10 / 10 / 2021 </div>
                </div>

                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolorum explicabo minima
                  perferendis accusamus voluptatibus, quis provident sapiente debitis exercitationem sit est dignissimos
                  nesciunt vero nobis, ratione illum consequatur. Tempore! </p>
              </li>

            </ul>


            <form class="rateForm" id="rateForm">


              <div class="secondTitle">
                <h5> اكتب تعليقك </h5>
                <div class="stars">
                  <input class="star star-5" id="star-5" type="radio" name="star" />
                  <label class="star star-5" for="star-5"></label>

                  <input class="star star-4" id="star-4" type="radio" name="star" />
                  <label class="star star-4" for="star-4"></label>

                  <input class="star star-3" id="star-3" type="radio" name="star" />
                  <label class="star star-3" for="star-3"></label>

                  <input class="star star-2" id="star-2" type="radio" name="star" />
                  <label class="star star-2" for="star-2"></label>

                  <input class="star star-1" id="star-1" type="radio" name="star" />
                  <label class="star star-1" for="star-1"></label>
                </div>
              </div>

              <textarea class="form-control mb-4" placeholder="اكتب تعليقك" rows="5">  </textarea>
              <button type="submit" href="#!" class="animateBTN"> ارسال </button>

            </form>

          </div>

        </div>
      </div>
    </section>

  </content>

@endsection
