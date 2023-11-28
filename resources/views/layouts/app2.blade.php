@extends('layouts.master')

@section('title', 'GBA System')

@push('styles')
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('css/dynamic_styles.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
@endpush

@section('themeMode')
    <x-theme.theme-mode />
@endsection

@section('aside')
    <div id="kt_aside" class="aside pt-7 pb-4 pb-lg-7 pt-lg-17" data-kt-drawer="true" data-kt-drawer-name="aside"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_aside_toggle">
        <!--begin::Brand-->
        <div class="d-flex justify-content-center p-4 mb-10">
            <a href="{{ route('home') }}">
                <h1 class="text-center">{{ __('messages.GBASystem') }}</h1>
            </a>
        </div>
        <!--end::Brand-->
        <!--begin::Aside user-->
        <div class="aside-user mb-5 mb-lg-10" id="kt_aside_user">
            <!--begin::User-->
            <x-aside.profile name="{{ ucfirst(Auth::user()->name) }}" profileLink="{{ route('admin.account.info') }}"
                profileImg="{{ asset('assets/media/avatars/blank.png') }}" description="{{ ucfirst(Auth::user()->email) }}"
                class="additional-css-classes" />
            <!--end::User-->
        </div>
        <!--end::Aside user-->
        <!--begin::Aside menu-->
        <div class="aside-menu flex-column-fluid ps-3 ps-lg-5 pe-1 mb-9" id="kt_aside_menu">
            <!--begin::Aside Menu-->
            <div class="w-100 hover-scroll-y pe-2 me-2" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_user, #kt_aside_footer"
                data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="0">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold" id="#kt_aside_menu"
                    data-kt-menu="true">
                    <!--begin:Menu item-->
                    <x-aside.aside-menu menu-title="{{ __('messages.Memberships') }}" menu-icon="ki-duotone ki-home-2 fs-2"
                        :menu-items="[
                            ['url' => '/add-member', 'title' => __('messages.New Membership')],
                            ['url' => '/memberships', 'title' => __('messages.All Memberships')],
                        ]" />
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <x-aside.aside-menu :menu-title="__('messages.Dependants')" :menu-icon="'ki-duotone ki-abstract-26 fs-2'" :menu-items="[['url' => '/dependants', 'title' => __('messages.AllDependants')]]" />
                    <!--end:Menu item-->
                    @canany(['user edit', 'role edit', 'permission edit'])
                        <!--begin:Menu item-->
                        <x-aside.aside-menu :menu-title="__('Lede Reporting')" :menu-icon="'ki-duotone ki-chart-line-up'" :menu-items="[
                            ['url' => '/member/profile', 'title' => __('Profiles Report')],
                            ['url' => '/member/status', 'title' => __('Status Report')],
                            ['url' => '/member/demographic', 'title' => __('Demographics Report')],
                            ['url' => '/member/geographic', 'title' => __('Geographic Distribution Report')],
                            ['url' => '/member/financial', 'title' => __('Financial Reports')],
                            [
                                'url' => '/member/growth-retention',
                                'title' => __('Membership Growth and Retention Reports'),
                            ],
                            ['url' => '/member/insurance-claims', 'title' => __('Insurance and Claims Report')],
                            ['url' => '/member/communication', 'title' => __('Communication Preferences Report')],
                            ['url' => '/member/audit', 'title' => __('Audit and Data Integrity Reports')],
                            ['url' => '/member/lifecycle', 'title' => __('Membership Lifecycle Reports')],
                        ]" />
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <x-aside.aside-menu :menu-title="__('messages.Admin Space')" :menu-icon="'ki-duotone ki-briefcase fs-2'" :menu-items="[
                            ['url' => '/admin/user', 'title' => __('messages.Users')],
                            ['url' => '/admin/role', 'title' => __('messages.Roles')],
                            ['url' => '/admin/permission', 'title' => __('messages.Permissions')],
                        ]" />
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <x-aside.aside-menu :menu-title="__('messages.Reporting')" :menu-icon="'ki-duotone ki-chart-line-up'" :menu-items="[
                            ['url' => '/chart', 'title' => __('messages.dashboard')],
                            ['url' => '/report', 'title' => __('messages.membership')],
                            ['url' => '/person', 'title' => __('messages.persons')],
                            // ['url' => '/reports', 'title' => __('All Reports')],
                            ['url' => '/reporting', 'title' => __('messages.real_time_updates')],
                        ]" />
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <x-aside.aside-menu :menu-title="__('messages.sales_commission')" :menu-icon="'ki-duotone ki-tag'" :menu-items="[
                            ['url' => '/sales', 'title' => __('messages.sales')],
                            ['url' => '/commission/create', 'title' => __('messages.commissions')],
                        ]" />
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <x-aside.aside-menu :menu-title="__('messages.interfaces')" :menu-icon="'ki-duotone ki-technology-4'" :menu-items="[
                            ['url' => '/fixer', 'title' => __('messages.sanitizer')],
                            ['url' => '/mapper', 'title' => __('messages.mapping')],
                            ['url' => '/classifications', 'title' => __('Classifications')],
                            ['url' => '/logs', 'title' => __('messages.logs')],
                        ]" />
                        <!--end:Menu item-->
                    @endcanany
                    <!--begin:Menu item-->
                    <x-aside.aside-menu :menu-title="__('messages.More')" :menu-icon="'ki-duotone ki-abstract-35 fs-2'" :menu-items="[
                        ['url' => '/testingview', 'title' => __('messages.Developments')],
                        ['url' => '/whatsapp', 'title' => __('WhatsApp')],
                        ['url' => '/contact', 'title' => __('messages.Find Us')],
                        ['url' => '/settings', 'title' => __('messages.Customize')],
                    ]" />
                    <!--end:Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside menu-->
        <!--begin::Footer-->
        <div class="aside-footer flex-column-auto px-6 px-lg-9" id="kt_aside_footer">
            <!--begin::User panel-->
            <div class="d-flex flex-stack ms-7">
                <!--begin::Link-->
                <x-aside.click-icon link="/logout" class="additional-classes" text="{{ __('messages.LogOut') }}"
                    icon="ki-duotone ki-entrance-left" />
                <!--end::Link-->
                <!--begin::User menu-->
                <x-aside.footer-menu :items="[
                    ['url' => '/admin/edit-account-info', 'title' => __('messages.profile')],
                    ['url' => '/', 'title' => __('messages.Dependants'), 'badge' => '3'],
                    ['url' => '/', 'title' => __('messages.Memberships')],
                ]" classes="additional-classes" />
                <!--end::User menu-->
            </div>
            <!--end::User panel-->
        </div>
        <!--end::Footer-->
    </div>
