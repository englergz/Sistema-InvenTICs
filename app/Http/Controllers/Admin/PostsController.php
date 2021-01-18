<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    

    public function index()
    {
        /*$post = Post::allowed()->get();
        return view('admin.posts.index', compact('post'));*/
        return view('admin.posts.index', [
            'post' => Post::class
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);

        $this->validate($request, ['title' => 'required|min:3']);
       
        $post = Post::create( $request->all() );
        $post->category_id = 1;
        $post->save();

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $now = Carbon::now();

        return view('admin.posts.edit', [
            'time' => $time = $now->format('H:i'),
            'date' => $date = $now->format('Y-m-d'),
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);
        $post->update($request->all());
        $post->published_at = Carbon::parse( $request->get('published_at')."". $request->get('time'));
        
        
        $post->save();
        
        $post->syncTags($request->get('tags'));

        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La publicación ha sido guardada');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La publicación ha sido eliminada');
    }
}
