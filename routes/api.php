<?php

use Batsirai\Gateway\Domain\Controller\IPNController;
use Illuminate\Support\Facades\Route;

Route::controller(IPNController::class)->group( static function () {
    Route::get('/ipn', 'notification');
});
