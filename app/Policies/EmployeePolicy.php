<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    use HandlesAuthorization;
    
    public function before($user)
    {
        if ( $user->hasRole('Admin') )
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function view(User $user, Employee $employee)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Ver empleado');
    }

    /**
     * Determine whether the user can create Employees.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Crear empleado');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function update(User $user, Employee $employee)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Actualizar empleado');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function delete(User $user, Employee $employee)
    {
        if( $role->id === 1)
        {
            $this->deny('No se puede eliminar este empleado');
        }

        return $user->hasRole('Admin') || $user->hasPermissionTo('Eliminar empleado');
    }
}
