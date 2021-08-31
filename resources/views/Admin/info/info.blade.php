@extends('layouts.admin.app')
@section('page_name') معلومات الموقع @endsection
@section('content')
<br>
<br>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
            text: 'حاول مرة اخري!',
            confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@endif
<!------------------------------------ start INFO form --------------------------------->
<div class="card mt-15">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bolder">اعدادات الموقع</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_project_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post" action="{{route('edit_info')}}">
        <!--begin::Card body-->
        {{csrf_field()}}
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fw-bold mt-2 mb-3">الايميل<i class="bi bi-link mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="email" value="{{$info->email}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">الهاتف و الواتس <i class="bi bi-phone mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="phone" value="{{$info->phone}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك فيســبوك<i class="bi bi-facebook mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="facebook" value="{{$info->facebook}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك تويتــر<i class="bi bi-twitter mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="twitter" value="{{$info->twitter}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك يوتيــوب<i class="bi bi-youtube mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="youtube" value="{{$info->youtube}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>



        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">حفظ التغيرات</button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->
</div>

@endsection
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>

