<?php

use App\Http\Controllers\backend\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\SkillController;
use App\Http\Middleware\Admin;

//SKILL
Route::prefix('skill')->name('skill.')->group(function(){
    Route::get('/skill-index', [SkillController::class, 'skillIndex'])->name('index');
    Route::post('/skill-index', [SkillController::class, 'storeSkills'])->name('store');
});


//CONTACT
Route::prefix('contact')->name('contact.')->group(function(){
    Route::get('/contact-index', [ContactController::class, 'contactIndex'])->name('index');
    Route::post('/contact-index', [ContactController::class, 'contactStore'])->name('store');
});


?>