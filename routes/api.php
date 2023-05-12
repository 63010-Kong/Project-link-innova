<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\New_at_Controller;
use App\Http\Controllers\ImagesProjectController;
// use App\Models\New_at;

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


Route::get('/New_at', [New_at_Controller::class, 'getNewAndActivities']);
Route::post('/New_at', [New_at_Controller::class, 'createNewAndActivities']);
Route::get('/New_at/{id}', [New_at_Controller::class, 'getNewAndActivitiesDetail']);
Route::put('/New_at/{id}', [New_at_Controller::class, 'updateNewAndActivitiesDetail']);
Route::delete('/New_at/{id}', [New_at_Controller::class, 'deleteNewAndActivitiesDetail']);

Route::get('/images_project', [ImagesProjectController::class, 'index']);
Route::post('/images_project', [ImagesProjectController::class, 'store']);
Route::get('/images_project/{id}', [ImagesProjectController::class, 'show']);
Route::put('/images_project/{id}', [ImagesProjectController::class, 'update']);
Route::delete('/images_project/{id}', [ImagesProjectController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
