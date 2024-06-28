<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display list of the post. 
     */
    public function index(): View
    {
        return view('post.index', [
            //
        ]);
    }

    /**
     * create a post. 
     */
    public function create(): View
    {
        return view('post.create', [
            //
        ]);
    }

    /**
     * create a post. 
     */
    public function show($id)
    {

        // return $id;
        $post = Post::findOrFail($id);
        return view('post.show', [
            'id' => $post['id'],
            'title' => $post['title'],
            'content' => $post['content']
        ]);
    }
}
