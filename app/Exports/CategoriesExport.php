<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
            'Url',
            'Fecha de registro',
        ];
    }
    public function collection()
    {
        return DB::table('categories')
         ->select('id','name','url','created_at')->get();
       
    }
}