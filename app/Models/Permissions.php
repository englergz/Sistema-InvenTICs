<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    public static function search($query)
    {
         return  Permissions::where('name', 'like', '%'.$query.'%')
                ->orWhere('display_name', 'like', '%'.$query.'%');
    }
}
