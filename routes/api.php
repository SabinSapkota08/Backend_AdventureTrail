<?php

use App\Http\Controllers\AdventurePackageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdventureTicketController;
use App\Http\Controllers\OrderController;

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


// Route::post('login', 'API\UserController@login');
// Route::post('register', 'API\UserController@register');
// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('details', 'API\UserController@details');
// });


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::get('products', [ProductController::class, 'indexApi']);
Route::get('adventure_packages',[AdventurePackageController::class, 'indexApi']);
Route::get('adventure_tickets',[AdventureTicketController::class, 'indexApi']);
Route::get('orders',[OrderController::class, 'indexApi']);
Route::post('order/create',[OrderController::class, 'create']);
Route::get("/test",function(){
//  return   User::all();
// return User::find(2);
return User::where("name","!=","Deja Shields")->paginate(5);
})
;