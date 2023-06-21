<x-app-layout>
<x-slot name="header_content">
        <h1>Actualizar empleado</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Usuarios</a></div>
            <div class="breadcrumb-item">empleado</div>
		</div>
	</x-slot>
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Datos personales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Actualiza los datos del empleado, puedes cambiar estos datos luego en caso de ser necesario,
                        recuerda que, debes tener permiso para realizar dicha función.
                    </p>
                </div>
            </div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">

                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.employees.update', $employee) }}">
                       {{ method_field('PUT') }} {{ csrf_field() }}

                        <div class="col-md-12">
					    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('document_id') ? 'has-error' : '' }}">
							<label>Tipo de documento</label>
							<select name="document_id" class="form-control select2">
								<option value="">Seleciona un Tipo de documento</option>
								@foreach ($documentz as $document_id)
									<option value="{{ $document_id->id }}"
											{{ old('docuement_id', $employee->document_id) == $document_id->id ? 'selected' : '' }}
									>{{ $document_id->descripcion }}</option>
								@endforeach
							</select>
							{!! $errors->first('document_id', '<span class="text-red-600">:message</span>') !!}
						</div>

                        <div class="col-span-6 sm:col-span-3 form-group {{ $errors->has('num_id') ? 'has-error' : '' }}">
                            <label for="num_id">Número de identificación</label>
                            <input type="number" name="num_id" value="{{ old('num_id', $employee->num_id) }}" class="form-control">
                        </div>
                        </div>
							
                        <div class=" grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="first_name">Primer nombre</label>
                            <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" class="form-control">
                        </div>
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="second_name">Segundo nombre</label>
                            <input type="text" name="second_name" value="{{ old('second_name', $employee->second_name) }}" class="form-control">
                        </div>
                        </div>

                        <div class=" grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3  form-group">
                            <label for="surname">Primer apellido</label>
                            <input  type="text" name="surname" value="{{ old('surname', $employee->surname) }}" class="form-control">
                        </div>
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="second_surname">Segundo apellido</label>
                            <input  type="text" name="second_surname" value="{{ old('second_surname', $employee->second_surname) }}" class="form-control">
                        </div>
                        </div>

                        <div class=" grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="email">Correo electronico</label>
                            <input name="email" value="{{ old('email', $employee->email) }}" class="form-control">
                        </div>
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="phone">Celular</label>
                            <input name="phone" value="{{ old('phone', $employee->phone) }}" class="form-control">
                        </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="address">Dirección</label>
                            <input name="address" value="{{ old('address', $employee->address) }}" class="form-control">
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="process">Proceso / Área</label>
                            <input name="process" value="{{ old('process', $employee->process) }}" class="form-control">
                        </div>

                        <div class=" grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3 form-group">
                            <label for="profession">Profesión</label>
                            <input name="profession" value="{{ old('profession', $employee->profession) }}" class="form-control">
                        </div>
                        <div class=" col-span-6 sm:col-span-3 form-group">
                            <label for="position">Cargo</label>
                            <input name="position" value="{{ old('position', $employee->position) }}" class="form-control">
                        </div>
                        </div>
                    
                        <span class="help-block">Esta actualización no se refleja en cuenta de usuario</span>
                        <button class="btn btn-primary btn-block">Guardar cambios</button>
                        <a href="{{ route('admin.employees.index') }}" class="button">
							<button type="button"class="col-span-6 sm:col-span-3 form-group btn btn-secondary btn-block" >Cancelar</button>
							</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>