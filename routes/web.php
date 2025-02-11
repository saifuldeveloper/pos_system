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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return redirect('/login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('users')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\UserController::class, 'view'])->name('users.view');
    Route::get('/add', [App\Http\Controllers\Backend\UserController::class, 'add'])->name('users.add');
    Route::put('/store', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\UserController::class, 'delete'])->name('users.delete');
});
Route::prefix('profiles')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\ProfileController::class, 'view'])->name('profiles.view');
    Route::get('/edit', [App\Http\Controllers\Backend\ProfileController::class, 'edit'])->name('profiles.edit');
    Route::post('/store', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('profiles.update');
    Route::get('/passwrod/view', [App\Http\Controllers\Backend\ProfileController::class, 'passwordView'])->name('profiles.password.view');
    Route::put('/passwrod/update', [App\Http\Controllers\Backend\ProfileController::class, 'passwordUpdate'])->name('profiles.password.update');
});



Route::prefix('supplier')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\SupplierController::class, 'view'])->name('supplier.view');
    Route::get('/add', [App\Http\Controllers\Backend\SupplierController::class, 'add'])->name('supplier.add');
    Route::put('/store', [App\Http\Controllers\Backend\SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'delete'])->name('supplier.delete');
});

Route::prefix('customers')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\CustomersController::class, 'view'])->name('customers.view');
    Route::get('/add', [App\Http\Controllers\Backend\CustomersController::class, 'add'])->name('customers.add');
    Route::put('/store', [App\Http\Controllers\Backend\CustomersController::class, 'store'])->name('customers.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\CustomersController::class, 'edit'])->name('customers.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\CustomersController::class, 'update'])->name('customers.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\CustomersController::class, 'delete'])->name('customers.delete');
    Route::get('/creadit', [App\Http\Controllers\Backend\CustomersController::class, 'customercreadit'])->name('customers.creadit');
    Route::get('/creadit/pdf', [App\Http\Controllers\Backend\CustomersController::class, 'customercreaditpdf'])->name('customers.creadit.pdf');
    Route::get('/invoice/edit/{invoice_id}', [App\Http\Controllers\Backend\CustomersController::class, 'editinvoice'])->name('customers.edit.invoice');
    Route::post('/invoice/update/{invoice_id}', [App\Http\Controllers\Backend\CustomersController::class, 'updateinvoice'])->name('customers.update.invoice');
    Route::get('/invoice/details/pdf/{invoice_id}', [App\Http\Controllers\Backend\CustomersController::class, 'invoicedeailspdf'])->name('customers.invoice.details.pdf');
    Route::get('/paid', [App\Http\Controllers\Backend\CustomersController::class, 'customerpaid'])->name('customers.paid');
    Route::get('/paid/pdf', [App\Http\Controllers\Backend\CustomersController::class, 'customerpaidpdf'])->name('customers.paid.pdf');
    Route::get('/wise/report', [App\Http\Controllers\Backend\CustomersController::class, 'customerwisereport'])->name('customers.wise.report');
    Route::get('/wise/credit/report', [App\Http\Controllers\Backend\CustomersController::class, 'customerwisecreditreport'])->name('customers.wise.credit.report');
    Route::get('/wise/paid/report', [App\Http\Controllers\Backend\CustomersController::class, 'customerwisepaidreport'])->name('customers.wise.paid.report');

});

Route::prefix('unit')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\UnitController::class, 'view'])->name('unit.view');
    Route::get('/add', [App\Http\Controllers\Backend\UnitController::class, 'add'])->name('unit.add');
    Route::put('/store', [App\Http\Controllers\Backend\UnitController::class, 'store'])->name('unit.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\UnitController::class, 'update'])->name('unit.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\UnitController::class, 'delete'])->name('unit.delete');
});

Route::prefix('category')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\CategoryController::class, 'view'])->name('category.view');
    Route::get('/add', [App\Http\Controllers\Backend\CategoryController::class, 'add'])->name('category.add');
    Route::put('/store', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'delete'])->name('category.delete');
});

Route::prefix('product')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\ProductController::class, 'view'])->name('product.view');
    Route::get('/add', [App\Http\Controllers\Backend\ProductController::class, 'add'])->name('product.add');
    Route::put('/store', [App\Http\Controllers\Backend\ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('product.delete');
});
Route::prefix('purchase')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\PurchaseController::class, 'view'])->name('purchase.view');
    Route::get('/add', [App\Http\Controllers\Backend\PurchaseController::class, 'add'])->name('purchase.add');
    Route::post('/store', [App\Http\Controllers\Backend\PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/pending', [App\Http\Controllers\Backend\PurchaseController::class, 'pendinglist'])->name('purchase.pending.list');
    Route::get('/approve/{id}', [App\Http\Controllers\Backend\PurchaseController::class, 'approve'])->name('purchase.approve');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\PurchaseController::class, 'delete'])->name('purchase.delete');
    Route::get('/report', [App\Http\Controllers\Backend\PurchaseController::class, 'purchasereport'])->name('purchase.report');
    Route::get('/report/pdf', [App\Http\Controllers\Backend\PurchaseController::class, 'purchasereportpdf'])->name('purchase.report.pdf');
});


Route::get('/get-category', [App\Http\Controllers\Backend\DefaultController::class, 'getCategory'])->name('get-category');
Route::get('/get-product', [App\Http\Controllers\Backend\DefaultController::class, 'getProduct'])->name('get-product');
Route::get('/check-product-stock', [App\Http\Controllers\Backend\DefaultController::class, 'getStock'])->name('check-product-stock');


Route::prefix('invoice')->group(function () {
    Route::get('/view', [App\Http\Controllers\Backend\InvoiceController::class, 'view'])->name('invoice.view');
    Route::get('/add', [App\Http\Controllers\Backend\InvoiceController::class, 'add'])->name('invoice.add');
    Route::post('/store', [App\Http\Controllers\Backend\InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/pending', [App\Http\Controllers\Backend\InvoiceController::class, 'pendinglist'])->name('invoice.pending.list');
    Route::get('/approve/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'approve'])->name('invoice.approve');
    Route::get('/delete/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'delete'])->name('invoice.delete');
    Route::post('/approval/store/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'approvestore'])->name('approval.store');
    Route::get('/print/list', [App\Http\Controllers\Backend\InvoiceController::class, 'invoiceprintlist'])->name('invoice.print.list');
    Route::get('/print/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'invoiceprint'])->name('invoice.print');
    Route::get('/daily/report', [App\Http\Controllers\Backend\InvoiceController::class, 'dailyreport'])->name('invoice.daily.report');
    Route::get('/daily/report/pdf', [App\Http\Controllers\Backend\InvoiceController::class, 'dailyreportpdf'])->name('invoice.daily.invoice.pdf');
});

Route::prefix('stock')->group(function () {
    Route::get('/report', [App\Http\Controllers\Backend\StockController::class, 'stockreport'])->name('stock.report');
    Route::get('/report/pdf', [App\Http\Controllers\Backend\StockController::class, 'stockreportPdf'])->name('stock.report.pdf');
    Route::get('/report/supplier/wise', [App\Http\Controllers\Backend\StockController::class, 'stockreportSupplierwise'])->name('stock.report.supplier.wise');
    Route::get('/report/supplier/wise/pdf', [App\Http\Controllers\Backend\StockController::class, 'stockreportSupplierwisepdf'])->name('stock.report.supplier.wise.pdf');
    Route::get('/report/product/wise/pdf', [App\Http\Controllers\Backend\StockController::class, 'stockreportproductwisepdf'])->name('stock.report.product.wise.pdf');
});
