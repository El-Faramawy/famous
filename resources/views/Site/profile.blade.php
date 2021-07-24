@extends('layouts.site.app')
@section('site_content')

  <content>

    <section class="profilePage">
      <div class="container">
        <div class=" profileHeader ">
          <div class="UserInfo">
            <div class="UserImg">
              <img src="{{get_file($user->image)}}">
            </div>
            <div class="Info">
              <h5> {{$user->name}}  <span class="Vip"> <i class="fas fa-medal"></i> </span> </h5>
              <div class="d-md-flex align-items-center">
                <h6> {{$user->job->title}} </h6>
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
                @if($user->facebook != null)
                    <a href="{{$user->facebook}}" class="icon" style="background-color: #4267B2;"> <i
                            class="fab fa-facebook"></i> </a>
                @endif
                @if($user->instagram != null)
                    <a href="{{$user->instagram}}" class="icon" style="background-color: #E1306C;"> <i class="fab fa-instagram"></i> </a>
                @endif
                @if($user->twitter != null)
                    <a href="{{$user->twitter}}" class="icon" style="background-color: #1DA1F2;"> <i class="fab fa-twitter"></i> </a>
                @endif
                @if($user->youtube != null)
                    <a href="{{$user->youtube}}" class="icon" style="background-color: #FF0000;"> <i class="fab fa-youtube"></i> </a>
                @endif
                @if($user->snapchat != null)
                    <a href="{{$user->snapchat}}" class="icon" style="background-color: #FFFC00;"> <i class="fab fa-snapchat-ghost"></i>
                    </a>
                @endif
            </div>
        </div>

        <div class="row">

            @include('layouts.site.profile_sidebar')

          <div class=" col-md-9 p-2 mt-1">

            <div class="bio">
              <div class="head"> <i class="fad fa-person-sign me-2"></i> السيرة الذاتية
                <a href="#!" id="cv_modal" class="editBio" data-toggle="modal" data-target="#editBio"><i
                    class="fas fa-pencil-alt"></i> تعديل</a>
              </div>
              <div class="body">
                <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم
                  سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...

                  وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية
                  المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من
                  الملاحظات او الانتقادات للتصميم الاساسي..</p>
              </div>
            </div>

            <div class="prices">

              <div class="secondTitle">
                <h5> اسعار الاعلانات </h5>
                <a href="#!" class="edit" data-toggle="modal" data-target="#addAds"><i class="fas fa-plus-hexagon"></i>
                  اضافة </a>
              </div>
              <div class="ads">
                <div class="row">
                  <div class="col-lg-4 col-sm-6 p-2">
                    <div class="adPrice">
                      <span class="DleteItem"> <i class="fas fa-trash-alt"></i> </span>
                      <h5> منتجات بسيطة </h5>
                      <div class=" price"> <strong> 100 </strong> ريال </div>
                      <ul>
                        <li> فديو قصير </li>
                        <li> 10 منشور علي وسائل التواصل </li>
                        <li> المدة 10 ايام </li>
                      </ul>
                      <button class="btn btn-success btn-block py-3" data-toggle="modal" data-target="#orderPrice"> طلب
                        عرض سعر </button>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 p-2">
                    <div class="adPrice">
                      <span class="DleteItem"> <i class="fas fa-trash-alt"></i> </span>
                      <h5> منتجات متوسطة </h5>
                      <div class=" price"> <strong> 200 </strong> ريال </div>
                      <ul>
                        <li> فديو متوسط </li>
                        <li> 30 منشور علي وسائل التواصل </li>
                        <li> المدة 15 ايام </li>
                      </ul>
                      <button class="btn btn-success btn-block py-3" data-toggle="modal" data-target="#orderPrice"> طلب
                        عرض سعر </button>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 p-2">
                    <div class="adPrice">
                      <span class="DleteItem"> <i class="fas fa-trash-alt"></i> </span>
                      <h5> منتجات عالية </h5>
                      <div class=" price"> <strong> 300 </strong> ريال </div>
                      <ul>
                        <li> فديو طويل </li>
                        <li> 30 منشور علي وسائل التواصل </li>
                        <li> المدة 20 ايام </li>
                      </ul>
                      <button class="btn btn-success btn-block py-3" data-toggle="modal" data-target="#orderPrice"> طلب
                        عرض سعر </button>
                    </div>
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
  <div class="modal fade" id="editBio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> تعديل </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-outline ">
            <textarea class="form-control" rows="5">
              لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...

              وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.</textarea>
            <label class="form-label"> السيرة الذاتية </label>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"> حفظ </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addAds" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> اضافة سعر </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <div class="form-outline ">
            <input type=" text" class="form-control" />
            <label class="form-label"> اسم الباقة </label>
          </div>

          <div class="form-outline ">
            <input type=" number" class="form-control" />
            <label class="form-label"> السعر </label>
          </div>

          <div class="secondTitle">
            <h5> اضافة مواصفات </h5>
            <a href="#!" id="addSpecPTN" class="edit"><i class="fas fa-plus-hexagon"></i> اضافة </a>
          </div>
          <div class="addSpecifications">
            <input type=" text " class="form-control" placeholder=" مثال : عدد ايام الاعلان " />

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"> اضافة </button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="orderPrice" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> بيانات المنتج </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6 class="text-center mb-4"> من فضلك ادخل بيانات المنتج المراد الاعلان عنه </h6>

          <div class="form-outline ">
            <input type=" text" class="form-control" />
            <label class="form-label"> اسم المنتج </label>
          </div>

          <div class="productImg">
            <label> <i class="fal fa-images"></i> صور المنتج</label>
            <input type="file" class="dropify" />
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success"> ارسال الطلب </button>
        </div>
      </div>
    </div>
  </div>




@endsection


