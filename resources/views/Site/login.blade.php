@extends('layouts.site.app')
@section('site_content')
    <content>
        <section class="login">
            <div class="BGLogin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 d-flex order-sm-last justify-content-start align-items-center p-0 ">
                            <div class="FormDiv">
                                <h2> تسجيل الدخول </h2>
                                <form action="{{url('post_login')}}" method="post" id="Form"  class="needs-validation" novalidate>
                                    @csrf
                                    <div class="form-outline ">
                                        <input id="phone_code" type="text" name="phone_code" class="form-control numbersOnly" required/>
                                        <label class="form-label"> كود الجوال </label>
                                    </div>
                                    <div class="form-outline ">
                                        <input id="phone" type="text" name="phone" class="form-control numbersOnly" required/>
                                        <label class="form-label"> رقم الجوال </label>
                                    </div>
                                    <div  id="recaptcha-container"></div>


                                    <button id="check_phone" type="submit" class="animateBTN"> الدخول </button>
                                </form>
                                <h6> ليس لديك حساب ؟ <a href="{{url('register-user')}}"> انشاء حساب</a> </h6>

                            </div>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end align-items-center p-0">
                            <div class="FrontImg" style="background-image: url({{url('site')}}/img/login.jpg);">
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
                <form id="confirm_form" method="post"  action="{{url('post_login')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="title">
                            <h3> كود التفعيل </h3>
                        </div>
                            <div class="form-outline">
                                <input class="form-control numbersOnly" id="verificationCode" type="text" maxlength="6">
                                <input id="user_id" name="id" type="hidden" value="">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_model" data-dismiss="modal">الغاء</button>
                        <button type="submit" id="ConfirmPhoneCode" class="btn btn-primary" >تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('site_js')
    <script>

        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            $.ajax({
                url: "{{route('check_phone_login')}}",
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
                            phoneSendAuth();
                            $('#exampleModal').modal('show');
                            $('#user_id').attr('value',data.id);
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
        });

        $(document).on('submit','form#confirm_form',function(e) {
            e.preventDefault();

            var myForm = $("#confirm_form")[0]
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
@endpush

