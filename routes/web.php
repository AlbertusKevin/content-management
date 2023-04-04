<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DataMaster\IdeaStatusController;
use App\Http\Controllers\PhotoController;

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
    return view('partial.main');
})->name("home");

Route::prefix('data-master')->name('data-master.')->group(function() {
    Route::prefix('idea-status')->name('idea-status.')->group(function() {
        Route::get("/",[IdeaStatusController::class,"get"])->name('get');
        Route::get("/{idea_status_id}",[IdeaStatusController::class,"find"])->name('find');
        Route::post("/",[IdeaStatusController::class,"insert"])->name('insert');
        Route::put("/{idea_status_id}",[IdeaStatusController::class,"update"])->name('update');
        Route::delete("/{idea_status_id}",[IdeaStatusController::class,"delete"])->name('delete');
    });
});