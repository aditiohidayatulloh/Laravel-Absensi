<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfileController::class)->only('index','update','edit');
    Route::resource('employee', EmployeeController::class);
    Route::resource('position', PositionController::class);
    Route::resource('division', DivisionController::class);
    Route::resource('salary', SalaryController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('attendance', AttendanceController::class);

    Route::get('/employeereport',[PDFController::class,'EmployeeReport']);
    Route::get('/salaryreport',[PDFController::class,'SalaryReport']);
    Route::get('/divisionreport',[PDFController::class,'DivisionReport']);
    Route::get('/positionreport',[PDFController::class,'PositionReport']);
    Route::get('/schedulereport',[PDFController::class,'ScheduleReport']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

