<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TagsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
            'URL',
            'Fecha de registro',
        ];
    }
    public function collection()
    {
        return DB::table('tags')
         ->select('tags.id','name','url','tags.created_at')->get();
       
    }
}