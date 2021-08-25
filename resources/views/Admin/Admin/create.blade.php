@extends('Layouts.admin.app')

@section('title')اضافة مشرف@endsection
@section('second_title')<a href="{{route('show-admins')}}">المشرفين</a>@endsection

@section('content')

    <form method="POST" action="{{route('store.admin')}}" accept-charset="UTF-8" style="padding-top: 30px" enctype="multipart/form-data">
        <!--begin::Heading-->
        @csrf
        <div class="mb-13 text-center">
            <h1 class="mb-3">اضافة مشرف جديد</h1>
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container ">
            <div class="row">
                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">الاسم</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="الاسم" name="name">
                </div>
                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">البريد الالكترونى</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="البريد الالكترونى" name="email">
                </div>
                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">رقم الهاتف</span>
                    </label>
                    <input type="text" class="form-control form-control-solid" placeholder="رقم الهاتف" name="phone">
                </div>
                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">كلمة المرور</span>
                    </label>
                    <input type="password" class="form-control form-control-solid" placeholder="كلمة المرور" name="password">
                </div>
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">الصورة</span>
                </label>
                <div class="col-lg-8">
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{url('admin')}}/assets/media/avatars/blank.png)">
                        <div class="image-input-wrapper w-125px h-125px" style=""></div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تغيير الصورة">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                    </div>
                    <div class="form-text">انواع الملفات المتاحة : png, jpg, jpeg.</div>
                </div>
            </div>
        </div>
        </div>

        <div class="text-center">
            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-white me-3">تجاهل</button>
            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                <span class="indicator-label">حفظ</span>
                <span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
        <div></div></form>

@endsection


