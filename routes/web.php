<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionStock;
//page

Route::get('/', [GestionStock::class,'dashboard_get'] )->name('dashboard');

Route::get('/stock', [GestionStock::class,'stock_get'])->name('stock');

Route::get('/materiel', [GestionStock::class,'materiel_get'])->name('materiel');

Route::get('/employer', [GestionStock::class,'employer_get'])->name('employer');
Route::get('/Historique', [GestionStock::class,'HistoriqueStock'])->name('HistoriqueStock');


//formulaire
Route::post('/stockform', [GestionStock::class,'stock_post'])->name('stock_post');
Route::post('/materielform', [GestionStock::class,'materiel_post'])->name('materiel_post');

Route::post('/employerform', [GestionStock::class,'employer_post'])->name('employer_post');
Route::post('/stocksorti', [GestionStock::class,'stock_post_sorti'])->name('stock_post_sorti');
Route::post('/stock', [GestionStock::class,'stock_post'])->name('stock_post');

