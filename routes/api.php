<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->name('.admin')->namespace('Auth')->group(function(){

    Route::post('login', 'LoginController');//->middleware('throttle:5,60');
    Route::post('logout', 'LogoutController');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::group(['middleware' => 'auth:api',], function ($router) {

Route::post('import', 'ItemDataImport\ItemDataImportController')->name('import');

Route::get('dashboard', 'Dashboard\DashboardController');

Route::get('reports/orders', 'Report\ReportController');

Route::get('orders', 'Order\OrderIndexController');
Route::get('orders/search', 'Order\OrderSearchController');
Route::get('orders/{id}', 'Order\OrderShowController');
Route::post('orders', 'Order\OrderCreateController');
Route::patch('orders/{id}', 'Order\OrderUpdateController');

Route::post('addresses-customers', 'AddressCustomer\AddressCustomerCreateController');

Route::post('item-orders', 'ItemOrder\ItemOrderCreateController');


Route::get('customers', 'Customer\CustomerIndexController');
Route::get('customers/{id}', 'Customer\CustomerShowController');
Route::post('customers', 'Customer\CustomerCreateController');
Route::patch('customers/{id}', 'Customer\CustomerUpdateController');
// Route::delete('customers/{id}', 'Customer\CustomerDeleteController');

Route::get('staff', 'Staff\StaffIndexController');
Route::get('staff/{id}', 'Staff\StaffShowController');
Route::post('staff', 'Staff\StaffCreateController');
Route::patch('staff/{id}', 'Staff\StaffUpdateController');
Route::delete('staff/{id}', 'Staff\StaffDeleteController');


Route::get('users', 'User\UserIndexController');
Route::patch('users', 'User\UserUpdateController');

Route::get('items', 'Item\ItemIndexController');
Route::get('items/{id}', 'Item\ItemShowController');
Route::post('items', 'Item\ItemCreateController');
Route::patch('items/{id}', 'Item\ItemUpdateController');
Route::delete('items/{id}', 'Item\ItemDeleteController');

Route::get('addresses', 'Address\AddressIndexController');
Route::get('addresses/{id}', 'Address\AddressShowController');
Route::post('addresses', 'Address\AddressCreateController');
Route::patch('addresses/{id}', 'Address\AddressUpdateController');

Route::get('comments', 'Comment\CommentIndexController');
Route::post('comments', 'Comment\CommentCreateController');

});

// Route::delete('items/{id}', 'Item\ItemDeleteController');
