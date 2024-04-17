<div {{ $attributes->merge(['class' => 'page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 pb-5 pb-lg-0 pt-7 pt-lg-0']) }} data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
    <h2 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{!! Breadcrumbs::render() !!}
        <!-- <small class="text-muted fs-6 fw-semibold ms-1 pt-1">{!! Breadcrumbs::render() !!}</small> -->
    </h2>
</div>
