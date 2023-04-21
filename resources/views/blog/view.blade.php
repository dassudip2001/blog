<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Page') }}
        </h2>
    </x-slot>

    {{--  --}}
    <div class="card">
        <div class="card-title">
            <a href="{{ route('blog.index') }}" class="btn btn-secondary float-end m-1">Back to List</a>
            <h4><b class="fs-1">{{ $blog->blogName }}</b></h4>
            <hr>

        </div>
        {{-- <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}"> --}}
        <div class="card-body">
            <h5 class="card-title">{{ $blog->blogName }}</h5>
            <p class="card-text">{!! $blog->blogDescription !!}</p>
        </div>
    </div>

</x-app-layout>
