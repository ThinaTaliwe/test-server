{{-- @extends('layouts.app2')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@section('row_content')
    <div class="card mx-auto border-gba bg-gba-light p-4 my-4">
        @foreach ($memberships as $membership)
            <div>
                <h3 class="card-title bg-gba">Membership ID: {{ $membership->membership_code }}</h3>
                <p>Belongs to: {{ $membership->person->first_name }}</p>
                @if ($membership->person->dependant->isNotEmpty())
                    <p class="card-title bg-gba-light">Dependants under this Membership:</p>
                    <ul>
                        @foreach ($membership->person->dependant as $dependant)
                            <li>
                                {{ $dependant->secondaryPerson->first_name }} - Relationship:
                                {{ $dependant->relationshipType->name }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No dependants under this membership.</p>
                @endif
            </div>
        @endforeach
    </div>



    <div class="bg-gba-light rounded">
        <table id="kt_datatable_row_grouping" class="table table-striped table-row-bordered gy-5 gs-7 border rounded w-100">
            <thead class="bg-gba">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    <script>
        var groupColumn = 2;

        var table = $("#kt_datatable_row_grouping").DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "order": [
                [groupColumn, "asc"]
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: "current"
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: "current"
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            "<tr class=\"group fs-5 fw-bolder\"><td colspan=\"5\">" + group +
                            "</td></tr>"
                        );

                        last = group;
                    }
                });
            }
        });

        $("#kt_datatable_row_grouping tbody").on("click", "tr.group", function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === "asc") {
                table.order([groupColumn, "desc"]).draw();
            } else {
                table.order([groupColumn, "asc"]).draw();
            }
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush --}}

@extends('layouts.app2')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    .hidden {
        display: none;
    }
    .btn-toggle-expand {
        background-color: #28a745; /* Bootstrap green */
        color: white;             /* White text color for better contrast */
        border: none;             /* No border for a cleaner look */
        cursor: pointer;          /* Cursor changes to pointer to indicate it's clickable */
    }
    .btn-toggle-expand i {
        color: white;             /* Ensures the icon is also white for visibility */
    }
</style>

@endpush

@section('row_content')
    {{-- <div class="card mx-auto border-gba bg-gba-light p-4 my-4">
        @foreach ($memberships as $membership)
            <div>
                <h3 class="card-title bg-gba">Membership ID: {{ $membership->membership_code }}</h3>
                <p>Belongs to: {{ $membership->person->first_name }}</p>
                @if ($membership->person->dependant->isNotEmpty())
                    <p class="card-title bg-gba-light">Dependants under this Membership:</p>
                    <ul>
                        @foreach ($membership->person->dependant as $dependant)
                            <li>
                                {{ $dependant->secondaryPerson->first_name }} - Relationship:
                                {{ $dependant->relationshipType->name }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No dependants under this membership.</p>
                @endif
            </div>
        @endforeach
    </div> --}}


    {{-- <p>{{ $membership->surname }}</p> --}}
    <div class="bg-gba-light rounded border-gba-light">
        <div class="bg-gba p-1 m-2 rounded border-gba-light">
            <h1 class="text-center mt-1">Deaths</h1>
        </div>
        <table id="kt_datatable_row_grouping"
            class="table table-striped table-row-bordered gy-5 gs-7 border-gba-light rounded w-100">
            <thead class="bg-gba">
                <tr>
                    <th>Membership ID</th>
                    <th>Main Member Details</th>
                    <th>Dependant Name</th>
                    <th>Relationship</th>
                    <th>Additional Details</th>
                </tr>
            </thead>
            <!-- Assuming the previous sections remain unchanged, focus on the tbody content -->

            <tbody>
                @foreach ($memberships as $membership)
                    <!-- Main member row with data-group for identification -->
            <tr class="group-header" data-group="{{ $membership->membership_code }}">
                <td>
                    <button class="btn btn-icon btn-toggle-expand btn-sm" aria-expanded="false"  style="background-color: #28a745; color: white; border: none;">
                        <i class="bi bi-plus-lg"></i>
                    </button>
                    {{ $membership->membership_code }}
                </td>
                <td>{{ $membership->person->first_name }} {{ $membership->person->surname }}</td>
                <td><!-- Placeholder for main member row --></td>
                <td><!-- Placeholder --></td>
                <td><!-- Additional details placeholder for main member --></td>
            </tr>

                    @foreach ($membership->person->dependant as $dependant)
                        <!-- Dependant rows with data-group for parent identification -->
                        <tr class="dependant-row hidden" data-group="{{ $membership->membership_code }}">
                            <td>{{ $membership->membership_code }}</td>
                            <td><!-- Placeholder; could be empty --></td>
                            <td>{{ $dependant->secondaryPerson->first_name }} {{ $dependant->secondaryPerson->surname }}
                            </td>
                            <td>{{ $dependant->relationshipType->name }}</td>
                            <td><!-- Additional dependant details here --></td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>

        </table>
    </div>



@endsection


@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

<script>
    var myJQuery = jQuery.noConflict(true);
    myJQuery(document).ready(function($) {
        // Initialize the DataTable with grouping but without automatically hiding any rows
        var table = $('#kt_datatable_row_grouping').DataTable({
            "columnDefs": [{
                "targets": [0], // Optionally hide the Membership ID column
                "visible": true
            }],
            "order": [
                [0, 'asc']
            ],
            // Removed the "drawCallback" for brevity, assuming it's similar to previous implementations
        });

        // Toggle visibility of dependant rows and icon on group header button click
        $('#kt_datatable_row_grouping tbody').on('click', 'button.btn-toggle-expand', function() {
            var membershipCode = $(this).closest('tr').data('group');
            // Find all dependant rows belonging to the clicked group and toggle their visibility
            var dependantRows = $("tr.dependant-row[data-group='" + membershipCode + "']");
            dependantRows.toggleClass('hidden');
            $(this).attr('aria-expanded', function(i, attr){
                return attr == 'false' ? 'true' : 'false';
            });
            // Toggle icon
            $(this).find('i').toggleClass('bi-plus-lg bi-dash-lg');
        });
    });
</script>

@endpush

