@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="mb-4">SimPhish Dashboard</h1>
        <div class="card-body">
            <h3>Welcome back, {{ Auth::user()->name }}!</h3>
            <p>Choose a mode to begin your phishing simulation:</p>
            
            <a href="{{ route('attacker.index') }}" class="btn btn-danger m-2">Attacker Mode</a>
            <a href="{{ route('victim.index') }}" class="btn btn-warning m-2">Victim Mode</a>
            <a href="{{ route('defender.index') }}" class="btn btn-primary m-2">Defender Mode</a>
        </div>
    </div>
</div>
@endsection