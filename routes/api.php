<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/posts/get', function () {

    //$posts = Post::all();
    $data = [

        [
            'id' => 1,
            'title' => 'Title 1',
            'content' => 'Content 1'
        ],
        [
            'id' => 2,
            'title' => 'Title 2',
            'content' => 'Content 2'
        ],
        [
            'id' => 3,
            'title' => 'Title 3',
            'content' => 'Content 3'
        ]

    ];

    try {

        if (!empty($data)) {

            return response($data, 200)
            ->header('Content-Type', 'application/json');
    
        } else {
    
            $response = [ 'response' => 'Non ci sono articoli esistenti' ];
    
            return response($response, 404)
            ->header('Content-Type', 'application/json');
    
        }

    } catch (Exception $e) {

        $response = [ 'response' => 'Qualcosa è andato storto nella richiesta' ];
    
        return response($response, 400)
        ->header('Content-Type', 'application/json');

    }

});

Route::get('/posts/get/{id}', function ($id) {

    //$post = Post::find($id);
    $data = [

        'id' => 1,
        'title' => 'Test 1',
        'content' => 'Test 1'

    ];

    if (!empty($data)) {

        return response($data, 200)
        ->header('Content-Type', 'application/json');

    } else {

        $response = [ 'response' => 'Non ci sono articoli esistenti' ];

        return response($response, 404)
        ->header('Content-Type', 'application/json');

    }

});

Route::post('/posts/create', function (Request $request) {

    return $request->title;

});

Route::put('/posts/update/{id}', function (Request $request, $id) {

    return $id;

});

Route::delete('/posts/delete/{id}', function ($id) {

    return $id;

});