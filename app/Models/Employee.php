<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
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
        'admission_at',
        'user_id'
    ];

    public static function search($query)

    {
         return Employee::where('first_name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }
    
    public function getDocument_id()
    {
    	return $this->belongsTo(DocumentID::class,'document_id');
    } 

    public function user()
    {
    	return $this->hasMany(user::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function logHistory()
    {
        return $this->hasMany(logHistory::class);
    }

    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this) )
        {
            return $query;
        }

        return $query->where('id', auth()->id());
    }
    
}
