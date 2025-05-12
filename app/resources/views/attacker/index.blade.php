@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Attacker Mode</h1>
    <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modeSelectModal">
        Choose Simulation Mode
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modeSelectModal" tabindex="-1" aria-labelledby="modeSelectLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modeSelectLabel">Select Simulation Mode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button class="btn btn-outline-success w-100 my-2">Single Player (Be Attacker & Victim)</button>
        <button class="btn btn-outline-info w-100 my-2">With Bot (Simulated Victim)</button>
      </div>
    </div>
  </div>
</div>
@endsection
