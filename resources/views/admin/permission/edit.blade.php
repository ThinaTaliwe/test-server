@extends('layouts.app2')

@section('row_content')
    
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="fw-bold">{{ __('Update permission') }}</h2>
        <a href="{{route('permission.index')}}" class="btn btn-icon btn-sm btn-active-icon-primary">{{ __('<< Back to all permission') }}</a>
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
      <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
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
                                        <div class="fs-6 text-gray-700">
                                        <strong class="me-1">Warning!</strong>By editing the permission name, you might break the system permissions functionality. Please ensure you're absolutely certain before proceeding.</div>
                                      </div>
                                      <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                  </div>
                                  <!--end::Notice-->
        <form method="POST" action="{{ route('permission.update', $permission->id) }}" class="form" id="kt_modal_add_permission_form">
          @csrf
          @method('PUT')
          <div class="fv-row mb-7">
            <label for="name" class="fs-6 fw-semibold form-label mb-2">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name', $permission->name) }}" class="form-control form-control-solid" placeholder="Enter a permission name" />
          </div>
          <div class="text-center pt-15">
            <button onclick="goBack()" class="btn btn-secondary">{{ __('Back') }}</button>
            <button type='submit' class="btn btn-primary">{{ __('Update') }}</button>
            
          </div>
        </form>
      </div>
    </div>

@endsection