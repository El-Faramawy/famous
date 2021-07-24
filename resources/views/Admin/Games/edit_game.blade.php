@extends('layouts.admin.app')
@section('title')
    <li class="m-nav__item">
        <a href="{{route('games')}}" class="m-nav__link">
            <span class="m-nav__link-text">الالعاب</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{route('add_game')}}" class="m-nav__link">
            <span class="m-nav__link-text">اضافة لعبة جديدة</span>
        </a>
    </li>
@endsection
@section('content')

    <div class="m-content">

        <div class="box" style="margin: 25px 0px;">


            <div class="box">

                <div class="box-header">
                    <h3 class="box-title"> تعديل لعبة  </h3>
                </div>
                <hr><br>
                <!-- /.box-header -->

                <form method="POST" action="{{route('update_game')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="{{$game->id}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">الإسم :</label>
                            <input class="form-control" value="{{$game->title_ar}}" name="title_ar" type="text" id="name" placeholder="الإسم..." required>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">اسم المنطقة :</label>
                            <select class="form-control " name="area_id" id="name" required>
                                <option value="">اختر المنطقة</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id}}" {{$game->area_id==$area->id?'selected':''}}>{{$area->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">اللغة :</label>
                            <select class="form-control " name="language_id" id="name" required>
                                <option value="">اختر اللغة</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}" {{$game->language_id==$language->id?'selected':''}}>{{$language->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">اسم المنصة :</label>
                            <select class="form-control " name="platform_id" id="name" required>
                                <option value="">اختر المنصة</option>
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}" {{$game->platform_id==$platform->id?'selected':''}}>{{$platform->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">نوع اللعبة :</label>
                            <select class="form-control " name="game_type_id" id="name" required>
                                <option value="">اختر اللعبة</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{$game->game_type_id==$type->id?'selected':''}}>{{$type->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
{{--                        <div class="form-group col-4">--}}
{{--                            <label for="name">العملة :</label>--}}
{{--                            <select class="form-control " name="currency_id" id="name" required>--}}
{{--                                <option value="">اختر العملة</option>--}}
{{--                                @foreach($currencys as $currency)--}}
{{--                                    <option value="{{$currency->id}}" {{$game->currency_id==$currency->id?'selected':''}}>{{$currency->title_ar}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group col-6">
                            <label for="name">لينك اللعبة على اليوتيوب:</label>
                            <input class="form-control " value="{{$game->link}}" name="link" type="text" id="name" placeholder="اللينك..." >
                        </div>
                        <div class="form-group col-6">
                            <label for="name">الحد الادنى :</label>
                            <input class="form-control numbersOnly" value="{{$game->min_quantity}}" minlength="1" name="min_quantity" type="text" id="name" placeholder="الحد الادنى..." required>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">الحد الاقصى :</label>
                            <input class="form-control numbersOnly" value="{{$game->max_quantity}}" name="max_quantity" type="text" id="name" placeholder="الحد الاقصى..." required>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">الحد الادنى للمجانى :</label>
                            <input class="form-control numbersOnly" value="{{$game->free_num}}" name="free_num" type="text" id="name" placeholder="مثال لعبة مجانية لكل (5) العاب..." >
                        </div>

                        <div class="form-group col-6">
                            <label for="image"> الصوره :</label>
                            <input type="file" name="image"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"
                                   data-default-file="{{get_file($game->image)}}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="image"> صورة الخلفية :</label>
                            <input type="file" name="panner"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"
                                   data-default-file="{{get_file($game->panner)}}" >
                        </div>
                        <div class="form-group col-6">
                            <label for="name">معلومات مهمة :</label>
                            <textarea name="details">{{!!$game->details}}</textarea>
                            <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'details' );
                            </script>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">خطوات الدفع :</label>
                            <textarea name="pay_steps">{{!!$game->pay_steps}}</textarea>
                            <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'pay_steps' );
                            </script>
                        </div>


                    </div>

                    <div style="text-align: center" class="mt-5">
                        <input class="btn btn-info col-2 text-center" style="font-size: medium" type="submit" value="حفظ">
                    </div>
                </form>



            </div>
            <!-- /.box-body -->
        </div>

    </div>


@endsection


