{{--@if(auth()->check())--}}
{{--  111111111111111111111111111111111111111111111111111111--}}
{{--@endif--}}
@extends('layouts.site.app')
@section('site_content')
    <content>
        <section class="login">
            <div class="container">
                <div class="login-form">
                    <div class="title">
                        <h3> كود التفعيل </h3>
                    </div>
                    <form id="confirm_form" method="get" action="{{url('confirm_code',$phone->id)}}">
{{--                        @csrf--}}
                        <P class="mb-4">من فضلك ادخل رمز التحقق المرسل الى <br> <a class="color1" href="#"> {{$phone->phone}} </a></P>

                        <div class="vCode " id="vCode" data-aos="fade-up">
                            <input type="phone" id="input1" class="vCode-input mx-1" maxlength="1">
                            <input type="phone" id="input2" class="vCode-input mx-1" maxlength="1">
                            <input type="phone" id="input3" class="vCode-input mx-1" maxlength="1">
                            <input type="phone" id="input4" class="vCode-input mx-1" maxlength="1">
                            <input type="phone" id="input5" class="vCode-input mx-1" maxlength="1">
                            <input type="phone" id="input6" class="vCode-input mx-1" maxlength="1">
                        </div>


                        <button class="animateBTN" type="submit" >تأكيد</button>
                    </form>
                </div>
            </div>
        </section>
    </content>


@endsection

@push('site_js')
    <script>
        $(document).on('submit','form#confirm_form',function(e) {
            e.preventDefault();
            var myForm = $("#confirm_form")[0]
            var url = $('#confirm_form').attr('action');
            codeverify(url);
        });
    </script>
    <script>

        var vCode = (function () {
            //cache dom
            var $inputs = $("#vCode").find("input");

            //bind events
            $inputs.on('keyup', processInput);

            //define methods
            function processInput(e) {
                var x = e.charCode || e.keyCode;
                if ((x == 8 || x == 46) && this.value.length == 0) {
                    var indexNum = $inputs.index(this);
                    if (indexNum != 0) {
                        $inputs.eq($inputs.index(this) - 1).focus();
                    }
                }

                if (ignoreChar(e))
                    return false;
                else if (this.value.length == this.maxLength) {
                    $(this).next('input').focus();
                }
            }

            function ignoreChar(e) {
                var x = e.charCode || e.keyCode;
                if (x == 37 || x == 38 || x == 39 || x == 40)
                    return true;
                else
                    return false
            }

        })();
    </script>
@endpush