@endsection

@section('header')
    <div id="kt_header" class="header">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-center flex-wrap justify-content-between" id="kt_header_container">
            <!--begin::Page title-->
            <x-header.page-title title="Current Dashboard" subtitle="current page" class="additional-classes" />
            <!--end::Page title=-->

            <!--begin::Solid input group style-->
            <div class="input-group input-group-solid flex-nowrap" style="width: 170px;">

                <div class="overflow-hidden flex-grow-1">
                    <form action="{{ route('direction.switch') }}" method="POST" class="w-100">
                        @csrf
                        <select name="direction" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Select a direction" onchange="this.form.submit();">
                            <option value="ltr" {{ session('appdirection') == 'ltr' ? 'selected' : '' }}>LTR</option>
                            <option value="rtl" {{ session('appdirection') == 'rtl' ? 'selected' : '' }}>RTL</option>
                        </select>
                    </form>
                </div>
            </div>
            <!-- end::Solid input group style-->

            @canany(['user edit', 'role edit', 'permission edit'])
                <!--begin::Solid input group style-->
                <div class="input-group input-group-solid" style="width: 190px; font-size: 0.8rem;">
                    <div class="overflow-hidden flex-grow-1">
                        <form action="/set-layout" method="POST" class="w-100">
                            @csrf
                            <select name="selectedLayoutIndex" class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select a Layout" onchange="this.form.submit();">
                                @foreach ($layouts as $index => $layout)
                                    <option value="{{ $index }}"
                                        {{ $index == $selectedLayoutIndex ? 'selected' : '' }}>
                                        {{ $layout->name == 'app2' ? 'GBA' : $layout->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <!--end::Solid input group style-->
            @endcanany


            <!--begin::Solid input group style-->
            <div class="input-group input-group-solid" style="width: 190px; font-size: 0.8rem;">
                <div class="overflow-hidden flex-grow-1">
                    <form action="{{ route('language.switch') }}" method="POST" class="w-100">
                        @csrf
                        <select name="language" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Select a Language" onchange="this.form.submit();">
                            <option value="en" {{ session('applocale') == 'en' ? 'selected' : '' }}>English</option>
                            <option value="af" {{ session('applocale') == 'af' ? 'selected' : '' }}>Afrikaans</option>
                        </select>
                    </form>
                </div>
            </div>
            <!--end::Solid input group style-->


            <!--begin::Wrapper-->
            <x-header.brand class="my-custom-class" href="{{ route('admin.home') }}" logoSrc="img/GBA-LOGO-white2.png"
                logoAlt="Logo" />
            <!--end::Wrapper-->


            <!--begin::Topbar-->
            <div class="d-flex align-items-center flex-shrink-0">
                <!--begin::Activities-->
                <div class="d-flex align-items-center ms-3 ms-lg-4">
                    <!--begin::Drawer toggle-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"
                        id="kt_activities_toggle">
                        <i class="ki-duotone ki-notification-bing fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </div>
                    <!--end::Drawer toggle-->
                </div>
                <!--end::Activities-->
                <!--begin::Theme mode-->
                <div class="d-flex align-items-center ms-3 ms-lg-4">
                    <!--begin::Menu toggle-->
                    <a href="#"
                        class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"
                        data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <!-- <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                                                           <span class="path1"></span>
                                                                           <span class="path2"></span>
                                                                           <span class="path3"></span>
                                                                           <span class="path4"></span>
                                                                           <span class="path5"></span>
                                                                           <span class="path6"></span>
                                                                           <span class="path7"></span>
                                                                           <span class="path8"></span>
                                                                           <span class="path9"></span>
                                                                           <span class="path10"></span>
                                                                          </i> -->
                        <!-- <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                                                           <span class="path1"></span>
                                                                           <span class="path2"></span>
                                                                          </i> -->
                        <i class="ki-duotone ki-night-day fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                            <span class="path7"></span>
                            <span class="path8"></span>
                            <span class="path9"></span>
                            <span class="path10"></span>
                        </i>
                    </a>
                    <!--begin::Menu toggle-->
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Light') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Dark') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="graytheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Gray') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="browntheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Brown') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="pinktheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Pink') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="redtheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Red') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="bluetheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Blue') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="yellowtheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Yellow') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.System') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="owntheme">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.own_style') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="{{ route('customize') }}" class="menu-link px-3 py-2">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-screen fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </span>
                                <span class="menu-title">{{ __('messages.Customize') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Theme mode-->
                <!--begin::Sidebar Toggler-->
                <!--begin::Activities-->
                <div class="d-flex align-items-center ms-3 ms-lg-4">
                    <!--begin::Drawer toggle-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"><a
                            href="/logout"><i class="ki-duotone ki-exit-left fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i></a>
                    </div>
                    <!--end::Drawer toggle-->
                </div>
                <!--end::Activities-->
                <!--end::Sidebar Toggler-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-fluid" id="kt_content_container">
            <!--begin::Row-->
            <div class="row g-5 g-lg-10">

                {{-- Start Checking If The User Is Owing --}}
                @if (Auth::check() && ucfirst(Auth::user()->email) === 'Owing@user.com')
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-information fs-2hx text-light me-4 mb-5 mb-sm-0"><span
                                class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h4 class="mb-2 light">This is an alert</h4>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span>The alert component can be used to highlight certain parts of your page for higher content
                                visibility.</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </button>
                        <!--end::Close-->
                    </div>
                    <!--end::Alert-->
                    <!--begin::Alert-->
                    <div
                        class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
                        <!--begin::Close-->
                        <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-danger"
                            data-bs-dismiss="alert">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </button>
                        <!--end::Close-->

                        <!--begin::Icon-->
                        <i class="ki-duotone ki-information-5 fs-5tx text-danger mb-5"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="text-center">
                            <!--begin::Title-->
                            <h1 class="fw-bold mb-5">This is a reminder.</h1>
                            <!--end::Title-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
                            <!--end::Separator-->

                            <!--begin::Content-->
                            <div class="mb-9 text-dark">
                                Please settle your outstanding bill with <strong>GBA asap</strong>.<br />
                                Please read our <a href="#" class="fw-bold me-1">Terms and Conditions</a> for more
                                info.
                            </div>
                            <!--end::Content-->

                            <!--begin::Buttons-->
                            <div class="d-flex flex-center flex-wrap">
                                <a href="#"
                                    class="btn btn-outline btn-outline-danger btn-active-danger m-2">Cancel</a>
                                <a href="#" class="btn btn-danger m-2">Ok, I got it</a>
                            </div>
                            <!--end::Buttons-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->
                @endif
                {{-- End Checking If The User Is Owing --}}

                @yield('row_content')
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('footer')
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <a href="" target="_blank" class="text-muted text-hover-primary fw-semibold me-1 fs-4">GBA</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="{{ route('user-settings') }}" target="_blank"
                        class="menu-link px-2">{{ __('messages.Contacts') }}</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('drawer')
@endsection

@push('scripts')
    <script>
        var hostUrl = "{{ asset('assets/') }}";
    </script>

    {{-- Start Sweet Alert for all success messages redirect --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let successMessage = "{{ Session::get('success') }}";

            if (successMessage) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: successMessage,
                    showConfirmButton: false,
                    timer: 1800,
                })
            }
        });
    </script>
    {{-- End Sweet Alert for all success messages redirect --}}

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/apps/user-management/roles/list/add.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/roles/list/update-role.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->


    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
    <!-- Datatables Js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <!-- Core JS Files -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/plugins/multistep-form.js') }}"></script>

    {{-- Start Verification --}}
    <script>
        const SECRET_KEY = "your_randomly_generated_secret_key";

        fetch("http://192.168.1.8/", {
                method: "GET",
                headers: {
                    "SECRET_KEY": SECRET_KEY,
                    // other headers
                },
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.log('Error:', error));
    </script>
    {{-- End  Verification --}}

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });

        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[4]); // use data for the date column

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table = $('#datatable-search').DataTable();

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });
        });
    </script>

    <!--  Not sure   -->
    <script>
        $('input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea')
            .each(function(element, i) {
                if ((element.value !== undefined && element.value.length > 0) || $(this).attr('placeholder') !==
                    undefined) {
                    $(this).siblings('div').addClass('is-invalid focused is-focused');
                } else {
                    $(this).siblings('label').removeClass('is-filled');
                }
            });
        //$('input[type=email]').val('test').siblings('label').addClass('is-filled');
    </script>


    <script src="{{ asset('js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jkanban/jkanban.js') }}"></script>


    <!-- ID: #datatable-search -->
    <script>
        $(document).ready(function() {
            $('#datatable-search').DataTable();
        });
    </script>
    <script>
        $('#datatable-search').DataTable({
            order: [
                [6, 'desc'],
                [0, 'desc']
            ],
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            paging: true,
            searching: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                paginate: {
                    previous: '‹',
                    next: '›'
                },
                aria: {
                    paginate: {
                        previous: 'Previous',
                        next: 'Next'
                    }
                }
            }
        });
    </script>

    <!-- ID: #datatable in dependant-->
    <script>
        $(document).ready(function() {
            $('#datatable-dependant').DataTable();
        });
    </script>
    <script>
        $('#datatable-dependant').DataTable({
            paging: true,
            searching: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                paginate: {
                    previous: '‹',
                    next: '›'
                },
                aria: {
                    paginate: {
                        previous: 'Previous',
                        next: 'Next'
                    }
                }
            }
        });
    </script>

    <!-- ID: #datatable in admin-->
    <script>
        $(document).ready(function() {
            $('#datatable-admin').DataTable();
        });
    </script>
    <script>
        $('#datatable-admin').DataTable({
            paging: true,
            searching: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                paginate: {
                    previous: '‹',
                    next: '›'
                },
                aria: {
                    paginate: {
                        previous: 'Previous',
                        next: 'Next'
                    }
                }
            }
        });
    </script>


    <!-- Google maps auto-complete form -->
    <script>
        "use strict";
        Object.defineProperty(exports, "__esModule", {
            value: true
        });
        var autocomplete;
        var address1Field;
        var address2Field;
        var postalField;

        function initAutocomplete() {
            address1Field = document.getElementById("Line1");
            address2Field = document.getElementById("Line2");
            postalField = document.getElementById("PostalCode");
            // Create the autocomplete object, restricting the search predictions to
            // addresses in the US and Canada.
            autocomplete = new google.maps.places.Autocomplete(address1Field, {
                componentRestrictions: {
                    country: ["za"]
                },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });
            address1Field.focus();
            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            var address1 = "";
            var postcode = "";
            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            // place.address_components are google.maps.GeocoderAddressComponent objects
            // which are documented at http://goo.gle/3l5i5Mr
            for (const component of place.address_components) {
                // @ts-ignore remove once typings fixed
                const componentType = component.types[0];

                // alert(componentType);

                switch (componentType) {
                    case "street_number": {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                    case "route": {
                        address1 += component.short_name;
                        break;
                    }

                    case "postal_code": {
                        postcode = component.long_name;

                        break;
                    }

                    case "postal_code_suffix": {
                        postcode = component.long_name;
                        break;
                    }
                    case "locality": {
                        document.getElementById("City").value = component.long_name;
                        break;
                    }
                    case "sublocality_level_1": {
                        document.getElementById("TownSuburb").value = component.long_name;
                        break;
                    }
                    case "administrative_area_level_1": {
                        document.getElementById("Province").value = component.long_name;
                        break;
                    }
                    case "administrative_area_level_2": {
                        document.getElementById("Line2").value = component.long_name;
                        break;
                    }
                    case "country":
                        document.getElementById("Country").value = component.long_name.toUpperCase();
                        break;
                }
            }

            address1Field.value = address1;
            document.getElementById("PostalCode").value = postcode;

            // After filling the form with address components from the Autocomplete
            // prediction, set cursor focus on the second address line to encourage
            // entry of subpremise information such as apartment, unit, or floor number.
            address2Field.focus();
        }
        window.initAutocomplete = initAutocomplete;
    </script>

    <!-- Google maps auto-complete form -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF1KOXQsWQgBsFdgoKlPAa38CS0nTzAmM&libraries=places&callback=initAutocomplete">
    </script>

    {{-- //This is for the member form - original --}}
    <script>
        function getDOB(IDNumber) {
            var Year = IDNumber.substring(0, 2);
            var Month = IDNumber.substring(2, 4);
            var Day = IDNumber.substring(4, 6);

            var cutoff = (new Date()).getFullYear() - 2000;

            var Y = (Year > cutoff ? '19' : '20') + Year;


            document.getElementById("inputYear").value += Y;
            document.getElementById("inputMonth").value += Month;
            document.getElementById("inputDay").value += Day;

        }
    </script>

    {{-- This is for the member form - Test --}}
    <script>
        function getDOB(IDNumber) {

            // first clear any left over error messages
            $('#error span').remove();
            //This clears the red x mark
            document.getElementById("IDNumber").classList.remove('is-invalid');
            document.getElementById("inputYearDiv").classList.remove('is-invalid');
            document.getElementById("inputMonthDiv").classList.remove('is-invalid');
            document.getElementById("inputDayDiv").classList.remove('is-invalid');

            //This clears the green checkmark
            document.getElementById("IDNumber").classList.remove('is-valid');
            document.getElementById("inputYearDiv").classList.remove('is-valid');
            document.getElementById("inputMonthDiv").classList.remove('is-valid');
            document.getElementById("inputDayDiv").classList.remove('is-valid');



            // store the error div, to save typing
            var error = $('#error');

            // assume everything is correct and if it later turns out not to be, just set this to false
            var correct = true;

            // SA ID Number have to be 13 digits, so check the length
            if (IDNumber.length != 13 || !isNumber(IDNumber)) {
                error.append('<p>SA ID number does not appear to be authentic - input not a valid number</p>');
                correct = false;
            }
            // get first 6 digits as a valid date
            var tempDate = new Date(IDNumber.substring(0, 2), IDNumber.substring(2, 4) - 1, IDNumber.substring(4, 6));



            var id_date = tempDate.getDate();
            var id_month = tempDate.getMonth();
            var id_year = tempDate.getFullYear();

            var Year = IDNumber.substring(0, 2);

            var cutoff = (new Date()).getFullYear() - 2000;

            var Y = (Year > cutoff ? '19' : '20') + Year;



            var fullDate = id_date + "-" + (id_month + 1) + "-" + id_year;

            if (!((tempDate.getYear() == IDNumber.substring(0, 2)) && (id_month == IDNumber.substring(2, 4) - 1) && (
                    id_date == IDNumber.substring(4, 6)))) {
                error.append('<p>SA ID number does not appear to be authentic - date part not valid</p>');
                correct = false;
            }



            // if no error found, hide the error message
            if (correct) {
                error.css('display', 'none');




                //This adds the green checkmark
                document.getElementById("IDNumber").classList.add('is-valid');
                document.getElementById("inputYearDiv").classList.add('is-valid');
                document.getElementById("inputMonthDiv").classList.add('is-valid');
                document.getElementById("inputDayDiv").classList.add('is-valid');

                // and put together a result message
                document.getElementById("inputYear").value += Y;
                document.getElementById("inputMonth").value += (id_month + 1);
                document.getElementById("inputDay").value += id_date;
            }
            // otherwise, show the error
            else {
                error.css('display', 'block');

                //This adds the green checkmark
                document.getElementById("IDNumber").classList.add('is-invalid');
                document.getElementById("inputYearDiv").classList.add('is-invalid');
                document.getElementById("inputMonthDiv").classList.add('is-invalid');
                document.getElementById("inputDayDiv").classList.add('is-invalid');
            }

            return false;


        }

        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
    </script>

    {{-- This is for the dependent form --}}
    <script>
        function getDOBDep(IDNumber) {

            // first clear any left over error messages
            $('#error span').remove();
            //This clears the red x mark
            document.getElementById("IDNumberDepDiv").classList.remove('is-invalid');
            document.getElementById("inputYearDepDiv").classList.remove('is-invalid');
            document.getElementById("inputMonthDepDiv").classList.remove('is-invalid');
            document.getElementById("inputDayDepDiv").classList.remove('is-invalid');

            //This clears the green checkmark
            document.getElementById("IDNumberDepDiv").classList.remove('is-valid');
            document.getElementById("inputYearDepDiv").classList.remove('is-valid');
            document.getElementById("inputMonthDepDiv").classList.remove('is-valid');
            document.getElementById("inputDayDepDiv").classList.remove('is-valid');



            // store the error div, to save typing
            var error = $('#error');

            // assume everything is correct and if it later turns out not to be, just set this to false
            var correct = true;

            // SA ID Number have to be 13 digits, so check the length
            if (IDNumber.length != 13 || !isNumber(IDNumber)) {
                error.append('<p>SA ID number does not appear to be authentic - input not a valid number</p>');
                correct = false;
            }
            // get first 6 digits as a valid date
            var tempDate = new Date(IDNumber.substring(0, 2), IDNumber.substring(2, 4) - 1, IDNumber.substring(4, 6));

            var id_date = tempDate.getDate();
            var id_month = tempDate.getMonth();
            var id_year = tempDate.getFullYear();


            var Year = IDNumber.substring(0, 2);

            var cutoff = (new Date()).getFullYear() - 2000;

            var Y = (Year > cutoff ? '19' : '20') + Year;



            var fullDate = id_date + "-" + (id_month + 1) + "-" + id_year;

            if (!((tempDate.getYear() == IDNumber.substring(0, 2)) && (id_month == IDNumber.substring(2, 4) - 1) && (
                    id_date == IDNumber.substring(4, 6)))) {
                error.append('<p>SA ID number does not appear to be authentic - date part not valid</p>');
                correct = false;
            }



            // if no error found, hide the error message
            if (correct) {
                error.css('display', 'none');




                //This adds the green checkmark
                document.getElementById("IDNumberDepDiv").classList.add('is-valid');
                document.getElementById("inputYearDepDiv").classList.add('is-valid');
                document.getElementById("inputMonthDepDiv").classList.add('is-valid');
                document.getElementById("inputDayDepDiv").classList.add('is-valid');

                // and put together a result message
                document.getElementById("inputYearDep").value += Y;
                document.getElementById("inputMonthDep").value += (id_month + 1);
                document.getElementById("inputDayDep").value += id_date;
            }
            // otherwise, show the error
            else {
                error.css('display', 'block');

                //This adds the green checkmark
                document.getElementById("IDNumberDepDiv").classList.add('is-invalid');
                document.getElementById("inputYearDepDiv").classList.add('is-invalid');
                document.getElementById("inputMonthDepDiv").classList.add('is-invalid');
                document.getElementById("inputDayDepDiv").classList.add('is-invalid');
            }

            return false;


        }

        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
    </script>

    {{-- <script>
        // autologout.js

        $(document).ready(function() {
            const timeout = 1900000; // 300000 ms = 5 minutes
            var idleTimer = null;
            $('*').bind(
                'mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick',
                function() {
                    clearTimeout(idleTimer);

                    idleTimer = setTimeout(function() {
                        document.getElementById('logout-form').submit();
                    }, timeout);
                });
            $("body").trigger("mousemove");
        });
    </script> --}}

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    {{-- Start Redirect Back Function --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    {{-- End Redirect Back Function --}}

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-dashboard.min.js?v=3.0.4') }}"></script>

    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('assets/') }}";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <!-- ... Include all your other scripts here ... -->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <!-- ... Include all your other scripts here ... -->
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.1/intro.min.js"></script>
    <script src="{{ asset('public/vendor/intro.js/intro.module.js') }}"></script>
    <!-- <script>
        introJs().start();
    </script> -->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('assets/') }}";
        introJs().start();
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    {{-- <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/user-profile/general.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
@endpush
