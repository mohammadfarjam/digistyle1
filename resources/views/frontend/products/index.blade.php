@extends('frontend.layout.master')

@section('product_content')

    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.html" itemprop="url"><span
                    itemprop="title"><i class="fa fa-home"></i></span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="category.html" itemprop="url"><span
                    itemprop="title">الکترونیکی</span></a></li>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="product.html" itemprop="url"><span
                    itemprop="title">لپ تاپ ایلین ور</span></a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <aside id="column-right" style="float: left" class="col-sm-3 hidden-xs">
            <h3 class="subtitle">پرفروش ها</h3>
            <div class="side-item">
{{--                @foreach($relatedProduct as $product)--}}
{{--                    <div class="product-thumb clearfix">--}}
{{--                        <div class="image"><a href="{{route('product.single',$product->id)}}"><img--}}
{{--                                    src="{{$product->photos[0]->path}}" alt=""--}}
{{--                                    title="تی شرت کتان مردانه" class="img-responsive"/></a></div>--}}
{{--                        <div class="caption">--}}
{{--                            <h4><a href="{{route('product.single',$product->id)}}">{{$product->title}}</a></h4>--}}
{{--                            @if($product->discount_price)--}}
{{--                                <span class="price-old">{{$product->price}}</span>--}}

{{--                                <p class="price"><span class="price-new">{{$product->price-$product->discount_price}} تومان</span>--}}
{{--                                </p>--}}
{{--                                <span class="saving">{{round(abs($product->price - $product->discount_price*100)/$product->price)}}%-</span>--}}
{{--                            @else--}}
{{--                                <p class="price">{{$product->price}}</p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

            </div>
            <div class="list-group">
                <h3 class="subtitle" style="margin-top: 50px">محتوای سفارشی</h3>
                <p>این یک بلاک محتواست. هر نوع محتوایی شامل html، نوشته یا تصویر را میتوانید در آن قرار دهید. </p>
                <p> در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                    رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                    اساسا مورد استفاده قرار گیرد. </p>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
            </div>
            <h3 class="subtitle">ویژه</h3>
            <div class="side-item">
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-50x75.jpg"
                                                                   alt=" کتاب آموزش باغبانی "
                                                                   title=" کتاب آموزش باغبانی "
                                                                   class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                        <p class="price"><span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span>
                            <span class="saving">-26%</span></p>
                    </div>
                </div>
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-50x75.jpg"
                                                                   alt="تبلت ایسر" title="تبلت ایسر"
                                                                   class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">تبلت ایسر</a></h4>
                        <p class="price"><span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span>
                            <span class="saving">-5%</span></p>
                        <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star fa-stack-2x"></i><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star fa-stack-2x"></i><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star fa-stack-2x"></i><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star-o fa-stack-2x"></i></span></div>
                    </div>
                </div>
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-50x75.jpg"
                                                                   alt="تی شرت کتان مردانه"
                                                                   title="تی شرت کتان مردانه"
                                                                   class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4>
                            <a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی
                                شرت کتان مردانه</a></h4>
                        <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span>
                            <span class="saving">-10%</span></p>
                    </div>
                </div>
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-50x75.jpg"
                                                                   alt="دوربین دیجیتال حرفه ای"
                                                                   title="دوربین دیجیتال حرفه ای"
                                                                   class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                        <p class="price"><span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span>
                            <span class="saving">-6%</span></p>
                    </div>
                </div>
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img src="image/product/nikon_d300_5-50x75.jpg"
                                                                   alt="محصولات مراقبت از مو"
                                                                   title="محصولات مراقبت از مو"
                                                                   class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                        <p class="price"><span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span>
                            <span class="saving">-27%</span></p>
                        <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                    class="fa fa-star-o fa-stack-2x"></i></span></div>
                    </div>
                </div>
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img src="image/product/macbook_air_1-50x75.jpg"
                                                                   alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور"
                                                                   class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                        <p class="price"><span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span>
                            <span class="saving">-5%</span></p>
                    </div>
                </div>
            </div>
        </aside>
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
            <div itemscope itemtype="http://schema.org/محصولات">
                <h1 class="title" itemprop="name">{{$product->title}}</h1>
                <div class="row product-info">
                    <div class="col-sm-6">
                        <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="{{$product->photos[0]->path}}" data-zoom-image="{{$product->photos[0]->path}}">
                        </div>
                        <div class="center-block text-center">
                                <span class="zoom-gallery"><i class="fa fa-search">
                                    </i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>
                        <div class="image-additional" id="gallery_01">
                            @foreach($product->photos as $photo)
                            <a class="thumbnail"  data-zoom-image="{{$photo->path}}"
                               data-image="{{$photo->path}}">
                                <img src="{{$photo->path}}"></a>
                        @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-unstyled description">
                            <li><b>برند :</b> <a href="#"><span itemprop="brand">{{$product->brand->title}}</span></a>
                            </li>
                            <li><b>کد محصول :</b> <span itemprop="mpn">{{$product->sku}}</span></li>
                            <li><b>وضعیت موجودی :</b>
                                @if($product->status ==1)
                                    <span class="instock">موجود</span>
                                @else
                                    <span class="instock">ناموجود</span>
                                @endif
                            </li>

                        </ul>
                        <ul class="price-box">
                            <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                @if($product->discount_price)
                                    <span class="price-old">{{$product->price}} تومان</span>
                                    <span itemprop="price"> {{$product->price - $product->discount_price}}
                                        تومان<span itemprop="availability" content="موجود"></span>
                                    </span>
                                    @else
                                    <span itemprop="price">{{$product->price}} تومان</span>
                                 @endif
                                 </li>
                            <li></li>
                        </ul>
                        <div id="product">
                            <h3 class="subtitle">انتخاب های در دسترس</h3>
                            <div class="form-group required">
                                <label class="control-label">رنگ</label>
                                <select class="form-control" id="input-option200" name="option[200]">
                                    <option value=""> --- لطفا انتخاب کنید ---</option>
                                    <option value="4">مشکی</option>
                                    <option value="3">نقره ای</option>
                                    <option value="1">سبز</option>
                                    <option value="2">آبی</option>
                                </select>
                            </div>
                            <div class="cart">
                                <div>
                                    <div class="qty">
                                        <label class="control-label" for="input-quantity">تعداد</label>
                                        <input type="text" name="quantity" value="1" size="2" id="input-quantity"
                                               class="form-control"/>
                                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br/>
                                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                        <div class="clear"></div>
                                    </div>
                                    <a href="{{route('cart.add',['id'=>$product->id])}}" class="btn btn-primary btn-lg">افزودن به سبد
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> افزودن
                                        به علاقه مندی ها
                                    </button>
                                    <br/>
                                    <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i>
                                        مقایسه این محصول
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="rating" itemprop="aggregateRating" itemscope
                             itemtype="http://schema.org/AggregateRating">
                            <meta itemprop="ratingValue" content="0"/>
                            <p><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                        class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star fa-stack-1x"></i><i
                                        class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star fa-stack-1x"></i><i
                                        class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star fa-stack-1x"></i><i
                                        class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i
                                        class="fa fa-star-o fa-stack-1x"></i></span> <a
                                    onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href=""><span
                                        itemprop="reviewCount">1 بررسی</span></a> / <a
                                    onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک
                                    بررسی بنویسید</a></p>
                        </div>
                        <hr>
                    </div>

                    <ul class="nav nav-tabs" >
                        <li style="margin-top: 100px;position: absolute;top: 515px" class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
                        <li style="margin-top: 100px;position: absolute;top: 515px;margin-right: 80px;"><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
                        <li style="margin-top: 100px;position: absolute;top: 515px;margin-right: 160px"><a href="#tab-review" data-toggle="tab">بررسی (2)</a></li>
                    </ul>
                    <div class="tab-content" style="margin-top: 86px;">
                        <div itemprop="description" id="tab-description" class="tab-pane active">
                            <div>
                                <p>{!!$product->description!!}</p>

                            </div>
                        </div>
                        <div id="tab-specification" class="tab-pane">
                            <div id="tab-specification" class="tab-pane">
                                <table class="table table-bordered">
                                    <tbody>
                                    @foreach($product->attributevalues as $attribute)
                                        <tr>
                                            <td></td>
                                            <td>{{$attribute->title}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab-review" class="tab-pane">
                            <form class="form-horizontal">
                                <div id="review">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong><span>هاروی</span></strong></td>
                                                <td class="text-right"><span>1395/1/20</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                                                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته
                                                        اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                    <div class="rating"><span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong><span>اندرسون</span></strong></td>
                                                <td class="text-right"><span>1395/1/20</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                                                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته
                                                        اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                                    <div class="rating"><span class="fa fa-stack"><i
                                                                class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                            class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i
                                                                class="fa fa-star-o fa-stack-2x"></i></span></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right"></div>
                                </div>
                                <h2>یک بررسی بنویسید</h2>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="input-name" class="control-label">نام شما</label>
                                        <input type="text" class="form-control" id="input-name" value="" name="name">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="input-review" class="control-label">بررسی شما</label>
                                        <textarea class="form-control" id="input-review" rows="5"
                                                  name="text"></textarea>
                                        <div class="help-block"><span class="text-danger">توجه :</span> HTML بازگردانی
                                            نخواهد شد!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label class="control-label">رتبه</label>
                                        &nbsp;&nbsp;&nbsp; بد&nbsp;
                                        <input type="radio" value="1" name="rating">
                                        &nbsp;
                                        <input type="radio" value="2" name="rating">
                                        &nbsp;
                                        <input type="radio" value="3" name="rating">
                                        &nbsp;
                                        <input type="radio" value="4" name="rating">
                                        &nbsp;
                                        <input type="radio" value="5" name="rating">
                                        &nbsp;خوب
                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <button class="btn btn-primary" id="button-review" type="button">ادامه</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h3 class="subtitle">محصولات مرتبط</h3>
                    <div class="owl-carousel related_pro">
{{--                        @foreach($relatedProduct as $product)--}}
{{--                            <div class="product-thumb clearfix">--}}
{{--                                <div class="image"><a href="{{route('product.single',$product->id)}}"><img--}}
{{--                                            src="{{$product->photos[0]->path}}" alt=""--}}
{{--                                            title="تی شرت کتان مردانه" class="img-responsive"/></a></div>--}}
{{--                                <div class="caption">--}}
{{--                                    <h4><a href="{{route('product.single',$product->id)}}">{{$product->title}}</a></h4>--}}
{{--                                    @if($product->discount_price)--}}
{{--                                        <span class="price-old">{{$product->price}}</span>--}}

{{--                                        <p class="price"><span class="price-new">{{$product->price-$product->discount_price}} تومان</span>--}}
{{--                                        </p>--}}
{{--                                        <span class="saving">{{round(abs($product->price - $product->discount_price*100)/$product->price)}}%-</span>--}}
{{--                                    @else--}}
{{--                                        <p class="price">{{$product->price}}</p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}


{{--                                <div class="button-group">--}}
{{--                                    <a class="btn-primary" href="{{route('cart.add',['id'=>$product->id])}}"><span>افزودن به سبد</span>--}}
{{--                                    </a>--}}
{{--                                    <div class="add-to-links">--}}
{{--                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها"--}}
{{--                                                onClick=""><i class="fa fa-heart"></i></button>--}}
{{--                                        <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">--}}
{{--                                            <i class="fa fa-exchange"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>
            <!--Middle Part End -->
            <!--Right Part Start -->

            <!--Right Part End -->
        </div>
    </div>

@endsection

@section('script_elevatezoom')
    <script type="text/javascript">
        // Elevate Zoom for Product Page image
        $("#zoom_01").elevateZoom({
            gallery:'gallery_01',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            zoomWindowPosition : 11,
            lensFadeIn: 500,
            lensFadeOut: 500,
            loadingIcon: 'image/progress.gif'
        });
        //////pass the images to swipebox
        $("#zoom_01").bind("click", function(e) {
            var ez =   $('#zoom_01').data('elevateZoom');
            $.swipebox(ez.getGalleryList());
            return false;
        });
    </script>

    @endsection
