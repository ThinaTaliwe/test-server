<div class="d-flex align-items-center flex-column {{ $attributes->get('class') }}">
    <!--begin::Symbol-->
    <div class="symbol symbol-75px mb-4">
        <img src="{{ $profileImg }}" alt="" />
    </div>
    <!--end::Symbol-->
    <!--begin::Info-->
    <div class="text-center">
        <!--begin::Username-->
        <a href="{{ $profileLink }}" class="text-gray-800 text-hover-primary fs-4 fw-bolder">{{ $name }}</a>
        <!--end::Username-->
        <!--begin::Description-->
        <span class="text-gray-600 fw-semibold d-block fs-7 mb-1">{{ $description }}</span>
        <!--end::Description-->
    </div>
    <!--end::Info-->
</div>
