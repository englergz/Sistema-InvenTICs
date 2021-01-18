@php
$user = auth()->user();
@endphp

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-turbolinks="false" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <h1 class="font-weight-bold text-2xl text-white">{{ config('app.name', 'Laravel') }}</h1>
    </form>
    <ul class="navbar-nav navbar-right">

    <!--div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <div class="ml-3 relative">
                <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                  <span class="sr-only">Usuario</span>
                  <img class="h-8 w-8 rounded-full" src="{{ $user->profile_photo_url}}" alt="{{ $user->name}}">
                </button>
            </div>
          </div>
        </div-->

        <li class="dropdown"><a href="#" data-turbolinks="false" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            @if (!is_null($user))
            
                <div class="d-sm-none d-lg-inline-block">
                    Hola, {{ $user->name }}
                </div></a>
            @else
                <div class="d-sm-none d-lg-inline-block">Hola, Bienvenido</div></a>
            @endif
            <div class="dropdown-menu dropdown-menu-right">
                @can('view', new App\Models\User)
                <a href="/user/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Cuenta
                </a>
                
                
                    <a href="/setting" class=" dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Configuración
                    </a>
                @endcan
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
