@extends('layouts.site.app')
@section('site_content')
    <content>

        <section class="profilePage">
            <div class="container">
                @include('layouts.site.profileHeader')

                <div class="row">
                    @include('layouts.site.profile_sidebar')


                    <div class=" col-md-9 p-2 mt-1">

                        <form  method="post"  {{--action="{{route('update_user')}}"--}} id="Form" >
                            @csrf
                            <input type="hidden" name="type" value="client">
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <div class=" col-md-12 d-flex align-items-center p-1">
                                <div class="row">
                                    {{--                                    <div class="col-md-12 p-2">--}}
                                    <div class="col-md-12 p-2">
                                        <input type="file" name="image" class="dropify" data-default-file="{{get_file($user->image)}}" data-toggle="tooltip" title=" لوجو الشركة " />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input name="trade_num" value="{{$user->trade_num}}" type="text" class="form-control numbersOnly" />
                                            <label class="form-label"> رقم السجل التجاري </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input name="tax_num" value="{{$user->tax_num}}" type="text"  class="form-control numbersOnly" required />
                                            <label for="tax_num" class="form-label"> رقم الضريبي </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input name="company_name" value="{{$user->company_name}}" type="text" class="form-control" required/>
                                            <label class="form-label"> اسم الشركة </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input name="company_person" value="{{$user->company_person}}" type="text" class="form-control" required/>
                                            <label class="form-label">الشخص المسؤل </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input id="phone_code" value="{{$user->phone_code}}" name="phone_code" type="text" class="form-control numbersOnly" required/>
                                            <label class="form-label"> كود الجوال </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input id="phone" value="{{$user->phone}}" name="phone" type="text" class="form-control numbersOnly" required/>
                                            <label class="form-label"> رقم الجوال </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-outline ">
                                            <input name="company_email" value="{{$user->company_email}}" type="email" class="form-control" required/>
                                            <label class="form-label"> ايميل الشركة الرسمي</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"  required>
                                            <label class="form-check-label" for="terms">
                                                الموافقة علي <a href="#!"> الشروط والاحكام </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

{{--                            <div  id="recaptcha-container"></div>--}}

                            <button  id="check_phone" type="button" class="animateBTN " data-target="#exampleModal" data-toggle="model"> تسجيل </button>
                            {{--                                    <br>--}}
                            {{--                                    <button type="submit" class="animateBTN check_phone" > تسجيل </button>--}}
                        </form>


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
