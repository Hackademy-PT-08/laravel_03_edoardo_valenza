<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    //Ottengo tutti gli articoli dall'api e li mando in output nella vista
    public function index () {

        $api_posts = Http::get('https://jsonplaceholder.typicode.com/posts');

        return view('posts.index', [

            'posts' => $api_posts->object(),
            'posts_status' => $api_posts->ok()

        ]);

    }

    //Ottengo i dettagli dell'articolo dall'api e li mostro nella relativa pagina
    public function show ($id) {

        $api_post = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);

        $api_user_post = Http::get('https://jsonplaceholder.typicode.com/users/' . $api_post->object()->userId);

        $api_comments_post = Http::get('https://jsonplaceholder.typicode.com/posts/'. $id .'/comments');

        return view('posts.show', [

            'post' => $api_post->object(),
            'author' => $api_user_post->object(),
            'comments' => $api_comments_post->object(),
            'comments_response' => $api_comments_post->ok()

        ]);

    }
}
