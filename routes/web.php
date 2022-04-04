<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialController;

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
    // return Inertia::render('Auth/Login', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect()->route('dashboard');
});

Route::get('/get-stats', [AdminController::class,'getStats'])->name('stats');

Route::get('/chart', [AdminController::class,'getChartEarningsData'])->name('chart');


//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');

    Route::get('/tables', function () {
        return Inertia::render('Admin/Tables');
    })->name('tables');
    Route::get('/about', [AdminController::class, 'About'])->name('about');
    Route::get('/pricing', [AdminController::class, 'getPricing'])->name('pricing');
    Route::post('/pricing', [AdminController::class, 'storePricing'])->name('store.pricing');
    Route::put('/pricing', [AdminController::class, 'updatePricing'])->name('update.pricing');
    Route::delete('/pricing/{id}', [AdminController::class, 'deletePricing'])->name('pricing.delete');

    //Order routes
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('/assign-orders', [OrderController::class, 'assignOrder'])->name('assign.orders');
    Route::post('/client-ready', [OrderController::class, 'orderReadyToBeSendToClient'])->name('client.ready');
    Route::post('/jobs-display', [OrderController::class, 'displayJobToWriters'])->name('jobs.display');
    Route::get('/get-orders', [OrderController::class, 'getOrders'])->name('orders.get');
    Route::get('/order-details/{id}', [OrderController::class, 'getOrderDetails'])->name('order.details');

    //Settings Routes
    Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
    Route::post('settings-update', [SettingsController::class, 'upDateSettings'])->name('update.settings');
    Route::apiResource('social', SocialController::class);

    //Writers Routers
    Route::post('/rate-writer', [OrderController::class, 'rateWriter'])->name('rate.writer');

    //Stats
    
});


//Writer Routes
Route::group(['prefix' => 'writer', 'middleware' => ['auth', 'verified', 'writer']], function () {
    Route::get('/dashboard', [WriterController::class, 'Dashboard'])->name('writer.dashboard');
});

//General routes that require auth
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('client.dashboard');
});

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

require __DIR__ . '/auth.php';
