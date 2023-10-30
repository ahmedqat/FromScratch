<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
//All Listings

//Route::get('/', 'HomeController@page')->name('index');



// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing



Route::get('/', [ListingController::class, 'index']);






//Show create form

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');



//Store Listing Data

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
//Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');




//Show the register page
Route::get('/register',[UserController::class,'create'])->middleware('guest');


//Create new User
Route::post('/users', [UserController::class, 'store']);


//logout user

Route::post('/logout', [UserController::class,'logout'])->middleware('auth');


//Show Login Form

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Log in User

Route::post('users/authenticate',[UserController::class,'authenticate']);



//Show Manage Gigs

Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');



//Update Listing


//Traversity
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Mr Haree Update Listing
//Route::put('/listings/{listing}', 'ListingController@update')->name('listingUpdate');


//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');


//Single Listing
Route::get('/listings/{listing}',[ListingController::class,'show']);
