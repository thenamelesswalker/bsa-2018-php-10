<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 2018-07-18
 * Time: 00:19
 */

namespace App;


use App\Entity\Currency;

interface CurrencyServiceInterface
{
    public function changeRate(Currency $currency, float $rate);
    public function sendNotificationsToAllUsers(Currency $currency);
}