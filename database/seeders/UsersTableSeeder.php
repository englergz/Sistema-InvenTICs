<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();
        Employee::truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $superRole = Role::create(['name' => 'Supervisor', 'display_name' => 'Supervisor']);
        Role::create(['name' => 'Funcionario', 'display_name' => 'Funcionario']);
//Producto
        $viewPostsPermission = Permission::create([
            'name' => 'Ver productos',
            'display_name' => 'Ver productos'
        ]);
        $createPostsPermission = Permission::create([
            'name' => 'Crear productos',
            'display_name' => 'Crear productos'
        ]);
        $updatePostsPermission = Permission::create([
            'name' => 'Actualizar productos',
            'display_name' => 'Actualizar productos'
        ]);
        $deletePostsPermission = Permission::create([
            'name' => 'Eliminar productos',
            'display_name' => 'Eliminar productos'
        ]);
//Cuenta
        $viewUsersPermission = Permission::create([
            'name' => 'Ver usuarios',
            'display_name' => 'Ver usuarios'
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Crear usuarios',
            'display_name' => 'Crear usuarios'
        ]);
        $updateUsersPermission = Permission::create([
            'name' => 'Actualizar usuarios',
            'display_name' => 'Actualizar usuarios'
        ]);
        $deleteUsersPermission = Permission::create([
            'name' => 'Eliminar usuarios',
            'display_name' => 'Eliminar usuarios'
        ]);
//Empleado
        $viewUsersPermission = Permission::create([
            'name' => 'Ver empleado',
            'display_name' => 'Ver empleado'
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Crear empleado',
            'display_name' => 'Crear empleado'
        ]);
        $updateUsersPermission = Permission::create([
            'name' => 'Actualizar empleado',
            'display_name' => 'Actualizar empleado'
        ]);
        $deleteUsersPermission = Permission::create([
            'name' => 'Eliminar empleado',
            'display_name' => 'Eliminar empleado'
        ]);
//Role
        $viewRolesPermission = Permission::create([
            'name' => 'Ver roles',
            'display_name' => 'Ver roles'
        ]);
        $createRolesPermission = Permission::create([
            'name' => 'Crear roles',
            'display_name' => 'Crear roles'
        ]);
        $updateRolesPermission = Permission::create([
            'name' => 'Actualizar roles',
            'display_name' => 'Actualizar roles'
        ]);
        $deleteRolesPermission = Permission::create([
            'name' => 'Eliminar roles',
            'display_name' => 'Eliminar roles'
        ]);
//Permiso
        $viewPermissionsPermission = Permission::create([
            'name' => 'Ver permisos',
            'display_name' => 'Ver permisos'
        ]);
        $updatePermissionsPermission = Permission::create([
            'name' => 'Actualizar permisos',
            'display_name' => 'Actualizar permisos'
        ]);

//crear empleado        
        $empleado = new Employee;
        $empleado->type_id ='CC';
        $empleado->num_id = '1087000113';
        $empleado->first_name = 'Jose';
        $empleado->second_name = 'Eduardo';
        $empleado->surname = 'Solís';
        $empleado->second_surname = '';
        $empleado->profession = 'Ingeniero de Sistemas';
        $empleado->process = 'Departamento TICs';
        $empleado->position = 'Practicante';
        $empleado->email = 'joseeduardo@hotmail.com';
        $empleado->phone = '3110001111';
        $empleado->address = 'Libertad';
        $empleado->save();

        $empleado = new Employee;
        $empleado->type_id ='CC';
        $empleado->num_id = '1087888113';
        $empleado->first_name = 'Luis';
        $empleado->second_name = 'Felipe';
        $empleado->surname = 'Quintero';
        $empleado->second_surname = 'Ortiz';
        $empleado->profession = 'Condador';
        $empleado->process = 'Departamento de Finanzas';
        $empleado->position = 'Practicante';
        $empleado->email = '';
        $empleado->phone = '3110012344';
        $empleado->address = 'Av. La Playa';
        $empleado->save();

        $empleado = new Employee;
        $empleado->type_id ='CC';
        $empleado->num_id = '1087000777';
        $empleado->first_name = 'Cristian';
        $empleado->second_name = 'Eduardo';
        $empleado->surname = 'Cortes';
        $empleado->second_surname = 'Cortes';
        $empleado->profession = 'Ingeniero de Sistemas';
        $empleado->process = 'Departamento TICs';
        $empleado->position = 'Director';
        $empleado->email = '';
        $empleado->phone = '3110001555';
        $empleado->address = 'Viento Libre';
        $empleado->save();

        $empleado = new Employee;
        $empleado->type_id ='CC';
        $empleado->num_id = '1087000222';
        $empleado->first_name = 'Carmen';
        $empleado->second_name = 'America';
        $empleado->surname = 'Hurtado';
        $empleado->second_surname = 'Gomez';
        $empleado->profession = 'Tecnologa';
        $empleado->process = 'Departamento TICs';
        $empleado->position = 'Auxiliar Administrativa';
        $empleado->email = '';
        $empleado->phone = '3110007777';
        $empleado->address = 'Barrio ciudadela';
        $empleado->save();

//crear cuenta

        $admin = new User;
        $admin->employee_id = 1;
        $admin->name = 'Jose Solís';
        $admin->email = 'jose@gmail.com';
        $admin->password = '12341234';
        $admin->save();

        $admin->assignRole($adminRole);

        $super = new User;
        $admin->employee_id = 2;
        $super->name = 'Luis Quintero';
        $super->email = 'luis@gmail.com';
        $super->password = '12341234';
        $super->save();

        $super->assignRole($superRole);

        $funcionario = new User;
        $admin->employee_id = 3;
        $funcionario->name = 'Cristian Cortes';
        $funcionario->email = 'cortes@gmail.com';
        $funcionario->password = '12341234';
        $funcionario->save();

        $super = new User;
        $admin->employee_id = 4;
        $super->name = 'Carmen Hurtado';
        $super->email = 'carmen@gmail.com';
        $super->password = '12341234';
        $super->save();

        $super->assignRole($superRole);
    }
}