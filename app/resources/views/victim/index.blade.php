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
                                    <span class="email-sender">support@fb.com</span>
                                    <span class="email-subject">Account Suspended</span>
                                </div>
                                <button class="btn btn-primary btn-sm view-email" data-bs-toggle="modal" data-bs-target="#emailModal">View Email</button>
                            </li>
                        </ul>
                    </div>

                    <!-- Modal to view email content -->
                    <div class="modal" id="emailModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">From: support@fb.com</h5>
                                </div>
                                <div class="modal-body">
                                    <table style="max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                        <tr>
                                          <td style="text-align: center;">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" alt="Facebook" style="width: 120px;">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="padding-top: 20px;">
                                            <h2 style="color: #1877f2;">Security alert</h2>
                                            <p>Someone recently tried to log into your Facebook account from an unrecognized device.</p>
                                            <p><strong>Location:</strong> Kathmandu, Nepal<br>
                                            <strong>Device:</strong> Windows PC - Chrome</p>
                                            <p>If this was you, you can safely disregard this email.</p>
                                            <p>If it wasn't you, please secure your account immediately by changing your password.</p>
                                            <p style="text-align: center; padding: 20px;">
                                              <a href="{{ $phishUrl }}" style="background-color: #1877f2; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px;" target="_blank">Change Password</a>
                                            </p>
                                            <p style="font-size: 12px; color: grey; display:flex; justify-content: center;">Meta © 2025</p>
                                          </td>
                                        </tr>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
