<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public static function search($query)
    {
         return  Roles::where('name', 'like', '%'.$query.'%')
                ->orWhere('display_name', 'like', '%'.$query.'%');
    }
}
