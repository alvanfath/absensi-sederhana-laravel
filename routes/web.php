<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\StudentController;


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





route::group(['middleware' => ['auth','ceklevel:admin,student']], function(){
    //home
    route::get('/home',[HomeController::class, 'index'])->name('home');
});

//only admin
route::group(['middleware' => ['auth','ceklevel:admin']], function(){
        //resource
            
            Route::resource('rayon', RayonController::class);
            Route::resource('student', StudentController::class);

       
    //register
    route::get('register',[RegisterController::class, 'index'])->name('register');

    //post
    route::post('regisadmin',[RegisterController::class, 'admin']);

    //absen
    route::get('tampilan',[AbsenController::class, 'tampilanabsen'])->name('tampilan');
});
    

//only student
route::group(['middleware' => ['auth','ceklevel:student']], function(){
    //masuk
    route::get('/masuk',[AbsenController::class, 'masuk'])->name('masuk');
    route::post('/postmasuk',[AbsenController::class, 'store'])->name('postmasuk');

    //pulang
    route::get('/pulang',[AbsenController::class, 'pulang'])->name('pulang');
    route::post('/postpulang',[AbsenController::class, 'absenpulang'])->name('postpulang');

    //gahadir
    route::get('/gahadir',[AbsenController::class, 'gahadir'])->name('gahadir');
    route::post('/postgahadir',[AbsenController::class, 'gadatang'])->name('postgahadir');
});

route::get('/login',[LoginController::class, 'index'])->name('login');
route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');


//logout
route::get('/logout', [LoginController::class, 'logout'])->name('logout');