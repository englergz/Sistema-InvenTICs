<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	return view('pages.home', [
    		'title' => "Productos de la categoría '{$category->name}'",
    		'posts' => $category->posts()->published()->paginate()
		]);
    }
}
