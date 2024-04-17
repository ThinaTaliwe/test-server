@extends('layouts.app2')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css" rel="stylesheet">

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

    {{-- This is for accordion -- SIYA --}}

    <style>
        /* Adjusting the accordion header/button background color */
        .accordion-button {
            background-color: #448C74 !important;
            /* #b7cebe Your specified green color */
            color: white !important;
            /* #343a40 Ensuring text color is readable against the green background */
        }

        /* Style for accordion button when accordion is open */
        .accordion-button:not(.collapsed) {
            background-color: #448C74 !important;
            /* #9fb3aa A slightly darker shade of green for contrast */
            color: white !important;
            /* #343a40 Keeping text color consistent; change as desired */
        }

        /* Hover effect for accordion button */
        .accordion-button:hover {
            background-color: #a5c1b2 !important;
            /* A lighter/different shade for hover effect */
            color: #343a40 !important;
            /* Ensuring text color is readable on hover; adjust as needed */
        }

        /* Adjusting icon colors */
        .accordion-button .fas,
        .accordion-button .far,
        .accordion-button .arrow-indicator::before {
            /* Targeting the arrow indicator if it's a pseudo-element */
            color: #FFFFFF !important;
            /* White */
        }

        /* Style for accordion button when input is missing */
        .accordion-button.missing-input {
            background-color: #c71f3f !important;
            /*#e57373 #f20d20b7 A nice, complementing red */
            color: #FFFFFF !important;
            /* White text for readability */
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

        /* Uncomment if you want to use green borders for valid inputs */
        /* input:valid, select:valid {
            border-color: #28a745 !important; /* Change to green when the input becomes valid */
        }

        */
    </style>

    <style>
        .form-control {
            background-color: white !important;
        }
    </style>
@endpush

