<?php

// frontsite
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

// backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\UserTypeController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\AppointmentBController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\ReportController;
use App\Http\Controllers\Backsite\TransactionController;

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

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::resource('appointment', AppointmentController::class);

    // payment page
    Route::resource('payment', PaymentController::class);

});
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {

    // dashboard
    Route::resource('dashboard', DashboardController::class);

    // type_user
    Route::resource('type_user', UserTypeController::class);
   
    // permission
    Route::resource('permission', PermissionController::class);

    // role
    Route::resource('role', RoleController::class);
    
    // user
    Route::resource('user', UserController::class);
    
    // config-payment
    Route::resource('config-payment', ConfigPaymentController::class);

    // consultation
    Route::resource('consultation', ConsultationController::class);

    // specialist
    Route::resource('specialist', SpecialistController::class);

    // appointment
    Route::resource('appointment', AppointmentBController::class);
    
    // doctor
    Route::resource('doctor', DoctorController::class);
    
    // report
    Route::resource('report', ReportController::class);

    // transaction
    Route::resource('transaction', TransactionController::class);

    

});
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
