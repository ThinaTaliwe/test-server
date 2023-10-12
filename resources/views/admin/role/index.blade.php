        @extends('layouts.app2')
		@section('row_content')

	<div class="p-3">
            @if(session()->has('message'))
            <div class="mb-8 text-success font-bold">
              {{ session()->get('message') }}
            </div>
            @endif  
            <div class="min-w-full border-b border-gray-200 shadow">

				<div class="row row-cols-3 row-cols-md-3 row-cols-xl-3 g-5 g-xl-9" id="datatable-roles">
                  @foreach($roles as $role)

					<!--begin::Col-->
					<div class="col-3">
						<!--begin::Card-->
						<div class="card card-flush h-md-100">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Card title-->
								<div class="card-title">
									<h2><a href="{{route('role.show', $role->id)}}"></a>{{ $role->name }}</h2>
								</div>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-1">
								<!--begin::Users-->
								<div class="fw-bold text-gray-600 mb-5">Total users with this role: {{$role->users->count()}}</div>
								<!--end::Users-->
								<!--begin::Permissions-->
								<div class="d-flex flex-column text-gray-600">
									@foreach ($role->permissions as $permission)
									<div class="d-flex align-items-center py-2">
									<span class="bullet bg-primary me-3"></span>{{$permission->name}}</div>	
									@endforeach
								</div>
								<!--end::Permissions-->
								
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer flex-wrap pt-0">

								@canany(['role edit', 'role delete'])
								  
								<form
								  action="{{ route('role.destroy', $role->id) }}"
								  method="POST"
								>
								  @can('role edit')
								  <a
									href="{{route('role.edit', $role->id)}}"
									class="btn btn-light btn-active-primary my-1 me-2">
								  
									{{ __("Edit Role")
									}}
								  </a>
								  @endcan @can('role delete') @csrf
								  @method('DELETE')
								  <button class="btn btn-light btn-active-light-primary my-1" >
									{{ __("Delete Role")
									}}
								  </button>
								  @endcan
								</form>
							  
							  @endcanany
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
                  @endforeach

				  								<!--begin::Add new card-->
												<div class="col-3">
													<!--begin::Card-->
													<div class="card h-md-100">
														<!--begin::Card body-->
														<div class="card-body d-flex flex-center">
															<!--begin::Button-->
															<button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
																<!--begin::Illustration-->
																<img src="{{ asset('img/newRole.png') }}" alt="" class="mw-100 mh-150px mb-7" />

																<!--end::Illustration-->
																<!--begin::Label-->
																<div class="fw-bold fs-3 text-gray-600 text-hover-primary">
																	@can('role create')
																	<a href="{{ route('role.create') }}">{{ __('Add Role') }}</a>
																	@endcan</div>
																<!--end::Label-->
															</button>
															<!--begin::Button-->
														</div>
														<!--begin::Card body-->
													</div>
													<!--begin::Card-->
												</div>
												<!--begin::Add new card-->
				</div>
											<!--begin::Modals-->

							<!--begin::Modal - Update role-->
							<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-750px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2 class="fw-bold">Update Role</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
												<i class="ki-duotone ki-cross fs-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 my-7">
											<!--begin::Form-->
											<form id="kt_modal_update_role_form" class="form" action="#">
												<!--begin::Scroll-->
												<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
													<!--begin::Input group-->
													<div class="fv-row mb-10">
														<!--begin::Label-->
														<label class="fs-5 fw-bold form-label mb-2">
															<span class="required">Role name</span>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="Developer" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Permissions-->
													<div class="fv-row">
														<!--begin::Label-->
														<label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
														<!--end::Label-->
														<!--begin::Table wrapper-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle table-row-dashed fs-6 gy-5">
																<!--begin::Table body-->
																<tbody class="text-gray-600 fw-semibold">
																	<!--begin::Table row-->
																	<tr>
																		<td class="text-gray-800">Administrator Access
																		<span class="ms-1" data-bs-toggle="tooltip" title="Allows a full access to the system">
																			<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
																				<span class="path1"></span>
																				<span class="path2"></span>
																				<span class="path3"></span>
																			</i>
																		</span></td>
																		<td>
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-9">
																				<input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
																				<span class="form-check-label" for="kt_roles_select_all">Select all</span>
																			</label>
																			<!--end::Checkbox-->
																		</td>
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">User Management</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="user_management_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="user_management_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="user_management_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Content Management</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="content_management_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="content_management_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="content_management_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Financial Management</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Reporting</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="reporting_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="reporting_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="reporting_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Payroll</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="payroll_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="payroll_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="payroll_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Disputes Management</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">API Controls</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Database Management</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="database_management_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="database_management_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="database_management_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Label-->
																		<td class="text-gray-800">Repository Management</td>
																		<!--end::Label-->
																		<!--begin::Input group-->
																		<td>
																			<!--begin::Wrapper-->
																			<div class="d-flex">
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
																					<span class="form-check-label">Read</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																					<input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
																					<span class="form-check-label">Write</span>
																				</label>
																				<!--end::Checkbox-->
																				<!--begin::Checkbox-->
																				<label class="form-check form-check-custom form-check-solid">
																					<input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
																					<span class="form-check-label">Create</span>
																				</label>
																				<!--end::Checkbox-->
																			</div>
																			<!--end::Wrapper-->
																		</td>
																		<!--end::Input group-->
																	</tr>
																	<!--end::Table row-->
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table wrapper-->
													</div>
													<!--end::Permissions-->
												</div>
												<!--end::Scroll-->
												<!--begin::Actions-->
												<div class="text-center pt-15">
													<button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
													<button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Modal body-->
									</div>
									<!--end::Modal content-->
								</div>
								<!--end::Modal dialog-->
							</div>
							<!--end::Modal - Update role-->
							<!--end::Modals-->
            </div>
	</div>

@endsection
