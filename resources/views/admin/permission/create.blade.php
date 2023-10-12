@extends('layouts.app2')

@section('row_content')

		<div class="modal-content">
			<div class="modal-header">
			  <h2 class="fw-bold">{{ __('Create permission') }}</h2>
			  <a href="{{route('permission.index')}}" class="btn btn-icon btn-sm btn-active-icon-primary">{{ __('<< Back to all permission') }}</a>
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
			  <form method="POST" action="{{ route('permission.store') }}" class="form">
				@csrf
				<div class="fv-row mb-7">
				  <label for="name" class="fs-6 fw-semibold form-label mb-2">{{__('Name') }}</label>
				  <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter a permission name"/>
				</div>
				<div class="text-center pt-15">
				  <button type='submit' class='btn btn-primary'>{{ __('Create') }}</button>
				</div>
			  </form>
			</div>
		</div>
    
@endsection

