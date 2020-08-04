@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">مقدار ویژگی ها</h3>

            <a class="btn btn-app pull-left" href="{{route('attribute_value.create')}}">
                <i class="fa fa-plus"></i>افزودن مقدار ویژگی
            </a>
        </div>
        <!-- /.box-header -->

        @if(Session::has('delete_attr_value'))
            <div class="alert alert-danger">
                <div>{{Session('delete_attr_value')}}</div>
            </div>
        @endif

        @if(Session::has('add_attr_value'))
            <div class="alert alert-success">
                <div>{{Session('add_attr_value')}}</div>
            </div>
        @endif

        @if(Session::has('update_attr_value'))
            <div class="alert alert-success">
                <div>{{Session('update_attr_value')}}</div>
            </div>
        @endif
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background:#00ffac">
                        <th class="text-center">شناسه</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">ویژگی</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attribute_values as $attribute_value)
                        <tr>
                            <td class="text-center">{{$attribute_value->id}}</td>
                            <td class="text-center">{{$attribute_value->title}}</td>
                            <td class="text-center">{{$attribute_value->attributegroup->title}}</td>
                            <td class="text-center">

                                <a class="btn btn-warning"
                                   href="{{route('attribute_value.edit',$attribute_value->id)}}">
                                    ویرایش
                                </a>
                                <div>

                                    <form method="post" class="d-inline-block pull-left"
                                          style="margin-top:-34px;margin-left: 40px"
                                          action="/administrator/attribute_value/{{$attribute_value->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </div>


                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

    </div>
@endsection
