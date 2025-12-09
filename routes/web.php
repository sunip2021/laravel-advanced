<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('post',PostController::class);
});
Route::resource('user',UserController::class);
Route::resource('employee',EmployeeController::class);
Route::resource('tasks',TaskController::class);
Route::post('/fetch-task',[TaskController::class,'fetchTasks'])->name('fetchtasks');
// Route::get('/',function(){
//     Post::whereId(1)-> first()->delete();
//     // Comment::wherePostId(1)->delete();
// });
require __DIR__.'/auth.php';

