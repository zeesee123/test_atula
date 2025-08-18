@extends('app.layout')


@push('styles')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.css
" rel="stylesheet"/>

<link href="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css
" rel="stylesheet">

@endpush

@section('content')

<div class="page-header d-print-none">

     <div class="container-xl">
        <h3>Edit Image</h3>

        <div class="card">
  <div class="card-body">
    <form action="{{ url('/admin/edit_galleryimage') }}" enctype="multipart/form-data" method="POST" id="main_form">
        @csrf
    
        <div class="card pt-3 p-4">
            <div class="row">
    
                {{-- Category Select --}}
                <div class="mb-3 col-6">
                    <label class="form-label">Category Name</label>
                    <select name="category_id" id="categorySelect" class="form-select">
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}" data-type="{{ $category->category }}">
                              {{ $category->category }}
                          </option>
                      @endforeach
                  </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Images & Category Text --}}
                <div id="image-upload-wrapper" class="mb-3 col-6">
                  <label class="form-label">Add Images (You can add multiple)</label>
                  <input type="file" name="images[]" class="filepond" multiple>
              </div>

              @if($video)
               <div class="mb-3 col-6">
                <label class="form-label">Video URL</label>
                  <input type="text" name="url">
               </div>
               @endif
    
            </div>
        </div>
    
        <div class="text-end p-3" style="bottom:0;position:sticky;z-index: 1030;">
            <button class="btn btn-lg btn-primary p-3" id="spin_submit">
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js
"></script>

{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
<script src="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js
"></script>

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

FilePond.registerPlugin(FilePondPluginImagePreview);

// For image uploads (multiple allowed)
document.querySelectorAll('input[name="images[]"]').forEach(input => {
    FilePond.create(input, {
        allowMultiple: true,
        allowImagePreview: true,
        instantUpload: false,
        server: null,
        storeAsFile: true
    });
});

// For video thumbnail uploads (only one file per input)
document.querySelectorAll('input[name="video_thumbnails[]"]').forEach(input => {
    FilePond.create(input, {
        allowMultiple: false, // ⛔ only 1 file
        allowImagePreview: true,
        instantUpload: false,
        server: null,
        storeAsFile: true
    });
});

</script>






  
  <script>

document.addEventListener('DOMContentLoaded', function () {
  const select = document.getElementById('categorySelect');
  const imgWrap = document.getElementById('image-upload-wrapper');
  const vidWrap = document.getElementById('video-upload-wrapper');

  function setDisabled(wrapper, disabled) {
    wrapper.querySelectorAll('input,select,textarea,button').forEach(el => {
      el.disabled = disabled;
      if (disabled) {
        if (el.type === 'file') {
          const pond = window.FilePond ? FilePond.find(el) : null;
          if (pond) pond.removeFiles();
        } else if (el.tagName !== 'BUTTON') {
          el.value = '';
        }
      }
    });
  }

  function show(el){ el.style.display = ''; }
  function hide(el){ el.style.display = 'none'; }

  function updateView() {
    const opt = select.options[select.selectedIndex];
    const type = opt ? (opt.dataset.type || '') : '';

    if (type === 'video') {
      hide(imgWrap); show(vidWrap);
      setDisabled(imgWrap, true); setDisabled(vidWrap, false);
    } else {
      // Default case (all categories except video → show image)
      show(imgWrap); hide(vidWrap);
      setDisabled(imgWrap, false); setDisabled(vidWrap, true);
    }
  }

  select.addEventListener('change', updateView);
  updateView();
});
  </script>
  

@endpush