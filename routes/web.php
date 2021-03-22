<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

Route::get("/", function () {
    return redirect()->route("posts.index");
});
Route::group(['middleware' => ['auth']], function () {
    Route::get("/posts", [PostsController::class, "index"])->name("posts.index");
    Route::get("/posts/create", [PostsController::class, "create"])->name("posts.create");
    Route::post("posts", [PostsController::class, "store"])->name("posts.store");
    Route::get("/posts/restore", [PostsController::class, "restoreDeleted"])->name("posts.restore");
    Route::get("/posts/{post}", [PostsController::class, "show"])->name("posts.show");
    Route::get("/posts/{post}/edit", [PostsController::class, "edit"])->name("posts.edit");
    Route::put("/posts/{post}", [PostsController::class, "update"])->name("posts.update");
    Route::delete("/posts/{post}", [PostsController::class, "destroy"])->name("posts.destroy");
    Route::post("/comments", [CommentsController::class, "store"])->name("comments.store");
    Route::get("/posts/ajax/{post}", [PostsController::class, "ajax"])->name("posts.ajax");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
