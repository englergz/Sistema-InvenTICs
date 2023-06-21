<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($photo){
            Storage::disk('public')->delete($photo->url);
        });
    }
    public function getURL(){
        return Storage::url($this->url);
    }

    public function post()
    {
    	return $this->belongsTo(post::class, 'post_id');
    }

}
