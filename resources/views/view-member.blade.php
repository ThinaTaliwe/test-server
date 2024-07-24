@extends('layouts.app2')

@push('styles')
    <!-- Materialize CSS CDN -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet"> --}}
    <style>
        #kt_header,
        #kt_footer {
            display: none !important;
        }
    </style>
@endpush

@section('row_content')
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-auto z-index-1">
            <div class="bg-gradient-success shadow-success border-radius-lg pt-3 pb-2">
                <div class="nav-wrapper position-relative end-0 mx-2">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-info-tab" data-bs-toggle="tab" href="#pills-info"
                                role="tab" aria-controls="info" aria-selected="true">
                                <span class="material-icons align-middle mb-1">
                                    assignment
                                </span>
                                Membership Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dependants-tab" data-bs-toggle="tab" href="#pills-dependants"
                                role="tab" aria-controls="dependants" aria-selected="false">
                                <span class="material-icons align-middle mb-1">
                                    people
                                </span>
                                Dependants
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Addresses-tab" data-bs-toggle="tab" href="#pills-Addresses"
                                role="tab" aria-controls="Addresses" aria-selected="false">
                                <span class="material-icons align-middle mb-1">
                                    business
                                </span>
                                Addresses
                            </a>
                        </li>
                        @canany(['transactions view'])
                            <li class="nav-item">
                                <a class="nav-link" id="pills-Payment-tab" data-bs-toggle="tab" href="#pills-Payment"
                                    role="tab" aria-controls="Payment" aria-selected="false">
                                    <span class="material-icons align-middle mb-1">
                                        paid
                                    </span>
                                    Payment History
                                </a>
                            </li>
                        @endcanany
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body g-3 px-4 pb-2 pt-3">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-1 mx-auto">
                                    <div class="shadow-dark border-radius-lg pt-3 pb-2">
                                        <h6 class="text-capitalize ps-3 text-center">Membership Details</h6>
                                    </div>
                                </div>
                                <div class="card-body g-3 px-4 pb-2 pt-3">
                                    <form {{ $dis }} method="POST" action="{{ route('add-member.store') }}"
                                        role="form" id="membershipForm" name="membershipForm" class="row g-3">
                                        @csrf
                                        {{-- <div class="col-md-3 mx-auto">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="PenEmpNum" id="PenEmpNum"
                                                    value="{{ old('PenEmpNum') }}"
                                                    placeholder="Pension/Force/Employee Number">
                                                <label for="PenEmpNum">Pension/Force/Employee Number</label>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 mx-auto py-2 d-flex justify-content-center align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="Male"
                                                    name="radioGender" value="M"
                                                    {{ $membership->gender_id == 'M' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="Male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" id="Female"
                                                    name="radioGender" value="F"
                                                    {{ $membership->gender_id == 'F' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="Female">Female</label>
                                            </div>
                                        </div>

                                        <div class="col d-flex justify-content-center align-items-center my-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="languageEnglish"
                                                    name="language" value="1"
                                                    {{ $membership->language_id == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="languageEnglish">English</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-3">
                                                <input class="form-check-input" type="radio" id="languageAfrikaans"
                                                    name="language" value="2"
                                                    {{ $membership->language_id == '2' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="languageAfrikaans">Afrikaans</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="Name" id="Name"
                                                    value="{{ $membership->name }}" placeholder="Name">
                                                <label for="Name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="Surname" id="Surname"
                                                    value="{{ $membership->surname }}" placeholder="Surname">
                                                <label for="Surname">Surname</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="IDNumber"
                                                    id="IDNumber" value="{{ $membership->id_number }}"
                                                    placeholder="Identity Number" maxlength="13">
                                                <label for="IDNumber">Identity Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="Email" id="Email"
                                                    value="{{ $membership->primary_e_mail_address }}" placeholder="Email">
                                                <label for="Email">Email</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="Telephone"
                                                    id="Telephone" value="{{ $membership->primary_contact_number }}"
                                                    placeholder="Telephone (Cell)" maxlength="10">
                                                <label for="Telephone">Telephone (Cell)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="WorkTelephone"
                                                    id="WorkTelephone"
                                                    value="{{ $membership->secondaty_contact_number }}"
                                                    placeholder="Telephone (Work)">
                                                <label for="WorkTelephone">Telephone (Work)</label>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div
                                                class="col-md-12 py-2 d-flex wrap w-50 mx-auto">
                                                <div class="input-group">
                                                    <input type="text" onkeypress="return isNumberKey(event)"
                                                        class="form-control" name="inputDay" id="inputDay"
                                                        value="{{ dobBreakdown($membership->person->birth_date)->day }}"
                                                        placeholder="DD" maxlength="2" size="2">
                                                    <span class="input-group-text px-2">/</span>
                                                    <input type="text" onkeypress="return isNumberKey(event)"
                                                        class="form-control" name="inputMonth" id="inputMonth"
                                                        value="{{ dobBreakdown($membership->person->birth_date)->month }}"
                                                        placeholder="MM" maxlength="2" size="2">
                                                    <span class="input-group-text px-2">/</span>
                                                    <input type="text" onkeypress="return isNumberKey(event)"
                                                        class="form-control" name="inputYear" id="inputYear"
                                                        value="{{ dobBreakdown($membership->person->birth_date)->year }}"
                                                        placeholder="YYYY" maxlength="4" size="4">
                                                </div>
                                            </div>
                                            <div class="col-md-12 py-2">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="Married"
                                                            name="marital_status" value="1"
                                                            {{ $membership->person->married_status == '1' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Married">Married</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ms-3">
                                                        <input class="form-check-input" type="radio" id="Single"
                                                            name="marital_status" value="2"
                                                            {{ $membership->person->married_status == '2' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Single">Single</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ms-3">
                                                        <input class="form-check-input" type="radio" id="Widowed"
                                                            name="marital_status" value="3"
                                                            {{ $membership->person->married_status == '3' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Widowed">Widowed</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ms-3">
                                                        <input class="form-check-input" type="radio" id="Divorced"
                                                            name="marital_status" value="4"
                                                            {{ $membership->person->married_status == '4' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Divorced">Divorced</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 w-50 mx-auto">
                                            <div class="form-floating mb-3">
                                                <select name="memtype" id="memtype" class="form-select">
                                                    <option disabled>Select Membership Type</option>
                                                    @foreach ($memtypes as $memtype)
                                                        <option
                                                            {{ $membership->bu_membership_type_id == $memtype->id ? 'selected' : '' }}
                                                            value="{{ $memtype->id }}">{{ $memtype->id }}.
                                                            {{ $memtype->name }} - {{ $memtype->description }} -
                                                            R{{ round($memtype->membership_fee, 2) }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="memtype">Select Membership Type</label>
                                            </div>
                                        </div>
                                        <div class="col-8 mx-auto">
                                            <div class="d-grid">
                                                <button type="submit" class="btn my-4 mb-4 btn-success" disabled><i
                                                        class="material-icons opacity-10 pe-2">save</i>Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-dependants" role="tabpanel" aria-labelledby="pills-dependants-tab">
                    <div class="col-sm-12 my-4">
                        <div class="card h-100 mt-4 mt-md-0">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 mx-auto">
                                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-3 pb-2">
                                    <h6 class=" text-capitalize ps-3">Dependants</h6>
                                </div>
                            </div>
                            <div class="card-body px-3 pt-4 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table table-bordered align-items-center justify-content-center mb-4"
                                        id="datatable-dependant">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">Name</th>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">ID</th>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">Gender</th>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">Relationship
                                                    </th>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">Date Of Birth
                                                </th>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">Age</th>
                                                <th class="text-uppercase text-dark text-md font-weight-bold">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dependants as $dependant)
                                                <tr>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $dependant->personDep->screen_name ?? 'N/A'  }} </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $dependant->personDep->id_number ?? 'N/A' }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $dependant->personDep->gender_id ?? 'N/A' }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $dependant->person_relationship_id ?? 'N/A' }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ substr($dependant->personDep->birth_date, 0, 10) ?? 'N/A' }}</p>
                                                    </td>
                                                    @php
                                                        $age = ageFromDOB($dependant->personDep->birth_date);
                                                    @endphp
                                                    <td
                                                        class="text-sm fw-bolder mx-auto my-1 pt-2 px-2 badge badge-sm {{ changeAgeBackground($age) }}">
                                                        {{ $age ?? 'N/A' }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-link text-danger text-gradient p-0"
                                                            href="/remove-dependant/{{ $dependant->secondary_person_id }}" disabled>
                                                            <i class="material-icons text-sm">highlight_off</i>Remove
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card mt-5 mb-2" id="add-dependant">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-dark shadow-dark border-radius-lg pt-3 pb-2">
            <h6 class="text-white text-capitalize ps-3">Add Dependant</h6>
          </div>
        </div>
        <form method="POST" id="addDependant" action="{{ route('add-dependant.store') }}" autocomplete="off">
          @csrf
          <div class="card-body pt-0 mt-4 mb-3">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="Name" id="Name" value="{{ old('Name') }}"
                    placeholder="Name">
                  <label for="Name">Name</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="Surname" id="Surname"
                    value="{{ old('Surname') }}" placeholder="Surname">
                  <label for="Surname">Surname</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="IDNumberDep" id="IDNumberDep"
                    value="{{ old('IDNumberDep') }}" placeholder="Identity Number" maxlength="13"
                    onchange="getDOBDep(this.value)">
                  <label for="IDNumberDep">Identity Number</label>
                </div>
              </div>
              <div class="col-sm-6 d-flex justify-content-center align-items-center">
                <div class="btn-group d-flex justify-content-center align-items-center">
                  <input type="radio" class="btn-check" name="radioGenderDep" id="MaleDep"
                    value="M" checked>
                  <label class="btn btn-outline-secondary" for="MaleDep">Male</label>
                  <input type="radio" class="btn-check" name="radioGenderDep" id="FemaleDep"
                    value="F">
                  <label class="btn btn-outline-secondary" for="FemaleDep">Female</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 d-flex justify-content-center align-items-center">
                <label class="form-label">Date Of Birth</label>
                <div class="input-group mx-2">
                  <input type="text" onkeypress="return isNumberKey(event)" class="form-control"
                    name="inputDayDep" id="inputDayDep" value="{{ old('inputDayDep') }}" placeholder="DD"
                    maxlength="2" size="2">
                  <span class="px-2">/</span>
                  <input type="text" onkeypress="return isNumberKey(event)" class="form-control"
                    name="inputMonthDep" id="inputMonthDep" value="{{ old('inputMonthDep') }}"
                    placeholder="MM" maxlength="2" size="2">
                  <span class="px-2">/</span>
                  <input type="text" onkeypress="return isNumberKey(event)" class="form-control"
                    name="inputYearDep" id="inputYearDep" value="{{ old('inputYearDep') }}"
                    placeholder="YYYY" maxlength="4" size="4">
                </div>
                <input hidden type="text" class="form-control" name="mainMemberId" id="mainMemberId"
                  value="{{ $membership->person_id }}">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="btn-group">
                  <input type="radio" class="btn-check" name="radioRelationCode" id="Spouse" value="1"
                    checked>
                  <label class="btn btn-outline-secondary" for="Spouse">1 - Wife / Husband</label>
                  <input type="radio" class="btn-check" name="radioRelationCode" id="Child" value="2">
                  <label class="btn btn-outline-secondary" for="Child">2 - Child</label>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-6 mx-auto">
                <div class="d-grid">
                  <button type="submit" class="btn btn-success my-4 mb-4"><i
                      class="material-icons opacity-10">add</i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div> --}}

                </div>
                <div class="tab-pane fade" id="pills-Addresses" role="tabpanel" aria-labelledby="pills-Addresses-tab">
                            <div class="card">
                                <div class="card-header pb-0 px-3 mx-auto">
                                    <h6 class="mb-0 text-center">Addresses</h6>
                                </div>
                                <div class="card-body pt-4 p-3">
                                    <div class="row">
                                        @foreach ($addresses as $address)
                                            
                                            <div class="list-group-item border-0 d-flex p-4 bg-gray-100 border-radius-lg col-6 my-1">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-3 text-sm">Home</h6>
                                                    <span class="mb-2 text-xs">Address Line 1: <span
                                                            class="text-dark font-weight-bold ms-sm-2">{{ $address->line1 }}</span></span>
                                                    <span class="mb-2 text-xs">Town/Suburb: <span
                                                            class="text-dark ms-sm-2 font-weight-bold">{{ $address->suburb }}</span></span>
                                                    <span class="mb-2 text-xs">City: <span
                                                            class="text-dark ms-sm-2 font-weight-bold">{{ $address->city }}</span></span>
                                                    <span class="mb-2 text-xs">Province: <span
                                                            class="text-dark ms-sm-2 font-weight-bold">{{ $address->province }}</span></span>
                                                    <span class="text-xs">Postal Code: <span
                                                            class="text-dark ms-sm-2 font-weight-bold">{{ $address->ZIP }}</span></span>
                                                </div>
                                                <div class="ms-auto text-end">
                                                    <a class="btn btn-link text-success text-gradient px-3 mb-0"
                                                        href="#"><i
                                                            class="material-icons text-sm me-2">location_on</i>View On
                                                        Map</a>
                                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                        href="#"><i
                                                            class="material-icons text-sm me-2">delete</i>Delete</a>
                                                </div> 
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <!-- Materialize JS and Initialization -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script> --}}



    <!-- Google maps auto-complete form -->
    <script>
        "use strict";
        Object.defineProperty(exports, "__esModule", {
            value: true
        });
        var autocomplete;
        var address1Field;
        var address2Field;
        var postalField;

        function initAutocomplete() {
            address1Field = document.getElementById("Line1");
            address2Field = document.getElementById("Line2");
            postalField = document.getElementById("PostalCode");
            // Create the autocomplete object, restricting the search predictions to
            // addresses in the US and Canada.
            autocomplete = new google.maps.places.Autocomplete(address1Field, {
                componentRestrictions: {
                    country: ["za"]
                },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });
            address1Field.focus();
            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            var address1 = "";
            var postcode = "";
            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            // place.address_components are google.maps.GeocoderAddressComponent objects
            // which are documented at http://goo.gle/3l5i5Mr
            for (const component of place.address_components) {
                // @ts-ignore remove once typings fixed
                const componentType = component.types[0];

                // alert(componentType);

                switch (componentType) {
                    case "street_number": {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                    case "route": {
                        address1 += component.short_name;
                        break;
                    }

                    case "postal_code": {
                        postcode = component.long_name;

                        break;
                    }

                    case "postal_code_suffix": {
                        postcode = component.long_name;
                        break;
                    }
                    case "locality": {
                        document.getElementById("City").value = component.long_name;
                        break;
                    }
                    case "sublocality_level_1": {
                        document.getElementById("TownSuburb").value = component.long_name;
                        break;
                    }
                    case "administrative_area_level_1": {
                        document.getElementById("Province").value = component.long_name;
                        break;
                    }
                    case "administrative_area_level_2": {
                        document.getElementById("Line2").value = component.long_name;
                        break;
                    }
                    case "country":
                        document.getElementById("Country").value = component.long_name.toUpperCase();
                        break;
                }
            }

            address1Field.value = address1;
            document.getElementById("PostalCode").value = postcode;

            // After filling the form with address components from the Autocomplete
            // prediction, set cursor focus on the second address line to encourage
            // entry of subpremise information such as apartment, unit, or floor number.
            address2Field.focus();
        }
        window.initAutocomplete = initAutocomplete;
    </script>

    <!-- Google maps auto-complete form -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF1KOXQsWQgBsFdgoKlPAa38CS0nTzAmM&libraries=places&callback=initAutocomplete">
    </script>
    {{--
  //This is for the member form - original
  <script>
    function getDOB(IDNumber) {
      var Year = IDNumber.substring(0, 2);
      var Month = IDNumber.substring(2, 4);
      var Day = IDNumber.substring(4, 6);
  
      var cutoff = (new Date()).getFullYear() - 2000;
  
      var Y = (Year > cutoff ? '19' : '20') + Year;
  
  
      document.getElementById("inputYear").value += Y;
      document.getElementById("inputMonth").value += Month;
      document.getElementById("inputDay").value += Day;
  
    }
  
  </script> --}}


    {{-- This is for the member form - Test --}}
    <script>
        function getDOB(IDNumber) {

            // first clear any left over error messages
            $('#error span').remove();
            //This clears the red x mark
            document.getElementById("IDNumber").classList.remove('is-invalid');
            document.getElementById("inputYearDiv").classList.remove('is-invalid');
            document.getElementById("inputMonthDiv").classList.remove('is-invalid');
            document.getElementById("inputDayDiv").classList.remove('is-invalid');

            //This clears the green checkmark
            document.getElementById("IDNumber").classList.remove('is-valid');
            document.getElementById("inputYearDiv").classList.remove('is-valid');
            document.getElementById("inputMonthDiv").classList.remove('is-valid');
            document.getElementById("inputDayDiv").classList.remove('is-valid');



            // store the error div, to save typing
            var error = $('#error');

            // assume everything is correct and if it later turns out not to be, just set this to false
            var correct = true;

            // SA ID Number have to be 13 digits, so check the length
            if (IDNumber.length != 13 || !isNumber(IDNumber)) {
                error.append('<p>SA ID number does not appear to be authentic - input not a valid number</p>');
                correct = false;
            }
            // get first 6 digits as a valid date
            var tempDate = new Date(IDNumber.substring(0, 2), IDNumber.substring(2, 4) - 1, IDNumber.substring(4, 6));



            var id_date = tempDate.getDate();
            var id_month = tempDate.getMonth();
            var id_year = tempDate.getFullYear();

            var Year = IDNumber.substring(0, 2);

            var cutoff = (new Date()).getFullYear() - 2000;

            var Y = (Year > cutoff ? '19' : '20') + Year;



            var fullDate = id_date + "-" + (id_month + 1) + "-" + id_year;

            if (!((tempDate.getYear() == IDNumber.substring(0, 2)) && (id_month == IDNumber.substring(2, 4) - 1) && (
                    id_date == IDNumber.substring(4, 6)))) {
                error.append('<p>SA ID number does not appear to be authentic - date part not valid</p>');
                correct = false;
            }



            // if no error found, hide the error message
            if (correct) {
                error.css('display', 'none');




                //This adds the green checkmark
                document.getElementById("IDNumber").classList.add('is-valid');
                document.getElementById("inputYearDiv").classList.add('is-valid');
                document.getElementById("inputMonthDiv").classList.add('is-valid');
                document.getElementById("inputDayDiv").classList.add('is-valid');

                // and put together a result message
                document.getElementById("inputYear").value += Y;
                document.getElementById("inputMonth").value += (id_month + 1);
                document.getElementById("inputDay").value += id_date;
            }
            // otherwise, show the error
            else {
                error.css('display', 'block');

                //This adds the green checkmark
                document.getElementById("IDNumber").classList.add('is-invalid');
                document.getElementById("inputYearDiv").classList.add('is-invalid');
                document.getElementById("inputMonthDiv").classList.add('is-invalid');
                document.getElementById("inputDayDiv").classList.add('is-invalid');
            }

            return false;


        }

        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
    </script>
@endpush
