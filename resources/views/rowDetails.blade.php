@extends('layouts.app2')

@push('styles')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .collapsible {
            cursor: pointer;
            background-color: #e0e0e0;
        }

        .collapsible:hover {
            background-color: #cccccc;
        }

        .hidden {
            display: none;
        }

        #chart-container {
            width: 80%;
            margin: 20px auto;
        }
    </style>
    <!-- Add these lines in the <head> section of your HTML -->
    <!-- Link to Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Link to Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endpush

@section('content')
    <div class="m-8 p-4" style="border: 2px solid black;">
        <div class="m-2" style="border: 2px solid black;">
            <h2 class="text-center">Payments Report</h2>
        </div>

        <div class="row">
            <div class="col-4">
                <form method="GET" action="{{ route('api.rowdetails') }}" class="" style="border: 2px solid black;">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="membership_id">Membership ID</label>
                            <select class="form-control select2" id="membership_id" name="membership_id">
                                <option value="">Select Membership ID</option>
                                @foreach ($memberships as $membership)
                                    <option value="{{ $membership->id }}"
                                        {{ request('membership_id') == $membership->id ? 'selected' : '' }}>
                                        {{ $membership->id }} - {{ $membership->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                value="{{ request('end_date') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success m-2">Filter</button>
                </form>
            </div>

            <div class="col-8">
                <table id="transactionsTable" class="table table-bordered" style="border: 2px solid black;">
                    <thead class="bg-gba-light">
                        <tr>
                            <th>ID</th>
                            <th>Membership ID</th>
                            <th>Transaction Date</th>
                            <th>Transaction Description</th>
                            <th>Receipt Number</th>
                            <th>Receipt Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->membership_id }}</td>
                                <td>{{ $payment->transaction_date }}</td>
                                <td>{{ $payment->transaction_description }}</td>
                                <td>{{ $payment->receipt_number }}</td>
                                <td>{{ $payment->receipt_value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination links -->
                <div class="m-2 p-2 text-center bg-gba-light" style="border: 2px solid black;">
                    {{ $payments->appends(Request::except('page'))->links() }}
                </div>
            </div>
        </div>

        <div id="chart-container" style="border: 2px solid black;">
            <canvas id="paymentsChart"></canvas>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#membership_id').select2({
                placeholder: "Select a Membership ID",
                allowClear: true
            });
        });
    </script>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const collapsibles = document.querySelectorAll('.collapsible');
            collapsibles.forEach(collapsible => {
                collapsible.addEventListener('click', function() {
                    const groupIndex = this.getAttribute('data-index');
                    const groupRows = document.querySelectorAll(`.group-${groupIndex}`);
                    groupRows.forEach(row => row.classList.toggle('hidden'));
                });
            });

            // Prepare the data for Chart.js
            var paymentDates = {!! json_encode($payments->pluck('transaction_date')->toArray()) !!};
            var receiptValues = {!! json_encode($payments->pluck('receipt_value')->toArray()) !!};

            // Create the chart
            var ctx = document.getElementById('paymentsChart').getContext('2d');
            var paymentsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: paymentDates,
                    datasets: [{
                        label: 'Receipt Value',
                        data: receiptValues,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day'
                            },
                            title: {
                                display: true,
                                text: 'Transaction Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Receipt Value'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
