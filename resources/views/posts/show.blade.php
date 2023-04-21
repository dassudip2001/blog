<div class="container">
    <h1>{{ $post->blogName }}</h1>

    {{-- <div class="mb-3">
            {{ $post->created_at->diffForHumans() }}
        </div>
        

        <p>{{ $post->body }}</p> --}}
    <div class="card">
        <div class="card-title">
            <a href="{{ url('/') }}" class="btn btn-secondary float-end m-1">Back to List</a>
            <h4><b class="fs-1">{{ $post->blogName }}</b></h4>
            <hr>

        </div>
        {{-- <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}"> --}}
        <div class="card-body">
            <h5 class="card-title">{{ $post->blogName }}</h5>
            <p class="card-text">{!! $post->blogDescription !!}</p>
        </div>
    </div>

    {{-- <a href="{{ url('/') }}" class="btn btn-secondary">Back to home</a> --}}
</div>
