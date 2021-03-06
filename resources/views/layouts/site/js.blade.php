<script src="{{url('site')}}/js/jquery-3.5.1.min.js"></script>
<script src="{{url('site')}}/js/popper.min.js"></script>
<script src="{{url('site')}}/js/jquery.appear.min.js"></script>
<script src="{{url('site')}}/js/bootstrap.min.js"></script>
<script src="{{url('site')}}/js/mdb.min.js"></script>
<script src="{{url('site')}}/js/swiper.js"></script>
<script src="{{url('site')}}/js/wow.min.js"></script>
<script src="{{url('site')}}/js/jquery.fancybox.min.js"></script>
<script src="{{url('site')}}/js/fontawesome-pro.js"></script>
<script src="{{url('site')}}/js/odometer.min.js"></script>
<script src="{{url('site')}}/js/select2.js"></script>
<script src="{{url('site')}}/js/ma5-menu.min.js"></script>
<script src="{{url('site')}}/js/dropify.min.js"></script>
<script src="{{url('site')}}/js/particles.js"></script>
<script src="{{url('site')}}/js/Custom.js"></script>
<script src="{{url('site')}}/js/validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
<script src="{{url('admin/js')}}/tostar.js"></script>

<script src="{{url('admin')}}/js/jquery.form-validator.js"></script>

<script>
    $.validate({
    });
</script>

<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        }
    });
</script>
<script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'info':
            toastr.options.timeOut = 10000;
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('music/Success 12.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('music/error2.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>
<script>
    $(document).on('click','.delete_element',function (e) {
        var id = $(this).attr('data_id')
        // var td = $(this)
        var routeAction = $(this).attr('data_delete')
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '???? ?????? ?????????? ???? ?????????? ??',
            text: "???????? ?????? ????????????!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '?????? !',
            cancelButtonText: '?????????? !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: routeAction,
                    data: {'id':id},
                    success:function(data){
                        // td.parent().parent().remove();
                        swalWithBootstrapButtons.fire(
                            '???? ?????????? !',
                            '???? ?????? ???????????? ?????????? .',
                            'success'
                        )
                        setTimeout(function (){location.reload()},2000);
                        // ajax().reload();
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '???? ?????????? ?????????? ',
                    '???????????? ???????????? ?????????? ?????????? ',
                    'error'
                )
            }
        });
    })
</script>

@stack('site_js')

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

{{--=====================  numbersOnly  =========================--}}

<script>
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>

{{--==============================  Firebase  =====================================--}}
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
{{--<script>--}}
{{--    var firebaseConfig = {--}}
{{--        apiKey: "AIzaSyBg5ff6XTsIxW0KkiipBSeHXbjGYUUnmBk",--}}
{{--        authDomain: "test-e434b.firebaseapp.com",--}}
{{--        databaseURL: "https://test-e434b.firebaseapp.com",--}}
{{--        projectId: "famous-84fc0",--}}
{{--        storageBucket: "test-e434b.appspot.com",--}}
{{--        messagingSenderId: "108177260",--}}
{{--        appId: "1:877984876176:web:da91cdd947d2d27889fa15",--}}
{{--        measurementId: "p266654231222"--}}
{{--    };--}}

{{--    firebase.initializeApp(firebaseConfig);--}}
{{--</script>--}}
<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyA-gj4Cje-NjRUtysAFaNZDdR7VKfdkLL0",
        authDomain: "famous-5f5fc.firebaseapp.com",
        projectId: "famous-5f5fc",
        storageBucket: "famous-5f5fc.appspot.com",
        messagingSenderId: "1084986292087",
        appId: "1:1084986292087:web:ed81a7aae062168bd81372",
        measurementId: "G-6D6NPKZ5Z6"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    // firebase.analytics();
</script>
<script type="text/javascript">
    window.onload=function () {
        render();
    };

    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function phoneSendAuth() {

        var number = '+'+$("#phone_code").val()+$("#phone").val();
        // alert(number)

        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {

            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;

        }).catch(function (error) {
        });

    }

    function codeverify(url) {

        // var input1 = $("#input1").val().toString();
        // var input2 = $("#input2").val().toString();
        // var input3 = $("#input3").val().toString();
        // var input4 = $("#input4").val().toString();
        // var input5 = $("#input5").val().toString();
        // var input6 = $("#input6").val().toString();
        // var code   = input1 + input2 + input3 + input4 + input5 + input6;
        var code = $("#verificationCode").val();

        coderesult.confirm(code).then(function (result) {
            var user=result.user;
            window.location = url;

        }).catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: '???????? ?????? ...',
                showConfirmButton: false,
                timer: 2000,
            });
            // alert(error.message);
        });
    }
</script>

