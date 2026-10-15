<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/a-propos', [PageController::class, 'about'])->name('about');

Route::get('/heure', function () {
    return view('heure', [
        'heure' => now()->format('H:i'),
        'date' => now()->format('d/m/Y'),
    ]);
})->name('heure');

Route::get('/article/{id}', function ($id) {
    return 'Article numéro : ' . $id;
})->whereNumber('id')->name('article.show');

Route::get('/profil/{nom}', function ($nom) {
    return 'Profil de : ' . $nom;
})->where('nom', '[A-Za-z]+')->name('profil.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/articles', function () {
        return 'Liste des articles';
    })->name('articles');

    Route::get('/profil', function () {
        return 'Profil administrateur';
    })->name('profil');
});

