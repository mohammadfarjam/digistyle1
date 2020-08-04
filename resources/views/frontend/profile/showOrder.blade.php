@extends('frontend.layout.master')
@section('content')

    <aside id="column-right" class="col-sm-3 hidden-xs">
        <h3 class="subtitle">حساب کاربری</h3>
        <div class="list-group">
            <ul class="list-item">
                <li><a href="login.html">ورود</a></li>
                <li><a href="register.html">ثبت نام</a></li>
                <li><a href="#">فراموشی رمز عبور</a></li>
                <li><a href="#">حساب کاربری</a></li>
                <li><a href="#">لیست آدرس ها</a></li>
                <li><a href="wishlist.html">لیست علاقه مندی</a></li>
                <li><a href="{{route('profile.orders.list')}}">تاریخچه سفارشات</a></li>
                <li><a href="#">دانلود ها</a></li>
                <li><a href="#">امتیازات خرید</a></li>
                <li><a href="#">بازگشت</a></li>
                <li><a href="#">تراکنش ها</a></li>
                <li><a href="#">خبرنامه</a></li>
                <li><a href="#">پرداخت های تکرار شونده</a></li>
            </ul>
        </div>
    </aside>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> اطلاعات سفارش</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

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



            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

    </div>
@endsection
