<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RateChanged extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $currency;

    protected $oldRate;

    public function __construct($user, $currency, $oldRate)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    public function build()
    {
        return view('rate_changed',['user' => $this->user, 'currency' => $this->currency, 'oldRate' => $this->oldRate]);
    }
}
