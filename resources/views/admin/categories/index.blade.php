@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">دسته بندی ها</h3>

            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(Session::has('error_category'))
                <div class="alert alert-danger">
                    <div>{{Session('error_category')}}</div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th class="text-right">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td class="text-right">

                                <a class="btn btn-warning pull-right" href="{{route('categories.edit',$category->id)}}">
                                    ویرایش
                                </a>

                                <form method="post" action="/administrator/categories/{{$category->id}}"
                                      class="pull-right">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" style="margin-right: 8px;">حذف</button>
                                </form>

                                <a class="btn btn-primary pull-right" href="{{route('categories.indexSetting',$category->id)}}">
                                    تنظیمات
                                </a>
                            </td>

                        </tr>
                        @if(count($category->childrenRecursive)>0)
                            @include('admin.partials.category_list',['categories'=>$category->childrenRecursive , 'level'=>1])
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

    </div>
@endsection
