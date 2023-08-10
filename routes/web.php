<?php

use App\Models\Listing;
use PhpParser\Node\Expr\List_;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingContr;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingContr::class,'index']);




// create - show form to create new listing
Route::get('/listings/create', [ListingContr::class,'create'])->middleware('auth');


//  store listing data
Route::post('/listings',[ListingContr::class,'store'])->middleware('auth');


// edit - show form to edit Listing
Route::get('/listings/{listing}/edit',[ListingContr::class,'edit'])->middleware('auth');


// update - update listing 
Route::put('/listings/{listing}',[ListingContr::class ,'update'])->middleware('auth');

// delete - update listing 
Route::delete('/listings/{listing}',[ListingContr::class ,'destroy'])->middleware('auth');

// Mange Lisiting
Route::get('/listings/manage',[ListingContr::class,'manage'])->middleware('auth');

// Single List 
Route::get('/listings/{listing}',[ListingContr::class,'show'])->middleware('auth');



// show register form


Route::get('/register',[UserController::class,'create'])->middleware('guest');


// Create new user

Route::post('/users',[UserController::class,'store']);


// Logout

Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

// Login

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/auth',[UserController::class,'auth']);


