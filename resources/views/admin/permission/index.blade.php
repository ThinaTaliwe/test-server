@extends('layouts.app2')

@push('styles')
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
@endpush

@section('row_content')
<!--begin::Card-->
<div class="card card-flush">
	@if(session()->has('message'))
	<p style="margin: 2rem; color: #2F855A; font-weight: bold;">
	{{ session()->get('message') }}
	</p>
	@endif
	<!--begin::Card header-->
	<div class="card-header mt-6">

		<!--begin::Card title-->
		<div class="card-title">

			<!--begin::Search-->
			<div class="d-flex align-items-center position-relative my-1 me-5">
				<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
					<span class="path1"></span>
					<span class="path2"></span>
				</i>
				<input type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Permissions" />
			</div>
			<!--end::Search-->
		</div>
		<!--end::Card title-->
		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Button-->
@can('permission create')

<div class="d-print-none with-border">
<a href="{{ route('permission.create') }}" class="btn btn-light-primary ms-auto"><span
class="btn-inner--icon pe-2"><i class="ki-duotone ki-plus-square fs-3">
<span class="path1"></span>
<span class="path2"></span>
<span class="path3"></span>
</i></span>{{ __('Add Permission') }}</a>
</div>
@endcan
			<!--end::Button-->
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->
	<!--begin::Card body-->
	<div class="card-body pt-0">
		<!--begin::Table-->
		<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table" id="datatable-admin">
			<thead>
				<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
					<!-- <th class="min-w-25px"> {{ __('ID') }}</th> -->
					<th class="min-w-125px"> {{ __('Name') }}</th>
					<th class="min-w-250px"> {{ __('Assigned to') }}</th>
					<th class="min-w-125px"> {{ __('Created Date') }}</th>
@canany(['permission edit', 'permission delete'])
					<th class="text-end min-w-100px"> {{ __('Actions') }}</th>
@endcanany
				</tr>
			</thead>
			<tbody class="fw-semibold text-gray-600">
@foreach($permissions as $permission)
<tr>
<!-- <td><a href="{{route('permission.show', $permission->id)}}">{{ $permission->id }}</a></td> -->
<td>
{{ $permission->name }}
</td>
<td>
<a href="../../demo15/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Super-Admin</a>
<a href="../../demo15/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Admin</a>
						<a href="../../demo15/dist/apps/user-management/roles/view.html" class="badge badge-light-success fs-7 m-1">Writer</a>
						<a href="../../demo15/dist/apps/user-management/roles/view.html" class="badge badge-light-info fs-7 m-1">Guest</a>
</td>
<td>{{$permission->created_at}}</td>
@canany(['permission edit', 'permission delete'])
<td class=" p-2 ">
<form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
@can('permission edit')
<a href="{{route('permission.edit', $permission->id)}}"
  class="btn bg-gradient-info ms-auto mb-0 px-4 py-2"><i class="bi bi-pencil-fill"></i>
  {{ __('Edit') }}<span class="btn-inner--icon ps-2"></span>
</a>
@endcan


@can('permission delete')
@csrf
@method('DELETE')
<button class="btn bg-gradient-dark ms-2 mb-0"><i class="bi bi-trash3-fill"></i>
  {{ __('Delete') }}<span class="btn-inner--icon ps-2"></span>
</button>
@endcan
</form>
</td>
@endcanany
</tr>
@endforeach
			</tbody>
		</table>
		<!--end::Table-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->
@endsection

@push('scripts')
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/apps/user-management/permissions/list.js"></script>
		<script src="assets/js/custom/apps/user-management/permissions/add-permission.js"></script>
		<script src="assets/js/custom/apps/user-management/permissions/update-permission.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
@endpush
