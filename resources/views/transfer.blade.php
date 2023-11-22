<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Transfer</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Transfer</div>

                    <div class="card-body">
                        <form method="POST" action="/run-script">
                            @csrf
                            <div class="form-group">
                                <label for="database">Select database:</label>
                                <select class="form-control" id="database" name="database">
                                    <!-- Databases will be populated here using AJAX -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="table">Select table:</label>
                                <select class="form-control" id="table" name="table">
                                    <!-- Tables will be populated here using AJAX -->
                                </select>
                            </div>
                            <!-- Add other inputs as needed -->
                            <button type="submit" class="btn btn-primary">Run Script</button>
                        </form>

                        

                        @if (!empty($output))
                            <h3>Script Output</h3>
                            <pre>{{ $output }}</pre>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    @if(!empty($error))
    <div class="alert alert-danger">
        <ul>
            @foreach ($error as $line)
                <li>{{ $line }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">Mappings For Selected (Source_table and Target_table)</div>

                    <div class="card-body col-md-12">
                        <!-- Mappings will be displayed here -->
                        <div id="mappings" style="max-width: 100%; overflow-x: auto;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    




    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            function loadMappings() {
                var selectedMapping = $('#table').val();
                $.get('/get-mappings/' + encodeURIComponent(selectedMapping), function(data) {
                    var mappings = data;
                    var mappingsDiv = $('#mappings');
                    mappingsDiv.empty();
                    var table = $('<table></table>').addClass('table table-striped');
                    var thead = $('<thead></thead>');
                    thead.append('<tr><th>Source DB</th><th>Source Table</th><th>Source Column</th><th>Target DB</th><th>Target Table</th><th>Target Column</th></tr>');
                    table.append(thead);
                    var tbody = $('<tbody></tbody>');
                    $.each(mappings, function(key, value) {
                        tbody.append('<tr><td>' + value.source_db + '</td><td>' + value.source_table + '</td><td>' + value.source_column + '</td><td>' + value.target_db + '</td><td>' + value.target_table + '</td><td>' + value.target_column + '</td></tr>');
                    });
                    table.append(tbody);
                    mappingsDiv.append(table);
                });
            }
        
            $('#table').change(loadMappings);
        
            $.get('/get-databases', function(data) {
                var databases = data;
                var databaseSelect = $('#database');
                databaseSelect.empty();
                $.each(databases, function(key, value) {
                    databaseSelect.append($('<option></option>').val(value.source_db).text(value.source_db));
                });
                // Trigger a change event to load the tables for the selected database
                databaseSelect.change();
            });
        
            $('#database').change(function() {
                var selectedDatabase = $(this).val();
                $.get('/get-tables/' + selectedDatabase, function(data) {
                    var tableSelect = $('#table');
                    tableSelect.empty();
                    $.each(data, function(index, sourceTargetPair) {
                        tableSelect.append($('<option></option>').val(sourceTargetPair).text(sourceTargetPair));
                    });
                    // Call loadMappings after populating the table select
                    loadMappings();
                });
            });
        });
        </script>
        
    
</body>
</html>
