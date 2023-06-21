<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Usuario',
            'Email Usuario',
            'Nombre 1',
            'Nombre 2',
            'Apellido 1',
            'Apellido 2',

            'Cargo',
    
            'Fecha de registro',
        ];
    }
    public function collection()
    {
         $users = DB::table('users')
         ->join('employees','users.employee_id', '=', 'employees.id')
         ->select('users.id','name','users.email','first_name','second_name','surname','second_surname','position','users.created_at')->get();

         return $users;
    }
}