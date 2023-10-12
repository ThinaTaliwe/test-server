
@extends('layouts.app2')

@section('row_content')
											<!--begin::Navbar-->
											<div class="card">
												<div class="card-body pt-9 pb-9">
													<!--begin::Details-->
													<div class="d-flex flex-wrap flex-sm-nowrap">
														<!--begin: Pic-->
														<div class="me-7 mb-4">
															<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
																<img src="{{asset('assets/media/avatars/blank.png')}}" alt="image" />
																<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
															</div>
														</div>
														<!--end::Pic-->
														<!--begin::Info-->
														<div class="flex-grow-1">
															<!--begin::Title-->
															<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
																<!--begin::User-->
																<div class="d-flex flex-column">
																	<!--begin::Name-->
																	<div class="d-flex align-items-center mb-2">
																		<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ ucfirst(Auth::user()->name) }}</a>
																		<a href="#">
																			<i class="ki-duotone ki-verify fs-1 text-primary">
																				<span class="path1"></span>
																				<span class="path2"></span>
																			</i>
																		</a>
																	</div>
																	<!--end::Name-->
																	<!--begin::Info-->
																	<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
																		<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																		<i class="ki-duotone ki-profile-circle fs-4 me-1">
																			<span class="path1"></span>
																			<span class="path2"></span>
																			<span class="path3"></span>
																		</i>Role</a>
																		<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
																		<i class="ki-duotone ki-sms fs-4 me-1">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>{{ ucfirst(Auth::user()->email) }}</a>
																	</div>
																	<!--end::Info-->
																</div>
																<!--end::User-->

															</div>
															<!--end::Title-->
															<!--begin::Stats-->
															<div class="d-flex flex-wrap flex-stack">
																<!--begin::Wrapper-->
																<div class="d-flex flex-column flex-grow-1 pe-8">
																	<!--begin::Stats-->
																	<div class="d-flex flex-wrap">
																		<!--begin::Stat-->
																		<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																			<!--begin::Number-->
																			<div class="d-flex align-items-center">
																				<i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
																					<span class="path1"></span>
																					<span class="path2"></span>
																				</i>
																				<div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="5" data-kt-countup-prefix="*">0</div>
																			</div>
																			<!--end::Number-->
																			<!--begin::Label-->
																			<div class="fw-semibold fs-6 text-gray-400">Memberships</div>
																			<!--end::Label-->
																		</div>
																		<!--end::Stat-->
																		<!--begin::Stat-->
																		<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																			<!--begin::Number-->
																			<div class="d-flex align-items-center">
																				<i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
																					<span class="path1"></span>
																					<span class="path2"></span>
																				</i>
																				<div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="8">0</div>
																			</div>
																			<!--end::Number-->
																			<!--begin::Label-->
																			<div class="fw-semibold fs-6 text-gray-400">Dependants</div>
																			<!--end::Label-->
																		</div>
																		<!--end::Stat-->
																		<!--begin::Stat-->
																		<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																			<!--begin::Number-->
																			<div class="d-flex align-items-center">
																				<i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
																					<span class="path1"></span>
																					<span class="path2"></span>
																				</i>
																				<div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
																			</div>
																			<!--end::Number-->
																			<!--begin::Label-->
																			<div class="fw-semibold fs-6 text-gray-400">Transactions</div>
																			<!--end::Label-->
																		</div>
																		<!--end::Stat-->
																	</div>
																	<!--end::Stats-->
																</div>
																<!--end::Wrapper-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Details-->
												</div>
											</div>
											<!--end::Navbar-->
											<!--begin::Basic info-->
											<div class="card">
												<!--begin::Content-->
												<div id="kt_account_settings_profile_details" class="collapse show">
														<div class="card mb-5 mb-xl-10">
															<!--begin::Card header-->
															<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
																<!--begin::Card title-->
																<div class="card-title m-0">
																	<h3 class="fw-bold m-0">{{ __('Account Info') }}</h3>
																</div>
																<!--end::Card title-->
															</div>
															@if ($errors->account->any())
																<ul>
																	@foreach ($errors->account->all() as $error)
																		<li>{{ $error }}</li>
																	@endforeach
																</ul>
															@endif
															@if(session()->has('account_message'))
																<div>
																	{{ session()->get('account_message') }}
																</div>
															@endif
															<!--begin::Card header-->
															<!--begin::Content-->
															<div id="kt_account_settings_profile_details" class="collapse show">
																<!--begin::Form-->
																	<!--begin::Card body-->
																
																<form method="POST" action="{{ route('admin.account.info.store') }}"  class="form">
																	@csrf
																	<div class="card-body border-top p-9">
																		<!--begin::Input group-->
																		<div class="row mb-6">
																			<!--begin::Label-->
																			<label class="col-lg-4 col-form-label required fw-semibold fs-6" for="name">{{ __('Full Name') }}</label>
																			<!--end::Label-->
																			<!--begin::Col-->
																			<div class="col-lg-8">
																				<!--begin::Row-->
																				<div class="row">
																					<!--begin::Col-->
																					<div class="col-lg-8 fv-row">
																						<input id="name" type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Names" value="{{ old('name', $user->name) }}" />
																					</div>
																					<!--end::Col-->

																				</div>
																				<!--end::Row-->
																			</div>
																			<!--end::Col-->
																		</div>
																		<!--end::Input group-->
																		<!--begin::Input group-->
																		<div class="row mb-6">
																			<!--begin::Label-->
																			<label class="col-lg-4 col-form-label required fw-semibold fs-6" for="email">{{ __('Email') }}</label>
																			<!--end::Label-->
																			<!--begin::Col-->
																			<div class="col-lg-8 fv-row">
																				<input id="email" type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="Email"  value="{{ old('email', $user->email) }}" />
																			</div>
																			<!--end::Col-->
																		</div>
																		<!--end::Input group-->
																	</div>
																	<!--end::Card body-->
																	<!--begin::Actions-->
																	<div class="card-footer d-flex justify-content-end py-6 px-9">
																		<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
																		<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
																	</div>
																	<!--end::Actions-->
																</form>
																<!--end::Form-->
															</div>
															<!--end::Content-->
														</div>

													<div class="card mb-5 mb-xl-10">
														<!--begin::Card header-->
														<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
															<!--begin::Card title-->
															<div class="card-title m-0">
																<h3 class="fw-bold m-0">{{ __('Change Password') }}</h3>
															</div>
															<!--end::Card title-->
														</div>
														@if ($errors->password->any())
														<ul>
															@foreach ($errors->password->all() as $error)
																<li>{{ $error }}</li>
															@endforeach
														</ul>
														@endif
														@if(session()->has('password_message'))
															<div>
																{{ session()->get('password_message') }}
															</div>
														@endif
														<!--begin::Card header-->
														<!--begin::Content-->
														<div id="kt_account_settings_profile_details" class="collapse show">
															<!--begin::Form-->
																<!--begin::Card body-->
															
															<form method="POST" action="{{ route('admin.account.info.store') }}"  class="form">
																@csrf
																<div class="card-body border-top p-9">
																	<!--begin::Input group-->
																	<div class="row mb-6">
																		<!--begin::Label-->
																		<label class="col-lg-4 col-form-label required fw-semibold fs-6" for="old_password">{{ __('Old Password') }}</label>
																		<!--end::Label-->
																		<!--begin::Col-->
																		<div class="col-lg-8">
																			<!--begin::Row-->
																			<div class="row">
																				<!--begin::Col-->
																				<div class="col-lg-8 fv-row">
																					<input id="old_password" type="password" name="old_password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
																				</div>
																				<!--end::Col-->
																			</div>
																			<!--end::Row-->
																		</div>
																		<!--end::Col-->
																	</div>
																	<!--end::Input group-->
																	<!--begin::Input group-->
																	<div class="row mb-6">
																		<!--begin::Label-->
																		<label for="new_password" class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('New Password') }}</label>
																		
																		<!--end::Label-->
																		<!--begin::Col-->
																		<div class="col-lg-8">
																			<!--begin::Row-->
																			<div class="row">
																				<!--begin::Col-->
																				<div class="col-lg-8 fv-row">
																					<input id="new_password" type="password" name="new_password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
																				</div>
																				<!--end::Col-->
																			</div>
																			<!--end::Row-->
																		</div>
																		<!--end::Col-->
																	</div>
																	<!--end::Input group-->
																	<!--begin::Input group-->
																	<div class="row mb-6">
																		<!--begin::Label-->
																		<label for="confirm_password" class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Confirm password') }}</label>																
																		<!--end::Label-->
																		<!--begin::Col-->
																		<div class="col-lg-8">
																			<!--begin::Row-->
																			<div class="row">
																				<!--begin::Col-->
																				<div class="col-lg-8 fv-row">
																					<input id="confirm_password" type="password" name="confirm_password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
																				</div>
																				<!--end::Col-->
																			</div>
																			<!--end::Row-->
																		</div>
																		<!--end::Col-->
																	</div>
																	<!--end::Input group-->
																</div>
																<!--end::Card body-->
																<!--begin::Actions-->
																<div class="card-footer d-flex justify-content-end py-6 px-9">
																	<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
																	<button type='submit' class="btn btn-primary">{{ __('Change Password') }}</button>
																</div>
																<!--end::Actions-->
															</form>
															<!--end::Form-->
														</div>
														<!--end::Content-->
													</div>
												</div>
												<!--end::Content-->
											</div>
											<!--end::Basic info-->
											<!--begin::Sign-in Method-->
											<div class="card mb-5 mb-xl-10">
												<!--begin::Card header-->
												<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
													<div class="card-title m-0">
														<h3 class="fw-bold m-0">Two-Factor Authentication</h3>
													</div>
												</div>
												<!--end::Card header-->
												<!--begin::Content-->
												<div id="kt_account_settings_signin_method" class="collapse show">
													<!--begin::Card body-->
													<div class="card-body border-top p-9">


														<!--begin::Notice-->
														<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
															<!--begin::Icon-->
															<i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<!--end::Icon-->
															<!--begin::Wrapper-->
															<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
																<!--begin::Content-->
																<div class="mb-3 mb-md-0 fw-semibold">
																	<h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
																	<div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
																</div>
																<!--end::Content-->
																<!--begin::Action-->
																<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
																<!--end::Action-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Notice-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Content-->
											</div>
											<!--end::Sign-in Method-->
											<!--begin::Deactivate Account-->
											<div class="card">
												<!--begin::Card header-->
												<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
													<div class="card-title m-0">
														<h3 class="fw-bold m-0">Deactivate Account</h3>
													</div>
												</div>
												<!--end::Card header-->
												<!--begin::Content-->
												<div id="kt_account_settings_deactivate" class="collapse show">
													<!--begin::Form-->
													<form id="kt_account_deactivate_form" class="form" action="{{ route('login') }}">
														@csrf
														<!--begin::Card body-->
														<div class="card-body border-top p-9">
															<!--begin::Notice-->
															<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
																<!--begin::Icon-->
																<i class="ki-duotone ki-information fs-2tx text-warning me-4">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
																<!--end::Icon-->
																<!--begin::Wrapper-->
																<div class="d-flex flex-stack flex-grow-1">
																	<!--begin::Content-->
																	<div class="fw-semibold">
																		<h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
																		<div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset yousignr password.
																		<br />
																		<a class="fw-bold" href="#">Learn more</a></div>
																	</div>
																	<!--end::Content-->
																</div>
																<!--end::Wrapper-->
															</div>
															<!--end::Notice-->
															<!--begin::Form input row-->
															<div class="form-check form-check-solid fv-row">
																<input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
																<label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
															</div>
															<!--end::Form input row-->
														</div>
														<!--end::Card body-->
														<!--begin::Card footer-->
														<div class="card-footer d-flex justify-content-end py-6 px-9">
															<button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>
														</div>
														<!--end::Card footer-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Content-->
											</div>
											<!--end::Deactivate Account-->
@endsection


				





