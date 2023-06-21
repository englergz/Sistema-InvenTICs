<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\ActaPdf;


class ActaPdfController extends Controller
{
    public function store(Post $post)
    {
    	$this->validate(request(), [
            'Pdf' => 'required|max:10000'
		]);

        $post->actaPdfs()->create([
            'url' => request()->file('Pdf')->store('posts', 'public'),
        ]);

    }

    

    public function destroy(ActaPdf $ActaPdf)
    {
        $ActaPdf->delete();

        return back()->with('flash', 'Acta eliminada');
    }
}
