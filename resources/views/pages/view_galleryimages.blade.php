@extends('app.layout')


@push('styles')
@endpush

@section('content')

<div class="page-header d-print-none">


   <!-- Dynamic category tabs -->

   <!-- Delete Confirmation Modal -->

  


  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal_content">
          Are you sure you want to delete this image?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
        </div>
      </div>
      {{-- test --}}
    </div>
  </div>
  

     <div class="container-xl">
        <h3>View Gallery Images</h3>

        <div class="card">
  <div class="card-body">

    <ul class="nav nav-tabs" id="categoryTab" role="tablist">
      @foreach($categories as $category)
      <li class="nav-item" role="presentation">
          <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                  id="tab-{{ $category->id }}" 
                  data-bs-toggle="tab" 
                  data-bs-target="#pane-{{ $category->id }}" 
                  type="button" role="tab">
              {{ $category->category }}
          </button>
      </li>
      @endforeach
  </ul>
  
  <div class="tab-content mt-3">
      @foreach($categories as $category)
      <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
           id="pane-{{ $category->id }}" 
           role="tabpanel">
          <table class="table table-bordered datatable" id="table-{{ $category->id }}">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Image</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody></tbody>
          </table>
      </div>
      @endforeach
  </div>
   
   
  </div>
</div>


     </div>
    
</div>

@endsection




@push('scripts')


<script src="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js
"></script>

{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
<script src="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js
"></script>

<script>

@foreach($categories as $category)
$('#table-{{ $category->id }}').DataTable({
    ajax: "{{ url('admin/gallery_table/'.$category->id) }}",
    processing: true,
    columns: [
        {data:'id'},
        {data:'image'},
        {data:'actions', orderable:false, searchable:false}
    ],
    dom: 'Bfrtip',
    buttons: ['copy','csv','excel','pdf','print']
});
@endforeach
</script>

<script>

let deleteImageId = null;

// Use event delegation because table rows can be dynamic
$(document).on('click', '.delete-btn', function() {
    deleteImageId = $(this).data('id'); // store the id
    // optional: update modal content dynamically
    $('#modal_content').text('Are you sure you want to delete this image?');
    $('#staticBackdrop').modal('show'); // show modal
});


$('#confirmDelete').on('click', function() {
    if (!deleteImageId) return;

    const btn = $(this);
    const originalHtml = btn.html();

    // Show spinner
    btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...`);
    btn.prop('disabled', true);

    $.ajax({
        url: '/admin/delete_galleryimage/' + deleteImageId,
        type: 'DELETE',
        data: { _token: '{{ csrf_token() }}' },
        success: function(response) {
            $('#staticBackdrop').modal('hide');

            // Reset button
            btn.html(originalHtml);
            btn.prop('disabled', false);

            // Reload table
            const categoryId = response.category_id;
            $('#table-' + categoryId).DataTable().ajax.reload(null, false);

            // SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: response.message
            });

            deleteImageId = null;
        },
        error: function(err) {
            btn.html(originalHtml);
            btn.prop('disabled', false);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        }
    });
});
</script>



@endpush