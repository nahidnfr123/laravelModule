<ul>
    @foreach($childs as $child)
        <li class="ml-6 p-1 border-l border-l-gray-400 border-b border-b-gray-300">
            <strong><span class="mr-2">{{ $child->id }}.</span>{{ $child->name }}</strong>
            @if(count($child['children']))
                @include('admin::components.manageChild',['childs' => $child['children']])
            @endif
        </li>
    @endforeach
</ul>
