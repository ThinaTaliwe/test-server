@extends('layouts.app2')

@section('row_content')
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-17">
            <!--begin::Phone-->
            <div class="bg-light card-rounded d-flex flex-column flex-center flex-center p-10 h-100">
                <!--begin::Subtitle-->
                <h1 class="text-dark fw-bold my-5">Under Serious Construction</h1>
                <!--end::Subtitle-->
                <!--begin::Number-->
                <img src="{{ asset('giphy.gif') }}" alt="working">
                <!--end::Number-->
            </div>
            <!--end::Phone-->
        </div>
        <!--end::Body-->
    </div>
@endsection
