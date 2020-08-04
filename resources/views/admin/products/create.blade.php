@extends('admin.layout.master')

@section('style_dropzone')
    <link href="{{asset('/admin/css/dropzone.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="box box-info" id="app">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد محصول جدید</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/products" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">نام محصول :</label>
                            <input type="text" value="" name="title" class="form-control"
                                   placeholder="نام محصول را وارد نمایید">
                        </div>{{--form-control--}}


                        <div class="form-group">
                            <label for="slug">نام مستعار :</label>
                            <input type="text" value="" name="slug" class="form-control"
                                   placeholder="نام مستعار را وارد نمایید">
                        </div>{{--form-control--}}


                        {{--                        <attribute-component :brands="{{$brands}}"></attribute-component>--}}


                        <div class="form-group">
                            <label for="category">دسته بندی :</label>
                            <select name="categories[]" class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @if(count($category->childrenRecursive)>0)
                                        @include('admin.partials.category',['categories'=>$category->childrenRecursive,'level'=>1])
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        {{--form-control--}}

                        <div class="form-group">
                            <label for="brand">برند :</label>
                            <select name="brand" class="form-control">
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--form-control--}}

                        <div class="form-group">
                            <label for="status">وضعیت نشر :</label>
                            <input type="radio" value="0" name="status" checked
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px; "><span>منشر نشده</span>
                            <input type="radio" value="1" name="status"
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px;  "><span>منشر شده</span>
                        </div>

                        <div class="form-group">
                            <label for="price">قیمت:</label>
                            <input type="text" value="" name="price" class="form-control"
                                   placeholder="قیمت محصول را وارد نمایید">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="discount_price">تخفیف:</label>
                            <input type="text" value="" name="discount_price" class="form-control"
                                   placeholder="قیمت تخفیف محصول را وارد نمایید">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="description">توضیحات محصول :</label>
                            <textarea id="textareaDescription" type="text" name="description" class="ckeditor form-control"></textarea>
                        </div>{{--form-group--}}

                        <div class="form-group">
                            <label for="name"> گالری تصاویر :</label>
                            <div id="photo" class="dropzone"></div>
                            <input type="hidden" name="photo_id[]" id="product_photo">
                        </div>

                        <div class="form-group">
                            <label for="slug_title"> عنوان سئو :</label>
                            <input type="text" value="" name="meta_title" class="form-control"
                                   placeholder="عنوان سئو را وارد نمایید">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for=""> توضیحات سئو :</label>
                            <textarea type="text" name="meta_desc" class="form-control"
                                      placeholder="توضیحات سئو را وارد نمایید"></textarea>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for=""> کلمات کلیدی سئو :</label>
                            <input type="text" value="" name="meta_keywords" class="form-control"
                                   placeholder="کلمات کلیدی سئو را وارد نمایید">
                        </div>{{--form-control--}}


                        <button type="submit" onclick="productGallery()" class="btn btn-success pull-left">ذخیره
                        </button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->

    </div>
@endsection


@section('js_dropzone')

    <script type="text/javascript" src="{{asset('/admin/js/dropzone.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        // Dropzone.autoDiscover = false;
        var photoGallery = [];
        $("#photo").dropzone({
            url: "{{route('photos.upload')}}",
            addRemoveLinks: true,
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                photoGallery.push(response.photo_id);
            }

        });
        productGallery = function () {
            document.getElementById('product_photo').value =photoGallery
        }


        CKEDITOR.replace('textareaDescription',{
          customConfig:'config.js',
            language: 'fa',
            uiColor: '#9AB8F3',
            customConfig: '/custom/ckeditor_config.js'
        });
    </script>

@endsection
{{--@section('script_vuejs')--}}
{{--    <script src="/admin/js/app.js"></script>--}}
{{--@endsection--}}
