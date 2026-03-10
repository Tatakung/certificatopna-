<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as Pdf;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//เฉพาะแอดมิน
Route::middleware(['web', 'is_admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'showuser'])->name('admin.home');
    Route::get('/admin/userdetail/{id}', [AdminController::class, 'userdetail'])->name('userdetail');
    Route::get('/admin/createuser', [RegisterController::class, 'showRegistrationForm'])->name('createuser');
    Route::post('/employee/detail/{id}', [RegisterController::class, 'updateuser'])->name('updateuser');
    Route::get('/admin/historyuser/{id}', [AdminController::class, 'historyuser'])->name('historyuser'); //หน้าhistoryuser.blade.php
});
//สำหรับพนักงานและแอดมิน
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/employee/home', [UserController::class, 'homepage'])->name('homepage');   //หน้าแรกของพนักงาน
    Route::get('/employee/formcer', [UserController::class, 'showform'])->name('formcer'); //หน้าformcer.blade.php
    Route::post('/employee/formcer/save', [UserController::class, 'savedata'])->name('savedata'); //ส่วนบันทึกจากหน้า formcer
    Route::get('/employee/detail/{id}', [UserController::class, 'detail'])->name('detail'); //หน้าdetail.blade.php
    Route::get('/employee/detail/file/{id}', [UserController::class, 'printpdf'])->name('printpdf'); //หน้า file ขออนุมัติการเดินทาง
    Route::get('/fileprice', [UserController::class, 'fileprice'])->name('fileprice');


    Route::get('/province', [UserController::class, 'province'])->name('province');
    Route::get('/sendprovince/{sendprovincedata}', [UserController::class, 'getsendprovince']);
    Route::get('/senddis/{senddisdata}', [UserController::class, 'getsenddis']);


    Route::get('/employee/detail/publiccar/{id}', [UserController::class, 'publiccar'])->name('publiccar');
    Route::get('/employee/detail/pdfexpense/{id}', [UserController::class, 'pdfexpenses'])->name('pdfexpenses');

    Route::get('/employee/detail/newpubliccar/{id}', [UserController::class, 'newpubliccar'])->name('newpubliccar');



    Route::get('/employee/edit/{id}', [UserController::class, 'edit'])->name('edit'); // หน้า edit.blade.php






    Route::get('/employee/test', [UserController::class, 'test']);


    Route::get('/pdf/request-travel', [UserController::class, 'requesttravel']);

    Route::get('/joy', [UserController::class, 'joypdf']);




    //ทดสอบ
    // Route::get('/employee/detail/publiccarco/{id}', [UserController::class, 'publiccarcopy'])->name('publiccar');












    Route::get('/employee/date', function () {
        return view('date');
    });
});
