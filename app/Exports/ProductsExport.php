<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Titulo',
            'Marca',
            'No. Serial',
            'Categoria',
            'Etiqueta',
            'Ocupado',
            'Fecha de registro',
        ];
    }
    public function collection()
    {
        return DB::table('posts')
         ->join('trademarks','posts.trademark_id', '=', 'trademarks.id')
         ->join('categories','posts.category_id', '=', 'categories.id')
         ->join('post_tag','posts.id', '=', 'post_tag.post_id')
         ->join('tags','tags.id', '=', 'post_tag.tag_id')
         ->select('posts.id','title','brand','serial','categories.url','tags.name','employee_id','posts.created_at')->get();
       
    }
}