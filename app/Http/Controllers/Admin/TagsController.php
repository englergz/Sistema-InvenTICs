<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\Rule;

use App\Exports\TagsExport;
use Maatwebsite\Excel\Facades\Excel;

class TagsController extends Controller
{
    //
    public function index()
    {
        return view('admin.tags.index', [
            'tag' => Tag::class
        ]);
    }

    public function edit(tag $tag)
    {

        return view('admin.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update(Request $request, tag $tag)
    {

        $data = $request->validate([
            'name' => 'required|max:32|min:3',
            'url' => 'required|max:32|min:3',
            'name' => Rule::unique('tags')->ignore($tag->id),
            'url' => Rule::unique('tags')->ignore($tag->id)
        ]);
        $tag->update($data);

        return redirect()->route('admin.tag.index', $tag)->withFlash('Etiqueta actualizada correctamente');
    }

    public function create()
    {
        $tag = new tag;


        return view('admin.tags.create',  compact('tag'));
    }

    public function store(Request $request)
    {
        if(!$request->get('url')){
            $data = $request->validate([
                'name' => 'required|max:32|min:3|unique:tags',
            ]);
        }else{
            $data = $request->validate([
                'name' => 'required|max:32|min:3|unique:tags',
                'url' => 'required|max:32|min:3|unique:tags',
            ]);
        }

        $tag = tag::create($data);

        return redirect()->route('admin.tag.index')->withFlash('Etiqueta creada exitosamente');
    }

    public function export(){
        return Excel::download(new TagsExport, 'Tags.xlsx');
    }
}
