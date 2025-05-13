<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Http;

use App\Events\BotLaunched;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Request;

class SimulateVictimListener
{
    protected $phishingKeywords = [
        'urgent' => 2,
        'click' => 1,
        'reset' => 2,
        'verify' => 1,
        'account' => 1,
        'login' => 1,
        'password' => 2,
        'security' => 1,
        'suspicious' => 2,
    ];
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BotLaunched $event): void
{
    $message = strtolower($event->message);
    $score = 0;

    foreach($this->phishingKeywords as $keyword => $weight) {
        if (str_contains($message, $keyword)) {
            $score += $weight;
        }
    }

    $baseChance = 30;
    $chance = min($baseChance + $score * 10, 95);
    $roll = rand(1, 100);

    $event->result = [
        'score' => $score,
        'chance' => $chance,
        'roll' => $roll,
        'success' => $roll <= $chance,
    ];

    if ($event->result['success']) {
        sleep(rand(2,5));
        Http::asForm()->post(env('PHISH_URL'), [
            'username' => 'victim_bot',
            'password' => 'bot_pass123',
        ]);

        // Reading da latest creds from creds.txt
        $credsFile = base_path('../phish/public/creds.txt');
        $latestCreds = "No Creds found!";
        if(file_exists($credsFile)) {
            $lines = file($credsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $latestCreds = trim(end($lines));
        }

        $event->creds = $latestCreds;
    }
}

}
