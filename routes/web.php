<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Blog;

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
    $showPost = Blog::latest()->paginate(10);
    return view('welcome', compact('showPost'));
});

// show details post for with out login user
Route::get('posts/{post:slug}', function (App\Models\Blog $post) {
    return view('posts.show', ['post' => $post]);
})->name('posts.show');

// Route::get('posts/{post:slug}', function (Post $post) {
//     return view('posts.show', ['post' => $post]);
// });


Route::get('/aboutus', function () {
    return view('aboutus');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/category', [CategoryController::class, 'index'])->name('category.index')->middleware('can:manage_users');
Route::post('/category', [CategoryController::class, 'create'])->name('category.create')->middleware('can:manage_users');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('can:manage_users');
Route::put('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('can:manage_users');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('can:manage_users');


// blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::post('/blog', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/edit/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{id}', [BlogController::class, 'view'])->name('blog.view');



require __DIR__ . '/auth.php';

// if(Auth::user()->id=='1' || auth()->user()->id==$id+1)