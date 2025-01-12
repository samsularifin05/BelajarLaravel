<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;



Route::resource('bank', BankController::class);

Route::resource('member', MemberController::class);