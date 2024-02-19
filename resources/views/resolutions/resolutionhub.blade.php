@extends('layouts.app2')

@push('styles')
    <style>
        .drawline {
            border: green dashed 1px;
            border-radius: 8px;
        }
    </style>
@endpush

@section('row_content')
    <div class="container rounded bg-info-subtle mb-16" style="border: gray solid 1px;">
        <h1 class="my-9" style="margin-left: auto; margin-right: auto; width: fit-content;">Resolution Hub</h1>

        <div class="card hover-elevate-up parent-hover shadow-sm mt-6 mb-4">
            <div class="card-header">
                <h3 class="card-title">Grouped Records</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="http://192.168.1.5/resolutionhub/handle-main-record-action">
                    <input type="hidden" name="_token" value="m1IFV5LtK4VarPORgTBEkxlZch6UPzZz6z2I9cuC"
                        autocomplete="off">
                    <div class="row">
                        <!-- Membership ID and Membership Type -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="membership_id">Membership ID</label>
                                <input type="text" class="form-control" id="membership_id" name="membership_id"
                                    value="000001D" readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="membership_type">Membership</label>
                                <input type="text" class="form-control" id="membership_type" name="membership_type"
                                    value="41" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="screen_name">Screen Name</label>
                                <input type="text" class="form-control" id="screen_name" name="screen_name"
                                    value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id_number">ID Number</label>
                                <input type="text" class="form-control" id="id_number" name="id_number"
                                    value="5705055045081" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- First Name, Initials, and Last Name -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="PRETORIUS"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="initials">Initials</label>
                                <input type="text" class="form-control" id="initials" name="initials value="DJ"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="gender_id">Gender_id</label>
                                <input type="text" class="form-control" id="gender_id" name="gender_id" value="1"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="married_status">Marriage</label>
                                <input type="text" class="form-control" id="married_status" name="married_status"
                                    value="1" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- married_status, gender_id, and join_date -->

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="join_date">Join Date</label>
                                <input type="text" class="form-control" id="join_date" name="join_date"
                                    value="1980-01-01 00:00:00" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="primary_contact_number">primary_contact_number</label>
                                <input type="text" class="form-control" id="primary_contact_number"
                                    name="primary_contact_number" value="0832876160" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- primary_contact_number, secondary_contact_number, and tertiary_contact_number -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="secondary_contact_number">secondary_contact_number</label>
                                <input type="text" class="form-control" id="secondary_contact_number"
                                    name="secondary_contact_number" value="0637716805" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tertiary_contact_number">tertiary_contact_number</label>
                                <input type="text" class="form-control" id="tertiary_contact_number"
                                    name="tertiary_contact_number" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="last_payment_date">last_payment_date</label>
                                <input type="text" class="form-control" id="last_payment_date"
                                    name="last_payment_date" value="2009-03-05 00:00:00" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="paid_till_date">paid_till_date</label>
                                <input type="text" class="form-control" id="paid_till_date" name="paid_till_date"
                                    value="9999-01-01 00:00:00" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-around mt-4">
                    <!-- Button for Submit Action 1 -->
                    <button type="submit" name="action" value="submitActionOne" class="btn btn-primary">Submit
                        Action
                        1</button>

                    <!-- Button for Submit Action 2 -->
                    <button type="submit" name="action" value="submitActionTwo" class="btn btn-dark">Submit
                        Action 2</button>

                    <!-- JavaScript actions -->
                    <button type="button" class="btn btn-info" onclick="otherActionOne()">Other
                        Action 1
                        (JS)</button>
                    <button type="button" class="btn btn-warning" onclick="otherActionTwo()">Other
                        Action 2 (JS)</button>

                </div>
            </div>
        </div>

        <div class="card hover-elevate-up parent-hover shadow-sm mt-6 mb-4">
            <div class="card-header">
                <h3 class="card-title">Duplicate Records</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li style="display: flex; justify-content: space-between; align-items: center;" class="my-4">
                        Lorem Ipsum is simply dummy text...
                        <button type="button" class="btn btn-sm btn-secondary"
                            style="margin-left: auto; background-color: #d2d7d3;">
                            Action
                        </button>
                    </li>
                    <li style="display: flex; justify-content: space-between; align-items: center;">
                        Lorem Ipsum is simply dummy text...
                        <button type="button" class="btn btn-sm btn-light" id="openModalBtn"
                            style="margin-left: auto;">
                            Action
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>

        <div class="card hover-elevate-up parent-hover shadow-sm mt-6 mb-4">
            <div class="card-header">
                <h3 class="card-title">Possible Depandant/Error Records</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li style="display: flex; justify-content: space-between; align-items: center;" class="my-4">
                        Lorem Ipsum is simply dummy text...
                        <button type="button" class="btn btn-sm btn-secondary"
                            style="margin-left: auto; background-color: #d2d7d3;">
                            Action
                        </button>
                    </li>
                    <li style="display: flex; justify-content: space-between; align-items: center;">
                        Lorem Ipsum is simply dummy text...
                        <button type="button" class="btn btn-sm btn-light" id="openModalBtn"
                            style="margin-left: auto;">
                            Action
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_3">
            Launch demo modal
        </button>

        <div class="modal fade" tabindex="-1" id="kt_modal_3">
            <div class="modal-dialog">
                <div class="modal-content position-absolute">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card card-dashed mb-4">
            <div class="card-body drawline">
                <form id="mapping-form" class="mb-4">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-5" style="text-decoration: underline;">Source</h2>
                            <div class="mb-3">
                                <label for="source-db" class="form-label">Database</label>
                                <select class="form-select" id="source-db">
                                    <option selected>Choose...</option>
                                </select>
                            </div>
                            <!-- Rest of the source fields... -->
                        </div>
                        <div class="col">
                            <h2 class="mb-5" style="text-decoration: underline;">Target</h2>
                            <div class="mb-3">
                                <label for="target-db" class="form-label">Database</label>
                                <select class="form-select" id="target-db">
                                    <option selected>Choose...</option>
                                </select>
                            </div>
                            <!-- Rest of the target fields... -->
                        </div>
                    </div>
                    <x-button type="submit" class="btn-dark" id="btnSaveMapping" text="Save Mapping">Save
                        Mapping</x-button>
                </form>

                <div class="row">
                    <div class="card" style="border: gray solid 1px;">
                        <div class="card-header">
                            <h1 class="mt-5">Target Mappings</h1>
                        </div>
                        <div class="card-body" id="target-mappings-card-body">
                            <div id="target-column-mappings"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card mt-4" style="border: gray solid 1px;">
                        <div class="card-header">
                            <h1 class="mt-5">Source Mappings</h1>
                        </div>
                        <div class="card-body" id="source-mappings-card-body">
                            <div id="source-column-mappings"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="modal fade" id="addWarehouseModal" tabindex="-1" role="dialog"
            aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addWarehouseModalLabel">Add Warehouse</h5>
                        <x-button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                            id="btnAddWarehouse" text="Add Warehouse">
                            <span aria-hidden="true">&times;</span>
                        </x-button>
                    </div>
                    <div class="modal-body">
                        <form id="addWarehouseForm">
                            <!-- Existing Fields -->
                            <div class="mb-3">
                                <label for="bu" class="form-label">Bu</label>
                                <select id="bu" name="bu_id" class="form-select select2">

                                </select>
                            </div>

                            <!-- New Fields -->
                            <div class="mb-3">
                                <label for="site" class="form-label">Site ID</label>
                                <select id="site" name="site_id" class="form-select select2">

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="short_code" class="form-label">Short Code</label>
                                <input type="text" id="short_code" name="short_code" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" id="description" name="description" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address ID</label>
                                <select id="address" name="address_id" class="form-select select2">

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="intransit_warehouse" class="form-label">Intransit Warehouse</label>
                                <select id="intransit_warehouse" name="intransit_warehouse" class="form-select select2">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <x-button type="submit" class="btn-dark" id="btnAddingWarehouse"
                                text="Adding Warehouse">Add
                                Warehouse</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Address Modal -->
        <div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog"
            aria-labelledby="addAddressModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAddressModalLabel">Add Address</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addAddressForm">
                            <input type="text" id="addressName" name="addressName" placeholder="Address Name"
                                required>
                            <button type="submit" class="btn btn-dark">Add Address</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Model Modal -->
        <div class="modal fade" id="addModelModal" tabindex="-1" role="dialog" aria-labelledby="addModelModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModelModalLabel">Add New Model</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body with Form to Add New Model -->
                        <form id="addModelForm">
                            <div class="form-group">
                                <label for="modelName">Model Name</label>
                                <input type="text" class="form-control" id="modelName"
                                    placeholder="Enter model name">
                            </div>
                            <div class="form-group">
                                <label for="modelTable">Model Table</label>
                                <input type="text" class="form-control" id="modelTable"
                                    placeholder="Enter model table">
                            </div>

                            <div class="form-group">
                                <label for="modelModule">Module</label>
                                <select id="modelModule" class="form-control">
                                    <option value="" selected disabled>Choose...</option>
                                    <!-- Populate with actual modules from your database -->

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="modelComponent">Component</label>
                                <select id="modelComponent" class="form-control">
                                    <option value="" selected disabled>Choose...</option>
                                    <!-- Populate with actual components from your database -->

                                </select>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveModel">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalBtn");

        // Get the element that closes the modal
        var span = document.getElementById("closeModalBtn");

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_button"), {
            //put your config here
        });
    </script>
@endpush
