@extends('Layouts.admin.app')
    @section('title') المشرفين @endsection
@section('content')


{{--    <div class="m-content">--}}
{{--        <div class="m-portlet m-portlet--mobile">--}}
{{--            <div class="m-portlet__head">--}}
{{--                <div class="m-portlet__head-caption">--}}
{{--                    <div class="m-portlet__head-title">--}}
{{--                        <h3 class="m-portlet__head-text">--}}
{{--                            مشرفين شلى--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="m-portlet__head-tools">--}}
{{--                    <ul class="m-portlet__nav">--}}
{{--                        <li class="m-portlet__nav-item">--}}
{{--                            <button type="button" class="dt-button btn btn-danger delBtn btn_space" style="left: auto!important;" onclick="multycheck(); return false;"  data-toggle="modal"  data-target="#check" id="pass"><i class="fa fa-trash"></i></button>--}}
{{--                        </li>--}}
{{--                        <li class="m-portlet__nav-item"></li>--}}

{{--                        <li class="m-portlet__nav-item">--}}
{{--                            <a href="{{route('add-admin')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" >--}}
{{--                            <span>--}}
{{--                                <i class="la la-plus"></i>--}}
{{--                                <span>مشرف جديد</span>--}}
{{--                            </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="m-portlet__body">--}}

{{--                <!--begin: Datatable -->--}}






