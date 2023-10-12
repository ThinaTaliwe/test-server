@extends('layouts.app2')

@section('row_content')


<div class="modal-content">
    <div class="modal-header" id="kt_modal_add_user_header">
        <h1 class="fw-bold">{{ __('Update user') }}</h1>
        <a href="{{route('user.index')}}">{{ __('<< Back to all users') }}</a>
        {{--        @if ($errors->any())--}}
{{--          <ul class="fv-row mb-7">--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--              <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--          </ul>--}}
{{--        @endif--}}
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
    </div>
    <div class="modal-body mx-5 mx-xl-15 my-7">
        <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-7">
            <label for="name" class="required fw-semibold fs-6 mb-2">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('name', $user->name) }}" />
        </div>
        <div class="mb-7">
            <label for="email" class="required fw-semibold fs-6 mb-2">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('email', $user->email) }}" />
        </div>
        <div class="mb-7">
            <label for="password" class="required fw-semibold fs-6 mb-2">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" />
        </div>
        <div class="mb-7">
            <label for="password_confirmation" class="required fw-semibold fs-6 mb-2">{{ __('Password Confirmation') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-solid mb-3 mb-lg-0" />
        </div>
        <div class="mb-7">
            <h3 class="fw-bold">{{ __('Roles') }}</h3>
            <div class="d-flex flex-column">
                @forelse ($roles as $role)
                    <div class="d-flex fv-row">
                        <div class="form-check form-check-custom form-check-solid">
                            <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->id, $userHasRoles) ? 'checked' : '' }} class="form-check-input me-3">
                            <label class="form-check-label">{{ $role->name }}</label>
                        </div>
                    </div>
                    <div class='separator separator-dashed my-5'></div>
                @empty
                    ----
                @endforelse
            </div>
        </div>
        <div class="text-center pt-15">
            <button type='submit' class='btn btn-primary'>
                {{ __('Update') }}
            </button>
        </div>
        </form>
    </div>
</div>


@endsection
