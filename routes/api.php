<?php

Route::put('/currencies/{id}/rate', 'CurrencyController@updateRate')->middleware('auth');
