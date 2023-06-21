@php
$auth = auth()->user();
@endphp
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-data-table :data="$data" :model="$categories">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nombre
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('url')" role="button" href="#">
                    Identificador / URL
                    @include('components.sort-icon', ['field' => 'url'])
                </a></th>
                <th><a>
                    Uso / Cantidad Dispositivo
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($categories as $category)
                <tr x-data="window.__controller.dataTableController({{ $category->id }})">
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$category->name}}
							</div>
						</div>
						</div>
					</td>
                    <td>
                        <a class= " px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" 
							href="{{ route('categories.show', $category->url) }}" target="_blank">{{ $category->url }}</a>                    
                    </td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <span class="px-2 inline-flex text-xs">{{$category->posts->COUNT() }} dispositivo(s)</span>
                    </td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('categories.show', $category->url) }}" class="mr-3" target="_blank"><i class="fa fa-16px fa-eye"></i></a>
                        <a role="button" href="{{ route('admin.categories.edit', $category) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        @if($auth->getRoleDisplayNames() == 'Administrador')
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                           @if( $category->posts->isEmpty() )
                                <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            @else
                                <span class="px-2 inline-flex text-xs">Esta categaría está en uso,<br>si deseas eliminarla primero<br> debes dejar de usarla</span>
                            @endif
                        @endif
                    </td>

                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
