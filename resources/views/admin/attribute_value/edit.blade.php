@extends('admin.layout.master')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش مقدار ویژگی</h3>
            {{--            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">--}}
            {{--                <i class="fa fa-plus"></i> جدید--}}
            {{--            </a>--}}

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/attribute_value/{{$attribute_value->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group">
                            <labe for="name"> ویژگی :</labe>
                            <select name="attr_value" id="" class="form-control">
                                @foreach($attribute_group as $attribute)
                                <option value="{{$attribute->id}}" @if($attribute->id == $attribute_value->attribute_group_id) selected @endif>{{$attribute->title}}</option>
                                @endforeach
                            </select>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name">عنوان :</labe>
                            <input type="text" value="{{$attribute_value->title}}" name="title" class="form-control"
                                   placeholder="مقدار ویژگی خود را وارد نمایید">
                        </div>{{--form-control--}}

                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
    </div>
@endsection
