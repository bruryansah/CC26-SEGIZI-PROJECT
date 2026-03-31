<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

// Public routes - accessible without login
Route::inertia('recipes', 'Recipes/Index')->name('recipes.index');
Route::inertia('recipes/{recipe}', 'Recipes/Show')->name('recipes.show');
Route::inertia('articles', 'Articles/Index')->name('articles.index');
Route::inertia('articles/{article}', 'Articles/Show')->name('articles.show');
Route::inertia('bmi-calculator', 'Calculator/BMI')->name('bmi.calculator');
Route::inertia('calorie-calculator', 'Calculator/Calorie')->name('calorie.calculator');

// Protected routes - require login
Route::middleware(['auth'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';

Route::get('/tes', function () {
    return 'Hello World';
});

