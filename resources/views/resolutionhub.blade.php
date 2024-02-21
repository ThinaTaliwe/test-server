<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grouped Records</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .inner-card { margin-bottom: 15px; }
    </style>
    <style>
        .record-container {
            border: 1px solid #eee;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9; /* Light background to highlight */
        }
        .action-buttons {
            text-align: right;
            padding-top: 10px; /* Space between record info and buttons */
        }
        </style>
        
</head>
<body>
<div class="container mt-5">
    <h2>Grouped Records by Membership ID</h2>
    @if($paginatedItems->count() > 0)
        @foreach($paginatedItems as $item)
        <form method="POST" action="{{ route('handleMainRecordAction') }}">
            @csrf {{-- CSRF token for form submission --}}
            <div class="card mb-3">
                <div class="card-header">Membership ID: <b>{{ $item['membershipId'] }}</b></div>
                <div class="card-body">
                    <!-- Main Record Card as Form -->
                    @if($item['main'])
                        <div class="card inner-card">
                            <div class="card-header">Main Record</div>
                            <div class="card-body">

                                    <div class="row">
                                        <!-- Membership ID and Membership Type -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="membership_id">Membership ID</label>
                                                <input type="text" class="form-control" id="membership_id" name="membership_id" value="{{ $item['main']->membership_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="membership_type">Membership Type</label>
                                                <input type="text" class="form-control" id="membership_type" name="membership_type" value="{{ $item['main']->membership_type }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- First Name, Initials, and Last Name -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $item['main']->first_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="initials">Initials</label>
                                                <input type="text" class="form-control" id="initials" name="initials" value="{{ $item['main']->initials }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $item['main']->last_name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Screen Name and ID Number -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="screen_name">Screen Name</label>
                                                <input type="text" class="form-control" id="screen_name" name="screen_name" value="{{ $item['main']->screen_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_number">ID Number</label>
                                                <input type="text" class="form-control" id="id_number" name="id_number" value="{{ $item['main']->id_number }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- More fields can be added in similar rows -->

                                    <!-- Example for a single field -->
                                    <div class="form-group">
                                        <label for="birth_date">Birth Date</label>
                                        <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $item['main']->birth_date }}" readonly>
                                    </div>
                                    <!-- Repeat the pattern for additional fields as required -->

                                    <div class="row">
                                        <!-- married_status, gender_id, and join_date -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="married_status">Marriage Status</label>
                                                <input type="text" class="form-control" id="married_status" name="married_status" value="{{ $item['main']->married_status }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gender_id">Gender_id</label>
                                                <input type="text" class="form-control" id="gender_id" name="gender_id" value="{{ $item['main']->gender_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="join_date">Join Date</label>
                                                <input type="text" class="form-control" id="join_date" name="join_date" value="{{ $item['main']->join_date }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="text" class="form-control" id="end_date" name="end_date" value="{{ $item['main']->end_date }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- primary_contact_number, secondary_contact_number, and tertiary_contact_number -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="primary_contact_number">primary_contact_number</label>
                                                <input type="text" class="form-control" id="primary_contact_number" name="primary_contact_number" value="{{ $item['main']->primary_contact_number }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="secondary_contact_number">secondary_contact_number</label>
                                                <input type="text" class="form-control" id="secondary_contact_number" name="secondary_contact_number" value="{{ $item['main']->secondary_contact_number }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tertiary_contact_number">tertiary_contact_number</label>
                                                <input type="text" class="form-control" id="tertiary_contact_number" name="tertiary_contact_number" value="{{ $item['main']->tertiary_contact_number }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="primary_e_mail_address">primary_e_mail_address</label>
                                        <input type="text" class="form-control" id="primary_e_mail_address" name="primary_e_mail_address" value="{{ $item['main']->primary_e_mail_address }}" readonly>
                                    </div>

                                    <div class="row">
                                        <!-- primary_contact_number, bu_membership_status_id, and bu_membership_region_id  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bu_membership_type_id">bu_membership_type_id</label>
                                                <input type="text" class="form-control" id="bu_membership_type_id" name="bu_membership_type_id" value="{{ $item['main']->bu_membership_type_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bu_membership_status_id ">bu_membership_status_id </label>
                                                <input type="text" class="form-control" id="bu_membership_status_id " name="bu_membership_status_id " value="{{ $item['main']->bu_membership_status_id  }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bu_membership_region_id ">bu_membership_region_id </label>
                                                <input type="text" class="form-control" id="bu_membership_region_id " name="bu_membership_region_id " value="{{ $item['main']->bu_membership_region_id  }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- last_payment_date and paid_till_date -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last_payment_date">last_payment_date</label>
                                                <input type="text" class="form-control" id="last_payment_date" name="last_payment_date" value="{{ $item['main']->last_payment_date }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="paid_till_date">paid_till_date</label>
                                                <input type="text" class="form-control" id="paid_till_date" name="paid_till_date" value="{{ $item['main']->paid_till_date }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    



                            </div>


                        </div>
                    @else
                        <div class="card inner-card">
                            <div class="card-header">Duplicate Records</div>
                            <div class="card-body">
                                <p>No main records found for this Membership ID.</p>
                            </div>
                        </div>
                    @endif

                    <!-- Dependents Card -->
                    @if(!$item['dependents']->isEmpty())
                        <div class="card inner-card">
                            <div class="card-header">Dependents</div>
                            <div class="card-body">
                                @foreach($item['dependents'] as $dependent)
                                    <!-- Hidden Inputs for Dependent's Details -->

                                    <input type="hidden" id="dependent_membership_id_{{ $dependent->id }}" name="dependent_membership_id[]" value="{{ $dependent->membership_id }}">
                                    <input type="hidden" id="dependent_first_name_{{ $dependent->id }}" name="dependent_first_name[]" value="{{ $dependent->first_name }}">
                                    <input type="hidden" id="dependent_initials_{{ $dependent->id }}" name="dependent_initials[]" value="{{ $dependent->initials }}">
                                    <input type="hidden" id="dependent_last_name_{{ $dependent->id }}" name="dependent_last_name[]" value="{{ $dependent->last_name }}">
                                    <input type="hidden" id="dependent_screen_name_{{ $dependent->id }}" name="dependent_screen_name[]" value="{{ $dependent->screen_name }}">
                                    <input type="hidden" id="dependent_id_number_{{ $dependent->id }}" name="dependent_id_number[]" value="{{ $dependent->id_number }}">
                                    <input type="hidden" id="dependent_birth_date_{{ $dependent->id }}" name="dependent_birth_date[]" value="{{ $dependent->birth_date }}">
                                    <input type="hidden" id="dependent_person_relationship_id_{{ $dependent->id }}" name="dependent_person_relationship_id[]" value="{{ $dependent->person_relationship_id }}">
                                    <input type="hidden" id="dependent_gender_id_{{ $dependent->id }}" name="dependent_gender_id[]" value="{{ $dependent->gender_id }}">
                                    <input type="hidden" id="dependent_join_date_{{ $dependent->id }}" name="dependent_join_date[]" value="{{ $dependent->join_date }}">
                                    <input type="hidden" id="dependent_primary_contact_number_{{ $dependent->id }}" name="dependent_primary_contact_number[]" value="{{ $dependent->primary_contact_number }}">
                                    <input type="hidden" id="dependent_secondary_contact_number_{{ $dependent->id }}" name="dependent_secondary_contact_number[]" value="{{ $dependent->secondary_contact_number }}">
                                    <input type="hidden" id="dependent_primary_e_mail_address_{{ $dependent->id }}" name="dependent_primary_e_mail_address[]" value="{{ $dependent->primary_e_mail_address }}">

                                    <!--END -- Hidden Inputs for Dependent's Details -->


                                    <div class="record-container">
                                        @if($dependent->record_completed)
                                        <span style="color: green;">&#10004;</span>
                                        @endif
                                        <p>
                                            <span id="record_status_{{ $dependent->id }}"></span>
                                            <b>Summary:</b></p>
                                        <p>
                                            <b>Membership ID:</b> <span id="summary_membership_id_{{ $dependent->id }}">{{ $dependent->membership_id ?? 'N/A' }}</span>,
                                            <b>First Name:</b> <span id="summary_first_name_{{ $dependent->id }}">{{ $dependent->first_name ?? 'N/A' }}</span>,
                                            <b>Initials:</b> <span id="summary_initials_{{ $dependent->id }}">{{ $dependent->initials ?? 'N/A' }}</span>,
                                            <b>Last Name:</b> <span id="summary_last_name_{{ $dependent->id }}">{{ $dependent->last_name ?? 'N/A' }}</span>,
                                            <b>Screen Name:</b> <span id="summary_screen_name_{{ $dependent->id }}">{{ $dependent->screen_name ?? 'N/A' }}</span>,
                                            <b>ID Number:</b> <span id="summary_id_number_{{ $dependent->id }}">{{ $dependent->id_number ?? 'N/A' }}</span>,
                                            <b>Birth Date:</b> <span id="summary_birth_date_{{ $dependent->id }}">{{ $dependent->birth_date ?? 'N/A' }}</span>,
                                            <b>Relationship ID:</b> <span id="summary_person_relationship_id_{{ $dependent->id }}">{{ $dependent->person_relationship_id ?? 'N/A' }}</span>,
                                            <b>Gender ID:</b> <span id="summary_gender_id_{{ $dependent->id }}">{{ $dependent->gender_id ?? 'N/A' }}</span>,
                                            <b>Join Date:</b> <span id="summary_join_date_{{ $dependent->id }}">{{ $dependent->join_date ?? 'N/A' }}</span>,
                                            <b>Primary Contact Number:</b> <span id="summary_primary_contact_number_{{ $dependent->id }}">{{ $dependent->primary_contact_number ?? 'N/A' }}</span>,
                                            <b>Secondary Contact Number:</b> <span id="summary_secondary_contact_number_{{ $dependent->id }}">{{ $dependent->secondary_contact_number ?? 'N/A' }}</span>,<br>
                                            <b>Primary Email Address:</b> <span id="summary_primary_e_mail_address_{{ $dependent->id }}">{{ $dependent->primary_e_mail_address ?? 'N/A' }}</span>
                                        </p>
                                        
                                        


<!-- Edit Dependent Details Modal -->
<div class="modal fade" id="editDependentModal" tabindex="-1" role="dialog" aria-labelledby="editDependentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDependentModalLabel">Edit Dependent Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Input Fields -->
                <div class="form-group">
                    <label for="modal_membership_id">Membership ID</label>
                    <input type="text" class="form-control" id="modal_membership_id">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_first_name">First Name</label>
                            <input type="text" class="form-control" id="modal_first_name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_initials">Initials</label>
                            <input type="text" class="form-control" id="modal_initials">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_last_name">Last Name</label>
                            <input type="text" class="form-control" id="modal_last_name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_screen_name">Screen Name</label>
                            <input type="text" class="form-control" id="modal_screen_name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_id_number">ID Number</label>
                            <input type="text" class="form-control" id="modal_id_number">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_birth_date">Birth Date</label>
                            <input type="text" class="form-control" id="modal_birth_date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_person_relationship_id">Relationship ID</label>
                            <input type="text" class="form-control" id="modal_person_relationship_id">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_gender_id">Gender ID</label>
                            <input type="text" class="form-control" id="modal_gender_id">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_join_date">Join Date</label>
                            <input type="text" class="form-control" id="modal_join_date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_primary_contact_number">Primary Contact Number</label>
                            <input type="text" class="form-control" id="modal_primary_contact_number">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_secondary_contact_number">Secondary Contact Number</label>
                            <input type="text" class="form-control" id="modal_secondary_contact_number">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modal_primary_e_mail_address">Primary Email Address</label>
                            <input type="text" class="form-control" id="modal_primary_e_mail_address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateDependent()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

                                        
                                        <!-- Action Buttons -->
                                        <div class="action-buttons">
                                            <button type="button" class="btn btn-primary btn-sm" onclick="editDependent('{{ $dependent->id }}')">Edit</button>

                                        @if(!$dependent->record_completed)
                                            <button type="button" class="btn btn-success btn-sm mark-as-complete-btn" id="mark_complete_btn_{{ $dependent->id }}" onclick="markAsComplete('{{ $dependent->id }}')">Mark as Complete</button>
                                        @endif
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeDependent('{{ $dependent->id }}')">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="card inner-card">
                            <div class="card-header">Dependents</div>
                            <div class="card-body">
                                <p>No dependent records found.</p>
                            </div>
                        </div>
                    @endif

                    
                    <!-- Duplicate Records Card -->
                    @if(!$item['duplicates']->isEmpty())
                    <div class="card inner-card">
                        <div class="card-header">Duplicate Records</div>
                        <div class="card-body">
                            @foreach($item['duplicates'] as $duplicate)
                            <div class="record-container">
                                <p>Target Duplicate Identifiers: {{ $duplicate->target_duplicate_identifiers ?? 'N/A' }}, Duplicate Details: {{ $duplicate->duplicate_details ?? 'N/A' }}</p>
                                <div class="action-buttons">
                                    <!-- Removed Edit and Approve buttons for simplicity -->
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            data-source-table="{{ $duplicate->target_table_name }}" 
                                            data-record-id="{{ $duplicate->id }}" 
                                            onclick="handleRecordAction(this, 'discardDuplicate')">Remove</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="card inner-card">
                        <div class="card-header">Duplicate Records</div>
                        <div class="card-body">
                            <p>No duplicate records found.</p>
                        </div>
                    </div>
                    @endif

                
                
                

                    <!-- Error Records Card -->
                    @if(!$item['errors']->isEmpty())
                    <div class="card inner-card">
                        <div class="card-header">Error Records</div>
                        <div class="card-body">
                            @foreach($item['errors'] as $error)
                            <div class="record-container">
                                <p>Source Details: {{ $error->source_details ?? 'N/A' }}</p>
                                <!-- Hidden inputs generated from source_details -->
                                @if($error->source_details)
                                    @php
                                        $details = json_decode($error->source_details, true);
                                    @endphp
                                    @foreach($details as $key => $value)
                                        <input type="hidden" id="{{ 'error_' . $error->id . '_' . $key }}" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                @endif
                                <div class="action-buttons">
                                    <!-- Removed Edit button for simplicity -->
                                    <button type="button" 
                                            class="btn btn-sm btn-success" 
                                            data-source-table="{{ $error->target_table_name }}" 
                                            data-record-id="{{ $error->id }}" 
                                            onclick="handleRecordAction(this, 'makeDependentError')">Make Dependant</button>

                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            data-source-table="{{ $error->target_table_name }}" 
                                            data-record-id="{{ $error->id }}" 
                                            onclick="handleRecordAction(this, 'discardError')">Remove</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="card inner-card">
                        <div class="card-header">Error Records</div>
                        <div class="card-body">
                            <p>No error records found.</p>
                        </div>
                    </div>
                    @endif

                                                {{-- Action Buttons for Main Record --}}
                                                <div class="form-group text-center d-flex justify-content-around mt-4">
                                                    <!-- Button for Submit Action 1 -->
                                                    <button type="submit" name="action" value="submitActionOne" class="btn btn-success">Submit Action 1</button>
                                
                                                    <!-- Button for Submit Action 2 -->
                                                    <button type="submit" name="action" value="submitActionTwo" class="btn btn-dark">Submit Action 2</button>
                                
                                                        {{-- <!-- JavaScript actions -->
                                                        <button type="button" class="btn btn-info" onclick="otherActionOne()">Other Action 1 (JS)</button>
                                                        <button type="button" class="btn btn-warning" onclick="otherActionTwo()">Other Action 2 (JS)</button>
                                 --}}
                                                </div>
                
                
                </div>

            </div>



        </form>
        @endforeach
    @else
        <p>No records found.</p>
    @endif

<!-- Custom Bootstrap Pagination Links -->
<nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination justify-content-center">
        @if ($paginatedItems->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginatedItems->previousPageUrl() }}">Previous</a></li>
        @endif

        <!-- Display current page of total pages (e.g., "1 of 52025") -->
        <li class="page-item disabled"><span class="page-link">{{ $paginatedItems->currentPage() }} of {{ $paginatedItems->lastPage() }}</span></li>

        @if ($paginatedItems->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginatedItems->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif
    </ul>
</nav>


</div>

    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Then include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // DataTables initialization, if necessary
    });
