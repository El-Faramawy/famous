@extends('layouts.site.app')
@section('site_content')
  <content>

    <section class="profilePage">
      <div class="container">
          @include('layouts.site.profileHeader')

          <div class="row">
              @include('layouts.site.profile_sidebar')


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
                    <form  method="post"  action="{{route('register_user')}}" id="Form" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                      <!--  Step 1 -->
                      <div class="setup-content" id="step-1">
                        <div class="row">

                          <div class=" col-md-12 d-flex align-items-center p-1">
                            <div class="row">
                              <div class="col-md-12 p-2">
                                <input name="image" type="file" class="dropify" data-default-file="{{get_file($user->image)}}" data-toggle="tooltip" title=" الصورة الشخصية " required/>
                              </div>
                              <div class="col-md-6 p-2">
                                <div class="form-outline ">
                                  <input value="{{$user->name}}" name="name" type="text" class="form-control" required/>
                                  <label class="form-label"> اسم المشهور </label>
                                </div>
                              </div>

                              <div class="col-md-6 p-2">
                                <div class="form-outline ">
                                    <input value="{{$user->phone}}" id="phone" name="phone" type="text" class="form-control numbersOnly" required/>
                                    <label class="form-label"> رقم الهاتف </label>
                                </div>
                              </div>
                              <div class="col-md-12 p-2">
                                <div class="form-group position-relative">
                                    <select class=" select2 " name="job_id" required>
                                        <option  disabled> التصنيف </option>
                                        @foreach($jobs as $job)
                                            <option {{$job->id == $user->job_id?'selected':''}} value="{{$job->id}}"> {{$job->title}} </option>
                                        @endforeach
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
{{--                          <input class="form-check-input" type="checkbox" id="facebook" />--}}
                          <label class="form-check-label addSocial" for="facebook">
                            <span class="icon" style="background-color: #4267B2;"> <i class="fab fa-facebook"></i> </span>
                            <input value="{{$user->facebook}}" name="facebook" class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                          </label>
                        </div>

                        <div class="form-check">
{{--                          <input class="form-check-input" type="checkbox" id="instagram" />--}}
                          <label class="form-check-label addSocial" for="instagram">
                            <span class="icon" style="background-color: #E1306C;"> <i class="fab fa-instagram"></i> </span>
                            <input value="{{$user->instagram}}" name="instagram" class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                          </label>
                        </div>

                        <div class="form-check">
{{--                          <input class="form-check-input" type="checkbox" id="twitter" />--}}
                          <label class="form-check-label addSocial" for="twitter">
                            <span class="icon" style="background-color: #1DA1F2;"> <i class="fab fa-twitter"></i> </span>
                            <input value="{{$user->twitter}}" name="twitter" class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                          </label>
                        </div>

                        <div class="form-check">
{{--                          <input class="form-check-input" type="checkbox" id="youtube" />--}}
                          <label class="form-check-label addSocial" for="youtube">
                            <span class="icon" style="background-color: #FF0000;"> <i class="fab fa-youtube"></i> </span>
                            <input value="{{$user->youtube}}" name="youtube" class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                          </label>
                        </div>

                        <div class="form-check">
{{--                          <input class="form-check-input" type="checkbox" id="snapchat" />--}}
                          <label class="form-check-label addSocial" for="snapchat">
                            <span class="icon" style="background-color: #FFFC00;"> <i class="fab fa-snapchat-ghost"></i>
                            </span>
                            <input value="{{$user->snapchat}}" name="snapchat" class="form-control" type="text" placeholder=" ضع الرابط هنا ... ">
                          </label>
                        </div>


                        <div class="col-12 d-flex justify-content-between mt-4">
                          <button class="btn btn-indigo btn-rounded prevBtn" type="button">السابق</button>
                          <button class="btn btn-default btn-rounded " type="submit">تـأكيد</button>
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
@push('site_js')
    <script>

        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            $.ajax({
                url: "{{route('edit_profile')}}",
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('.spinner').show()
                },
                complete: function(){
                },
                success: function (data) {

                    window.setTimeout(function() {
                        $('.spinner').hide()
                        if (data.type == 'error'){
                            $.each(data.message, function(key, value) {
                                toastr.options.timeOut = 10000;
                                toastr.error(data.message[key]);
                            });
                        }

                        if (data.type == 'success') {
                            Swal.fire({
                                title: 'تم التعديل بنجاح',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }

                    }, 1500);
                },
                error: function (data) {
                    $('.spinner').hide()
                    if (data.status === 500) {
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
        });
    </script>
@endpush
