<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\GraphicController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']], function(){
    
    //Protected logout route
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    
    //Protected create routes
    Route::post('/graphics', [GraphicController::class, 'store'])->name('graphics.store');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    
    //Protected update routes
    Route::put('/graphics/{id}', [GraphicController::class, 'update'])->name('graphics.update');
    Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    
    //Protected delete routes
    Route::delete('/graphics/{id}', [GraphicController::class, 'destroy'])->name('graphics.destroy');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


});

//Pubic register route
Route::post('/register', [UserController::class, 'register'])->name('register');
//Public login route
Route::post('/login', [UserController::class, 'login'])->name('login');

//Public index routes
Route::get('/graphics',[GraphicController::class, 'index'])->name('graphics.index');
Route::get('/messages',[MessageController::class, 'index'])->name('messages.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Public show single item routes
Route::get('/graphics/{id}', [GraphicController::class, 'show'])->name('graphics.show');
Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

//Public create message route
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

