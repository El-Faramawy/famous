@extends('layouts.site.app')
@section('site_content')

  <content>
    <!-- MainSection -->
    <section class="MainSection container-fluid">
      <!-- img Swiper -->
      <div class="swiper-container verticalSlider">
        <div class="swiper-wrapper">
            @foreach($show_sliders as $show_slider )
                <div class="swiper-slide">
                  <img src={{asset('uploads/slider/'. $show_slider->image)}}>
               </div>
            @endforeach
        </div>
      </div>
      <!-- Data Swiper -->
      <div class="swiper-container mainSlider">
        <div class="swiper-wrapper">
            @foreach($show_sliders as $show_slider )
                <div class="swiper-slide">
                    <div class="slideContent">
                      <h4> {{$show_slider->title}}</h4>
                       <p>{{$show_slider->content}}</p>
                      <a href="{{$show_slider->btn_link}}" class="animateBTN">{{$show_slider->btn_name}} </a>
                    </div>
                </div>
            @endforeach
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
            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="بحث ... ">
            <div class="searchList " style="display: none;">
              <ul id="myUL">
               @foreach($searched_famous as $searched_fam )
                <li>
                      <a href="{{url('profile')}}"> <img src={{asset('uploads/famous/'. $searched_fam->image)}}>
                          {{$searched_fam->name}}
                      </a>
                </li>
               @endforeach
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
             @foreach($vip_famouses as $vip_famouse )
                    <div class="swiper-slide p-2">
                    <a href="{{url('profile')}}" class=" famous vip">
                      <img src="{{asset('uploads/famous/'. $vip_famouse->image)}}">
                      <div class="info">
                        <p> {{$vip_famouse->name}} </p>
                        <span>{{$vip_famouse->job->title}} </span>
                      </div>
                    </a>
                  </div>
             @endforeach
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
                          <img src="{{asset('uploads/about/'. $show_abouts->image)}}">
                          <div class="entry-hover">
                              <a href=""><i class="fal fa-radar"></i></a>
                          </div>
                          <svg viewBox="0 0 25 100" class="curved-shape">
                              <path d="M25,0C25,37.5,0,37.5,0,50s25,12.5,25,50"></path>
                          </svg>
                      </div>
                  </div>

                  <div class="col-md-6 p-0 order-md-first">
                      <div class="entry-info">
                          <h3>{{$show_abouts->title}} </h3>
                              <p>{{$show_abouts->content}}</p>
                          <a href="" class="animateBTN"> {{$show_abouts->btn_name}} </a>
                      </div>
                  </div>
              </div>
              <div class="row align-items-center">
                  <div class="col-md-6 p-0 ">

                      <div class="entry-media">
                          <img src="{{asset('uploads/about/'. $show_abouts2->image)}}">
                          <div class="entry-hover">
                              <a href=""><i class="fal fa-radar" aria-hidden="true"></i></a>
                          </div>
                          <svg viewBox="0 0 25 100" class="curved-shape curved-shape2">
                              <path d="M25,0C25,37.5,0,37.5,0,50s25,12.5,25,50"></path>
                          </svg>
                      </div>
                  </div>
                  <div class="col-md-6 p-0 ">
                      <div class="entry-info">

                          <h3> {{$show_abouts2->title}} </h3>
                              <p> {{$show_abouts2->content}}</p>
                          <a href="" class="animateBTN">{{$show_abouts2->btn_name}} </a>

                      </div>
                  </div>


              </div>

          </div>
      </section>
    <!-- Counter -->
    <section class="Counter-area">
            <div class="container">
                <div class="row">
                    @foreach($show_counters as $show_counter)
                        <div class="col-lg-3 col-md-6 col-6 p-1">
                    <div class="single-Counter">
                      <h3>
                        <span class="odometer" data-count="{{$show_counter->number}}">00</span>
                      </h3>
                      <i class="fad fa-stars"></i>
                      <p> {{$show_counter->title}} </p>
                    </div>
                  </div>
                    @endforeach
                </div>
              </div>
    </section>


  </content>

@endsection
<script>
function myFunction() {
var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
li = ul.getElementsByTagName("li");
for (i = 0; i < li.length; i++) {
a = li[i].getElementsByTagName("a")[0];
txtValue = a.textContent || a.innerText;
if (txtValue.toUpperCase().indexOf(filter) > -1) {
li[i].style.display = "";
} else {
li[i].style.display = "none";
}
}
}
</script>

