<x-app-layout>
<x-slot name="header_content">
        <h1>Registro de contratista</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Usuarios</a></div>
            <div class="breadcrumb-item">Contratista</div>
		</div>
	</x-slot>
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Datos personales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Registra un nuevo contratista, puedes cambiar estos datos luego en caso de ser necesario,
                        recuerda que, debes tener permiso para realizar dicha función.
                    </p>
                </div>
            </div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.employees.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="type_id">Tipo de documento</label>
                            <input name="type_id" value="{{ old('type_id') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="num_id">Número de identificación</label>
                            <input name="num_id" value="{{ old('num_id') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date_birth">Fecha de nacimiento</label>
                            <input name="date_birth" value="{{ old('date_birth') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="first_name">Primer nombre</label>
                            <input name="first_name" value="{{ old('first_name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="second_name">Segundo nombre</label>
                            <input name="second_name" value="{{ old('second_name') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="surname">Primer apellido</label>
                            <input name="surname" value="{{ old('surname') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="second_surname">Segundo apellido</label>
                            <input name="second_surname" value="{{ old('second_surname') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="profession">Profesión</label>
                            <input name="profession" value="{{ old('profession') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="process">Proceso</label>
                            <input name="process" value="{{ old('process') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="position">Cargo</label>
                            <input name="position" value="{{ old('position') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input name="email" value="{{ old('email') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Celular</label>
                            <input name="phone" value="{{ old('phone') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input name="address" value="{{ old('address') }}" class="form-control">
                        </div>

                        <span class="help-block">Este registro no incluye cuenta de usuario</span>
                        <button class="btn btn-primary btn-block">Registrar empleado</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>