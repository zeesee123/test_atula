@extends('app.layout')


@push('styles')
@endpush

@section('content')

<div class="page-header d-print-none">


  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Blog</h1>
          <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal_content">
          Are you sure you want to delete this blog?
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
        <h3>View blogs</h3>

        <div class="card">
  <div class="card-body">

    <table class="table" id="whatwedo_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Blog Name</th>
            <th scope="col">Blog Image</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
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

var table1=$('#whatwedo_table').DataTable({
              ajax:"{{url('admin/get_blogs')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"blog_name"},
                {"data":"image"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  });
</script>

<script>

let deleteBlogId = null;

// Event delegation for dynamic rows
$(document).on('click', '#whatwedo_table .eradicator', function() {
    deleteBlogId = $(this).data('id');
    const blogName = $(this).closest('tr').find('td:nth-child(2)').text(); // second column = blog_name
    $('#modal_content').text(`Are you sure you want to delete blog "${blogName}"?`);
    $('#staticBackdrop').modal('show'); // show modal
});

// Confirm delete button in modal
$('#confirmDelete').on('click', function() {
    if (!deleteBlogId) return;
    const btn = $(this);
    const originalHtml = btn.html();

    // Show spinner inside the button
    btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...`);
    btn.prop('disabled', true);

    $.ajax({
        url: '/admin/delete_blog/' + deleteBlogId,
        type: 'DELETE',
        data: { _token: '{{ csrf_token() }}' },
        success: function(response) {
            $('#staticBackdrop').modal('hide');   // hide modal
            btn.html(originalHtml);               // restore button text
            btn.prop('disabled', false);
            table1.ajax.reload(null, false);      // reload DataTable without resetting paging
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: response.message
            });
            deleteBlogId = null;
        },
        error: function() {
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