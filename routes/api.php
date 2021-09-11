<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CollectionsController;
use App\Http\Controllers\API\CollectionEntriesController;
use App\Http\Controllers\API\RoutesController;
use App\Http\Controllers\API\NavsController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('collections', CollectionsController::class)->only('index', 'show');

Route::name('routes.index')->get('routes', [RoutesController::class, 'index']);
Route::name('navs.index')->get('navs', [NavsController::class, 'index']);
Route::name('navs.show')->get('navs/{handle}', [NavsController::class, 'show']);
Route::name('collections.entries.slug.show')->get('collections/{collection}/entries/slug/{handle}', [CollectionEntriesController::class, 'show']);