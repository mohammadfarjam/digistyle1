@extends('admin.layout.master')

@section('style_dropzone')
    <link href="{{asset('/admin/css/dropzone.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد اسلایدر جدید</h3>
        </div>
    @include('admin.partials.form_errors')
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/slider" method="post">
                        @csrf
                        <div class="form-group">
                            <labe for="name">عنوان اسلاید :</labe>
                            <input type="text" value="" name="title" class="form-control"
                                   placeholder="عنوان اسلاید را وارد نمایید">
                        </div>{{--form-control--}}


                        <div class="form-group">
                            <label for="status">وضعیت نشر :</label>
                            <input type="radio" value="0" name="status" checked
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px; "><span>منشر نشده</span>
                            <input type="radio" value="1" name="status"
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px;  "><span>منشر شده</span>
                        </div>


                        <div class="form-group">
                            <labe for="name"> تصویر :</labe>
                            <div id="photo" class="dropzone"></div>
                            <input type="hidden" name="photo_id" id="slider_photo">
                        </div>

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
            maxFilesize: 1, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            sending:function (file,xhr,formData) {
                formData.append("_token","{{csrf_token()}}")
            },
            success:function (file,response) {
document.getElementById('slider_photo').value=response.photo_id
                console.log(response);
            }
        });

    </script>

@endsection

