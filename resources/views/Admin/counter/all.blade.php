
@extends('layouts.admin.app')
<style>
    .grid-container {
        display: grid;
        grid-template-columns:   auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto;
        padding: 2%;
    }
    .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 10px;
        text-align: center;
    }
</style>
<link href="{{url('admin')}}/assets/css/all.css" rel="stylesheet" type="text/css" />
@section('page_name') العداد @endsection
@section('content')


<!-----------------------------------Start Data Table ------------------------------------->
<br>
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
<div class="card mb-5 mb-xl-8 mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">العداد </span>
        </h3>
        <div class="card-toolbar">
            <a href="" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2" data-bs-toggle="modal" data-bs-target="#create_slider"><span><i class="bi bi-plus-circle"></i></span>اضافة عداد</a>
            <a href="" class="btn btn-light-danger er fs-6 px-7 py-3" data-bs-toggle="modal" data-bs-target="#delete_all"><span><i class="bi bi-dash-circle"></i></span>حذف الكل</a>
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
                    <th>#</th>
                    <th class="ps-4 min-w-100px rounded-start">الايقونه</th>
                    <th class="min-w-80px">العنوان</th>
                    <th class="min-w-125px">العداد</th>
                    <th class="min-w-200px rounded-end">حذف</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($counters as $counter)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
								  <i class="{{$counter->icon}}" style="font-size:25px;padding:15%;border-radius:50%;"></i>
                                </span>
                            </div>
                        </div>
                    </td>

                    <td>{{$counter->title}}</td>
                    <td>{{$counter->number}}</td>
                    <td>
                        <button data-bs-toggle='modal' data-bs-target="#delete_slider" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important;"
                                data-id="{{$counter->id}}" data-slider_title="{{$counter->title}}"
                        >
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-trash"></i>
                                </span>
                            </span>
                            <!--end::Svg Icon-->
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
</div>
<!-----------------------------------end Data Table ------------------------------------->

<!-------------------------Start DELETE ALL Form ------------------------------------------------------------>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_all_counter')}}" method="post">
                    <!--begin::Input group-->
                    {{csrf_field()}}
                    <div class="d-flex flex-column mb-3 fv-row">
                        <!--begin::Label-->
                            <h4>سيتم حذف جميع بيانات العداد ! هل تريد المتابعة</h4>
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
<!-------------------------end DELETE ALL Form ------------------------------------------------------------>

<!-------------------------Start DELETE Form ------------------------------------------------------------>
<div class="modal fade" id="delete_slider" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف عداد</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_one_counter')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا العداد</h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
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
<!-------------------------End DELETE Form -------------------------------------------------------------->


<!-------------------------start ADD Form -------------------------------------------------------------->
<div class="modal fade show" id="create_slider" tabindex="-1" aria-modal="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>اضافة بيانات للعداد</h2>
                <!--end::Modal title-->
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-1">
                <!--begin::Form-->
                <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('create_counter')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container"   >
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">العنوان</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب جملة قصيرة" name="title" value="" autocomplete="off">
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold form-label mb-2">العداد</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="اضف رقم للعداد" name="number" value="" autocomplete="off">
                            <!--end::Input-->
                        </div>
                        <!--end::Input wrapper-->
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group-->

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">الايقونه</label>
                            <!--end::Label-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--begin::Input wrapper-->
                        <div class="position-relative">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" style="margin-bottom:10px" id="input_icon" placeholder="اضف ايقونه للعداد" name="icon" value="" autocomplete="off">
                            <!--end::Input-->
                        </div>
                        <!--end::Input wrapper-->
                        <div class="grid-container" style="max-height:300px;border:.5px solid lightblue;border-radius: 15px ;overflow:scroll;padding:10px   " >
                            @foreach(get_font_icons() as $key=>$value)
                                <div class="grid-item icon_" id="div_icon" style="cursor: pointer"><i value="{{$value}}" class="{{$value}}" id="{{$key}}" onClick="get_icon(this.id)"></i></div><br>
                            @endforeach
                        </div>

                    <!--begin::Actions-->
                    <div class="text-center pt-5">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">اضافة</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <div>
                    </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-------------------------end ADD Form -------------------------------------------------------------->




@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

<script>
    $(document).ready(function(){
        //Show data in the delete form
    $('#delete_slider').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var title = button.data('slider_title')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #slider_title').val(title);
    });

        //Show data in the edit form
     $('#edit_counter').on('show.bs.modal', function(event) {
         var button = $(event.relatedTarget)
         var id = button.data('id')
         var title = button.data('slider_title')
         var content = button.data('slider_content')
         var btn_name = button.data('slider_btn')
         var btn_link = button.data('slider_btn_link')
         var img_show = button.data('slider_image')
         var modal = $(this)
         modal.find('.modal-body #id').val(id);
         modal.find('.modal-body #img_show').attr('src',img_show);
         modal.find('.modal-body #slider_title').val(title);
         modal.find('.modal-body #slider_content').val(content);
         modal.find('.modal-body #slider_btn').val(btn_name);
         modal.find('.modal-body #slider_btn_link').val(btn_link);
     });





    });


</script>
<script type="text/javascript">
    function get_icon($id){
        var get_value_from_div = document.getElementById($id).getAttribute('class');
      document.getElementById("input_icon").value= get_value_from_div ;
    }
</script>
