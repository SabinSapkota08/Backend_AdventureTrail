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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("app", function (){
   return view("vendor.multiauth.dashboard.main.view");
});
Route::prefix('dashboard')->middleware(['auth:admin'])->group(function () {
    //-----------------------Start Profile-------------------------------------------------------------
    Route::get("/profile","ProfileController@index")->name("dashboard.profile");
    Route::post("/profile","ProfileController@update")->name("dashboard.profile.update");
    //-----------------------End Profile-------------------------------------------------------------

    //-----------------------Start Front User-------------------------------------------------------------
    Route::get("/front_user","FrontendUserController@index")->name("front.user.index");
    Route::get("/front_user/delete/{id}","FrontendUserController@destroy")->name("front.user.delete");
    Route::get("/front_user/edit/{id}","FrontendUserController@edit")->name("front.user.edit");
    Route::get("/front_user/verify/{id}","FrontendUserController@verify")->name("front.user.verify");
    Route::get("/front_user/change_status/{id}","FrontendUserController@change_status")->name("front.user.change_status");
    Route::post("/front_user/update/{id}","FrontendUserController@update")->name("front.user.update");

    //-----------------------End Front User-------------------------------------------------------------

    //-----------------------Start Settings General  -------------------------------------------------------------
    Route::get("/settings/general","GeneralController@edit")->name("setting.general.edit");
    Route::post("/settings/general/{id}","GeneralController@update")->name("setting.general.update");

    //-----------------------stop Settings General  -------------------------------------------------------------

    //-----------------------Start Settings api  -------------------------------------------------------------
    Route::get("/settings/api","ApiController@edit")->name("setting.api.edit");
    Route::post("/settings/api/{id}","ApiController@update")->name("setting.api.update");

    //-----------------------stop Settings api  -------------------------------------------------------------
    Route::get("/products","ProductController@index")->name("product.index");
    Route::get("/product/add","ProductController@add")->name("product.add");
    Route::post("/product/store","ProductController@store")->name("product.store");
    Route::get("/product/delete/{id}","ProductController@destroy")->name("product.delete");
    Route::get("/product/edit/{id}","ProductController@edit")->name("product.edit");
    Route::post("/product/update/{id}","ProductController@update")->name("product.update");


    Route::get("/orders","OrderController@index")->name("orders.index");


    Route::get("/adventure_packages","AdventurePackageController@index")->name("adventure_packages.index");
    Route::get("/adventure_packages/add","AdventurePackageController@add")->name("adventure_package.add");
    Route::post("/adventure_packages/store","AdventurePackageController@store")->name("adventure_package.store");
    Route::get("/adventure_packages/delete/{id}","AdventurePackageController@destroy")->name("adventure_package.delete");
    Route::get("/adventure_packages/edit/{id}","AdventurePackageController@edit")->name("adventure_package.edit");
    Route::post("/adventure_packages/update/{id}","AdventurePackageController@update")->name("adventure_package.update");

    Route::get("/adventure_tickets","AdventureTicketController@index")->name("adventure_tickets.index");
    Route::get("/adventure_tickets/add","AdventureTicketController@add")->name("adventure_ticket.add");
    Route::post("/adventure_tickets/store","AdventureTicketController@store")->name("adventure_ticket.store");
    Route::get("/adventure_tickets/delete/{id}","AdventureTicketController@destroy")->name("adventure_ticket.delete");
    Route::get("/adventure_tickets/edit/{id}","AdventureTicketController@edit")->name("adventure_ticket.edit");
    Route::post("/adventure_tickets/update/{id}","AdventureTicketController@update")->name("adventure_ticket.update");

});



