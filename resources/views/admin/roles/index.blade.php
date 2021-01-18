<x-app-layout>
<x-slot name="header_content">
        <h1>Roles</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Institución</a></div>
            <div class="breadcrumb-item">Roles</div>
		</div>
	</x-slot>	
    
<div class="flex flex-col">
	
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
  
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
	@can('create', $roles->first())
		<a href="{{ route('admin.roles.create') }}" class=" mt-2 btn btn-primary">
			<i class="fa fa-plus"></i>  Crear Role
		</a>
		@endcan
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
	  	
        <table class="mt-2 min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Identificador</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Permisos</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $role)
				@can('view', $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->display_name }}</td>
						<td class="px-6 py-4 whitespace-nowrap">
							@if ($role->id == 1)
								<span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-green-100">
									Todos los permisos
								</span>
							@else
								<span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100">
									{{ $role->permissions->pluck('display_name')->implode(', ') }}
								</span>
								@if(!$role->permissions->pluck('display_name')->implode(', '))
								<span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-red-200">
									Sin permisos
								</span>
								@endif
							@endif
						
                    	</td>
						<td class="whitespace-no-wrap row-action--icon">
							@can('update', $role)
									<a role="button" href="{{ route('admin.roles.edit', $role) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
							@endcan
							@can('delete', $role)
								@if ($role->id > 4)
									<form method="POST"
										action="{{ route('admin.roles.destroy', $role) }}"
										style="display: inline">
										{{ csrf_field() }} {{ method_field('DELETE') }}
										<button class="btn btn-xs btn-transparente"
											onclick="return confirm('¿Estás seguro de querer eliminar esta Role?')"><i class="fa fa-trash text-red-500"></i></button>
									</form>
								@endif
							@endcan
						</td>
                    </tr>
					@endcan
                @endforeach
            </tbody>
		</table>
      </div>
    </div>
  </div>
</div>
</x-app-layout>

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $("#roles-table").DataTable();
        });
    </script>
@endpush


