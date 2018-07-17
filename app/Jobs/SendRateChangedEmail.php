<?php

namespace App\Jobs;

use App\Entity\Currency;
use App\Mail\RateChanged;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendRateChangedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $currency;

    public $oldRate;

    public function __construct(User $user, Currency $currency, float $oldRate)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    public function handle()
    {
        Mail::to($this->user)->send(
            new RateChanged(
                $this->user,
                $this->currency,
                $this->oldRate
            )
        );
    }
}
