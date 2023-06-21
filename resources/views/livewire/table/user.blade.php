@php
$auth = auth()->user();
@endphp
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nombre
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                <th><a wire:click.prevent="sortBy('employee_id')" role="button" href="#">
                    Funcionario
                    @include('components.sort-icon', ['field' => 'employee_id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Fecha de registro
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>...</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                @can('view', $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
						<div class="flex-shrink-0 h-10 w-10">
							<img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url}}" alt="{{ $user->name}}">
						</div>
						<div class="ml-4">
							<div class="text-sm font-medium text-gray-900">
								{{$user->name}}
							</div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <a href="#">{{$user->getRoleDisplayNames()}}</a>
                                </span>
						
						</div>
						</div>
					</td>
                    <td>{{ $user->email }}</td>

                    <td>{{$user->employee->first_name.' '.$user->employee->second_name.' '.
                        $user->employee->surname .' '.$user->employee->second_surname}}
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-blue-800">
                                <a href="#">{{$user->employee->position}}</a>
                            </span>
                    </td>

                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        @can('view', $user)
                            <a href="{{ route('admin.users.show', $user) }}" role="button" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>
                            @endcan
                        @can('update', $user)
                            <a href="{{ route('admin.users.edit', $user) }}" role="button" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        @endcan
                        @if($auth->getRoleDisplayNames() == 'Administrador' && !($user->id == 1))
                            @can('delete', $user)
                            @if(!$user->posts->count())
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                                @else
                                <a role="button" href="#"><span class="px-2 inline-flex text-xs">_</span></a>
                               
                            @endif
                            @endcan
                        @endif
                    </td>
                </tr>
                @endcan
            @endforeach
        </x-slot>
    </x-data-table>
</div>
