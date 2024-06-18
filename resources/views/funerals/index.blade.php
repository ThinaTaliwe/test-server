@extends('layouts.app2')

@push('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}
    
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css" rel="stylesheet">
 --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.bootstrap5.css">
    <style>
        .inner-card {
            margin-bottom: 15px;
        }
    </style>

    <style>
        .action-buttons {
            text-align: right;
            padding-top: 10px;
            /* Space between record info and buttons */
        }
    </style>

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
            z-index: 9999 !important; /* This is for my Google Maps in modal Bootstrap modals usually have a z-index of 1050 */
        }


    </style>






<style>
    .menu-sub-dropdown {
    background-color: #ffffff !important;
}

.page-link.active, .active > .page-link {
    background-color: #131628 !important;
}
</style>



{{-- Styling for the grouping table --}}
<style>
    #kt_datatable_row_grouping th,
    #kt_datatable_row_grouping td {
        text-align: left;
    }

    #kt_datatable_row_grouping th:last-child,
    #kt_datatable_row_grouping td:last-child {
        text-align: center;
    }

    .group {
        background-color: #fafafa !important; /* Slight gray background */
        font-weight: normal !important; /* Make it not bold */
    }
</style>


@endpush

@section('row_content')



    <div class="card rounded mb-16" style="background-color: #E9F0EC"> 


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


                    <div class="card inner-card my-8 bg-white">
                        <div class="card-header " style="background-color: #448C74">
                            <h3 class="card-title text-white" >Funerals</h3>
                        </div>
                        <div class="card-body">



            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!-- Custom Length Control with Dropdown Arrow -->
                    <div class="position-relative">
                        <select class="form-control form-control-solid w-70px me-2" id="customLength">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <!-- Custom Dropdown Arrow with Span Elements -->
                        <div class="ki-duotone ki-arrow-down position-absolute end-0 me-6" style="top: 50%; transform: translateY(-50%); pointer-events: none;">
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
                        <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Funerals"/>
                    </div>
                </div>
                
                <!--end::Search-->
    
                <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
        <!--begin::Filter-->
        <button type="button" class="btn btn-light me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>        Filter
        </button>
        <!--begin::Menu 1-->
    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
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
                <label class="form-label fs-5 fw-semibold mb-3">Funeral Status:</label>
                <!--end::Label-->
    
                <!--begin::Options-->
                <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-docs-table-filter="funeral_status">
                    <!--begin::Option-->
                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                        <input class="form-check-input" type="radio" name="funeral_status" value="all" checked="checked" />
                        <span class="form-check-label text-gray-600">
                            All
                        </span>
                    </label>
                    <!--end::Option-->
    
                    <!--begin::Option-->
                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                        <input class="form-check-input" type="radio" name="funeral_status" value="Pending" />
                        <span class="form-check-label text-gray-600">
                            Pending
                        </span>
                    </label>
                    <!--end::Option-->
    
                    <!--begin::Option-->
                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                        <input class="form-check-input" type="radio" name="funeral_status" value="Completed" />
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
                <button type="reset" class="btn btn-light btn-active-light-dark me-2" data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset">Reset</button>
    
                <button type="submit" class="btn btn-dark" data-kt-menu-dismiss="true" data-kt-docs-table-filter="filter">Apply</button>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Menu 1-->    <!--end::Filter-->
    
        <!--begin::Add customer-->
        <button type="button" class="btn btn-light-success" data-bs-toggle="tooltip" title="I'll make this redirect to the create Funeral page">
            <i class="ki-duotone ki-plus fs-2"></i>        Add Funeral
        </button>
        <!--end::Add customer-->
    </div>
    <!--end::Toolbar-->
    
       </div>
            <!--end::Wrapper-->
            <table id="funerals" class="table border rounded table-row-dashed fs-6 g-5 gs-5" style="width:100%; background-color: #ffffff">
                <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                        <th>Full Name</th>
                        <th>Initials</th>
                        <th>ID Number</th>
                        <th>Status</th>
                        <th>Death Date</th>
                        <th>Membership(s)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deceased_people as $person)
                        <tr>
                            <td>{{ $person->full_name ?? 'N/A' }}</td>
                            <td>{{ $person->initials ?? 'N/A' }}</td>
                            <td>{{ $person->id_number ?? 'N/A' }}</td>
                            <td>
                                <div class="badge py-3 px-4 fs-7 {{ $person->status == 'Completed' ? 'badge-light-success' : 'badge-light-danger' }}">
                                    {{ $person->status ?? 'No Action Yet'}}
                                </div>
                            </td>
                            <td>{{ $person->deceased_date }}</td>
                            <td>{{ $person->membership_id }}</td> {{-- a person can belong to or have multiple memberships --}}
                            <td>
                                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                                </a>
                                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                                </a>
                                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                                        <i class="bi bi-trash3 fs-4 me-0"></i>
                                    </button>
                                </form>
                                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                                    <i class="bi bi-repeat fs-4 me-0"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                        <th>Full Name</th>
                        <th>Initials</th>
                        <th>ID Number</th>
                        <th>Status</th>
                        <th>Death Date</th>
                        <th>Membership(s)</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
                    
            
{{-- <table id="kt_datatable_row_grouping" class="table border rounded table-row-dashed fs-6 g-5 gs-5">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
            <th>Membership ID</th>
            <th>Main/Dep</th>
            <th>Person Details</th>
            <th>Membership Status</th>
            <th>Last Payment Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>12345</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-primary">
                    Main Member
                </div>
            </td>
            <td>use Person ID but show name and other details here</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-success">
                    Fully-Paid
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>67891</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-info">
                    Dependent
                </div>
            </td>
            <td>use Person ID but show name and other details here</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-danger">
                    In-Arrears
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>G67891</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-info">
                    Dependent
                </div>
            </td>
            <td>Jane Doe - 9802185020254 - 18-02-1998 - 06-07-2068 </td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-warning">
                    Outstanding-Balance
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>67891</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-info">
                    Dependent
                </div>
            </td>
            <td>Jane Doe - 9802185020254 - 18-02-1998 - 06-07-2068 </td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-success">
                    Fully-Paid
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
    </tbody>
</table> --}}




