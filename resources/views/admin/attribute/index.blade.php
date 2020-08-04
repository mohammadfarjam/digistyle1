@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">ویژگی ها</h3>

            <a class="btn btn-app pull-left" href="{{route('attribute_group.create')}}">
                <i class="fa fa-plus"></i>افزودن ویژگی
            </a>
        </div>
        <!-- /.box-header -->

        @if(Session::has('delete_attr'))
            <div class="alert alert-danger">
                <div>{{Session('delete_attr')}}</div>
            </div>
        @endif

        @if(Session::has('add_attr'))
            <div class="alert alert-success">
                <div>{{Session('add_attr')}}</div>
            </div>
        @endif

        @if(Session::has('update_attr'))
            <div class="alert alert-success">
                <div>{{Session('update_attr')}}</div>
            </div>
        @endif
        <div class="box-body">


            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background:#00ffac">
                        <th class="text-center">شناسه</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">نوع</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attribute_group as $attribute)
                        <tr>
                            <td class="text-center">{{$attribute->id}}</td>
                            <td class="text-center">{{$attribute->title}}</td>
                            <td class="text-center">{{$attribute->type}}</td>
                            <td class="text-center">

                                <a class="btn btn-warning" href="{{route('attribute_group.edit',$attribute->id)}}">
                                    ویرایش
                                </a>
                                <div>

                                    <form method="post" class="d-inline-block pull-left"
                                          style="margin-top:-34px;margin-left: 40px"
                                          action="/administrator/attribute_group/{{$attribute->id}}">
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
