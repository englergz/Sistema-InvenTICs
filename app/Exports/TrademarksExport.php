<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrademarksExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Marca',
            'Sitio Web',
            'Soporte',
            'Nit',
            'Fecha de registro',
        ];
    }
    public function collection()
    {
        return DB::table('trademarks')
         ->select('id','brand','website','support','nit','created_at')->get();
       
    }
}