@extends('frontend.layout.master')

@section('register')
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
            <h1 class="title">ثبت نام حساب کاربری</h1>
            <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{route('login')}}">صفحه لاگین</a> مراجعه
                کنید.</p>
            <form class="form-horizontal" action="{{route('UserRegister')}}" method="post">
                @csrf
                <fieldset id="account">
                    <legend>اطلاعات شخصی شما</legend>
                    <div style="display: none;" class="form-group required">
                        <label class="col-sm-2 control-label">گروه مشتری</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="1" name="customer_group_id">
                                    پیشفرض</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-firstname" placeholder="نام" value=""
                                   name="name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی"
                                   value="" name="last_name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                        <div class="col-sm-10">
                            <input type="email" class="border form-control" id="input-email" placeholder="آدرس ایمیل"
                                   value=""
                                   name="email">
                            <span id="error_email"></span>
                        </div>
                    </div>


                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن"
                                   value="" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-fax" class="col-sm-2 control-label">کد ملی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-fax" placeholder="کد ملی" value=""
                                   name="national_code">
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>آدرس</legend>
                    <div class="form-group">
                        <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-company" placeholder="شرکت" value=""
                                   name="company">
                        </div>
                    </div>


                    <div class="form-group required">
                        <label for="input-country" class="col-sm-2 control-label">استان</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="province" name="province">
                                <option value=""> --- لطفا انتخاب کنید ---</option>
                                @foreach(\App\province::all() as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">شهر</label>
                        <div class="col-sm-10">
                            <select class="form-control cv" id="city" name="city">
                                <option> لطفا شهر خود را انتخاب کنید</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">آدرس</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-address-1" placeholder="آدرس" value=""
                                   name="address">
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value=""
                                   name="zip_code">
                        </div>
                    </div>


                </fieldset>
                <fieldset>
                    <legend>رمز عبور شما</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-password" placeholder="رمز عبور"
                                   value="" name="password">
                        </div>
                    </div>
                </fieldset>

                <div class="form-group required">
                    <label for="input-password" class="col-sm-2 control-label">تایید رمز عبور</label>
                    <div class="col-sm-10">
                        <input type="password" class=" form-control" id="confirm-password" placeholder="تایید رمز عبور"
                               value="" name="cpwd">
                        <span id="error"></span>
                    </div>

                </div>
                <div class="form-group required " style="margin-right: 147px;">
                    {!! htmlFormSnippet() !!}

                </div>
                <div class="buttons">
                    <div class="pull-left">&nbsp;
                        <input type="submit" class="btn btn-primary" id="register" value="ثبت نام">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End -->
    </div>
    <script type="text/javascript" src="{{asset('/js/jquery-3.min.js')}}"></script>
    <script>

        //for check email
        $('#input-email').change(function () {
            var email = $(this).val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {
                $('#error_email').html('<label class="badge-danger text-danger">فرمت نوشتن ایمیل اشتباه است</lable>');
                $('.border').css('box-shadow', '0px 0px 3px 1px red');
                $('#register').attr('disabled', 'disabled');
            } else {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: 'POST',
                    url: '/email_available',
                    data: {email: email},
                    success: function (data) {
                        if (data == 'unique') {
                            $('#error_email').html('<label class="text-success">ایمیل در دسترس است</lable>');
                            $('.border').css('box-shadow', '0px 0px 3px 1px green');
                            $('#register').attr('disabled', false);
                        } else {
                            $('#error_email').html('<label class="text-danger">این ایمیل قبلا استفاده شده است</lable>');
                            $('.border').css('box-shadow', '0px 0px 3px 1px red');
                            $('#register').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });

//for recive city
        $('#province').change(function () {
            var value_selected = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                type: 'POST',
                url: 'findCity',
                data: {id: value_selected},
                //dataType: 'json',
                success: function (data) {
                    $('#city').html('');
                    $.each(data, function (index, element) {
                        $('#city').append('<option value="' + element.id + '">' + element.name + '</option>');
                    });
                },
                error: function (data) {
                    alert("Error");
                }
            })
        });





        //for confirm password
        $('#confirm-password').keyup(function () {
            var cpwd = $('#confirm-password').val();
            var pwd = $('#input-password').val();

            if (cpwd != pwd) {
                $('#error').html('رمز تایید هم خوانی ندارد');
                $('#error').css('color','red');
                $('.border_pass').css('box-shadow', '0px 0px 3px 1px red');
                $('#register').attr('disabled', 'disabled');
            }else {
                $('#error').html('');
                $('.border_pass').css('box-shadow', '0px 0px 2px 1px blue');
                $('#register').attr('disabled', false);
            }
        })
    </script>

@endsection
