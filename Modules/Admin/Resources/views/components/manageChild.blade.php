<ul>
    @foreach($childs as $child)
        <li class="ml-6 pl-1 border-l border-l-gray-400 border-b border-b-gray-300">
            <div class="flex justify-between">
                <strong><span class="mr-2">{{ $child->id }}.</span>{{ $child->name }}</strong>
{{--                <div>--}}
{{--                    <span>(<strong>Level:</strong> {{$child->depth}})</span>--}}
{{--                    <span>(<strong>Path:</strong> {{$child->path}})</span>--}}
{{--                </div>--}}
            </div>
            @if(count($child['children']))
                @include('admin::components.manageChild',['childs' => $child['children']])
            @endif
        </li>
    @endforeach
</ul>
