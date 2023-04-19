<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Edit Page') }}
        </h2>
    </x-slot>

    {{-- start --}}
    <div class="container mt-4">
        <div class="card">
            <div class="card-title">
                <h4 class="mt-2 mx-2 fs-3">Edit Books</h4>
                <hr>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--Blog Title  -->
                    <div class="mb-6">
                        <label for="blogName">Blog Title<span class="required" style="color: red;">*</span></label>
                        <input type="text"
                            class="form-control form-control-sm  @error('blogName') is-invalid @enderror"
                            name="blogName" id="blogName" aria-describedby="blogName" value="{{ $d->blogName }}"
                            placeholder=" Books Name">
                    </div>

                    {{-- Category name --}}
                    <div class="mb-6">
                        <label for="categoryId">Category<span class="required" style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="categoryId" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                @foreach ($c as $publication)
                                    <option value="{{ $publication->id }}"
                                        {{ $publication->id == $b->categories->id ? 'selected' : '' }}>
                                        {{ $publication->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Details -->
                    <div class="mb-6">
                        <label for="blogDescription">Describption</label>
                        <textarea type="text" class="form-control form-control-sm  @error('blogDescription') is-invalid @enderror"
                            name="blogDescription" id="editor" row="3" aria-describedby="blogDescription"
                            placeholder="Enter Describption">{{ $d->blogDescription }}</textarea>
                    </div>
            </div>
            <hr>
            <div class="modal-footer">
                <button type="submit" style="border: 1px soild;" class="btn btn-denger">Save</button>
                </form>
            </div>
        </div>
    </div>

    {{-- end --}}
    @section('script')
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endsection
</x-app-layout>
