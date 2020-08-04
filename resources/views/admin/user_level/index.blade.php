@extends('admin.layout.master')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">کاربران</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('admin.partials.form_errors')

            @if(Session::has('delete_user'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_user')}}</div>
                </div>
            @endif

            @if(Session::has('updated'))
                <div class="alert alert-success">
                    <div>{{Session('updated')}}</div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background: #5fff93">
                        <th class="text-center">شناسه</th>
                        <th class="text-center">تصویر کاربر</th>
                        <th class="text-center">نام کاربر</th>
                        <th class="text-center">ایمیل کاربر</th>
                        <th class="text-center">نقش کاربر</th>
                        <th class="text-right">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">
@if($user->photo_id)
                                    <img width="45%" src="{{$user->photo->path}}">

   @else
                                    <img src="http://www.placehold.it/90">
                                    @endif





                            </td>
                            <td class="text-center">{{$user->name.' '.$user->last_name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">
                                @foreach($user->roles as $role){{$role->title}}<br>
                                @endforeach
                            </td>
                            <td class="text-right">

                                <a class="btn btn-warning pull-right" href="{{route('user_level.edit',$user->id)}}">
                                    ویرایش
                                </a>

                                <form method="post" action="/administrator/user_level/{{$user->id}}"
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
