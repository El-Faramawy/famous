@extends('layouts.admin.app')
@section('page_name') قائمة المشاهير @endsection
@section('content')


<!-----------------------------------Start Data Table ------------------------------------->
<br>
<br>
<br>
<div class="card mb-5 mb-xl-8 mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">قائمة المشاهير</span>
        </h3>
        <div class="card-toolbar">
            @if($famous_list->count()>0)
            <a href="" class="btn btn-light-danger er fs-6 px-7 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                <span><i class="bi bi-dash-circle"></i></span>
                حذف الكل</a>
            @endif
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table id="kt_datatable_example_5" class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                <tr class="fw-bolder text-muted bg-light">
                    <th class="ps-4 min-w-150px rounded-start">المشهور</th>
                    <th class="min-w-125px">السيرة الذاتية</th>
                    <th class="min-w-125px">رقم الهاتف</th>
                    <th class="min-w-80px">الحالة</th>
                    <th class="min-w-200px rounded-end">العمليات</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($famous_list as $famous)
                    <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src={{asset('/uploads/famous/'.$famous->image)}}  alt="">
								</span>
                            </div>
                            <div class="d-flex justify-content-start text-left flex-column">
                                <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$famous->name}}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-6">{{$famous->job->title}}</span>
                            </div>
                        </div>
                    </td>

                    <td>
                        {{Str::limit($famous->cv,50)}}
                    </td>
                    <td>
                        {{$famous->phone}}
                    </td>
                    <td>
                            @if($famous->status == 'new')
                                <span class="badge badge-warning">معلق</span>
                            @elseif($famous->status == 'accepted')
                                <span class="badge badge-success">مقبول</span>
                            @elseif($famous->status == 'refused')
                                <span class="badge badge-danger">مرفوض</span>
                            @endif
                    </td>
                    <td class="">
                        <button class="btn btn-icon btn-primary btn-sm me-1"
                                style="border-radius: 50% !important"
                                data-id='{{$famous->id}}' data-status='{{$famous->status}}' data-image='{{asset('/uploads/famous/'.$famous->image)}}'
                                data-date='{{$famous->created_at}}' data-name="{{$famous->name}}"
                                data-phone = "{{$famous->phone}}" data-job="{{$famous->job->title}}"
                                data-is_favorite = "{{$famous->is_favorite}}"
                                data-visitor = "{{$famous->visitors}}"
                                data-facebook = "{{$famous->facebook}}" data-twitter = "{{$famous->twitter}}"
                                data-instagram = "{{$famous->instagram}}" data-youtube = "{{$famous->youtube}}"
                                data-snapchat = "{{$famous->snapchat}}"
                                data-bs-toggle='modal' title="تعديل" data-bs-target="#edit_famous" >
                                <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-pencil"></i>
                                </span>
                        </button>
                        <button class="btn btn-icon btn-success btn-sm me-1" data-bs-toggle='modal' title="تفاصيل" data-bs-target="#famous_package" style="border-radius: 50% !important"
                                data-id='{{$famous->id}}'
                                data-count = '{{$famous->package->count()}}'
                                @for($i = 0 ; $i < $famous->package->count(); $i++)
                                data-package_name_{{$i}} = "{{$famous->package[$i]->name}}"
                                data-package_id_{{$i}} = "{{$famous->package[$i]->id}}"
                                data-created_at_{{$i}} = '{{$famous->package[$i]->created_at}}'
                                data-package_price_{{$i}} = "{{$famous->package[$i]->price}}"
                                @endfor
                        >
                            <span class="svg-icon svg-icon-3">
                                <i class="bi bi-info" style="font-size: 20px !important;"></i>
                            </span>
                        </button>
                        <button data-id="{{$famous->id}}" data-famous_name="{{$famous->name}}" data-bs-target="#delete_famous" title="حذف" class="btn btn-icon btn-danger btn-sm me-1" data-bs-toggle="modal" style="border-radius: 50% !important">
                            <span class="svg-icon svg-icon-3">
                                <i class="bi bi-trash"></i>
                            </span>
                        </button>
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
<!-----------------------------------Start Data Table ------------------------------------->

