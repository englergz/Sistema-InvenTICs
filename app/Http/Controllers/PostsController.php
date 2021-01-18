<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        if ($post->isPublished() || auth()->check())
        {
            return view('posts.show', compact('post'));
        }

        abort(404);
    }

    public function blog()
    {
        $query = Post::published();

        if(request('month')) {
            $query->whereMonth(request('month'));
        }

        if(request('year')) {
            $query->whereYear(request('year'));
        }

		$posts = $query->paginate();

    	return view('pages.blog', compact('posts'));
    }
}
