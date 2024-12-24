<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\postagemController;

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

Route::get('/', function(){
    $posts = [];
    if(auth() ->check()){
        $posts = auth()->user()-> userPost()->latest()->get();
    }
    //$posts = Post::where('user_id', auth()->id())->get();
    return view ('home',['posts' => $posts]);
});

Route::post('/register', [UsuarioController::class, 'cadastrar']);
Route::post('/logout', [UsuarioController::class, 'logout']);
Route::post('/login',[UsuarioController::class, 'login' ]);


Route::post('/criar-post',[postagemController::class, 'criarPost' ]);
Route::get('/edit-post/{post}',[postagemController::class, 'mostrarEditPost' ]);
Route::put('/edit-post/{post}',[postagemController::class, 'EditPost' ]);
Route::delete('/delete-post/{post}',[postagemController::class, 'deletePost' ]);



