<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Create Page') }}
        </h2>
    </x-slot>

    {{-- start  --}}
    {{-- <div id="editor">This is some sample content.</div> --}}
    <div class="mb-6">
        <label for="department_details">Department Details</label>
        <input type="text" class="form-control form-control  " name="description" id="editor"
            aria-describedby="department_details" placeholder="Enter Department Description">
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
