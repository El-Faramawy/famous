@extends('layouts.site.app')
@section('site_content')
  <content>
    <section class="allFamousPage">

      <section class="vipFamousPage">
        <div class="container">
          <div class="famousVIPSlider">
            <div class="swiper-container ">
              <div class="swiper-wrapper">
                   @foreach($vip_famous as $vip_fam)
                          <div class="swiper-slide p-2">
                            <a href="{{url('profile')}}" class=" famous vip">
                             <img src="{{asset('uploads/famous/'. $vip_fam->image)}}">
                          <div class="info">
                          <p> {{$vip_fam->name}} </p>
                          <span> {{$vip_fam->job->title}} </span>
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
                    <p> اظهار  {{$famous_counter_accepted}}  من  {{$famous_counter_all}}</p>
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
               @foreach($all_famous as $all_fam)
                      <div class="col-6 col-md-4 p-2 ">
                  <a href="{{url('profile')}}" class=" famous">
                      <img src="{{asset('uploads/famous/'. $all_fam->image)}}">
                    <div class="info">
                      <p> {{$all_fam->name}} </p>
                      <span> {{$all_fam->job->title}} </span>
                    </div>
                  </a>
                </div>
              @endforeach

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

