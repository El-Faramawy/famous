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
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBg5ff6XTsIxW0KkiipBSeHXbjGYUUnmBk",
        authDomain: "test-e434b.firebaseapp.com",
        databaseURL: "https://test-e434b.firebaseapp.com",
        projectId: "famous-84fc0",
        storageBucket: "test-e434b.appspot.com",
        messagingSenderId: "108177260",
        appId: "1:877984876176:web:da91cdd947d2d27889fa15",
        measurementId: "p266654231222"
    };

    firebase.initializeApp(firebaseConfig);
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
                title: 'يوجد خطأ ...',
                showConfirmButton: false,
                timer: 2000,
            });
            // alert(error.message);
        });
    }
</script>

