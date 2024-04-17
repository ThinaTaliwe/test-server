
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic 
Product Version: 8.2.1
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
<base href="../" />
		<title>Metronic - The World's #1 Selling Bootstrap Admin Template - Metronic by KeenThemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template - Metronic by KeenThemes" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">

				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-fluid" id="kt_content_container">
							<!--begin::Navbar-->
							<div class="card mb-5 mb-xl-10">
								<div class="card-body pt-0 pb-0">
									<!--begin::Details-->
									<div class="d-flex flex-wrap flex-sm-nowrap">

										<!--begin::Info-->
										<div class="flex-grow-1">

											<!--begin::Stats-->
											<div class="d-flex flex-wrap flex-stack">
												<!--begin::Wrapper-->
												<div class="d-flex flex-column flex-grow-1 pe-8">
													<!--begin::Stats-->
													{{-- <div class="d-flex flex-wrap">
														<!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
																<div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-6 text-gray-500">Earnings</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
														<!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
																<div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">0</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-6 text-gray-500">Projects</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
														<!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
																<div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-6 text-gray-500">Success Rate</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
													</div> --}}
													<!--end::Stats-->
												</div>
												<!--end::Wrapper-->
	
											</div>
											<!--end::Stats-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Details-->
									<!--begin::Navs-->
									<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/profile">Profile</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="member/growth-retention">Growth Retention</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/demographic">Demographic</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/financial">Finance</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/geographic">Geographic</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/insurance-claims">Insurance Claims</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/communication">Communication</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/audit">Audit</a>
										</li>
										<!--end::Nav item-->
										<!--begin::Nav item-->
										<li class="nav-item mt-2">
											<a class="nav-link text-active-primary ms-0 me-10 py-5" href="member/lifecycle">Life Cycle</a>
										</li>
										<!--end::Nav item-->
									</ul>
									<!--begin::Navs-->
								</div>
							</div>
							<!--end::Navbar-->
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bold m-0">Profile Details</h3>
									</div>
									<!--end::Card title-->
									<!--begin::Action-->
									{{-- <a href="account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit Profile</a> --}}
									<!--end::Action-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<!--begin::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">Max Smith</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Company</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<span class="fw-semibold text-gray-800 fs-6">Keenthemes</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Contact Phone 
										<span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
											<i class="ki-duotone ki-information fs-7">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</span></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 d-flex align-items-center">
											<span class="fw-bold fs-6 text-gray-800 me-2">044 3276 454 935</span>
											<span class="badge badge-success">Verified</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Company Site</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">keenthemes.com</a>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Country 
										<span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
											<i class="ki-duotone ki-information fs-7">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</span></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">Germany</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Communication</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">Email, Phone</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-10">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
										<!--begin::Label-->
										<!--begin::Label-->
										<div class="col-lg-8">
											<span class="fw-semibold fs-6 text-gray-800">Yes</span>
										</div>
										<!--begin::Label-->
									</div>
									<!--end::Input group-->

									<h1>Membership Growth and Retention Report</h1>
									<section>
        
                                        {{-- 
                                            @if($membershipData)
                                                <div class="membership-details">
                                                    <p><strong>LIDNO:</strong> {{ $membershipData->LIDNO }}</p>
                                                    <p><strong>Surname:</strong> {{ $membershipData->SUR }}</p>
                                                    <p><strong>Initials:</strong> {{ $membershipData->INI }}</p>
                                                    <p><strong>Membership Type:</strong> {{ $membershipData->LIDTIPE }}</p>
                                                    <p><strong>Region:</strong> {{ $membershipData->STREEK }}</p>
                                                    <p><strong>Birth Date:</strong> {{ $membershipData->GEBDAT }}</p>
                                                    <p><strong>Join Date:</strong> {{ $membershipData->AANSTDAT }}</p>
                                                    <p><strong>Marital Status:</strong> {{ $membershipData->TROUSTAT }}</p>
                                                    <p><strong>Postal Address:</strong> {{ $membershipData->POBOX }}</p>
                                                    <p><strong>Street:</strong> {{ $membershipData->STREET }}</p>
                                                    <p><strong>City:</strong> {{ $membershipData->CITY }}</p>
                                                    <p><strong>ZIP:</strong> {{ $membershipData->ZIP }}</p>

                                                                    
                                                    <p><strong>ID Number:</strong> {{ $membershipData->IDNO }}</p>
                                                    <p><strong>Sex:</strong> {{ $membershipData->SEX == '1' ? 'Male' : 'Female' }}</p>
                                                    <p><strong>Language:</strong> {{ $membershipData->TAAL }}</p>
                                                    <p><strong>Group:</strong> {{ $membershipData->GROEP }}</p>
                                                    <p><strong>Telephone Home:</strong> {{ $membershipData->TELH }}</p>
                                                    <p><strong>Telephone Work:</strong> {{ $membershipData->TELW }}</p>
                                                    <p><strong>Insurance Code:</strong> {{ $membershipData->VersekerKode }}</p>
                                                    <p><strong>Last Payment Date:</strong> {{ $membershipData->BETDAT }}</p>
                                                    <p><strong>Claim Date:</strong> {{ $membershipData->EISDAT }}</p>
                                                    <p><strong>Credit:</strong> {{ $membershipData->KREDIET }}</p>
                                                    <p><strong>Active Status:</strong> {{ $membershipData->AKTIEF == 1 ? 'Active' : 'Inactive' }}</p>
                                                    <p><strong>Join Age:</strong> {{ $membershipData->JOINAGE }}</p>
                                                    <p><strong>Membership Status:</strong> {{ $membershipData->STATUS }}</p>
                                                    <p><strong>Method of Payment:</strong> {{ $membershipData->BETMET }}</p>
                                                    <p><strong>Premium:</strong> {{ $membershipData->PREMIE }}</p>
                                                    <p><strong>Number of Dependents:</strong> {{ $membershipData->AANTAFH }}</p>
                                                    <p><strong>Receipt Number:</strong> {{ $membershipData->KWITNO }}</p>
                                                    <p><strong>Deceased Date:</strong> {{ $membershipData->LIDDOOD }}</p>
                                                    <p><strong>Adress Date:</strong> {{ $membershipData->DATADR }}</p>
                                                    <p><strong>Pension:</strong> {{ $membershipData->Pensioen == 1 ? 'Yes' : 'No' }}</p>
                                                    <p><strong>Email:</strong> {{ $membershipData->Email }}</p>
                                                    <p><strong>Cell:</strong> {{ $membershipData->Cell }}</p>
                                                </div>
                                            @else
                                                <p>No membership data found.</p>
                                            @endif --}}
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->

							<!--begin::Row-->
							<div class="row gy-5 g-xl-10">
								<!--begin::Col-->
								<div class="col-xl-8 mb-xl-10">
									<!--begin::Chart widget 5-->
									<div class="card card-flush h-lg-100">
										<!--begin::Header-->
										<div class="card-header flex-nowrap pt-5">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-900">Top Selling Categories</span>
												<span class="text-gray-500 pt-2 fw-semibold fs-6">8k social visitors</span>
											</h3>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<!--begin::Menu-->
												<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
													<i class="ki-duotone ki-dots-square fs-1 text-gray-500 me-n1">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</button>
												<!--begin::Menu 2-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator mb-3 opacity-75"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Ticket</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Customer</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
														<!--begin::Menu item-->
														<a href="#" class="menu-link px-3">
															<span class="menu-title">New Group</span>
															<span class="menu-arrow"></span>
														</a>
														<!--end::Menu item-->
														<!--begin::Menu sub-->
														<div class="menu-sub menu-sub-dropdown w-175px py-4">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Admin Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Staff Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Member Group</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu sub-->
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Contact</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator mt-3 opacity-75"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content px-3 py-3">
															<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
														</div>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 2-->
												<!--end::Menu-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body pt-5 ps-6">
											<div id="kt_charts_widget_5" class="min-h-auto"></div>
										</div>
										<!--end::Body-->
									</div>
									<!--end::Chart widget 5-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-4 mb-5 mb-xl-10">
									<!--begin::List widget 5-->
									<div class="card card-flush h-xl-100">
										<!--begin::Header-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-900">Product Delivery</span>
												<span class="text-gray-500 mt-1 fw-semibold fs-6">1M Products Shipped so far</span>
											</h3>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<a href="apps/ecommerce/sales/details.html" class="btn btn-sm btn-light">Order Details</a>
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Scroll-->
											<div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
												<!--begin::Item-->
												<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
													<!--begin::Info-->
													<div class="d-flex flex-stack mb-3">
														<!--begin::Wrapper-->
														<div class="me-3">
															<!--begin::Icon-->
															<img src="assets/media/stock/ecommerce/210.png" class="w-50px ms-n1 me-1" alt="" />
															<!--end::Icon-->
															<!--begin::Title-->
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
															<!--end::Title-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="m-0">
															<!--begin::Menu-->
															<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																<i class="ki-duotone ki-dots-square fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</button>
															<!--begin::Menu 2-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mb-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Ticket</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Customer</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																	<!--begin::Menu item-->
																	<a href="#" class="menu-link px-3">
																		<span class="menu-title">New Group</span>
																		<span class="menu-arrow"></span>
																	</a>
																	<!--end::Menu item-->
																	<!--begin::Menu sub-->
																	<div class="menu-sub menu-sub-dropdown w-175px py-4">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Admin Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Staff Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Member Group</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu sub-->
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Contact</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mt-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3 py-3">
																		<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu 2-->
															<!--end::Menu-->
														</div>
														<!--end::Action-->
													</div>
													<!--end::Info-->
													<!--begin::Customer-->
													<div class="d-flex flex-stack">
														<!--begin::Name-->
														<span class="text-gray-500 fw-bold">To: 
														<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Jason Bourne</a></span>
														<!--end::Name-->
														<!--begin::Label-->
														<span class="badge badge-light-success">Delivered</span>
														<!--end::Label-->
													</div>
													<!--end::Customer-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
													<!--begin::Info-->
													<div class="d-flex flex-stack mb-3">
														<!--begin::Wrapper-->
														<div class="me-3">
															<!--begin::Icon-->
															<img src="assets/media/stock/ecommerce/209.png" class="w-50px ms-n1 me-1" alt="" />
															<!--end::Icon-->
															<!--begin::Title-->
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
															<!--end::Title-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="m-0">
															<!--begin::Menu-->
															<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																<i class="ki-duotone ki-dots-square fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</button>
															<!--begin::Menu 2-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mb-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Ticket</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Customer</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																	<!--begin::Menu item-->
																	<a href="#" class="menu-link px-3">
																		<span class="menu-title">New Group</span>
																		<span class="menu-arrow"></span>
																	</a>
																	<!--end::Menu item-->
																	<!--begin::Menu sub-->
																	<div class="menu-sub menu-sub-dropdown w-175px py-4">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Admin Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Staff Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Member Group</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu sub-->
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Contact</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mt-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3 py-3">
																		<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu 2-->
															<!--end::Menu-->
														</div>
														<!--end::Action-->
													</div>
													<!--end::Info-->
													<!--begin::Customer-->
													<div class="d-flex flex-stack">
														<!--begin::Name-->
														<span class="text-gray-500 fw-bold">To: 
														<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Marie Durant</a></span>
														<!--end::Name-->
														<!--begin::Label-->
														<span class="badge badge-light-primary">Shipping</span>
														<!--end::Label-->
													</div>
													<!--end::Customer-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
													<!--begin::Info-->
													<div class="d-flex flex-stack mb-3">
														<!--begin::Wrapper-->
														<div class="me-3">
															<!--begin::Icon-->
															<img src="assets/media/stock/ecommerce/214.png" class="w-50px ms-n1 me-1" alt="" />
															<!--end::Icon-->
															<!--begin::Title-->
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
															<!--end::Title-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="m-0">
															<!--begin::Menu-->
															<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																<i class="ki-duotone ki-dots-square fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</button>
															<!--begin::Menu 2-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mb-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Ticket</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Customer</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																	<!--begin::Menu item-->
																	<a href="#" class="menu-link px-3">
																		<span class="menu-title">New Group</span>
																		<span class="menu-arrow"></span>
																	</a>
																	<!--end::Menu item-->
																	<!--begin::Menu sub-->
																	<div class="menu-sub menu-sub-dropdown w-175px py-4">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Admin Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Staff Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Member Group</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu sub-->
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Contact</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mt-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3 py-3">
																		<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu 2-->
															<!--end::Menu-->
														</div>
														<!--end::Action-->
													</div>
													<!--end::Info-->
													<!--begin::Customer-->
													<div class="d-flex flex-stack">
														<!--begin::Name-->
														<span class="text-gray-500 fw-bold">To: 
														<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Dan Wilson</a></span>
														<!--end::Name-->
														<!--begin::Label-->
														<span class="badge badge-light-danger">Confirmed</span>
														<!--end::Label-->
													</div>
													<!--end::Customer-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
													<!--begin::Info-->
													<div class="d-flex flex-stack mb-3">
														<!--begin::Wrapper-->
														<div class="me-3">
															<!--begin::Icon-->
															<img src="assets/media/stock/ecommerce/211.png" class="w-50px ms-n1 me-1" alt="" />
															<!--end::Icon-->
															<!--begin::Title-->
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
															<!--end::Title-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="m-0">
															<!--begin::Menu-->
															<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																<i class="ki-duotone ki-dots-square fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</button>
															<!--begin::Menu 2-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mb-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Ticket</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Customer</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																	<!--begin::Menu item-->
																	<a href="#" class="menu-link px-3">
																		<span class="menu-title">New Group</span>
																		<span class="menu-arrow"></span>
																	</a>
																	<!--end::Menu item-->
																	<!--begin::Menu sub-->
																	<div class="menu-sub menu-sub-dropdown w-175px py-4">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Admin Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Staff Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Member Group</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu sub-->
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Contact</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mt-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3 py-3">
																		<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu 2-->
															<!--end::Menu-->
														</div>
														<!--end::Action-->
													</div>
													<!--end::Info-->
													<!--begin::Customer-->
													<div class="d-flex flex-stack">
														<!--begin::Name-->
														<span class="text-gray-500 fw-bold">To: 
														<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Lebron Wayde</a></span>
														<!--end::Name-->
														<!--begin::Label-->
														<span class="badge badge-light-success">Delivered</span>
														<!--end::Label-->
													</div>
													<!--end::Customer-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
													<!--begin::Info-->
													<div class="d-flex flex-stack mb-3">
														<!--begin::Wrapper-->
														<div class="me-3">
															<!--begin::Icon-->
															<img src="assets/media/stock/ecommerce/215.png" class="w-50px ms-n1 me-1" alt="" />
															<!--end::Icon-->
															<!--begin::Title-->
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
															<!--end::Title-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="m-0">
															<!--begin::Menu-->
															<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																<i class="ki-duotone ki-dots-square fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</button>
															<!--begin::Menu 2-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mb-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Ticket</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Customer</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																	<!--begin::Menu item-->
																	<a href="#" class="menu-link px-3">
																		<span class="menu-title">New Group</span>
																		<span class="menu-arrow"></span>
																	</a>
																	<!--end::Menu item-->
																	<!--begin::Menu sub-->
																	<div class="menu-sub menu-sub-dropdown w-175px py-4">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Admin Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Staff Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Member Group</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu sub-->
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Contact</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mt-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3 py-3">
																		<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu 2-->
															<!--end::Menu-->
														</div>
														<!--end::Action-->
													</div>
													<!--end::Info-->
													<!--begin::Customer-->
													<div class="d-flex flex-stack">
														<!--begin::Name-->
														<span class="text-gray-500 fw-bold">To: 
														<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Ana Simmons</a></span>
														<!--end::Name-->
														<!--begin::Label-->
														<span class="badge badge-light-primary">Shipping</span>
														<!--end::Label-->
													</div>
													<!--end::Customer-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="border border-dashed border-gray-300 rounded px-7 py-3">
													<!--begin::Info-->
													<div class="d-flex flex-stack mb-3">
														<!--begin::Wrapper-->
														<div class="me-3">
															<!--begin::Icon-->
															<img src="assets/media/stock/ecommerce/192.png" class="w-50px ms-n1 me-1" alt="" />
															<!--end::Icon-->
															<!--begin::Title-->
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
															<!--end::Title-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Action-->
														<div class="m-0">
															<!--begin::Menu-->
															<button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
																<i class="ki-duotone ki-dots-square fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</button>
															<!--begin::Menu 2-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mb-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Ticket</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Customer</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
																	<!--begin::Menu item-->
																	<a href="#" class="menu-link px-3">
																		<span class="menu-title">New Group</span>
																		<span class="menu-arrow"></span>
																	</a>
																	<!--end::Menu item-->
																	<!--begin::Menu sub-->
																	<div class="menu-sub menu-sub-dropdown w-175px py-4">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Admin Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Staff Group</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3">Member Group</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu sub-->
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">New Contact</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu separator-->
																<div class="separator mt-3 opacity-75"></div>
																<!--end::Menu separator-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<div class="menu-content px-3 py-3">
																		<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																	</div>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu 2-->
															<!--end::Menu-->
														</div>
														<!--end::Action-->
													</div>
													<!--end::Info-->
													<!--begin::Customer-->
													<div class="d-flex flex-stack">
														<!--begin::Name-->
														<span class="text-gray-500 fw-bold">To: 
														<a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Kevin Leonard</a></span>
														<!--end::Name-->
														<!--begin::Label-->
														<span class="badge badge-light-danger">Confirmed</span>
														<!--end::Label-->
													</div>
													<!--end::Customer-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Scroll-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::List widget 5-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->

						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/pages/user-profile/general.js"></script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
		<script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>