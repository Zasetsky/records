<?php

use App\Http\Controllers\RecordController;
use App\Http\Middleware\CheckRecordAccess;
use Illuminate\Support\Facades\Route;

Route::prefix('records')->group(function () {
	Route::post('/search', [RecordController::class, 'search']);
	Route::get('/{id}', [RecordController::class, 'show'])
		->middleware(CheckRecordAccess::class);
});
