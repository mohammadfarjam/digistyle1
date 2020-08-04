@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">سفارشات</h3>
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
                        <th class="text-center">شناسه</th>
                        <th class="text-center">نمایش</th>
                        <th class="text-center">مقدار</th>
                        <th class="text-center">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="text-center">{{$order->id}}</td>
                            <td class="text-center"><a href="{{route('order.show',$order->id)}}"><i class="fa fa-eye"></i></a></td>
                            <td class="text-center">{{$order->amount}}</td>
                            <td class="text-center">
                                @if($order->status==0)
                                    <span class="label label-danger">پرداخت نشده</span>
                                 @else
                                    <span class="label label-success">پرداخت شده</span>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
<div class="col-md-12 col-md-offset-5">
    {{$orders->links()}}
</div>
    </div>

@endsection
