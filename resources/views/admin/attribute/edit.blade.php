@extends('admin.layout.master')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{$attribute_group->title}} ویرایش ویژگی</h3>
            {{--            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">--}}
            {{--                <i class="fa fa-plus"></i> جدید--}}
            {{--            </a>--}}

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/attribute_group/{{$attribute_group->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <labe for="name">عنوان :</labe>
                            <input type="text" value="{{$attribute_group->title}}" name="title" class="form-control"
                                   placeholder="عنوان ویژگی خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name"> نوع :</labe>
                            <select name="attr_type" id="" class="form-control">
                                <option value="select" @if($attribute_group->type == 'select' ) selected @endif>لیست تکی</option>
                                <option value="multiple" @if($attribute_group->type == 'multiple' ) selected @endif>لیست چندتایی</option>
                            </select>
                        </div>{{--form-control--}}
                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
    </div>
@endsection