@section('row_content')
    <div class="card rounded mb-16" style="background-color: #E9F0EC">
        <h1 class="my-4" style="margin-left: auto; margin-right: auto; width: fit-content;">Resolution Hub</h1>
        {{-- <h2>Grouped Records by Membership ID</h2> --}}
        <div class="card mb-3 bg-light">
            <div class="card-header ">
                <h3 class="card-title">Search by Membership ID</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('resolutionhub') }}" method="GET" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="search" class="sr-only">Membership ID:</label>
                        <input type="text" class="form-control mt-2" id="search" name="search"
                            placeholder="Enter Membership ID" value="{{ $search ?? '' }}">
                    </div>

                    <button type="submit" class="btn btn-dark btn-sm my-2 ml-2">Search</button>
                    <a href="{{ route('resolutionhub') }}" class="btn btn-sm mb-2 ml-2 my-2 btn-danger">Reset</a>

                </form>
            </div>
        </div>


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


        @if ($paginatedItems->count() > 0)
            @foreach ($paginatedItems as $item)
                <form id="mainForm" method="POST" action="{{ route('handleMainRecordAction') }}">
                    @csrf {{-- CSRF token for form submission --}}
                    <div class="card inner-card mb-2 bg-light">
                        <div class="card-header" style="background-color: #448C74;">
                            <h3 class="card-title" style="color: white">Main Record ID: {{ $item['membershipId'] }}</h3>
                        </div>
                        <div class="card-body">



                            <!--begin::Accordion-->
                            <div class="accordion mb-3" id="kt_accordion_{{ $loop->index }}">
                                <!-- First Accordion Item for Membership Details -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_{{ $loop->index }}_header_1">
                                        <button
                                            class="accordion-button fs-4 fw-semibold{{ $loop->first ? '' : ' collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#kt_accordion_{{ $loop->index }}_body_1"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="kt_accordion_{{ $loop->index }}_body_1">
                                            Membership Details
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_{{ $loop->index }}_body_1"
                                        class="accordion-collapse collapse{{ $loop->first ? ' show' : '' }}"
                                        aria-labelledby="kt_accordion_{{ $loop->index }}_header_1"
                                        data-bs-parent="#kt_accordion_{{ $loop->index }}">
                                        <div class="accordion-body" style="background-color: #E9F0EC">
                                            <!-- Accordion content for Membership Details -->
                                            <!-- Main Record Card as Form -->
                                            @if ($item['main'])
                                                <div class="row">
                                                    <!-- Membership ID and Membership Type -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="membership_id">Membership ID</label>
                                                            <input type="text" class="form-control" id="membership_id"
                                                                name="membership_id" readonly
                                                                value="{{ $item['main']->membership_id }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="bu_membership_type_id">Membership Type</label>
                                                            <select class="form-control" id="bu_membership_type_id"
                                                                name="bu_membership_type_id" style="height: 50%;" required>
                                                                <!-- Empty option for no selection/default -->
                                                                <option disabled value="" selected>Select Membership
                                                                    Type</option>
                                                                @foreach ($dropdownBuMemTyp as $type)
                                                                    <option value="{{ $type->id }}"
                                                                        {{ old('bu_membership_type_id', $item['main']->membership_type ?? '') == $type->name ? 'selected' : '' }}>
                                                                        {{ $type->id }}. {{ $type->name }} -
                                                                        {{ $type->description }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- First Name, Initials, and Last Name -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="first_name">First Name</label>
                                                            <input type="text" class="form-control" id="first_name"
                                                                name="first_name" value="{{ $item['main']->first_name }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="initials">Initials</label>
                                                            <input type="text" class="form-control" id="initials"
                                                                name="initials" value="{{ $item['main']->initials }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="last_name">Last Name</label>
                                                            <input type="text" class="form-control" id="last_name"
                                                                name="last_name" value="{{ $item['main']->last_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="screen_name">Screen Name</label>
                                                            <input type="text" class="form-control" id="screen_name"
                                                                name="screen_name"
                                                                value="{{ $item['main']->screen_name }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="id_number">ID Number</label>
                                                            <input type="text" class="form-control" id="id_number"
                                                                name="id_number" value="{{ $item['main']->id_number }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="birth_date">Birth Date</label>
                                                            <input type="date" class="form-control" id="birth_date"
                                                                name="birth_date"
                                                                value="{{ \Carbon\Carbon::parse($item['main']->birth_date)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="join_date">Join Date</label>
                                                            <input type="date" class="form-control" id="join_date"
                                                                name="join_date"
                                                                value="{{ \Carbon\Carbon::parse($item['main']->join_date)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="end_date">End Date</label>
                                                            <input type="date" class="form-control" id="end_date"
                                                                name="end_date"
                                                                value="{{ \Carbon\Carbon::parse($item['main']->end_date)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <!-- primary_contact_number, secondary_contact_number, and tertiary_contact_number -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="primary_contact_number">Primary Contact
                                                                Number</label>
                                                            <input type="text" class="form-control"
                                                                id="primary_contact_number" name="primary_contact_number"
                                                                value="{{ $item['main']->primary_contact_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="secondary_contact_number">Secondary Contact
                                                                Number</label>
                                                            <input type="text" class="form-control"
                                                                id="secondary_contact_number"
                                                                name="secondary_contact_number"
                                                                value="{{ $item['main']->secondary_contact_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="tertiary_contact_number">Tertiary Contact
                                                                Number</label>
                                                            <input type="text" class="form-control"
                                                                id="tertiary_contact_number"
                                                                name="tertiary_contact_number"
                                                                value="{{ $item['main']->tertiary_contact_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="primary_e_mail_address">Email Address</label>
                                                            <input type="text" class="form-control"
                                                                id="primary_e_mail_address" name="primary_e_mail_address"
                                                                value="{{ $item['main']->primary_e_mail_address }}">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">



                                                    <!-- Dropdown for Membership Type -->

                                                    {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="married_status">Marriage Status</label>
                                        <select class="form-control" id="married_status" name="married_status">
                                            @foreach ($marriageStatuses as $status)
                                                <option value="{{ $status->id }}" {{ $item['main']->married_status == $status->id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                                    {{-- TODO : Uncomment above amd replace the below duplicate which is used as placeholder --}}


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="gender_id">Marriage Status(Placeholder)</label>
                                                            <select class="form-control" id="gender_id" name="gender_id"
                                                                style="height: 50%;">
                                                                @foreach ($dropdownGender as $gender)
                                                                    <option value="{{ $gender->id }}"
                                                                        {{ $item['main']->gender_id == $gender->id ? 'selected' : '' }}>
                                                                        {{ $gender->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="gender_id">Gender</label>
                                                            <select class="form-control" id="gender_id" name="gender_id"
                                                                style="height: 50%;">
                                                                @foreach ($dropdownGender as $gender)
                                                                    <option value="{{ $gender->id }}"
                                                                        {{ $item['main']->gender_id == $gender->id ? 'selected' : '' }}>
                                                                        {{ $gender->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <!-- Dropdown for Membership Status -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="bu_membership_status_id">Membership Status</label>
                                                            <select class="form-control" id="bu_membership_status_id"
                                                                name="bu_membership_status_id" style="height: 50%;">
                                                                <!-- Empty option for no selection/default -->
                                                                <option disabled value="" selected>Select Membership
                                                                    Status</option>
                                                                @foreach ($dropdownBuMemSta as $status)
                                                                    <option value="{{ $status->id }}">
                                                                        {{ $status->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <!-- Dropdown for Membership Region -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="bu_membership_region_id">Membership Region</label>
                                                            <select class="form-control" id="bu_membership_region_id"
                                                                name="bu_membership_region_id" style="height: 50%;">
                                                                <!-- Empty option for no selection/default -->
                                                                <option disabled value="">Select Membership Region
                                                                </option>
                                                                @foreach ($dropdownBuMemReg as $index => $region)
                                                                    <option value="{{ $region->id }}"
                                                                        {{ $index == 0 ? 'selected' : '' }}>
                                                                        {{ $region->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>



                                                </div>


                                                <div class="row">
                                                    <!-- last_payment_date and paid_till_date -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="last_payment_date">Last Payment Date</label>
                                                            <input type="date" class="form-control"
                                                                id="last_payment_date" name="last_payment_date"
                                                                value="{{ \Carbon\Carbon::parse($item['main']->last_payment_date)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paid_till_date">Paid Till Date</label>
                                                            <input type="date" class="form-control"
                                                                id="paid_till_date" name="paid_till_date"
                                                                value="{{ \Carbon\Carbon::parse($item['main']->paid_till_date)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card-header">Duplicate Records</div>
                                                <div class="card-body">
                                                    <p>No main records found for this Membership ID.</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Second Accordion Item for Physical Address -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_{{ $loop->index }}_header_2">
                                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#kt_accordion_{{ $loop->index }}_body_2"
                                            aria-expanded="false"
                                            aria-controls="kt_accordion_{{ $loop->index }}_body_2">
                                            Physical Address
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_{{ $loop->index }}_body_2" class="accordion-collapse collapse"
                                        aria-labelledby="kt_accordion_{{ $loop->index }}_header_2"
                                        data-bs-parent="#kt_accordion_{{ $loop->index }}">
                                        <div class="accordion-body" style="background-color: #E9F0EC">
                                            <!-- Accordion content for Physical Address -->


                                            <div class=" mb-4 pb-4">



                                                <div class="card-body pt-4 p-3">

                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div
                                                                class="input-group input-group-outline  @error('Line1') is-invalid focused is-focused  @enderror  mb-0">

                                                                <input type="text" class="form-control" name="Line1"
                                                                    id="Line1" value="{{ old('Line1') }}" required>
                                                            </div>
                                                            @error('Line1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-6 col-sm-6">
                                                            <div
                                                                class="input-group input-group-outline  @error('Line2') is-invalid focused is-focused  @enderror  mb-0">

                                                                <input type="text" class="form-control" name="Line2"
                                                                    id="Line2" value="{{ old('Line2') }}"
                                                                    placeholder="Address Line 2">
                                                            </div>
                                                            @error('Line2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 col-sm-6">
                                                            <div
                                                                class="input-group input-group-outline  @error('TownSuburb') is-invalid focused is-focused  @enderror  mb-0">

                                                                <input type="text" class="form-control"
                                                                    name="TownSuburb" id="TownSuburb"
                                                                    value="{{ old('TownSuburb') }}"
                                                                    placeholder="Town/Suburb">
                                                            </div>
                                                            @error('TownSuburb')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-6">
                                                            <div
                                                                class="input-group input-group-outline  @error('City') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                                <input type="text" class="form-control" name="City"
                                                                    id="City" value="{{ old('City') }}"
                                                                    placeholder="City">
                                                            </div>
                                                            @error('City')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 col-sm-4 mt-3 mt-sm-0">
                                                            <div
                                                                class="input-group input-group-outline  @error('Province') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                                <input type="text" class="form-control"
                                                                    name="Province" id="Province"
                                                                    value="{{ old('Province') }}" placeholder="Province">
                                                            </div>
                                                            @error('Province')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 col-sm-2 mt-3 mt-sm-0">
                                                            <div
                                                                class="input-group input-group-outline  @error('PostalCode') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                                <input type="text" class="form-control"
                                                                    name="PostalCode" id="PostalCode"
                                                                    value="{{ old('PostalCode') }}"
                                                                    placeholder="Postal Code">
                                                            </div>
                                                            @error('PostalCode')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">

                                                        <div class="col-6 col-sm-4 mt-3 mt-sm-0 mx-auto">
                                                            <div
                                                                class="input-group input-group-outline  @error('Country') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                                <input type="text" class="form-control" name="Country"
                                                                    id="Country" value="{{ old('Province') }}"
                                                                    placeholder="Country">
                                                            </div>
                                                            @error('Country')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                    </div>

                                                </div>


                                                <div
                                                    style="text-align: center; display: flex; justify-content: center; align-items: center; ">
                                                    <span style="color: white; margin-right: 10px;">Powered by</span>
                                                    <img src="{{ asset('img/google.png') }}" alt="Google Logo"
                                                        style="width: 50px; height: auto;">
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>

                                <!-- Third Accordion Item for Payment Details -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_{{ $loop->index }}_header_3">
                                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#kt_accordion_{{ $loop->index }}_body_3"
                                            aria-expanded="false"
                                            aria-controls="kt_accordion_{{ $loop->index }}_body_3">
                                            Payment Details
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_{{ $loop->index }}_body_3" class="accordion-collapse collapse"
                                        aria-labelledby="kt_accordion_{{ $loop->index }}_header_3"
                                        data-bs-parent="#kt_accordion_{{ $loop->index }}">
                                        <div class="accordion-body" style="background-color: #E9F0EC">
                                            <!-- Accordion content for Payment Details -->




                                            {{-- Start Payment Method --}}
                                            <div class="card my-4 border-gba mt-4">
                                                <h1 class="text-center my-4">Select Default Payment Method</h1>
                                                <div class="d-flex align-items-center mb-3 px-4">
                                                    <select class="form-select me-2" id="paymentMethod" name="payment_method_id"required>
                                                        <option selected disabled value="">Select Payment Method
                                                        </option>
                                                        @foreach ($paymentmethods as $paymentmethod)
                                                        <option value="{{ $paymentmethod->id }}">{{ $paymentmethod->name }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- End Payment Metod --}}








                                            {{-- Start Payment List --}}
                                            <div class="card my-4">
                                                <!-- EFT Section -->
                                                <div id="eftSection" class="payment-section card" style="display: none;">
                                                    <h2 class="m-4 text-center">EFT Payment Details</h2>

                                                    <div class="container-fluid">
                                                        <!-- Row 1 for Account Holder and Bank Name -->
                                                        <div class="row">
                                                            <!-- Account Holder -->
                                                            <div class="col-md-5 fv-row">
                                                                <label
                                                                    class="required fs-6 fw-semibold form-label mb-2">Account
                                                                    Holder</label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="Enter Account Holder"
                                                                    name="accountHolder" value="" />
                                                            </div>

                                                            <!-- Bank Name -->
                                                            <div class="col-md-4 fv-row">
                                                                <label
                                                                    class="required fs-6 fw-semibold form-label mb-2">Bank
                                                                    Name</label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="Enter Bank Name" name="bankName"
                                                                    value="" />
                                                            </div>

                                                            <!-- Branch Code -->
                                                            <div class="col-md-3 fv-row">
                                                                <label
                                                                    class="required fs-6 fw-semibold form-label mb-2">Branch
                                                                    Code</label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="Enter Branch Code" name="branchCode"
                                                                    value="" />
                                                            </div>
                                                        </div>

                                                        <!-- Row 2 for Account Number and Branch Code -->
                                                        <div class="row mb-4">
                                                            <!-- Account Number -->
                                                            <div class="col-md-6 fv-row">
                                                                <label
                                                                    class="required fs-6 fw-semibold form-label mb-2">Account
                                                                    Number</label>
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="Enter Account Number"
                                                                    name="accountNumber" value="" />
                                                            </div>

                                                            <div class="col-md-4 fv-row">
                                                                <label
                                                                    class="required fs-6 fw-semibold form-label mb-2">Account
                                                                    Type</label>
                                                                <select class="form-select form-select-solid"
                                                                    name="accountType" data-control="select2"
                                                                    data-hide-search="true">
                                                                    <option value="">Select Account Type</option>
                                                                    <option value="checking">Checking</option>
                                                                    <option value="savings">Savings</option>
                                                                    <!-- Add more options as necessary -->
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>




                                                <!-- Debit Order Section -->
                                                <div id="3Section" class="payment-section card p-4"
                                                    style="display: none;">

                                                    <h2 class="m-4 text-center">Debit Order Payment Details</h2>


                                                    <!-- Bank Name Dropdown -->
                                                    <div class="mb-3">
                                                        <label for="eftBankName" class="form-label">Bank Name</label>
                                                        <select class="form-control" id="BankName" style="height: 50%"
                                                            name="bank_id" required>
                                                            <option value="">Select Bank</option>
                                                            @foreach ($banks as $bank)
                                                                <option value="{{ $bank->id }}">{{ $bank->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Account Type Dropdown -->
                                                    <div class="mb-3">
                                                        <label for="eftAccountType" class="form-label">Account
                                                            Type</label>
                                                        <select class="form-control" id="AccountType" style="height: 50%"
                                                            name="account_type_id" required>
                                                            <option value="">Select Account Type</option>
                                                            @foreach ($accountTypes as $type)
                                                                <option value="{{ $type->id }}">{{ $type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Branch Code Dropdown (if applicable) or Input -->
                                                    <div class="mb-3">
                                                        <label for="eftBranchCode" class="form-label">Branch Code</label>
                                                        <select class="form-control" id="BranchCode" style="height: 50%"
                                                            name="branch_code" required>
                                                            <option value="">Select Branch Code</option>
                                                            @foreach ($branchCodes as $code)
                                                                <option value="{{ $code->id }}">
                                                                    {{ $code->branch_code . ' - ' . $code->bank_short_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <!-- You can convert this to an input field if branch code is not directly selectable -->
                                                    </div>

                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold form-label mb-2">Account
                                                            Holder</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input wrapper-->
                                                        <div class="position-relative">
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid"
                                                                placeholder="Enter Account Holder" name="Account Holder"
                                                                value="" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input wrapper-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!-- Account Number -->
                                                    <div class="mb-3">
                                                        <label for="debitOrderAccountNumber" class="form-label">Account
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            id="debitOrderAccountNumber" name="account_number"
                                                            placeholder="Enter Account Number" required>
                                                    </div>

                                                    <!-- Debit Order Amount -->
                                                    <div class="mb-3">
                                                        <label for="debitOrderAmount" class="form-label">Debit Order
                                                            Amount</label>
                                                        <input type="number" class="form-control" id="debitOrderAmount"
                                                            name="amount" placeholder="Enter Amount" min="0"
                                                            required>
                                                    </div>

                                                    <!-- Debit Order Frequency -->
                                                    <div class="mb-3">
                                                        <label for="debitOrderFrequency" class="form-label">Debit Order
                                                            Frequency</label>
                                                        <select class="form-control" id="debitOrderFrequency"
                                                            style="height: 50%" name="frequency" required>
                                                            <option value="">Select Frequency</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quarterly">Quarterly</option>
                                                            <option value="biannually">Bi-annually</option>
                                                            <option value="annually">Annually</option>
                                                        </select>
                                                    </div>







                                                </div>






                                                <!-- Data Via Section -->
                                                <div id="dataViaSection" class="payment-section card mx-4 pb-8"
                                                    style="display: none;">
                                                    <h2 class="m-4 text-center">Data Via Payment Details</h2>


                                                    <!-- User ID -->
                                                    <div class="mb-3">
                                                        <label for="dataViaUserID" class="form-label">User ID</label>
                                                        <input type="text" class="form-control" id="dataViaUserID"
                                                            name="user_id" placeholder="Enter User ID" required>
                                                    </div>

                                                    <!-- Transaction ID -->
                                                    <div class="mb-3">
                                                        <label for="dataViaTransactionID" class="form-label">Transaction
                                                            ID</label>
                                                        <input type="text" class="form-control"
                                                            id="dataViaTransactionID" name="transaction_id"
                                                            placeholder="Enter Transaction ID" required>
                                                    </div>

                                                    <!-- Amount -->
                                                    <div class="mb-3">
                                                        <label for="dataViaAmount" class="form-label">Amount</label>
                                                        <input type="number" class="form-control" id="dataViaAmount"
                                                            name="amount" placeholder="Enter Amount" min="0"
                                                            required>
                                                    </div>

                                                    <!-- Payment Date -->
                                                    <div class="mb-3">
                                                        <label for="dataViaPaymentDate" class="form-label">Payment
                                                            Date</label>
                                                        <input type="date" class="form-control"
                                                            id="dataViaPaymentDate" name="payment_date" required>
                                                    </div>



                                                </div>






                                            </div>
                                            {{-- End Payment List --}}

















                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Accordion-->






                        </div>
                        <!-- Add more accordion cards as needed following the structure above -->
                    </div>

                    <!-- Hidden Button for Submit Action 1 -->
                    <button type="submit" name="action" value="submitActionOne" style="display:none;">Save
                        Membership</button>
                    <!-- Hidden Button for Submit Action 2 -->
                    <button type="submit" name="action" value="submitActionTwo" style="display:none;">Test
                        Output</button>
                </form>



                <!-- Duplicate Records Card -->
                @if (!$item['duplicates']->isEmpty())
                    <div class="card inner-card bg-light mt-8">
                        <div class="card-header" style="background-color: #448C74;">
                            <h3 class="card-title" style="color: white">Duplicate Records</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($item['duplicates'] as $index => $duplicate)
                                <div class="record-container">
                                    @php
                                        // Decode the JSON into an array
                                        $details = json_decode($duplicate->duplicate_details, true);
                                        $summary = [];

                                        foreach ($details as $key => $value) {
                                            // Make key bold and concatenate with value
                                            // Ensure HTML special characters are escaped appropriately
                                            $summary[] = '<strong>' . e($key) . '</strong>: ' . e($value);
                                        }

                                        // Join all parts into one string
                                        $summaryString = implode(', ', $summary);

                                        // Optionally, limit the total length of the summary string
                                        // if (strlen($summaryString) > 100) { // Example limit
                                        //     $summaryString = substr($summaryString, 0, 100) . '...';
                                        // }

                                    @endphp


                                    <p>Duplicate Details: {!! $summaryString !!}</p>
                                    <div class="action-buttons pb-4">
                                        <!-- Trigger Modal Button -->
                                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                            data-target="#duplicateModal{{ $index }}">
                                            View Details
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            data-source-table="{{ $duplicate->target_table_name }}"
                                            data-record-id="{{ $duplicate->id }}"
                                            data-membership-id="{{ $duplicate->membership_id }}"
                                            onclick="handleRecordAction(this, 'discardDuplicate')">Remove</button>
                                    </div>
                                </div>

                                <!-- Modal Structure -->
                                <div class="modal fade" id="duplicateModal{{ $index }}" tabindex="-1"
                                    role="dialog" aria-labelledby="duplicateModalLabel{{ $index }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #448C74;">
                                                <h5 class="modal-title" style="color: white;">Duplicate Record Details
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true" style="color: white;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="background-color: #E9F0EC;">
                                                @php
                                                    $duplicateDetails = json_decode(
                                                        $duplicate->duplicate_details,
                                                        true,
                                                    );
                                                @endphp

                                                @if ($duplicateDetails)
                                                    @foreach ($duplicateDetails as $key => $value)
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <span
                                                                class="mr-2"><strong>{{ $key }}:</strong></span>
                                                            <input type="text" style="background-color: #ffffff;"
                                                                id="copy_{{ $duplicate->id }}_{{ $loop->index }}"
                                                                value="{{ $value }}" readonly
                                                                class="form-control d-inline-block"
                                                                style="width: auto; background-color: #adc2b4 !important; border-color: #849e8d; color: #495057;"
                                                                onclick="this.select(); ">
                                                            <button class="btn btn-light btn-sm ml-2 copy-btn"
                                                                onclick="copyToClipboard('copy_{{ $duplicate->id }}_{{ $loop->index }}')"><i
                                                                    class="fas fa-copy"></i></button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>No details available.</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- <div class="card inner-card border border-secondary" >
                                    <div class="card-header" style="background-color: #448C74;">
                                        <h3 class="card-title" style="color: white">Duplicate Records</h3>
                                    </div>
                                    <div class="card-body bg-light ">
                                        <p>No duplicate records found.</p>
                                    </div>
                                </div> --}}
                @endif








                <!-- Dependents Card -->
                @if (!$item['dependents']->isEmpty())
                    <div class="card inner-card my-8 bg-light">
                        <div class="card-header" style="background-color: #448C74;">
                            <h3 class="card-title" style="color: white">Dependents</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($item['dependents'] as $dependent)
                                <!-- Hidden Inputs for Dependent's Details -->

                                <input type="hidden" id="dependent_membership_id_{{ $dependent->id }}"
                                    name="dependent_membership_id[]" value="{{ $dependent->membership_id }}">
                                <input type="hidden" id="dependent_first_name_{{ $dependent->id }}"
                                    name="dependent_first_name[]" value="{{ $dependent->first_name }}">
                                <input type="hidden" id="dependent_initials_{{ $dependent->id }}"
                                    name="dependent_initials[]" value="{{ $dependent->initials }}">
                                <input type="hidden" id="dependent_last_name_{{ $dependent->id }}"
                                    name="dependent_last_name[]" value="{{ $dependent->last_name }}">
                                <input type="hidden" id="dependent_screen_name_{{ $dependent->id }}"
                                    name="dependent_screen_name[]" value="{{ $dependent->screen_name }}">
                                <input type="hidden" id="dependent_id_number_{{ $dependent->id }}"
                                    name="dependent_id_number[]" value="{{ $dependent->id_number }}">
                                <input type="hidden" id="dependent_birth_date_{{ $dependent->id }}"
                                    name="dependent_birth_date[]" value="{{ $dependent->birth_date }}">
                                <input type="hidden" id="dependent_person_relationship_id_{{ $dependent->id }}"
                                    name="dependent_person_relationship_id[]"
                                    value="{{ $dependent->person_relationship_id }}">
                                <input type="hidden" id="dependent_gender_id_{{ $dependent->id }}"
                                    name="dependent_gender_id[]" value="{{ $dependent->gender_id }}">
                                <input type="hidden" id="dependent_join_date_{{ $dependent->id }}"
                                    name="dependent_join_date[]" value="{{ $dependent->join_date }}">
                                <input type="hidden" id="dependent_primary_contact_number_{{ $dependent->id }}"
                                    name="dependent_primary_contact_number[]"
                                    value="{{ $dependent->primary_contact_number }}">
                                <input type="hidden" id="dependent_secondary_contact_number_{{ $dependent->id }}"
                                    name="dependent_secondary_contact_number[]"
                                    value="{{ $dependent->secondary_contact_number }}">
                                <input type="hidden" id="dependent_primary_e_mail_address_{{ $dependent->id }}"
                                    name="dependent_primary_e_mail_address[]"
                                    value="{{ $dependent->primary_e_mail_address }}">

                                <!--END -- Hidden Inputs for Dependent's Details -->


                                <div class="record-container">
                                    @if ($dependent->record_completed)
                                        <span style="color: green;">&#10004;</span>
                                    @endif
                                    <p>
                                        <span id="record_status_{{ $dependent->id }}"></span>
                                        <b>Summary:</b>
                                    </p>
                                    <p>
                                        <b>Membership ID:</b> <span
                                            id="summary_membership_id_{{ $dependent->id }}">{{ $dependent->membership_id ?? 'N/A' }}</span>,
                                        <b>First Name:</b> <span
                                            id="summary_first_name_{{ $dependent->id }}">{{ $dependent->first_name ?? 'N/A' }}</span>,
                                        <b>Initials:</b> <span
                                            id="summary_initials_{{ $dependent->id }}">{{ $dependent->initials ?? 'N/A' }}</span>,
                                        <b>Last Name:</b> <span
                                            id="summary_last_name_{{ $dependent->id }}">{{ $dependent->last_name ?? 'N/A' }}</span>,
                                        <b>Screen Name:</b> <span
                                            id="summary_screen_name_{{ $dependent->id }}">{{ $dependent->screen_name ?? 'N/A' }}</span>,
                                        <b>ID Number:</b> <span
                                            id="summary_id_number_{{ $dependent->id }}">{{ $dependent->id_number ?? 'N/A' }}</span>,
                                        <b>Birth Date:</b> <span
                                            id="summary_birth_date_{{ $dependent->id }}">{{ $dependent->birth_date ?? 'N/A' }}</span>,
                                        <b>Relationship ID:</b> <span
                                            id="summary_person_relationship_id_{{ $dependent->id }}">{{ $dependent->person_relationship_id ?? 'N/A' }}</span>,
                                        <b>Gender ID:</b> <span
                                            id="summary_gender_id_{{ $dependent->id }}">{{ $dependent->gender_id ?? 'N/A' }}</span>,
                                        <b>Join Date:</b> <span
                                            id="summary_join_date_{{ $dependent->id }}">{{ $dependent->join_date ?? 'N/A' }}</span>,
                                        <b>Primary Contact Number:</b> <span
                                            id="summary_primary_contact_number_{{ $dependent->id }}">{{ $dependent->primary_contact_number ?? 'N/A' }}</span>,
                                        <b>Secondary Contact Number:</b> <span
                                            id="summary_secondary_contact_number_{{ $dependent->id }}">{{ $dependent->secondary_contact_number ?? 'N/A' }}</span>,<br>
                                        <b>Primary Email Address:</b> <span
                                            id="summary_primary_e_mail_address_{{ $dependent->id }}">{{ $dependent->primary_e_mail_address ?? 'N/A' }}</span>
                                    </p>




                                    <!-- Edit Dependent Details Modal -->
                                    <div class="modal fade" id="editDependentModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editDependentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDependentModalLabel">Edit
                                                        Dependent Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Modal Input Fields -->
                                                    <div class="form-group">
                                                        <label for="modal_membership_id">Membership ID</label>
                                                        <input type="text" class="form-control"
                                                            id="modal_membership_id">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_first_name">First
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_first_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_initials">Initials</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_initials">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_last_name">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_last_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_screen_name">Screen
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_screen_name">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_id_number">ID Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_id_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_birth_date">Birth
                                                                    Date</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_birth_date">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_person_relationship_id">Relationship
                                                                    ID</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_person_relationship_id">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_gender_id">Gender ID</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_gender_id">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_join_date">Join Date</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_join_date">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_primary_contact_number">Primary
                                                                    Contact Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_primary_contact_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_secondary_contact_number">Secondary
                                                                    Contact Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_secondary_contact_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="modal_primary_e_mail_address">Primary
                                                                    Email Address</label>
                                                                <input type="text" class="form-control"
                                                                    id="modal_primary_e_mail_address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="updateDependent()">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Action Buttons -->
                                    <div class="action-buttons">
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="editDependent('{{ $dependent->id }}')">Edit</button>

                                        @if (!$dependent->record_completed)
                                            <button id="btnMarkAsComplete" type="button"
                                                class="btn btn-success btn-sm mark-as-complete-btn"
                                                id="mark_complete_btn_{{ $dependent->id }}"
                                                onclick="markAsComplete('{{ $dependent->id }}')">Mark as
                                                Complete</button>
                                        @endif
                                        <button id="removeButton" type="button" class="btn btn-danger btn-sm"
                                            onclick="removeDependent('{{ $dependent->id }}')">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="card inner-card border border-secondary mt-4">
                        <div class="card-header"style="background-color: #448C74;">
                            <h3 class="card-title" style="color: white">Dependents</h3>
                        </div>
                        <div class="card-body bg-light">
                            <p>No dependent records found.</p>
                        </div>
                    </div>
                @endif








                <!-- Error Records Card -->
                @if (!$item['errors']->isEmpty())
                    <div class="card inner-card bg-light">
                        <div class="card-header" style="background-color: #448C74;">
                            <h3 class="card-title" style="color: white">Potential Dependents</h3>
                        </div>
                        <div class="card-body">
                            {{-- Default by Mnguni --}}
                            @foreach ($item['errors'] as $error)
                                <div class="record-container">
                                    @php
                                        $details = json_decode($error->source_details, true);
                                        $summary = [];

                                        if ($details) {
                                            foreach ($details as $key => $value) {
                                                // Make key bold and concatenate with value, ensuring HTML special characters are escaped
                                                $summary[] = '<strong>' . e($key) . '</strong>: ' . e($value);
                                            }

                                            // Join all parts into one string
                                            $summaryString = implode(', ', $summary);
                                        } else {
                                            $summaryString = 'N/A';
                                        }
                                    @endphp
                                    <p>Source Details: {!! $summaryString !!}</p>
                                    <!-- Hidden inputs generated from source_details -->
                                    @if ($error->source_details)
                                        @php
                                            $details = json_decode($error->source_details, true);
                                        @endphp
                                        @foreach ($details as $key => $value)
                                            <input type="hidden" id="{{ 'error_' . $error->id . '_' . $key }}"
                                                name="{{ 'error_' . $error->id . '_' . $key }}"
                                                value="{{ $value }}">
                                        @endforeach
                                    @endif

                                    <div class="action-buttons">
                                        <button id="makeDependantBtn" type="button" class="btn btn-sm btn-success"
                                            data-source-table="{{ $error->target_table_name }}"
                                            data-record-id="{{ $error->id }}"
                                            data-membership-id="{{ $error->membership_id }}"
                                            onclick="handleRecordAction(this, 'makeDependentError')">Make
                                            Dependant</button>

                                        <button id="removeDependantBtn" type="button" class="btn btn-sm btn-danger"
                                            data-source-table="{{ $error->target_table_name }}"
                                            data-record-id="{{ $error->id }}"
                                            data-membership-id="{{ $error->membership_id }}"
                                            onclick="handleRecordAction(this, 'discardError')">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Default by Mnguni --}}

                            {{-- 29/02/2024 Interface --}}
                            {{-- @foreach ($item['errors'] as $error)
                                            <div class="record-container">
                                                @if ($error->source_details)
                                                    @php
                                                        $details = json_decode($error->source_details, true);
                                                    @endphp
                                                    <div>
                                                        <ul>
                                                            <li>
                                                                <p>Membership {{ $details['membership_id'] ?? 'N/A' }} from
                                                                    {{ $details['initials'] ?? 'N/A' }},
                                                                    {{ $details['last_name'] ?? 'N/A' }}
                                                                    <a href="javascript:void(0);" class="special-link"
                                                                        onclick="toggleDetails('#details{{ $error->id }}')">Raw
                                                                        Details</a>
                                                                </p>
                                                            </li>
                                                        </ul>

                                                        <div class="details" id="details{{ $error->id }}"
                                                            style="display:none;">
                                                            <div class="card card-body" style="background-color: gray;">
                                                                <pre>{{ json_encode($details, JSON_PRETTY_PRINT) }}</pre>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p>Source Details: N/A</p>
                                                @endif

                                                <div class="action-buttons">
                                                    <button type="button" class="btn btn-sm btn-success"
                                                        data-source-table="{{ $error->target_table_name }}"
                                                        data-record-id="{{ $error->id }}"
                                                        data-membership-id="{{ $error->membership_id }}"
                                                        onclick="handleRecordAction(this, 'makeDependentError')">Make
                                                        Dependant</button>

                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-source-table="{{ $error->target_table_name }}"
                                                        data-record-id="{{ $error->id }}"
                                                        data-membership-id="{{ $error->membership_id }}"
                                                        onclick="handleRecordAction(this, 'discardError')">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach --}}

                        </div>
                    </div>
                @else
                    {{-- <div class="card inner-card border border-secondary">
                                    <div class="card-header" style="background-color: #448C74;">
                                        <h3 class="card-title" style="color: white">Potential Dependents Records</h3>
                                    </div>
                                    <div class="card-body bg-light">
                                        <p>No error records found.</p>
                                    </div>
                                </div> --}}
                @endif

                {{-- Action Buttons for Main Record --}}
                <div class="form-group text-center d-flex justify-content-around  mt-8 mb-8">
                    <!-- External Button for Submit Action 1 -->
                    <button id="externalSubmitActionOne" class="btn btn-success">Save Membership</button>
                    <!-- External Button for Submit Action 2 -->
                    <button id="externalSubmitActionTwo" class="btn btn-dark">Test Output</button>



                    {{-- <!-- JavaScript actions -->
                                                        <button type="button" class="btn btn-info" onclick="otherActionOne()">Other Action 1 (JS)</button>
                                                        <button type="button" class="btn btn-warning" onclick="otherActionTwo()">Other Action 2 (JS)</button>
                                 --}}
                </div>

                <!-- Custom Bootstrap Pagination Links -->
                <nav aria-label="Page navigation example" class="my-6 bg-secondary-subtle rounded p-2">
                    <ul class="pagination justify-content-center">
                        @if ($paginatedItems->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $paginatedItems->previousPageUrl() }}">Previous</a></li>
                        @endif

                        <!-- Display current page of total pages (e.g., "1 of 52025") -->
                        <li class="page-item disabled"><span class="page-link">{{ $paginatedItems->currentPage() }} of
                                {{ $paginatedItems->lastPage() }}</span></li>

                        @if ($paginatedItems->hasMorePages())
                            <li class="page-item"><a class="page-link"
                                    href="{{ $paginatedItems->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>

    </div>
    </div>

    </form>
    @endforeach
@else
    <p>No records found.</p>
    @endif




    </div>
@endsection

@push('scripts')
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Then include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function toggleDetails(selector) {
            $(selector).slideToggle('slow');
        }
    </script>

    {{-- This is for the duplicates modal --}}
    <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand('copy');

            // Find the button that triggered the function
            var button = document.querySelector('button[onclick="copyToClipboard(\'' + id + '\')"]');

            // Save the original HTML of the button to revert back to it later
            var originalHTML = button.innerHTML;

            // Change the button's color to green and update its content to show a check mark or similar to indicate success
            button.style.backgroundColor = '#28a745';
            button.style.color = 'white';
            button.innerHTML = 'Copied! <i class="fa fa-check"></i>'; // Change this line as needed to match your icon

            // Revert the button's style and HTML after 1 second
            setTimeout(function() {
                button.style.backgroundColor =
                ''; // Revert to original background color or set to any specific color
                button.innerHTML = originalHTML; // Revert to original HTML
            }, 1000);
        }
    </script>








    {{-- This is NOT for main record --}}
    <script>
        function handleRecordAction(button, actionType) {
            const sourceTable = button.getAttribute('data-source-table');
            const recordId = button.getAttribute('data-record-id');
            const membershipId = button.getAttribute('data-membership-id'); // Capture the membership ID
            let formData = {
                sourceTable: sourceTable,
                recordId: recordId,
                membershipId: membershipId, // Include membershipId in the formData
                actionType: actionType, // Make sure this aligns with the backend expectations
            };

            // Collect hidden inputs for 'makeDependentError' action type only
            if (actionType === 'makeDependentError') {
                formData.details = {};
                document.querySelectorAll(`input[id^='error_${recordId}_']`).forEach(input => {
                    // Extract the original key name by removing the 'error_' prefix and the record ID
                    let originalKeyName = input.name.replace(`error_${recordId}_`, '');
                    formData.details[originalKeyName] = input.value;
                });
            }



            let jsonData = JSON.stringify(formData);

            fetch('/process-record-action', { // Adjust if your app's base URL is different
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: jsonData
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    // Handle non-2xx responses
                    return response.json().then(errorData => {
                        // If there's a known error message structure
                        const errorMessage = errorData.message || "An error occurred, please try again.";
                        console.error('Error:', errorMessage);
                        // Display a user-friendly error message
                        alert(errorMessage);
                        throw new Error(errorMessage);
                    });
                })
                .then(data => {
                    console.log('Success:', data);
                    window.location.reload(); // Refresh to reflect changes
                })
                .catch((error) => {
                    // For unexpected errors, provide a generic message
                    alert("An unexpected error occurred. Please contact support if the problem persists.");
                    console.error('Unexpected Error:', error);
                });
        }
    </script>

    {{-- dependent modal and updating hidden fields --}}
    <script>
        let currentEditingDependentId;

        function editDependent(dependentId) {
            currentEditingDependentId = dependentId;
            // Populate the modal fields with values from hidden inputs
            document.getElementById('modal_membership_id').value = document.getElementById('dependent_membership_id_' +
                dependentId).value;
            document.getElementById('modal_first_name').value = document.getElementById('dependent_first_name_' +
                dependentId).value;
            document.getElementById('modal_initials').value = document.getElementById('dependent_initials_' + dependentId)
                .value;
            document.getElementById('modal_last_name').value = document.getElementById('dependent_last_name_' + dependentId)
                .value;
            document.getElementById('modal_screen_name').value = document.getElementById('dependent_screen_name_' +
                dependentId).value;
            document.getElementById('modal_id_number').value = document.getElementById('dependent_id_number_' + dependentId)
                .value;
            document.getElementById('modal_birth_date').value = document.getElementById('dependent_birth_date_' +
                dependentId).value;
            document.getElementById('modal_person_relationship_id').value = document.getElementById(
                'dependent_person_relationship_id_' + dependentId).value;
            document.getElementById('modal_gender_id').value = document.getElementById('dependent_gender_id_' + dependentId)
                .value;
            document.getElementById('modal_join_date').value = document.getElementById('dependent_join_date_' + dependentId)
                .value;
            document.getElementById('modal_primary_contact_number').value = document.getElementById(
                'dependent_primary_contact_number_' + dependentId).value;
            document.getElementById('modal_secondary_contact_number').value = document.getElementById(
                'dependent_secondary_contact_number_' + dependentId).value;
            document.getElementById('modal_primary_e_mail_address').value = document.getElementById(
                'dependent_primary_e_mail_address_' + dependentId).value;

            $('#editDependentModal').modal('show');
        }

        function updateDependent() {
            // Update the hidden fields with new values from the modal
            document.getElementById('dependent_membership_id_' + currentEditingDependentId).value = document.getElementById(
                'modal_membership_id').value;
            document.getElementById('dependent_first_name_' + currentEditingDependentId).value = document.getElementById(
                'modal_first_name').value;
            document.getElementById('dependent_initials_' + currentEditingDependentId).value = document.getElementById(
                'modal_initials').value;
            document.getElementById('dependent_last_name_' + currentEditingDependentId).value = document.getElementById(
                'modal_last_name').value;
            document.getElementById('dependent_screen_name_' + currentEditingDependentId).value = document.getElementById(
                'modal_screen_name').value;
            document.getElementById('dependent_id_number_' + currentEditingDependentId).value = document.getElementById(
                'modal_id_number').value;
            document.getElementById('dependent_birth_date_' + currentEditingDependentId).value = document.getElementById(
                'modal_birth_date').value;
            document.getElementById('dependent_person_relationship_id_' + currentEditingDependentId).value = document
                .getElementById('modal_person_relationship_id').value;
            document.getElementById('dependent_gender_id_' + currentEditingDependentId).value = document.getElementById(
                'modal_gender_id').value;
            document.getElementById('dependent_join_date_' + currentEditingDependentId).value = document.getElementById(
                'modal_join_date').value;
            document.getElementById('dependent_primary_contact_number_' + currentEditingDependentId).value = document
                .getElementById('modal_primary_contact_number').value;
            document.getElementById('dependent_secondary_contact_number_' + currentEditingDependentId).value = document
                .getElementById('modal_secondary_contact_number').value;
            document.getElementById('dependent_primary_e_mail_address_' + currentEditingDependentId).value = document
                .getElementById('modal_primary_e_mail_address').value;

            // Update the summary with new values from the modal
            document.getElementById('summary_membership_id_' + currentEditingDependentId).innerText = document
                .getElementById('modal_membership_id').value;
            document.getElementById('summary_first_name_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_first_name').value;
            document.getElementById('summary_initials_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_initials').value;
            document.getElementById('summary_last_name_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_last_name').value;
            document.getElementById('summary_screen_name_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_screen_name').value;
            document.getElementById('summary_id_number_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_id_number').value;
            document.getElementById('summary_birth_date_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_birth_date').value;
            document.getElementById('summary_person_relationship_id_' + currentEditingDependentId).innerText = document
                .getElementById('modal_person_relationship_id').value;
            document.getElementById('summary_gender_id_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_gender_id').value;
            document.getElementById('summary_join_date_' + currentEditingDependentId).innerText = document.getElementById(
                'modal_join_date').value;
            document.getElementById('summary_primary_contact_number_' + currentEditingDependentId).innerText = document
                .getElementById('modal_primary_contact_number').value;
            document.getElementById('summary_secondary_contact_number_' + currentEditingDependentId).innerText = document
                .getElementById('modal_secondary_contact_number').value;
            document.getElementById('summary_primary_e_mail_address_' + currentEditingDependentId).innerText = document
                .getElementById('modal_primary_e_mail_address').value;


            $('#editDependentModal').modal('hide');
        }
    </script>

    {{-- Dependent: Mark as completed and remove --}}
    <script>
        function markAsComplete(dependentId) {
            fetch('/mark-dependent-complete/' + dependentId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({}) // Empty body since we're just marking as complete based on ID
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);
                    // Hide the "Mark as Complete" button for this record
                    document.getElementById('mark_complete_btn_' + dependentId).style.display = 'none';
                    // Optionally, add a green checkmark next to the record
                    document.getElementById('record_status_' + dependentId).innerHTML = '&#10004;'; // Green check mark
                })
                .catch(error => console.error('Error:', error));
        }


        function removeDependent(dependentId) {
            // Ask the user if they are sure they want to discard
            if (confirm('Are you sure you want to discard this dependent?')) {
                fetch('/remove-dependent/' + dependentId, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({}) // No need to send data in the body for this request
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Success:', data);
                        // Optionally, refresh the page to reflect changes
                        window.location.reload();
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>

    {{-- This is for accordion header validation colour change --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkAccordionButtons = () => {
                document.querySelectorAll('.accordion-item').forEach((accordionItem) => {
                    if (accordionItem.style.display === 'none' || getComputedStyle(accordionItem)
                        .display === 'none') {
                        return; // Skip if the accordion item itself is not visible.
                    }

                    const accordionBody = accordionItem.querySelector('.accordion-collapse');
                    let allFilled = true;

                    accordionBody.querySelectorAll(
                        'input[required], textarea[required], select[required]').forEach((
                    input) => {
                        const paymentSection = input.closest('.payment-section');
                        if (paymentSection && (paymentSection.style.display === 'none' ||
                                getComputedStyle(paymentSection).display === 'none')) {
                            return; // Skip this input as its section is hidden.
                        }
                        if (!input.value.trim()) {
                            allFilled = false;
                        }
                    });

                    const accordionButton = accordionItem.querySelector('.accordion-button');
                    if (allFilled) {
                        accordionButton.classList.remove('missing-input');
                    } else {
                        accordionButton.classList.add('missing-input');
                    }
                });
            };

            window.updateRequiredAttributes = () => {
                document.querySelectorAll('.payment-section').forEach(section => {
                    const isVisible = section.style.display !== 'none' && getComputedStyle(section)
                        .display !== 'none';

                    section.querySelectorAll('input, textarea, select').forEach(input => {
                        // Set inputs as required if their section is visible, not required otherwise.
                        input.required = isVisible;

                        // Disable inputs if their section is not visible, enable them otherwise.
                        input.disabled = !isVisible;
                    });
                });
            };


            // Handling the payment method selection
            const paymentMethodSelect = document.getElementById('paymentMethod');
            paymentMethodSelect.addEventListener('change', () => {
                document.querySelectorAll('.payment-section').forEach(section => {
                    section.style.display = 'none';
                });

                const selectedValue = paymentMethodSelect.value;
                const selectedSectionId = selectedValue + 'Section';
                const selectedSection = document.getElementById(selectedSectionId);
                if (selectedSection) {
                    selectedSection.style.display = '';
                }

                window.updateRequiredAttributes();
                checkAccordionButtons();
            });

            document.querySelectorAll('.accordion').forEach(accordion => {
                accordion.addEventListener('shown.bs.collapse', checkAccordionButtons);
                accordion.addEventListener('hidden.bs.collapse', checkAccordionButtons);
            });

            document.querySelectorAll('.accordion-item .accordion-collapse').forEach(accordionBody => {
                accordionBody.querySelectorAll('input[required], textarea[required], select[required]')
                    .forEach(input => {
                        input.addEventListener('input', checkAccordionButtons);
                    });
            });

            // Initial setup to ensure correct state based on default or previously selected payment method
            if (paymentMethodSelect) {
                paymentMethodSelect.dispatchEvent(new Event('change'));
            } else {
                window.updateRequiredAttributes();
                checkAccordionButtons();
            }
        });
    </script>



    {{-- This is for the submit buttons for MAIN because they are outside the form tags --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure that the required attributes are updated based on the current state
            function handleClick(actionValue) {
                if (window.updateRequiredAttributes) {
                    window.updateRequiredAttributes();
                }
                // Trigger the corresponding hidden submit button
                document.querySelector(`button[name="action"][value="${actionValue}"]`).click();
            }

            // External "Save Membership" button listener
            document.getElementById('externalSubmitActionOne').addEventListener('click', function() {
                handleClick('submitActionOne');
            });

            // External "Test Output" button listener
            document.getElementById('externalSubmitActionTwo').addEventListener('click', function() {
                handleClick('submitActionTwo');
            });
        });
    </script>






    {{-- THINA --}}
    <script>
        // JavaScript to trigger SweetAlert

        document.getElementById('demoButton').addEventListener('click', function() {
            // Example condition: a simple boolean variable
            // Adjust this condition based on your specific needs
            var conditionMet = true; // Change this to false to prevent the alert from showing

            if (conditionMet) {
                // Condition is met, show the SweetAlert
                Swal.fire({
                    title: 'Hello!',
                    text: 'This is a Sweet Alert!',
                    icon: 'success',
                    confirmButtonText: 'Cool',
                    customClass: {
                        title: 'swal2-title',
                        content: 'swal2-content'
                    }
                });
            } else {
                // Condition is not met, do something else or nothing
                console.log('Condition not met, alert not shown.');
            }
        });
    </script>





    {{-- Payment type selection --}}

    <script>
        document.getElementById('paymentMethod').addEventListener('change', function() {
            // Hide all sections
            document.querySelectorAll('.payment-section').forEach(function(section) {
                section.style.display = 'none';
            });

            // Show the selected section
            const selectedPaymentMethod = this.value;
            if (selectedPaymentMethod) {
                const sectionId = selectedPaymentMethod + 'Section';
                document.getElementById(sectionId).style.display = 'block';
            }
        });

        // Example to handle EFT form submission
        document.getElementById('eftForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Collect data
            const eftData = {
                accountHolder: document.getElementById('eftAccountHolder').value,
                accountNumber: document.getElementById('eftAccountNumber').value,
                bankName: document.getElementById('eftBankName').value,
                branchCode: document.getElementById('eftBranchCode').value,
            };
            console.log(eftData); // For demonstration, replace with AJAX call to server
            // Reset form or provide feedback
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add click event listener to each card
            document.querySelectorAll('.card').forEach(function(card) {
                card.addEventListener('click', function() {
                    // Find the detail div within the clicked card and toggle visibility
                    var detailDiv = card.querySelector('.card-detail');
                    if (detailDiv.style.display === "none") {
                        detailDiv.style.display = "block";
                    } else {
                        detailDiv.style.display = "none";
                    }
                });
            });
        });
    </script>

    {{-- END -- Payment type selection --}}





    <script>
        // JavaScript to trigger SweetAlert
        document.getElementById('removeDependantBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Error Record',
                text: 'Successfully Removed Dependant',
                icon: 'success',
                confirmButtonText: 'Ok',
                customClass: {
                    title: 'swal2-title',
                    content: 'swal2-content'
                }
            });
        });
    </script>

    <script>
        // JavaScript to trigger SweetAlert
        document.getElementById('btnMarkAsComplete').addEventListener('click', function() {
            Swal.fire({
                title: 'Dependents',
                text: 'Successfully Completed',
                icon: 'success',
                confirmButtonText: 'Ok',
                customClass: {
                    title: 'swal2-title',
                    content: 'swal2-content'
                }
            });
        });
    </script>

    <script>
        document.getElementById('demoButton2').addEventListener('click', function() {
            // Example condition: a simple boolean variable
            // Adjust this condition based on your specific needs
            var conditionMet = true; // Change this to false to prevent the alert from showing

            if (conditionMet) {
                // Condition is met, show the SweetAlert
                Swal.fire({
                    title: 'Hello!',
                    text: 'This is a Sweet Alert!',
                    icon: 'success',
                    confirmButtonText: 'Cool',
                    customClass: {
                        title: 'swal2-title',
                        content: 'swal2-content'
                    }
                });
            } else {
                // Condition is not met, do something else or nothing
                console.log('Condition not met, alert not shown.');
            }
        });
    </script>
@endpush
