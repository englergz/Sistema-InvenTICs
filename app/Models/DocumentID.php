<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentID extends Model
{
    protected $table = "document_id";// <-- El nombre personalizado

    protected $fillable = [
        'codigo','descripcion'
    ];

    public function employee()
    {
    	return $this->hasMany(Employee::class);
    }
}
