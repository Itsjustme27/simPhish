@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header">Craft Your Phishing Email</div>
        <div class="card-body">
            <form method="POST" action="{{ route('attackbot.simulate') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="subject">To:</label>
                    <input type="email" name="email" class="form-control" placeholder="e.g. test@gmail.com" required>
                </div>
                <div class="form-group mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="e.g., Account Verification Required" required>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Message Body</label>
                    <textarea name="message" class="form-control" rows="5" placeholder="Include a fake login link, urgent language, etc." required></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Send Phishing Email</button>
            </form>
        </div>
    </div>
    <div class="mt-3">
        <h3>Captured Credentials:</h3>
        <p>{{ session('creds') }}</p> {{-- Display captured credentials --}}
    </div>
</div>
@endsection
