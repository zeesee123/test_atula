@extends('app.layout')


@push('styles')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

@endpush

@section('content')

<div class="page-header d-print-none">

     <div class="container-xl">
        <h3>Edit Job</h3>

        <div class="card">
  <div class="card-body">

    <form action="{{ url('/admin/edit_job') }}" enctype="multipart/form-data" method="POST" id="main_form">
        @csrf
    
        <div class="card pt-3 p-4">
            <div class="row">
    
                {{-- Job Profile --}}
                <div class="mb-3 col-6">
                    <label class="form-label">Job Profile</label>
                    <input type="text" class="form-control" name="profile"
                           value="{{ old('profile', isset($model) ? $model->profile : '') }}">
                    @error('profile')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Number of Positions --}}
                <div class="mb-3 col-3">
                    <label class="form-label">Positions</label>
                    <input type="text" class="form-control" name="positions"
                           value="{{ old('positions', isset($model) ? $model->positions : '') }}">
                    @error('positions')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Experience --}}
                <div class="mb-3 col-3">
                    <label class="form-label">Experience</label>
                    <input type="text" class="form-control" name="experience"
                           value="{{ old('experience', isset($model) ? $model->experience : '') }}">
                    @error('experience')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Location --}}
                <div class="mb-3 col-12">
                    <label class="form-label">Location</label>
                    <textarea name="location" class="form-control" rows="3">{{ old('location', isset($model) ? $model->location : '') }}</textarea>
                    @error('location')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Eligibility --}}
                <div class="mb-3 col-12">
                    <label class="form-label">Eligibility</label>
                    <textarea name="eligibility" class="form-control" rows="3">{{ old('eligibility', isset($model) ? $model->eligibility : '') }}</textarea>
                    @error('eligibility')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Summary --}}
                <div class="mb-3 col-12">
                    <label class="form-label">Summary</label>
                    <textarea name="summary" class="form-control" rows="3">{{ old('summary', isset($model) ? $model->summary : '') }}</textarea>
                    @error('summary')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Requirements --}}
                <div class="mb-3 col-12">
                    <label class="form-label">Requirements</label>
                    <textarea name="requirements" class="form-control" rows="4">{{ old('requirements', isset($model) ? $model->requirements : '') }}</textarea>
                    @error('requirements')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
            </div>
        </div>
    
        {{-- Submit Button --}}
        <div class="text-end p-3" style="bottom:0;position:sticky;z-index:1030;">
            <button type="submit" class="btn btn-lg btn-primary p-3" id="spin_submit" title="Save">
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


<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    @endif
});
</script>


<script>
    let main_form=document.getElementById('main_form');

    let spin_submit=document.getElementById('spin_submit');

    main_form.addEventListener('submit',(e)=>{

        e.preventDefault();

        spin_submit.innerHTML=`<div class="spinner-border mx-2" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`;
        
        console.log('submit event');

        main_form.submit();
    });

</script>


<script src="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js
"></script>

{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
<script src="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js
"></script>


{{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}

<script src="{{ asset_env('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>


{{-- Initialize CKEditor --}}
{{-- <script>
      tinymce.init({
        selector: '#blog_content'
      });
    </script> --}}
<script>
tinymce.init({
  selector: '#blog_content',
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



@endpush