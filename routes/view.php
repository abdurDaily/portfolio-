<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\frontendController;

// Route::prefix('skill')->name('skill.')->group(function(){
// });

Route::get('/', [frontendController::class, 'viewIndex'])->name('viewIndex.index');

?>