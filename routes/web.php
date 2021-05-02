<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ /*
//Route that send back view
Route::get('/', function () {
    return view('home');
});



//Route to users- string
Route::get('/users', function (){
    return "welcome to the users page";
});

//Route that sends back array(json)
Route::get('/users', function (){
    return ['PHP', 'HTML', 'LARAVEL'];
});

//Route to users - JSON object
Route::get('/users', function (){
    return response()->json([
        'name' => 'janar',
        'asjad' => 'asi'
    ]);
});


//Route to users - function

Route::get('/users', function (){
    return redirect('/');
});*/

//Laravel 8 new
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);


//pattern is integer
// Route::get('/products/{id}', 
// [ProductsController::class, 'show'])->where('id', '[0-9]+');

//string

// Route::get('/products/{name}/{id}', 
// [ProductsController::class, 'show'])->where([
//     'name' => '[a-z]+',
//     'id' => '[0-9]+'
// ]);


// Route::get('/products/about', [ProductsController::class, 'about']);
//Laravel 8 new2
//Route::get('/products', 'App\Http\Controllers\ProductsController@index');

//before laravel 8 doesnt work anymore
//Route::get('/products', 'ProductsController@index');