<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Models\Permissions;

use App\Exports\PermissionsExport;
use Maatwebsite\Excel\Facades\Excel;

class PermissionsController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Permission);

        /*return view('admin.permissions.index',[
            'permission' => Permission::all()
        ]);*/
        return view('admin.permissions.index', [
            'permission' => Permissions::class
        ]);
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $data = $request->validate(['display_name' => 'required']);

        $permission->update($data);

        return redirect()->route('admin.permissions.index', $permission)->withFlash('El permiso ha sido actualizado');
    }

    public function export(){
        return Excel::download(new PermissionsExport, 'Permissions.xlsx');
    }
    
}
