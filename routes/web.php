<?php
// route web principale qui correspond à l'URL racine de l'application. Lorsque quelqu'un accède à cette URL, il voit la vue 'welcome', et le middleware 'verify.shopify' est appliqué avant l'exécution de la route.

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
})->middleware(['verify.shopify'])->name('home');