<!--begin::Wrapper for second table-->
<div class="d-flex flex-stack flex-wrap mb-5">
    <!--begin::Search-->
    <div class="d-flex align-items-center position-relative my-1">
        <!-- Custom Length Control with Dropdown Arrow -->
        <div class="position-relative">
            <select class="form-control form-control-solid w-70px me-2" id="customLength2">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <!-- Custom Dropdown Arrow with Span Elements -->
            <div class="ki-duotone ki-arrow-down position-absolute end-0 me-6" style="top: 50%; transform: translateY(-50%); pointer-events: none;">
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
            <input type="text" data-kt-docs-table-filter="search2" class="form-control form-control-solid w-250px ps-15" placeholder="Search Person/DOB/ID"/>
        </div>
    </div>
    <!--end::Search-->

    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base2">
        <!--begin::Filter-->
        <button type="button" class="btn btn-light me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i> Filter
        </button>
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter2">
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
                    <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-docs-table-filter="membership_status2">
                        <!--begin::Option-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                            <input class="form-check-input" type="radio" name="membership_status2" value="all" checked="checked" />
                            <span class="form-check-label text-gray-600">
                                All
                            </span>
                        </label>
                        <!--end::Option-->

                        <!--begin::Option-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                            <input class="form-check-input" type="radio" name="membership_status2" value="Fully-Paid" />
                            <span class="form-check-label text-gray-600">
                                Fully-Paid
                            </span>
                        </label>
                        <!--end::Option-->

                        <!--begin::Option-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                            <input class="form-check-input" type="radio" name="membership_status2" value="In-Arrears" />
                            <span class="form-check-label text-gray-600">
                                In-Arrears
                            </span>
                        </label>
                    </div>
                    <!--end::Options-->            
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-light btn-active-light-dark me-2" data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset2">Reset</button>

                    <button type="submit" class="btn btn-dark" data-kt-menu-dismiss="true" data-kt-docs-table-filter="filter2">Apply</button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Menu 1-->
        <!--end::Filter-->

        <!--begin::Add customer-->
        <button type="button" class="btn btn-light-success" data-bs-toggle="tooltip" title="Add Membership">
            <i class="ki-duotone ki-plus fs-2"></i> Add Membership
        </button>
        <!--end::Add customer-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Wrapper-->

<table id="kt_datatable_row_grouping2" class="table border rounded table-row-dashed fs-6 g-5 gs-5">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
            <th>Membership ID</th>
            <th>Main/Dep</th>
            <th>Person Details</th>
            <th>Membership Status</th>
            <th>Last Payment Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>12345</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-primary">
                    Main Member
                </div>
            </td>
            <td>use Person ID but show name and other details here</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-success">
                    Fully-Paid
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>67891</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-info">
                    Dependent
                </div>
            </td>
            <td>use Person ID but show name and other details here</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-danger">
                    In-Arrears
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>G67891</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-info">
                    Dependent
                </div>
            </td>
            <td>Jane Doe - 9802185020254 - 18-02-1998 - 06-07-2068 </td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-warning">
                    Outstanding-Balance
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>67891</td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-info">
                    Dependent
                </div>
            </td>
            <td>Jane Doe - 9802185020254 - 18-02-1998 - 06-07-2068 </td>
            <td>
                <div class="badge py-3 px-4 fs-7 badge-light-success">
                    Fully-Paid
                </div>
            </td>
            <td>2011/04/25</td>
            <td>
                <a href="{{ url('funerals/create', $person->id) }}" class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" title="Begin Funeral Arrangement">
                    <i class="bi bi-plus-lg fs-4 me-0"></i>
                </a>
                <a href="{{ route('funerals.edit', $person->id) }}" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" title="Edit">
                    <i class="bi bi-pencil-fill fs-4 me-0"></i>
                </a>
                <form action="{{ route('funerals.destroy', $person->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-trash3 fs-4 me-0"></i>
                    </button>
                </form>
                <a href="{{ route('funerals.index', $person->id) }}" class="btn btn-sm btn-icon btn-dark" data-bs-toggle="tooltip" title="Reburial">
                    <i class="bi bi-repeat fs-4 me-0"></i>
                </a>
            </td>
        </tr>
    </tbody>
