@extends('frontend.layout.master')

@section('content')

    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success col-lg-7 col-md-offset-2" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">{{ __('بازیابی رمز عبور') }}</div>
<br>
                <div class="card-body" style="background: lemonchiffon;">


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" style="padding-top: 20px;margin-right: 20px;" class="col-md-2 col-form-label text-md-right">{{ __('آدرس ایمیل :') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="email" placeholder="آدرس ایمیل خود را وارد کنید" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="margin-top: 15px" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-4 offset-md-2 pull-left">
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 25px;border-radius: 3px">
                                    {{ __('ارسال لینک بازیابی رمز عبور') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection






