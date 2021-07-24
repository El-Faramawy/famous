<title>متجر بطاقت</title>
<meta name="description" content="Latest updates and statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
{{--==============================================    start  css   ====================================--}}

<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Cairo', sans-serif;
    }
</style>
<!--end::Web font -->

{{--===================================--}}
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ url('/')}}/admin/css/bootstrap-rtl.css">
<link rel="stylesheet" href="{{ url('/')}}/admin/css/datatables2.min.css">
<style media="screen">
    .dz-image
    {
        border-radius:5px !important;
        margin-bottom: 10px;
    }
    .dz-remove
    {
        color: red;
    }
    .dz-image img
    {
        text-align: center;
        width:100%;
        height:100%;

    }
    .dropzone
    {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

</style>
<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>

{{--=========================  select to  ===============================--}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    span.select2-selection.select2-selection--multiple {
        height: 50px;
        overflow: auto;
        box-shadow: -2px 3px 10px #0000003d;
        border: 1px solid #cecece;
    }
</style>
{{--===================  adress  ========================--}}
<style>
    #example23_length{
        margin-right: 15%;
    }
    #map-canvas{
        height: 100%;
        margin: 0;
    }
    #map-canvas .centerMarker  {
        position: absolute;

        background: url(http://maps.gstatic.com/mapfiles/markers2/marker.png) no-repeat;

        top: 50%;
        left: 50%;
        z-index: 1;

        margin-left: -10px;
        margin-top: -34px;
        height: 34px;
        width: 20px;
        cursor: pointer;
    }
</style>

{{--=======================  tostar  ====================================--}}
<link rel="stylesheet" href="{{url('admin/css')}}/tostar.css">

{{--===================================--}}

<link href="{{url('admin')}}/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />

<!--ltr version:<link href="{{url('admin')}}/assets/demo/demo6/base/style.bundle.css" rel="stylesheet" type="text/css" />-->

<link href="{{url('admin')}}/assets/demo/demo6/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

<!--end::Global Theme Styles -->

<!--begin::Page Vendors Styles -->
<!--ltr version:<link href="{{url('admin')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />-->

<link href="{{url('admin')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />

<!--end::Page Vendors Styles -->
<link rel="shortcut icon" href="{{url('admin/auth')}}/logo-1.png" />

<!-- ================== styles dropfy =================== -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" type="text/css" />


<style type="text/css">


    /*--------- Main Content ---------*/

    .box
    {
        margin: 25px;
        padding: 25px;
        background: #fff
    }

    th
    {
        text-align: center;
    }

    tbody tr
    {
        text-align: center;
    }

    .dropify-wrapper
    {
        border-radius: 20px;
    }

    .imageuploadify-container button:before
    {
        content: "remove";
    }
    .imageuploadify .imageuploadify-images-list .imageuploadify-container button.btn-danger
    {
        width: 51px;
    }
</style>

<style media="screen">
    .btn {
        /*margin: .375rem;*/
        color: inherit;
        text-transform: uppercase;
        word-wrap: break-word;
        white-space: normal;
        cursor: pointer;
        border-radius: .125rem;
        -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        padding: -0.16rem 2.14rem;
        font-size: .9rem;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.css">

{{--=============== datatable ===================--}}

<style>
    #example_length{
        min-width: 33%;
        display: inline-flex;
        justify-content: center;
        padding:10px 20px;
    }
    #example_filter{
        min-width: 33%;
        display: inline-flex;
        justify-content: center;
        padding:10px 20px;
    }
    .dt-buttons.btn-group{
        min-width: 33%;
        display: inline-flex;
        justify-content: center;
        padding:10px 20px;
    }
</style>
