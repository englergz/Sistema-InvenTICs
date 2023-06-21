<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ActaPdf extends Model
{
    protected $table = "acta_pdfs";// <-- El nombre personalizado

    protected $guarded = [];
    protected $fillable = [
        'url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($actaPdf){
            Storage::disk('public')->delete($actaPdf->url);
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
