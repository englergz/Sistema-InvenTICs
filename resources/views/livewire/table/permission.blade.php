<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-data-table :data="$data" :model="$permissions">
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
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($permissions as $permission)
                <tr x-data="window.__controller.dataTableController({{ $permission->id }})">
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$permission->name}}
							</div>
						</div>
						</div>
					</td>
                    <td>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{$permission->display_name }}
                        </span>
                    </td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.permissions.edit', $permission) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
