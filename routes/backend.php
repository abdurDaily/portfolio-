<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\SkillController;

Route::prefix('skill')->name('skill.')->group(function(){
    Route::get('/skill-index', [SkillController::class, 'skillIndex'])->name('index');
    Route::post('/skill-index', [SkillController::class, 'storeSkills'])->name('store');
});


?>