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
use Spatie\Permission\Models\Role;

class Roles extends Model
{
    use HasFactory;

    public static function search($query)
    {
         return  Roles::where('name', 'like', '%'.$query.'%')
                ->orWhere('display_name', 'like', '%'.$query.'%');
    }
    
    public function getUserNames()
    {
       $roles = Roles::with('permissions')->get();
       return $this->name->pluck('display_name')->implode(', ');
    }
}
