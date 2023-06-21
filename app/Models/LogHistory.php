<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'trademark_id','serial','title', 'body', 'iframe', 'excerpt', 'published_at', 
        'category_id', 'assigns_user_id', 'receives_user_id','create_user_id','destroy_user_id',
        'employee_id', 'employee_debtor_since','post_id',
    ];

    public function posts()
    {
    	return $this->belongsTo(post::class, 'post_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'create_user_id');
    }

    public function receives()
    {
        return $this->belongsTo(User::class, 'receives_user_id');
    }

    public function assigns()
    {
        return $this->belongsTo(User::class, 'assigns_user_id');
    }

    public function employeeDebtor()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
