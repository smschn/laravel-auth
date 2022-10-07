<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth; // aggiunto per non visualizzare errore in vscode a riga 22, nonostante Auth sia importato in automatico

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// si raggruppano tutte le routes relative alla parte amministrativa del sito
// devono, per essere considerate routes amministrative, soddisfare tutti i campi sottostanti (le seguenti funzioni fungono da filtro per l'accesso):
// esempio: se non ho l'autorizzazione, si passa oltre andando a recuperare altre routes che non saranno amministrative.
Route::middleware('auth') // controlla se si ha l'autorizzazione per proseguire, accedendo a queste routes (l'autorizzazione c'è dopo aver eseguito il login, viceversa non c'è).
    ->namespace('Admin') // cerca i controller solo nella cartella 'Admin' dei controller: \app\http\controllers\ADMIN.
    ->name('admin.') // cerca solo le routes i cui nomi iniziano con 'admin.'.
    ->prefix('admin') // cerca solo le routes che hanno nella parte iniziale dell'url '/admin'
    ->group(function () { // raggruppa tutte le route che soddisfano le condizioni precedenti
        Route::get('/', 'HomeController@Index')->name('home');  //
    });