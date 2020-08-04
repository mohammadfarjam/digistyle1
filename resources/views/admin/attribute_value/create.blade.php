@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد مقدار ویژگی جدید</h3>
            {{--            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">--}}
            {{--                <i class="fa fa-plus"></i> جدید--}}
            {{--            </a>--}}

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/attribute_value" method="post">
                        @csrf
                        <div class="form-group">
                            <labe for="name"> انتخاب ویژگی :</labe>
                            <select name="select_attr" id="" class="form-control">
                                <option value="">انتخاب کنید</option>
                                @foreach($attributes as $attribute)
                                    <option value="{{$attribute->id}}">{{$attribute->title}}</option>
                                @endforeach
                            </select>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name">عنوان :</labe>
                            <input type="text" value="" name="title" class="form-control"
                                   placeholder="مقدار ویژگی خود را وارد نمایید">
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
