<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\BotLaunched;
use App\Models\Email;
class AttackBotController extends Controller
{

    public function index()
    {
        return view('attacker.attackbot');
    }

    public function simulateVictim(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

         

        $event = new BotLaunched($request->input('message'), $request->input('subject'));
        event($event);

        $result = $event->result;

        $status = $result['success']
            ? "✅ Success! Victim bot fell for it (Score: {$result['score']}, Chance: {$result['chance']}%, Roll: {$result['roll']})"
            : "❌ Fail! Victim bot ignored the email (Score: {$result['score']}, Chance: {$result['chance']}%, Roll: {$result['roll']})";

        $creds = $event->creds ?? "No creds captured yet!";


        // Store the crafted phishing email in the database
        Email::create([
            'sender' => $validated['from'],
            'subject' => $validated['subject'],
            'body' => $validated['message'],
        ]);

        return back()->with('status', $status)
                    ->with('creds', $creds)
                    ->with('success', 'Email crafted and saved to inbox');
    }
}
