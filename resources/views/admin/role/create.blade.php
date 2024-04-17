@extends('layouts.app2')
@section('row_content')

    <div class="modal-content bg-gray-300 border rounded mb-4">
        <div class="modal-header">
            <h1 class="fw-bold mt-6 center-content border-bottom border-4 border-info" style="margin-left: auto; margin-right: auto; width: fit-content;">
                {{ __('Create Role') }}</h1>
            @if ($errors->any())
                <ul class="text-danger fw-semibold">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="modal-body mx-lg-5 my-7">
            <form method="POST" action="{{ route('role.store') }}" id="kt_modal_add_role_form" class="form">
                @csrf
                <div class="d-flex flex-column me-n7 pe-7">
                    <div class="fv-row mb-10">
                        <label for="name" class="fs-5 fw-bold form-label mb-2">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            class="form-control form-control-solid" />
                    </div>
                    <div class="fv-row">
                        <h3 class="fs-2 fw-bold form-label border-bottom border-dark">
                            Select Permissions
                        </h3>
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <tbody class="text-gray-600 fw-semibold">
                                    @forelse ($permissions as $permission)
                                        <tr>
                                            <td class="text-gray-800">{{ $permission->name }}</td>
                                            <td>
                                                <label class="form-check form-check-custom form-check-solid me-9">
                                                    <input type="checkbox" name="permissions[]"
                                                        value="{{ $permission->name }}" class="form-check-input">
                                                    <span class="form-check-label">{{ $permission->name }}</span>
                                                </label>
                                            </td>
                                        </tr>
                                    @empty
                                        ----
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-15">
                    
                    <button type='submit' class='btn bg-gba' id='kt_docs_sweetalert_basic'>
                        {{ __('Create') }}
                    </button>
                    <button type="reset" class="btn btn-light me-3">Discard</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Check if there's a success message in the session
            @if (Session::has('success'))
                // Trigger the SweetAlert
                Swal.fire({
                    text: "{{ Session::get('success') }}",
                    icon: "info",
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
