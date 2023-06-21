<x-app-layout>
<x-slot name="header_content">
        <h1>Nuevo usuario</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Usuarios</a></div>
            <div class="breadcrumb-item">Nuevo</div>
		</div>
	</x-slot>
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Datos personales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Crea el usuario y asignale un rol, este hereda los permisos que tenga su rol asignado, además puedes incluir permisos adicionales,
                        recuerda que, tambien puedes modificar esto luego.
                    </p>
                </div>
            </div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                        
                            <select name="employee_id" id="employee_id" class="form-control">
                            <option value="" selected="true" disabled="disabled">Seleccione el funcionario</option>
								@foreach ($employees as $employee)
									<option value="{{ $employee->id }}"
											{{ old('name', $user->employee_id) == $employee->id ? 'selected' : '' }} data-user_id="{{$employee->email}}"
									>{!! $employee->surname .' '.$employee->second_surname.' '.$employee->first_name.' '.$employee->second_name !!}</option>
								@endforeach
							</select>
							{!! $errors->first('employee_id', '<span class="text-red-600">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label for="name">Nombre de usuario</label>
                            <input name="name"id="name" type="name" value="{{ old('name' ) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input name="email"id="email" type="email" value="{{ old('email' ) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Roles</label>
                            @include('admin.roles.checkboxes')
                        </div>
                        <div class="form-group col-md-6">
                            <label>Permisos</label>
                            @include('admin.permissions.checkboxes', ['model' => $user])
                        </div>
                        <span class="help-block">La contraseña por defecto es "12341234" </span>
                        <button class="btn btn-primary btn-block">Crear usuario</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  

</x-app-layout>
