<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\AdminController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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
    return view('frontend.home');
});

Route::get('/home', [HomeController::class, 'index']);


// admin view pages
Route::get('/admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/home', [AdminController::class, 'adminLogout'])->name('admin.logout');

// Users Routes
Route::get('/users', [AdminController::class, 'adminUsers'])->name('admin.users');
Route::get('/delete-users/{id}', [AdminController::class, 'deleteUsers'])->name('delete.users');

//add food items
Route::get('/add-food', [AdminController::class, 'adminfoodMenu'])->name('add.foodItems');
Route::post('/add-food', [AdminController::class, 'admin_add_food_items'])->name('submit.foodItems');

// all food items
Route::get('/all-fooditems', [AdminController::class, 'adminfoodItems'])->name('all.foodItems');
Route::get('/delete-food-items/{id}', [AdminController::class, 'deleteFoodItems'])->name('delete.foodItems');
Route::get('/edit-fooditems/{id}', [AdminController::class, 'editFoodItems'])->name('edit.foodItems');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
