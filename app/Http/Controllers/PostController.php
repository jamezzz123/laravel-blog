<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{
     /**
     * Display a listing of the resource. 
     */
     public function index(): View
     {
        return view('post.index', [
            //
        ]);
     }

     /**
     * Display a listing of the resource. 
     */
     public function create(): View
     {
        return view('post.create', [
            //
        ]);
     }
}
