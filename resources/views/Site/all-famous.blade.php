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
                            <a href="{{url('profile',$vip_fam->id)}}" class=" famous vip">
                             <img src="{{get_file($vip_fam->image)}}">
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
                  <form class="search-form ">
                    <input id="search" type="search" class="search-field " placeholder="بحث ...">
                    <button type="submit" class="filter_search"> <i class="far fa-search"></i> </button>
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
                          <input class="form-check-input job" type="checkbox"  value="all" id="catrgory1">
                          <label class="form-check-label" for="catrgory1">
                            الكل
                          </label>
                        </div>
                        @foreach($jobs as $job)
                        <div class="form-check">
                          <input class="form-check-input job" value="{{$job->id}}" type="checkbox" id="catrgory2">
                          <label class="form-check-label" for="catrgory2">
                            {{$job->title}}
                          </label>
                        </div>
                        @endforeach

                      </div>
                    </div>
                    <button type="submit" class=" btn  filterPtn btn-success btn-block py-3 filter_search"> تصفية </button>
                  </form>
                </div>


              </aside>

            </div>
            <div class="col-lg-9 p-1">
              <div class="products-filter-options">
                <div class="row align-items-center justify-content-between">
                  <div class="col-md-4">
                    <p> اظهار  {{$famous->count()}}  من  {{$all_famous_count}}</p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group position-relative">
                        <select id="order" class=" select2 form-control filter_search">
                            <option selected disabled> ترتيب حسب </option>
                            <option value="rate"> التقييم </option>
                            <option value="date">الاحدث </option>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row position-relative famous_search">
                @foreach($famous as $all_fam)
                  <div class="col-6 col-md-4 p-2 ">
                    <a href="{{url('profile',$all_fam->id)}}" class=" famous">
                      <img src="{{get_file($all_fam->image)}}">
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
              <div class="loadingMore" style="display: none">
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
@push('site_js')
  <script>
    $(document).ready(function () {
      $(".loadingMore").fadeIn(2000);
      setTimeout(function () {
        $(".loadingMore").hide();
      }, 3000);
    });

    $(document).on('click change', '.filter_search', function (e) {
      e.preventDefault();
      // alert(1)
      var order = $('#order').val();
      var search = $('#search').val();
      var job = $(".job:checked").map(function(){
        return $(this).val();
      }).get();
      // console.log(job)
      $.ajax({
        url: "{{url('all-famous') }}"+'?order='+order+'&search='+search+'&job='+job ,
        type: 'GET',
        data: {'order':order,'search':search,'job':job},
        beforeSend: function () {
          $('.loadingMore').show()
        },
        success: function (data) {

          window.setTimeout(function () {
            $('.loadingMore').hide()
            if (data.type == 'success') {
                $('.famous_search').html(data.html)
            }
          }, 1500);
        },
        error: function (data) {
          $('.loadingMore').hide()
          if (data.status === 500) {
            // $('#exampleModalCenter').modal("hide");
            Swal.fire({
              title: 'هناك خطأ',
              icon: 'error',
              showConfirmButton: false,
              timer: 2000,
            });
          }
        },//end error method

        cache: false,
        contentType: false,
        processData: false
      });
      // var url = $('#Form').attr('action');
    });
  </script>
@endpush

