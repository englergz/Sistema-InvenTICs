<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesController extends Controller
{
    //
    public function index()
    {
       

        return view('admin.categories.index', [
            'category' => Category::class
        ]);
    }

    public function edit(category $category)
    {

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, category $category)
    {

        $data = $request->validate([
            'name' => 'required|max:32|min:3|unique:categories',
            'url' => 'required|max:32|min:3|unique:categories',
            'name' => Rule::unique('categories')->ignore($category->id),
            'url' => Rule::unique('categories')->ignore($category->id)
        ]);
        $category->update($data);

        return redirect()->route('admin.categories.index', $category)->withFlash('La categoría ha sido actualizada');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new category;

        return view('admin.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        if(!$request->get('url')){
            $data = $request->validate([
                'name' => 'required|max:32|min:3|unique:categories',
            ]);
        }else{
            $data = $request->validate([
                'name' => 'required|max:32|min:3|unique:categories',
                'url' => 'required|max:32|unique:categories',
            ]);
        }
        $category = category::create($data );

        return redirect()->route('admin.categories.index')->withFlash('Categoría creada exitosamente');
    }

    public function export(){
        return Excel::download(new CategoriesExport, 'Categories.xlsx');
    }
}
