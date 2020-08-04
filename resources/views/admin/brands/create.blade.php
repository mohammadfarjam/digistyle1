@extends('admin.layout.master')

@section('style_dropzone')
    <link href="{{asset('/admin/css/dropzone.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد برند جدید</h3>
            {{--            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">--}}
            {{--                <i class="fa fa-plus"></i> جدید--}}
            {{--            </a>--}}

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/brands" method="post">
                        @csrf
                        <div class="form-group">
                            <labe for="name">عنوان برند :</labe>
                            <input type="text" value="" name="title" class="form-control"
                                   placeholder="نام برند خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">توضیحات برند :</labe>
                            <textarea type="text" value="" name="desc" class="form-control"></textarea>
                        </div>{{--form-control--}}


                        <div class="form-group">
                            <labe for="name"> تصویر :</labe>
                            <div id="photo" class="dropzone"></div>
                            <input type="hidden" name="photo_id" id="brand_photo">
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

