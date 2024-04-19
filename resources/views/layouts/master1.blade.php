<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ session('appdirection', 'ltr') }}">
<!--begin::Head-->

<head>
    <base href="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Group Burial Association.">
    <meta name="keywords" content="Burial, Associations">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="GBA System - Burial, Associations">
    <meta property="og:url" content="{{ secure_url('/') }}">
    <meta property="og:site_name" content="GBA System | Group Burial Association">
    <title>@yield('title', 'GBA System')</title>

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!-- Styles Start-->
    @stack('styles')
    <!-- Styles End-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body">
    <!--begin::Theme mode setup on page load-->
    @yield('themeMode')
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            @yield('aside')
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper"
                style="transition: 0.5s ease-out; padding-left: 0px !important; padding-top: 0px !important;">
                <!--begin::Header-->
                @yield('header')
                <!--end::Header-->
                <!--begin::Content-->
                @yield('content')
                <!--end::Content-->
                <!--begin::Footer-->
                @yield('footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
	
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    @stack('drawer')
    <!--end::Activities drawer-->
    <!--end::Drawers-->
    <!--end::Main-->
    <!--begin::Javascript-->
    @stack('scripts')

    <script src="{{ asset('js/custom/auto-logout.js') }}"></script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    {{-- Start Aside Script For Button Toggle --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var button = document.getElementById('toggleDrawerButton');
            var isToggled = false;

            button.addEventListener('click', function() {
                if (!isToggled) {
                    // Move the button 250px to the right
                    button.style.left = '250px';
                } else {
                    // Move the button back to its initial position
                    button.style.left = '0';
                }

                // Toggle the state
                isToggled = !isToggled;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleDrawerButton');
            const aside = document.getElementById('kt_aside');
            const wrapper = document.getElementById('kt_wrapper');

            toggleButton.addEventListener('click', function() {
                // Toggle the 'drawer-on' class on the aside
                aside.classList.toggle('drawer-on');

                // Check if the aside now has the 'drawer-on' class
                const isDrawerOn = aside.classList.contains('drawer-on');

                // Adjust the padding-left of the wrapper based on the drawer state
                wrapper.style.paddingLeft = isDrawerOn ? '250px' : '0px';
            });
        });
    </script>
    {{-- End Aside Script For Button Toggle --}}

</body>
<!--end::Body-->
</html>
