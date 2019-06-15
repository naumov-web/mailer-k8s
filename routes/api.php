<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('account')->group(function () {
    // Recipients
    Route::post('/recipients', 'Account\RecipientsController@store')
        ->name('account.recipients.store');
    Route::get('/recipients', 'Account\RecipientsController@index')
        ->name('account.recipients.list');
    Route::put('/recipients/{recipient}', 'Account\RecipientsController@update')
        ->name('account.recipients.update');
    Route::delete('/recipients/{recipient}', 'Account\RecipientsController@delete')
        ->name('account.recipients.delete');

    // Letters
    Route::post('/letters', 'Account\LettersController@store')
        ->name('account.letters.store');
    Route::get('/letters', 'Account\LettersController@index')
        ->name('account.letters.list');
    Route::put('/letters/{letter}', 'Account\LettersController@update')
        ->name('account.letters.update');
    Route::delete('/letters/{letter}', 'Account\LettersController@delete')
        ->name('account.letters.delete');
    Route::patch('/letters/{letter}/send', 'Account\LettersController@send')
        ->name('account.letters.send');
});
