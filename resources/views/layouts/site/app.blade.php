<!doctype html>
<html>

<head>

    @include('layouts.site.css')

</head>

<body>
<!-- ================ spinner ================= -->
<div class="spinner">
    <img src="{{url('site')}}/img/spinner.gif">
</div>
@include('layouts.site.Header')

@yield('site_content')

@include('layouts.site.Footer')
@include('layouts.site.js')

</body>

</html>
