<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;


class DefenderController extends Controller
{
    public function index() {
        $emails = Email::all();
        return view('defender.index', compact('emails'));
    }

    public function scan() {
        $emails = Email::all();
        $alerts = [];

        foreach($emails as $email) {
            $sus = false;

            if(
                str_contains(strtolower($email->body), 'click here') || 
                str_contains(strtolower($email->subject), 'suspend') || 
                !str_contains($email->sender, 'facebook.com') 
            ){
                $sus = true;
            }

            if($sus) {
                $alerts[] = [
                    'id' => $email->id,
                    'from' => $email->sender,
                    'subject' => $email->subject,
                    'reason' => 'Suspicious content detected',
                ];
            }
        }
    
        return view('defender.index', compact('alerts', 'emails'));

    }
}
