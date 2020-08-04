@extends('admin.layout.master')

@section('style_dropzone')
    <link href="{{asset('/admin/css/dropzone.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش اسلایدر</h3>
        </div>
    @include('admin.partials.form_errors')
    <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/slider/{{$slider->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <labe for="name">عنوان اسلاید :</labe>
                            <input type="text" value="{{$slider->title}}" name="title" class="form-control"
                                   placeholder="عنوان اسلاید را وارد نمایید">
                        </div>{{--form-control--}}


                        <div class="form-group">
                            <label for="status">وضعیت نشر :</label>
                            <input type="radio" value="0" name="status" @if($slider->status ==0)checked @endif
                            style="vertical-align: middle;margin-right: 35px;margin-left: 8px; "><span>منشر نشده</span>
                            <input type="radio" value="1" name="status" @if($slider->status ==1)checked @endif
                            style="vertical-align: middle;margin-right: 35px;margin-left: 8px;  "><span>منشر شده</span>
                        </div>


                        <div class="form-group">
                            <labe for="name"> تصویر :</labe>
                            <div id="photo" class="dropzone"></div>
                            <input type="hidden" value="{{$slider->photo_id}}" name="photo_id" id="slider_photo">
                        </div>

                        <span class="delete"><img style=" cursor: pointer" title="حذف" src="/images/Delete.png">
                        <input type="hidden" value="{{$slider->photo_id}}" name="id_img">
                        </span>

                        <div class="img"><img src="{{$slider->photo->path}}" width="75%"></div>

                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>
                    <script type="text/javascript" src="{{asset('/js/jquery-3.min.js')}}"></script>
                    <script>
                        $('.delete').click(function () {
                            var id = $('input[name=id_img]').val();

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },

                                type: 'POST',
                                url: '{{route('slider.img.del')}}',
                                data: {id: id},
                                //dataType: 'json',
                                success: function (data) {
                                    if (data == 'ok') {
                                        $('.img').html('');
                                        $('.delete').html('');
                                    }

                                },
                                error: function (data) {
                                    alert("Error");
                                }
                            })
                        });
                    </script>
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
        $("#photo").dropzone({
            url: "{{route('photos.upload')}}",
            addRemoveLinks: true,
            maxFiles: 1,
            maxFilesize: 1, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                document.getElementById('slider_photo').value = response.photo_id
                console.log(response);
            }
        });

    </script>

@endsection

