@extends('admin.layout.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> کد تخفیف </h3>

            <a class="btn btn-app pull-left" href="{{route('coupons.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
{{--            @include('admin.partials.form_errors')--}}

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
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>کد تخفیف</th>
                        <th> مقدار</th>
                        <th> وضعیت</th>

                        <th class="text-right">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->title}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->value}}</td>
                            <td>

                                @if($coupon->status==0)

                                    <span>غیرفعال</span>

                                    @else

                                    <span>فعال</span>
                                    @endif
                            </td>
                            <td class="text-right">

                                <a class="btn btn-warning pull-right" href="{{route('coupons.edit',$coupon->id)}}">
                                    ویرایش
                                </a>

                                <form method="post" action="/administrator/coupons/{{$coupon->id}}"
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
