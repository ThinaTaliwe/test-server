@extends('layouts.app2')

@push('styles')
<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
@endpush

@section('row_content')
						<!--begin::Card-->
						<div class="card">
							<!--begin::Card body-->
							<div class="card-body">
															<!--begin::Stepper-->
							<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
									<!--begin::Nav-->
										  <div class="multisteps-form__progress stepper-nav mb-5">
											<button class="multisteps-form__progress-btn js-active text-primary" type="button" title="Personal Info">
												<i class="bi bi-people-fill" style="font-size: 1.2rem"></i> Membership
											</button>
											<button class="multisteps-form__progress-btn text-primary" type="button" title="Address">
												<i class="bi bi-person-fill"style="font-size: 1.2rem"></i> Dependants</button>
											<button class="multisteps-form__progress-btn text-primary" type="button" title="Contact Info">
												<i class="bi bi-house-fill"style="font-size: 1.2rem"></i> Addresses</button>
											<button class="multisteps-form__progress-btn text-primary" type="button" title="Membership Type">
												<i class="bi bi-currency-exchange"style="font-size: 1.2rem"></i> Payment History</button>
										  </div>	
									<!--end::Nav-->
									<!--begin::Form-->
	
									<div class="card-body">
										<form method="POST" action="{{ route('add-member.store') }}" class="multisteps-form__form" autocomplete="off">
										  @csrf							  
										  <div class="multisteps-form__panel border-radius-xl bg-bs-color js-active" data-animation="FadeIn">
	
											<div class="pb-10 pb-lg-15">
												<!--begin::Title-->
												<h2 class="fw-bold d-flex align-items-center text-dark">Membership Details
												<!-- <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ"> -->
													<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
													</i>
												</span></h2>
																								  <!--   <div class="form-check form-switch d-flex align-items-center mb-3">
												  <input class="form-check-input" type="checkbox" id="EngAfr" checked>
												  <label class="form-check-label mb-0 ms-3" for="EngAfr">English/Afrikaans</label>
												</div> -->
												<!--end::Title-->
												<!--begin::Notice-->
												<div class="text-muted fw-semibold fs-6">Mandatory information</div>
												<!--end::Notice-->
											</div>
											<div class="multisteps-form__content">				  
												<div class="card-body g-3 px-4 pb-2 pt-3">
							  
							  
													<fieldset {{ $dis }} role="form"
													  id="membershipForm" name="membershipForm" class="row g-3 ">
													  @csrf
								
													  <!-- <div class="col-md-3 mx-auto">
														<div class="input-group input-group-outline   mt-3 mb-0">
								
														  <input type="text" class="form-control" name="PenEmpNum" id="PenEmpNum"
															value="{{ old('PenEmpNum') }}" placeholder="Pension/Force/Employee Number">
														</div>
														{{-- @error('PenEmpNum')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div> -->
													  <div
														class="form-check  form-switch col d-flex justify-content-center align-items-center mt-5 mb-0">
														<!-- <label class="form-check-label mb-0 me-2" for="language">Language:</label>
														<label class="form-check-label mb-0 me-6" for="language">English</label>
														<input class="form-check-input" type="checkbox" id="language" name="language" {{
														  ($membership->language_id=="2")? "checked" : "" }}>
														<label class="form-check-label mb-0 ms-3" for="language">Afrikaans</label>
														<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
  <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>

</div> -->
<div class="btn-group rounded" role="group" aria-label="Language selection">
    <input type="radio" class="btn-check" name="language" id="btnradio1" autocomplete="off" {{ ($membership->language_id=="1")? "checked" : "" }}>
    <label class="btn btn-outline-primary" for="btnradio1">English</label>

    <input type="radio" class="btn-check" name="language" id="btnradio2" autocomplete="off" {{ ($membership->language_id=="2")? "checked" : "" }}>
    <label class="btn btn-outline-primary" for="btnradio2">Afrikaans</label>
</div>

													  </div>

								
													  <hr class="dark horizontal mt-2 mb-0">
								
													  <div class="col-md-6">
														<div class="input-group input-group-outline  mt-3 mb-0">
								
														  <input type="text" class="form-control" name="Name" id="Name"
															value="{{$membership->name}}" placeholder="Name">
														</div>
														{{-- @error('Name')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div>
													  <div class="col-md-6">
														<div class="input-group input-group-outline  mt-3 mb-0">
								
														  <input type="text" class="form-control" name="Surname" id="Surname"
															value="{{ $membership->surname }}" placeholder="Surname">
														</div>
														{{-- @error('Surname')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div>
													  <div class="col-md-6">
														<div class="input-group input-group-outline   mt-3 mb-0">
								
														  <input type="text" class="form-control" name="IDNumber" id="IDNumber"
															value="{{ $membership->id_number }}" placeholder="Identity Number" maxlength="13"
															size="13">
														</div>
														{{-- @error('IDNumber')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div>
								
													  <div class="col-md-6 mx-auto py-2">
														<div class="btn-group  col d-flex justify-content-center align-items-center mx-auto">
								
														  <input type="radio" class="btn-check form-check-input" name="radioGender" id="Male"
															value="M" {{ ($membership->gender_id=="M")? "checked" : "" }} />
														  <label class="btn btn-secondary" for="Male">Male</label>
								
														  <input type="radio" class="btn-check form-check-input" name="radioGender" id="Female"
															value="F" {{ ($membership->gender_id=="F")? "checked" : "" }} />
														  <label class="btn btn-secondary" for="Female">Female</label>
								
														</div>
													  </div>
								
													  <hr class="dark horizontal mt-2 mb-0">
								
								
								
								
								
													  <div class="col-md-6">
														<div class="input-group input-group-outline   mt-3 mb-0">
								
														  <input type="number" class="form-control" name="Telephone" id="Telephone"
															value="{{ $membership->primary_contact_number }}" placeholder="Telephone (Cell)"
															maxlength="10">
														</div>
														{{-- @error('Telephone')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div>
													  <div class="col-md-6">
														<div class="input-group input-group-outline   mt-3 mb-0">
								
														  <input type="number" class="form-control" name="WorkTelephone" id="WorkTelephone"
															value="{{ $membership->secondaty_contact_number }}" placeholder="Telephone (Work)">
														</div>
														{{-- @error('WorkTelephone')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div>
								
													  <div class="col-md-8 mx-auto">
														<div class="input-group input-group-outline   mt-3 mb-0">
								
														  <input type="email" class="form-control" name="Email" id="Email"
															value="{{ $membership->primary_e_mail_address}}" placeholder="Email">
														</div>
														{{-- @error('Email')
														<span class="invalid-feedback" role="alert">
														  <strong>{{ $message }}</strong>
														</span>
														@enderror --}}
													  </div>
								
													  <div class="row col-md-12">
								
														<div
														  class="col-md-6 py-2  pt-4  col d-flex justify-content-center align-items-center mx-auto">
														  <!-- <div style="white-space:nowrap;" class="px-4">
															 <label for="inputAddress" class="form-label">Date Of Birth</label>
								
														  </div> -->
														  <div class="input-group input-group-outline ">
								
															<input type="text" onkeypress="return isNumberKey(event)" class="form-control"
															  name="inputDay" id="inputDay"
															  value="{{ dobBreakdown($membership->person->birth_date)->day }}" placeholder="DD"
															  maxlength="2" size="2">
															{{-- @error('inputDay')
															<span class="invalid-feedback" role="alert">
															  <strong>{{ $message }}</strong>
															</span>
															@enderror --}}
														  </div>
														  <span class="px-2">/</span>
														  <div class="input-group input-group-outline ">
								
															<input type="text" onkeypress="return isNumberKey(event)" class="form-control"
															  name="inputMonth" id="inputMonth"
															  value="{{ dobBreakdown($membership->person->birth_date)->month }}" placeholder="MM"
															  maxlength="2" size="2">
															{{-- @error('inputMonth')
															<span class="invalid-feedback" role="alert">
															  <strong>{{ $message }}</strong>
															</span>
															@enderror --}}
														  </div>
														  <span class="px-2">/</span>
														  <div class="input-group input-group-outline ">
								
															<input type="text" onkeypress="return isNumberKey(event)" class="form-control"
															  name="inputYear" id="inputYear"
															  value="{{ dobBreakdown($membership->person->birth_date)->year }}" placeholder="YYYY"
															  maxlength="4" size="4">
															{{-- @error('inputYear')
															<span class="invalid-feedback" role="alert">
															  <strong>{{ $message }}</strong>
															</span>
															@enderror --}}
														  </div>
								
								
								
														</div>
								
														<div class="col-md-6 py-2 ">
														  <div class="btn-group  col d-flex justify-content-center align-items-center mx-auto" style="padding-top: 1.5rem;">
								
															<input type="radio" class="btn-check form-check-input" name="marital_status"
															  id="Married" value="1" {{ ($membership->person->married_status=="1")? "checked" : ""
															}} />
															<label class="btn btn-secondary" for="Married">Married</label>
								
															<input type="radio" class="btn-check form-check-input" name="marital_status"
															  id="Single" value="2" {{ ($membership->person->married_status=="2")? "checked" : ""
															}}/>
															<label class="btn btn-secondary" for="Single">Single</label>
								
															<input type="radio" class="btn-check form-check-input" name="marital_status"
															  id="Widowed" value="3" {{ ($membership->person->married_status=="3")? "checked" : ""
															}}/>
															<label class="btn btn-secondary" for="Widowed">Widowed</label>
								
															<input type="radio" class="btn-check form-check-input" name="marital_status"
															  id="Divorced" value="4" {{ ($membership->person->married_status=="4")? "checked" :
															"" }}/>
															<label class="btn btn-secondary" for="Divorced">Divorced</label>
														  </div>
														</div>								
													  </div>
								
													  <hr class="dark horizontal mt-2 mb-0">

													  <div class="col-md-12">
														<div class="dropdown">
														  <select name="memtype" id="memtype"
															class="btn bg-gradient-secondary dropdown-toggle w-100 my-4 @error('Select Membership Type') is-invalid @enderror"
															aria-label="Select Membership Type">
															<option disabled>Select Membership Type</span> </option>
															@foreach ($memtypes as $memtype)
								
															<option {{$membership->bu_membership_type_id == $memtype->id ? 'selected' : ''}}
															  value="{{ $memtype->id }}">{{ $memtype->id }}. {{ $memtype->name }} - {{
															  $memtype->description }} - R{{ round($memtype->membership_fee,2) }}</option>
								
															@endforeach
														  </select>
														</div>
													  </div>
											
													  <div class="col-8 mx-auto">
														<div class="text-center  d-flex justify-content-center align-items-center ">
														  <x-button type="submit" text="Update" class="btn bg-gradient-success w-100 my-4 mb-4" id="btnUpdate"><i
															  class="material-icons opacity-10 pe-2">save</i>Update</x-button>
														</div>
													  </div>
								
													</fieldset>
												</div>
												<div class="button-row d-flex mt-4">
													<x-button text="Next" id="btnNext" class="btn bg-primary ms-auto mb-0 js-btn-next" type="button" title="Next">Next</x-button>
												</div>
											</div>

										  </div>
										  
										  <div class="multisteps-form__panel border-radius-xl bg-bs-color" data-animation="FadeIn">
											<div class="pb-10 pb-lg-15">
												<!--begin::Title-->
												<h2 class="fw-bold d-flex align-items-center text-dark">Dependants
												<!-- <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ"> -->
													<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
													</i>
												</span></h2>
												<!--end::Title-->
												<!--begin::Notice-->
												<div class="text-muted fw-semibold fs-6">Tell us where you live</div>
												<!--end::Notice-->
											</div>										
											<div class="multisteps-form__content">
												<div class="card-body px-3 pt-4 pb-2">
													<div class="table-responsive p-0">
													  <table class="table table-flush align-items-center justify-content-center  mb-4"
														id="datatable-dependant">
														<thead>
														  <tr>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
															  Name</th>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID
															</th>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
															  Gender</th>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
															  Relationship Code</th>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
															  Date Of Birth</th>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age
															</th>
															<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
															</th>
														  </tr>
														</thead>
														<tbody>
														  @foreach ($dependants as $dependant )
								  
														  <tr>
															<td>
								  
															  <p class="text-sm font-weight-normal mb-0">{{$dependant->personDep->screen_name}}</p>
															</td>
															<td>
															  <p class="text-sm font-weight-normal mb-0">{{$dependant->personDep->id_number}}</p>
															</td>
															<td>
															  <p class="text-sm font-weight-normal mb-0">{{$dependant->personDep->gender_id }}</p>
															</td>
															<td>
															  <p class="text-sm font-weight-normal mb-0">{{$dependant->person_relationship_id}}</p>
															</td>
															<td>
															  <p class="text-sm font-weight-normal mb-0">
																{{substr($dependant->personDep->birth_date,0,10)}}</p>
															</td>
															@php
															$age = ageFromDOB($dependant->personDep->birth_date);
															@endphp
															<td
															  class="text-sm fw-bolder my-1 pt-2 px-2 badge badge-sm {{ changeAgeBackground($age) }}">
															  {{$age}}
															</td>
															<td>
															  <a class="btn btn-link text-danger text-gradient mx-3 mb-0"
																href="/remove-dependant/{{ $dependant->secondary_person_id }}"><i
																  class="material-icons text-sm me-2">highlight_off</i>Remove</a>
															</td>
														  </tr>
								  
														  @endforeach
								  
														</tbody>
													  </table>
													</div>
												  </div>
												<!-- Add Dependant Block -->							
												<div class="card mt-5 mb-2" id="add-dependant">
													<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
													<div class="shadow-dark border-radius-lg pt-3 pb-2">
														<h6 class="text-white text-capitalize ps-3">Add Dependant</h6>
													</div>
													</div>
													<fieldset  id="addDependant" action="{{ route('add-dependant.store') }}"
													autocomplete="off">
													@csrf
													<div class="card-body pt-0 mt-4 mb-3">
														<div class="row">
														<div class="col-6 col-sm-6">
															<div
															class="input-group input-group-outline  @error('Name') is-invalid focused is-focused  @enderror mt-3 mb-0">
									
															<input type="text" class="form-control" name="Name" id="Name" value="{{ old('Name') }}"
																placeholder="Name">
															</div>
															@error('DepName')
															<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
														<div class="col-12 col-sm-6">
															<div
															class="input-group input-group-outline  @error('Surname') is-invalid focused is-focused  @enderror mt-3 mb-0">
									
															<input type="text" class="form-control" name="Surname" id="Surname"
																value="{{ old('Surname') }}" placeholder="Surname">
															</div>
															@error('DepSurname')
															<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
														</div>
									
														<div class="row mt-3">
														<div class="col-6 col-sm-6">
															<div id="IDNumberDepDiv"
															class="input-group input-group-outline  @error('IDNumberDep') is-invalid focused is-focused  @enderror mt-3 mb-0">
									
															<input type="text" class="form-control" name="IDNumberDep" id="IDNumberDep"
																value="{{ old('IDNumberDep') }}" placeholder="Identity Number" maxlength="13" size="13"
																onchange="getDOBDep(this.value)">
															</div>
															<span class="invalid-feedback" role="alert" id="error"></span>
															@error('IDNumberDep')
															<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
														<div class="col-6 col-sm-6 pt-3 mt-sm-0" style=" margin-top: 25px;">
															<div class="btn-group  col d-flex justify-content-center align-items-center mx-auto">
									
															<input type="radio" class="btn-check form-check-input" name="radioGenderDep" id="MaleDep"
																value="M" checked />
															<label class="btn btn-secondary" for="MaleDep">Male</label>
									
															<input type="radio" class="btn-check form-check-input" name="radioGenderDep"
																id="FemaleDep" value="F" />
															<label class="btn btn-secondary" for="FemaleDep">Female</label>
									
															</div>
														</div>
														</div>
									
														<div class="row mt-0">
														<div class="col-12 col-sm-6">
															<div class=" py-2  pt-4  col d-flex justify-content-center align-items-center mx-auto">
															<div style="white-space:nowrap;" class="px-4">
																<label class="form-label">Date Of Birth</label>
									
															</div>
															<div id="inputDayDepDiv"
																class="input-group input-group-outline @error('inputDayDep') is-invalid @enderror">
									
																<input type="text" onkeypress="return isNumberKey(event)" class="form-control"
																name="inputDayDep" id="inputDayDep" value="{{ old('inputDayDep') }}" placeholder="DD"
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
									
																<input type="text" onkeypress="return isNumberKey(event)" class="form-control"
																name="inputMonthDep" id="inputMonthDep" value="{{ old('inputMonthDep') }}"
																placeholder="MM" maxlength="2" size="2">
																@error('inputMonthDep')
																<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
															<span class="px-2">/</span>
															<div id="inputYearDepDiv"
																class="input-group input-group-outline @error('inputYearDep') is-invalid @enderror">
									
																<input type="text" onkeypress="return isNumberKey(event)" class="form-control"
																name="inputYearDep" id="inputYearDep" value="{{ old('inputYearDep') }}"
																placeholder="YYYY" maxlength="4" size="4">
																@error('inputYearDep')
																<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
																</span>
																@enderror
															</div>
									
															<input hidden type="text" class="form-control" name="mainMemberId" id="mainMemberId"
																value="{{ $membership->person_id }}">
									
									
									
															</div>
														</div>
									
														<div class="col-6" style=" margin-top: 25px;">
															<div class="btn-group  col d-flex justify-content-center align-items-center mx-auto">
									
															<input type="radio" class="btn-check form-check-input" name="radioRelationCode"
																id="Spouse" value="1" checked />
															<label class="btn btn-secondary" for="Spouse">1 - Wife / Husband</label>
									
															<input type="radio" class="btn-check form-check-input" name="radioRelationCode" id="Child"
																value="2" />
															<label class="btn btn-secondary" for="Child">2 - Child</label>
									
															</div>
														</div>
									
														</div>
														<div class="row mt-4">
														<div class="col-6 mx-auto">
															<div class="text-center  d-flex justify-content-center align-items-center ">
															<x-button id="btnAdd" text="Add" type="submit" class="bg-gradient-success w-100 my-4 mb-4"><i
																class="material-icons opacity-10">add</i> Add</x-button>
															</div>
														</div>
														</div>
									
													</div>
									
													</fieldset>
									
												</div>
												<!-- End Add Dependant Block -->
												</div>
												<div class="button-row d-flex mt-4">
												<x-button id="btnPrev" class="bg-primary mb-0 js-btn-prev" type="button" title="Prev" text="Prev">Prev</x-button>
												<x-button id="btnNext" class="bg-primary ms-auto mb-0 js-btn-next" type="button" title="Next" text="Next">Next</x-button>
												</div>
										  </div>
							  
										  <div class="multisteps-form__panel border-radius-xl bg-bs-color" data-animation="FadeIn">
											<div class="pb-10 pb-lg-15">
												<!--begin::Title-->
												<h2 class="fw-bold d-flex align-items-center text-dark">Addresses
												<!-- <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ"> -->
													<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
													</i>
												</span></h2>
												<!--end::Title-->
												<!--begin::Notice-->
												<div class="text-muted fw-semibold fs-6">Please provide at least one</div>
												<!--end::Notice-->
											</div>										
											<div class="multisteps-form__content">
												<div class="row mt-4 mb-4">
													<div class="col-lg-7 col-12">
													  <div class="card">
														<div class="card-header pb-0 px-3">
														  <h6 class="mb-0"></h6>
														</div>
														
												<div class="card-body pt-4 p-3">
													<ul class="list-group">
								
								
								
													  @foreach ($addresses as $address)
								
													  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
														<div class="d-flex flex-column">
														  <h6 class="mb-3 text-sm">Home</h6>
														  <span class="mb-2 text-xs">Address Line 1: <span
															  class="text-dark font-weight-bold ms-sm-2">{{ $address->line1 }}</span></span>
														  <span class="mb-2 text-xs">Town/Suburb: <span
															  class="text-dark ms-sm-2 font-weight-bold">{{ $address->suburb }}</span></span>
														  <span class="mb-2 text-xs">City: <span class="text-dark ms-sm-2 font-weight-bold">{{
															  $address->city }}</span></span>
														  <span class="mb-2 text-xs">Province: <span class="text-dark ms-sm-2 font-weight-bold">{{
															  $address->province }}</span></span>
														  <span class="text-xs">Postal Code: <span class="text-dark ms-sm-2 font-weight-bold">{{
															  $address->ZIP }}</span></span>
								
														</div>
														<div class="ms-auto text-end">
														  <a class="btn btn-link text-success text-gradient px-3 mb-0" href="#"><i
															  class="material-icons text-sm me-2">location_on</i>View On Map</a>
														  <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#"><i
															  class="material-icons text-sm me-2">delete</i>Delete</a>
														</div>
													  </li>
													  @endforeach
								
								
													</ul>
												  </div>
													  </div>
													</div>
													<div class="col-lg-5 col-12 mt-md-0 mt-4">
														<div class="card h-100 mb-4">
														  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
															<div class=" shadow-dark border-radius-lg pt-3 pb-2">
															  <h6 class="text-white text-capitalize ps-3"><i
																  class="material-icons me-2 text-lg"></i>Add Address</h6>
															</div>
														  </div>
														  <!-- {{-- <fieldset  id="addAddress" action="{{ route('address.store') }}"
															autocomplete="off"> --}} -->
															@csrf
															<div class="card-body pt-4 p-3">
										
										
										
										
															  <div class="row mt-3">
																<div class="col">
																  <div
																	class="input-group input-group-outline  @error('Line1') is-invalid focused is-focused  @enderror  mb-0">
										
																	<input type="text" class="form-control" name="Line1" id="Line1"
																	  value="{{ old('Line1') }}">
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
										
																	<input type="text" class="form-control" name="Line2" id="Line2"
																	  value="{{ old('Line2') }}" placeholder="Address Line 2">
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
										
																	<input type="text" class="form-control" name="TownSuburb" id="TownSuburb"
																	  value="{{ old('TownSuburb') }}" placeholder="Town/Suburb">
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
										
																	<input type="text" class="form-control" name="City" id="City"
																	  value="{{ old('City') }}" placeholder="City">
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
										
																	<input type="text" class="form-control" name="Province" id="Province"
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
										
																	<input type="text" class="form-control" name="PostalCode" id="PostalCode"
																	  value="{{ old('PostalCode') }}" placeholder="Postal Code">
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
										
																	<input type="text" class="form-control" name="Country" id="Country"
																	  value="{{ old('Province') }}" placeholder="Country">
																  </div>
																  @error('Country')
																  <span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																  </span>
																  @enderror
																</div>
										
															  </div>
															  <div class="button-row d-flex mt-4">
										
																<x-button id="btnAddAddr" class="btn bg-gradient-success mx-auto mb-0 w-100" type="button"
																  title="Add New Address" text="Add">Add</x-button>
															  </div>
															</div>
														  <!-- </fieldset> -->
														</div>
													  </div>
												</div>

											  <div class="row">
												<div class="button-row d-flex mt-4 col-12">
												  <x-button id="btnPrev" class="bg-primary mb-0 js-btn-prev" type="button" title="Prev" text="Prev">Prev</x-button>
												  <x-button id="btnNext" class="bg-primary ms-auto mb-0 js-btn-next" type="button" title="Next" text="Next">Next</x-button>
												</div>
											  </div>
											</div>
										  </div>

										  <div class="multisteps-form__panel border-radius-xl bg-bs-color h-100" data-animation="FadeIn">
											<h5 class="font-weight-bolder mb-0"></h5>
											<p class="mb-0 text-sm"></p>
											<div class="pb-10 pb-lg-15">
												<!--begin::Title-->
												<h2 class="fw-bold d-flex align-items-center text-dark">Payment History
												<!-- <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ"> -->
													<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
													</i>
												</span></h2>
												<!--end::Title-->
												<!--begin::Notice-->
												<div class="text-muted fw-semibold fs-6">See all your payment details.</div>
												<!--end::Notice-->
											</div>										
											<div class="multisteps-form__content mt-3">
											  <div class="button-row d-flex mt-4">
												<x-button id="btnPrev" class="bg-primary mb-0 js-btn-prev" type="button" title="Prev" text="Prev">Prev</x-button>
											  </div>
											</div>
										  </div>
										</form>
									  </div>
									<!--end::Form-->
								</div>
								<!--end::Stepper-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->
@endsection




