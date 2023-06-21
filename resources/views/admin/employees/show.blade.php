@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <x-slot name="header_content">
        <h1>Empleado</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Empleados</a></div>
            <div class="breadcrumb-item">Perfil</div>
		</div>
    </x-slot>
 
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Datos personales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Resumen del empleado, si eres Administrador, en cualquier momento puedes cambiar la información
                    </p>
                </div>
            </div>
            <div class="mb-4 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                        <div class="col-md-12">
                        <div class="hidden  md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <div class="ml-3 items-center">
                                    <button class=" items-center max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                    <span class="sr-only">Empleado</span>
                                   
                                    </button>
                                </div>
                            </div>
                        </div>
                        <h1 class=" text-center">{{$employee->surname .' '.$employee->second_surname.' '.$employee->first_name.' '.$employee->second_name}}</h1>
                        <p class="text-muted text-center">{{ $employee->profession }}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                            <b>Cuenta de usuarios</b> 
                                @forelse ($employee->user as $user)
                                    <a class="pull-right" href="{{ route('admin.users.show', $user) }}" target="_blank">
                                        <strong> {{ '   '.$user->name }} | {{ $user->getRoleNames()->implode(', ') }}</strong>
                                    </a>
                                    <small class="pull-right text-muted"> Creada el {{ $user->created_at->format('d/m/Y H:i A').'  ' }}</small>
                                    <br>
                                    @unless ($loop->last)
                                        <hr>
                                    @endunless
                                @empty
                                    <small class="text-muted">No tiene cuenta de usuario</small>
                                    <a class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100 text-xs text-gray-500" 
                                        href="{{ route('admin.users.create') }}">¿Crear cuenta?</a></span>
                                @endforelse
                            </li>
                            <li class="list-group-item">
                            <b>Cargo</b> <a class="pull-right">{{ $employee->position }}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Proceso / Área</b> <a class="pull-right">{{ $employee->process }}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Productos</b> <a class="pull-right">{{ $employee->posts->count() }}</a>
                            </li>
                        </ul>
                        <a href="{{ route('admin.employees.edit', $employee) }}" class="mt-5 btn btn-primary btn-block"><b>Editar</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <dirv class="md:grid md:grid-cols-3 md:gap-6">
        
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Productos prestados</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Estas son todas los productos a responsabilidad de este empleado.
                    </p>
                </div>
            </div>
            <div class="productos mb-4 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                        <div class="col-md-12 ">
                        @forelse ($employee->posts as $post)
                      
                        <div class="mt-4">
                            <a class="" href="{{ route('posts.show', $post) }}" target="_blank">
                                <strong>{{ $post->title }}</strong>
                                {{$post->getTrademark->brand.' S/N# '.$post->serial}}
                            </a>
                            
                            <p href="#" data-toggle="modal" data-target="#myModalConfirmar" id="{{ $post }}" class="btn btn-primary pull-right leading-5 font-semibold">
                            <strong>¿Devolución de producto?</strong></p>
                            
                            <br>
                            @if($post->employee_debtor_since)
                                @if($post->employee_debtor_since > Carbon::now() )
                                <small class="text-muted">¡Se prestará en</small>
                                    <span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100">
                                    {{ $post->employee_debtor_since->diffforHumans() }}!</span>
                                @else
                                    <small class="text-muted">Prestado el {{ $post->employee_debtor_since->format('d/m/Y H:i A') }}</small>
                                    <!--p class="text-muted">{{ $post->body }}-->
                                @endif
                            @else
                                <small class="text-muted">Disponible,</small>
                                <span class=" ">
                                <a class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100 text-xs text-gray-500" 
                                href="{{ route('admin.posts.edit', $post) }}">¿Prestar ahora?</a></span>
                                @endif
                                    <!-- Wrapper for slides -->
                                    <div class="row-span-6 grid grid-cols-3 gap-2">
                                    @include( $post->viewType() )	
                                    </div>
                                @unless ($loop->last)
                                <hr>
                            @endunless
                            </div>
                       
                        @empty
                            <small class="text-muted">No tiene ningún producto a su responsabilidad</small>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>         
    
</x-app-layout>