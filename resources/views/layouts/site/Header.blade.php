<!-- Navbar Area -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('site')}}/img/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavBar"
            aria-controls="NavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="NavBar">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">الرئيسية</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="about.html">من نحن</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('all-famous')}}">المشاهير</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="terms.html">الشروط والاحكام</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('profile')}}"> حسابي </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">تسجيل الدخول</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
