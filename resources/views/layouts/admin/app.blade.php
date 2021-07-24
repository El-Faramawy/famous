<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    @include('layouts.admin.css')

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
@include('layouts.admin.header')
<!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="mr-auto">

                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">

                    <li class="m-nav__item m-nav__item--home">
                        <a href="{{route('home')}}" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                            <h3 class="m-subheader__title m-subheader__title--separator">متجر بطاقتك</h3>
                        </a>
                    </li>
                    @yield('title')

                </ul>

            </div>
{{--            <div class="progress m-progress--sm ">--}}
{{--                <div class="progress-bar m--bg-success cng_color loady" role="progressbar" style="width: 0%; transition: all 1s ease;color: blue" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--            </div>--}}

            @yield('content')
        </div>

        @include('layouts.admin.sidebar')

    </div>


    <!-- end:: Body -->
    @include('layouts.admin.footer')

</div>
@include('layouts.admin.js')

</body>

<!-- end::Body -->
</html>
