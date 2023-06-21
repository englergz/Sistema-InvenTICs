@php
$auth = auth()->user();
@endphp
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-data-table :data="$data" :model="$trademarks">
        <x-slot name="head">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <a wire:click.prevent="sortBy('brand')" role="button" href="#">
                    Marca comercial
                    @include('components.sort-icon', ['field' => 'brand'])
                </a></th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <a wire:click.prevent="sortBy('website')" role="button" href="#">
                    Sitio / Pagina web
                    @include('components.sort-icon', ['field' => 'website'])
                </a></th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <a wire:click.prevent="sortBy('category_id')" role="button" href="#">
                    Soporte Técnico
                    @include('components.sort-icon', ['field' => 'category->name'])
                </a></th>
                <th>...</th>
            </tr>
        </x-slot>
        <x-slot name="body">
        @foreach ($trademarks as $trademark)
        <tr x-data="window.__controller.dataTableController({{ $trademark->id }})">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                        {{$trademark->brand}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$trademark->nit}}
                    </div>
                </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $trademark->website }}</div>
                
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="">
                    <a class= " px-2 inline-flex  text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" >
                    {{ $trademark->support }}</a>
                </span>
            </td>
            <td class="whitespace-no-wrap row-action--icon">       
                    <a role="button" href="{{ route('admin.trademarks.edit', $trademark) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    @if($auth->getRoleDisplayNames() == 'Administrador')
                    @if( $trademark->posts->isEmpty() )
                                <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            @else
                                <span class="px-2 inline-flex text-xs">Marca en uso, si deseas eliminarla primero debes dejar de usarla</span>
                            @endif
                    
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    @endif
            </td>
        </tr>
        @endforeach
    </x-slot>
</x-data-table>
</div>
