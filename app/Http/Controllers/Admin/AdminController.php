<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Employee;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archive =  Post::selectRaw('year(published_at) year')
                ->selectRaw('monthname(published_at) month')
                ->selectRaw('count(*) posts')
                ->groupBy('year', 'month')
               // ->orderBy('published_at')
                ->get();

        $stock =  Post::latest('updated_at')->whereNull('employee_id')
                ->get();

        //$category = DB::table('posts')->distinct('category_id')->count();
        $category = Post::distinct('category_id')->count();

        //$tag = Post::tags()->distinct('tag_id')->count();
        $tag = DB::table('post_tag')
        ->join('posts', 'post_tag.post_id', '=', 'posts.id')
        ->select('')->distinct('post_id')->count();

        $employee = Post::distinct('employee_id')->count();

        return view('admin.dashboard', [
            'employees_count' => $employee,
            'employees' => Employee::count(),
            'tags_count' => $tag,
            'tags' => Tag::count(),
            'categories_count' => $category,
            'categories' => Category::get(),
            'authors' => User::latest()->take(3)->get(),
            'posts' => Post::latest('published_at')->take(3)->get(),
            'stock' => $stock,
            'archive' => $archive,
            'users' => User::get()
        ]);
    }
}
