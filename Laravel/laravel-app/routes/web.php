<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FoodsController;

Route::get('/products', [
    ProductsController::class,
    'index'//index function of productsController
])->name('products');

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/posts', [PostsController::class, 'index']);
Route::resource('/foods', FoodsController::class);

// Route::get('/products/{productName}/{id}', [
//     ProductsController::class,
//     'detail'//index function of productsController
// ])->where([
//     'productName' => '[a-zA-Z0-9\s]+',
//     'id' => '[0-9]+',
// ]);

// Route::get('/', function () {
//     return view('home');
//     //return env('MY_NAME');
// });

// Route::get('/users', function() {
//     return 'this is users page';
// });

// Route::get('/aboutMe', function() {
//     return response()->json([
//         'name' => 'nguyenducvan',
//         'email' => 'nguyenducvan260903@gmail.com'        
//     ]);
// });

// Route::get('/something', function() {
//     return redirect('/');
// });