<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;

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
Route:: get('/', function () {
    return view('welcome');
});

// // Route:: fallback(function(){ // if the page is not exist it return back to the homepage
// //     return redirect('/');
// // });

// Route:: get('food', function () {
//     return view('food');
// });

// Route::prefix('lar')->group(function(){
   
//     Route:: get('/', function () {
//         return view('test');
//     });

//     Route :: get('test',function(){
//         return "welcome to my first laravel website";
//     });
    
//     Route :: get('test/{id}',function($id){  //lazm
//         return 'The ID is:' . $id;
//     });
    
//     Route :: get('test2/{id2?}',function($id2 = 0){  //optional and With Constrains using regex
//         return 'The ID is:' . $id2;
//     })->where(['id2'=>'[0-9]+']);  
    
//     // built in constains
//     // ->whereNumber()  - whereAlpha
    
//     Route :: get('test3/{name?}', function($name = null){
//         return 'Your name is: ' . $name;
//     })-> whereAlpha('name');
    
//     Route :: get('test4/{id}/{name}',function($id, $name){
//         return 'your ID is: ' . $id . ' and your name is: ' . $name ;
//     })->where(['id' => '[0-9]+' , 'name' => '[a-z]+']);  //whereAlpha('name');
    
//     Route :: get('product/{category}', function($cat){
//         return 'The category is: ' . $cat;
//     })-> whereIn('category',['laptop','pc','mobile']);
// });

// // ------------- Task 1 ----------------

// Route:: prefix('task1')->group(function(){

//     Route :: get('/', function() {
//         return view ('home');

//     });
   
//     Route :: get('/about', function() {
//         return view ('about');

//     });

//     Route :: get('/contact us', function() {
//         return view ('contactUs');

//     });

//     Route :: prefix('/blog')->group(function(){

//         Route :: get('/', function() {
//             return view ('blogHome');
    
//         });

//         Route :: get('/science', function() {
//             return view ('scineceBlog');
    
//         });

//         Route :: get('/sport', function() {
//             return view ('sportBlog');
    
//         });

//         Route :: get('/math', function() {
//             return view ('mathBlog');
    
//         });

//         Route :: get('/medical', function() {
//             return view ('medicalBlog');
    
//         });

//     });
// });

// ------------- Session 3 ---------------

Route :: get('login',function(){
    return view('login');
});

Route :: post('logged',function(){
    return "You Are Logged in";
})->name('logged');

Route:: get('control',[ExampleController::class,'show']); 

// ------------- Session 4 ---------------

// // Route for the car table

Route:: post('storeCar',[CarController::class,'store'])->name('storeCar'); 
Route:: get('createCar',[CarController::class,'create'])->name('createCar'); 

// ------------- Session 5 ---------------

Route:: get('cars',[CarController::class,'index'])->name('cars'); 
Route:: get('updateCar/{id}',[CarController::class,'edit']); 
Route:: put('update/{id}',[CarController::class,'update'])->name('update'); 
Route:: get('showCar/{id}',[CarController::class,'show']); 


// ***************** task routs ***************

// -------------- day4 -----------------

Route:: post('storePost',[PostController::class,'store'])->name('storePost'); 
Route:: get('addPost',[PostController::class,'create'])->name('addPost'); 
Route:: get('posts',[PostController::class,'index'])->name('posts'); 
// ------------- day 5 -----------------

Route:: get('updatePost/{id}',[PostController::class,'edit']); 
Route:: put('update/{id}',[PostController::class,'update'])->name('update'); 
Route:: get('showPost/{id}',[PostController::class,'show']); 