</table>



                        </div>








 
                    </div>

</div>
@endsection

@push('scripts')


 {{-- These are for bootstrap 5 datatables --}}

     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
          <!-- Include DataTables -->
          <script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
     <!-- Include Bootstrap Bundle JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

     <!-- Include DataTables Bootstrap 5 integration -->
     <script src="https://cdn.datatables.net/2.0.4/js/dataTables.bootstrap5.js"></script>
 

     {{-- <script>
        $(document).ready(function() {
            // Initialize the DataTable with custom configuration
            var table = $("#funerals").DataTable({
                "language": {
                    "lengthMenu": "Show _MENU_ entries",
                },
                "dom":
                    "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });
        
            // Event listener for the status filter
            $('#statusFilter').on('change', function() {
                // Apply search on the status column (assuming status is the 5th column, index 4)
                table.column(4).search(this.value).draw();
            });
        });
        </script> --}}
        
  

{{-- <script>
    "use strict";

// Class definition
var KTDatatablesExample = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 10,
        });
    }

    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Customer Orders Report';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#funerals');

            if ( !table ) {
                return;
            }

            initDatatable();
            exportButtons();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesExample.init();
});
</script> --}}
        
            
          









<script>
"use strict";

var KTFuneralsDatatables = function () {
    var dt;

    var initDatatable = function () {
        dt = $("#funerals").DataTable({
            searchDelay: 500,
            order: [],
            dom: "<'row'<'col-sm-12'tr>>" + // Only the table and rows
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // Info and pagination
            columnDefs: [
                { targets: 6, orderable: false }
            ]
        });
    };

    var handleSearch = function () {
        var searchInput = document.querySelector('[data-kt-docs-table-filter="search"]');
        searchInput.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    };

    var handleLengthChange = function () {
        var lengthSelect = document.getElementById('customLength');
        lengthSelect.addEventListener('change', function (e) {
            dt.page.len(e.target.value).draw();
        });
    };

    var handleFilter = function () {
        var filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');
        var resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');
        var statusRadios = document.querySelectorAll('[name="funeral_status"]');

        filterButton.addEventListener('click', function () {
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

        resetButton.addEventListener('click', function () {
            statusRadios.forEach(function(radio) {
                radio.checked = radio.value === "all";
            });
            dt.search('').columns().search('').draw();
        });
    };

    return {
        init: function () {
            initDatatable();
            handleSearch();
            handleLengthChange();
            handleFilter();
        }
    };
}();

$(document).ready(function () {
    KTFuneralsDatatables.init();
});
</script>






    
{{-- START: This is for the table that groups by person --}}

<script>
"use strict";

var KTMembershipsDatatables2 = function () {
    var dt;

    var initDatatable = function () {
        dt = $("#kt_datatable_row_grouping2").DataTable({
            searchDelay: 500,
            order: [],
            dom: "<'row'<'col-sm-12'tr>>" + // Only the table and rows
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // Info and pagination
            columnDefs: [
                { targets: 5, orderable: false }
            ],
            drawCallback: function(settings) {
                var api = this.api();
                var rows = api.rows({ page: 'current' }).nodes();
                var last = null;

                api.column(2, { page: 'current' }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group fs-6 fw-bold"><td colspan="6">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            }
        });
    };

    var handleSearch = function () {
        var searchInput = document.querySelector('[data-kt-docs-table-filter="search2"]');
        searchInput.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    };

    var handleLengthChange = function () {
        var lengthSelect = document.getElementById('customLength2');
        lengthSelect.addEventListener('change', function (e) {
            dt.page.len(e.target.value).draw();
        });
    };

    var handleFilter = function () {
        var filterButton = document.querySelector('[data-kt-docs-table-filter="filter2"]');
        var resetButton = document.querySelector('[data-kt-docs-table-filter="reset2"]');
        var statusRadios = document.querySelectorAll('[name="membership_status2"]');

        filterButton.addEventListener('click', function () {
            var filterValue = "";
            statusRadios.forEach(function(radio) {
                if (radio.checked) {
                    filterValue = radio.value;
                }
            });
            if (filterValue === "all") {
                filterValue = ""; // Reset the filter if 'All' is selected
            }

            dt.columns(3).search(filterValue).draw(); // Assumes 'Membership Status' is in the 4th column
        });

        resetButton.addEventListener('click', function () {
            statusRadios.forEach(function(radio) {
                radio.checked = radio.value === "all";
            });
            dt.search('').columns().search('').draw();
        });
    };

    return {
        init: function () {
            initDatatable();
            handleSearch();
            handleLengthChange();
            handleFilter();
        }
    };
}();

$(document).ready(function () {
    KTMembershipsDatatables2.init();
});
</script>

{{-- END: This is for the table that groups by person --}}

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        function toggleDetails(selector) {
            $(selector).slideToggle('slow');
        }
    </script>


@endpush
