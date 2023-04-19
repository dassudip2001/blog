<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Create Page') }}
        </h2>
    </x-slot>

    {{-- start  --}}
    <div class="container mt-4">
        <div class="card">
            <div class="card-title">
                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel"><b>Blog</b> </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('blog.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!--Blog Title  -->
                                    <div class="mb-6">
                                        <label for="blogName">Blog Title<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('blogName') is-invalid @enderror"
                                            name="blogName" id="blogName" aria-describedby="blogName"
                                            placeholder=" Books Name">
                                    </div>

                                    {{-- Category name --}}
                                    <div class="mb-6">
                                        <label for="categoryId">Category<span class="required"
                                                style="color: red;">*</span></label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" name="categoryId" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                @foreach ($c as $publication)
                                                    <option value="{{ $publication->id }}">
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
                                            placeholder="Enter Describption"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-denger">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-end mt-2 mx-2" data-bs-target="#exampleModalToggle"
                    data-bs-toggle="modal">Add New Blog</button>
                <h5 class="mt-2 mx-2 fs-3"><b>Blog</b> </h5>
                <hr>
            </div>
            <div class="card-body overflow-auto">
                <table class="table table-success overflow-auto">
                    <thead class="table-dark overflow-auto">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Category</th>
                            {{-- <th scope="col">Blog Contain</th> --}}

                            <th scope="col">Action</th>
                            {{-- <th scope="col">Show</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->blogName }}</td>
                                <td>{{ $pub->categoryName }}</td>

                                {{-- <td>{{ $pub->blogDescription }}</td> --}}
                                @if (Auth::user()->id == '1' || Auth::id() == $pub->id)
                                    <td>
                                        <a style="color: black" href=" {{ url('/blog/edit', $pub->id) }} ">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a style="color: red" href=" {{ url('/blog/delete', $pub->id) }} ">
                                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                    {{-- <td>
                                    <a style="color: black" href=" {{ url('/blog/show', $pub->id) }} ">
                                        <i class="fa-sharp fa-solid fa-eye"></i>
                                    </a>
                                </td> --}}
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $book->onEachSide(3)->links() }} --}}
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
