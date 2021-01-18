<div>
    <x-data-table :data="$data" :model="$roles">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Identificador
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('display_name')" role="button" href="#">
                    Nombre
                    @include('components.sort-icon', ['field' => 'display_name'])
                </a></th>
                <th> Permisos</th>
                <th>...</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($roles as $role)
                <tr x-data="window.__controller.dataTableController({{ $role->id }})">
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$role->name}}
							</div>
						</div>
						</div>
					</td>
                    <td>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{$role->display_name }}
                        </span>
                    </td>
                    <td>
                        @if(!is_null($role->permissions))
                            <span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100">
                               {{ $role->permissions->pluck('display_name')->implode(', ') }}
                            </span>
                        @else
                            @if ($role->id === 1)
                                Todos los permisos
                            @else
                                Sin permisos
                            @endif
                        @endif
                    </td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @can('update', $role)
                                <a role="button" href="{{ route('admin.roles.edit', $role) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        @endcan
                        @can('delete', $role)
                            @if ($role->id > 4 )
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
