@extends('layouts.site.app')
@section('profile') active @endsection
@section('site_content')

    <content>

        <section class="profilePage">
            <div class="container">

                @include('layouts.site.profileHeader')

                <div class="row">

                    @include('layouts.site.profile_sidebar')

                    @if($user->type == 'famous')
                        {{--  ==========================  Famous Content  =============================  --}}
                        <div class=" col-md-9 p-2 mt-1">

                            <div class="bio">
                                <div class="head"><i class="fad fa-person-sign me-2"></i> السيرة الذاتية
                                    @if(auth()->check())
                                        @if(auth()->user()->id==$user->id)
                                            <a href="#!" id="cv_modal" class="editBio" data-toggle="modal"
                                               data-target="#editBio"><i
                                                    class="fas fa-pencil-alt"></i> تعديل</a>
                                        @endif
                                    @endif
                                </div>
                                <div class="body">
                                    <p>{{$user->cv}}</p>
                                </div>
                            </div>

                            <div class="prices">

                                <div class="secondTitle">
                                    @if($user->status == 'accepted')
                                    <h5> اسعار الاعلانات </h5>
                                    @endif
                                    @if(auth()->check())
                                        @if(auth()->user()->id==$user->id && $user->status == 'accepted')
                                            <a href="#!" class="edit" data-toggle="modal" data-target="#addAds"><i
                                                    class="fas fa-plus-hexagon"></i>
                                                اضافة </a>
                                        @endif
                                    @endif
                                </div>
                                <div class="ads">
                                    <div class="row">
                                        @foreach($user->package as $package)
                                            <div class="col-lg-4 col-sm-6 p-2">
                                                <div class="adPrice">
                                                    @if(auth()->check())
                                                        @if(auth()->user()->id==$user->id)
                                                            <span class="DleteItem delete_element"
                                                                  data_delete="{{url('delete_package')}}"
                                                                  data_id="{{$package->id}}"> <i
                                                                    class="fas fa-trash-alt"></i> </span>
                                                        @endif
                                                    @endif
                                                    <h5> {{$package->name}} </h5>
                                                    <div class=" price"><strong> {{$package->price}} </strong> ريال
                                                    </div>
                                                    <ul style="height: 190px;overflow: auto;">
                                                        @foreach($package->details as $detail)
                                                            <li> {{$detail->title}} </li>
                                                        @endforeach
                                                    </ul>
                                                    @if(auth()->check())
                                                        @if($user->id != auth()->user()->id)
                                                            <button class="btn btn-success btn-block py-3"
                                                                    data-toggle="modal" data-target="#orderPrice"> طلب
                                                                عرض سعر
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="orderPrice" tabindex="-1" role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"> بيانات المنتج </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{url('store_ad')}}" method="post"
                                                              enctype="multipart/form-data">
                                                            <!--  class="dropzone" name="demoform" id="demoform"-->
                                                            @csrf
                                                            <input type="hidden" name="package_id"
                                                                   value="{{$package->id}}">
                                                            <input type="hidden" name="package_name"
                                                                   value="{{$package->name}}">
                                                            <input type="hidden" name="famous_id"
                                                                   value="{{$package->famous_id}}">
                                                            @if(auth()->check())
                                                                <input type="hidden" name="user_id"
                                                                       value="{{auth()->user()->id}}">
                                                            @endif
                                                            <div class="modal-body">
                                                                <h6 class="text-center mb-4"> من فضلك ادخل بيانات المنتج
                                                                    المراد الاعلان عنه </h6>

                                                                <div class="form-outline ">
                                                                    <input name="title" type="text"
                                                                           class="form-control"/>
                                                                    <label class="form-label"> اسم المنتج </label>
                                                                </div>
                                                                <div class="productImg">
                                                                    <label> <i class="fal fa-images"></i> صور
                                                                        المنتج</label>
                                                                    <input id="input-2" name="image[]" type="file"
                                                                           class="file dropify" data-show-upload="false"
                                                                           data-show-caption="true" multiple>
                                                                </div>
                                                                {{--                                                            <div class="form-group">--}}
                                                                {{--                                                                <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">--}}
                                                                {{--                                                                    <span>Upload file</span>--}}
                                                                {{--                                                                </div>--}}
                                                                {{--                                                                <div class="dropzone-previews"></div>--}}
                                                                {{--                                                            </div>--}}

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success"> ارسال
                                                                    الطلب
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>

                        </div>
                    @else
                        {{--  ==========================  Client Content  =============================  --}}
                        <div class=" col-md-9 p-2 mt-1">
                            @foreach($adses as $ads)
                                <div class="order">
                                    <div class="Company">
                                        <img class="CompanyLogo" src="{{get_file($ads->package->famous->image)}}">
                                        <div>
                                            <h5 class="CompanyName"> {{$ads->package->famous->name}}</h5>
                                            <p class="AdminPhone"> <i class="fa fa-phone"></i>
                                                <a > {{$ads->package->famous->phone}}</a>
{{--                                            <h6 class="AdminPhone"> <i class="fa fa-phone"></i> رقم الهاتف : <span>{{$ads->user->phone}}</span> </h6>--}}

                                            </p>
                                            </div>
                                        </div>

                                        <div class="product">
                                            <h5 class="productName"> اسم المنتج : <span>{{$ads->title}} </span> </h5>
                                            <h5 class="productName"> حالة المنتج :
                                                @if($ads->status=='new')<span class="text-white bg-info rounded" style="font-size: small;padding: 2px 4px;font-weight: normal">
                                                    جديد </span>
                                                @elseif($ads->status=='accepted')<span class="text-white bg-primary rounded" style="font-size: small;padding: 2px 4px;font-weight: normal">
                                                    مقبول</span>
                                                @elseif($ads->status=='refused')<span class="text-white bg-danger rounded" style="font-size: small;padding: 2px 4px;font-weight: normal">
                                                    مرفوض</span>
                                                @elseif($ads->status=='ended')<span class="text-white bg-success rounded" style="font-size: small;padding: 2px 4px;font-weight: normal">
                                                    منتهى</span>
                                                @endif
                                            </h5>
                                            <h5 class="productName"> الباقة المختارة : <span style="color:#e1306c"  >{{$ads->package->name}} </span> </h5>
                                            <div class="productPics row">
                                                @foreach($ads->images as $image)
                                                    <div class="col-lg-3 col-md-4 col-6 p-1 " style="border-radius:15px ">
                                                        <img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src="{{get_file($image->image)}}" >
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </section>

    </content>

    <!-- Modal -->
    <div class="modal fade" id="editBio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> تعديل </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('edit_cv')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="modal-body">
                        <div class="form-outline ">
                            <textarea name="cv" class="form-control" rows="5">{{$user->cv}}</textarea>
                            <label class="form-label"> السيرة الذاتية </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addAds" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> اضافة سعر </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('store_package')}}" method="post">
                    @csrf
                    <input type="hidden" name="famous_id" value="{{$user->id}}">
                    <div class="modal-body">

                        <div class="form-outline ">
                            <input type="text" name="name" class="form-control"/>
                            <label class="form-label"> اسم الباقة </label>
                        </div>

                        <div class="form-outline ">
                            <input type="text" name="price" class="form-control numbersOnly"/>
                            <label class="form-label"> السعر </label>
                        </div>

                        <div class="secondTitle">
                            <h5> اضافة مواصفات </h5>
                            <a href="#!" id="addSpecPTN" class="edit"><i class="fas fa-plus-hexagon"></i> اضافة </a>
                        </div>
                        <div class="addSpecifications">
                            <input type="text" name="title[]" class="form-control"
                                   placeholder=" مثال : عدد ايام الاعلان "/>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
@push('site_js')


    <script>
        var Specification = `
       <input type=" text " name="title[]" class="form-control" placeholder="  " /> `
        $('#addSpecPTN').click(function () {
            $('.addSpecifications').append(Specification)
        });

        jQuery(document).delegate('a.addImage', 'click', function (e) {
            e.preventDefault();
            var image = `
            <input type="file" class="dropify" name="image[]"/> `
            $(this).parent('.productImg').append(image)
        });


        {{--<!-- Adding a script for dropzone -->--}}
        {{--Dropzone.autoDiscover = false;--}}
        {{--// Dropzone.options.demoform = false;--}}
        {{--let token = $('meta[name="csrf-token"]').attr('content');--}}
        {{--$(function () {--}}
        {{--    var myDropzone = new Dropzone("div#dropzoneDragArea", {--}}
        {{--        paramName: "file",--}}
        {{--        url: "{{ url('/storeimgae') }}",--}}
        {{--        previewsContainer: 'div.dropzone-previews',--}}
        {{--        addRemoveLinks: true,--}}
        {{--        autoProcessQueue: false,--}}
        {{--        uploadMultiple: false,--}}
        {{--        parallelUploads: 1,--}}
        {{--        maxFiles: 5,--}}
        {{--        params: {--}}
        {{--            _token: token--}}
        {{--        },--}}
        {{--        // The setting up of the dropzone--}}
        {{--        init: function () {--}}
        {{--            var myDropzone = this;--}}
        {{--            //form submission code goes here--}}
        {{--            $("form[name='demoform']").submit(function (event) {--}}
        {{--                //Make sure that the form isn't actully being sent.--}}
        {{--                event.preventDefault();--}}
        {{--                URL = $("#demoform").attr('action');--}}
        {{--                formData = $('#demoform').serialize();--}}
        {{--                $.ajax({--}}
        {{--                    type: 'POST',--}}
        {{--                    url: URL,--}}
        {{--                    data: formData,--}}
        {{--                    success: function (result) {--}}
        {{--                        if (result.status == "success") {--}}
        {{--                            // fetch the useid--}}
        {{--                            // var userid = result.user_id;--}}
        {{--                            // $("#userid").val(userid); // inseting userid into hidden input field--}}
        {{--                            //process the queue--}}
        {{--                            myDropzone.processQueue();--}}
        {{--                        } else {--}}
        {{--                            console.log("error");--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            });--}}
        {{--            //Gets triggered when we submit the image.--}}
        {{--            this.on('sending', function (file, xhr, formData) {--}}
        {{--                //fetch the user id from hidden input field and send that userid with our image--}}
        {{--                let userid = document.getElementById('userid').value;--}}
        {{--                formData.append('userid', userid);--}}
        {{--            });--}}

        {{--            this.on("success", function (file, response) {--}}
        {{--                //reset the form--}}
        {{--                $('#demoform')[0].reset();--}}
        {{--                //reset dropzone--}}
        {{--                $('.dropzone-previews').empty();--}}
        {{--            });--}}
        {{--            this.on("queuecomplete", function () {--}}

        {{--            });--}}

        {{--            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead--}}
        {{--            // of the sending event because uploadMultiple is set to true.--}}
        {{--            this.on("sendingmultiple", function () {--}}
        {{--                // Gets triggered when the form is actually being sent.--}}
        {{--                // Hide the success button or the complete form.--}}
        {{--            });--}}

        {{--            this.on("successmultiple", function (files, response) {--}}
        {{--                // Gets triggered when the files have successfully been sent.--}}
        {{--                // Redirect user or notify of success.--}}
        {{--            });--}}

        {{--            this.on("errormultiple", function (files, response) {--}}
        {{--                // Gets triggered when there was an error sending the files.--}}
        {{--                // Maybe show form again, and notify user of error--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endpush
