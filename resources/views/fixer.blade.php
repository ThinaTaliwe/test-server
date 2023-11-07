@extends('layouts.app2')

@push('styles')
    <title>Transfer Logs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@section('content')
    <div class="container rounded bg-info-subtle">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <h2 class="mt-9" style="margin-left: auto; margin-right: auto; width: fit-content;">Data Sanitizer</h2>
                <h4 class="mt-4" style="margin-left: auto; margin-right: auto; width: fit-content;">Select Module and
                    Component</h4>
                <select id="module-select" class="form-control my-3">
                    <option disabled selected>Select a module</option>
                    <!-- Modules will be populated here -->
                </select>

                <select id="component-select" class="form-control my-3">
                    <option disabled selected>Select a component</option>
                    <!-- Components will be populated here -->
                </select>
            </div>
        </div>

        <!-- Unmatched Values Card -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                {{-- <div class="card">
                    <div class="card-header">Unmatched Values</div>
                    <div class="card-body">
                        <table id="unmatched-logs-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Source Table</th>
                                    <th>Target Table</th>
                                    <th>Missing Field</th>
                                    <th>Source Column</th>
                                    <th>Source Value</th>
                                    <th>Related Record</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Unmatched logs will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <!-- Combined Card -->
                <div class="card mt-5 mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Unmatched Values</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Total unmatched records</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="unmatched-logs-table" class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="ps-4 min-w-30px rounded-start">ID</th>
                                        <th class="min-w-125px">Source Table</th>
                                        <th class="min-w-125px">Target Table</th>
                                        <th class="min-w-150px">Missing Field</th>
                                        <th class="min-w-150px">Source Column</th>
                                        <th class="min-w-150px">Source Value</th>
                                        <th class="min-w-150px">Related Record</th>
                                        <th class="pr-4 min-w-200px text-end rounded-end">Actions</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                
                                <!--begin::Table body-->
                                
                                <tbody>
                                    <!-- Unmatched logs will be populated here -->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>

                <!-- Missing Values Card -->
                <div class="card mb-5 mb-xl-8 mt-5">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Missing Values</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Details of missing values</span>
                        </h3>
                        <!-- Uncomment this if you need a toolbar
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Tooltip info">
                            <a href="#" class="btn btn-sm btn-light btn-active-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>Action</a>
                        </div>
                        -->
                    </div>
                    <!--end::Header-->
                    
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="missing-logs-table" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="ps-4 min-w-30px rounded-start">ID</th>
                                        <th class="min-w-125px">Source Table</th>
                                        <th class="min-w-125px">Target Table</th>
                                        <th class="min-w-150px">Missing Field</th>
                                        <th class="min-w-150px">Source Column</th>
                                        <th class="min-w-50px">Source Value</th>
                                        <th class="min-w-150px">Related Record</th>
                                        <th class="pr-4 min-w-200px text-end rounded-end">Actions</th>
                                    </tr>
                                </thead>
                                {{-- <thead>
                                    <tr class="fw-bold text-muted">
                                        <th>ID</th>
                                        <th>Source Table</th>
                                        <th>Target Table</th>
                                        <th>Missing Field</th>
                                        <th>Source Column</th>
                                        <th>Source Value</th>
                                        <th>Related Record</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead> --}}
                                <!--end::Table head-->
                                
                                <!--begin::Table body-->
                                <tbody>
                                    <!-- Missing logs will be populated here -->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Body-->
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery and Bootstrap 5 Bundle -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch modules
            $.get('/modules', function(data) {
                data.forEach(function(module) {
                    var badge = module.components.some(component => component.transfer_logs_count >
                        0) ? '( ! )' : '';
                    $('#module-select').append('<option value="' + module.id + '">' + module
                        .module_name + ' ' + badge + '</option>');
                });
            });

            // Fetch components when a module is selected
            $('#module-select').change(function() {
                var moduleId = $(this).val();
                $.get('/modules/' + moduleId + '/components', function(data) {
                    $('#component-select').empty().append(
                        '<option disabled selected>Select a component</option>');
                    data.forEach(function(component) {
                        var badge = component.transfer_logs_count > 0 ? ' (' + component
                            .transfer_logs_count + ')' : '';
                        $('#component-select').append('<option value="' + component.id +
                            '">' + component.component_name + ' ' + badge + '</option>');
                    });
                });
            });

            // Fetch and display logs when a component is selected
            $('#component-select').change(function() {
                var moduleId = $('#module-select').val();
                var componentId = $(this).val();
                $.get('/modules/' + moduleId + '/components/' + componentId + '/logs', function(data) {
                    // Clear existing logs
                    $('#unmatched-logs-table tbody').empty();
                    $('#missing-logs-table tbody').empty();

                    // Populate logs
                    data.forEach(function(log) {
                        var relatedRecord = '';
                        if (log.target_record) {
                            for (var key in log.target_record) {
                                var value = log.target_record[key];
                                relatedRecord += '<strong>' + key.charAt(0).toUpperCase() +
                                    key.slice(1).replace('_', ' ') + ':</strong> ' + value +
                                    '<br>';
                            }
                        }

                        // Create new table row
                        var bgColor = (log.id % 2 === 0) ? 'bg-tetiary' : 'bg-secondary';

var newRow = '<tr class="fw-bold ' + bgColor + ' m-5 border border-solid">' +
                        '<td class="rounded-start">' + log.id + '</td>' +
                        '<td>' + log.source_table + '</td>' +
                        '<td>' + log.target_table + '</td>' +
                        '<td>' + log.missing_field + '</td>' +
                        '<td>' + log.source_column + '</td>' +
                        '<td>' + log.source_value + '</td>' +
                        '<td>' + relatedRecord + '</td>' +
                        '<td class="pr-4 min-w-200px text-end rounded-end">' +
                        '<form class="fix-form" data-log-id="' + log.id + '">' +
                        '<input type="hidden" name="_token" value="' + $(
                            'meta[name="csrf-token"]').attr('content') + '">' +
                        '<select name="fix_value" class="form-control">';


                        if (log.replacement_values) {
                            var replacement_values = Object.entries(log.replacement_values);
                            replacement_values.forEach(function([id, value]) {
                                newRow += '<option value="' + id + '">' + value +
                                    '</option>';
                            });
                        }
                        newRow += '</select>' +
                            '<button type="submit" class="btn btn-primary mt-3">Fix</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>';

                        // Append to appropriate table
                        if (log.source_value.trim() === '') {
                            $('#missing-logs-table tbody').append(newRow);
                        } else {
                            $('#unmatched-logs-table tbody').append(newRow);
                        }
                    });
                });
            });
        });

        $(document).on('submit', '.fix-form', function(e) {
            e.preventDefault();

            var form = $(this);
            var logId = form.data('log-id');
            var fixValue = form.find('select[name="fix_value"]').val();

            $.ajax({
                url: '/fixer/fix_log/' + logId,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    fix_value: fixValue
                },
                success: function() {
                    // Remove the fixed row from the table
                    form.closest('tr').remove();
                    swal("Success", "The log has been successfully fixed.", "success");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    swal("Error", "Could not fix the log. Please try again.", "error");
                }
            });
        });
    </script>
@endpush

