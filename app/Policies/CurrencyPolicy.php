<?php

namespace App\Policies;

use App\Entity\Currency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
{
    use HandlesAuthorization;

    public function updateRate(User $user, Currency $currency) {
        return $user->is_admin && $currency != null;
    }
}
