<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Edit Page') }}
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
                    <!-- Auther name  -->
                    <div class="mb-6">
                        <label for="categoryName"> Name<span class="required" style="color: red;">*</span></label>
                        <input type="text"
                            class="form-control form-control-sm  @error('categoryName') is-invalid @enderror"
                            name="categoryName" id="categoryName" aria-describedby="categoryName"
                            value="{{ $b->categoryName }}" placeholder=" Books Name">
                    </div>

                    <!-- Details -->
                    <div class="mb-6">
                        <label for="description">Describption</label>
                        <textarea type="text" class="form-control form-control-sm  @error('description') is-invalid @enderror"
                            name="description" id="description" row="3" aria-describedby="description" placeholder="Enter Describption"> {{ $b->description }} </textarea>
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
</x-app-layout>
