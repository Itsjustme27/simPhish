@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Victim Mode Section -->
            <div class="card">
                <div class="card-header">{{ __('Victim Mode') }}</div>

                <div class="card-body">


                    <!-- Victim's Inbox Section -->
                    <div class="mb-4">
                        <h4>{{ __('Inbox') }}</h4>
                        <ul id="emailList" class="list-group">
                            <!-- Sample email item -->
                            <li class="list-group-item email-item">
                                <div class="d-flex justify-content-between">
                                    <span class="email-sender">Support@bank.com</span>
                                    <span class="email-subject">Account Suspended</span>
                                </div>
                                <button class="btn btn-primary btn-sm view-email">View Email</button>
                            </li>
                        </ul>
                    </div>

                    <!-- Modal to view email content -->
                    <div class="modal" id="emailModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Email Content</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="emailBody">Email content goes here...</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="feedback" class="alert alert-info" style="display: none;">
                        <h5>{{ __('Your Results') }}</h5>
                        <p>{{ __('You identified X phishing emails correctly!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
