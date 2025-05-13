<!-- resources/views/defender/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Your Inbox</h2>
            <p>Analyze the emails and mark them as phishing or legitimate.</p>

            <!-- Inbox List -->
            <div class="email-inbox">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5><a href="#" class="email-link">Phishing Attempt: Fake Bank Alert</a></h5>
                        <p>Suspicious email that appears to be from your bank.</p>
                        <!-- Buttons to mark email -->
                        <button class="btn btn-danger" onclick="markPhishing('email-1')">Mark as Phishing</button>
                        <button class="btn btn-success" onclick="markLegit('email-1')">Mark as Legitimate</button>
                    </li>

                    <li class="list-group-item">
                        <h5><a href="#" class="email-link">Legit Email: Your Account Update</a></h5>
                        <p>Important email from your service provider.</p>
                        <!-- Buttons to mark email -->
                        <button class="btn btn-danger" onclick="markPhishing('email-2')">Mark as Phishing</button>
                        <button class="btn btn-success" onclick="markLegit('email-2')">Mark as Legitimate</button>
                    </li>

                    <!-- Add more emails as necessary -->
                </ul>
            </div>

            <!-- Feedback Section -->
            <div id="feedback" class="mt-3">
                <p id="feedback-message"></p>
            </div>
        </div>
    </div>
</div>

<script>
    function markPhishing(emailId) {
        // You can make an AJAX call to store the result in your database if needed
        document.getElementById('feedback-message').innerHTML = "You marked the email as Phishing.";
        document.getElementById('feedback-message').classList.add('alert', 'alert-danger');
        // You can perform any other actions like saving the result or providing additional feedback.
    }

    function markLegit(emailId) {
        // You can make an AJAX call to store the result in your database if needed
        document.getElementById('feedback-message').innerHTML = "You marked the email as Legitimate.";
        document.getElementById('feedback-message').classList.add('alert', 'alert-success');
        // You can perform any other actions like saving the result or providing additional feedback.
    }
</script>
@endsection
