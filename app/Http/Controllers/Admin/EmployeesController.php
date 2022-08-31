<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Employee;

use App\Exports\employeesExport;
use Maatwebsite\Excel\Facades\Excel;


use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$employees = Employee::get();

        //return view('admin.employees.index', compact('employees'));
        return view('admin.employees.index', [
            'employees' => Employee::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new employee;

        $this->authorize('create', $employee);

        return view('admin.employees.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ 
     */
    public function store(Request $request)
    {
        $employee = new employee;
        $this->authorize('create', $employee);
        $post = employee::create( $request->all() );
        $post->save();

        return redirect()->route('admin.employees.index')->withFlash('El contratista ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        $this->authorize('view', $employee);

        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        $this->authorize('update', $employee);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view('admin.employees.edit', compact('employee'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, employee $employee)
    {
        $this->authorize('update', $employee);

        $employee->update( $request->validated() );

        /*return redirect()->route('admin.employees.edit', $employee)->withFlash('Usuario actualizado');*/
        return redirect()->route('admin.employees.show', $employee )->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $this->authorize('delete', $employee);

        $employee->delete();

        return redirect()->route('admin.employees.index')->withFlash('Usuario eliminado');
    }

    public function export(){
        return Excel::download(new employeesExport, 'employees.xlsx');
    }
}
