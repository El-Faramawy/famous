@extends('layouts.admin.app')
@section('page_name') اضافة مشرف @endsection
@section('content')
    <br>
    <br>
    <br>
    <div class="m-content">
        <div class="box">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> اضافة مشرف جديد </h3>
                </div>
                <hr><br>
                <!-- /.box-header -->
                <form method="POST" action="{{route('store.admin')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="form-group col-6">
                        <label for="name">الإسم:</label>
                        <input class="form-control" name="name" type="text" id="name" placeholder="الإسم..." required>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">البريد الإلكترونى:</label>
                        <input class="form-control" name="email" type="email" id="name" placeholder="البريد الإلكترونى..." required>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">رقم الهاتف:</label>
                        <input class="form-control numbersOnly" name="phone" type="text" id="name" placeholder="رقم الهاتف..." required>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">كلمة السر:</label>
                        <input class="form-control" name="password" type="password" id="name" placeholder="كلمة السر..." required>
                    </div>


                    <div class="form-group col-12">
                        <label for="image">الصوره</label>
                        <input type="file" name="image"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"
                               data-default-file="" >
                    </div>
                </div>
                    <div style="text-align: center" class="mt-5">
                        <input class="btn btn-info col-2 text-center" style="font-size: medium" type="submit" value="حفظ">
                    </div>
                </form>



            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->



    </div>
    {{--    </div>--}}

@endsection
