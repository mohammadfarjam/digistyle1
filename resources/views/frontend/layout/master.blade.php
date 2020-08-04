<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="image/favicon.png" rel="icon"/>
    <title>مارکت شاپ - قالب HTML فروشگاهی</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/frontend/js/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/js/bootstrap/css/bootstrap-rtl.min.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/stylesheet-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/responsive-rtl.css"/>
    <link rel="stylesheet" type="text/css" href="/frontend/css/stylesheet-skin2.css"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    این برای کد ری کپچا بود--}}
    {!! htmlScriptTagJsApi(['lang'=>'fa']) !!}

</head>
<body>
<div class="wrapper-wide">
    <div id="header" style="background-color:#75eaad;">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row" style="margin-top:15px"><span class="drop-icon visible-sm visible-xs"><i
                            class="fa fa-align-justify"></i></span>

                    <div id="top-links" class="nav pull-right flip">

                            @if(empty(Auth::user()->email_verified_at))
                            <ul>
                                <li style="border: 1px solid #000000;border-radius:6px;"><a href="{{route('login')}}"><i
                                            class="fa fa-key" style="font-size: 2.1rem;margin-left: 9px;"></i>ورود</a>
                                </li>
                                <li style="border: 1px solid #000000;border-radius: 6px;margin-left:10px "><a
                                        href="{{route('register')}}"><i class="fa fa-user-plus"
                                                                        style="font-size: 2.1rem;margin-left: 9px;"></i>ثبت
                                        نام</a></li>
                            </ul>

                        @else
                            <ul>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="post"
                                      style="display: none;">
                                    @csrf
                                </form>
                                <li><a href="{{route('user.profile')}}">پروفایل کاربری</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                        <div id="logo" style="width: 200px;"><a href="{{url('/')}}"><img class="img-responsive"
                                                                                         src="/images/digistyle.png"
                                                                                         width="100%"
                                                                                         title="فروشگاه اینترنتی دیجی استایل"
                                                                                         alt="MarketShop"/></a></div>
                    </div>
                    <!-- Logo End -->
                    <!-- Mini Cart Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..."
                                    class="heading dropdown-toggle">
                                <i class="fa fa-shopping-basket"
                                   style="font-size:2.4rem;color:rgba(86,180,255,0.64)"></i>
                                {{--                                <span class="cart-icon pull-left flip"></span>--}}
                                <span
                                    id="cart-total">{{Session::has('cart') ? Session::get('cart')->totalQty .'آیتم -' : ''}} {{Session::has('cart') ? Session::get('cart')->totalPrice .'تومان' : ''}}</span>
                            </button>
                            <ul class="dropdown-menu">
                                @if(Session::has('cart'))

                                    <li>
                                        <table class="table">
                                            @foreach(Session::get('cart')->items as $product)
                                                <tbody>
                                                <tr>
                                                    <td class="text-right" style="width: 85px"><img width="80%"
                                                                                                    class="img-thumbnail"
                                                                                                    src="{{$product['item']->photos[0]->path}}">
                                                    </td>
                                                    <td class="text-left">{{$product['item']->title}}</td>
                                                    <td class="text-right">x {{$product['qty']}}</td>
                                                    <td class="text-right">{{($product['item']->price -$product['item']->discount_price)*$product['qty']}}
                                                        تومان
                                                    </td>
                                                    <td class="text-center">
                                                        <button onclick="event.preventDefault();
                                                            document.getElementById('remove_cart_item_{{$product['item']->id}}').submit();"
                                                                class="btn btn-danger btn-xs remove" title="حذف"
                                                                type="button"><i class="fa fa-times"></i></button>
                                                    </td>
                                                    <form id="remove_cart_item_{{$product['item']->id}}"
                                                          action="{{ route('Cart.remove',['id'=>$product['item']->id])}}"
                                                          method="post"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </li>

                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>جمع کل</strong></td>
                                                    <td class="text-right">{{Session::get('cart')->totalPurePrice}}
                                                        تومان
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>تخفیف</strong></td>
                                                    <td class="text-right">{{Session::get('cart')->totalDiscountPrice}}
                                                        تومان
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                    <td class="text-right">{{Session::get('cart')->totalPrice}}تومان
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="checkout"><a href="{{route('cart_check')}}"
                                                                   class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart"></i> مشاهده سبد</a></p>
                                        </div>
                                    </li>

                                @else
                                    <p>سبد خرید شما خالی است.</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- Mini Cart End-->
                    <!-- جستجو Start-->

                    <style>
                        #show_search, #show_nothing {
                            background-color: #fff !important;
                            position: absolute;
                            z-index: 3;
                            top: 92px;
                            box-shadow: 1px 1px 5px 1px currentColor;
                            border-bottom-right-radius: 5px;
                            border-bottom-left-radius: 5px;
                        }

                        #show_search ul {
                            width: 100%;

                        }

                        #show_search ul li {
                            width: 100%;
                            height: 70px;

                        }

                        @media (max-width: 991px) {
                            #show_search {
                                top: 60px
                            }
                        }

                        #show_search img {
                            float: right;
                            margin-top: 10px;
                            margin-right: 10px
                        }

                        #show_search p {
                            float: right;
                            line-height: 70px;
                            width: 75%;
                            margin: 0;
                            padding-right: 20px;
                        }

                        #show_search ul li:last-child {
                            margin-bottom: 13px;
                        }

                        @media (min-width: 480px) and (max-width: 768px) {
                            #show_search ul li {
                                height: 110px;
                            }
                        }


                        #show_nothing {
                            background-color: #fff !important;
                            position: absolute;
                            z-index: 3;
                            top: 92px;
                            width: 100%;
                            height: 200px;
                            display: none;
                            box-shadow: 1px 1px 5px 1px currentColor;
                            border-bottom-right-radius: 5px;
                            border-bottom-left-radius: 5px;
                        }

                        #show_nothing img {
                            text-align: center;
                            margin: 23px 98px;
                            width: 30%;
                        }

                        #show_nothing p {
                            margin-right: 60px;
                            width: 100%;
                        }


                        @media (min-width: 990px) and (max-width: 1200px) {
                            #show_nothing p {
                                margin-right: 40px;
                                width: 100%;
                            }

                            #show_nothing img {
                                text-align: center;
                                margin: 23px 63px;
                                width: 47%;
                                height: 100px;
                            }
                        }

                        @media (min-width: 768px) and (max-width: 990px) {
                            #show_nothing {
                                top: 61px;
                            }

                            #show_nothing p {
                                margin-right: 0px;
                                width: 100%;
                            }
                        }

                        @media (min-width: 480px) and (max-width: 768px) {
                            #show_nothing {
                                top: 61px;
                            }

                            #show_nothing img {
                                text-align: center;
                                margin: 23px 98px;
                                width: 20%;
                                height: 100px;
                            }

                            #show_nothing p {
                                margin-right: 5px;
                                width: 100%;
                            }
                        }

                        @media (min-width: 144px) and (max-width: 490px) {
                            #show_nothing {
                                top: 61px !important;
                            }

                            #show_nothing img {
                                text-align: center;
                                margin: 23px 98px;
                                width: 24%;
                                height: 80px;
                            }

                            #show_nothing p {
                                margin-right: 7px;
                                width: 100%;
                            }

                        }
                    </style>

                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                        <form method="get" action="{{route('doSearch')}}">
                            <div id="search" class="input-group">
                                <input id="search" type="text" name="search" autocomplete="off" value="" placeholder="جستجو"
                                       class="form-control input-lg"/>
                                <button id="submit" disabled="disabled" type="submit" class="button-search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                        <div id="show_search">
                            <ul>

                            </ul>
                        </div>

                        <div id="show_nothing">
                            <img src="images/a.png">
                            <p>متاسفانه نتیجه ای یافت نشد.</p>
                        </div>
                    </div>

                    <!-- جستجو End-->









                    <script src="{{asset('js/jquery-3.min.js')}}"></script>
                    <script>





                        $('#search').keyup(function () {
                            var value = $('#search input[name=search]').val();
                            var count=value.length;
                            if(count>=1){
                                $("#submit").attr('disabled',false);
                            }else {
                                $("#submit").attr('disabled',true);
                            }
                            if (value.length >0) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: 'POST',
                                    url: '{{route('search')}}',
                                    data: {value: value},
                                    success: function (search) {


                                        if (search.length > 0) {
                                            $('#show_nothing').css('display', 'none');
                                            $('#show_search ul').html('');
                                            $.each(search, function (index, element) {
                                                $('#show_search').fadeIn();
                                                $('#show_search ul').append('<li><a href="/showSearch/' + element.id + '?'+value+'"><img width="13%" src="' + element.photos[0].path + '" ><p>' + element.title + '</p></a></li>');
                                            });
                                        } else {
                                             $('#show_search').fadeOut();
                                            $('#show_nothing').css('display', 'block');
                                        }
                                    },
                                    error: function (search) {
                                        alert('خطا به وجود آمده!!!')
                                    }
                                });
                            }else {
                                $('#show_search').fadeOut();
                                $('#show_nothing').fadeOut();
                            }

                            $('.wrapper-wide').click(function () {
                                $('#show_search').fadeOut();
                                $('#show_nothing').fadeOut();
                            });

                        });


                    </script>
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main آقایانu Start-->


        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 bg-aqua">
                    abbab
                </div>


            </div>
        </div>


        <nav id="menu" class="navbar">
            <div class="navbar-header"><span class="visible-xs visible-sm"> منو <b></b></span></div>
            <div class="container">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="home_link" title="خانه" href="{{url('/')}}">خانه</a></li>


                        @foreach(App\Category::where('parent_id',null)->get() as $category)
                            <li class="dropdown"><a> {{$category->name}} </a>
                                <div class="dropdown-menu">
                                    <ul>
                                        @if(count($category->childrenRecursive)>0)
                                            @include('frontend.partials.child_category',['categories'=>$category->childrenRecursive])
                                        @endif


                                    </ul>
                                </div>
                            </li>
                        @endforeach
                        <li class="dropdown information-link"><a>برگه ها</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="login.html">ورود</a></li>
                                    <li><a href="register.html">ثبت نام</a></li>
                                    <li><a href="category.html">دسته بندی (شبکه/لیست)</a></li>
                                    <li><a href="product.html">محصولات</a></li>
                                    <li><a href="cart.html">سبد خرید</a></li>
                                    <li><a href="checkout.html">تسویه حساب</a></li>
                                    <li><a href="compare.html">مقایسه</a></li>
                                    <li><a href="wishlist.html">لیست آرزو</a></li>
                                    <li><a href="search.html">جستجو</a></li>
                                </ul>
                                <ul>
                                    <li><a href="about-us.html">درباره ما</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="elements.html">عناصر</a></li>
                                    <li><a href="faq.html">سوالات متداول</a></li>
                                    <li><a href="sitemap.html">نقشه سایت</a></li>
                                    <li><a href="contact-us.html">تماس با ما</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main آقایانu End-->
    </div>
    <div id="container">

        <div class="container">

            @yield('content')
            @yield('register')
            @yield('cart_content')

            @yield('product_content')
            @yield('show_category')
            @yield('profile_showOrders')
        </div>
    </div>
    <!-- Feature Box Start-->
    <div class="container">
        <div class="custom-feature-box row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_1">
                    <div class="title">ارسال رایگان</div>
                    <p>برای خرید های بیش از 100 هزار تومان</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_2">
                    <div class="title">پس فرستادن رایگان</div>
                    <p>بازگشت کالا تا 24 ساعت پس از خرید</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_3">
                    <div class="title">کارت هدیه</div>
                    <p>بهترین هدیه برای عزیزان شما</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="feature-box fbox_4">
                    <div class="title">امتیازات خرید</div>
                    <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Box End-->
    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
            <div class="container">
                <div class="row">
                    <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <h5>درباره مارکت شاپ</h5>
                        <p>قالب HTML فروشگاهی مارکت شاپ. این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html
                            نوشتاری یا تصویری را در آن قرار دهید.</p>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>اطلاعات</h5>
                        <ul>
                            <li><a href="about-us.html">درباره ما</a></li>
                            <li><a href="about-us.html">اطلاعات 0 تومان</a></li>
                            <li><a href="about-us.html">حریم خصوصی</a></li>
                            <li><a href="about-us.html">شرایط و قوانین</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>خدمات مشتریان</h5>
                        <ul>
                            <li><a href="contact-us.html">تماس با ما</a></li>
                            <li><a href="#">بازگشت</a></li>
                            <li><a href="sitemap.html">نقشه سایت</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>امکانات جانبی</h5>
                        <ul>
                            <li><a href="#">برند ها</a></li>
                            <li><a href="#">کارت هدیه</a></li>
                            <li><a href="#">بازاریابی</a></li>
                            <li><a href="#">ویژه ها</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>حساب من</h5>
                        <ul>
                            <li><a href="#">حساب کاربری</a></li>
                            <li><a href="#">تاریخچه سفارشات</a></li>
                            <li><a href="#">لیست علاقه مندی</a></li>
                            <li><a href="#">خبرنامه</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fpart-second">
            <div class="container">
                <div id="powered" class="clearfix">
                    <div class="powered_text pull-left flip">
                        <p>کپی رایت © 2016 فروشگاه شما | پارسی سازی و ویرایش توسط <a href="https://www.roxo.ir"
                                                                                     target="_blank">روکسو</a></p>
                    </div>
                    <div class="social pull-right flip"><a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                          src="/frontend/image/socialicons/facebook.png"
                                                                                          alt="Facebook"
                                                                                          title="Facebook"></a> <a
                            href="#" target="_blank"> <img data-toggle="tooltip"
                                                           src="/frontend/image/socialicons/twitter.png" alt="Twitter"
                                                           title="Twitter"> </a> <a href="#" target="_blank"> <img
                                data-toggle="tooltip" src="/frontend/image/socialicons/google_plus.png" alt="Google+"
                                title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                        src="/frontend/image/socialicons/pinterest.png"
                                                                                        alt="Pinterest"
                                                                                        title="Pinterest"> </a> <a
                            href="#" target="_blank"> <img data-toggle="tooltip"
                                                           src="/frontend/image/socialicons/rss.png" alt="RSS"
                                                           title="RSS"> </a></div>
                </div>
                <div class="bottom-row">
                    <div class="custom-text text-center">
                        <p>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار
                            دهید.<br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                            گرافیک است.</p>
                    </div>
                    <div class="payments_types"><a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                  src="/frontend/image/payment/payment_paypal.png"
                                                                                  alt="paypal" title="PayPal"></a> <a
                            href="#" target="_blank"> <img data-toggle="tooltip"
                                                           src="/frontend/image/payment/payment_american.png"
                                                           alt="american-express" title="American Express"></a> <a
                            href="#" target="_blank"> <img data-toggle="tooltip"
                                                           src="/frontend/image/payment/payment_2checkout.png"
                                                           alt="2checkout" title="2checkout"></a> <a href="#"
                                                                                                     target="_blank">
                            <img data-toggle="tooltip" src="/frontend/image/payment/payment_maestro.png" alt="maestro"
                                 title="Maestro"></a> <a href="#" target="_blank"> <img data-toggle="tooltip"
                                                                                        src="/frontend/image/payment/payment_discover.png"
                                                                                        alt="discover" title="Discover"></a>
                        <a href="#" target="_blank"> <img data-toggle="tooltip"
                                                          src="/frontend/image/payment/payment_mastercard.png"
                                                          alt="mastercard" title="MasterCard"></a></div>
                </div>
            </div>
        </div>
        <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)"
                              class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
    </footer>
    <!--Footer End-->

</div>
<!-- JS Part Start-->

<script type="text/javascript" src="/frontend/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/frontend/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/frontend/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/frontend/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="/frontend/js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="/frontend/js/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="/frontend/js/custom.js"></script>

<!-- JS Part End-->
@yield('script_elevatezoom')
</body>
</html>
