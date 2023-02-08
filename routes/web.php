<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
 
$route = Route::current(); // Illuminate\Routing\Route
$name = Route::currentRouteName(); // string
$action = Route::currentRouteAction(); // string

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

// www.alphayo.com
// www.alphayo.com/

// Using closure
/*  Route::get('/', function (Request $request){

     return view('welcome');
})->name('appath'); */


// Using controller

// To welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('user.home');

// To blog page
Route::get('/blog', [BlogController::class, 'index'])->name('home.blog');
// To create blog post
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create')->middleware('auth');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
//Edit post
Route::get('/blog/{post}/edit',function(){
/*     if(!request()->hasValidSignature()){
        return "Its modified";
    } */
    return "Unsubscribed success";
}/* [BlogController::class,'edit'] */)->name('blog.edit')->middleware('signed');

//Update
Route::put('/blog/{post}',[BlogController::class,'update'])->name('blog.update')->where('post', '[0-9]+');

//delete blog
Route::delete('/blog/{post}',[BlogController::class,'destroy'])->name('blog.delete');
// To contact paget
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

//creating a post
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');


//Catgeory Resources

Route::resource('category', CategoryController::class);


/* exeampleeee */
//Route::redirect('/blog', '/contact', 301);
//Route::view('/contact','contact')->name('home.contact');

/* Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
}); */

/* Route::get('/user/{name?}', function ($name) {
    return $name;
});
 */


Route::get('/title',[WelcomeController::class,'titles']);
//Route::get('/title',function(){
   /*  Post::chunk(3,function($posts){
        foreach($posts as $post){
        }
    });
 
    return view('titles');
});*/




Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
