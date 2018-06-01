<?php

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
Route::get('/', ['as' => 'user.login', 'uses' => 'backend\UserController@index']);
Route::post('/admin-panel', ['as' => 'user.check', 'uses' => 'backend\UserController@login']);
//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'Revalidate'],function() {
    Route::group(['middleware' => 'Authenticate'], function () {

        Route::get('/dashboard-panel', ['as' => 'user.dashboard', 'uses' => 'backend\DashboardController@index']);

        Route::get('/user-register', ['as' => 'user.register', 'uses' => 'backend\UserController@create']);
        Route::post('/user-save', ['as' => 'user.store', 'uses' => 'backend\UserController@store']);
        Route::get('/change-password', ['as' => 'change.password', 'uses' => 'backend\UserController@changepassword']);
        Route::post('/change-save', ['as' => 'change.save', 'uses' => 'backend\UserController@changesave']);
        Route::get('/reset-password', ['as' => 'reset.password', 'uses' => 'backend\ForgotPasswordController@showLinkRequestForm']);
        Route::post('password/email', ['as' => 'reset.password.send', 'uses' => 'backend\ForgotPasswordController@sendResetLinkEmail']);
        Route::get('password/reset/{token}', ['as' => 'reset.password.token', 'uses' => 'backend\ResetPasswordController@showResetForm']);
        Route::post('password/reset', ['as' => 'reset.password.save', 'uses' => 'backend\ResetPasswordController@reset']);


        Route::get('/logout', ['as' => 'user.logout', 'uses' => 'backend\UserController@logout']);

        Route::get('/module-create', ['as' => 'module.create', 'uses' => 'backend\ModuleController@create']);
        Route::post('/module-store', ['as' => 'module.store', 'uses' => 'backend\ModuleController@store']);
        Route::get('/module-list', ['as' => 'module.list', 'uses' => 'backend\ModuleController@index']);
        Route::get('/module-edit/{id}', ['as' => 'module.edit', 'uses' => 'backend\ModuleController@edit']);
        Route::post('/module-update/{id}', ['as' => 'module.update', 'uses' => 'backend\ModuleController@update']);

        Route::get('/role-create', ['as' => 'role.create', 'uses' => 'backend\RoleController@create']);
        Route::post('/role-store', ['as' => 'role.store', 'uses' => 'backend\RoleController@store']);
        Route::get('/role-list', ['as' => 'role.list', 'uses' => 'backend\RoleController@index']);

        Route::get('/permission-create', ['as' => 'permission.create', 'uses' => 'backend\PermissionController@create']);
        Route::post('/permission-store', ['as' => 'permission.store', 'uses' => 'backend\PermissionController@store']);
        Route::get('/permission-list', ['as' => 'permission.list', 'uses' => 'backend\PermissionController@index']);
        Route::delete('/permission-delete/{id}', ['as' => 'permission.delete', 'uses' => 'backend\PermissionController@destroy']);
        Route::get('/permission-edit/{id}', ['as' => 'permission.edit', 'uses' => 'backend\PermissionController@edit']);
        Route::post('/permission-update/{id}', ['as' => 'permission.update', 'uses' => 'backend\PermissionController@update']);


        Route::get('/permission/asign/{id}', ['as' => 'permission.asign', 'uses' => 'backend\PermissionController@asign']);
        Route::post('/permission/permissionasign/{id}', ['as' => 'permission.permissionasign', 'uses' => 'backend\PermissionController@permissionasign']);


        Route::get('/productcategory-create', ['as' => 'productcategory.create', 'uses' => 'backend\ProductcategoryController@create']);
        Route::get('/productcategory-list', ['as' => 'productcategory.list', 'uses' => 'backend\ProductcategoryController@index']);
        Route::post('/productcategory-save', ['as' => 'productcategory.store', 'uses' => 'backend\ProductcategoryController@store']);
        Route::delete('/productcategory-delete/{id}', ['as' => 'productcategory.delete', 'uses' => 'backend\ProductcategoryController@destroy']);
        Route::get('/productcategory-edit/{id}/edit', ['as' => 'productcategory.edit', 'uses' => 'backend\ProductcategoryController@edit']);
        Route::post('/productcategory-update/{id}', ['as' => 'productcategory.update', 'uses' => 'backend\ProductcategoryController@update']);


        Route::get('/product-create', ['as' => 'product.create', 'uses' => 'backend\ProductController@create']);
        Route::get('/product-list', ['as' => 'product.list', 'uses' => 'backend\ProductController@index']);
        Route::post('/product-save', ['as' => 'product.store', 'uses' => 'backend\ProductController@store']);
        Route::delete('/product-delete/{id}', ['as' => 'product.delete', 'uses' => 'backend\ProductController@destroy']);
        Route::get('/product-edit/{id}/edit', ['as' => 'product.edit', 'uses' => 'backend\ProductController@edit']);
        Route::post('/product-update/{id}', ['as' => 'product.update', 'uses' => 'backend\ProductController@update']);
        Route::get('/stock-edit/{id}/edit', ['as' => 'stock.edit', 'uses' => 'backend\ProductController@stockedit']);
        Route::post('/stock-update/{id}', ['as' => 'stock.update', 'uses' => 'backend\ProductController@stockupdate']);

        Route::get('/sales-create', ['as' => 'sales.create', 'uses' => 'backend\SalesController@create']);
        Route::post('/sales-store', ['as' => 'sales.store', 'uses' => 'backend\SalesController@store']);
        Route::get('/sales-list', ['as' => 'sales.list', 'uses' => 'backend\SalesController@index']);
        Route::get('/ajaxsales-list', ['as' => 'ajaxsales.list', 'uses' => 'backend\SalesController@ajaxlist']);
        Route::get('/ajax-form', ['as' => 'ajax.form', 'uses' => 'backend\SalesController@ajaxform']);
        Route::get('/refresh-product', ['as' => 'refresh.product', 'uses' => 'backend\SalesController@refreshproduct']);
        Route::get('/sales-allpdf', ['as' => 'sales.printall', 'uses' => 'backend\SalesController@getallpdf']);
        Route::post('/custom-report', ['as' => 'custom.report', 'uses' => 'backend\SalesController@getcustomreport']);
        Route::post('/getquantity', ['as' => 'sales.getquantity', 'uses' => 'backend\SalesController@getquantity']);
        Route::post('/getprice', ['as' => 'sales.getprice', 'uses' => 'backend\SalesController@getprice']);
        Route::post('/savetosales', ['as' => 'save.sales', 'uses' => 'backend\SalesController@savetosales']);
        Route::delete('/delete-salescart/{id}/{pid}', ['as' => 'salescart.delete', 'uses' => 'backend\SalesController@deletecart']);


        Route::get('/expenses-create', ['as' => 'expenses.create', 'uses' => 'backend\ExpensesController@create']);
        Route::get('/expenses-list', ['as' => 'expenses.list', 'uses' => 'backend\ExpensesController@index']);
        Route::post('/expenses-save', ['as' => 'expenses.store', 'uses' => 'backend\ExpensesController@store']);
        Route::delete('/expenses-delete/{id}', ['as' => 'expenses.delete', 'uses' => 'backend\ExpensesController@destroy']);
        Route::get('/expenses-edit/{id}/edit', ['as' => 'expenses.edit', 'uses' => 'backend\ExpensesController@edit']);
        Route::post('/expenses-update/{id}', ['as' => 'expenses.update', 'uses' => 'backend\ExpensesController@update']);
        Route::get('/expensesheading-create', ['as' => 'expensesheading.create', 'uses' => 'backend\ExpensesController@expensesheadingcreate']);
        Route::post('/expensesheading-save', ['as' => 'expensesheading.store', 'uses' => 'backend\ExpensesController@expensesheadingstore']);
        Route::get('/expenses-report', ['as' => 'expenses.report', 'uses' => 'backend\ExpensesController@export']);


        Route::get('/purchase-create', ['as' => 'purchase.create', 'uses' => 'backend\PurchaseController@create']);
        Route::get('/purchase-list', ['as' => 'purchase.list', 'uses' => 'backend\PurchaseController@index']);
        Route::post('/purchase-save', ['as' => 'purchase.store', 'uses' => 'backend\PurchaseController@store']);
        //Route::delete('/purchase-delete/{id}', ['as' => 'purchase.delete', 'uses' => 'backend\PurchaseController@destroy']);
        //Route::get('/purchase-edit/{id}/edit', ['as' => 'purchase.edit', 'uses' => 'backend\PurchaseController@edit']);
        Route::get('/purchase-update/{id}', ['as' => 'purchase.update', 'uses' => 'backend\PurchaseController@update']);
        Route::post('/purchase-report', ['as' => 'purchase.report', 'uses' => 'backend\PurchaseController@export']);

        Route::get('/transaction-create', ['as' => 'transaction.create', 'uses' => 'backend\TransactionController@create']);
        Route::get('/transaction-list', ['as' => 'transaction.list', 'uses' => 'backend\TransactionController@index']);
        Route::post('/transaction-save', ['as' => 'transaction.store', 'uses' => 'backend\TransactionController@store']);
        Route::get('/transaction-update/{id}', ['as' => 'transaction.update', 'uses' => 'backend\TransactionController@update']);
        Route::get('/transaction-report', ['as' => 'transaction.report', 'uses' => 'backend\TransactionController@export']);

    });
});