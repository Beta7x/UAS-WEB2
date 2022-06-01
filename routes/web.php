<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ItemController;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Request;
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

Route::get('/laptop', [ItemController::class, 'index'])->name('laptop');
Route::get('/tambahdata', [ItemController::class, 'tambahitem'])->name('tambahdata');
Route::get('/ubahdata/{id}', [ItemController::class, 'ubahdata'])->name('ubahdata');
Route::get('/deletedata/{id}', [ItemController::class, 'deletedata'])->name('deletedata');
// Route::get('/uploadfile', [ItemController::class, 'uploadfile'])->name('uploadfile');

Route::post('/insertdata', [ItemController::class, 'insertdata'])->name('insertdata');
Route::post('/updatedata/{id}', [ItemController::class, 'updatedata'])->name('updatedata');
// Route::post('/uploadfile', [ItemController::class, 'cloudUploads'])->name('uploadfile');