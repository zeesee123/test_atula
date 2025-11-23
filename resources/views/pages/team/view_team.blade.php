@extends('app.layout')

@push('styles')
@endpush

@section('content')

<div class="page-header d-print-none">

    {{-- DELETE MODAL --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Team Member</h1>
                    <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body" id="modal_content">
                    Are you sure you want to delete this member?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
                </div>

            </div>
        </div>

    </div>
    {{-- END MODAL --}}

    <div class="container-xl">
        <div class="d-flex justify-content-between">
            <h3>View Team Members</h3>
            <a href="{{ url('/admin/add_team') }}" class="btn btn-primary">
                <i class="bi bi-file-earmark-plus-fill mx-1"></i>Create Team Member
            </a>
        </div>

        <div class="card mt-3">
            <div class="card-body">

                <table class="table" id="team_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>

<script>
var table1 = $('#team_table').DataTable({
    ajax: "{{ url('admin/get_teams') }}",
    processing: true,
    columns: [
        { data: "id" },
        { data: "name" },
        { data: "image" },
        { data: "title" },
        { data: "actions" }
    ],
    order: [],
    dom: 'Bfrtip',
    buttons: [
        { extend: 'copy', exportOptions: { modifier: { page: 'current' } } },
        { extend: 'csv', exportOptions: { modifier: { page: 'current' } } },
        { extend: 'excel', exportOptions: { modifier: { page: 'current' } } },
        { extend: 'pdf', exportOptions: { modifier: { page: 'current' } } },
        { extend: 'print', exportOptions: { modifier: { page: 'current' } } },
    ]
});
</script>

<script>
let deleteTeamId = null;

// CLICK DELETE BUTTON
$(document).on('click', '#team_table .eradicator', function() {

    deleteTeamId = $(this).data('id');
    const name = $(this).closest('tr').find('td:nth-child(2)').text();

    $('#modal_content').text(`Are you sure you want to delete "${name}"?`);
    $('#staticBackdrop').modal('show');
});

// CONFIRM DELETE
$('#confirmDelete').on('click', function() {
    if (!deleteTeamId) return;

    const btn = $(this);
    const oldText = btn.html();

    btn.html(`<span class="spinner-border spinner-border-sm"></span> Deleting...`);
    btn.prop('disabled', true);

    $.ajax({
        url: '/admin/delete_team/' + deleteTeamId,
        type: 'DELETE',
        data: { _token: '{{ csrf_token() }}' },

        success: function(res) {
            $('#staticBackdrop').modal('hide');
            btn.html(oldText);
            btn.prop('disabled', false);

            table1.ajax.reload(null, false);

            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: res.message
            });

            deleteTeamId = null;
        },

        error: function() {
            btn.html(oldText);
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