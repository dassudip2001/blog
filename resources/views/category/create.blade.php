<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Create Page') }}
        </h2>
    </x-slot>

    {{-- start --}}
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
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel"><b>Category</b> </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.create') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Blog name  -->
                                    <div class="mb-6">
                                        <label for="categoryName">Category Title<span class="required"
                                                style="color: red;">*</span></label>
                                        <input type="text"
                                            class="form-control form-control-sm  @error('categoryName') is-invalid @enderror"
                                            name="categoryName" id="categoryName" aria-describedby="categoryName"
                                            placeholder="Enter the Blog Title">
                                    </div>


                                    <!-- Details -->
                                    <div class="mb-6">
                                        <label for="description">Describption</label>
                                        <textarea type="text" class="form-control form-control-sm  @error('description') is-invalid @enderror"
                                            name="description" id="editor" row="3" aria-describedby="description"
                                            placeholder="Enter Blog Describption"></textarea>
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
                    data-bs-toggle="modal">Add New Category</button>
                <h5 class="mt-2 mx-2 fs-3"><b>Category</b> </h5>
                <hr>
            </div>
            <div class="card-body overflow-auto">
                <table class="table table-success overflow-auto">
                    <thead class="table-dark overflow-auto">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Describption</th>


                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($b as $key => $pub)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $pub->categoryName }}</td>
                                <td>{{ $pub->description }}</td>

                                <td>
                                    <a style="color: black" href=" {{ url('/category/edit', $pub->id) }} ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a style="color: red" href=" {{ url('/category/delete', $pub->id) }} ">
                                        <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $b->onEachSide(5)->links() }}
            </div>
        </div>

    </div>


    {{-- end --}}
</x-app-layout>
