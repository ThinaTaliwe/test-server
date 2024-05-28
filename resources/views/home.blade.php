{{-- @extends('layouts.' . $layouts[$selectedLayoutIndex]->name) --}}
@extends('layouts.' . $selectedLayout)

{{-- @extends('layouts.app2') --}}

@push('styles')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ auth()->user()->layout->css_file_path }}" rel="stylesheet"> --}}
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('row_content')
    <!-- begin::Col-->
    <div class="col-12 col-xxl-12 col-md-12 mb-1 rounded">

        <!--begin::Mixed Widget 5-->
        <div class="card border-gba shadow-lg">
            <div class="card-body" data-intro="Welcome to main dashboard...This Is Membership Graphical View." data-step="1">
                <!-- Button container -->
                <div style="position: absolute; top: 0; right: 0; z-index: 2;" data-intro="Export To An Image Copy" data-step="2">
                    @canany(['user edit', 'role edit', 'permission edit'])
                        <x-button type="button" id="btnImage" style="margin-right: 10px;" class="btn-sm bg-gba m-5" text="Export">Export</x-button>
                    @endcanany
                </div>
                <canvas id="kt_chartjs_1" class="mh-400px"></canvas>
            </div>
        </div>
        <!--end::Mixed Widget 5-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xxl-8 col-md-8 mb-4">
        <!--begin::Mixed Widget 5-->
        <div class="card border-gba shadow-lg" data-intro="The Services Breakdown." data-step="3">
            <div class="card-body">
                <div id="kt_amcharts_3" style="height: 500px;"></div>
            </div>
        </div>
        <!--end::Mixed Widget 5-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xxl-4 col-md-4 mb-4">
        <!--begin::List Widget 5-->
        <div class="card h-md-100 border-gba shadow-lg" data-intro="The Services Schedule." data-step="4">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bold mb-2 text-gray-900">Association Activities</span>
                    <span class="text-primary fw-semibold fs-7">120 Memorial Services</span>
                </h3>
                <div class="card-toolbar">
                    <!-- Button and menu structure can remain as is for functionality purposes -->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::Timeline-->
                <div class="timeline-label">
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">09:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-warning fs-1"></i>
                        </div>
                        <div class="fw-mormal timeline-content ps-3">Planning meeting for annual memorial service</div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">08:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-info fs-1"></i>
                        </div>
                        <div class="timeline-content fw-mormal ps-3">Monthly meeting with the board of directors</div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">10:30</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-success fs-1"></i>
                        </div>
                        <div class="timeline-content fw-mormal ps-3">Workshop on grief counseling for members</div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">13:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-warning fs-1"></i>
                        </div>
                        <div class="timeline-content fw-mormal ps-3">Outreach program planning for the local community</div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">16:30</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-danger fs-1"></i>
                        </div>
                        <div class="timeline-content fw-mormal ps-3">Volunteer training session for upcoming charity event</div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">19:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-primary fs-1"></i>
                        </div>
                        <div class="timeline-content fw-mormal ps-3">Evening vigil to honor members who have passed away</div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">12:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-success fs-1"></i>
                        </div>
                        <div class="timeline-content d-flex">
                            <span class="fw-bold text-gray-800 ps-3">Burial service for member John Doe</span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">15:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-danger fs-1"></i>
                        </div>
                        <div class="timeline-content fw-bold text-gray-800 ps-3">Financial assistance disbursed to the Doe family</div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="timeline-item">
                        <div class="timeline-label fw-bold text-gray-800 fs-6">18:00</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-primary fs-1"></i>
                        </div>
                        <div class="timeline-content fw-mormal ps-3">Review meeting for upcoming association events</div>
                    </div>
                    <!--end::Item-->
                    <!-- More items can be added as needed -->
                </div>
                <!--end::Timeline-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end: List Widget 5-->
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

    {{-- <Script>
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
    </Script> --}}

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
                var value = dataItem.get("valueWorking", 0);
                return radius * value / high
            }
            return radius;
        });

        series.data.setAll([{
            value: 120,
            category: "Funerals"
        }, {
            value: 50,
            category: "Cremations"
        }, {
            value: 30,
            category: "Burials"
        }, {
            value: 15,
            category: "Pre-Planned Arrangements"
        }, {
            value: 80,
            category: "Memorial Services"
        }, {
            value: 20,
            category: "Aftercare Services"
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
                    label: "[Age < 35]",
                    data: [21, 79, 73, 95, 42, 83, 67, 82, 95, 67, 28, 25],
                    backgroundColor: primaryColor,
                },
                {
                    label: "[35 < Age < 45]",
                    data: [51, 51, 48, 47, 82, 57, 49, 58, 55, 69, 15, 62],
                    backgroundColor: dangerColor,
                },
                {
                    label: "[45 < Age < 65]",
                    data: [77, 11, 85, 98, 43, 57, 10, 15, 20, 15, 10, 65],
                    backgroundColor: successColor,
                },
                {
                    label: "[Age > 65]",
                    data: [51, 20, 43, 61, 51, 78, 81, 68, 46, 62, 74, 58],
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
                display: true,
                text: 'Joined Members Per Month' // Add your chart title here
            }
        },
        responsive: true,
        interaction: {
            intersect: false,
        },
        scales: {
            x: {
                grouped: true,
                title: {
                    display: true,
                    text: 'Months' // Add your x-axis label here
                }
            },
            y: {
                grouped: true,
                title: {
                    display: true,
                    text: 'Number of members' // Add your y-axis label here
                }
            }
        }
    },
    defaults: {
        global: {
            defaultFontFamily: 'Arial' // Assuming 'fontFamily' variable was intended to be a string. Adjust as necessary.
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
        setInterval(appendData, 30000);
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
