@extends('layouts.admin.app')
@section('page_name') عروضنا @endsection
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
            <span class="card-label fw-bolder fs-3 mb-1">العروض </span>
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
                        <th class="min-w-80px">الاسم</th>
                        <th class="min-w-80px">السعر</th>
                        <th class="min-w-80px"> تابعه للمشهور:</th>
                     </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($packages as $package)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$package->name}}</td>
                    <td>{{$package->price}}</td>
                    <td>{{$package->user->name}}</td>
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

