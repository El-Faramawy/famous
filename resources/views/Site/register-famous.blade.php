@extends('layouts.site.app')
@section('site_content')
    <content>
        <section class="login">
            <div class="BGLogin">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 d-flex order-sm-last justify-content-start align-items-center p-0 ">
                            <div class="FormDiv">
                                <h2> انشاء حساب</h2>
                                <ul class="nav row">
                                    <li class="nav-item col">
                                        <a href="{{url('register-user')}}" class="nav-link "> <i
                                                class="fad fa-users-crown"></i> عملاء
                                        </a>
                                    </li>
                                    <li class="nav-item col">
                                        <a href="#!" class="nav-link active"> <i class="fad fa-stars"></i>
                                            مشاهير </a>
                                    </li>
                                </ul>
                                <div class="Wizzard">
                                    <div class="Stepper">
                                        <!-- Stepper -->
                                        <div class="steps-form">
                                            <div class="steps-row setup-panel">
                                                <div class="steps-step">
                                                    <a href="#step-1" type="button" class="btn btn-indigo"> 1 </a>
                                                </div>
                                                <div class="steps-step">
                                                    <a href="#step-2" type="button" class="btn btn-default"
                                                        disabled="disabled"> 2 </a>
                                                </div>
                                            </div>
                                        </div>
                                        <form   method="post"  action="{{route('register_user')}}" id="Form"  class="needs-validation" novalidate>
                                            @csrf
                                                <input type="hidden" name="type" value="famous">
                                            <!--  Step 1 -->
                                            <div class="setup-content" id="step-1">
                                                <div class="row">

                                                    <div class=" col-md-12 d-flex align-items-center p-1">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <!-- <label> <i class="fal fa-images"></i> الصورة الشخصية
                                                                    </label> -->
                                                                <input name="image" type="file" class="dropify" data-default-file="{{get_file('site')}}/img/user.png" data-toggle="tooltip" title=" الصورة الشخصية "/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-outline ">
                                                                    <input name="name" type="text" class="form-control" required/>
                                                                    <label class="form-label"> اسم المشهور </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 ">
                                                                <div class="form-outline ">
                                                                    <input name="id_num" type="text" class="form-control numbersOnly" />
                                                                    <label class="form-label"> رقم الهوية الوطنية
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-outline ">
                                                                    <input name="tax_num" type="text" class="form-control numbersOnly" />
                                                                    <label class="form-label"> رقم الضريبى </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-outline ">
                                                                    <input id="phone_code" name="phone_code" type="text" class="form-control numbersOnly" required/>
                                                                    <label class="form-label"> كود الهاتف </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-outline ">
                                                                    <input id="phone" name="phone" type="text" class="form-control numbersOnly" required/>
                                                                    <label class="form-label"> رقم الهاتف </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group position-relative">
                                                                    <select class=" select2 " name="job_id" required>
                                                                        <option selected disabled> التصنيف </option>
                                                                        @foreach($jobs as $job)
                                                                            <option value="{{$job->id}}"> {{$job->title}} </option>
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
{{--                                                    <input class="form-check-input" type="checkbox" id="facebook" />--}}
                                                    <label class="form-check-label addSocial" for="facebook">
                                                        <span class="icon" style="background-color: #4267B2;"> <i
                                                                class="fab fa-facebook"></i> </span>
                                                        <input name="facebook" class="form-control" type="text"
                                                            placeholder=" ضع الرابط هنا ... ">
                                                    </label>
                                                </div>

                                                <div class="form-check">
{{--                                                    <input class="form-check-input" type="checkbox" id="instagram" />--}}
                                                    <label class="form-check-label addSocial" for="instagram">
                                                        <span class="icon" style="background-color: #E1306C;"> <i
                                                                class="fab fa-instagram"></i> </span>
                                                        <input name="instagram" class="form-control" type="text"
                                                            placeholder=" ضع الرابط هنا ... ">
                                                    </label>
                                                </div>

                                                <div class="form-check">
{{--                                                    <input class="form-check-input" type="checkbox" id="twitter" />--}}
                                                    <label class="form-check-label addSocial" for="twitter">
                                                        <span class="icon" style="background-color: #1DA1F2;"> <i
                                                                class="fab fa-twitter"></i> </span>
                                                        <input name="twitter" class="form-control" type="text"
                                                            placeholder=" ضع الرابط هنا ... ">
                                                    </label>
                                                </div>

                                                <div class="form-check">
{{--                                                    <input class="form-check-input" type="checkbox" id="youtube" />--}}
                                                    <label class="form-check-label addSocial" for="youtube">
                                                        <span class="icon" style="background-color: #FF0000;"> <i
                                                                class="fab fa-youtube"></i> </span>
                                                        <input name="youtube" class="form-control" type="text"
                                                            placeholder=" ضع الرابط هنا ... ">
                                                    </label>
                                                </div>

                                                <div class="form-check">
{{--                                                    <input class="form-check-input" type="checkbox" id="snapchat" />--}}
                                                    <label class="form-check-label addSocial" for="snapchat">
                                                        <span class="icon" style="background-color: #FFFC00;"> <i
                                                                class="fab fa-snapchat-ghost"></i> </span>
                                                        <input name="snapchat" class="form-control" type="text"
                                                            placeholder=" ضع الرابط هنا ... ">
                                                    </label>
                                                </div>
                                                <div  id="recaptcha-container"></div>


                                                <div class="col-12 d-flex justify-content-between mt-4">
                                                    <button class="btn btn-indigo btn-rounded prevBtn"
                                                        type="button">السابق</button>
                                                    <button id="check_phone" class="btn btn-default btn-rounded "
                                                        type="button" data-target="#exampleModal" data-toggle="model">إرسال</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <h6> لديك حساب بالفعل ؟ <a href="{{url('login')}}"> تسجيل الدخول </a> </h6>
                            </div>
                        </div>
                        <div class="col-sm-5 d-flex justify-content-end align-items-center p-0">
                            <div class="FrontImg" style="background-image: url({{url('site')}}/img/register.jpg);">
                                <img src="{{url('site')}}/img/logo.png">
                                <h2> اهلا بك في منصة صيت المشاهير</h2>
                                <p> سجل الان للاستمتاع بخدماتنا </p>
                                <h4> مواقع التوصل الخاصة بنا </h4>
                                <ul class="social">
                                    <li> <a href="{{$setting->facebook}}" target="_blank"> <i class="fab fa-facebook"></i></a></li>
                                    <li> <a href="{{$setting->twitter}}" target="_blank"> <i class="fab fa-twitter"></i></a></li>
                                    <li> <a href="{{$setting->instagram}}" target="_blank"> <i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="{{$setting->youtube}}" target="_blank"> <i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </content>

    {{--    ============ modal  =============--}}
    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">كود تفعيل الهاتف</h5>
                    <button id="close_modal" type="button" class="btn-close close_model" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="title">
                        <h3> كود التفعيل </h3>
                    </div>
                    <form id="confirm_form" method="post"  >
                        @csrf
                        {{--                 action="{{url('confirm_code',$phone->id)}}"       @csrf--}}
                        {{--                                        <P class="mb-4">من فضلك ادخل رمز التحقق المرسل الى <br> <a class="color1" href="#"> {{$phone->phone}} </a></P>--}}
                        <div class="form-outline">
                            <input class="form-control numbersOnly" id="verificationCode" type="text" maxlength="6">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_model" data-dismiss="modal">الغاء</button>
                    <button type="submit" id="store_user" class="btn btn-primary" >تاكيد</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('site_js')
    <script>

        $(document).on('click','#check_phone',function(e) {
            e.preventDefault();
            // alert(1)
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            // var url = $('#Form').attr('action');
            $.ajax({
                url: "{{route('check_phone')}}",
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
                            $('#close_modal').click();
                        }
                        if (data.type == 'success') {
                            //     Swal.fire({
                            //         icon: 'success',
                            //         title: 'تم التسجيل بنجاح قم بتاكيد الهاتف ...',
                            //         showConfirmButton: false,
                            //         timer: 2000,
                            //     });
                            phoneSendAuth();
                            $('#exampleModal').modal('show');
                            // setTimeout(function(){ window.location = data.url},2000);
                        }
                        // $('#basicExample').DataTable().ajax.reload();

                    }, 1500);
                },
                error: function (data) {
                    $('.spinner').hide()
                    if (data.status === 500) {
                        // $('#exampleModalCenter').modal("hide");
                        Swal.fire({
                            title: 'هناك خطأ',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#close_modal').click();
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        $(document).on('click','#store_user',function(e) {
            e.preventDefault();
            // alert(1)
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');

            var code = $("#verificationCode").val();
            coderesult.confirm(code).then(function (result) {
                var user=result.user;

                $.ajax({
                    url: url,
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
                            if (data.type == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'تم التسجيل بنجاح ...',
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                setTimeout(function(){ window.location = data.url},2000);
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
                            $('#close_modal').click();
                        }
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });

            }).catch(function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'يوجد خطأ ...',
                    showConfirmButton: false,
                    timer: 2000,
                });
            });

        });

        $(document).on('click','.close_model',function(e){
            $('#exampleModal').modal('hide');
        });
    </script>

    {{--    ============================  fire base ================================--}}
    {{--    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>--}}
    {{--    <script>--}}
    {{--        var firebaseConfig = {--}}
    {{--            apiKey: "AIzaSyBg5ff6XTsIxW0KkiipBSeHXbjGYUUnmBk",--}}
    {{--            authDomain: "test-e434b.firebaseapp.com",--}}
    {{--            databaseURL: "https://test-e434b.firebaseapp.com",--}}
    {{--            projectId: "famous-84fc0",--}}
    {{--            storageBucket: "test-e434b.appspot.com",--}}
    {{--            messagingSenderId: "108177260",--}}
    {{--            appId: "1:877984876176:web:da91cdd947d2d27889fa15",--}}
    {{--            measurementId: "p266654231222"--}}
    {{--        };--}}

    {{--        firebase.initializeApp(firebaseConfig);--}}
    {{--    </script>--}}
    {{--    <script type="text/javascript">--}}
    {{--        window.onload=function () {--}}
    {{--            render();--}}
    {{--        };--}}

    {{--        function render() {--}}
    {{--            window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');--}}
    {{--            recaptchaVerifier.render();--}}
    {{--        }--}}

    {{--        function phoneSendAuth() {--}}

    {{--            var number = '+'+$("#phone_code").val()+$("#phone").val();--}}
    {{--            alert(number)--}}
    {{--            firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {--}}

    {{--                window.confirmationResult=confirmationResult;--}}
    {{--                coderesult=confirmationResult;--}}
    {{--                // alert(coderesult)--}}
    {{--                // alert(confirmationResult)--}}
    {{--                console.log(coderesult);--}}

    {{--                // $("#sentSuccess").text("Message Sent Successfully.");--}}
    {{--                // $("#sentSuccess").show();--}}

    {{--            }).catch(function (error) {--}}
    {{--                $("#error").text(error.message);--}}
    {{--                $("#error").show();--}}
    {{--            });--}}

    {{--        }--}}

    {{--    </script>--}}
@endpush
