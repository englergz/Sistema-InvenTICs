<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        //return view('admin.users.index', compact('users'));
        return view('admin.users.user-data', [
            'user' => User::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;

        $this->authorize('create', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $data['password'] = "12341234";

        $user = User::create($data);

        if($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }

        if ($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update( $request->validated() );

        /*return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');*/
        return redirect()->route('admin.users.show', $user )->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')->withFlash('Usuario eliminado');
    }
}
