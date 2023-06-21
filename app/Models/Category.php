<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return 'url';
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

    public function trademark()
    {
    	return $this->belongsToMany(trademark::class);
    }
    
    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['url'] = Str::slug($name);
    }

    public static function search($query)
    {
         return  Category::where('url', 'like', '%'.$query.'%')
                ->orWhere('name', 'like', '%'.$query.'%');
    }
}