{{--                <table id="example" class="table table-striped- table-bordered table-hover table-checkable" style="width:100%">--}}
{{--                    <thead style="background-color: #34bfa3;">--}}
{{--                    <tr>--}}
{{--                        <th style="width: 30px!important;">--}}
{{--                            <input type="checkbox" class="check_all" style="box-sizing: border-box;background-color: indigo!important;font-size: 10px" onclick="check_all()" />--}}
{{--                        </th>--}}
{{--                        <th>#</th>--}}
{{--                        <th>الإسم</th>--}}
{{--                        <th>البريد الإلكترونى</th>--}}
{{--                        <th>رقم الهاتف</th>--}}
{{--                        <th>الصوره</th>--}}
{{--                        <th>تعديل</th>--}}
{{--                        <th>حذف</th>--}}

{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($data as $user)--}}
{{--                        @if($user->id != admin()->user()->id)--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <input type="checkbox" name="checkvalue" id="checkItem" class="item_checkbox" style="margin-right: -21px!important;" value="{{$user->id}}">--}}
{{--                            </td>--}}
{{--                            <td>{{$i}}</td>--}}

{{--                            <td>{{$user->name}}</td>--}}
{{--                            <td>{{$user->email}}</td>--}}
{{--                            <td>{{$user->phone}}</td>--}}
{{--                            <td><img style="width: 70px;height: 70px" src="{{get_file($user->image)}}" alt="user" onclick="window.open(this.src)"/></td>--}}
{{--                            <td >--}}
{{--                                <form action="{{route('admin_edit')}}" enctype="application/x-www-form-urlencoded" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="id" value="{{$user->id}}">--}}
{{--                                    <button type="submit" class="btn btn-info btn-sm"   ><i class="fa fa-edit" style="margin-left: 1px"></i></button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <button type="button" class="btn btn-danger btn-sm"    data-toggle="modal"  data-target="#delete{{$user->id}}" ><i class="fa fa-trash" style="margin-left: 1px"></i></button>--}}
{{--                            </td>--}}

{{--                            <?php--}}
{{--                            $i++?>--}}

{{--                            <div id="delete{{ $user->id }}" class="modal fade" role="dialog">--}}
{{--                                <div class="modal-dialog">--}}
{{--                                    <!-- Modal content-->--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <span style="float: right;font-weight: bold;font-style: italic">حذف مشرف</span>--}}
{{--                                            <button class="btn btn-sm btn-info" style="float: left" data-dismiss="modal"> x </button>--}}
{{--                                        </div>--}}
{{--                                        <form action="{{route('admin_delete')}}" method="post" enctype="multipart/form-data">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="id" value="{{$user->id}}">--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <h4>هل أنت متاكد من حذف  {{$user->name}}</h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button  type="button" class="btn btn-info " data-dismiss="modal">الغاء</button>--}}
{{--                                                <button class="btn btn-danger" type="submit">حذف</button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </tr>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}

{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- END EXAMPLE TABLE PORTLET-->--}}
{{--    </div>--}}

<br>
<br>
<div class="card mb-5 mb-xl-8 mt-15">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">مشرفين صيت المشاهير</span>
            <span class="text-muted mt-1 fw-bold fs-7"><a href="{{route('add-admin')}}">اضافة مشرف</a> </span>
        </h3>
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true" style="">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">تحكم</div>
                </div>
                <div class="separator mt-3 opacity-75"></div>
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary btn-sm px-4" href="{{route('add-admin')}}">اضافة جديد</a>
                    </div>
                </div>
{{--                <div class="menu-item px-3">--}}
{{--                    <div class="menu-content px-3 py-3">--}}
{{--                        <a class="btn btn-danger btn-sm px-4 multicheck" onclick="multycheck();" data_delete="{{route('admin_delete')}}" data_id="{{$user->id}}">حذف المحدد</a>--}}
{{--                    </div>--}}
{{--                    <button type="button" class="dt-button btn btn-danger delBtn btn_space" style="left: auto!important;" onclick="multycheck(); return false;"  data-toggle="modal"  data-target="#check" id="pass"><i class="fa fa-trash"></i></button>--}}

{{--                </div>--}}
            </div>
            <!--end::Menu 2-->
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table id="kt_datatable_example_5" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                <!--begin::Table head-->
                <thead>
                <tr class="fw-bolder text-muted">
                    {{--                    <th class="w-25px">--}}
                    {{--                        <div class="form-check form-check-sm form-check-custom form-check-solid">--}}
                    {{--                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check">--}}
                    {{--                        </div>--}}
                    {{--                    </th>--}}
                    <th class="min-w-20px">#</th>
                    <th class="min-w-140px">الاسم</th>
                    <th class="min-w-120px">الصورة</th>
                    <th class="min-w-120px">البريد الالكترونى</th>
                    <th class="min-w-120px">رقم الهاتف</th>
                    <th class="min-w-100px text-end">العمليات</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($data as $user)
                    @if($user->id != admin()->user()->id)
                        <tr>
                            {{--                            <td>--}}
                            {{--                                <div class="form-check form-check-sm form-check-custom form-check-solid">--}}
                            {{--                                    <input class="form-check-input widget-13-check item_checkbox" name="checkvalue" id="checkItem" type="checkbox" value="{{$user->id}}">--}}
                            {{--                                </div>--}}
                            {{--                            </td>--}}
                            <td>
                                <a  class="text-dark fw-bolder text-hover-primary fs-6">{{$i}}</a>
                            </td>
                            <td>
                                <a  class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$user->name}}</a>
                                {{--                        <span class="text-muted fw-bold text-muted d-block fs-7">Code: BY</span>--}}
                            </td>
                            <td>
                                <div class="symbol symbol-45px me-5">
                                    <img onclick="window.open(this.src)" alt="Pic" src="{{get_file($user->image)}}">
                                </div>
                            </td>
                            <td>
                                <a  class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$user->email}}</a>
                                {{--                        <span class="text-muted fw-bold text-muted d-block fs-7">Code: Paid</span>--}}
                            </td>
                            <td>
                                <a  class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$user->phone}}</a>
                                {{--                        <span class="text-muted fw-bold text-muted d-block fs-7">Houses &amp; Hotels</span>--}}
                            </td>
                            <td class="text-end">
                                <a href="{{route('admin_edit',$user->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>



                                <a data_delete="{{route('admin_delete')}}" data_id="{{$user->id}}"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete_element">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endif
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


<div id="check" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin_check.delete')}}" method="post" enctype="application/x-www-form-urlencoded">
                @csrf
                <input type="hidden" name="id" value="" />
                <div class="modal-header">
                    <span style="float: right;font-weight: bold;font-style: italic">حذف مشرفين</span>
                    <button class="btn btn-sm btn-info" style="float: left" data-dismiss="modal"> x </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-dark text-center" style="border: 0">
                        <h4 id="text">هل انت موافق على حذف المشرفين المحددين<br> وعددهم <span id="span" style="color:red;"></span> ! </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-info " data-dismiss="modal">الغاء</button>
                    <button class="btn btn-danger" type="submit">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

