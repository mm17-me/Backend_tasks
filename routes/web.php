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
Route::get('/', function () {
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

Route::post('login',function(){
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
//Route:: put('update/{id}',[CarController::class,'update'])->name('updateCar'); 
Route::put('changeCar/{id}',[CarController::class,'update'])->name('changeCar'); 
Route:: get('showCar/{id}',[CarController::class,'show']); 

// ------------- Session 6 ---------------
Route:: get('deleteCar/{id}',[CarController::class,'destroy']); 
Route:: get('trashed',[CarController::class,'trashed'])->name('trashed'); 
Route:: get('forceDelete/{id}',[CarController::class,'forceDelete'])->name('forceDelete'); 
Route:: get('restoreCar/{id}',[CarController::class,'restore'])->name('restoreCar'); 


// ------------- Session 7---------------

Route :: get('testimg', function() {
                return view ('testt');
        
            });

Route :: get('image', function() {
    return view ('image');

});
Route:: post('imageUpload',[ExampleController::class,'upload'])->name('imageUpload'); 


// ------------- Session 8 ---------------

Route :: get('homePage', function() {
    return view ('testHome');

});



// ***************** task routs ***************

// -------------- day4 -----------------

Route:: post('storePost',[PostController::class,'store'])->name('storePost'); 
Route:: get('addPost',[PostController::class,'create'])->name('addPost'); 
Route:: get('posts',[PostController::class,'index'])->name('posts'); 

// ------------- day 5 -----------------

Route:: get('updatePost/{id}',[PostController::class,'edit']); 
Route:: put('update/{id}',[PostController::class,'update'])->name('updatePosts'); 
Route:: get('showPost/{id}',[PostController::class,'show']); 

// ------------- day 6 -----------------

Route:: get('deletePost/{id}',[PostController::class,'destroy']); 
Route:: get('trashedPost',[PostController::class,'trash'])->name('trashedPost');
Route:: get('forceDelete/{id}',[PostController::class,'forceDelete'])->name('forceDeletePost');
Route:: get('restorePost/{id}',[PostController::class,'restore'])->name('restorePost');


