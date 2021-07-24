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
              <h5> خالد سلطان <span class="Vip"> <i class="fas fa-medal"></i> </span> </h5>
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
              <a href="{{url('profile-rating')}}"> <i class="fas fa-star me-2"></i> التقييمات </a>
              <a href="{{url('profile-Notifications')}}"> <i class="fas fa-bell me-2"></i> الاشعارات </a>
              <a class="active" href="{{url('profile-edit')}}"><i class="fas fa-cog me-2"></i> تعديل </a>
              <a href="{{url('login')}}"><i class="fas fa-sign-out-alt me-2"></i> خروج </a>
            </div>
          </div>

          <div class=" col-md-9 p-2 mt-1">

            <div class="Wizzard">
              <div class="Stepper">
                <!-- Stepper -->
                <div class="steps-form">
                  <div class="steps-row setup-panel">
                    <div class="steps-step">
                      <a href="#step-1" type="button" class="btn btn-indigo"> 1 </a>
                    </div>
                    <div class="steps-step">
                      <a href="#step-2" type="button" class="btn btn-default" disabled="disabled"> 2 </a>
                    </div>
                  </div>
                </div>
                <form action="{{url('code')}}">
                  <!--  Step 1 -->
                  <div class="setup-content" id="step-1">
                    <div class="row">

                      <div class=" col-md-12 d-flex align-items-center p-1">
                        <div class="row">
                          <div class="col-md-12 p-2">
                            <input type="file" class="dropify" data-default-file="img/user.png" data-toggle="tooltip" title=" الصورة الشخصية "/>
                          </div>
                          <div class="col-md-6 p-2">
                            <div class="form-outline ">
                              <input type="text" class="form-control" />
                              <label class="form-label"> اسم المشهور </label>
                            </div>
                          </div>

                          <div class="col-md-6 p-2">
                            <div class="form-outline ">
                              <input type="number" class="form-control" />
                              <label class="form-label"> رقم الهاتف </label>
                            </div>
                          </div>
                          <div class="col-md-12 p-2">
                            <div class="form-group position-relative">
                              <select class=" select2 ">
                                <option selected disabled> التصنيف </option>
                                <option> فنان </option>
                                <option> استريمير </option>
                                <option> يوتيوبر </option>
                                <option> متنوع </option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                      <button class="btn btn-indigo btn-rounded nextBtn " type="button">
                        التالي</button>
                    </div>
                  </div>
                  <!--  Step 5 -->
                  <div class="setup-content" id="step-2">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="facebook" />
                      <label class="form-check-label addSocial" for="facebook">
                        <span class="icon" style="background-color: #4267B2;"> <i class="fab fa-facebook"></i> </span>
                        <input class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="instagram" />
                      <label class="form-check-label addSocial" for="instagram">
                        <span class="icon" style="background-color: #E1306C;"> <i class="fab fa-instagram"></i> </span>
                        <input class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="twitter" />
                      <label class="form-check-label addSocial" for="twitter">
                        <span class="icon" style="background-color: #1DA1F2;"> <i class="fab fa-twitter"></i> </span>
                        <input class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="youtube" />
                      <label class="form-check-label addSocial" for="youtube">
                        <span class="icon" style="background-color: #FF0000;"> <i class="fab fa-youtube"></i> </span>
                        <input class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="snapchat" />
                      <label class="form-check-label addSocial" for="snapchat">
                        <span class="icon" style="background-color: #FFFC00;"> <i class="fab fa-snapchat-ghost"></i>
                        </span>
                        <input class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                      </label>
                    </div>


                    <div class="col-12 d-flex justify-content-between mt-4">
                      <button class="btn btn-indigo btn-rounded prevBtn" type="button">السابق</button>
                      <button class="btn btn-default btn-rounded " type="submit">ـأكيد</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>

  </content>

@endsection
