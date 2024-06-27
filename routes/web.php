<?php

use Illuminate\Support\Facades\Route;
use  App\Models\{Address, UserData,User};
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

Require __DIR__ .'/site/routes.php';
Require __DIR__ .'/authentication/routes.php';
Require __DIR__ .'/employee/routes.php';
Require __DIR__ .'/admin/routes.php';

