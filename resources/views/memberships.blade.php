@extends('layouts.app2')

@push('styles')
    <!-- DataTables CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Buttons extension for DataTables -->
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <style>
    .dt-buttons{
        padding-top: 15px;
    }
    .dt-buttons .buttons-copy, .dt-buttons .buttons-csv, .dt-buttons .buttons-excel, .dt-buttons .buttons-pdf, .dt-buttons .buttons-print{
        background-color: forestgreen;
    }
    .membership-page .dataTables_filter label{
        color: black;
        padding-top: 2px;
    }
    .dataTables_filter .form-control{
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
    </style>
@endpush

@section('row_content')
    <div class="card border-gba bg-gba-light">
        <!--begin::Header-->
        {{-- <div class="card-header border-0 pt-5">
            <h1 class="card-label fw-bold mb-1 my-2" style="margin-left: auto; margin-right: auto; width: fit-content;"> <span
                    class="card-label fw-bold">Memberships</span><br>
            </h1>
        </div>

        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
                
                <thead class="thead-light">
                    <tr class="fw-bold text-dark bg-gba p-3">
                        <th class="text-start">Name</th>
                        <th>Surname</th>
                        <th>ID Number</th>
                        <th>Gender</th>
                        <th>Telephone</th>
                        <th>Join Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th class="text-center">Manage</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($memberships as $membership)
                        <tr class="bg-gba border">
                            <td class="text-m font-weight-normal pt-3 text-dark fw-bold text-hover-primary text-center"
                                style="padding-left: 12px">
                                {{ $membership->name }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center" style="padding-left: 12px">
                                {{ $membership->surname }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $membership->id_number }}
                            </td>

                            <td class="text-m font-weight-normal pt-3 text-center" style="padding-left: 24px">
                                @if ($membership->gender_id == 1)
                                    Male
                                @elseif($membership->gender_id == 2)
                                    Female
                                @else
                                    Other
                                @endif
                            </td>

                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $membership->primary_contact_number }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ Carbon\Carbon::parse($membership->join_date)->format('d/m/Y') }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ Carbon\Carbon::parse($membership->end_date)->format('d/m/Y') }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center" style="padding-left: 24px">
                                <span class="badge badge-light-primary fs-7 fw-bold">
                                    {{ \App\Models\BuMembershipStatus::find($membership->bu_membership_status_id)->name }}
                                </span>
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                <span class="badge bg-gba fs-7 fw-bold m-1 p-2">
                                    <a class="text-success" href="/view-member/{{ $membership->id }}"
                                        style="text-decoration: none;"><i class="bi bi-eye-fill"></i> View</a>
                                </span>
                                <span class="badge bg-gba fs-7 fw-bold m-1 p-2">
                                    <a class="text-warning" href="/edit-member/{{ $membership->id }}"
                                        style="text-decoration: none;"><i class="bi bi-pencil-fill"></i> Edit</a>
                                </span>
                                <span class="badge bg-gba fs-7 fw-bold m-1 p-2">
                                    <a class="text-danger" href="#"
                                        onclick="deleteConfirm('/cancel-member/{{ $membership->id }}')"
                                        style="text-decoration: none;">
                                        <i class="bi bi-trash3-fill"></i> Delete</a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
            <div class="panel mt-4 bg-gba-light ">
                <div class="panel-heading">
                    <h2 class="bg-gba p-3 rounded text-center">Comprehensive Memberships Data Table</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered bordered table-striped table-condensed bg-gba-light"
                        id="comprehensive-memberships-table">
                        <thead class="thead-light">
                            <tr class="fw-bold text-dark bg-gba p-3">
                                <th class="text-center">ID</th>
                                <th class="text-center">Membership Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Initials</th>
                                <th class="text-center">Surname</th>
                                <th class="text-center">ID Number</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Telephone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Join Date</th>
                                <th class="text-center">End Date</th>
                                <th class="text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamically generated rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
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

    {{-- Start Modal Script --}}
    <script>
        var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

        if (elements.length > 0) {
            elements.forEach((element) => {
                if (element.getAttribute("data-kt-initialized") === "1") {
                    return;
                }

                element.setAttribute("data-kt-initialized", "1");

                element.addEventListener("click", function(e) {
                    e.preventDefault();

                    const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));
                    if (modalEl) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                });
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <!-- Buttons extension for DataTables -->
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <script>
        var myJQuery = jQuery.noConflict(true);
        myJQuery(document).ready(function($) {
            var url = 'http://192.168.1.7/membershipsData';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, item) {
                        var genderText = item.gender_id == 'M' ? '<i class="bi bi-gender-male"></i>Male' : (item.gender_id == 'F' ? '<i class="bi bi-gender-female"></i>female' : "Other");
                        // Directly using `item.status_name` assuming it's included in the response
                        var row = $('<tr>').append(
                            $('<td class="text-center">').text(item.id),
                            $('<td class="text-center">').text(item.membership_code),
                            $('<td class="text-center">').text(item.name),
                            $('<td class="text-center">').text(item.initials),
                            $('<td class="text-center">').text(item.surname),
                            $('<td class="text-center">').text(item.id_number),
                            $('<td class="text-center">').html(genderText),
                            $('<td class="text-center">').text(item.primary_contact_number),
                            $('<td class="text-center">').text(item.primary_e_mail_address ? item
                                .primary_e_mail_address : 'N/A'),
                            $('<td class="text-center">').text(item.join_date ? new Date(item.join_date)
                                .toLocaleDateString() : 'N/A'),
                            $('<td class="text-center">').text(item.end_date ? new Date(item.end_date)
                                .toLocaleDateString() : 'N/A'),
                            $('<td class="text-center">').html('<a href="/view-member/' + item.id +
                                '" class="btn-sm btn-success rounded">View</a> | <a href="/edit-member/' + item.id +
                                '" class="btn-sm btn-warning rounded">Edit</a> | <a href="#" onclick="deleteConfirm(\'/cancel-member/' +
                                item.id + '\')" class="btn-sm btn-danger rounded">Delete</a>')
                        );
                        $('#comprehensive-memberships-table tbody').append(row);
                    });

                    $('#comprehensive-memberships-table').DataTable({
                        dom: 'Bfrtip', // This parameter ensures the Buttons are displayed
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        "pagingType": "full_numbers"
                    });
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

        });
    </script>
@endpush
