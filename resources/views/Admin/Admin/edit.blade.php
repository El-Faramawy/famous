@extends('layouts.admin.app')

@section('title')تعديل مشرف@endsection
@section('second_title')<a href="{{route('show-admins')}}">المشرفين</a>@endsection

@section('content')
    <div class="main_cotent">
        <div class="box" style="margin: 25px 0px;">


            <div class="box">

                <div class="box-header">
                    <h3 class="box-title"> تعديل المشرف</h3>
                </div>
                <hr><br>
                <!-- /.box-header -->
            @foreach($data as $user)
                <form method="POST" action="{{route('store.admin_update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{--                    <input name="_token" type="hidden" value="sSfedSAmdwxno23r3PS9EJkR1kgoFfXukhDOHJ9o">--}}
                    @csrf
                    <input name="id" type="hidden" value="{{$user->id}}">
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container ">
                        <div class="row">
                            <div class="col-6">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">الاسم</span>
                                </label>
                                <input type="text" value="{{$user->name}}" class="form-control form-control-solid" placeholder="الاسم" name="name">
                            </div>
                            <div class="col-6">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">البريد الالكترونى</span>
                                </label>
                                <input type="text" value="{{$user->email}}" class="form-control form-control-solid" placeholder="البريد الالكترونى" name="email">
                            </div>
                            <div class="col-6">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">رقم الهاتف</span>
                                </label>
                                <input type="text" value="{{$user->phone}}" class="form-control form-control-solid" placeholder="رقم الهاتف" name="phone">
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
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{get_file($user->image)}})"></div>
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
                            <span class="indicator-label">تاكيد</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
                @endforeach


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->



    </div>
    {{--    </div>--}}

@endsection
