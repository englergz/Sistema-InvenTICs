<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
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
        'admission_at'
    ];

    public static function search($query)

    {
         return Employee::where('first_name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }
    
}
