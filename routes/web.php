<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionStock;
//page

Route::get('/dashboard', [GestionStock::class,'dashboard_get'] )->name('dashboard');

Route::get('/stock', [GestionStock::class,'stock_get'])->name('stock');

Route::get('/materiel', [GestionStock::class,'materiel_get'])->name('materiel');

Route::get('/employer', [GestionStock::class,'employer_get'])->name('employer');
Route::get('/Historique', [GestionStock::class,'HistoriqueStock'])->name('HistoriqueStock');
Route::get('/Commande', [GestionStock::class,'Commande'])->name('commande');
Route::get('/', [GestionStock::class,'login'])->name('login');
Route::get('/users', [GestionStock::class,'users'])->name('users');

Route::get('/Commandes', [GestionStock::class,'Commandes'])->name('Commandes');
Route::get('/App/Setting', [GestionStock::class,'Setting'])->name('Setting');


//formulaire
Route::post('/stockform', [GestionStock::class,'stock_post'])->name('stock_post');
Route::post('/materielform', [GestionStock::class,'materiel_post'])->name('materiel_post');

Route::post('/employerform', [GestionStock::class,'employer_post'])->name('employer_post');
Route::post('/stocksorti', [GestionStock::class,'stock_post_sorti'])->name('stock_post_sorti');
Route::post('/stock', [GestionStock::class,'stock_post'])->name('stock_post');
Route::post('/loginpost', [GestionStock::class,'loginpost'])->name('loginpost');

Route::post('/userspost', [GestionStock::class,'userspost'])->name('userspost');
Route::post('/Commandepost', [GestionStock::class,'Commandepost'])->name('Commandepost');
Route::post('/Commandespost/{id}}', [GestionStock::class,'Commandespost'])->name('Commandespost');
Route::put('/Setting/update', [GestionStock::class, 'updateSetting'])->name('Setting.update');
