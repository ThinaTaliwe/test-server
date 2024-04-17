@extends('layouts.app2')
@section('row_content')

    <div class="modal-content border bg-primary-subtle rounded mb-4">
        <div class="modal-header">
            <h1 class="fw-bold mt-6 border-bottom border-3" style="margin-left: auto; margin-right: auto; width: fit-content;">{{ __('Update role') }}</h1>
            @if ($errors->any())
                <ul class="text-danger fw-semibold">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="modal-body mx-lg-5 my-7">
            <form method="POST" action="{{ route('role.update', $role->id) }}" class="form">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column me-n7 pe-7">
                    <div class="fv-row mb-10">
                        <label for="name" class="fs-5 fw-bold form-label mb-2">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $role->name) }}"
                            class="form-control form-control-solid" />
                    </div>
                    @unless ($role->name == env('APP_SUPER_ADMIN', 'super-admin'))
                        <div class="fv-row">
                            <h3 class="fs-5 fw-bold form-label mb-2" >Permissions</h3>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody class="text-gray-600 fw-semibold">
                                        @forelse ($permissions as $permission)
                                            <tr>
                                                <td class="text-black text-center">{{ $permission->name }}</td>
                                                <td class="text-black text-center">
                                                    <label class="form-check form-check-custom form-check-solid me-9 text-black text-center">
                                                        <input type="checkbox" name="permissions[]"
                                                            value="{{ $permission->name }}"
                                                            {{ in_array($permission->id, $roleHasPermissions) ? 'checked' : '' }}
                                                            class="form-check-input">
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
                    @endunless
                </div>
                <div class="text-center pt-15">
                    <button type='submit' class='btn bg-gba'>
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
