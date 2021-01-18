@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <x-slot name="header_content">
        <h1>Cuenta</h1>
        <div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Tablero</a></div>
			<div class="breadcrumb-item active"><a href="#">Usuarios</a></div>
            <div class="breadcrumb-item">Cuenta</div>
		</div>
    </x-slot>
 
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Datos personales</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Resumen de la cuenta, si eres Administrador, en cualquier momento puedes cambiar la información
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
                                    <span class="sr-only">Usuario</span>
                                    <img class="items-center h-18 w-18 rounded-full" src="{{ $user->profile_photo_url}}" alt="{{ $user->name}}">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <h1 class="profile-username text-center">{{ $user->name }}</h1>
                        <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                            <b>Correo electronico</b> <a class="pull-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Publicaciones</b> <a class="pull-right">{{ $user->posts->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Roles</b> 
                                @forelse ($user->roles as $role)
                                    <!--{{ $user->getRoleNames()->implode(', ') }}-->
                                    <strong class="pull-right">{{ $role->name }}</strong><br>
                                    @if ( $role->permissions->count() )
                                        <small class="text-muted pull-right">
                                            Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}
                                        </small>
                                    @else
                                        @if($role->name === 'Admin')
                                            <small class="text-muted pull-right">Todos los permisos</small> <br>
                                        @else
                                            <small class="text-muted pull-right">Sin permisos</small><br>
                                        @endif
                                    @endif
                                @unless ($loop->last)
                                    <hr>
                                @endunless
                                @empty
                                    <small class="text-muted pull-right">No tiene ningún role asignado</small>
                                @endforelse
                            </li>
                            <li class="list-group-item">
                                <b>Permisos adicionales</b>
                                @forelse ($user->permissions as $permission)
                                    <a class="text-muted pull-right">{{ $permission->name }}</a>
                                    @unless ($loop->last)
                                        <hr>
                                    @endunless
                                @empty
                                    <a class="text-muted pull-right"> No tiene permisos adicionales</a>
                                @endforelse
                            </li>
                        </ul>
                        <a href="{{ route('admin.users.edit', $user) }}" class="mt-5 btn btn-primary btn-block"><b>Editar</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Publicaciones</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Estas son todas las publicaciones de este usuario.
                    </p>
                </div>
            </div>
            <div class="mb-4 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">   
                        <div class="col-md-12 ">
                        @forelse ($user->posts as $post)
                        <div class="mt-4">
                            <a class="" href="{{ route('posts.show', $post) }}" target="_blank">
                                <strong>{{ $post->title }}</strong>
                            </a>
                            <br>
                            @if($post->published_at)
                                @if($post->published_at > Carbon::now() )
                                <small class="text-muted">¡Se publicará</small>
                                    <span class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100">
                                    {{ $post->published_at->diffforHumans() }}!</span>
                                @else
                                    <small class="text-muted">Publicado el {{ $post->published_at->format('d/m/Y H:i A') }}</small>
                                    <!--p class="text-muted">{{ $post->body }}-->
                                @endif
                            @else
                                <small class="text-muted">Oculta,</small>
                                <span class=" ">
                                <a class=" px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-blue-100 text-xs text-gray-500" 
                                href="{{ route('admin.posts.edit', $post) }}">¿Publicar ahora?</a></span>
                            @endif

                            
                            @unless ($loop->last)
                                <hr>
                            @endunless
                            </div>
                        @empty
                            <small class="text-muted">No tiene ninguna publicación</small>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                 
</x-app-layout>