<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRoleRequest;
use Spatie\Permission\Models\Permission;

use App\Exports\RolesExport;
use Maatwebsite\Excel\Facades\Excel;

class RolesController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $this->authorize('view', new Roles);

        /*return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
        */
        
        return view('admin.roles.index', [
            'roles' => Role::class           
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = new Role);

        return view('admin.roles.create', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoleRequest $request)
    {
        $this->authorize('create', new Role);

        $role = Role::create($request->validated());

        if ($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        $role->permissions()->detach();

        if ($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index', $role)->withFlash('El role fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
    }

    public function export(){
        return Excel::download(new RolesExport, 'Roles.xlsx');
    }
}
