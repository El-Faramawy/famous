@extends('layouts.admin.app')
@section('page_name') الاعلانات السابقة @endsection
@section('content')


<!-----------------------------------Start Data Table ------------------------------------->
<br>
<br>
<br>
<div class="card mb-5 mb-xl-8 mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">الاعلانات السابقة للمشاهير</span>
        </h3>

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
                    <th class="ps-4 min-w-100px rounded-start">عنوان الاعلان</th>
                    <th class="min-w-80px">رابط الفيديو</th>
                    <th class="min-w-80px">الوقت</th>
{{--                    <th class="min-w-80px">اا</th>--}}
                    <th class="min-w-80px">تابع للمشهور:</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($Prev_ads as $ad)

                    <td>{{$loop->iteration}}</td>
                    <td>
                        <div class="d-flex justify-content-start flex-column">
                                <a class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$ad->name}}</a>
                        </div>
                    </td>

                    <td>
                        @if($ad->link != null)
                            <a href="{{$ad->link}}" target="_blank"> <span class="menu-icon"><i class="bi bi-youtube text-danger fs-2"></i></span></a>
                        @else
                            <a href="{{asset($ad->video)}}" target="_blank"> <span class="menu-icon"><i class="bi bi-youtube text-danger fs-2"></i></span></a>
                        @endif
                    </td>

                    <td>
                        {{ArabicDate($ad->date)['ar_day_not_current']}} -
                        {{date('j',strtotime($ad->date))}}
                        {{ArabicDate($ad->date)['month']}}
                        {{date('Y',strtotime($ad->date))}}
                    </td>

                    <td><span class="fw-bolder">{{$ad->famous->name}} </span>@if($ad->famous->is_favorite == 'yes')<i class="fa fa-medal text-warning" @endif</td>
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

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>


