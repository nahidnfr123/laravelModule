@extends('admin::layouts.master')

@section('content')
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- component -->
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <ul id="tree1">
                                            @foreach($affiliates as $affiliate)
                                                <li class="ml-6 p-1 border-l border-l-gray-400 border-b border-b-gray-300">
                                                    <strong><span class="mr-2">{{ $affiliate->id }}.</span>{{ $affiliate->name }}</strong>
                                                    @if(count($affiliate['children']))
                                                        @include('admin::components.manageChild',['childs' => $affiliate['children']])
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
