<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyApp;
use App\Models\Menu;
use App\Models\Cart;
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
    return view('index');
});
Route::view('pizza/register','register');
Route::post('pizza/postregister',[MyApp::class,'postregister']);
Route::view('pizza/login','login');
Route::post('pizza/postlogin',[MyApp::class,'postlogin']);
Route::get('pizza/menu',function(){
    $menudata=Menu::all();
    return view("menu",['menudata'=>$menudata]);
});
Route::get('pizza/profile',[MyApp::class,'displayprofile']);
Route::get('logout',[MyApp::class,'logout']);
Route::view("pizza/profile/update",'updateprofile');
Route::post('pizza/profile/postupdate',[MyApp::class,'postupdate']);
Route::post('add_to_cart',[MyApp::class,'add_to_cart']);
Route::get('pizza/cart',[MyApp::class,'cartlist']);
Route::get('delete/{id}',[MyApp::class,'removeCart']);
Route::get('checkout',[MyApp::class,'checkout']);
Route::post('postcheckout',[MyApp::class,'postcheckout']);
Route::get('pizza/order',[MyApp::class,'orders']);