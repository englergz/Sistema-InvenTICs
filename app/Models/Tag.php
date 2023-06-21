<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Tag extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return 'url';
    }

    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }

    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['url'] = Str::slug($name);
    }

    public static function search($query)
    {
         return  Tag::where('url', 'like', '%'.$query.'%')
                ->orWhere('name', 'like', '%'.$query.'%');
    }
}
