@extends('layouts.admin.app')
@section('page_name') معلومات الموقع @endsection
@section('content')
<br>
<br>
@if ($errors->any())
    <div class="alert alert-danger mt-3 py-4">
        <h3> خطأ !!</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
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
                    <div class="fs-6 fw-bold mt-2 mb-3">الهاتف<i class="bi bi-phone mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="phone" value="{{$info->phone}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">واتســاب<i class="bi bi-whatsapp mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="whatsapp" value="{{$info->whatsapp}}">
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
            <!--end::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">لينك جيميــل<i class="bi bi-mailbox2 mr-2"></i></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="gmail" value="{{$info->gmail}}">
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
