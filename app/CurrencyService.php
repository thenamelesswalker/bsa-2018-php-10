<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 2018-07-18
 * Time: 00:20
 */

namespace App;


use App\Entity\Currency;
use App\Jobs\SendRateChangedEmail;

class CurrencyService implements CurrencyServiceInterface
{

    public function changeRate(Currency $currency, float $rate)
    {
        $currency->rate = $rate;
        $currency->save();
    }

    public function sendNotificationsToAllUsers(Currency $currency)
    {
        $oldRate = $currency->getOriginal('rate');
        $users = User::all();
        foreach ($users as $user) {
            SendRateChangedEmail::dispatch($user, $currency, $oldRate)->onQueue('notification');
        }
    }
}