<!-------------------------Start DELETE ALL modal ------------------------------------------------------------>
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف الكل</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                <!--begin::Form-->
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_all_famous')}}" method="post">
                    <!--begin::Input group-->
                    {{csrf_field()}}
                    <div class="d-flex flex-column mb-3 fv-row">
                        <!--begin::Label-->
                            <h4>سيتم حذف كل المشاهير ! هل تريد المتابعة</h4>
                        <!--end::Label-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center pt-3">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-danger">
                            <span class="indicator-label">تأكيد</span>
                            <span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-------------------------end DELETE ALL modal ------------------------------------------------------------>

<!-------------------------Start DELETE modal ------------------------------------------------------------>
<div class="modal fade" id="delete_famous" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف مشهور</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
					</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                <!--begin::Form-->
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_one_famous')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا المشهور</h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                        <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="famous_name" id="famous_name" value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-danger">
                            <span class="indicator-label">تأكيد</span>
                            <span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-------------------------End DELETE modal -------------------------------------------------------------->


<!-------------------------start Package modal -------------------------------------------------------------->
<div class="modal fade" id="famous_package" tabindex="-1" aria-modal="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header justify-content-end border-0 pb-0">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
										<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
										<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
									</g>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body pt-0 pb-15 px-5 px-xl-20">

                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <h3 class="mb-3">الباقات الخاصة بالمشهور</h3>
                </div>
                <form method="post" action="{{route('remove_package')}}">
                    {{csrf_field()}}
                <input id="id" type="hidden" name="id">
                <!--end::Heading-->
                <!--begin::Plans-->
                <div class="d-flex flex-column" id="start">
                    <!--begin::Row-->
{{--                    <div class="row mt-10">--}}
{{--                        <!--begin::Col-->--}}
{{--                        <div class="col-12 mb-10 mb-lg-0">--}}
{{--                            <!--begin::Tabs-->--}}
{{--                            <div class="nav flex-column">--}}
{{--                                <!--begin::Tab link-->--}}
{{--                                <div class="modal-body nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">--}}
{{--                                    <!--end::Description-->--}}
{{--                                    <div class="d-flex align-items-center me-2">--}}
{{--                                        <!--begin::Radio-->--}}
{{--                                        <div class="form-check form-check-custom form-check-solid form-check-success me-6">--}}
{{--                                            <input class="form-check-input" type="radio" name="plan" checked="checked" value="startup">--}}
{{--                                        </div>--}}
{{--                                        <!--end::Radio-->--}}
{{--                                        <!--begin::Info-->--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap" id="pack_name"></h2>--}}
{{--                                            <div class="fw-bold opacity-50">Best for startups</div>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Info-->--}}
{{--                                    </div>--}}
                                    <!--end::Description-->
                                    <!--begin::Price-->
{{--                                    <div class="ms-5">--}}
{{--                                        <span class="mb-2">السعر</span>--}}
{{--                                        <span class="fs-3x fw-bolder" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">39</span>--}}
{{--                                    </div>--}}
                                    <!--end::Price-->
{{--                                </div>--}}
                                <!--end::Tab link-->
{{--                                @endfor--}}
                                <!--begin::Tab link-->
{{--                                <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">--}}
{{--                                    <!--end::Description-->--}}
{{--                                    <div class="d-flex align-items-center me-2">--}}
{{--                                        <!--begin::Radio-->--}}
{{--                                        <div class="form-check form-check-custom form-check-solid form-check-success me-6">--}}
{{--                                            <input class="form-check-input" type="radio" name="plan" value="advanced">--}}
{{--                                        </div>--}}
{{--                                        <!--end::Radio-->--}}
{{--                                        <!--begin::Info-->--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">Advanced</h2>--}}
{{--                                            <div class="fw-bold opacity-50">Best for 100+ team size</div>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Info-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Description-->--}}
{{--                                    <!--begin::Price-->--}}
{{--                                    <div class="ms-5">--}}
{{--                                        <span class="mb-2">السعر</span>--}}
{{--                                        <span class="fs-3x fw-bolder" data-kt-plan-price-month="339" data-kt-plan-price-annual="3399">339</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Price-->--}}
{{--                                </div>--}}
                                <!--end::Tab link-->
                                <!--begin::Tab link-->
{{--                                <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">--}}
{{--                                    <!--end::Description-->--}}
{{--                                    <div class="d-flex align-items-center me-2">--}}
{{--                                        <!--begin::Radio-->--}}
{{--                                        <div class="form-check form-check-custom form-check-solid form-check-success me-6">--}}
{{--                                            <input class="form-check-input" type="radio" name="plan" value="enterprise">--}}
{{--                                        </div>--}}
{{--                                        <!--end::Radio-->--}}
{{--                                        <!--begin::Info-->--}}
{{--                                        <div class="flex-grow-1">--}}
{{--                                            <h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap">Enterprise--}}
{{--                                                <span class="badge badge-light-success ms-2 fs-7">Most popular</span></h2>--}}
{{--                                            <div class="fw-bold opacity-50">Best value for 1000+ team</div>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Info-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Description-->--}}
{{--                                    <!--begin::Price-->--}}
{{--                                    <div class="ms-5">--}}
{{--                                        <span class="mb-2">السعر</span>--}}
{{--                                        <span class="fs-3x fw-bolder" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Price-->--}}
{{--                                </div>--}}
                                <!--end::Tab link-->
                            </div>
                            <!--end::Tabs-->
                        <!--end::Col-->

                    <!--end::Row-->
                <!--end::Plans-->
                <!--begin::Actions-->
                <div class="d-flex flex-center flex-row-fluid pt-12">
                    <button type="reset" class="btn btn-white me-3" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-danger me-3">حذف الباقة</button>
                </div>
                </form>
                <!--end::Actions-->
            </div>
    </div>
</div>
</div>
            <!--end::Modal body-->
{{--        </div>--}}
        <!--end::Modal content-->
{{--    </div>--}}
    <!--end::Modal dialog-->
{{--</div>--}}
<!-------------------------end Package modal -------------------------------------------------------------->

<!-------------------------start EDIT modal -------------------------------------------------------------->
<div class="modal fade" id="edit_famous" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>بيانات المشهور</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
					</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <form action="{{route('edit_famous')}}" method="post">
                {{csrf_field()}}
            <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                <input name="id" type="hidden" id="id">
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body pt-15">
                        <!--begin::Summary-->
                        <div class="d-flex flex-center flex-column mb-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="" alt="image" id="image">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1" id="famous_name"></a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="fs-5 fw-bold text-gray-400 mb-6" id="job"></div>
                            <!--end::Position-->
                            <!--begin::Info-->
                                <!--begin::Details item-->
                            <!--end::Info-->
                        </div>
                        <div class="row">
                            <!--begin::Details item-->
                            <div class="col-6 fw-bolder mt-5">
                                <label>مشهور VIP</label>
                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input mr-3" type="checkbox" name="VIP" id="VIP">
                                    <!--end::Input-->
                                </label>
                            </div>
                            <!--begin::Details item-->
                            <div class="col-6 fw-bolder mt-5">الحالة
                                <br>
                                <select name="status" id="status" class="form-select form-select-solid">
                                    <option value="new">معلق</option>
                                    <option value="accepted">مقبول</option>
                                    <option value="refused">مرفوض</option>
                                </select>
                            </div>
                            <!--begin::Details item-->
                        </div>

                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">بيانات المشهور
                                <span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
																</g>
															</svg>
														</span>
                                    <!--end::Svg Icon-->
													</span></div>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Details content-->
                        <div id="kt_customer_view_details" class="collapse show">
                            <div class="py-2 fs-6">
                                <!--begin::Badge-->
                                <div>تاريخ التسجيل :
                                <span class="badge badge-light-info d-inline" id="date"></span>
                                </div>
                                <!--begin::Badge-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">الهاتف</div>
                                <div class="text-gray-600" id="phone"></div>

                                <div class="fw-bolder mt-5">عدد الزائرين</div>
                                <div class="text-gray-600" id="visitor"></div>

                            <div class="text-center mt-3">
                                <a class="bi bi-facebook col-2 fs-2" id="facebook" style="color: #292929"></a>
                                <a class="bi bi-instagram col-2 fs-2" id="instagram" style="color: #292929"></a>
                                <a class="bi bi-twitter col-2 fs-2" id="twitter" style="color: #292929"></a>
                                <a class="bi bi-youtube col-2 fs-2" id="youtube" style="color: #292929"></a>
                                <a class="bi bi-bell col-2 fs-2" id="snapchat" style="color: #292929"></a>
                            </div>


                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                        <span class="indicator-label">تأكيد</span>
                    <span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->

            </div>
            </form>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-------------------------end EDIT modal -------------------------------------------------------------->


@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

<script>
    $(document).ready(function(){
        //Show data in the delete modal
    $('#delete_famous').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('famous_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #famous_name').val(name);
    });

        //Show data in edit modal
        $('#edit_famous').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var famous_name = button.data('name')
            var image = button.data('image')
            var date = button.data('date')
            var job = button.data('job')
            var facebook = button.data('facebook')
            var twitter = button.data('twitter')
            var instagram = button.data('instagram')
            var youtube = button.data('youtube')
            var snapchat = button.data('snapchat')
            var VIP = button.data('is_favorite')
            var status = button.data('status')
            var phone = button.data('phone')
            var visitor = button.data('visitor')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #famous_name').text(famous_name);
            modal.find('.modal-body #date').text(date);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #job').text(job);
            modal.find('.modal-body #facebook').attr('href',facebook);
            modal.find('.modal-body #twitter').attr('href',twitter);
            modal.find('.modal-body #instagram').attr('href',instagram);
            modal.find('.modal-body #youtube').attr('href',youtube);
            modal.find('.modal-body #snapchat').attr('href',snapchat);
            modal.find('.modal-body #job').text(job);
            modal.find('.modal-body #job').text(job);
            modal.find('.modal-body #job').text(job);
            modal.find('.modal-body #image').attr('src',image);
            modal.find('.modal-body #phone').text(phone);
            modal.find('.modal-body #visitor').text(visitor);
            if(VIP === 'yes') {
                modal.find('.modal-body #VIP').prop('checked',true);
            }
            else{
                modal.find('.modal-body #VIP').prop('checked',false);
            }
            if(status === 'new'){
                modal.find('.modal-body #status').val('new');
            }
            else if(status === 'refused'){
                modal.find('.modal-body #status').val('refused');
            }
            else {
                modal.find('.modal-body #status').val('accepted');
            }
        });

        //copy id to show package modal
        $('#famous_package').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var count = button.data('count')
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            var pack_name = [];
            var pack_price = [];
            var created_at= [];
            var pack_id =[];
            for(var i = 0 ; i <count; i++) {
                pack_name[i] = button.data("package_name_" + i);
                pack_id[i] = button.data("package_id_" + i);
                pack_price[i] = button.data("package_price_" + i);
                created_at[i] = button.data("created_at_" + i);
                modal.find('.modal-body #start').append('<div class="row mt-10">'+
                    '<div class="col-12 mb-10 mb-lg-0">'+
                    '<div class="nav flex-column">' +
                    '<div class="modal-body nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active-light-primary d-flex flex-stack text-start active p-6  mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">' +
                    '<div class="d-flex align-items-center me-2">'+
                    '<div class="form-check form-check-custom form-check-solid form-check-primary me-6">'+
                    '<input class="form-check-input" type="radio" name="pack" value="'+pack_id[i]+'">'+
                    '</div>'+
                    '<div class="flex-grow-1">'+
                    '<h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap" id="pack_name">'+pack_name[i]+'</h2>'+
                    '<div class="fw-bold opacity-50">وقت الاضافة : '+created_at[i]+'</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="ms-5">'+
                        '<span class="mb-2">السعر</span>'+
                        '<span class="fs-3x fw-bolder" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">'+pack_price[i]+'</span>'+
                    '</div>'
                    );
            }
        });
        $('#famous_package').on('hide.bs.modal',function (){
            $('#start').empty()
        });
});
</script>

