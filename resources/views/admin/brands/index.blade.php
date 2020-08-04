@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">برند ها</h3>

            <a class="btn btn-app pull-left" href="{{route('brands.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
@include('admin.partials.form_errors')

            @if(Session::has('delete_brand'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_brand')}}</div>
                </div>
            @endif

            @if(Session::has('success_brand'))
                <div class="alert alert-success">
                    <div>{{Session('success_brand')}}</div>
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
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->title}}</td>
                            <td class="text-right">

                                <a class="btn btn-warning pull-right" href="{{route('brands.edit',$brand->id)}}">
                                    ویرایش
                                </a>

                                <form method="post" action="/administrator/brands/{{$brand->id}}"
                                      class="pull-right">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" style="margin-right: 8px;">حذف</button>
                                </form>
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
