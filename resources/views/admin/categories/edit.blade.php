@extends('admin.layout.master')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش دسته بندی{{$category->name}}</h3>
            {{--            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">--}}
            {{--                <i class="fa fa-plus"></i> جدید--}}
            {{--            </a>--}}

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/categories/{{$category->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <labe for="name">نام :</labe>
                            <input type="text" value="{{$category->name}}" name="name" class="form-control"
                                   placeholder="نام دسته بندی خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">دسته والد :</labe>
                            <select name="category_parent" id="" class="form-control">
                                <option value="">بدون والد</option>
                                @foreach($categories as $category_data)
                                    <option value="{{$category_data->id}}" @if($category->parent_id == $category_data->id) selected @endif>{{$category_data->name}}</option>
                                    @if(count($category_data->childrenRecursive)>0)
                                        @include('admin.partials.category',['categories'=>$category_data->childrenRecursive , 'level'=>1,'selected_category'=>$category])
                                    @endif
                                @endforeach
                            </select>
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="title_seo">عنوان سئو :</labe>
                            <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control"
                                   placeholder="عنوان سئو خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">توضیحات سئو :</labe>
                            <textarea type="text" name="meta_desc" class="form-control">{{$category->meta_desc}}</textarea>
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">کلمات کلیدی :</labe>
                            <input type="text" value="{{$category->meta_keywords}}" name="meta_keywords" class="form-control"
                                   placeholder="کلمات کلیدی خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
    </div>
@endsection
