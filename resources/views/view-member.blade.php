@extends('layouts.app2')

@push('styles')
    <!-- CSS Files -->
    {{-- <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('row_content')
    <div class="modal bg-body fade" tabindex="-1" id="kt_modal_2" style="margin-right: 12px !important;">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Membership Code: {{ $membership->membership_code }}</h5>
                    <button type="button" class="btn-closes" data-bs-dismiss="modal" onclick="window.history.back();"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row text-center">
                        <div class="col-4">
                            <button type="button" class="btn bg-gba" data-bs-stacked-modal="#kt_modal_stacked_2">
                                View Dependants
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn bg-gba" data-bs-stacked-modal="#kt_modal_stacked_3">
                                View Addresses
                            </button>
                        </div>
                        <div class="col-4">

                            <button type="button" class="btn bg-gba" data-bs-stacked-modal="#kt_modal_stacked_4">
                                View Billing History
                            </button>
                        </div>
                    </div>

                    <!-- Membership Details View-Only Section -->
                    <div id="membership" class="container bg-gba-light m-6 text-center mx-auto border-gba">
                        <div class="card">
                                <div class="card-title bg-gba my-0">
                                    <h2 class="text-center">Membership Details</h2>
                                </div>

                            <div class="card-body fs-6 bg-gba-light">
                                <!-- Preferred Language Section -->
                                <div class="mb-7">
                                    <div class="mb-4">
                                        <div class="symbol symbol-60px symbol-circle me-3">
                                            <!-- Placeholder for image or icon -->
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fs-4 fw-bold text-gray-900 me-2">Preferred
                                                Language</span>
                                            <span
                                                class="fw-semibold text-white">{{ $membership->language == '1' ? 'English' : 'Afrikaans' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mb-7"></div>

                                <!-- Personal Details Section -->
                                <div class="mb-7">
                                    <h5 class="mb-4">Personal Details</h5>
                                    <div class="mb-0">
                                        <span class="fw-semibold text-white">Name: {{ $membership->name }}</span><br>
                                        <span class="fw-semibold text-white">Surname:
                                            {{ $membership->surname }}</span><br>
                                        <span class="fw-semibold text-white">Gender:
                                            {{ $membership->gender_id }}</span><br>
                                        <span class="fw-semibold text-white">Identity Number:
                                            {{ $membership->id_number }}</span><br>
                                        <span class="fw-semibold text-white">Telephone (Cell):
                                            {{ $membership->primary_contact_number }}</span><br>
                                        <span class="fw-semibold text-white">Email Address:
                                            {{ $membership->primary_e_mail_address }}</span><br>
                                        <span class="fw-semibold text-white">Date of Birth:
                                            {{ $membership->dob }}</span><br>
                                        <!-- Additional details as needed -->
                                    </div>
                                </div>

                                <div class="separator separator-dashed mb-7"></div>

                                <!-- Membership Type Section -->
                                <div class="mb-10">
                                    <h5 class="mb-4">Membership Type</h5>
                                    <span class="fw-semibold text-white">Type: A1</span>
                                    <!-- Replace A1 with actual data -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Membership Details View-Only Section -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Close</button>

                </div>
            </div>
        </div>
    </div>

    {{-- End Stacked Modal --}}
    <!-- Stacked Modal Start -->

    <div class="modal fade" tabindex="-1" id="kt_modal_stacked_2">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Dependants</h3>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="path1"></span><span class="path2"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="dependants">
                        <h2>Dependants Content</h2>
                        <p class="text-dark fw-semibold fs-6">See all your dependant details.</p>


                        <!-- Check if the dependants list is empty -->
                        <!-- Example check, replace with your actual data checking logic -->
                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10"
                            style="display: none;" id="noDataAlert">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-search-list fs-2hx text-light me-4 mb-5 mb-sm-0"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                                <!--begin::Title-->
                                <h4 class="mb-2 light">No Dependants Found</h4>
                                <!--end::Title-->

                                <!--begin::Content-->
                                <span>Your list of dependants is currently empty.</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Close-->
                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </button>
                            <!--end::Close-->
                        </div>
                        <!--end::Alert-->


                        <!-- Dependants List -->
                        <div class="card mt-4 bg-secondary">
                            <div class="card-header card-header-stretch border-bottom border-gray-200">
                                <div class="card-title">
                                    <h3 class="fw-bold m-0">Dependants List</h3>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-row-bordered align-middle gy-4 gs-9">
                                        <thead
                                            class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                            <tr>
                                                <th>Name</th>
                                                <th>ID</th>
                                                <th>Gender</th>
                                                <th>Relationship</th>
                                                <th>DOB</th>
                                                <th>Age</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <!-- Dynamically populated rows here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stacked Modal End -->

    {{-- End Stacked Modal --}}

    <!-- Start Stacked Modal for Address Management -->
    
    <div class="modal fade" tabindex="-1" id="kt_modal_stacked_3">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title mx-auto">Addresses</h3>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="path1"></span><span class="path2"></span>
                    </button>
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-search-list fs-2hx text-light me-4 mb-5 mb-sm-0"><span
                            class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                    <!--end::Icon-->
                </div>
                <div class="modal-body">
                    <div id="addresses">
                        <p class="text-dark fw-semibold fs-6 mx-auto">See all your address details.</p>

                        <!-- Alert for No Addresses Found (hidden by default) -->
                        <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10"
                            style="display: none;" id="noAddressesAlert">
                            <i class="ki-duotone ki-search-list fs-2hx text-light me-4 mb-5 mb-sm-0"></i>
                            <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                                <h4 class="mb-2 light">No Addresses Found</h4>
                                <span>Your list of addresses is currently empty.</span>
                            </div>
                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1 text-light"></i>
                            </button>
                        </div>

                        <!-- Addresses List -->
                        <div class="card mt-4 bg-secondary">
                            <div class="card-header card-header-stretch border-bottom border-gray-200">
                                <div class="card-title">
                                    <h3 class="fw-bold m-0">Existing Addresses</h3>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-row-bordered align-middle gy-4 gs-9">
                                        <thead
                                            class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                            <tr>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Postal Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                            <!-- Dynamically populated rows for addresses -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Stacked Modal -->


    {{-- Start Stacked Modal --}}

    <div class="modal fade" tabindex="-1" id="kt_modal_stacked_4">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Payment Details</h3>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="path1"></span><span class="path2"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="payments">
                        <h2>Payments Content</h2>
                        <p class="text-dark fw-semibold fs-6">See all your payment details.</p>

                        <!-- Billing History -->
                        <div class="card mt-4 bg-secondary">
                            <div class="card-header card-header-stretch border-bottom border-gray-200">
                                <div class="card-title">
                                    <h3 class="fw-bold m-0">Billing History</h3>
                                </div>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <!-- Tab panel -->
                                <div class="card-body p-0 tab-pane fade show active" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-row-bordered align-middle gy-4 gs-9">
                                            <thead
                                                class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Invoice</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                <tr>
                                                    <td>Jun 17, 2020</td>
                                                    <td>Paypal</td>
                                                    <td>R523.09</td>
                                                    <td>PDF</td>
                                                </tr>
                                                <tr>
                                                    <td>Jun 01, 2020</td>
                                                    <td>Cash</td>
                                                    <td>R123.79</td>
                                                    <td>PDF</td>
                                                </tr>
                                                <!-- Additional rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Additional tabs for Year and All Time as needed, similar to the above format -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Stacked Modal --}}

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('#datatable-dependant tbody tr');

            searchInput.addEventListener('keyup', function() {
                const searchQuery = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const isVisible = rowText.includes(searchQuery);
                    row.style.display = isVisible ? '' : 'none';
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rowsPerPage = 5;
            const rows = document.querySelectorAll('#datatable-dependant tbody tr');
            const rowsCount = rows.length;
            const pageCount = Math.ceil(rowsCount / rowsPerPage);
            const pagination = document.getElementById('pagination');

            function setPage(page) {
                rows.forEach((row, index) => {
                    row.style.display = (index >= page * rowsPerPage && index < (page + 1) * rowsPerPage) ?
                        '' : 'none';
                });
            }

            for (let i = 0; i < pageCount; i++) {
                const btn = document.createElement('button');
                btn.innerText = i + 1;
                btn.addEventListener('click', () => setPage(i));
                pagination.appendChild(btn);
            }

            setPage(0); // Set initial page
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('kt_modal_2'), {
                keyboard: false,
                backdrop: 'static' // Prevent closing by clicking outside or pressing escape
            });
            myModal.show();

            document.getElementById('kt_modal_2').addEventListener('hidden.bs.modal', function(event) {
                // Redirect user or perform another action after the modal is closed
                // For example, to redirect to another page:
                // window.location.href = 'https://www.example.com';

                // Or simply make sure the user cannot interact with the page content
                document.body.classList.add(
                    "modal-open"); // Re-add class to body to maintain modal-open state
            });
        });
    </script>

    <!-- Bootstrap CSS CDN -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- Start Modal Script --}}
    <script>
        var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

        if (elements && elements.length > 0) {
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
    {{-- End Modal Script --}}

    {{-- No Data List Found  Alert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Example: Check if there are any dependants listed in your table's tbody
            var dependantsList = document.querySelector('#dependants .table-responsive tbody');

            // Assuming your data loading logic updates the dependantsList innerHTML or children count
            if (dependantsList.children.length === 0) {
                // If there are no dependants, show the alert
                document.getElementById('noDataAlert').style.display = 'flex';
            } else {
                // If there are dependants, ensure the alert is not shown
                document.getElementById('noDataAlert').style.display = 'none';
            }
        });
    </script>

    {{-- No Data List Found  Alert --}}
@endpush
