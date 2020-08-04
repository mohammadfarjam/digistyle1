
    @foreach($categories as $sub_category)

        <li><a href="{{route('show_category',$sub_category->id)}}">{{$sub_category->name}}<span>&rsaquo;</span></a>

            @if(count($sub_category->childrenRecursive)>0)
            @include('frontend.partials.child_category2',['categories'=>$sub_category->childrenRecursive])
            @endif
            @endforeach
 </li>




