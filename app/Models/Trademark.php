<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = "trademarks";// <-- El nombre personalizado
    use HasFactory;
    
    protected $fillable = [
        'brand','website','nit','support',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
    	return $this->belongsToMany(category::class);
    }

    public static function search($query)
    {
         return  Trademark::where('brand', 'like', '%'.$query.'%')
                ->orWhere('website', 'like', '%'.$query.'%');
    }
    
    public function getCategoryNames()
    {
       $category = Trademark::with('categories')->get();
       return $this->name->pluck('name')->implode(', ');
    }
}