</script> --}}



<script>
function handleRecordAction(button, actionType) {
    const sourceTable = button.getAttribute('data-source-table');
    const recordId = button.getAttribute('data-record-id');
    let formData = {
        sourceTable: sourceTable,
        recordId: recordId,
        actionType: actionType, // Make sure this aligns with the backend expectations
    };

    // Collect hidden inputs for 'makeDependentError' action type only
    if (actionType === 'makeDependentError') {
        formData.details = {};
        document.querySelectorAll(`input[id^='error_${recordId}_']`).forEach(input => {
            formData.details[input.name] = input.value;
        });
    }

    let jsonData = JSON.stringify(formData);

    fetch('/resolutionhub/process-record-action', { // Adjust if your app's base URL is different
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: jsonData
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        // Handle non-2xx responses
        return response.json().then(errorData => {
            // If there's a known error message structure
            const errorMessage = errorData.message || "An error occurred, please try again.";
            console.error('Error:', errorMessage);
            // Display a user-friendly error message
            alert(errorMessage);
            throw new Error(errorMessage);
        });
    })
    .then(data => {
        console.log('Success:', data);
        window.location.reload(); // Refresh to reflect changes
    })
    .catch((error) => {
        // For unexpected errors, provide a generic message
        alert("An unexpected error occurred. Please contact support if the problem persists.");
        console.error('Unexpected Error:', error);
    });
}

    </script>
    
    
{{-- dependent modal and updating hidden fields --}}
<script>
let currentEditingDependentId;

