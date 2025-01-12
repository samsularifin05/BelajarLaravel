<?php

use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;


Route::resource('bank', BankController::class);