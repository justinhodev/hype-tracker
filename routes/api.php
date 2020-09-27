<?php

use App\Http\Controllers\API\SneakerController;
use App\Http\Controllers\API\RankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResources([
    'sneakers' => SneakerController::class,
    'sneakers.rankings' => RankingController::class,
]);
