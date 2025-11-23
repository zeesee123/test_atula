@extends('app.layout')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush

@section('content')

<div class="page-header d-print-none">
<div class="container-xl">

    <div class="d-flex justify-content-between">
        <h3>Edit Team Member</h3>
        {{-- <div><a class="btn btn-primary" href="#"><i class="bi bi-eye-fill mx-1"></i> Preview</a></div> --}}
    </div>

    <div class="card">
    <div class="card-body">

    <form action="/admin/edit_team/{{ $team->id }}" method="POST" enctype="multipart/form-data" id="main_form">
    @csrf

    <div class="card pt-3 p-4">
    <div class="row">

        {{-- IMAGE --}}
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control img_inpp" name="image">
            </div>

            <div class="mb-3 col-2 pt-4">
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reset image">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>

            <div class="mb-3 col-4">
                <img class="Thumbnail" 
                     src="{{ $team->image ? asset_env('team/'.$team->image) : asset_env('images/default.jpg') }}"
                     width="400">
            </div>
        </div>

        {{-- NAME --}}
        <div class="mb-3 col-6">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $team->name }}">
        </div>

        {{-- TITLE --}}
        <div class="mb-3 col-6">
            <label class="form-label">Designation</label>
            <input type="text" class="form-control" name="title" value="{{ $team->title }}">
        </div>

        {{-- LINKEDIN --}}
        <div class="mb-3 col-6">
            <label class="form-label">LinkedIn URL</label>
            <input type="text" class="form-control" name="linkedin" value="{{ $team->linkedin }}">
        </div>

        {{-- QUOTE --}}
        <div class="mb-3 col-6">
            <label class="form-label">Quote (optional)</label>
            <input type="text" class="form-control" name="quote" value="{{ $team->quote }}">
        </div>

        {{-- CONTENT --}}
        <div class="mb-3 col-12">
            <label class="form-label">Content</label>
            <textarea id="content" name="content" class="form-control">{{ $team->content }}</textarea>
        </div>

    </div>
    </div>

    <div class="text-end p-3 sticky-bottom">
        <button type="submit" class="btn btn-lg btn-primary p-3" id="spin_submit">
            <i class="bi bi-floppy2-fill mx-2"></i> Save
        </button>
    </div>

    </form>

    </div>
    </div>

</div>
</div>

@endsection


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- SWEETALERT FLASH MESSAGES --}}
<script>
document.addEventListener("DOMContentLoaded", function() {

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d33'
        });
    @endif

    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Errors',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#d33'
        });
    @endif

});
</script>


{{-- SUBMIT SPINNER --}}
<script>
    let form = document.getElementById('main_form');
    let btn = document.getElementById('spin_submit');

    form.addEventListener('submit', e => {
        e.preventDefault();

        btn.innerHTML = `
            <div class="spinner-border mx-2" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;

        if (tinymce.get("content")) {
            tinymce.triggerSave();
        }

        form.submit();
    });
</script>


{{-- TINYMCE --}}
<script src="{{ asset_env('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<script>
tinymce.init({
    selector: '#content',
    license_key: 'gpl',
    height: 400,
    menubar: true,
    plugins: 'link image code lists',
    toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image code',
    block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4',
    valid_elements: '*[*]',
    valid_children: '+body[h1,h2,h3,h4]'
});
</script>


{{-- IMAGE PREVIEW + CLEAR --}}
<script>
let imageInputs = document.querySelectorAll('.img_inpp');
let thumbs = document.querySelectorAll('.Thumbnail');

imageInputs.forEach((input, idx) => {
    input.addEventListener('change', e => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = ev => thumbs[idx].src = ev.target.result;
            reader.readAsDataURL(file);
        }
    });
});

document.querySelectorAll('.clear-btn').forEach((btn, idx) => {
    btn.addEventListener('click', () => {
        thumbs[idx].src = "{{ asset_env('images/default.jpg') }}";
        imageInputs[idx].value = "";
    });
});
</script>

@endpush
