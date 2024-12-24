<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postagemController extends Controller
{
    public function criarPost(Request $request){
        
        if(auth()->check()){

        $dados = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $dados['title'] = strip_tags($dados['title']);
        $dados['body'] = strip_tags($dados['body']);
        $dados['user_id'] = auth()-> id();
        Post::create($dados);
        }
        
        return redirect('/');
    }

    public function mostrarEditPost(Post $post){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post', ['post'=> $post]);
    }

    public function EditPost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        $dados = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $dados['title'] = strip_tags($dados['title']);
        $dados['body'] = strip_tags($dados['body']);

        $post->update($dados);

        return redirect('/');

    }

    public function deletePost(Post $post, Request $request){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/');

    }
}
