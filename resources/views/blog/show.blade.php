<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- start --}}
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h5>Details view </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.create') }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    value="{{ $blog->blogDescription }}"
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}
</x-app-layout>
