<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trademark;
use Illuminate\Validation\Rule;

use App\Exports\TrademarksExport;
use Maatwebsite\Excel\Facades\Excel;

class TrademarksController extends Controller
{
    //
    public function index()
    {
        return view('admin.trademarks.index', [
            'trademark' => trademark::class
        ]);
    }

    public function edit(trademark $trademark)
    {

        return view('admin.trademarks.edit', [
            'trademarks' => $trademark
        ]);
    }

    public function update(Request $request, trademark $trademark)
    {

        $request->validate(['brand' => 'required']);
        $request->validate([
            'brand' => Rule::unique('trademarks')->ignore($trademark->id)
        ]);

        
        $trademark->update($request->all());
        $trademark->save();

        return redirect()->route('admin.trademarks.index', $trademark)->withFlash('Marca comercial actualizada correctamente');
    }

    public function create()
    {
        $trademark = new trademark;

        return view('admin.trademarks.create',  compact('trademark'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand' => 'required|min:1|unique:trademarks',
        ]);

        $trademark = trademark::create($request->all());
        $trademark->save();

        return redirect()->route('admin.trademarks.index')->withFlash('Marca comercial creada exitosamente');
    }

    public function export(){
        return Excel::download(new TrademarksExport, 'Trademarks.xlsx');
    }
}
