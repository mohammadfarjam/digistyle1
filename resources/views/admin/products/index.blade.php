@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">محصولات</h3>

            <a class="btn btn-app pull-left" href="{{route('products.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(Session::has('succes_product'))
                <div class="alert alert-success">
                    <div>{{Session('succes_product')}}</div>
                </div>
            @endif
            @if(Session::has('update_product'))
                <div class="alert alert-success">
                    <div>{{Session('update_product')}}</div>
                </div>
            @endif


            @if(Session::has('delete_product'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_product')}}</div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>کد محصول</th>
                        <th class="text-right">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->sku}}</td>
                            <td class="text-right">

                                <a class="btn btn-warning pull-right" href="{{route('products.edit',$product->id)}}">
                                    ویرایش
                                </a>

                                <form method="post" action="/administrator/products/{{$product->id}}"
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
