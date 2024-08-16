@extends('layouts.admin')

@section('content')



                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Results</h4>
                            </div>
                            <div class="text-end">
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addElectionModal"><i class="bi bi-plus-lg me-2" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"></i>New Election</button> --}}

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($positionData as $position)
                                        <div class="col-md-6 ">
                                            <div class="card">

                                                <div class="card-header">
                                                    <div class="d-flex align-items-center">
                                                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                                            <i data-feather="bar-chart" class="widgets-icons"></i>
                                                        </div>
                                                        <h5 class="card-title mb-0">Position - {{ ucwords( $position['name'] ) }}</h5>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <canvas id="chart-{{ $position['id'] }}"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>








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
                                                    <th>Position</th>
                                                    <th>Candidate</th>
                                                    <th>Votes</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div> <!-- container-fluid -->



{{-- @include('modules.admin.results.modals.add')
@include('modules.admin.results.modals.edit') --}}
@endsection


@push('scripts')
<script>
    var electionsTable = $('#elections-table').DataTable({

    ajax: {

        url: `${APP_URL}/api/results`,
        type: "GET",

    },
    dom: 'Bfrtip',
    serverSide: false,
    ordering:true,
    processing: true,
    columns: [
        {
            data: "nominee"
        },
        {
            data: "position"
        },
        {
            data: "votes"
        },


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


document.addEventListener('DOMContentLoaded', function () {
            // Prepare and render charts for each position
            @foreach ($positionData as $position)
                var ctx{{ $position['id'] }} = document.getElementById('chart-{{ $position['id'] }}').getContext('2d');
                new Chart(ctx{{ $position['id'] }}, {
                    type: 'pie', // Change to 'pie' chart
                    data: {
                        labels: @json($position['labels']),
                        datasets: [{
                            label: 'Votes',
                            data: @json($position['data']),
                            backgroundColor: [
                                'rgba(0, 123, 255)',   // Bootstrap Primary Blue
                                'rgba(40, 167, 69)',    // Bootstrap Success Green
                                'rgba(255, 193, 7)',    // Bootstrap Warning Yellow
                                'rgba(255, 7, 7)',      // Bootstrap Danger Red
                                'rgba(23, 162, 184)',   // Bootstrap Info Teal
                                'rgba(108, 117, 125)'   // Bootstrap Secondary Grey
                            ],
                            borderColor: [
                                'rgba(0, 123, 255, 1)',      // Bootstrap Primary Blue
                                'rgba(40, 167, 69, 1)',       // Bootstrap Success Green
                                'rgba(255, 193, 7, 1)',       // Bootstrap Warning Yellow
                                'rgba(255, 7, 7, 1)',         // Bootstrap Danger Red
                                'rgba(23, 162, 184, 1)',      // Bootstrap Info Teal
                                'rgba(108, 117, 125, 1)'      // Bootstrap Secondary Grey
],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.raw !== undefined) {
                                            label += context.raw;
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            @endforeach

            // Initialize DataTable
            // $('#resultsTable').DataTable();
        });

</script>
@endpush
