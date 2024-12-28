<?php

use App\Http\Controllers\backend\BlogsController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\SkillController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

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


//BLOG'S
Route::prefix('blog')->name('blog.')->group(function(){
    Route::get('/blog-index', [BlogsController::class, 'blogIndex'])->name('index');
    Route::post('/blog-index', [BlogsController::class, 'storeBlog'])->name('store');
    Route::get('/list', [BlogsController::class, 'blogList'])->name('list');
    Route::get('/edit/{blog_slug}', [BlogsController::class, 'blogEdit'])->name('edit');
    Route::post('/status/', [BlogsController::class, 'status'])->name('status');
});


//CATEGORY'S
Route::prefix('category')->name('category.')->group(function(){
    Route::get('/category-index', [CategoryController::class, 'categoryIndex'])->name('index');
    Route::post('/category-index', [CategoryController::class, 'categoryStore'])->name('store');
});


?>