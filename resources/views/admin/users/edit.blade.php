<x-app-layout>
    <x-slot name="header_content">
        <h1>Actualizar Usuario</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Usuarios</a></div>
            <div class="breadcrumb-item">Actualizar</div>
		</div>
    </x-slot>
 
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Datos personales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Estos son todos los datos que puedes modificar, actualiza el usuario como creas más conveniente.
                    </p>
                </div>
            </div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">
                    @include('partials.error-messages')
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            <span class="help-block">Dejar en blanco si no quieres cambiar la contraseña</span>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Repetir contraseña:</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                        </div>

                        <button class="btn btn-primary btn-block">Actualizar usuario</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Roles</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Actualiza el rol como creas más conveniente.
                    </p>
                </div>
            </div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">
                    @role('Admin')
                    <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        @include('admin.roles.checkboxes')

                        <button class="btn btn-primary btn-block">Actualizar roles</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @forelse ($user->roles as $role)
                                <li class="list-group-item">{{ $role->display_name }}</li>
                            @empty
                                <li class="list-group-item">No tiene roles</li>
                            @endforelse
                        </ul>
                    @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Permisos adicionales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Actualiza los permisos como creas más conveniente.
                    </p>
                </div>
            </div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">
                    @role('Admin')
                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        @include('admin.permissions.checkboxes', ['model' => $user])

                        <button class="btn btn-primary btn-block">Actualizar permisos</button>
                    </form>
                    @else
                        <ul class="list-group">
                            @forelse ($user->permissions as $permission)
                                <li class="list-group-item">{{ $permission->display_name }}</li>
                            @empty
                                <li class="list-group-item">No tiene permisos</li>
                            @endforelse
                        </ul>
                    @endrole
                    </div>
                </div>
            </div>
        </div>
   
        <div class="md:grid md:grid-cols-3 md:gap-6">
        </div> 
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                    <div class="col-md-12">
                        <a href="{{ route('admin.users.index') }}" class="button">
							<button type="button"class="col-span-6 sm:col-span-3 form-group btn btn-secondary btn-block" >Cancelar</button>
						</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</x-app-layout>
