@extends('frontend.layout.master')

@section('content')
    @if(Session::has('succses_payment'))
        <div class="alert alert-success">
            <div>{{Session('succses_payment')}}</div>
        </div>
    @endif

    <div class="container">
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
                @if(Session::has('succses_payment'))
                @else
                <div class="alert alert-success col-lg-8">
                    <p>{{$user->name .' '.$user->last_name}} به حساب کاربری خود خوش آمدید </p>
                </div>
                @endif


            </div>
        </div>


    </div>
@endsection
