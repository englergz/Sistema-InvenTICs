@php
$auth = auth()->user();
@endphp
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-data-table :data="$data" :model="$employees">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('surname')" role="button" href="#">
                    Nombre
                    @include('components.sort-icon', ['field' => 'surname'])
                </a></th>
                <th><a wire:click.prevent="sortBy('num_id')" role="button" href="#">
                    Identificación
                    @include('components.sort-icon', ['field' => 'num_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('position')" role="button" href="#">
                    Cargo
                    @include('components.sort-icon', ['field' => 'position'])
                </a></th>
                <th><a wire:click.prevent="" role="button" href="#">
                    Contacto
                </a></th>
                <th>...</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($employees as $employee)
                @can('view', $employee)
                <tr x-data="window.__controller.dataTableController({{ $employee->id }})">
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$employee->first_name.' '.$employee->second_name}}
							</div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <p>{{$employee->surname .' '.$employee->second_surname}}</p>
                                </span>
						
						</div>
						</div>
					</td>
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						
						<div class="ml-4">
                            <div class="text-sm font-medium ">
                                {{$employee->getDocument_id->codigo}}
							</div>
                            <div class="text-sm font-medium text-gray-900">
                                {{$employee->getDocument_id->descripcion}}
							</div>
                            
							<div class="text-sm font-medium text-gray-900">
								 {{ $employee->num_id}}
							</div>
						</div>
						</div>
					</td>
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
                                {{$employee->position}}
							</div>
                            <div class="text-sm font-medium text-gray-900">
                                {{$employee->profession}}
							</div>
                            <div class="text-sm font-medium text-gray-900">
                                {{$employee->process}}
							</div>
						</div>
						</div>
					</td>
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$employee->phone}}
							</div>
                            <div class="text-sm font-medium text-gray-900">
                                {{$employee->email}}
							</div>
                            <div class="text-sm font-medium text-gray-900">
                                {{$employee->address}}
							</div>
						</div>
						</div>
					</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @can('view', $employee)
                            <a href="{{ route('admin.employees.show', $employee) }}" role="button" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>
                            @endcan
                        @can('update', $employee)
                            <a href="{{ route('admin.employees.edit', $employee) }}" role="button" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        @endcan
                        @if($auth->getRoleDisplayNames() == 'Administrador')
                            @can('delete', $employee)
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                <!--a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a-->
                            @endcan
                        @endif
                    </td>
                </tr>
                @endcan
            @endforeach
        </x-slot>
    </x-data-table>
</div>
