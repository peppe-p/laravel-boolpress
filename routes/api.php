<?php

use App\Post;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('posts', function () {

    //Modo personalizzato
    /* $posts = Post::all();
    return response()->json([
        'status' => 200,
        'tot_results' => count($posts),
        'response' => $posts,
    ]); */

    //Modo con paginazione
    /* $posts = Post::paginate(5);
    return $posts; */

    //Modo con relazioni fra tabelle
    $posts = Post::with(['tags'])->get();
    return $posts;
});