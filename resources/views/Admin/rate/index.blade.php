@extends('layouts.admin.app')
@section('page_name') تقييمات ومراجعات @endsection
@section('content')

<!-----------------------------------Start Data Table ------------------------------------->
<br>
<br>
<br>
<br>
@if($rates->count() == 0)
    <div class="pt-lg-10">
        <!--begin::Logo-->
        <h2 class="fw-bolder text-gray-700 mb-10">لا يوجد اي مراجعات حتي الان</h2>
        <!--end::Logo-->
        <!--begin::Message-->
        <div class="fw-bold fs-3 text-gray-400 mb-15">انتظر حتي يتم اضافة تقييم لمشهور</div>
        <!--end::Message-->
    </div>
@endif
<div class="mt-10 row">
    @foreach($rates as $rate)
    <div class="col-xl-6">
        <div class="card mb-5 mb-xxl-8">
        <!--begin::Body-->
            <div class="card-body pb-0">
            <!--begin::Header-->
                <div class="d-flex align-items-center mb-5">
                <!--begin::User-->
                    <div class="d-flex align-items-center flex-grow-1">
                    <!--begin::Avatar-->
                        <div class="symbol symbol-45px me-5">
                            <img  alt="" onclick="window.open(this.src)" style='cursor: pointer' src={{asset(\App\User::where('id',$rate->user_id)->first()->image)}}>
                        </div>
                    <!--end::Avatar-->
                    <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <a href="{{route('clients')}}" class="text-gray-800 text-hover-primary fs-6 fw-bolder">{{App\User::where('id',$rate->user_id)->first()->name}}</a>
                            <a href="{{route('famous')}}" class="text-gray-400 fw-bold">مراجعة خاصة ب{{App\User::where('id',$rate->famous_id)->first()->name}}</a>
                        </div>
                    <!--end::Info-->
                </div>
                <!--end::User-->
            </div>
            <!--end::Header-->
            <!--begin::Post-->
            <div class="mb-2">
                <!--begin::Text-->
                <p class="text-gray-800 fw-normal mb-5">{{$rate->comment}}</p>
                <!--end::Text-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center mb-1">
                    <span>
                        @for($i = 1 ; $i <= $rate->rate ; $i++)
                             <i class="bi bi-star-fill" style="color: #FFD700" aria-hidden="true"></i>
                        @endfor
                        @for($i = 1 ; $i <= 5 - $rate->rate ; $i++)
                             <i class="bi bi-star" style="color: #FFD700" aria-hidden="true"></i>
                        @endfor
                    </span>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Post-->
            <!--begin::Separator-->
            <div class="separator mb-2"></div>
            <!--end::Separator-->
            <div class="mb-2 text-right">
                <button data-id="{{$rate->id}}" data-comment="{{$rate->comment}}" data-bs-target="#delete_rate" title="حذف" class="btn btn-icon btn-danger btn-sm me-1" data-bs-toggle="modal" style="border-radius: 50% !important">
                            <span class="svg-icon svg-icon-3">
                                <i class="fa fa-trash"></i>
                            </span>
                </button>
            </div>
        </div>
        <!--end::Body-->
    </div>
<!-------------------------Start DELETE modal ------------------------------------------------------------>
<div class="modal fade" id="delete_rate" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>حذف تعليق</h2>
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
                        <form id="kt_modal_new_card_form" class="form" action="{{route('delete_rate')}}" method="post">
                            {{csrf_field()}}

                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <h4 class="pb-3">هل انت متاكد من حذف هذا التعليق</h4>
                                <!--end::Label-->
                                <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                                <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="comment" id="comment" value="">
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

    </div>
    @endforeach
</div>

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

<script>
    $(document).ready(function() {
        //Show data in the delete modal
        $('#delete_rate').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var comment = button.data('comment')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #comment').val(comment);
        });
    });
</script>
