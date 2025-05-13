<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\BotLaunched;

class AttackBotController extends Controller
{

    public function index()
    {
        return view('attacker.attackbot');
    }

    public function simulateVictim(Request $request)
    {
        $event = new BotLaunched($request->input('message'), $request->input('subject'));
        event($event);

        $result = $event->result;

        $status = $result['success']
            ? "✅ Success! Victim bot fell for it (Score: {$result['score']}, Chance: {$result['chance']}%, Roll: {$result['roll']})"
            : "❌ Fail! Victim bot ignored the email (Score: {$result['score']}, Chance: {$result['chance']}%, Roll: {$result['roll']})";

        $creds = $event->creds ?? "No creds captured yet!";
        return back()->with('status', $status)
                    ->with('creds', $creds);
    }
}
