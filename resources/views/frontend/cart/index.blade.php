@extends('frontend.layout.master')

@section('cart_content')



    @if(Session::has('error_payment'))
        <div class="alert alert-danger">
            <div>{{Session('error_payment')}}</div>
        </div>
    @endif

    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <td class="text-center">تصویر</td>
                        <td class="text-center">نام محصول</td>
                        <td class="text-center">کد کالا</td>
                        <td class="text-center">تعداد</td>
                        <td class="text-center">قیمت واحد</td>
                        <td class="text-center">تخفیف</td>
                        <td class="text-center">کل</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->items as $product)

                        <tr>
                            <td class="text-center" width="9%"><a href="#"><img
                                        src="{{$product['item']->photos[0]->path}}" class="img-thumbnail"/></a></td>
                            <td class="text-center"><a href="#">{{$product['item']->title}}</a><br/>
                            </td>
                            <td class="text-center">{{$product['item']->sku}}</td>
                            <td class="text-center">

                                <a href="{{route('cart.add',['id'=>$product['item']->id])}}" submit="button"
                                   data-toggle="tooltip" title="اضافه" class="btn btn-primary"><i
                                        class="fa fa-plus"></i></a>
                                <button type="button" data-toggle="tooltip" title="کم" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('remove_cart_item_{{$product['item']->id}}').submit();">
                                    <i
                                        class="fa fa-minus"></i></button>
                                <p style="margin-top: 15px"> تعداد : {{$product['qty']}}</p>
                            </td>

                            <form id="remove_cart_item_{{$product['item']->id}}"
                                  action="{{ route('Cart.remove',['id'=>$product['item']->id])}}" method="post"
                                  style="display: none;">
                                @csrf
                            </form>

                            <td class="text-center">{{$product['item']->price}} تومان</td>
                            <td class="text-center">{{$product['item']->discount_price * $product['qty']}} تومان</td>
                            <td class="text-center">{{($product['item']->price - $product['item']->discount_price)*$product['qty']}}
                                تومان
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>

            <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
            <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                    </div>
                    <div id="collapse-coupon" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <label class="col-sm-6 control-label" for="input-coupon">کد تخفیف خود را در اینجا
                                وارد کنید</label>
                            <div class="input-group">

                                <form>
                                    <input type="text" name="coupon" value=""
                                           placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon"
                                           class="form-control"/>
                                    @if(Auth::check())
                                        <input type="button" value="اعمال کوپن" id="button-coupon"
                                               data-loading-text="بارگذاری ..."
                                               class="btn btn-primary form-control">
                                    @else
                                        <a href="{{route('login')}}"
                                           class="btn btn-primary form-control">اعمال کوپن</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @if(Session::has('bad_code'))
                    <div class="alert alert-danger col-lg-5">
                       <div> {{Session('bad_code')}}</div>
                    </div>
                @endif
            </div>

            <script src="{{asset('js/jquery-3.min.js')}}"></script>
            <script>

                $("#button-coupon").click(function () {
                    $('table .coupon').html('');
                    var value = $("input[name=coupon]").val();


                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/CheckCode',
                        data: {value: value},
                        // dataType:'json',
                        success: function (data) {

                            var price = data['value']
                            var add = '<td class="text-right"><strong>کد تخفیف:</strong></td>' +
                                '<td class="text-right">' + price + ' تومان</td>';

                            $('table .coupon').append(add);
                            console.log(data['code'])
                        },
                        error: function (data) {
                            alert("Error");
                        }
                    });
                });
            </script>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">

                        <tr>
                            <td class="text-right"><strong>جمع کل:</strong></td>
                            <td class="text-right">{{Session::get('cart')->totalPurePrice}} تومان</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>تخفیف:</strong></td>
                            <td class="text-right">{{Session::get('cart')->totalDiscountPrice}} تومان</td>
                        </tr>
                        <tr class="coupon">

                        </tr>
                        <tr>
                            <td class="text-right"><strong>کل :</strong></td>
                            <td class="text-right">{{Session::get('cart')->totalPrice }} تومان</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="buttons">
                <div class="pull-left"><a href="{{url('/')}}" class="btn btn-default">ادامه خرید</a></div>
                <div class="pull-left" style="margin-left: 15px"><a href="{{route('order.verify')}}"
                                                                    class="btn btn-primary">تسویه حساب</a></div>
            </div>
        </div>
        <!--Middle Part End -->
    </div>


@endsection
