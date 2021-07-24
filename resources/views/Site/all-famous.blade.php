@extends('layouts.site.app')
@section('site_content')
  <content>
    <section class="allFamousPage">

      <section class="vipFamousPage">
        <div class="container">
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

      <section class="allFamous">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 p-1">
              <aside class="widget-area">
                <div class="widget widget_search">
                  <form class="search-form">
                    <input type="search" class="search-field" placeholder="بحث ...">
                    <button type="submit"> <i class="far fa-search"></i> </button>
                  </form>
                </div>

                <div class="filter ">
                  <div class="FilterHeder">
                    <h5> تصفية النتائج :</h5>
                    <span class="closeFilter"> <i class="fal fa-times"></i> </span>
                  </div>
                  <form class="accordion">
                    <div class="accordion-item">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse">التصنيف </button>
                      <div id="collapse" class=" collapceBody collapse show ">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="catrgory1">
                          <label class="form-check-label" for="catrgory1">
                            الكل
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="catrgory2">
                          <label class="form-check-label" for="catrgory2">
                            فنان
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="catrgory3">
                          <label class="form-check-label" for="catrgory3">
                            يوتيوبر
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="catrgory4">
                          <label class="form-check-label" for="catrgory4">
                            استريمر
                          </label>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class=" btn  filterPtn btn-success btn-block py-3 "> تصفية </button>
                  </form>
                </div>
              </aside>
            </div>
            <div class="col-lg-9 p-1">
              <div class="products-filter-options">
                <div class="row align-items-center justify-content-between">
                  <div class="col-md-4">
                    <p>اظهار 1 – 12 من 100</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group position-relative">
                      <select class=" select2 form-control ">
                        <option selected disabled> ترتيب حسب </option>
                        <option> التقييم </option>
                        <option>الاحدث </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row position-relative">
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/14.jpg">
                    <div class="info">
                      <p> طلال خالد </p>
                      <span> فنان </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/15.jpg">
                    <div class="info">
                      <p> سلطان بندر </p>
                      <span> يوتيوبر </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/16.jpg">
                    <div class="info">
                      <p>خالد سلطان </p>
                      <span> فنان </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous vip">
                    <img src="{{url('site')}}/img/Users/12.jpg">
                    <div class="info">
                      <p> راكان ال حمد </p>
                      <span> استريمر </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/8.jpg">
                    <div class="info">
                      <p> بندر ال تركي </p>
                      <span> مذيع </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/6.jpg">
                    <div class="info">
                      <p> وليد سعود </p>
                      <span> فنان </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/14.jpg">
                    <div class="info">
                      <p> طلال خالد </p>
                      <span> فنان </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/15.jpg">
                    <div class="info">
                      <p> سلطان بندر </p>
                      <span> يوتيوبر </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/16.jpg">
                    <div class="info">
                      <p>خالد سلطان </p>
                      <span> فنان </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/12.jpg">
                    <div class="info">
                      <p> راكان ال حمد </p>
                      <span> استريمر </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/8.jpg">
                    <div class="info">
                      <p> بندر ال تركي </p>
                      <span> مذيع </span>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                    <img src="{{url('site')}}/img/Users/6.jpg">
                    <div class="info">
                      <p> وليد سعود </p>
                      <span> فنان </span>
                    </div>
                  </a>
                </div>

                <!-- Loading -->
                <!-- <div class="loading" data-toggle="tooltip" title=" يتم التحميل  ">
                <div class="sk-chase">
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                </div>
              </div> -->

                <!-- NotFound -->
                <!-- <div class="NotFound">
                <img src="{{url('site')}}/img/notFound.jpg">
                <h6> لا توجد نتائج </h6>
              </div> -->


              </div>
              <!-- loadingMore -->
              <div class="loadingMore">
                <div class="stage">
                  <div class="dot-falling"></div>
                </div>
              </div>

              <!-- filter control in mobile view -->
              <button class="btn btn-rounded py-3 filterControl d-lg-none"><i class="fal fa-filter mx-2"></i> تصفبة </button>
              <!-- / filter control in mobile view -->
            </div>
          </div>
        </div>
      </section>

    </section>

  </content>
@endsection
