@extends('layouts.app2')

@push('styles')
    <!-- CSS Files -->
    {{-- <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .nav-link.active i {
            color: forestgreen;
            text-decoration: underline;
            position: relative;
        }

        .nav-link.active i::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid forestgreen;
            opacity: 0;
            transition: opacity 0.3s, bottom 0.3s;
        }

        .nav-link.active i:hover::after {
            bottom: -15px;
            opacity: 1;
        }
    </style>
@endpush

@section('row_content')
    <!--begin::Card-->
    <div class="card mb-4">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Stepper-->
            <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                <div class="mt-2 text-center">

                    <ul class="nav nav-tabs d-inline-flex" id="myTabs">
                        <li class="nav-item">
                            <a class="nav-link active p-5" id="membership-tab" data-bs-toggle="tab" href="#membership"
                                style="font-size: 2rem"><i class="bi bi-people-fill" style="font-size: 3rem"></i>
                                <span>Membership</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-5" id="dependants-tab" data-bs-toggle="tab" href="#dependants"
                                style="font-size: 2rem"><i class="bi bi-person-fill" style="font-size: 3rem"></i>
                                Dependants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-5" id="addresses-tab" data-bs-toggle="tab" href="#addresses"
                                style="font-size: 2rem"><i class="bi bi-house-fill" style="font-size: 3rem"></i>
                                Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-5" id="payments-tab" data-bs-toggle="tab" href="#payments"
                                style="font-size: 2rem"><i class="bi bi-currency-exchange" style="font-size: 3rem"></i>
                                Payment History</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-6" id="myTabContent">
                        <div class="tab-pane fade show active" id="membership">
                            <h2>Membership Content</h2>
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Notice-->
                                <div class="text-dark fw-semibold fs-6">Mandatory information</div>
                                <!--end::Notice-->
                            </div>

                            <div class="card-body g-3 rounded bg-light">
                                <form action="{{ route('update-member', $membership->id) }}" method="POST"
                                    {{ $dis }} role="form" id="membershipForm" name="membershipForm"
                                    class="row g-2">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="row mw-500px mb-5 d-flex justify-content-center align-items-center mt-5 mb-0" data-kt-buttons="true"> --}}

                                    {{--                                        <div class="col d-flex justify-content-center align-items-center"> --}}
                                    {{--                                            <label class="form-check form-check-custom form-check-solid me-10"> --}}
                                    {{--                                                <input type="radio" class="btn-check" name="language" id="btnradio1" autocomplete="off" {{ $membership->language_id == '1' ? 'checked' : '' }}> --}}
                                    {{--                                                <label class="btn btn-outline-primary form-check-label" for="btnradio1">English</label> --}}
                                    {{--                                            </label> --}}
                                    {{--                                        </div> --}}

                                    {{--                                        <div class="col d-flex justify-content-center align-items-center"> --}}
                                    {{--                                            <label class="form-check form-check-custom form-check-solid me-10"> --}}
                                    {{--                                                <input type="radio" class="btn-check" name="language" id="btnradio2" autocomplete="off" {{ $membership->language_id == '2' ? 'checked' : '' }}> --}}
                                    {{--                                                <label class="btn btn-outline-primary form-check-label" for="btnradio2">Afrikaans</label> --}}
                                    {{--                                            </label> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li style="color: white">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif --}}

                                    {{-- <hr class="light horizontal mt-2 mb-0"> --}}

                                    <div class="col-4">
                                        <div class="input-group input-group-outline  mt-3 mb-0">

                                            <input type="text" class="form-control" name="Name" id="Name"
                                                value="{{ $membership->name }}" placeholder="Name">
                                        </div>
                                        @error('Name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group input-group-outline  mt-3 mb-0">

                                            <input type="text" class="form-control" name="Surname" id="Surname"
                                                value="{{ $membership->surname }}" placeholder="Surname">
                                        </div>
                                        @error('Surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-4">
                                        <div class="input-group input-group-outline   mt-3 mb-0">

                                            <input type="text" class="form-control" name="IDNumber" id="IDNumber"
                                                value="{{ $membership->id_number }}" placeholder="Identity Number"
                                                maxlength="13" size="13">
                                        </div>
                                        @error('IDNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group input-group-outline mb-0 mt-1">

                                            <input type="email" class="form-control" name="Email" id="Email"
                                                value="{{ $membership->primary_e_mail_address }}" placeholder="Email">
                                        </div>
                                        {{-- @error('Email')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror --}}
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group input-group-outline mb-0">

                                            <input type="number" class="form-control" name="Telephone" id="Telephone"
                                                value="{{ $membership->primary_contact_number }}"
                                                placeholder="Telephone (Cell)" maxlength="10">
                                        </div>
                                        {{-- @error('Telephone')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror --}}
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group input-group-outline mb-0">

                                            <input type="number" class="form-control" name="WorkTelephone"
                                                id="WorkTelephone" value="{{ $membership->secondary_contact_number }}"
                                                placeholder="Telephone (Work)">
                                        </div>
                                        {{-- @error('WorkTelephone')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                    @enderror --}}
                                    </div>

                                    {{-- <hr class="dark horizontal mt-2 mb-0"> --}}
                                    <div class="col-3 d-flex align-items-center">
                                        <!-- <div style="white-space:nowrap;" class="px-4">                                                                                                                                                <label for="inputAddress" class="form-label">Date Of Birth</label>
                                                                                                                                                                            </div> -->
                                        <div class="input-group input-group-outline ">

                                            <input type="text" onkeypress="return isNumberKey(event)"
                                                class="form-control" name="inputDay" id="inputDay"
                                                value="{{ dobBreakdown($membership->person->birth_date)->day }}"
                                                {{-- value="{{ $membership->person->birth_date ? dobBreakdown($membership->person->birth_date)->day : 'N/A' }}" --}} placeholder="DD" maxlength="2" size="2">
                                            {{-- @error('inputDay')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror --}}
                                        </div>
                                        <span class="px-2"></span>
                                        <div class="input-group input-group-outline ">

                                            <input type="text" onkeypress="return isNumberKey(event)"
                                                class="form-control" name="inputMonth" id="inputMonth"
                                                value="{{ dobBreakdown($membership->person->birth_date)->month }}"
                                                placeholder="MM" maxlength="2" size="2">
                                            {{-- @error('inputMonth')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror --}}
                                        </div>
                                        <span class="px-2"></span>
                                        <div class="input-group input-group-outline ">
                                            <input type="text" onkeypress="return isNumberKey(event)"
                                                class="form-control" name="inputYear" id="inputYear"
                                                value="{{ dobBreakdown($membership->person->birth_date)->year }}"
                                                placeholder="YYYY" maxlength="4" size="4">
                                            {{-- @error('inputYear')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="col-2 pt-4">
                                        {{-- <label class="form-check-label mb-0 me-2 text-lg text-dark" for="language">Gender: </label> --}}

                                        <div class="form-group">
                                            {{-- <label for="genderSelect" class="form-label">Gender</label> --}}
                                            {{-- <select class="form-select" name="radioGender" id="genderSelect">
                                                <option value="M"
                                                    {{ $membership->gender_id == 'M' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="F"
                                                    {{ $membership->gender_id == 'F' ? 'selected' : '' }}>Female
                                                </option>
                                            </select> --}}



                                            <select class="form-select" name="radioGender" id="genderSelect">
    <option value="">Select Gender</option>
    @foreach ($genders as $option)
        <option value="{{ $option->id }}"
            {{ $membership->gender_id == $option->id ? 'selected' : '' }}>
            {{ $option->name }}
        </option>
    @endforeach
</select>

                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="dropdown">
                                            <select name="memtype" id="memtype"
                                                class="btn bg-gradient-secondary dropdown-toggle w-100 my-4 @error('Select Membership Type') is-invalid @enderror"
                                                aria-label="Select Membership Type">
                                                <option disabled>Select Membership Type</span> </option>
                                                @foreach ($memtypes as $memtype)
                                                    <option
                                                        {{ $membership->bu_membership_type_id == $memtype->id ? 'selected' : '' }}
                                                        value="{{ $memtype->id }}">{{ $memtype->id }}.
                                                        {{ $memtype->name }} - {{ $memtype->description }} -
                                                        R{{ round($memtype->membership_fee, 2) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3" style="margin-bottom: 1rem;">
                                        <div class="form-group" style="padding-top: 1rem; text-align: center;">
                                            {{-- <label for="maritalStatusSelect" class="form-label">Marital Status</label> --}}
                                            {{-- <label class="form-check-label mb-0 me-2 text-dark" for="marital_status">Maritial Status: </label> --}}

                                            {{-- <select class="form-select pb-3" name="marital_status"
                                                id="maritalStatusSelect">
                                                <option value="1"
                                                    {{ $membership->person->married_status == '1' ? 'selected' : '' }}>
                                                    Married</option>
                                                <option value="2"
                                                    {{ $membership->person->married_status == '2' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="3"
                                                    {{ $membership->person->married_status == '3' ? 'selected' : '' }}>
                                                    Widowed</option>
                                                <option value="4"
                                                    {{ $membership->person->married_status == '4' ? 'selected' : '' }}>
                                                    Divorced</option>
                                            </select> --}}

                                            <select class="form-select pb-3" name="marital_status" id="maritalStatusSelect">
    <option value="">Select Marital Status</option>
    @foreach ($marriages as $status)
        <option value="{{ $status->id }}"
            {{ $membership->person->married_status == $status->id ? 'selected' : '' }}>
            {{ $status->name }}
        </option>
    @endforeach
</select>

                                        </div>
                                    </div>

                                    {{-- <hr class="dark horizontal mt-2 mb-0"> --}}
                                    
                                    <div class="col-12">
                                        <div class="text-center  d-flex justify-content-center align-items-center ">
                                            <button type="submit" text="Update" class="btn btn-success w-150 my-4 mb-4"
                                                id="btnUpdate"><i class="material-icons pe-2">save</i>Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="dependants">
                            <h2>Dependants Content</h2>
                            {{-- <p>This is the content for the Dependants tab.</p> --}}

                            <div class="pb-10 pb-lg-15">
                                <!--begin::Notice-->
                                <div class="text-dark fw-semibold fs-6">Add a new dependant</div>
                                <!--end::Notice-->
                            </div>

                            <div class="card-body bg-light rounded border-bottom">
                                <div class="table-responsive p-0">
                                    <h1>Dependants List</h1>
                                    <table class="table table-bordered border-dark rounded p-0 m-0">
                                        <thead class="text-uppercase bg-gba-light p-0 m-0">
                                            <tr>
                                                <th>Name</th>
                                                <th>ID</th>
                                                <th>Gender</th>
                                                <th>Relationship Code</th>
                                                <th>Date Of Birth</th>
                                                <th>Age</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-light p-0 m-0">
                                            @foreach ($dependants as $dependant)
                                                @php
                                                    $age = ageFromDOB($dependant->personDep->birth_date); // Ensure you have a method to calculate age from DOB
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p class="text-dark ">
                                                            {{ $dependant->personDep->screen_name }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-dark ">
                                                            {{ $dependant->personDep->id_number }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-dark">
                                                            {{ $dependant->personDep->gender_id == 'M' ? 'Male' : ($dependant->personDep->gender_id == 'F' ? 'Female' : 'Other') }}
                                                        </p>
                                                    </td>
                                            <td>
                                                <p class="text-dark">
                                                    {{ $dependant->person_relationship_id ?? 'Unknown Relationship' }}
                                                </p>
                                            </td>

                                                    <td>
                                                        <p class="text-dark">
                                                            {{ substr($dependant->personDep->birth_date, 0, 10) }}
                                                        </p>
                                                    </td>
                                                    <td
                                                        class="text-light badge badge {{ changeAgeBackground($age) }} mt-2">
                                                        <span class="text-bold fw-bolder">{{ $age }}</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-sm btn-danger btn-active-light-primary"
                                                            href="/remove-dependant/{{ $dependant->secondary_person_id }}">Remove</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- Add Dependant Block -->
                            <div class="card mt-5 mb-2 bg-light rounded" id="add-dependant">

                                <h3 class="mt-6">Add Dependant</h3>
                                <form id="addDependant" method="POST" action="{{ route('add-dependant.store') }}"
                                    autocomplete="off">
                                    @csrf

                                    <div class="card-body pt-0 mt-4 mb-3 bg-light rounded">
                                        <div class="row">
                                            <div class="col-4">
                                                <div
                                                    class="input-group input-group-outline  @error('Name') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                    <input type="text" class="form-control" name="Name"
                                                        id="Name" value="{{ old('Name') }}" placeholder="Name">
                                                </div>
                                                @error('DepName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div
                                                    class="input-group input-group-outline  @error('Surname') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                    <input type="text" class="form-control" name="Surname"
                                                        id="Surname" value="{{ old('Surname') }}"
                                                        placeholder="Surname">
                                                </div>
                                                @error('DepSurname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div id="IDNumberDepDiv"
                                                    class="input-group input-group-outline  @error('IDNumberDep') is-invalid focused is-focused  @enderror mt-3 mb-0">

                                                    <input type="text" class="form-control" name="IDNumberDep"
                                                        id="IDNumberDep" value="{{ old('IDNumberDep') }}"
                                                        placeholder="Identity Number" maxlength="13" size="13"
                                                        onchange="getDOBDep(this.value)">
                                                </div>
                                                <span class="invalid-feedback" role="alert" id="error"></span>
                                                @error('IDNumberDep')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-4">
                                                <div
                                                    class="py-2 pt-4 col d-flex justify-content-center align-items-center mx-auto">
                                                    <div id="inputDayDepDiv"
                                                        class="input-group input-group-outline @error('inputDayDep') is-invalid @enderror">

                                                        <input type="text" onkeypress="return isNumberKey(event)"
                                                            class="form-control" name="inputDayDep" id="inputDayDep"
                                                            value="{{ old('inputDayDep') }}" placeholder="DD"
                                                            maxlength="2" size="2">
                                                        @error('inputDayDep')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <span class="px-2">/</span>
                                                    <div id="inputMonthDepDiv"
                                                        class="input-group input-group-outline @error('inputMonthDep') is-invalid @enderror">

                                                        <input type="text" onkeypress="return isNumberKey(event)"
                                                            class="form-control" name="inputMonthDep" id="inputMonthDep"
                                                            value="{{ old('inputMonthDep') }}" placeholder="MM"
                                                            maxlength="2" size="2">
                                                        @error('inputMonthDep')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <span class="px-2">/</span>
                                                    <div id="inputYearDepDiv"
                                                        class="input-group input-group-outline @error('inputYearDep') is-invalid @enderror">

                                                        <input type="text" onkeypress="return isNumberKey(event)"
                                                            class="form-control" name="inputYearDep" id="inputYearDep"
                                                            value="{{ old('inputYearDep') }}" placeholder="YYYY"
                                                            maxlength="4" size="4">
                                                        @error('inputYearDep')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <input hidden type="text" class="form-control" name="mainMemberId"
                                                        id="mainMemberId" value="{{ $membership->person_id }}">
                                                </div>
                                            </div>
                                            <div class="col-4" style="margin-top: 15px; text-align: center;">
                                                {{-- <label for="relationCodeSelect" class="form-label">Relationship</label> --}}
                                                <select class="form-select" name="radioRelationCode"
                                                    id="relationCodeSelect">
                                                    <option>Select relationship</option>
                                                    @foreach ($relationships as $relationship)
                                                        <option value="{{ $relationship->id }}">{{ $relationship->id }} -
                                                            {{ $relationship->name }}</option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-4" style="margin-top: 15px; text-align: center;">
                                                {{-- <label for="genderDepSelect" class="form-label">Gender</label> --}}
                                                <select class="form-select" name="radioGenderDep" id="genderDepSelect">
    <option>Select gender</option>
    @foreach($genders as $gender)
        <option value="{{ $gender->id }}">{{ $gender->description }}</option>
    @endforeach
</select>
                                            </div>

                                        </div>

                                        <div class="row mt-0">


                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-6 mx-auto">
                                                <div
                                                    class="text-center  d-flex justify-content-center align-items-center ">
                                                    <button type="submit" class="btn btn-success w-40 my-4 mb-4"><i
                                                            class="material-icons">add</i> Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- End Add Dependant Block -->

                        </div>

                        <div class="tab-pane fade" id="addresses">
                            <h2>Address Content</h2>
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Notice-->
                                <div class="text-dark fw-semibold fs-6">Provide at least one</div>
                                <!--end::Notice-->
                            </div>

                            <div class="row">

                                <div class="mt-4 mb-4">
                                    <div class="card bg-light">


                                        <div class="card-body pt-4 p-3">
                                            <ul class="list-group">
                                                <h1>Membership Addresses</h1>
                                                <table
                                                    class="table table-bordered mt-4 bg-light bg-blend-lighten border-dark rounded-3"
                                                    id="addressesTable">
                                                    <thead>
                                                        <tr class="bg-gba-light text-dark">
                                                            <th>ID</th>
                                                            <th>Street</th>
                                                            <th>Suburb</th>
                                                            <th>City</th>
                                                            <th>ZIP</th>
                                                            <th>District</th>
                                                            <th>Province</th>
                                                            <th>Created</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Data will be fetched and displayed here -->
                                                        @foreach ($addresses as $address)
                                                            <tr>
                                                                <td>{{ $address->id }}</td>
                                                                <td>{{ $address->line1 }}</td>
                                                                <td>{{ $address->suburb }}</td>
                                                                <td>{{ $address->city }}</td>
                                                                <td>{{ $address->ZIP }}</td>
                                                                <td>{{ $address->district }}</td>
                                                                <td>{{ $address->province }}</td>
                                                                <td>{{ $address->created_at }}</td>
                                                                <td>
                                                                    {{-- <button onclick="deleteAddress({{ $address->id }})" class="btn btn-danger">Delete</button> --}}
                                                                    <form id="delete-address-form"
                                                                        action="/delete-address/{{ $address->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger"
                                                                            onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4 pb-4">

                                    <div class="card h-100 mb-4 bg-light rounded">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                                        </div>
                                        <h1 class="text-center"><span class="bg-gba-light border-gba p-1">Add New
                                                Address</span></h1>
                                        <form id="addAddress" method="POST" action="{{ route('address.store') }}"
                                            autocomplete="off">
                                            @csrf
                                            <div class="card-body pt-4 p-3">

                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <div
                                                            class="input-group input-group-outline  @error('Line1') is-invalid focused is-focused  @enderror  mb-0">

                                                            <input type="text" class="form-control" name="Line1"
                                                                id="Line1" value="{{ old('Line1') }}">
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

                                                            <input type="text" class="form-control" name="TownSuburb"
                                                                id="TownSuburb" value="{{ old('TownSuburb') }}"
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

                                                            <input type="text" class="form-control" name="Province"
                                                                id="Province" value="{{ old('Province') }}"
                                                                placeholder="Province">
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

                                                            <input type="text" class="form-control" name="PostalCode"
                                                                id="PostalCode" value="{{ old('PostalCode') }}"
                                                                placeholder="Postal Code">
                                                        </div>
                                                        @error('PostalCode')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">

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

                                                <input hidden type="text" class="form-control" name="MembershipId"
                                                    id="MembershipId" value="{{ $membership->id }}">

                                                <div class="button-row d-flex mt-4">
                                                    <button id="btnAddAddr" class="btn btn-success mx-auto mb-0 w-40"
                                                        type="submit" title="Add New Address" text="Add"><i
                                                            class="material-icons">add</i>Add
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="payments">
                            <h2>Payments Content</h2>
                            <div class="pb-10 pb-lg-15">

                                <!-- Payment Details Modal Start -->

                                <div id="payments">
                                    {{-- <h2 class="text-center">Payments Content</h2> --}}
                                    <p class="text-dark fw-semibold fs-6 text-center">See all your payment details.</p>
                                    <div class="card-body px-3 pt-4 pb-2 bg-secondary-subtle rounded mt-4">
                                        <div class="table-responsive p-0">
                                            <table
                                                class="table table-bordered align-items-center justify-content-center border mb-4 bg-gba-light"
                                                id="datatable-billing">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase font-weight-bolder">Bill ID</th>
                                                        <th class="text-uppercase font-weight-bolder">Date Issued</th>
                                                        <th class="text-uppercase font-weight-bolder">Amount</th>
                                                        <th class="text-uppercase font-weight-bolder">Status</th>
                                                        <th class="text-uppercase font-weight-bolder">Due Date</th>
                                                        <th class="text-uppercase font-weight-bolder">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (empty($billings))
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <div class="alert alert-danger" role="alert">
                                                                    This membership does not have any billing history.
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @foreach ($billings as $billing)
                                                            @if ($billing->membership_id == $membership->id)
                                                                <tr>
                                                                    <td>{{ $billing->id }}</td>
                                                                    <td>{{ $billing->transaction_date }}</td>
                                                                    <td>{{ number_format($billing->receipt_value, 2) }}
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="badge {{ $billing->transaction_description == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                                                            {{ ucfirst($billing->transaction_description) }}
                                                                        </span>
                                                                    </td>
                                                                    <td>{{ $billing->created_at }}</td>
                                                                    <td>
                                                                        {{-- <a class="btn btn-link text-primary text-gradient"
                                                                            href="/view-bill/{{ $billing->id }}">
                                                                            <i
                                                                                class="material-icons text-sm">visibility</i>View
                                                                        </a> --}}
                                                                        <form id="delete-billing-form"
                                                                            action="/delete-billing/{{ $billing->id }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-danger"
                                                                                onclick="return confirm('Are you sure you want to delete this billing?')"><i
                                                                                    class="material-icons text-sm">delete_outline</i>Remove</button>
                                                                        </form>

                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment Details Modal End -->



                            </div>

                        </div>
                    </div>

                </div>

                <!--end::Nav-->
                <!--begin::Form-->


                <!--end::Form-->

            </div>
            <!--end::Stepper-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
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


    {{-- <script>
        var membershipId = {{ $membership->id }};
        var deletedRecords = []; // Array to store IDs of deleted records

        $(document).ready(function() {
            $.ajax({
                url: 'http://192.168.1.7/memberAddressData', // Adjust this if your URL is different
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableBody = $('#addressesTable tbody');
                    $.each(data, function(index, item) {
                        if (membershipId == item.membership_id) {
                            var row = $('<tr>').append(
                                $('<td>').text(item.id),
                                $('<td>').text(item.membership_id),
                                $('<td>').text(item.address_id),
                                $('<td>').text(item.start_date),
                                $('<td>').text(item.created_at),
                                $('<td>').append(
                                    $('<button>').text('Delete').addClass(
                                        'btn-sm bg-danger m-1 p-1 delete-button').click(
                                        function() {
                                            if (confirm(
                                                    "Are you sure you want to delete this record?"
                                                )) {
                                                var itemId = $(this).closest('tr').find('td:first').text(); // Get the ID of the record to delete
                                                deletedRecords.push(itemId); // Store the deleted record ID
                                                console.log("Deleted record ID: " + itemId); // Log the ID of the deleted record
                                                $(this).closest('tr').remove();
                                                // Add AJAX call to delete the record from the server here if needed
                                                $.ajax({
                                                    url: 'http://192.168.1.7/deleteMemberAddress/' +
                                                        itemId,
                                                    type: 'DELETE',
                                                    headers: {
                                                        'X-CSRF-TOKEN': $(
                                                            'meta[name="csrf-token"]'
                                                        ).attr(
                                                            'content'
                                                        ) // CSRF token needed if using web middleware
                                                    },
                                                    success: function(result) {
                                                        console.log(
                                                            "Record deleted successfully: " +
                                                            itemId);
                                                    },
                                                    error: function(jqXHR,
                                                        textStatus, errorThrown
                                                    ) {
                                                        console.log(
                                                            "Failed to delete record... " + "Status: " +
                                                            textStatus +
                                                            ", " +
                                                            errorThrown);
                                                    }
                                                });
                                            }
                                        })
                                )
                            );
                            tableBody.append(row);
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("AJAX call failed: " + textStatus + ", " + errorThrown);
                }
            });
        });
    </script> --}}

    {{-- Start script to populate they table for billing --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var paymentModal = document.getElementById('kt_modal_stacked_4');

            paymentModal.addEventListener('shown.bs.modal', function() {
                fetch('http://192.168.1.7/dependantsData') // Adjust the API endpoint as needed
                    .then(response => response.json())
                    .then(data => {
                        const tbody = document.getElementById('billingHistoryBody');
                        tbody.innerHTML = ''; // Clear existing rows
                        if (data && data.length > 0) {
                            data.forEach(payment => {
                                const row = `<tr>
                            <td>${payment.date}</td>
                            <td>${payment.description}</td>
                            <td>${payment.amount}</td>
                            <td><a href="#" target="_blank">View</a></td>
                        </tr>`;
                                tbody.innerHTML += row;
                            });
                        } else {
                            tbody.innerHTML =
                                '<tr><td colspan="4" class="text-center">No payment details available</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Error loading the payment data:', error);
                        const tbody = document.getElementById('billingHistoryBody');
                        tbody.innerHTML =
                            '<tr><td colspan="4" class="text-center">Failed to load data</td></tr>';
                    });
            });
        });
    </script>
    {{-- End script to populate they table for billing --}}
@endpush
