@extends('layouts.app2')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css">

    <style>
        .json-key {
            color: #a52a2a;
            /* Brown */
        }

        .json-value {
            color: #008000;
            /* Green */
        }

        .json-string {
            color: #d14;
            /* Red */
        }

        .special-link {
            display: inline-block;
            background-color: #007bff;
            /* Bootstrap primary color */
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .special-link:hover,
        .special-link:focus {
            background-color: #white;
            /* Darker blue */
            color: white;
            text-decoration: none;
        }
    </style>

    <style>
        input::placeholder,
        textarea::placeholder {
            color: #fefefe;
            /* Change the color as needed */
        }
    </style>

    <style>
        /* Custom CSS classes for SweetAlert */
        .swal2-title {
            color: black !important;
            /* Change title text color */
        }

        .swal2-content {
            color: black !important;
            /* Change content text color */
        }
    </style>

    <style>
        input:required,
        select:required {
            border: 2px solid #ced4da;
            /* Bootstrap's default border color for form inputs */
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            /* Smooth transition for visual feedback */
        }

        input:invalid,
        select:invalid {
            border-color: #e57373 !important;
            /* A complementing red for missing required inputs */
            box-shadow: 0 0 0 .2rem rgba(229, 115, 115, .25);
            /* Optional: add a subtle shadow to further highlight the field */
        }
    </style>

    <style>
        .form-control {
            background-color: white !important;
        }

        .select2-container--bootstrap5 .select2-dropdown {
            background-color: white !important;
        }

        .select2-container--bootstrap5 .select2-dropdown .select2-search .select2-search__field {
            background-color: #E7EEEA !important;
        }

        .pac-container {
            z-index: 9999 !important;
            /* This is for my Google Maps in modal Bootstrap modals usually have a z-index of 1050 */
        }
    </style>

    <style>
        .menu-sub-dropdown {
            background-color: #ffffff !important;
        }

        .page-link.active,
        .active>.page-link {
            background-color: #131628 !important;
        }
    </style>
@endpush

@section('row_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

                @if ($errors->has('custom_error'))
                    @foreach ($errors->get('custom_error') as $customErrors)
                        @foreach ($customErrors as $customError)
                            <li>{{ $customError }}</li>
                        @endforeach
                    @endforeach
                @endif
            </ul>
        </div>
    @endif

    <div class="card shadow mb-10">
        <div class="card-header">
            <h3 class="card-title text-dark fs-1 mx-auto">Memberships</h3>
        </div>

        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!-- Custom Length Control with Dropdown Arrow -->
                    <div class="position-relative">
                        <select class="form-control form-control-solid w-70px me-2 bg-secondary" id="customLength">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <!-- Custom Dropdown Arrow with Span Elements -->
                        <div class="ki-duotone ki-arrow-down position-absolute end-0 me-6"
                            style="top: 50%; transform: translateY(-50%); pointer-events: none;">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </div>
                    </div>

                    <!-- Search Input with Magnifier Icon -->
                    <div class="position-relative d-flex align-items-center my-1 mb-2 mb-md-0">
                        <div class="ki-duotone ki-magnifier position-absolute ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </div>
                        <input type="text" data-kt-docs-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15 bg-secondary" placeholder="Search for Membership" />
                    </div>
                </div>

                <!--end::Search-->

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light me-3 bg-secondary" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>
                        Filter
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-gray-900 fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->

                        <!--begin::Content-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-semibold mb-3">Membership Status:</label>
                                <!--end::Label-->

                                <!--begin::Options-->
                                <div class="d-flex flex-column flex-wrap fw-semibold"
                                    data-kt-docs-table-filter="funeral_status">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="funeral_status" value="all"
                                            checked="checked" />
                                        <span class="form-check-label text-gray-600">
                                            All
                                        </span>
                                    </label>
                                    <!--end::Option-->

                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="funeral_status"
                                            value="Pending" />
                                        <span class="form-check-label text-gray-600">
                                            Pending
                                        </span>
                                    </label>
                                    <!--end::Option-->

                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="funeral_status"
                                            value="Completed" />
                                        <span class="form-check-label text-gray-600">
                                            Completed
                                        </span>
                                    </label>
                                    <!--end::Option-->

                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-dark me-2"
                                    data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset">Reset</button>

                                <button type="submit" class="btn btn-dark " data-kt-menu-dismiss="true"
                                    data-kt-docs-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1--> <!--end::Filter-->

                    <!--begin::Add customer-->
                    <a type="button" class="btn btn-light bg-secondary" data-bs-toggle="tooltip" title="New Membership"
                        href="/add-member">
                        <i class="ki-duotone ki-plus fs-2"></i> Add New Membership
                    </a>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->

            </div>
            <!--end::Wrapper-->

            <table id="memberships-table" class="table border rounded table-row-dashed fs-6 g-5 gs-5">
                <thead>
                    <tr class="text-start text-dark fw-bold fs-7 text-uppercase bg-gray-300">
                        <th class="text-center">Manage</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Surname</th>
                        <th class="text-center">ID Number</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Telephone</th>
                        <th class="text-center">Join Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">End Date</th>

                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach ($memberships as $membership)
                        <tr>
                            <td class="text-m font-weight-normal pt-3 text-center">

                                {{-- <span class="badge bg-warning fs-6 fw-bold m-1 p-2 text-dark" data-bs-toggle="modal"
                                    data-bs-target="#editMembershipModal" data-bs-id="{{ $membership->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </span> --}}

                                {{-- <span class="badge bg-success fs-7 fw-bold m-1 p-2">
                                        <a class="text-dark" href="/view-member/{{ $membership->id }}"
                                            style="text-decoration: none;"><i class="bi bi-eye-fill"></i> View</a>
                                    </span> --}}

                                {{-- <span class="badge bg-primary fs-7 fw-bold m-1 p-2">
                                        <a class="text-dark" data-membership-id="{{ $membership->id }}"
                                            style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2"><i class="bi bi-eye-fill"></i> View 2</a>
                                    </span> --}}
                                {{-- <span class="badge bg-primary fs-7 fw-bold m-1 p-2">
                                        <a class="text-dark" data-membership-id="{{ $membership->id }}" href="#"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_scrollable_2"
                                        style="text-decoration: none;"><i class="bi bi-eye-fill"></i> View 2</a>
                                    </span> --}}
                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="modal" title="View"
                                    data-bs-target="#exampleModal2" data-bs-id="{{ $membership->id }}"><i
                                        class="bi bi-eye-fill fs-4 me-0"></i> </a>
                                <a class="btn btn-sm btn-icon btn-warning" href="/edit-member/{{ $membership->id }}"
                                    style="text-decoration: none;" data-bs-toggle="tooltip" title="Edit"><i
                                        class="bi bi-pencil-fill fs-4 me-0"></i>
                                </a>
                                <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove"
                                    href="#" onclick="deleteConfirm('/cancel-member/{{ $membership->id }}')"
                                    style="text-decoration: none;"><i class="bi bi-trash3 fs-4 me-0"></i>
                                </a>

                                {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-id="@mdo">Modal View</button> --}}


                            </td>
                            <td class="text-m font-weight-normal pt-3 text-dark fw-bold text-hover-primary text-center">
                                {{ $name = $membership->name ?? 'N/A' }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $surname = $membership->surname ?? 'N/A' }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $id_number = $membership->id_number ?? 'N/A' }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                @if ($membership->gender_id == 'M' || $membership->gender_id == '1')
                                    Male
                                @elseif($membership->gender_id == 'F' || $membership->gender_id == '2')
                                    Female
                                @else
                                    Other
                                @endif
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $telephone = $membership->primary_contact_number ?? 'N/A' }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $joinDateFormatted = $membership->join_date ? Carbon\Carbon::parse($membership->join_date)->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                <span
                                    class="badge badge-light-primary fs-7 fw-bold">{{ $statuses[$membership->bu_membership_status_id] }}</span>
                                {{-- <span class="badge badge-light-primary fs-7 fw-bold">{{ $membership->status }}</span> --}}
                            </td>
                            <td class="text-m font-weight-normal pt-3 text-center">
                                {{ $endDateFormatted = $membership->end_date ? Carbon\Carbon::parse($membership->end_date)->format('d/m/Y') : 'N/A' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-start text-dark fw-bold fs-7 text-uppercase bg-gray-300">
                        <th class="text-center">Manage</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Surname</th>
                        <th class="text-center">ID Number</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Telephone</th>
                        <th class="text-center">Join Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">End Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Modal at mdo--> <!-- Modal at getbootstrap-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Membership Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Dynamic content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="editMembershipModal" tabindex="-1" aria-labelledby="editMembershipLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editMembershipLabel">Edit Membership Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal at mdo script-->
@endsection

@push('scripts')
    <script>
        const exampleModal = document.getElementById('exampleModal')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const recipient = button.getAttribute('data-bs-id')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = exampleModal.querySelector('.modal-title')
                const modalBodyInput = exampleModal.querySelector('.modal-body input')

                modalTitle.textContent = `New message to ${recipient}`
                modalBodyInput.value = recipient
            })
        }
    </script>

    <script>
        $(document).ready(function() {
            const exampleModal2 = document.getElementById('exampleModal2');
            if (exampleModal2) {
                exampleModal2.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    const button = event.relatedTarget;
                    // Extract membership ID from data-bs-id attribute
                    const membershipId = button.getAttribute('data-bs-id');

                    // Perform an AJAX request to your Laravel backend
                    $.get(`/edit-member/${membershipId}`, function(data) {
                        // Assuming 'data' is the HTML content to display in the modal
                        $(exampleModal2).find('.modal-body').html(data);
                    });
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            const editMembershipModal = document.getElementById('editMembershipModal');
            if (editMembershipModal) {
                editMembershipModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; // Button that triggered the modal
                    const membershipId = button.getAttribute('data-bs-id'); // Extract ID

                    // Perform an AJAX request to get the edit form
                    $.get(`/edit-member/${membershipId}`, function(data) {
                        // Load the form into the modal body+
                        $(editMembershipModal).find('.modal-body').html(data);
                    });
                });

                // Handle the save button
                $(editMembershipModal).find('.btn-primary').click(function() {
                    // Serialize the form data
                    const formData = $(editMembershipModal).find('form').serialize();

                    // Send a POST request to update the membership
                    $.post(`/update-member/${membershipId}`, formData, function(response) {
                        // Handle the response
                        alert('Membership updated successfully!');
                        // You might want to close the modal and refresh the page or part of it
                        $(editMembershipModal).modal('hide');
                    }).fail(function() {
                        alert('Error updating membership.');
                    });
                });
            }
        });
    </script>

    {{-- These are for bootstrap 5 datatables --}}

        <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Include DataTables -->
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
    <!-- Include Bootstrap Bundle JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Include DataTables Bootstrap 5 integration -->
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.bootstrap5.js"></script>
    <script>
        "use strict";

        var KTFuneralsDatatables = function() {
            var dt;

            var initDatatable = function() {
                dt = $("#memberships-table").DataTable({
                    searchDelay: 500,
                    order: [],
                    dom: "<'row'<'col-sm-12'tr>>" + // Only the table and rows
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // Info and pagination
                    columnDefs: [{
                        targets: 6,
                        orderable: false
                    }]
                });
            };

            var handleSearch = function() {
                var searchInput = document.querySelector('[data-kt-docs-table-filter="search"]');
                searchInput.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            };

            var handleLengthChange = function() {
                var lengthSelect = document.getElementById('customLength');
                lengthSelect.addEventListener('change', function(e) {
                    dt.page.len(e.target.value).draw();
                });
            };

            var handleFilter = function() {
                var filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');
                var resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');
                var statusRadios = document.querySelectorAll('[name="funeral_status"]');

                filterButton.addEventListener('click', function() {
                    var filterValue = "";
                    statusRadios.forEach(function(radio) {
                        if (radio.checked) {
                            filterValue = radio.value;
                        }
                    });
                    if (filterValue === "all") {
                        filterValue = ""; // Reset the filter if 'All' is selected
                    }
                    // Debug log to check what is being set as filter value
                    console.log("Filtering by:", filterValue);

                    dt.columns(3).search(filterValue).draw(); // Assumes 'Status' is in the 4th column
                });

                resetButton.addEventListener('click', function() {
                    statusRadios.forEach(function(radio) {
                        radio.checked = radio.value === "all";
                    });
                    dt.search('').columns().search('').draw();
                });
            };

            return {
                init: function() {
                    initDatatable();
                    handleSearch();
                    handleLengthChange();
                    handleFilter();
                }
            };
        }();

        $(document).ready(function() {
            KTFuneralsDatatables.init();
        });
    </script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        function toggleDetails(selector) {
            $(selector).slideToggle('slow');
        }
    </script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('kt_modal_stacked_2');

            modal.addEventListener('shown.bs.modal', function() {
                // Get the membership ID from the button that opened the modal
                var opener = document.querySelector('[data-bs-stacked-modal="#kt_modal_stacked_2"]');
                var membershipId = opener.getAttribute('data-membership-id');
                console.log(membershipId);

                var fetchUrl = `/dependantsData?id=${membershipId}`; // Use the ID in the fetch URL

                fetch(fetchUrl) // Use the dynamic URL with the membership ID
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const tbody = document.getElementById('dependantsBody');
                        tbody.innerHTML = ''; // Clear existing rows
                        if (data.length === 0) {
                            document.getElementById('noDataAlert').classList.remove('d-none');
                        } else {
                            data.forEach(dep => {
                                const row = `<tr>
                            <td>${dep.name}</td>
                            <td>${dep.id}</td>
                            <td>${dep.gender}</td>
                            <td>${dep.relationship}</td>
                            <td>${dep.dob}</td>
                            <td>${dep.age}</td>
                            <td><button class="btn bg-gba">Edit</button></td>
                        </tr>`;
                                tbody.innerHTML += row;
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error loading the dependants data:', error);
                        document.getElementById('noDataAlert').classList.remove('d-none');
                    });
            });
        });
    </script>
@endpush
