<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
            <figure class="logoHome">
                <img class="" style="text-align: center;" src="{{ ('/img/cabezotemovil.png') }}" alt="Logo">
            </figure>{{ auth()->user()->getRoleDisplayNames() }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" style="text-align: center;" src="{{ ('/img/logo.jpg') }}" alt="Logo">
            </a>
        </div>
       
        <ul class="sidebar-menu">
            <li class="menu-header">Tablero</li>

                <li class="{{ Request::routeIs( 'dashboard' ) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-chart-bar"></i> <span>Dashboard</span>
                   </a>
                </li>


            <li class="menu-header">Inventario</li>
            @can('view', new App\Models\Post)
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-desktop"></i><span>Dispositivos</span></a>
                    <ul class="dropdown-menu">
                            <li class="{{ Request::routeIs('admin.posts.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.posts.index') }}">
                            <i class="fas fa-eye"></i>Ver registro</a></li>
                        @can('create', new App\Models\Post)
                        @if (request()->is('posts/*'))
                            <li class="{{ Request::routeIs('admin.posts.store', '#create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.posts.store', '#create') }}">
                            <i class="fa fa-pencil"></i>Registrar nuevo</a></li>
                        @else
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-pencil"></i>
                                    Registrar nuevo
                                </a>
                            </li>
                        @endif
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view', new App\Models\Post)
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-receipt"></i><span>Préstamos</span></a>
                    <ul class="dropdown-menu">
                            <li class="{{ Request::routeIs('admin.posts.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.posts.index') }}">
                            <i class="fas fa-eye"></i>Ver registro</a></li>
                        @can('create', new App\Models\Post)
                        @if (request()->is('posts/*'))
                            <li class="{{ Request::routeIs('admin.posts.store', '#create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.posts.store', '#create') }}">
                            <i class="fa fa-pencil"></i>Registrar nuevo</a></li>
                        @else
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-pencil"></i>
                                    Registrar nuevo
                                </a>
                            </li>
                        @endif
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view', new App\Models\User)
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i><span>Usuarios</span></a>
                    <ul class="dropdown-menu">
                            <li class="{{ Request::routeIs('employees') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.employees.index') }}">
                            <i class="fas fa-users"></i>Funcionarios</a></li>
                            <li class="{{ Request::routeIs('users') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.users.index') }}">
                            <i class="fas fa-eye"></i>Cuentas</a></li>
                        @can('create', new App\Models\User)
                            <li class="{{ Request::routeIs('admin.employees.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.employees.create') }}">
                            <i class="fas fa-pen"></i>Registrar</a></li>
                            <li class="{{ Request::routeIs('admin.users.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.users.create') }}">
                            <i class="fas fa-user"></i>Generar cuenta</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="menu-header">Configuración</li>
            @can('view', new \Spatie\Permission\Models\Role)
            <li class="">
                <a href="{{ route('admin.roles.index') }}">
                <i class="fas fa-file-excel"></i><span>Reportes</span>
                </a>
            </li>
            @endcan
            @can('view', new \Spatie\Permission\Models\Role)
            <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
                <a href="{{ route('admin.roles.index') }}">
                <i class="fas fa-user-tag"></i> <span>Roles</span>
                </a>
            </li>
            @endcan
            @can('view', new \Spatie\Permission\Models\Permission)
            <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
                <a href="{{ route('admin.permissions.index') }}">
                <i class="fas fa-user-shield"></i><span>Permisos</span>
                </a>
            </li>
            @endcan
            @can('view', new \Spatie\Permission\Models\Permission)
            <li class="">
                <a href="{{ route('admin.permissions.index') }}">
                <i class="fas fa-indent"></i><span>Marcas y categorías</span>
                </a>
            </li>
            @endcan
            @can('view', new \Spatie\Permission\Models\Permission)
            <li class="">
                <a href="{{ route('admin.permissions.index') }}">
                <i class="fas fa-tag"></i><span>Etiquetas</span>
                </a>
            </li>
            @endcan


            <li class="menu-header">Cuenta</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-sign-out-alt"></i><span>Cerrar sesión</span>
                </a>
                    <ul class="dropdown-menu">
                        <li class="">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i><span>Salir</span>
                            </a></li>
                        </form>
                    </ul>
             </li>
        </ul>
    </aside>
</div>