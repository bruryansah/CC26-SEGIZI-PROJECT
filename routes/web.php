<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

// Fortify authentication routes
require base_path('routes/auth.php');

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

// Public routes - accessible without login
Route::inertia('recipes', 'Recipes/Index')->name('recipes.index');
Route::get('recipes/{recipe}', function ($recipe) {
    return inertia('Recipes/Show', ['recipe' => $recipe]);
})->name('recipes.show');

Route::inertia('articles', 'Articles/Index')->name('articles.index');
Route::get('articles/{article}', function ($article) {
    return inertia('Articles/Show', ['article' => $article]);
})->name('articles.show');
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
