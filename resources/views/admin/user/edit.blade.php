@extends('layouts.app2')

@push('style')
    <style>
        /* Dark theme */
        [data-bs-theme=dark] textt {
            color: beige !important;
        }

        /* Light theme */
        [data-bs-theme=light] textt {
            color: Black !important;
        }

        button {
            background-color: #0a3622 !important;
        }
    </style>
@endpush

@section('row_content')

    <div class="card mb-4 bg-gba-light">
        <h1 class="fw-bold text-center m-2">
            {{ __('Update User') }}</h1>
        <a href="{{ route('user.index') }}" class="text-end m-2">{{ __('<< Back') }}</a>
        @if ($errors->any())
            <ul class="fv-row mb-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <script>
            @if ($errors->any())
                var errors = [
                    @foreach ($errors->all() as $error)
                        "{{ $error }}",
                    @endforeach
                ];

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errors.join('<br/>')
                });
            @endif
        </script>

        <div class="modal-body">
            <form id="kt_modal_add_user_form" class="form row" method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                    @method('PUT')
                        <div class="col-5 bg-gba-light rounded-start ">
                            <div class="mb-1">
                                <label for="name" class="required fw-semibold fs-6 mb-2">{{ __('Name') }}</label>
                                <input id="name" type="text" name="name"
                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                    value="{{ old('name', $user->name) }}" />
                            </div>
                            <div class="mb-1">
                                <label for="email" class="required fw-semibold fs-6 mb-2">{{ __('Email') }}</label>
                                <input id="email" type="email" name="email"
                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                    value="{{ old('email', $user->email) }}" />
                            </div>
                        </div>
                        <div class="col-5 bg-gba-light rounded-end">
                            <div class="mb-1">
                                <label for="password" class="required fw-semibold fs-6 mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password"
                                    class="form-control form-control-solid mb-3 mb-lg-0" />
                            </div>
                            <div class="mb-1">
                                <label for="password_confirmation"
                                    class="required fw-semibold fs-6 mb-2">{{ __('Password Confirmation') }}</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control form-control-solid mb-3 mb-lg-0" />
                            </div>
                        </div>
                <div class="col-2 bg-gba border-light rounded">
                    <div>
                        <h3 class="fw-bold">{{ __('Roles') }}</h3>
                        <div class="d-flex flex-column">
                            @forelse ($roles as $role)
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                            {{ in_array($role->id, $userHasRoles) ? 'checked' : '' }}
                                            class="form-check-input me-3">
                                        <label class="textt">{{ $role->name }}</label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-3'></div>
                            @empty
                                ----
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="text-center m-2">
                    <button type='submit' class='btn bg-gba'>
                        {{ __('Update') }}
                    </button>
                    <!-- In your Blade file -->
                    <x-button id="btnBack" class="btn-secondary " type="button" text="Back"><a
                            href="{{ route('user.index') }}"></a></x-button>
                </div>
            </form>
        </div>
    </div>


@endsection
