<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PermissionsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Identificador',
            'Descripción',
        ];
    }
    public function collection()
    {
        return DB::table('permissions')
         ->select('id','name','display_name')->get();
       
    }
}