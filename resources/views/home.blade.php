{{-- @extends('layouts.' . $layouts[$selectedLayoutIndex]->name) --}}
@extends('layouts.' . $selectedLayout)

{{-- @extends('layouts.app2') --}}


@push('styles')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ auth()->user()->layout->css_file_path }}" rel="stylesheet"> --}}
@endpush

@section('row_content')
    <!-- begin::Col-->
    <div class="col-12 col-xxl-12 col-md-12 mb-xxl-10">

        <!--begin::Mixed Widget 5-->
        <div class="card card-bordered">
            <div class="card-body">
                <!-- Button container -->
                <div style="position: absolute; top: 0; right: 0; z-index: 2;">
                    @canany(['user edit', 'role edit', 'permission edit'])
                        <x-button type="button" id="btnImage" style="margin-right: 10px;" class="btn-sm btn-light m-5" text="Export">Export</x-button>
                    @endcanany
                </div>
                <canvas id="kt_chartjs_1" class="mh-400px"></canvas>
            </div>
        </div>
        <!--end::Mixed Widget 5-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xxl-8 col-md-8 mb-xxl-10">
        <!--begin::Mixed Widget 5-->
        <div class="card card-bordered">
            <div class="card-body">
                <div id="kt_amcharts_3" style="height: 500px;"></div>
            </div>
        </div>
        <!--end::Mixed Widget 5-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xxl-4 col-md-4 mb-xxl-10">
        <!--begin::Security recent alerts-->
        <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::Carousel-->
                <div id="kt_security_recent_alerts" class="carousel carousel-custom carousel-stretch slide"
                    data-bs-ride="carousel" data-bs-interval="3000">
                    <!--begin::Heading-->
                    <div class="d-flex flex-stack align-items-center flex-wrap">
                        <h4 class="text-gray-400 fw-semibold mb-0 pe-2">Recent Alerts</h4>
                        <!--begin::Carousel Indicators-->
                        <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                            <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="0" class="ms-1 active"></li>
                            <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="1" class="ms-1"></li>
                            <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="2" class="ms-1"></li>
                        </ol>
                        <!--end::Carousel Indicators-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Carousel inner-->
                    <div class="carousel-inner pt-6">
                        <!--begin::Item-->
                        <div class="carousel-item active">
                            <!--begin::Wrapper-->
                            <div class="carousel-wrapper">
                                <!--begin::Description-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Latest
                                        Announcements</a>
                                    <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">In the last year, you’ve probably
                                        had to adapt to new ways of living and working.</p>
                                </div>
                                <!--end::Description-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack pt-8">
                                    <span class="badge badge-light-primary fs-7 fw-bold me-2">Jun 10, 2021</span>
                                    <a href="#" class="btn btn-sm btn-light">Learn More</a>
                                </div>
                                <!--end::Summary-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="carousel-item">
                            <!--begin::Wrapper-->
                            <div class="carousel-wrapper">
                                <!--begin::Description-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Login Attempt Failed</a>
                                    <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">As we approach one year of working
                                        remotely, we wanted to take a look back and share some ways teams around the world
                                        have collaborated effectively.</p>
                                </div>
                                <!--end::Description-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack pt-8">
                                    <span class="badge badge-light-primary fs-7 fw-bold me-2">Oct 05, 2021</span>
                                    <a href="#"
                                        class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Join</a>
                                </div>
                                <!--end::Summary-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="carousel-item">
                            <!--begin::Wrapper-->
                            <div class="carousel-wrapper">
                                <!--begin::Description-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Top Picks For You</a>
                                    <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">Today we are excited to share an
                                        amazing certification opportunity which is designed to teach you everything</p>
                                </div>
                                <!--end::Description-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack pt-8">
                                    <span class="badge badge-light-primary fs-7 fw-bold me-2">Sep 11, 2021</span>
                                    <a href="#"
                                        class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Collaborate</a>
                                </div>
                                <!--end::Summary-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Carousel inner-->
                </div>
                <!--end::Carousel-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Security recent alerts-->
        <!--begin::Security guidelines-->
        <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::Carousel-->
                <div id="kt_security_guidelines" class="carousel carousel-custom carousel-stretch slide"
                    data-bs-ride="carousel" data-bs-interval="8000">
                    <!--begin::Heading-->
                    <div class="d-flex flex-stack align-items-center flex-wrap">
                        <h4 class="text-gray-400 fw-semibold mb-0 pe-2">Security Guidelines</h4>
                        <!--begin::Carousel Indicators-->
                        <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                            <li data-bs-target="#kt_security_guidelines" data-bs-slide-to="0" class="ms-1 active"></li>
                            <li data-bs-target="#kt_security_guidelines" data-bs-slide-to="1" class="ms-1"></li>
                            <li data-bs-target="#kt_security_guidelines" data-bs-slide-to="2" class="ms-1"></li>
                        </ol>
                        <!--end::Carousel Indicators-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Carousel inner-->
                    <div class="carousel-inner pt-6">
                        <!--begin::Item-->
                        <div class="carousel-item active">
                            <!--begin::Wrapper-->
                            <div class="carousel-wrapper">
                                <!--begin::Description-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Get Start Your
                                        Security</a>
                                    <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">In the last year, you’ve probably
                                        had to adapt to new ways of living and working.</p>
                                </div>
                                <!--end::Description-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack pt-8">
                                    <span class="text-muted fw-semibold fs-6 pe-2">34, Soho Avenue, Tokio</span>
                                    <a href="#" class="btn btn-sm btn-light">Register</a>
                                </div>
                                <!--end::Summary-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="carousel-item">
                            <!--begin::Wrapper-->
                            <div class="carousel-wrapper">
                                <!--begin::Description-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Security Policy
                                        Update</a>
                                    <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">As we approach one year of working
                                        remotely, we wanted to take a look back and share some ways teams around the world
                                        have collaborated effectively.</p>
                                </div>
                                <!--end::Description-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack pt-8">
                                    <span class="badge badge-light-primary fs-7 fw-bold me-2">Oct 05, 2021</span>
                                    <a href="#"
                                        class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Explore</a>
                                </div>
                                <!--end::Summary-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="carousel-item">
                            <!--begin::Wrapper-->
                            <div class="carousel-wrapper">
                                <!--begin::Description-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#" class="fw-bold text-dark text-hover-primary">Terms Of Use
                                        Document</a>
                                    <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">Today we are excited to share an
                                        amazing certification opportunity which is designed to teach you everything</p>
                                </div>
                                <!--end::Description-->
                                <!--begin::Summary-->
                                <div class="d-flex flex-stack pt-8">
                                    <span class="badge badge-light-primary fs-7 fw-bold me-2">Nov 10, 2021</span>
                                    <a href="#"
                                        class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Discover</a>
                                </div>
                                <!--end::Summary-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Carousel inner-->
                </div>
                <!--end::Carousel-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Security guidelines-->
    </div>
    <!--end::Col-->

    {{-- <style> 
    body {
        color: {{ $styles->body_color }};
        background-color: {{ $styles->body_bg }};
        font-size: {{ $styles->font_size }};
        font-weight: {{ $styles->font_weight }};
        font-family: {{ $styles->font_family }};
    }

    header {
        background-color: {{ $styles->header_desktop_fixed_bg_color }};
        box-shadow: 0px 1px 5px {{ $styles->header_desktop_fixed_shadow }};
    }

    header.tablet, header.mobile {
        background-color: {{ $styles->header_tablet_and_mobile }};
        box-shadow: 0px 1px 5px {{ $styles->header_tablet_and_mobile_shadow }};
    }

    aside {
        background-color: {{ $styles->aside_bg_color }};
    }

    .page-bg {
        background-color: {{ $styles->page_bg }};
    }

    .app-blank {
        background-color: {{ $styles->app_blank_bg }};
    }

    button {
        background-color: {{ $styles->button_color }};
    }

    .text {
        color: {{ $styles->text_color }};
    }

    div {
        border-color: {{ $styles->div_border_color }};
        border-radius: {{ $styles->border_radius }};
        margin: {{ $styles->div_margin }};
        padding: {{ $styles->div_padding }};
    }

    p {
        margin: {{ $styles->paragraph_margin }};
    }
    </style>  --}}
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <Script>
        am5.ready(function() {
            var root = am5.Root.new("kt_amcharts_3");

            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                layout: root.verticalLayout
            }));


            var series = chart.series.push(am5percent.PieSeries.new(root, {
                alignLabels: true,
                calculateAggregates: true,
                valueField: "value",
                categoryField: "category"
            }));

            series.slices.template.setAll({
                strokeWidth: 3,
                stroke: am5.color(0xffffff)
            });

            series.labelsContainer.set("paddingTop", 30)

            series.slices.template.adapters.add("radius", function(radius, target) {
                var dataItem = target.dataItem;
                var high = series.getPrivate("valueHigh");

                if (dataItem) {
                    var value = target.dataItem.get("valueWorking", 0);
                    return radius * value / high
                }
                return radius;
            });

            series.data.setAll([{
                value: 10,
                category: "One"
            }, {
                value: 9,
                category: "Two"
            }, {
                value: 6,
                category: "Three"
            }, {
                value: 5,
                category: "Four"
            }, {
                value: 4,
                category: "Five"
            }, {
                value: 3,
                category: "Six"
            }]);

            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50,
                marginTop: 15,
                marginBottom: 15
            }));

            legend.data.setAll(series.dataItems);

            series.appear(1000, 100);

        });
    </Script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <Script>
        var ctx = document.getElementById('kt_chartjs_1');

        // Define colors
        var primaryColor = '#0d6efd'; // Bootstrap primary color
        var dangerColor = '#dc3545'; // Bootstrap danger color
        var successColor = '#28a745'; // Bootstrap success color
        var infoColor = '#9784b8'; // Bootstrap info color

        // Define fonts
        var fontFamily = 'sans-serif'; // Basic sans-serif font

        // Chart labels
        const labels = ["{{ __('months.january') }}", "{{ __('months.february') }}", "{{ __('months.march') }}",
            "{{ __('months.april') }}", "{{ __('months.may') }}", "{{ __('months.june') }}", "{{ __('months.july') }}",
            "{{ __('months.august') }}", "{{ __('months.september') }}", "{{ __('months.october') }}",
            "{{ __('months.november') }}", "{{ __('months.december') }}"
        ];

        // Chart data
        const data = {
            labels: labels,
            datasets: [{
                    label: "{{ __('months.dataset') }} 1",
                    data: [12, 19, 3, 5, 2, 3, 7, 8, 15, 17, 20, 25],
                    backgroundColor: primaryColor,
                },
                {
                    label: "{{ __('months.dataset') }} 2",
                    data: [15, 10, 8, 14, 12, 7, 14, 15, 10, 9, 15, 20],
                    backgroundColor: dangerColor,
                },
                {
                    label: "{{ __('months.dataset') }} 3",
                    data: [7, 11, 5, 8, 3, 7, 10, 15, 20, 15, 10, 5],
                    backgroundColor: successColor,
                },
                {
                    label: "{{ __('months.dataset') }} 4",
                    data: [15, 20, 10, 12, 15, 20, 18, 16, 14, 12, 10, 15],
                    backgroundColor: infoColor,
                }
            ]
        };

        // Chart config
        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
                interaction: {
                    intersect: false,
                },
                scales: {
                    x: {
                        grouped: true,
                    },
                    y: {
                        grouped: true
                    }
                }
            },
            defaults: {
                global: {
                    defaultFont: fontFamily
                }
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx, config);
    </Script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- This script is the same as the about but it allows auto apdates to happen in real time --}}
    <script>
        // Function to generate random data points
        function generateRandomData() {
            return Math.floor(Math.random() * 100);
        }

        var ctx = document.getElementById('kt_chartjs_1');

        // Define colors
        var primaryColor = '#0d6efd'; // Bootstrap primary color
        var dangerColor = '#dc3545'; // Bootstrap danger color
        var successColor = '#28a745'; // Bootstrap success color
        var infoColor = '#9784b8'; // Bootstrap info color

        // Define fonts
        var fontFamily = 'sans-serif'; // Basic sans-serif font

        // Chart labels
        const labels = ["{{ __('months.january') }}", "{{ __('months.february') }}", "{{ __('months.march') }}",
            "{{ __('months.april') }}", "{{ __('months.may') }}", "{{ __('months.june') }}",
            "{{ __('months.july') }}", "{{ __('months.august') }}", "{{ __('months.september') }}",
            "{{ __('months.october') }}", "{{ __('months.november') }}", "{{ __('months.december') }}"
        ];

        // Chart data
        const data = {
            labels: labels,
            datasets: [{
                    label: "{{ __('months.dataset') }} 1",
                    data: [12, 19, 3, 5, 2, 3, 7, 8, 15, 17, 20, 25],
                    backgroundColor: primaryColor,
                },
                {
                    label: "{{ __('months.dataset') }} 2",
                    data: [15, 10, 8, 14, 12, 7, 14, 15, 10, 9, 15, 20],
                    backgroundColor: dangerColor,
                },
                {
                    label: "{{ __('months.dataset') }} 3",
                    data: [7, 11, 5, 8, 3, 7, 10, 15, 20, 15, 10, 5],
                    backgroundColor: successColor,
                },
                {
                    label: "{{ __('months.dataset') }} 4",
                    data: [15, 20, 10, 12, 15, 20, 18, 16, 14, 12, 10, 15],
                    backgroundColor: infoColor,
                }
            ]
        };

        // Chart config
        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
                interaction: {
                    intersect: false,
                },
                scales: {
                    x: {
                        grouped: true,
                    },
                    y: {
                        grouped: true
                    }
                }
            },
            defaults: {
                global: {
                    defaultFont: fontFamily
                }
            }
        };

        // Init ChartJS
        var myChart = new Chart(ctx, config);

        // Function to append new data points and labels
        function appendData() {
            // Generate a new label. You can change this according to your requirements
            const newLabel = 'New Month';

            // Append new label
            myChart.data.labels.push(newLabel);

            // Append new data to each dataset
            myChart.data.datasets.forEach((dataset) => {
                dataset.data.push(generateRandomData());
            });

            // Update the chart
            myChart.update();
        }
        /////////////////////////////////////// The export to img functionality within the auto update script /////////////////////////
        function exportAsImage() {
            var link = document.createElement('a');
            link.download = 'chart.png';
            link.href = document.getElementById('kt_chartjs_1').toDataURL();
            link.click();
        }

        // Get the button element by its ID and attach the export function to its click event
        var buttonImage = document.getElementById("btnImage");
        buttonImage.addEventListener("click", exportAsImage);

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Append new data every 3 minutes (180000 milliseconds)
        setInterval(appendData, 180000);
    </script>


    <script type="text/javascript">
        function startIntro() {
            var intro = introJs();
            intro.setOptions({
                steps: [{
                        intro: "Welcome to our site!"
                    },
                    {
                        element: document.querySelector('#step1'),
                        intro: "This is the first step."
                    },
                    {
                        element: document.querySelector('#step2'),
                        intro: "This is the second step."
                    },
                    // Add more steps as needed
                ]
            });
            intro.start();
        }
    </script>
@endpush
