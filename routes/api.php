<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PayPalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    //Process order
    Route::post('/place-order', [ApiController::class, 'placeOrder']);
    //Get orders
    Route::get('/get_order', [ApiController::class, 'getMyOrders']);
    //Get resources and order details
    Route::get('/get-resources-details/{id}', [ApiController::class, 'getResourcesOrderDetails']);
    Route::post('/update-order', [ApiController::class, 'updateOrder']);
    //Get order details using order_id
    Route::get('/get-order/{id}', [ApiController::class, 'getOrderDetails']);
    //Delete file by id
    Route::delete('/delete-file/{id}', [ApiController::class, 'deleteFileOrder']);

    Route::post('/assign-order', [OrderController::class, 'assignOrder']);

    //Stats
    Route::get('get-stats', [AdminController::class, 'getStats'])->name('stats');
});
Route::get('/get-resources', [ApiController::class, 'getAllResources']);
Route::post('/search-data', [ApiController::class, 'postSearchData']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
