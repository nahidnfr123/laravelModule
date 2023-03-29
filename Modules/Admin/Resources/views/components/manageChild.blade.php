<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->name }}
            @if(count($child['children']))
                @include('admin::components.manageChild',['children' => $child['children']])
            @endif
        </li>
    @endforeach
</ul>
