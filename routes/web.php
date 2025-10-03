<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestControl;
use App\Http\Controllers\GreetController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

//an

Route::view('/home', "home", ['name' => "Elene", 'lastname' => "Nemstsveridze"]);


Route::get('/test1', function () {
    return "Hello Laravel";
});

Route::redirect('/test2', '/test1');

Route::get('/user/{id?}', function ($id=0) {
    return 'User '.$id;
});

Route::get('/control', [TestControl::class, 'func_1']);

Route::get('/form', function () {
    return view('form');
});


// Form display
Route::get('/form', [GreetController::class, 'showForm'])->name('greeting.form');

// Form submission
Route::post('/form', [GreetController::class, 'generateGreeting'])->name('greeting.generate');
