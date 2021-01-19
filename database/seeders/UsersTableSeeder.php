<?php

namespace Database\Seeders;

use App\Models\User;
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

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $studentRole=Role::create(['name' => 'Estudiante', 'display_name' => 'Estudiante']);
        $tacherRole= Role::create(['name' => 'Docente', 'display_name' => 'Profesor']);
        $parentRole= Role::create(['name' => 'Padres', 'display_name' => 'Acudiente']);
        $writerRole= Role::create(['name' => 'Escritor', 'display_name' => 'Escritor']);
        Role::create(['name' => 'Director', 'display_name' => 'Director de curso']);
        Role::create(['name' => 'Representante', 'display_name' => 'Representante de curso']);

        $viewPostsPermission = Permission::create([
            'name' => 'Ver publicaciones',
            'display_name' => 'Ver publicaciones'
        ]);
        $createPostsPermission = Permission::create([
            'name' => 'Crear publicaciones',
            'display_name' => 'Crear publicaciones'
        ]);
        $updatePostsPermission = Permission::create([
            'name' => 'Actualizar publicaciones',
            'display_name' => 'Actualizar publicaciones'
        ]);
        $deletePostsPermission = Permission::create([
            'name' => 'Eliminar publicaciones',
            'display_name' => 'Eliminar publicaciones'
        ]);

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

        $viewPermissionsPermission = Permission::create([
            'name' => 'Ver permisos',
            'display_name' => 'Ver permisos'
        ]);
        $updatePermissionsPermission = Permission::create([
            'name' => 'Actualizar permisos',
            'display_name' => 'Actualizar permisos'
        ]);

        $admin = new User;
        $admin->name = 'Engler Gonzalez';
        $admin->email = 'englergonzalez@hotmail.com';
        $admin->password = '12341234';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Jorge';
        $writer->email = 'jorge@gmail.com';
        $writer->password = '12341234';
        $writer->save();

        $writer->assignRole($writerRole);

        $parent = new User;
        $parent->name = 'Luis';
        $parent->email = 'luis@gmail.com';
        $parent->password = '12341234';
        $parent->save();

        $parent->assignRole($parentRole);

        $student = new User;
        $student->name = 'Engler Prado';
        $student->email = 'englerprado@gmail.com';
        $student->password = '12341234';
        $student->save();

        $student->assignRole($studentRole);

        $tacher = new User;
        $tacher->name = 'Eduard';
        $tacher->email = 'eduard@gmail.com';
        $tacher->password = '12341234';
        $tacher->save();

        $tacher->assignRole($tacherRole);

        $parent = new User;
        $parent->name = 'Carmen';
        $parent->email = 'carmen@gmail.com';
        $parent->password = '12341234';
        $parent->save();

        $parent->assignRole($parentRole);

        $student = new User;
        $student->name = 'Caicedo';
        $student->email = 'caicedo@gmail.com';
        $student->password = '12341234';
        $student->save();

        $student->assignRole($studentRole);
    }
}