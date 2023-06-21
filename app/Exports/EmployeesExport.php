<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Documento',
            'Nombre 1',
            'Nombre 2',
            'Apellido 1',
            'Apellido 2',
            'Profession',
            'Proceso',
            'Cargo',
            'Email',
            'Celular',
            'Dirección',
            'Fecha de registro',
        ];
    }
    public function collection()
    {
        return DB::table('employees')
         ->select('id',
         'num_id',
         'first_name',
         'second_name',
         'surname',
         'second_surname',
         'profession',
         'process',
         'position',
         'email',
         'phone',
         'address',
         'created_at',
         )->get();
       
    }
}