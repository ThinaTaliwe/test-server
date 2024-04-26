@extends('layouts.app2')

@push('styles')
    {{-- Start External Libraries and Stylesheets --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/23.2.3/css/dx.material.blue.light.css" />
    {{-- <link rel="stylesheet" type="text/css" href="styles.css" /> --}}
    {{-- <script src="index.js"></script> --}}

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.2.3/css/dx.light.css">
    {{-- <link rel="stylesheet" href="index.css"> --}}

    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.2.3/js/dx.all.js"></script>
    {{-- <script type="text/javascript" src="index.js"></script> --}}

    <style>
        #pivotgrid,
        #pivotgrid-chart {
            margin-top: 20px;
            padding: 20px 20px;
        }

        .currency {
            text-align: center;
        }

        .dx-pivotgrid-container {
            background-color: lightgray;
        }
    </style>

    <script>
        function initializeComponents(data) {
            const pivotGrid = $('#pivotgrid').dxPivotGrid({
                dataSource: {
                    fields: [{
                            caption: 'Primary Person ID',
                            dataField: 'primary_person_id',
                            area: 'row'
                        },
                        {
                            caption: 'Secondary Person ID',
                            dataField: 'secondary_person_id',
                            area: 'row'
                        },
                        {
                            caption: 'Relationship ID',
                            dataField: 'person_relationship_id',
                            area: 'row'
                        },
                        {
                            caption: 'Start Date',
                            dataField: 'start_date',
                            dataType: 'date',
                            area: 'column'
                        },
                        {
                            caption: 'End Date',
                            dataField: 'end_date',
                            dataType: 'date',
                            area: 'column'
                        }
                    ],
                    store: data
                },
                allowSortingBySummary: true,
                allowFiltering: true,
                showBorders: true,
                fieldChooser: {
                    enabled: true,
                    height: 400
                }, export: {enabled: true}  // Enable exporting
            }).dxPivotGrid('instance');

            const pivotGridChart = $('#pivotgrid-chart').dxChart({
                commonSeriesSettings: {
                    type: 'line'
                },
                tooltip: {
                    enabled: true,
                    format: 'currency',
                    customizeTooltip(args) {
                        return {
                            html: `${args.seriesName} | ${args.valueText}`
                        };
                    }
                },
                size: {
                    height: 350
                },
                adaptiveLayout: {
                    width: 450
                },
                export: {enabled: true}  // Enable exporting
            }).dxChart('instance');

            pivotGrid.bindChart(pivotGridChart, {
                dataFieldsDisplayMode: 'splitPanes',
                alternateDataFields: false
            });
        }
    </script>
@endpush


@section('row_content')
    <div class="dx-viewport p-16">
        <div class="demo-container">
            <h1 class='text-center'>Dependants</h1>
            <div id="pivotgrid-demo">
                <div id="pivotgrid-chart"></div>
                <div id="pivotgrid"></div>
            </div>
        </div>
    </div>

    <script>
        function formatCurrency(value) {
            return new Intl.NumberFormat('en-ZA', {
                style: 'currency',
                currency: 'ZAR'
            }).format(value);
        }

        $.ajax({
            //url: 'http://192.168.1.7/dependantsData',
            method: 'GET',
            success: function(data) {
                initializeComponents(data);
            }
        });
    </script>
@endsection


@push('scripts')
@endpush
