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
                    <th>Actions</th>
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
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#record_death_modal" class="btn btn-icon btn-danger" data-member-id="{{ $membership->person->id }}" title="Mark As Deceased"><i class="bi bi-person-x-fill fs-4 me-0"></i></a>
                </td>
            </tr>

                    @foreach ($membership->person->dependant as $dependant)
                        <!-- Dependant rows with data-group for parent identification -->
                        <tr class="dependant-row hidden" data-group="{{ $membership->membership_code }}">
                            <td>{{ $membership->membership_code }}</td>
                            <td><!-- Placeholder; could be empty --></td>
                            <td>{{ $dependant->secondaryPerson->first_name }} {{ $dependant->secondaryPerson->surname }}
                            </td>
                            <td>{{ $dependant->relationshipType->name }}</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#record_death_modal" class="btn btn-icon btn-danger" data-member-id="{{ $dependant->secondaryPerson->id }}" title="Mark As Deceased"><i class="bi bi-person-x fs-4 me-0"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>

        </table>
    </div>


    
                                <!-- Start Death Modal -->
                                <div class="modal fade" tabindex="-1" id="record_death_modal">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content" style="background-color: #448C74">
                                            <div class="modal-header">
                                                <h3 class="modal-title text-white">Record Death</h3>
                                
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <form id="recordDeath" method="POST" action="{{ route('StoreFuneralAddress') }}">
                                                @csrf
                                            <div class="modal-body">
                                                
                                                



                                                <div  class="pt-4 p-3">
                                                


                                                                <!-- Contact Details of Person Reporting Death -->
                                                                <h4 class="text-white mb-3">Contact Details of Person Reporting Death:</h4>
                                                            <!-- Contact Details of Person Reporting Death -->
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="reporting_name" class="form-label text-white">Name:</label>
                                                                    <input type="text" class="form-control" id="reporting_name" name="reporting_name">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="reporting_surname" class="form-label text-white">Surname:</label>
                                                                    <input type="text" class="form-control" id="reporting_surname" name="reporting_surname">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="reporting_tel" class="form-label text-white">Tel:</label>
                                                                    <input type="tel" class="form-control" id="reporting_tel" name="reporting_tel">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="reporting_whatsapp" class="form-label text-white">WhatsApp yes/no:</label>
                                                                    <select class="form-control" id="reporting_whatsapp" name="reporting_whatsapp">
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="reporting_email" class="form-label text-white">E-mail:</label>
                                                                    <input type="email" class="form-control" id="reporting_email" name="reporting_email">
                                                                </div>
                                                            </div>

                                                            <div class="separator border-light my-8"></div>

                                                            <!-- Tracking Number (not in the modal but mentioned in the image) -->
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="tracking_number" class="form-label text-white">Tracking Number:</label>
                                                                    <input type="text" class="form-control" id="tracking_number" name="tracking_number" placeholder="20240321/1453" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="separator border-light my-8"></div>

                                                            <!-- Deceased Details -->
                                                            <h4 class="text-white mb-3">Deceased Person's Details:</h4>
                                                           
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="deceased_name" class="form-label text-white">Name:</label>
                                                                    <input type="text" class="form-control" id="deceased_name" name="deceased_name">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_surname" class="form-label text-white">Surname:</label>
                                                                    <input type="text" class="form-control" id="deceased_surname" name="deceased_surname">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_address" class="form-label text-white">Address:</label>
                                                                    <input type="text" class="form-control" id="deceased_address" name="deceased_address">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_maiden_name" class="form-label text-white">Maiden Name:</label>
                                                                    <input type="text" class="form-control" id="deceased_maiden_name" name="deceased_maiden_name">
                                                                </div>
                                                            </div>
                                                            <div class="row  my-2">
                                                                <div class="col">
                                                                    <label for="deceased_id" class="form-label text-white">ID #:</label>
                                                                    <input type="text" class="form-control" id="deceased_id" name="deceased_id">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_birth_date" class="form-label text-white">Birth Date:</label>
                                                                    <input type="date" class="form-control" id="deceased_birth_date" name="deceased_birth_date">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_age" class="form-label text-white">Age:</label>
                                                                    <input type="number" class="form-control" id="deceased_age" name="deceased_age">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_birth_town" class="form-label text-white">Birth Town:</label>
                                                                    <input type="text" class="form-control" id="deceased_birth_town" name="deceased_birth_town">
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col">
                                                                    <label for="deceased_sex" class="form-label text-white">Sex:</label>
                                                                    <select class="form-control" id="deceased_sex" name="deceased_sex">
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="other">Other</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_marital_status" class="form-label text-white">Marital Status:</label>
                                                                    <select class="form-control" id="deceased_marital_status" name="deceased_marital_status">
                                                                        <option value="single">Single</option>
                                                                        <option value="married">Married</option>
                                                                        <option value="widowed">Widowed</option>
                                                                        <option value="divorced">Divorced</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_language" class="form-label text-white">Language:</label>
                                                                    <input type="text" class="form-control" id="deceased_language" name="deceased_language">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_occupation" class="form-label text-white">Occupation:</label>
                                                                    <input type="text" class="form-control" id="deceased_occupation" name="deceased_occupation">
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col">
                                                                    <label for="deceased_dr_number" class="form-label text-white">DR (BI 1663 NR):</label>
                                                                    <input type="text" class="form-control" id="deceased_dr_number" name="deceased_dr_number">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_date_of_death" class="form-label text-white">Date of Death:</label>
                                                                    <input type="date" class="form-control" id="deceased_date_of_death" name="deceased_date_of_death">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_place_of_death" class="form-label text-white">Place of Death:</label>
                                                                    <input type="text" class="form-control" id="deceased_place_of_death" name="deceased_place_of_death">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="deceased_doctor" class="form-label text-white">Doctor:</label>
                                                                    <input type="text" class="form-control" id="deceased_doctor" name="deceased_doctor">
                                                                </div>
                                                            </div>




                                                </div>
                                                





                                            </div>
                                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-warning" id="recordDeathBtn">Record Death</button> --}}
                                                    <button type="button" class="btn btn-success" id="recordDeathToFuneralBtn">Record & Begin Funeral</button>
                                                </div>
                                        </form>    
                                        </div>
                                    </div>
                                </div>
                            <!-- END Death Modal -->

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



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById('record_death_modal');

        if (modal) {
            modal.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                let memberId = button.getAttribute('data-member-id');

                $.ajax({
                    url: `/person-details/${memberId}`,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in header
                    },
                    success: function(data) {
                        console.log('AJAX success', data); // Log successful data retrieval
                        $('#deceased_name').val(data.name);
                        $('#deceased_surname').val(data.surname);
                        $('#deceased_id').val(data.id_number);     
                        // Format the birth_date to "yyyy-MM-dd" for the date input
    // Extract only the date part (first 10 characters) from the date string
    if (data.birth_date) {
        var dateString = data.birth_date.slice(0, 10); // "1999-02-02"
        $('#deceased_birth_date').val(dateString);
    }
                        $('#deceased_age').val(data.age);          
                        $('#deceased_sex').val(data.sex);            
                        $('#deceased_marital_status').val(data.marital_status_id);        
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX error', status, error); // Log any AJAX errors
                        console.log('Response:', xhr.responseText); // Log the full server response
                    }
                });
            });
        } else {
            console.log('Modal not found'); // Error if modal not found
        }
    });
</script>


    

@endpush

