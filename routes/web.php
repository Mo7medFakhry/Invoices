<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('invoices', InvoicesController::class);

Route::resource('sections' , SectionsController::class) ;

Route::resource('products' , ProductsController::class);

Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);


Route::get('/section/{id}', [InvoicesController::class , 'getproducts']);

Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'index']);


Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);

Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');


Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);


Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');

Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');

Route::resource('Archive', InvoiceAchiveController::class);


Route::get('Invoice_Paid', [InvoicesController::class,'Invoice_Paid']);

Route::get('Invoice_UnPaid', [InvoicesController::class,'Invoice_UnPaid']);

Route::get('Invoice_Partial', [InvoicesController::class,'Invoice_Partial']);


Route::get('Print_invoice/{id}', [InvoicesController::class,'Print_invoice']);


Route::get('/{page}', [AdminController::class, 'index']);

Route::group(['middleware' => ['auth']],function(){

    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

});



