<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;




Route::middleware('guest.session')->group(function(){
    Route::get('/login',[AuthController::class,'showLoginForm'])->name('LoginForm');
    Route::post('/login',[AuthController::class,'Login'])->name('LoginSubmit');
    Route::get('/register',[AuthController::class,'showRegisterForm'])->name('RegisterForm');
    Route::post('/register',[AuthController::class,'Register'])->name('RegisterSubmit');
});


Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth.session')->group(function(){
    Route::get('/home',[ViewController::class,'home'])->name('home');
    Route::get('/createpost',[ViewController::class,'createPostform'])->name('newPostForm');
    Route::post('/createpost',[PostController::class,'createPost'])->name('createPost');
    Route::post('/deletepost/{id_post}',[PostController::class,'deletePost'])->name('deletePost');
    Route::post('/like/{id_post}',[PostController::class,'like'])->name('likePost');
    Route::post('/follow/{id_user}',[FollowController::class,'follow'])->name('Follow');
    Route::get('/followers/{id_user}',[ViewController::class,'Followers'])->name('followers');
    Route::get('/followed/{id_user}',[ViewController::class,'Followed'])->name('followed');
    Route::get('/posts/liked', [ViewController::class, 'likedPost'])->name('likedPost');
    Route::get('/account/{id_user}',[ViewController::class,'viewAccount'])->name('viewAccount');
    Route::get('/search',[ViewController::class,'searchAccount'])->name('Search');
    Route::get('/settings',[ViewController::class,'settings'])->name('settings');
    Route ::post('/settings',[AuthController::class,'updateSettings'])->name('updateSettings');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/deleteAccount',[AuthController::class,'deleteAccount'])->name('deleteAccount');
});