
    <div class="dropdown-menu">
        @foreach($categories as $sub_category)
        <ul>
            <li><a href="{{route('show_category',$sub_category->id)}}">{{$sub_category->name}}</a></li>
        </ul>
        @endforeach
    </div>

