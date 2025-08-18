@extends('app.layout')


@push('styles')
@endpush

@extends('app.layout')

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <h3>View Careers / Jobs</h3>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Career</h1>
            <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal_content">Are you sure you want to delete this career?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Careers Table -->
    <div class="card">
      <div class="card-body">
        <table class="table" id="careers_table">
          <thead>
            <tr>
              <th>#</th>
              <th>Job Title</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
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

var careerTable = $('#careers_table').DataTable({
    ajax:"{{ url('admin/careers/loadtable') }}",
    processing:true,
    columns:[
        {data:'id'},
        {data:'title'},
        {data:'actions'}
    ]
});

let deleteCareerId = null;

// Delete button click
$(document).on('click', '#careers_table .eradicator', function() {
    deleteCareerId = $(this).data('id');
    const title = $(this).closest('tr').find('td:nth-child(2)').text();
    $('#modal_content').text(`Are you sure you want to delete career "${title}"?`);
    $('#staticBackdrop').modal('show');
});

// Confirm delete in modal
$('#confirmDelete').on('click', function() {
    if (!deleteCareerId) return;
    const btn = $(this);
    const originalHtml = btn.html();
    btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...`);
    btn.prop('disabled', true);

    $.ajax({
        url:'/admin/careers/delete/'+deleteCareerId,
        type:'DELETE',
        data:{_token:'{{ csrf_token() }}'},
        success:function(response){
            $('#staticBackdrop').modal('hide');
            btn.html(originalHtml);
            btn.prop('disabled', false);
            careerTable.ajax.reload(null,false);
            Swal.fire({icon:'success',title:'Deleted!',text:response.message});
            deleteCareerId = null;
        },
        error:function(){
            btn.html(originalHtml);
            btn.prop('disabled', false);
            Swal.fire({icon:'error',title:'Oops...',text:'Something went wrong!'});
        }
    });
});
</script>




@endpush