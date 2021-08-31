@extends('layouts.admin.app')
@section('page_name') الرئيسية @endsection
@section('content')
    <br>
    <br>
    <!--begin::Row-->
    <div class="row gy-5 gx-xl-8 mt-10">
        <!--begin::Col-->
        <div class="col-xxl-4">
            <!--begin::List Widget 3-->
            <div class="card card-xxl-stretch mb-xl-3">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">كل المشاهير</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    @foreach($famous as $fam)
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Bullet-->
                            @if($fam->status == 'accepted')
                                <span class="bullet bullet-vertical h-40px bg-success"></span>
                            @elseif($fam->status == 'new')
                                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                            @else
                                <span class="bullet bullet-vertical h-40px bg-danger"></span>
                            @endif
                        <!--end::Bullet-->
                            <!--begin::Checkbox-->
                            <div class="symbol symbol-40px me-5 mr-2">
                            </div>
                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <a href="" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{$fam->name}}</a>
                                <span class="text-muted fw-bold d-block">{{$fam->job->title}}</span>
                            </div>
                            <!--end::Description-->
                            @if($fam->status == 'accepted')
                                <span class="badge badge-light-success fs-8 fw-bolder">مقبول</span>
                            @elseif($fam->status == 'new')
                                <span class="badge badge-light-primary fs-8 fw-bolder">جديد</span>
                            @else
                                <span class="badge badge-light-danger fs-8 fw-bolder">مرفوض</span>
                            @endif
                        </div>
                @endforeach
                <!--end:Item-->
                </div>
                <!--end::Body-->
            </div>
            <!--end:List Widget 3-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Tables Widget 9-->
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">مشاهير جدد</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{$famous_count}} مشهور  طلبوا الانضمام</span>
                    </h3>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="عرض وتعديل المشاهير">
                        <a href="{{route('newFamous')}}" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                            <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                            <span class="svg-icon svg-icon-3">
                                <i class="bi bi-arrow-left"></i>
                            </span>
                            <!--end::Svg Icon--> المشاهير المعلقين</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-150px">المشهور</th>
                                <th class="min-w-140px">حاله المشهور</th>
                                <th class="min-w-120px">رقم الهاتف</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach($new as $new_famous )
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-5">
                                                <img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($new_famous->image)}}  alt="">
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$new_famous->name}}</a>
                                                <span class="text-muted fw-bold text-muted d-block fs-7">{{Str::limit($new_famous->cv,50)}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">معلق</span>
                                    </td>
                                    <td>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">{{$new_famous->phone}}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 9-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->



    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget 8-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder text-dark">اعلي المشاهير تقييما</span>
                        <span class="text-muted mt-1 fw-bold fs-7">وفقا لاخر المراجعات</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-3">
                    <!--begin::Item-->
                    @foreach($accepted_famous as $acc)
                        <div class="d-flex align-items-sm-center mb-7">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-60px symbol-2by3 me-4">
                                <div class="symbol-label" style="background-image: url({{asset($acc->image)}})"></div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Content-->
                            <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                <!--begin::Title-->
                                <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">{{$acc->name}}</a>
                                    {{--                                <span class="text-muted fw-bold d-block pt-1">{{$acc->job->title}}</span>--}}
                                </div>
                                <!--end::Title-->
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <div class="me-6">
                                        <i class="bi bi-star-fill me-1 text-warning fs-5"></i>
                                        <span class="text-gray-800 fw-bolder">{{$acc->rate}}</span>
                                    </div>
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Content-->
                        </div>
                @endforeach
                <!--end::Item-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 8-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget 6-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">اخر المشتركين لمتابعة الاخبار</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                @foreach($persons as $person)
                    <!--begin::Item-->
                        <div class="d-flex align-items-center bg-light-info rounded p-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-info me-5">
        <!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
        <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                </g>
            </svg>
        </span>
                                <!--end::Svg Icon-->
    </span>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a class="fw-bolder text-gray-800 text-hover-primary fs-6">{{$person->email}}</a>
                                <span class="text-muted fw-bold d-block">{{$person->created_at}}</span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                        {{--                        <span class="fw-bolder text-info py-1">+8%</span>--}}
                        <!--end::Lable-->
                        </div>
                        <!--end::Item-->
                    @endforeach
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

@endsection
