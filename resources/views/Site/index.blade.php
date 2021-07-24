@extends('layouts.site.app')
@section('site_content')

  <content>
    <!-- MainSection -->
    <section class="MainSection container-fluid">
      <!-- img Swiper -->
      <div class="swiper-container verticalSlider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="{{url('site')}}/img/BG1.jpg">
          </div>
          <div class="swiper-slide">
            <img src="{{url('site')}}/img/BG2.jpg">
          </div>
          <div class="swiper-slide">
            <img src="{{url('site')}}/img/BG3.jpg">
          </div>
        </div>
      </div>
      <!-- Data Swiper -->
      <div class="swiper-container mainSlider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slideContent">
              <h4> اهلا بك في منصة صيت المشاهير</h4>
              <p> المنصة الاولي والاكبر في العالم العربي في التوصل بين العملاء والمشاهير للاعلان من خلال منصاتهم ومواقع
                التواصل الخاصة بهم</p>
              <a href="{{url('login')}}" class="animateBTN"> سجل الدخول </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slideContent">
              <h4> وصل اعلانك بسرعة </h4>
              <p> يمكنك التواصل مع المشاهير لطلب اعلان عن خدماتك بساطة وسرعة وضمان لعملية الاعلان </p>
              <a href="{{url('all-famous')}}" class="animateBTN"> المشاهير </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slideContent">
              <h4> قم بانشاء حسابك </h4>
              <p> وسارع بالتواصل مع المشاهير وقم بطلب اعلان لخدماتك</p>
              <a href="{{url('register-user')}}" class="animateBTN"> انشاء حساب</a>
            </div>
          </div>
        </div>
      </div>
      <div id="particles-js"></div>
    </section>
    <!-- SEARCH -->
    <section class="search">
      <div class="container">
        <h4> تبحث عن مشهور معين ؟ </h4>
        <form class="row">
          <div class="col-md-6 m-auto">
            <input class="form-control" type="text" placeholder="بحث ... ">
            <div class="searchList " style="display: none;">
              <ul>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>
                <li>
                  <a href="{{url('profile')}}"> <img src="{{url('site')}}/img/Users/14.jpg">
                    طلال خالد
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- famousVIP -->
    <section class="famousVIP">
      <div class="container">
        <div class="title">
          <h3> مشاهير VIP </h3>
        </div>
        <div class="famousVIPSlider">
          <div class="swiper-container ">
            <div class="swiper-wrapper">
              <div class="swiper-slide p-2">
                <a href="{{url('profile')}}" class=" famous vip">
                  <img src="{{url('site')}}/img/Users/14.jpg">
                  <div class="info">
                    <p> طلال خالد </p>
                    <span> فنان </span>
                  </div>
                </a>
              </div>
              <div class="swiper-slide p-2">
                <a href="{{url('profile')}}" class=" famous vip">
                  <img src="{{url('site')}}/img/Users/15.jpg">
                  <div class="info">
                    <p> سلطان بندر </p>
                    <span> يوتيوبر </span>
                  </div>
                </a>
              </div>
              <div class="swiper-slide p-2">
                <a href="{{url('profile')}}" class=" famous vip">
                  <img src="{{url('site')}}/img/Users/16.jpg">
                  <div class="info">
                    <p>خالد سلطان </p>
                    <span> فنان </span>
                  </div>
                </a>
              </div>
              <div class="swiper-slide p-2">
                <a href="{{url('profile')}}" class=" famous vip">
                  <img src="{{url('site')}}/img/Users/12.jpg">
                  <div class="info">
                    <p> راكان ال حمد </p>
                    <span> استريمر </span>
                  </div>
                </a>
              </div>
              <div class="swiper-slide p-2">
                <a href="{{url('profile')}}" class=" famous vip">
                  <img src="{{url('site')}}/img/Users/8.jpg">
                  <div class="info">
                    <p> بندر ال تركي </p>
                    <span> مذيع </span>
                  </div>
                </a>
              </div>
              <div class="swiper-slide p-2">
                <a href="{{url('profile')}}" class=" famous vip">
                  <img src="{{url('site')}}/img/Users/6.jpg">
                  <div class="info">
                    <p> وليد سعود </p>
                    <span> فنان </span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </section>
    <!-- More famous -->
    <section class="moreFamous">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 p-0 order-md-last">

            <div class="entry-media">
              <img src="{{url('site')}}/img/BG2.jpg" class="sizer">

              <div class="entry-hover">
                <a href="#!"><i class="fal fa-radar"></i></a>
              </div>
              <svg viewBox="0 0 25 100" class="curved-shape">
                <path d="M25,0C25,37.5,0,37.5,0,50s25,12.5,25,50"></path>
              </svg>
            </div>
          </div>
          <div class="col-md-6 p-0 order-md-first">
            <div class="entry-info">

              <h3> مشاهير </h3>
              <p>يضم مشاهير السوشيال ميديا الذين يمتلكون شعبية عالية يمكنك ترويج خدماتك من خلالهم ليصل اعلانك الي اقصي
                عدد ممكن من الاشخاص </p>
              <a href="{{url('all-famous')}}" class="animateBTN"> مشاهير </a>

            </div>
          </div>


        </div>
        <div class="row align-items-center">
          <div class="col-md-6 p-0 ">

            <div class="entry-media">
              <img src="{{url('site')}}/img/BG1.jpg" class="sizer">

              <div class="entry-hover">
                <a href="#!"><i class="fal fa-radar"></i></a>
              </div>
              <svg viewBox="0 0 25 100" class="curved-shape curved-shape2">
                <path d="M25,0C25,37.5,0,37.5,0,50s25,12.5,25,50"></path>
              </svg>
            </div>
          </div>
          <div class="col-md-6 p-0 ">
            <div class="entry-info">

              <h3> مشاهير متنوعون </h3>
              <p>يضم مشاهير السوشيال ميديا الذين يمتلكون شعبية عالية يمكنك ترويج خدماتك من خلالهم ليصل اعلانك الي اقصي
                عدد ممكن من الاشخاص </p>
              <a href="{{url('all-famous')}}" class="animateBTN"> مشاهير متنوعون </a>

            </div>
          </div>


        </div>

      </div>
    </section>
    <!-- Counter -->
    <section class="Counter-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-6 p-1">
            <div class="single-Counter">
              <h3>
                <span class="odometer" data-count="997">00</span>
              </h3>
              <i class="fad fa-stars"></i>
              <p> مشاهير </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 p-1">
            <div class="single-Counter">
              <h3>
                <span class="odometer" data-count="1358">00</span>
              </h3>
              <i class="fad fa-scroll-old"></i>
              <p> عقود </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 p-1">
            <div class="single-Counter">
              <h3>
                <span dir="ltr" class="odometer" data-count="968">00</span>
              </h3>
              <i class="fad fa-trophy"></i>
              <p> عملاء </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-6 p-1">
            <div class="single-Counter">
              <h3>
                <span dir="ltr" class="odometer" data-count="99">00</span><span class="target">%</span>
              </h3>
              <i class="fad fa-laugh-beam"></i>
              <p>نسبة السعادة</p>
            </div>
          </div>
        </div>
      </div>
    </section>


  </content>

@endsection
