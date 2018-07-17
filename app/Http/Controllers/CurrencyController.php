<?php

namespace App\Http\Controllers;

use App\CurrencyServiceInterface;
use App\Entity\Currency;
use App\Http\Requests\CurrencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CurrencyController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyServiceInterface $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function updateRate(CurrencyRequest $currencyRequest, int $id) {
        $currency = Currency::findOrFail($id);
        if(Gate::denies('updateRate', $currency)) {
            return response('Forbiden', 403);
        }

        $this->currencyService->changeRate($currency, $currencyRequest->input('rate'));
        $this->currencyService->sendNotificationsToAllUsers($currency);
        return response("Ok",200);
    }

}
