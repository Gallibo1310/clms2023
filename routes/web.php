<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApparatusController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BorrowingController;

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
    return view('welcome');
});

Auth::routes();

//USING ROLE MIDDLEWARE
// Route::get('/routesample', function(){
//     return 'hello';
// })->middleware(['auth' , 'role:Student']);




Route::middleware(['auth'])->group(function () {

    Route::get('/home', [ApparatusController::class, 'index'])->name('home');

    Route::prefix('apparatus')->group(function()
    {
        Route::get('/add', [ApparatusController::class, 'addpage'])->name('apparatus.addpage');
        Route::post('/add', [ApparatusController::class, 'store'])->name('apparatus.store');
    });

    Route::prefix('section')->group(function()
    {
        Route::get('/', [SectionController::class, 'index'])->name('section');
        Route::get('/add', [SectionController::class, 'addpage'])->name('section.addpage');
        Route::post('/add', [SectionController::class, 'store'])->name('section.store');
    });

    Route::prefix('student')->group(function()
    {
        Route::get('/', [StudentController::class, 'index'])->name('student');
        Route::get('/add', [StudentController::class, 'addpage'])->name('student.addpage');
        Route::post('/add', [StudentController::class, 'store'])->name('student.store');
    });

    Route::prefix('borrowing')->group(function()
    {
        Route::get('/', [BorrowingController::class, 'index'])->name('borrowing');
        Route::post('/', [BorrowingController::class, 'searchtext'])->name('borrowing.searchtext');
        Route::post('/additem' ,[BorrowingController::class, 'additem'])->name('borrowing.additem');
        Route::post('/clearItems' ,[BorrowingController::class, 'clearItems'])->name('borrowing.clearItems');
        Route::get('/borrowing' ,[BorrowingController::class, 'borrowing'])->name('borrowing.borrowing');
        Route::post('/addborrower' ,[BorrowingController::class, 'addborrower'])->name('borrowing.addborrower');
        Route::post('/borrowitems' ,[BorrowingController::class, 'borrowitems'])->name('borrowing.borrowitems');
        Route::get('/list' ,[BorrowingController::class, 'borrowinglist'])->name('borrowing.list');

    });

});


