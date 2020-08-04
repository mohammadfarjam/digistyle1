@extends('frontend.layout.master')
@section('profile_showOrders')

    <div class="row justify-content-center">
        <div class="container">

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
            <!--Right Part End -->


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
                            <td class="text-center"><a href="{{route('profile.orders.show',$order->id)}}"><i class="fa fa-eye"></i></a></td>
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
                <div class="col-md-7 col-md-offset-4">

                    {{$orders->links()}}

                </div>
            </div>
            <!-- /.table-responsive -->

        </div>
    </div>










@endsection
