@extends('layouts.admin')

@section('content')



                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Positions</h4>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addElectionModal"><i class="bi bi-plus-lg me-2" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"></i>New Position</button>

                            </div>
                        </div>




                        <!-- Button Datatable -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <table id="elections-table" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Election</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div> <!-- container-fluid -->



@include('modules.admin.positions.modals.add')
@include('modules.admin.positions.modals.edit')
@endsection


@push('scripts')
<script>
    var electionsTable = $('#elections-table').DataTable({

    ajax: {

        url: `${APP_URL}/api/positions`,
        type: "GET",

    },
    dom: 'Bfrtip',
    serverSide: false,
    ordering:true,
    processing: true,
    columns: [
        {
            data: "name"
        },
        {
            data: "election"
        },
        {
            data: null,
            'render': function(data, type, full, meta) {

                var html = '';



                    html += `<button type='button' data-row-transid='$this->transid'
                                            rel='tooltip' class='btn btn-danger btn-sm delete-btn'>
                                               <i class='fas fa-trash'></i> Delete
                                            </button>`

                return html;
            },
            className: "text-center",
            visible: true,
        }

    ],
    responsive: false,

    buttons: [{
            extend: 'print',
            title : 'Waitlist',
            attr: {
                class: "btn btn-sm btn-secondary"
            },
            exportOptions: {
                columns: [0, 1, 2, 3,4,5,6,7]
            }
        },
        {
            extend: 'excel',
            title : 'Waitlist',
            attr: {
                class: "btn btn-sm btn-success rounded-right ",
                style: "margin-right:5px; margin-left:5px;"
            },
            exportOptions: {
                columns: [0, 1, 2, 3,4,5,6,7]
            }
        },
        {
            extend: 'pdf',
            title : 'Waitlist',
            attr: {
                class: "btn btn-sm btn-info rounded-right"
            },
            exportOptions: {
                columns: [0, 1, 2, 3,4,5,6,7]
            }
        },
        {
            text: "Refresh",
            attr: {
                class: "ml-2 btn-warning btn btn-sm rounded",
                style:"margin-left:5px;"
            },
            action: function(e, dt, node, config) {
                dt.ajax.reload(false, null);
            }
        },
    ]
});


$("#category-table").on("click", ".edit-btn", function() {
            let data = categoryTable.row($(this).parents('tr')).data();


            $("#updateCategoryModal").modal("show");

            $("#update-category-id").val(data.id);
            $("#update-category-name").val(data.name);
            $("#update-category-order").val(data.order);

        });


$("#waitlist-table").on("click", ".delete-btn", function() {
    var data = waitlistTable.row($(this).parents("tr")).data();

    Swal.fire({
        title: "",
        text: "Are you sure you want to remove this record?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete"

    }).then((result) => {
        if (result.value) {
            Swal.fire({
                text: "Deleting...",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false
            });
            $.ajax({
                url: `${APP_URL}/api/waitlist/${data.id}/delete`,
                method: "POST",

            }).done(function(data) {
                if (!data.ok) {
                    Swal.fire({
                        text: data.msg,
                        icon: "error"
                    });
                    return;
                }
                Swal.fire({
                    text: "Record Deleted Successfully",
                    icon: "success"
                });

                waitlistTable.ajax.reload(false, null);

            }).fail(() => {

                Swal.fire({
                    text: "Operation Failed",
                    icon: "error"
                });
            })
        }
    })

});

</script>
@endpush
