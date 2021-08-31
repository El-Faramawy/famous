@extends('layouts.admin.app')
@section('page_name') قائمة العملاء @endsection
@section('content')


    <!-----------------------------------Start Data Table ------------------------------------->
    <br>
    <br>
    <br>

    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">قائمة العملاء</span>
            </h3>
            <div class="card-toolbar">
                <a href="" class="btn btn-light-danger er fs-6 px-7 py-3" data-bs-toggle="modal"
                   data-bs-target="#delete_all">
                    <span><i class="bi bi-dash-circle"></i></span>
                    حذف الكل</a>
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
                        <th class="ps-4 min-w-100px rounded-start">العميل</th>
                        <th class="min-w-80px">اسم الشركة</th>
                        <th class="min-w-125px">ايميل الشركة</th>
                        <th class="min-w-125px">رقم الهاتف</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer'
                                         src={{asset($client->image)}}  alt="">
								</span>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a
                                            class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$client->name}}</a>
                                        {{--                                <span class="text-muted fw-bold text-muted d-block fs-6">{{$client->job->title}}</span>--}}
                                    </div>
                                </div>
                            </td>

                            <td>{{$client->company_name}}</td>

                            <td><a href="{{$client->company_email}}" class="bi bi-link"></a> {{$client->company_email}}
                            </td>

                            <td>{{$client->phone}}</td>

                            <td class="">
                                <button class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" title="تفاصيل"
                                        data-bs-toggle="modal" data-bs-target="#client_info"
                                        style="border-radius: 50% !important"
                                        data-image='{{asset($client->image)}}' data-client_name='{{$client->name}}'
                                        data-date='{{$client->created_at}}' data-tax_num='{{$client->tax_num}}'
                                        data-phone='{{$client->phone}}'
                                        data-trad_num='{{$client->id}}' data-id_num='{{$client->id_num}}'
                                        data-company_name='{{$client->company_name}}'
                                        data-company_email='{{$client->company_email}}'
                                >
                            <span class="svg-icon svg-icon-3">
                                <i class="bi bi-info" style="font-size: 20px !important;"></i>
                            </span>
                                </button>

                                <button data-id="{{$client->id}}" data-client_name="{{$client->name}}"
                                        data-bs-target="#delete_client" title="حذف"
                                        class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-bs-toggle="modal"
                                        style="border-radius: 50% !important">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-trash"></i>
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
    <!-----------------------------------end Data Table ------------------------------------->

    <!-------------------------Start DELETE ALL modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_all" tabindex="-1" aria-hidden="true">
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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
                            </g>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-3 mx-xl-15">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_all_clients')}}"
                          method="post">
                        <!--begin::Input group-->
                        {{csrf_field()}}
                        <div class="d-flex flex-column mb-3 fv-row">
                            <!--begin::Label-->
                            <h4>سيتم حذف كل العملاء ! هل تريد المتابعة</h4>
                            <!--end::Label-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center pt-3">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3"
                                    data-bs-dismiss="modal">الغاء
                            </button>
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
    <div class="modal fade" id="delete_client" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف عميل</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                               fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2"
                                                                      rx="1"/>
																<rect fill="#000000" opacity="0.5"
                                                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                                      x="0" y="7" width="16" height="2" rx="1"/>
															</g>
														</svg>
					</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-3 mx-xl-15">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_one_client')}}"
                          method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا العميل</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder=""
                                   name="client_name" id="client_name" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3"
                                    data-bs-dismiss="modal">الغاء
                            </button>
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


    <!-------------------------start INFO modal -------------------------------------------------------------->
    <div class="modal fade" id="client_info" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" style="padding:10px">
                    <!--begin::Modal title-->
                    <h3>تفاصيل العميل</h3>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                               fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2"
                                                                      rx="1"/>
																<rect fill="#000000" opacity="0.5"
                                                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                                      x="0" y="7" width="16" height="2" rx="1"/>
															</g>
														</svg>
					</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-1 mx-xl-15 my-1" style="padding: 10px">

                    <div class="card mb-1 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-1">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="" alt="image" id="image">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1"
                                   id="client_name"></a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-bold text-gray-400 mb-6" id="company_name"></div>
                                <!--end::Position-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap flex-center">
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                     href="#kt_customer_view_details" role="button" aria-expanded="false"
                                     aria-controls="kt_customer_view_details">باقي التفاصيل
                                    <span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<path
                                                                        d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
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
                                <div class="py-1 fs-6">
                                    <!--begin::Badge-->
                                    <div class="badge badge-light-info d-inline" id="date">تاريخ التسجيل :</div>
                                    <!--begin::Badge-->
                                    <!--begin::Details item-->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="fw-bolder mt-5">رقم السجل التجاري</div>
                                            <div class="text-gray-600" id="trad_num"></div>
                                        </div>
                                        <div class="col-6">
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">الرقم الضريبي</div>
                                            <div class="text-gray-600" id="tax_num"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">ايميل الشركة</div>
                                            <div class="text-gray-600">
                                                <a href="" class="text-gray-600 text-hover-primary"
                                                   id="company_email"></a>
                                            </div>
                                        </div>
                                        <!--begin::Details item-->
                                        <div class="col-6">
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">الهاتف</div>
                                            <div class="text-gray-600" id="phone"></div>
                                        </div>
                                    </div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-primary me-3"
                                data-bs-dismiss="modal">اغلاق
                        </button>
                        <span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </div>
                    <!--end::Actions-->

                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!-------------------------end INFO modal -------------------------------------------------------------->


@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        //Show data in the delete modal
        $('#delete_client').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('client_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #client_name').val(name);
        });

        //Show data in info modal
        $('#client_info').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var client_name = button.data('client_name')
            var image = button.data('image')
            var trad_num = button.data('trad_num')
            var date = button.data('date')
            var phone = button.data('phone')
            var tax_num = button.data('tax_num')
            var id_num = button.data('id_num')
            var company_name = button.data('company_name')
            var company_email = button.data('company_email')
            var modal = $(this)
            modal.find('.modal-body #client_name').text(client_name);
            modal.find('.modal-body #date').append(date);
            modal.find('.modal-body #id_num').text(id_num);
            modal.find('.modal-body #image').attr('src', image);
            modal.find('.modal-body #trad_num').text(trad_num);
            modal.find('.modal-body #phone').text(phone);
            modal.find('.modal-body #tax_num').text(tax_num);
            modal.find('.modal-body #company_name').text(company_name);
            modal.find('.modal-body #company_email').text(company_email);
            modal.find('.modal-body #company_email').attr('href', company_email);
        });
    });
</script>

