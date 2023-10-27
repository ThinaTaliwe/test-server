@extends('layouts.app2')
@section('row_content')
    <div class="chart border rounded bg-primary-subtle p-4"> <!-- Added padding for some space inside the div -->
        <form action="{{ route('sendWhatsAppMessage') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <br>
            <div class="form-group">
                <label for="receiver_number">Recipient's WhatsApp Number:</label>
                <input type="text" name="receiver_number" id="receiver_number" class="form-control" required
                    placeholder="e.g. +1234567890">
                <div class="invalid-feedback">
                    Please provide a valid number.
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Message is required.
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endpush
