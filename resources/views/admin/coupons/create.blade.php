@extends('admin.layout.master')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد کد تخفیف جدید</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/coupons" method="post">
                        @csrf
                        <div class="form-group">
                            <labe for="name">عنوان کد :</labe>
                            <input type="text" value="" name="title" class="form-control"
                                   placeholder="عنوان کد را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name"> کد :</labe>
                            <input type="text" value="" name="code" class="form-control">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name"> مقدار :</labe>
                            <input type="text" value="" name="value" class="form-control">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name"> وضعیت :</labe>
                            <input style="vertical-align: middle" type="radio" value="0" name="status" ><span style="margin-right: 7px;vertical-align: middle;">منتشر نشده</span>
                            <input style="margin-right: 30px;vertical-align: middle" type="radio" value="1" name="status" checked><span style="margin-right: 7px;">منتشر شده</span>
                        </div>{{--form-control--}}

                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>

@endsection

@section('js_dropzone')
    <script type="text/javascript" src="{{asset('/admin/js/dropzone.min.js')}}"></script>
    <script>
        $("#photo").dropzone({ url: "{{route('photos.upload')}}",
            addRemoveLinks:true,
            maxFiles:1,
            sending:function (file,xhr,formData) {
                formData.append("_token","{{csrf_token()}}")
            },
            success:function (file,response) {
document.getElementById('brand_photo').value=response.photo_id
                console.log(response);
            }
        });

    </script>

@endsection

