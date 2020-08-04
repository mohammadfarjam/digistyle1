@extends('admin.layout.master')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش کد تخفیف </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/coupons/{{$coupon->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group">
                            <labe for="name">عنوان کد :</labe>
                            <input type="text" value="{{$coupon->title}}" name="title" class="form-control"
                                   placeholder="عنوان کد را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name"> کد :</labe>
                            <input type="text" value="{{$coupon->code}}" name="code" class="form-control">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name"> مقدار :</labe>
                            <input type="text" value="{{$coupon->value}}" name="value" class="form-control">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name"> وضعیت :</labe>
                            <input style="vertical-align: middle" type="radio" value="0" name="status" @if($coupon->status ==0) checked @endif  ><span
                                style="margin-right: 7px;vertical-align: middle;">منتشر نشده</span>
                            <input style="margin-right: 30px;vertical-align: middle" type="radio" value="1"
                                   name="status" @if($coupon->status==1 ) checked @endif  ><span style="margin-right: 7px;">منتشر شده</span>
                        </div>{{--form-control--}}

                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>

@endsection