function editDependent(dependentId) {
    currentEditingDependentId = dependentId;
    // Populate the modal fields with values from hidden inputs
    document.getElementById('modal_membership_id').value = document.getElementById('dependent_membership_id_' + dependentId).value;
    document.getElementById('modal_first_name').value = document.getElementById('dependent_first_name_' + dependentId).value;
    document.getElementById('modal_initials').value = document.getElementById('dependent_initials_' + dependentId).value;
    document.getElementById('modal_last_name').value = document.getElementById('dependent_last_name_' + dependentId).value;
    document.getElementById('modal_screen_name').value = document.getElementById('dependent_screen_name_' + dependentId).value;
    document.getElementById('modal_id_number').value = document.getElementById('dependent_id_number_' + dependentId).value;
    document.getElementById('modal_birth_date').value = document.getElementById('dependent_birth_date_' + dependentId).value;
    document.getElementById('modal_person_relationship_id').value = document.getElementById('dependent_person_relationship_id_' + dependentId).value;
    document.getElementById('modal_gender_id').value = document.getElementById('dependent_gender_id_' + dependentId).value;
    document.getElementById('modal_join_date').value = document.getElementById('dependent_join_date_' + dependentId).value;
    document.getElementById('modal_primary_contact_number').value = document.getElementById('dependent_primary_contact_number_' + dependentId).value;
    document.getElementById('modal_secondary_contact_number').value = document.getElementById('dependent_secondary_contact_number_' + dependentId).value;
    document.getElementById('modal_primary_e_mail_address').value = document.getElementById('dependent_primary_e_mail_address_' + dependentId).value;

    $('#editDependentModal').modal('show');
}

