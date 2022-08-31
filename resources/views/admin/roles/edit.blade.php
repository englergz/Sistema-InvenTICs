<x-app-layout>
<x-slot name="header_content">
        <h1>Actualizar rol</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Configuración</a></div>
            <div class="breadcrumb-item">Actualizar rol</div>
		</div>
	</x-slot>

<div>
	<div class="md:grid md:grid-cols-3 md:gap-6">
		<div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Modificación</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Estos son todos los datos que puedes modificar, actualiza el rol como creas más conveniente.
                </p>
            </div>
		</div>
        <div class="mb-4 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="col-md-12">
                        @include('partials.error-messages')
                        <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                            {{ method_field('PUT') }}

                            @include('admin.roles.form')
                            <button class="btn btn-primary btn-block">Actualizar rol</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>