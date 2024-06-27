<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;



Route::get('/',[SiteController::class,'index'])->name('blog.news.home');