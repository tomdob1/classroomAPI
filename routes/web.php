<?php

use Illuminate\Support\Facades\Route;

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

Route::controller(\App\Http\Controllers\EmployeeController::class)->group(function () {
    Route::get('/', 'getEmployees');
});

Route::controller(\App\Http\Controllers\TimeTableController::class)->group(function () {
    Route::get('/timetable/{employeeId}/monday', 'getTimetableMonday')->name('timetableMonday');
    Route::get('/timetable/{employeeId}/tuesday', 'getTimetableTuesday')->name('timetableTuesday');
    Route::get('/timetable/{employeeId}/wednesday', 'getTimetableWednesday')->name('timetable');
    Route::get('/timetable/{employeeId}/thursday', 'getTimetableThursday')->name('timetable');
    Route::get('/timetable/{employeeId}/friday', 'getTimetableFriday')->name('timetable');
});


