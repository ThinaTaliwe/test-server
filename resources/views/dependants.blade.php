@extends('layouts.app2')

@push('styles')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">

    <style>
        .dt-buttons {
            padding-top: 15px;
        }

        .dt-buttons .buttons-copy,
        .dt-buttons .buttons-csv,
        .dt-buttons .buttons-excel,
        .dt-buttons .buttons-pdf,
        .dt-buttons .buttons-print {
            background-color: forestgreen;
        }

        .dataTables_filter label {
            color: black;
            padding-top: 2px;
        }

        .dataTables_filter .form-control {
            background-color: white;
        }

        /* CSS to change the background color of even rows in the table */
        tbody tr.odd {
            background-color: white;
            /* Light gray background */
        }

        tbody tr.even {
            background-color: white;
            /* Light gray background */
        }

        /* CSS to style the active pagination button */
        ul.pagination li.paginate_button.active a {
            background-color: green;
            /* Sets the background color to red */
            color: white;
            /* Sets the text color to white for better readability */
            border: 1px forestgreen solid;
            border-radius: 4px;
            /* Optional: Adds rounded corners to the active button */
            padding: 5px 10px;
            /* Optional: Adds some padding to increase the button size */
        }

        /* Additional styling for hover effects on the active button */
        ul.pagination li.paginate_button.active a:hover {
            background-color: darkgreen;
            /* Darkens the red on hover for a nice effect */
        }

        .hidden {
            display: none;
        }
    </style>
@endpush

@section('row_content')
    <div class="card border-gba bg-gba-light">
        <div class="panel mt-4 bg-gba-light ">
            <div class="panel-heading">
                <h2 class="bg-gba p-3 rounded text-center">All Dependants</h2>
            </div>
            <div class="panel-body">
                <table class="table table-bordered bordered table-striped table-condensed bg-gba-light"
                    id="datatable-dependant">
                    <thead class="thead-light">
                        <tr class="fw-bold text-dark bg-gba p-3">
                            <th class="text-center">Name</th>
                            <th class="text-center">Surname</th>
                            <th class="text-center">ID Number</th>
                            <th class="text-center">Date Of Birth</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Main Member</th>
                            <th class="text-center">Age</th>
                            {{-- <th class="text-center">Manage</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamically generated rows will be inserted here -->
                        @foreach ($dependants as $dependant)
                            <tr>
                                <td class="text-sm font-weight-normal pt-3 text-center">
                                    {{ $dependant->personDep->first_name }}</td>
                                <td class="text-sm font-weight-normal pt-3 text-center">
                                    {{ $dependant->personDep->last_name }}</td>
                                <td class="text-sm font-weight-normal pt-3 text-center">
                                    {{ $dependant->personDep->id_number }}</td>
                                <td class="text-sm font-weight-normal pt-3 text-center">
                                    {{ substr($dependant->personDep->birth_date, 0, 10) }}
                                </td>
                                <td class="text-sm font-weight-normal pt-3 text-center">
                                    {{ $dependant->personDep->gender_id }}</td>
                                <td class="text-sm font-weight-normal pt-3 text-center"><a
                                        href="/view-member/{{ $dependant->personMain->membership->first()->id }}">{{ $dependant->personMain->screen_name }}</a>
                                </td>
                                @php
                                    $age = ageFromDOB($dependant->personDep->birth_date);
                                @endphp
                                <td class="text-center mx-auto">
                                    <a
                                        class="btn-sm {{ $age < 15 ? 'btn-success' : ($age <= 20 ? 'btn-warning' : 'btn-danger') }} fw-bold">{{ $age }}</a>
                                </td>
                                {{-- <td class="text-center w-5 font-weight-normal">
                                <a class="btn btn-link text-black text-gradient mx-3 mb-0"
                                    href="/view-member/{{ $dependant->personMain->membership->first()->id }}#pills-dependants"><i
                                        class="bi bi-eye-fill"></i>View</a>
                                <a class="btn btn-link text-black text-gradient mx-3 mb-0"
                                    href="/edit-member/{{ $dependant->personMain->membership->first()->id }}"><i
                                        class="bi bi-pencil-fill"></i>Edit</a>
                            </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>







@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <script>
        var myJQuery = jQuery.noConflict(true);
        myJQuery(document).ready(function($) {
            var url = '/dependantsData'; 

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $.each(data, function(index, item) {
                        var genderText = item.gender_id == 1 ? "Male" : (item.gender_id == 2 ?
                            "Female" : "Other");
                        var statusBadge =
                            '<span class="badge badge-light-primary fs-7 fw-bold">' + item
                            .status_name + '</span>';
                        var row = $('<tr style="display: none;">').append(
                            $('<td>').text(item.first_name),
                            $('<td>').text(item.last_name),
                            $('<td>').text(item.id_number),
                            $('<td>').text(new Date(item.birth_date).toLocaleDateString()),
                            $('<td>').text(genderText),
                            $('<td>').text(item
                                .main_member_screen_name
                            ), 
                            $('<td>').text(item.age),

                        );
                        $('#datatable-dependant tbody').append(row);
                    });

                    $('#datatable-dependant').DataTable({
                        dom: 'Bfrtip',
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                        "pagingType": "full_numbers"
                    });
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

                    $('#datatable-dependant').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "pagingType": "full_numbers"
        });
        });

        window.deleteConfirm = function(membershipId) {
            Swal.fire({
                icon: "warning",
                text: "Do you want to cancel this membership?",
                showCancelButton: true,
                confirmButtonText: "Delete",
                confirmButtonColor: "#e3342f",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Select Reason for Cancellation",
                        input: "select",
                        inputOptions: {
                            reason1: "Reason 1",
                            reason2: "Reason 2",
                            reason3: "Reason 3",
                            reason4: "Reason 4",
                        },
                        inputPlaceholder: "Select a reason",
                        showCancelButton: true,
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value === "") {
                                    resolve("You need to select a reason for cancellation");
                                } else {
                                    window.location.href = membershipId;
                                }
                            });
                        },
                    });
                }
            });
        };


    </script>
@endpush
