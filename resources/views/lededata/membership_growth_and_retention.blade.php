
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

                
            </div>
        </div>
    <div class="report-container">
        <h1>Membership Growth and Retention Report</h1>
        
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
                <!-- ...and so on for each field you want to display -->
                                
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
        @endif
    </div>

    </div>
@endsection

