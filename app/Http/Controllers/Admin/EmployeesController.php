<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Post;
use App\Models\Employee;
use App\Models\DocumentID;

use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.employees.index', [
            'employees' => Employee::class,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Employee $employee)
    {
        $this->authorize('view', $employee);

        return view('admin.employees.show', compact('user','employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Employee);
        $now = Carbon::now();

        return view('admin.employees.create', [
            'date' => $now->format('Y-m-d'),
            'documentz' => DocumentID::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ 
     */
    public function store(Request $request)
    {
        $employee = Employee::find($request->get('employee'));
        if(!is_null($employee)){

            $this->validate($request, [
                'employee' => 'required'
            ]);

            return redirect()
            ->route('admin.employees.show', $employee)
            ->withFlash('Gestiona los productos e información del empleado '
            .$employee->first_name.' '.$employee->second_name.' '
            .$employee->surname .' '.$employee->second_surname.' '
            .' ');
        }else{

            $this->authorize('create', new employee);
            $this->$request->validate([
                'surname' => 'required|max:64|min:3',
                'email' => 'required|email|max:64|unique:employees',
                'document_id' => 'required',
                'num_id' => 'required|min:6|max:16|unique:employees',
                'first_name' => 'required|max:64|min:3',
                'profession'  => 'required|max:64|min:3',
                'process'  => 'required|max:64|min:3',
                'position'  => 'required|max:64|min:3',
                'phone'  => 'required|min:6|max:16',
                'address' => 'required|min:6|max:256',
            ]);

            $employee = employee::create( $request->all() );
            $employee->save();

            return redirect()->route('admin.employees.index')->withFlash('El empleado ha sido creado');
        }
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

        $now = Carbon::now();

        return view('admin.employees.edit', [
            'date' => $date = $now->format('Y-m-d'),
            'documentz' => DocumentID::all(),
            'employee' => $employee,
        ]);
      
    }

    
    public function update(Request $request, employee $employee)
    {
        
            $this->authorize('update', $employee);

            $data = $request->validate([
                'surname' => 'required|max:64|min:3',
                'document_id' => 'required',
                'first_name' => 'required|max:64|min:3',
                'profession'  => 'required|max:64|min:3',
                'process'  => 'required|max:64|min:3',
                'position'  => 'required|max:64|min:3',
                'phone'  => 'required|min:6|max:16',
                'address' => 'required|min:6|max:256',
                'num_id' => Rule::unique('employees')->ignore($employee->id),
                'email' => Rule::unique('employees')->ignore($employee->id)
            ]);
    
            
            $employee->update($request->all());
            
            $employee->save();
    
           // $employee->update($data);
            return redirect()->route('admin.employees.index', $employee )->withFlash('Usuario actualizado');
        
    }


    public function export(){
        return Excel::download(new EmployeesExport, 'Employees.xlsx');
    }

    public function destroy(Post $post)
    {
        write_to_console($post);
        $p = Post::find($post);

        write_to_console("Hello World!");

        $p->employee_debtor_since = Carbon::make(null);
        $p->employee_id = null;
        $p->update($request->all());
        $p->save();
            
    }

    
    public function write_to_console($data) {
    $console = $data;
    if (is_array($console))
    $console = implode(',', $console);
   
    echo "<script>console.log('Console: " . $console . "' );</script>";
   }
  
}
