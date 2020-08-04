@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> اطلاعات سفارش</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('admin.partials.form_errors')

            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th class="text-center"> شناسه محصول</th>
                        <th class="text-center">نام محصول</th>
                        <th class="text-center">تعداد</th>
                        <th class="text-center">قیمت واحد</th>
                        <th class="text-center"> تخفیف</th>
                        <th class="text-center"> نهایی</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order->products as $product)
                        <tr>
                            <td class="text-center">{{$product->id}}</td>
                            <td class="text-center">{{$product->title}}</td>
                            <td class="text-center">{{$product->pivot->qty}}</td>
                            <td class="text-center">{{$product->price}}</td>
                            <td class="text-center">
                                @if($product->discount_price)
                                    {{$product->discount_price*$product->pivot->qty}}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">{{($product->price-$product->discount_price)*$product->pivot->qty}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <span class="d-block pull-left label-success " style="padding:9px 15px;border-radius: 3px;margin:50px 50px">{{$order->amount}} تومان</span><p class="pull-left" style="margin:56px 50px;">مبلغ نهایی :</p>
                <div class="customer-data">
                    <p style="margin-top: 100px;padding-right: 20px;"> نام
                        خریدار:{{$order->user->name}} {{$order->user->last_name}}</p>
                    <p style="margin-top: 10px;padding-right: 20px;"> کد ملی:{{$order->user->national_code}}</p>
                    <p style="margin-top: 10px;padding-right: 20px;"> شماره تلفن:{{$order->user->phone}}</p>
                    <p style="margin-top: 10px;padding-right: 20px;"> آدرس
                        ارسال:{{$order->user->address[0]->province->name.' '. $order->user->address[0]->city->name.' '.  $order->user->address[0]->address}}</p>
                    <p style="margin-top: 10px;padding-right: 20px;">کد پستی:{{$order->user->address[0]->zip_code}}

                </div>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

    </div>
@endsection
