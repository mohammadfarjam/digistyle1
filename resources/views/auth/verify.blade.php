@extends('frontend.layout.master')

@section('content')

    <div class="col-md-8">
        <div class="card">



                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('یک ایمیل تایید اعتبار جدید به آدرس ایمیل شما ارسال شد.') }}
                    </div>
                @endif

                {{ __('لطفا ایمیل تایید اعتبار را که به ایمیل شما فرستاده شده است را تایید نمایید.') }}
                {{ __('اگر ایمیل تایید برای شما ارسال نشده است ') }}, <a href="{{ route('verification.resend') }}">{{ __('اینجا را کلیک کنید') }}</a>.
            </div>
        </div>




@endsection












{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
