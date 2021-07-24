<script src="{{url('/')}}admin/js/jquery-3.4.1.min.js"></script>
<script src="{{url('/')}}/admin/js/popper.min.js"></script>
<script src="{{url('/')}}/admin/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/admin/js/mdb.min.js"></script>
<script src="{{url('/')}}/admin/js/smooth-scroll.min.js"></script>
<script src="{{url('/')}}/admin/js/swiper.js"></script>
<script src="{{url('/')}}/admin/js/aos.js"></script>
<script src="{{url('/')}}/admin/js/datatables2.min.js"></script>
<script src="{{url('/')}}/admin/js/Custom.js"></script>
<script src="{{url('/')}}/admin/js/bootoast.min.js"></script>

<script>
    $.validate({
    });
</script>
<script src="{{url('admin')}}/js/jquery.form-validator.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<!--begin::Global Theme Bundle -->
<script src="{{url('admin')}}/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="{{url('admin')}}/assets/demo/demo6/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="{{url('admin')}}/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{{url('admin')}}/assets/app/js/dashboard.js" type="text/javascript"></script>

{{--=================  dropfy  ================--}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });//end jquery
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.file_upload').imageuploadify();
    })
</script>


<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>
{{--======================= end dropyfi========================--}}

<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!--begin::Page Vendors -->
<script src="{{url('admin')}}/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script src="{{url('admin')}}/assets/demo/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>

<script src="{{url('admin/js')}}/dataTables.buttons.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "language": {
                "lengthMenu": "عرض _MENU_ من المدخلات",
                "zeroRecords": "نأسف لم نجد أى بيانات",
                "info": "عرض الصفحه _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد بيانات متاحه",
                "infoFiltered": "(تم البحث فى _MAX_ من المدخلات)"
            },
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "الكل"] ]
        } );
    } );
</script>
<script>
    function check_all()
    {
        $('input[class="item_checkbox"]:checkbox').each(function(){
            if ( $('input[class="check_all"]:checkbox:checked').length == 0 ) {
                $(this).prop('checked', false);
            }else {
                $(this).prop('checked', true);
            }
        });
    }
</script>

{{--=====================  select to  =========================--}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

{{--=====================  numbersOnly  =========================--}}

<script>
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>

{{--===================  toster ==============================--}}

<script src="{{url('admin/js')}}/tostar.js"></script>
<script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'info':
            toastr.options.timeOut = 10000;
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('music/Success 12.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('music/error2.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>

<script type="text/javascript" charset="utf8" src="{{url('admin/js')}}/check.js"></script>

{{--==================  Ajax ====================--}}

{{--<script type="text/javascript">--}}
{{--    $('#get_items').on('change',function(){--}}
{{--        $value=$(this).val();--}}
{{--        var val = $value;--}}
{{--        var routeAction='{{route('store-first-data')}}';$.ajax({--}}
{{--            type: 'get',--}}
{{--            url: routeAction,--}}
{{--            data: {'store':val},--}}
{{--            success:function(data){--}}
{{--                if (data=='not'){--}}
{{--                    $('#first').hide();--}}
{{--                    $('#alert').show();--}}
{{--                }else {--}}
{{--                    $('#first').show();--}}
{{--                    $('#alert').hide();--}}
{{--                    $('#tbody').html(data);--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}


