@extends('layouts.app2')

@section('row_content')

    <div class="modal-content">
      <div class="modal-header" id="kt_modal_add_user_header">
        <h2 class="fw-bold">{{ __('Create user') }}</h2>
        
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
        <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ route('user.store') }}">
          @csrf
          <div class="mb-7">
            <label class="required fw-semibold fs-6 mb-2">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('name') }}" />
          </div>
          <div class="mb-7">
            <label class="required fw-semibold fs-6 mb-2">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('email') }}" />
          </div>
          <div class="mb-7">
            <input type="hidden" name="password" value="P@ssword1" />
          </div>
          <div class="mb-7">
            <input type="hidden" name="password_confirmation" value="P@ssword1" />
          </div>
          <div class="mb-7">
            <h3 class="fw-bold">{{ __('Roles') }}</h3>
            <div class="d-flex flex-column">
    
              @forelse ($roles as $role)
              <!--begin::Input row-->
              <div class="d-flex fv-row">
                <!--begin::Radio-->
                <div class="form-check form-check-custom form-check-solid">
                  <!--begin::Label-->
                  <div class="form-check form-check-custom form-check-solid">
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-check-input me-3">
                    <label class="form-check-label">{{ $role->name }}</label>
                  </div>
                  <!--end::Label-->
                </div>
                <!--end::Radio-->
              </div>
              <!--end::Input row-->
              <div class='separator separator-dashed my-5'></div>
              @empty
              ----
              @endforelse
            </div>
          </div>

          <div class="text-center pt-15">
            <button type='submit' class='btn btn-primary'>
              {{ __('Create') }}
            </button>
          </div>
        </form>
      </div>
    </div>
    
@endsection
