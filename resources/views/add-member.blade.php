@extends('layouts.app2')

@push('styles')
<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"> -->
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
										  Personal Info
										</button>
										<button class="multisteps-form__progress-btn text-primary" type="button" title="Address">Address</button>
										<button class="multisteps-form__progress-btn text-primary" type="button" title="Contact Info">Contact Info</button>
										<button class="multisteps-form__progress-btn text-primary" type="button" title="Membership Type">Membership Type</button>
									  </div>
									  <!-- <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
										<li class="nav-item" role="presentation">
										  <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
										</li>
										<li class="nav-item" role="presentation">
										  <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Profile</button>
										</li>
										<li class="nav-item" role="presentation">
										  <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
										  </li>
									  </ul> -->
									
								<!--end::Nav-->
								<!--begin::Form-->




								<div class="card-body">
									<form method="POST" action="{{ route('add-member.store') }}" class="multisteps-form__form" autocomplete="off">
									  @csrf
						  
									  <div class="multisteps-form__panel border-radius-xl bg-bs-color js-active" data-animation="FadeIn">

										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bold d-flex align-items-center text-dark">Personal Info
											<!-- <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ"> -->
												<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</span></h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-semibold fs-6">Mandatory information</div>
											<!--end::Notice-->
										</div>
										<div class="multisteps-form__content">
											
						  
										  <div class="row mt-3">

											<div class="col-12 col-sm-6 mx-auto pe-7 mt-sm-0 ">
												<div class="form-check form-switch col d-flex justify-content-center align-items-center mt-5 mb-0">
													<div class="btn-group rounded" role="group" aria-label="Language selection">
														<input type="radio" class="btn-check" name="language" id="btnradio1" autocomplete="off">
														<label class="btn btn-outline-primary" for="btnradio1">English</label>
													
														<input type="radio" class="btn-check" name="language" id="btnradio2" autocomplete="off">
														<label class="btn btn-outline-primary" for="btnradio2">Afrikaans</label>
													</div>
		
												  </div>
											</div>
										  </div>
										  <div class="row mt-3">
											<div class="col-12 col-sm-6">
											  <div
												class="input-group input-group-outline  @error('Name') is-invalid focused is-focused  @enderror mt-3 mb-0">
						  
												<input type="text" class="multisteps-form__input form-control" name="Name" id="Name"
												  value="{{ old('Name') }}" placeholder="Name">
											  </div>
											  @error('Name')
											  <span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											  </span>
											  @enderror
											</div>
											<div class="col-12 col-sm-6 mt-3 mt-sm-0">
											  <div
												class="input-group input-group-outline  @error('Surname') is-invalid focused is-focused  @enderror mt-3 mb-0">
						  
												<input type="text" class="multisteps-form__input form-control" name="Surname" id="Surname"
												  value="{{ old('Surname') }}" placeholder="Surname">
											  </div>
											  @error('Surname')
											  <span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											  </span>
											  @enderror
											</div>
										  </div>
										  <div class="row mt-3">
											<div class="col-12 col-sm-6">
											  <div id="IDNumber"
												class="input-group input-group-outline  @error('IDNumber') is-invalid focused is-focused  @enderror mt-3 mb-0">
						  
												<input type="text" class="multisteps-form__input form-control" name="IDNumber" id="IDNumber"
												  value="{{ old('IDNumber') }}" placeholder="Identity Number" maxlength="13" size="13"
												  onchange="getDOB(this.value)">
											  </div>
											  <span class="invalid-feedback" role="alert" id="error"></span>
											  @error('IDNumber')
											  <span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											  </span>
											  @enderror
											</div>
											
											<div class="col-12 col-sm-6" style="
											padding-top: 0.18rem;
										">
												<div class="py-2 col d-flex justify-content-center align-items-center mx-auto">
												  <!-- <div style="white-space:nowrap;" class="px-4">
													 <label class="form-label">Date Of Birth</label>
							
												  </div> -->
												  <div id="inputDayDiv"
													class="input-group input-group-outline @error('inputDay') is-invalid @enderror">
							
													<input type="text" onkeypress="return isNumberKey(event)"
													  class="multisteps-form__input form-control" name="inputDay" id="inputDay"
													  value="{{ old('inputDay') }}" placeholder="DD" maxlength="2" size="2">
													@error('inputDay')
													<span class="invalid-feedback" role="alert">
													  <strong>{{ $message }}</strong>
													</span>
													@enderror
												  </div>
												  <span class="px-2">/</span>
												  <div id="inputMonthDiv"
													class="input-group input-group-outline @error('inputMonth') is-invalid @enderror">
							
													<input type="text" onkeypress="return isNumberKey(event)"
													  class="multisteps-form__input form-control" name="inputMonth" id="inputMonth"
													  value="{{ old('inputMonth') }}" placeholder="MM" maxlength="2" size="2">
							
												  </div>
												  @error('inputMonth')
												  <span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												  </span>
												  @enderror
												  <span class="px-2">/</span>
												  <div id="inputYearDiv"
													class="input-group input-group-outline @error('inputYear') is-invalid @enderror">
							
													<input type="text" onkeypress="return isNumberKey(event)"
													  class="multisteps-form__input form-control" name="inputYear" id="inputYear"
													  value="{{ old('inputYear') }}" placeholder="YYYY" maxlength="4" size="4">
													@error('inputYear')
													<span class="invalid-feedback" role="alert">
													  <strong>{{ $message }}</strong>
													</span>
													@enderror
												  </div>
												</div>
											  </div>
										  </div>
										  <div class="row mt-3">
											
											<div class="col-12 col-sm-6 pt-3 mt-sm-0" style=" margin-top: 25px;">
												<div class="btn-group  col d-flex justify-content-center align-items-center mx-auto">
							
												  <input type="radio" class="btn-check form-check-input" name="radioGender" id="Male" value="M"
													checked />
												  <label class="btn btn-secondary" for="Male">Male</label>
							
												  <input type="radio" class="btn-check form-check-input" name="radioGender" id="Female" value="F" />
												  <label class="btn btn-secondary" for="Female">Female</label>
							
												</div>
											  </div>

											<div class="col-12 col-sm-6 mt-3 mt-sm-0">
											  <div class=" pb-2 ">
												<!-- <label class="form-label col d-flex justify-content-center mx-auto">Marital status</label> -->
												<div class="btn-group  col d-flex justify-content-center align-items-center mx-auto" style="
												padding-top: 0.75rem;
											">
												  <input type="radio" class="btn-check form-check-input" name="marital_status" id="Married"
													value="1" checked />
												  <label class="btn btn-secondary" for="Married">Married</label>
						  
												  <input type="radio" class="btn-check form-check-input" name="marital_status" id="Single"
													value="2" />
												  <label class="btn btn-secondary" for="Single">Single</label>
						  
												  <input type="radio" class="btn-check form-check-input" name="marital_status" id="Widowed"
													value="3" />
												  <label class="btn btn-secondary" for="Widowed">Widowed</label>
						  
												  <input type="radio" class="btn-check form-check-input" name="marital_status" id="Divorced"
													value="4" />
												  <label class="btn btn-secondary" for="Divorced">Divorced</label>
												</div>
						  
											  </div>
											</div>
										  </div>
										  <div class="button-row d-flex mt-4">
											<button class="btn bg-primary ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
										  </div>
										</div>
									  </div>					  
						  
									  <div class="multisteps-form__panel border-radius-xl bg-bs-color" data-animation="FadeIn">
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bold d-flex align-items-center text-dark">Location
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
										  <div class="row mt-3">
											<div class="col">
											  <div
												class="input-group input-group-outline  @error('Line1') is-invalid focused is-focused  @enderror  mb-0">
						  
												<input type="text" class="multisteps-form__input form-control" name="Line1" id="Line1"
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
						  
												<input type="text" class="multisteps-form__input form-control" name="Line2" id="Line2"
												  value="{{ old('Line2') }}" placeholder="Add Line 2">
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
						  
												<input type="text" autocomplete="off" class="multisteps-form__input form-control"
												  name="TownSuburb" id="TownSuburb" value="{{ old('TownSuburb') }}" placeholder="Town/Suburb">
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
						  
												<input type="text" class="multisteps-form__input form-control" name="City" id="City"
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
						  
												<input type="text" class="multisteps-form__input form-control" name="PostalCode" id="PostalCode"
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
						  
												<input type="text" class="form-control" name="Country" id="Country" value="{{ old('Province') }}"
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
										<div class="button-row d-flex mt-4">
										  <button class="btn bg-primary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
										  <button class="btn bg-primary ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
										</div>
									  </div>
						  
						  
									  <div class="multisteps-form__panel border-radius-xl bg-bs-color" data-animation="FadeIn">
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bold d-flex align-items-center text-dark">Contact Details
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
										  <div class="row mt-3">
											<div class="col-12">
											  <div
												class="input-group input-group-outline  @error('Telephone') is-invalid focused is-focused  @enderror mt-3 mb-0">
						  
												<input type="number" class="form-control" name="Telephone" id="Telephone"
												  value="{{ old('Telephone') }}" placeholder="Telephone (Cell)" maxlength="10">
											  </div>
											  @error('Telephone')
											  <span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											  </span>
											  @enderror
											</div>
											<div class="col-12 mt-3">
											  <div
												class="input-group input-group-outline  @error('WorkTelephone') is-invalid focused is-focused  @enderror mt-3 mb-0">
						  
												<input type="number" class="form-control" name="WorkTelephone" id="WorkTelephone"
												  value="{{ old('WorkTelephone') }}" placeholder="Telephone (Work)">
											  </div>
											  @error('WorkTelephone')
											  <span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											  </span>
											  @enderror
											</div>
											<div class="col-12 mt-3">
											  <div
												class="input-group input-group-outline  @error('Email') is-invalid focused is-focused  @enderror mt-3 mb-0">
						  
												<input type="email" class="form-control" name="Email" id="Email" value="{{ old('Email') }}"
												  placeholder="Email">
											  </div>
											  @error('Email')
											  <span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											  </span>
											  @enderror
											</div>
										  </div>
										  <div class="row">
											<div class="button-row d-flex mt-4 col-12">
											  <button class="btn bg-primary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
											  <button class="btn bg-primary ms-auto mb-0 js-btn-next" type="button"
												title="Next">Next</button>
											</div>
										  </div>
										</div>
									  </div>
						  
									  <div class="multisteps-form__panel border-radius-xl bg-bs-color h-100" data-animation="FadeIn">
										<h5 class="font-weight-bolder mb-0"></h5>
										<p class="mb-0 text-sm"></p>
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bold d-flex align-items-center text-dark">Membership Type
											<!-- <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ"> -->
												<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</span></h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-semibold fs-6">Select Membership Type</div>
											<!--end::Notice-->
										</div>										
										<div class="multisteps-form__content mt-3">
										  <div class="row">
											<div class="col-12 mt-3">
											  <div class="dropdown">
												<select id="memtype" name="memtype"
												  class="btn bg-gradient-secondary shadow-dark dropdown-toggle w-100 my-4 @error('memtype') is-invalid @enderror"
												  style="height: 80px;" aria-label="Select Membership Type">
												  <option selected value="0" disabled>--Select Membership Type-- </option>
												  @foreach ($memtypes as $memtype)
												  {{-- <option value="{{ $memtype->id }}">{{ $memtype->id }}. {{ $memtype->name }} - {{
													$memtype->description }} - R{{ round($memtype->membership_fee,2) }}</option> --}}
												  @if (old('memtype') == $memtype->id)
												  <option value="{{ $memtype->id }}" selected>{{ $memtype->id }}. {{ $memtype->name }} - {{
													$memtype->description }} - R{{ round($memtype->membership_fee,2) }}</option>
												  @else
												  <option value="{{ $memtype->id }}">{{ $memtype->id }}. {{ $memtype->name }} - {{
													$memtype->description }} - R{{ round($memtype->membership_fee,2) }}</option>
												  @endif
												  @endforeach
												</select>
												@error('memtype')
												<span class="invalid-feedback" role="alert">
												  <strong>{{ $message }}</strong>
												</span>
												@enderror
											  </div>
											</div>
										  </div>
										  <div class="button-row d-flex mt-4">
											<button class="btn bg-primary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
											<button class="btn bg-success ms-auto mb-0" type="submit" title="Add" id="kt_docs_sweetalert_basic">Add</button>
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



@push('scripts')

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 library --> --}}
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Check if there's a success message in the session
        @if (Session::has('success'))
            // Trigger the SweetAlert
            Swal.fire({
                text: "{{ Session::get('success') }}",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        @endif
    });
</script>

@endpush
