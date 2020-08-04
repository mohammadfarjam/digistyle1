@extends('admin.layout.master')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">اسلایدر</h3>
            <a class="btn btn-app pull-left" href="{{route('slider.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            @include('admin.partials.form_errors')

            @include('sweetalert::alert')


            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background: #5fff93">
                        <th class="text-center">شناسه</th>
                        <th class="text-center">عنوان اسلایدر</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center" width="40%">تصویر</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td class="text-center">{{$slider->id}}</td>
                            <td class="text-center">{{$slider->title}}</td>
                            <td class="text-center status">
                                @if($slider->status==0)
                                    <span class="label label-danger">منتشر نشده</span>
                                @else
                                    <span class="label label-success">منتشر شده</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <img src="{{$slider->photo->path}}" width="85%">
                            </td>
                            <td class="text-center">


                                <a href="{{route('slider.edit',$slider->id)}}"><i class="fa fa-edit"
                                                                                  style="font-size:2.5rem;color:#ffd529"></i></a>
                            </td>
                            <td class="text-center">
                                <form method="post" id="form_delete" action="/administrator/slider/{{$slider->id}}"
                                      class="">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <i onclick="submit()" class="fa fa-trash"
                                       style="font-size:2.5rem;color:#ff2e1d;cursor: pointer"></i>
                                </form>
                                <script type="text/javascript" src="{{asset('/js/jquery-3.min.js')}}"></script>
                                <script>
                                    function submit() {
                                        $('#form_delete').submit();
                                    }
                                </script>
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
