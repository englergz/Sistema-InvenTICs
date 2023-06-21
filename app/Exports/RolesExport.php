<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RolesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Identificador',
            'Nombre',
        ];
    }
    public function collection()
    {
        return DB::table('roles')
         ->select('id','name','display_name')->get();
       
    }
}