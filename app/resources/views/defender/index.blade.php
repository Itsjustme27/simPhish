@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🛡️ Defender Mode</h2>

    <form method="POST" action="{{ route('defender.scan') }}">
        @csrf
        <button class="btn btn-outline-primary mb-4">Scan Inbox</button>
    </form>

    <h4>Inbox</h4>
    <ul class="list-group mb-4">
        @foreach($emails as $email)
            <li class="list-group-item">
                <strong>From:</strong> {{ $email->sender }} <br>
                <strong>Subject:</strong> {{ $email->subject }} <br>
                <strong>Body:</strong> {{ Str::limit($email->body, 60) }}
            </li>
        @endforeach
    </ul>

    @isset($alerts)
        @if(count($alerts))
            <div class="alert alert-warning">
                ⚠️ {{ count($alerts) }} Suspicious Email(s) Found:
            </div>
            <ul class="list-group">
                @foreach($alerts as $alert)
                    <li class="list-group-item">
                        🚩 <strong>{{ $alert['subject'] }}</strong> from {{ $alert['from'] }} <br>
                        <span class="text-danger">{{ $alert['reason'] }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-success">
                ✅ Inbox looks safe.
            </div>
        @endif
    @endisset
</div>
@endsection
