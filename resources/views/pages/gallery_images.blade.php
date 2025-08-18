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
        <h3>Add Image Category</h3>

        <div class="card">
  <div class="card-body">
    <form action="{{ url('/admin/add/gallery_images') }}" enctype="multipart/form-data" method="POST" id="main_form">
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

                <div id="video-upload-wrapper" class="card p-4 mt-3">
                  <h5>Video Upload Section</h5>
                
                  <div id="video-fields">
                    <div class="video-item mb-3 row">
                      <div class="col-6">
                        <label class="form-label">Thumbnail Image</label>
                        <!-- FilePond for thumbnail -->
                        <input type="file" name="video_thumbnails[]" class="filepond" required>
                      </div>
                      <div class="col-6">
                        <label class="form-label">Video URL</label>
                        <input type="url" name="video_urls[]" class="form-control" placeholder="https://youtube.com/..." required>
                      </div>
                    </div>
                  </div>
                
                  <button type="button" class="btn btn-secondary" onclick="addVideoField()">Add Another Video</button>
                </div>
    
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
 function addVideoField() {
  let wrapper = document.getElementById("video-fields");

  let newField = document.createElement("div");
  newField.classList.add("video-item", "mb-3", "row");

  newField.innerHTML = `
    <div class="col-6">
      <label class="form-label">Thumbnail Image</label>
      <input type="file" name="video_thumbnails[]" class="filepond" required>
    </div>
    <div class="col-6">
      <label class="form-label">Video URL</label>
      <input type="url" name="video_urls[]" class="form-control" placeholder="https://youtube.com/..." required>
    </div>
    <div class="col-12 mt-2">
      <button type="button" class="btn btn-danger btn-sm" onclick="removeVideoField(this)">Remove</button>
    </div>
  `;

  wrapper.appendChild(newField);

  // re-init FilePond for newly added file input
  const input = newField.querySelector('.filepond');
  FilePond.create(input, {
      allowMultiple: false, // only 1 file per thumbnail
      allowImagePreview: true,
      instantUpload: false,
      server: null,
      storeAsFile: true   // <-- this is crucial
  });
}


function removeVideoField(button) {
  button.closest('.video-item').remove();
}
</script>

<script>
  // document.getElementById('categorySelect').addEventListener('change', function () {
  //     const selectedOption = this.options[this.selectedIndex];
  //     const type = selectedOption.getAttribute('data-type'); // "image" or "video"
  
  //     const imageWrapper = document.getElementById('image-upload-wrapper');
  //     const videoWrapper = document.getElementById('video-upload-wrapper');
  
  //     if (type === "image") {
  //         imageWrapper.style.display = "block";
  //         videoWrapper.style.display = "none";
  //         enableImageInputs();
  //         disableVideoInputs();
  //     } else if (type === "video") {
  //         imageWrapper.style.display = "none";
  //         videoWrapper.style.display = "block";
  //         enableVideoInputs();
  //         disableImageInputs();
  //     } else {
  //         imageWrapper.style.display = "none";
  //         videoWrapper.style.display = "none";
  //         disableImageInputs();
  //         disableVideoInputs();
  //     }
  // });
  
  // function disableImageInputs() {
  //     document.querySelectorAll('#image-upload-wrapper input').forEach(inp => inp.disabled = true);
  // }
  // function enableImageInputs() {
  //     document.querySelectorAll('#image-upload-wrapper input').forEach(inp => inp.disabled = false);
  // }
  
  // function disableVideoInputs() {
  //     document.querySelectorAll('#video-upload-wrapper input').forEach(inp => inp.disabled = true);
  // }
  // function enableVideoInputs() {
  //     document.querySelectorAll('#video-upload-wrapper input').forEach(inp => inp.disabled = false);
  // }
  
  // // Run once on page load (so the correct section shows if editing an existing item)
  // document.addEventListener("DOMContentLoaded", () => {
  //     document.getElementById('categorySelect').dispatchEvent(new Event('change'));
  // });
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

    if (type === 'videos') {
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