function updateDependent() {
    // Update the hidden fields with new values from the modal
    document.getElementById('dependent_membership_id_' + currentEditingDependentId).value = document.getElementById('modal_membership_id').value;
    document.getElementById('dependent_first_name_' + currentEditingDependentId).value = document.getElementById('modal_first_name').value;
    document.getElementById('dependent_initials_' + currentEditingDependentId).value = document.getElementById('modal_initials').value;
    document.getElementById('dependent_last_name_' + currentEditingDependentId).value = document.getElementById('modal_last_name').value;
    document.getElementById('dependent_screen_name_' + currentEditingDependentId).value = document.getElementById('modal_screen_name').value;
    document.getElementById('dependent_id_number_' + currentEditingDependentId).value = document.getElementById('modal_id_number').value;
    document.getElementById('dependent_birth_date_' + currentEditingDependentId).value = document.getElementById('modal_birth_date').value;
    document.getElementById('dependent_person_relationship_id_' + currentEditingDependentId).value = document.getElementById('modal_person_relationship_id').value;
    document.getElementById('dependent_gender_id_' + currentEditingDependentId).value = document.getElementById('modal_gender_id').value;
    document.getElementById('dependent_join_date_' + currentEditingDependentId).value = document.getElementById('modal_join_date').value;
    document.getElementById('dependent_primary_contact_number_' + currentEditingDependentId).value = document.getElementById('modal_primary_contact_number').value;
    document.getElementById('dependent_secondary_contact_number_' + currentEditingDependentId).value = document.getElementById('modal_secondary_contact_number').value;
    document.getElementById('dependent_primary_e_mail_address_' + currentEditingDependentId).value = document.getElementById('modal_primary_e_mail_address').value;

    // Update the summary with new values from the modal
    document.getElementById('summary_membership_id_' + currentEditingDependentId).innerText = document.getElementById('modal_membership_id').value;
    document.getElementById('summary_first_name_' + currentEditingDependentId).innerText = document.getElementById('modal_first_name').value;
    document.getElementById('summary_initials_' + currentEditingDependentId).innerText = document.getElementById('modal_initials').value;
    document.getElementById('summary_last_name_' + currentEditingDependentId).innerText = document.getElementById('modal_last_name').value;
    document.getElementById('summary_screen_name_' + currentEditingDependentId).innerText = document.getElementById('modal_screen_name').value;
    document.getElementById('summary_id_number_' + currentEditingDependentId).innerText = document.getElementById('modal_id_number').value;
    document.getElementById('summary_birth_date_' + currentEditingDependentId).innerText = document.getElementById('modal_birth_date').value;
    document.getElementById('summary_person_relationship_id_' + currentEditingDependentId).innerText = document.getElementById('modal_person_relationship_id').value;
    document.getElementById('summary_gender_id_' + currentEditingDependentId).innerText = document.getElementById('modal_gender_id').value;
    document.getElementById('summary_join_date_' + currentEditingDependentId).innerText = document.getElementById('modal_join_date').value;
    document.getElementById('summary_primary_contact_number_' + currentEditingDependentId).innerText = document.getElementById('modal_primary_contact_number').value;
    document.getElementById('summary_secondary_contact_number_' + currentEditingDependentId).innerText = document.getElementById('modal_secondary_contact_number').value;
    document.getElementById('summary_primary_e_mail_address_' + currentEditingDependentId).innerText = document.getElementById('modal_primary_e_mail_address').value;


    $('#editDependentModal').modal('hide');
}
</script>

{{-- Dependent: Mark as completed and remove --}}
<script>
function markAsComplete(dependentId) {
    fetch('/resolutionhub/mark-dependent-complete/' + dependentId, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({}) // Empty body since we're just marking as complete based on ID
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data);
        // Hide the "Mark as Complete" button for this record
        document.getElementById('mark_complete_btn_' + dependentId).style.display = 'none';
        // Optionally, add a green checkmark next to the record
        document.getElementById('record_status_' + dependentId).innerHTML = '&#10004;'; // Green check mark
    })
    .catch(error => console.error('Error:', error));
}


function removeDependent(dependentId) {
    // Ask the user if they are sure they want to discard
    if (confirm('Are you sure you want to discard this dependent?')) {
        fetch('/resolutionhub/remove-dependent/' + dependentId, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({}) // No need to send data in the body for this request
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            // Optionally, refresh the page to reflect changes
            window.location.reload();
        })
        .catch(error => console.error('Error:', error));
    }
}

</script>
    
</body>
</html>
