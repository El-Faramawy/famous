@extends('layouts.admin.app')
@section('page_name') مشاهير VIP @endsection
@section('content')


    <!-----------------------------------Start Data Table ------------------------------------->
    <br>
    <br>
    <br>
    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">قائمة مشاهير VIP</span>
            </h3>
            <div class="card-toolbar">
                @if($VIPFamous->count() > 0)
                    <a href="" class="btn btn-light-danger er fs-6 px-7 py-3" data-bs-toggle="modal"
                       data-bs-target="#Deactivate_all">
                        <span><i class="bi bi-dash-circle"></i></span>
                        الغاء الكل</a>
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
                        <th class="ps-4 min-w-100px rounded-start">المشهور</th>
                        <th class="min-w-125px">رقم الهاتف</th>
                        <th class="min-w-125px">التقييم</th>
                        <th class="min-w-80px">تاريخ الانضمام</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($VIPFamous as $famous)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer'
                                         src={{asset($famous->image)}}  alt="">
								</span>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href=""
                                           class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$famous->name}}</a>
                                        <span
                                            class="text-muted fw-bold text-muted d-block fs-6">{{$famous->job->title}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{$famous->phone}}</td>

                            <td>
                                {{--                        <div class="h-4px w-100 bg-light" data-bs-toggle="tooltip" title="حصل علي  {{$famous->rate}}  %">--}}
                                {{--                            @if($famous->rate <= 25)--}}
                                {{--                                <div class="bg-danger rounded h-5px" role="progressbar" style="width: {{$famous->rate}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                {{--                            @elseif($famous->rate <= 50)--}}
                                {{--                                <div class="bg-info rounded h-5px" role="progressbar" style="width: {{$famous->rate}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                {{--                            @elseif($famous->rate <= 75)--}}
                                {{--                                <div class="bg-primary rounded h-5px" role="progressbar" style="width: {{$famous->rate}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                {{--                            @elseif($famous->rate <= 100)--}}
                                {{--                                <div class="bg-success rounded h-5px" role="progressbar" style="width: {{$famous->rate}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                {{--                            @endif--}}
                                {{--                        </div>--}}
                                @if($famous->rate == null)
                                    <span class="text-gray-600">لا يوجد تقييم</span>
                                @else
                                <div>
                            <span>
                                @for($i = 1 ; $i <= $famous->rate ; $i++)
                                    <i class="bi bi-star-fill" style="color: #FFD700" aria-hidden="true"></i>
                                @endfor
                                @for($i = 1 ; $i <= 5 - $famous->rate ; $i++)
                                    <i class="bi bi-star" style="color: #FFD700" aria-hidden="true"></i>
                                @endfor
                            </span>
{{--                                    @if($visitor_count != 0)--}}
{{--                                        <span class="count"> <b>عدد الزائرين :</b> ( {{$visitor_count}} ) زائر </span>--}}
{{--                                    @endif--}}
                                </div>
                                @endif
                            </td>

                            <td>
                                {{ArabicDate($famous->created_at)['ar_day_not_current']}} -
                                {{date('j',strtotime($famous->created_at))}}
                                {{ArabicDate($famous->created_at)['month']}}
                                {{date('Y',strtotime($famous->created_at))}}
                                <br>
{{--                                <span class="text-gray-600">{{date('H:i',strtotime($famous->created_at))}}</span>--}}
                            </td>


                            <td class="">
                                <button class="btn btn-light-danger btn-sm" style="font-size: 14px !important;"
                                        data-id='{{$famous->id}}' data-famous_name='{{$famous->name}}'
                                        data-bs-toggle='modal' data-bs-target="#deactivate_famous">
                                    الغاء عضوية VIP
                                    <i class="bi-arrow-clockwise fs-2"></i>
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

    <!-------------------------Start Deactivate ALL Form ------------------------------------------------------------>
    <div class="modal fade" id="Deactivate_all" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>الغاء عضوية VIP</h2>
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
                <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="{{route('deactivate_all_famous')}}"
                          method="post">
                        <!--begin::Input group-->
                        {{csrf_field()}}
                        <div class="d-flex flex-column mb-3 fv-row">
                            <!--begin::Label-->
                            <h4>سيتم الغاء عضوية VIP لكل المشاهير ! هل تريد المتابعة</h4>
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
    <!-------------------------end Deactivate ALL Form ------------------------------------------------------------>

    <!-------------------------Start Deactivate Form ------------------------------------------------------------>
    <div class="modal fade" id="deactivate_famous" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>الغاء عضوية VIP</h2>
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
                <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="{{route('deactivate_one_famous')}}"
                          method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من الغاء عضوية VIP لهذا المشهور ؟</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder=""
                                   name="famous_name" id="famous_name" value="">
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
    <!-------------------------End Deactivate Form -------------------------------------------------------------->


@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

<script>
    $(document).ready(function () {
        //Show data in the delete form
        $('#deactivate_famous').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('famous_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #famous_name').val(name);
        });
    });
</script>

