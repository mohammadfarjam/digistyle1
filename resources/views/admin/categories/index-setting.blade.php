@extends('admin.layout.master')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">تعیین ویژگی دسته بندی {{$category->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/categories/{{$category->id}}/settings" method="post">
                        @csrf
                        <div class="form-group">
                            <labe for="attributegroup"> ویژگی های {{$category->name}}:</labe>
                            <select name="attributegroup[]" id="" class="form-control" multiple>
                                @foreach($attributegroups as $attributegroup)
                                    <option value="{{$attributegroup->id}}" @if(in_array($attributegroup->id,$category->attributegroups->pluck('id')->toArray())) selected @endif>{{$attributegroup->title}}</option>
                                @endforeach
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
