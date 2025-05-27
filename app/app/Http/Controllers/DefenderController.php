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
        $suspiciousPatterns = [
            '/http[s]?:\/\/[^\s]+/i',                // links
            '/(verify|confirm|reset).{0,20}(account|password)/i', // phishing intent
            '/login/i',                              // login keywords
            '/click here/i',
            '/urgent/i',
            '/suspended|deactivated|locked/i',
            '/credential|username|password/i',
        ];

        foreach($emails as $email) {
            $sus = false;
            $reasons = [];

            // if(
            //     str_contains(strtolower($email->body), 'click here') || 
            //     str_contains(strtolower($email->subject), 'suspend') || 
            //     !str_contains($email->sender, 'htt[p') 
            // ){
            //     $sus = true;
            // }

            foreach($suspiciousPatterns as $pattern) {
                if(preg_match($pattern, $email->body)) {
                    $sus = true;
                    $reasons = "Matched pattern: <code>" . htmlentities($pattern) . "</code>";
                }
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
