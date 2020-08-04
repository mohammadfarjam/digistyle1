@foreach($categories as $sub_category)
    <tr>
        <td>{{$sub_category->id}}</td>
        <td>{{str_repeat('--',$level)}}{{$sub_category->name}}</td>
        <td class="text-right">
            <a type="submit" class="btn btn-warning pull-right" href="{{route('categories.edit',$sub_category->id)}}">ویرایش</a>
            <form method="post" action="categories/{{$sub_category->id}}" class="pull-right">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" style="margin-right: 8px;">حذف</button>
            </form>

            <a class="btn btn-primary pull-right" href="{{route('categories.indexSetting',$sub_category->id)}}">
                تنظیمات
            </a>
        </td>

    </tr>



    @if(count($sub_category->childrenRecursive)>0)
        @include('admin.partials.category_list',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif

@endforeach
