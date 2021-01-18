<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
            <figure class="logoHome">
                <img class="m-3" style="width: 45%; text-align: center;" src="{{ ('/img/logo-liceo.png') }}" alt="Logo-Liceo">
            </figure>{{ auth()->user()->getRoleDisplayNames() }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
       
        <ul class="sidebar-menu">
            <li class="menu-header">Tablero</li>

                <li class="{{ Request::routeIs( 'dashboard' ) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fa fa-chart-bar"></i> <span>Mi Tablero</span>
                   </a>
                </li>

            @can('create', new App\Models\Post)
            <li class="menu-header">Blog</li>

                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fa fa-bars"></i><span>Publicaciones</span></a>
                    <ul class="dropdown-menu">
                        
                            <li class="{{ Request::routeIs('admin.posts.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.posts.index') }}">
                            <i class="fas fa-eye"></i>Vizualizar</a></li>
                        @if (request()->is('posts/*'))
                            <li class="{{ Request::routeIs('admin.posts.store', '#create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.posts.store', '#create') }}">
                            <i class="fas fa-pencil"></i>Nueva publicación</a></li>
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Nueva publicación</a>
                        @endif

                    </ul>
                </li>
            @endcan   

            <li class="menu-header">Institución</li>
            @can('view', new App\Models\User)
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i><span>Usuarios</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="dropdown-menu">

                            <li class="{{ Request::routeIs('users') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.users.index') }}">
                            <i class="fas fa-eye"></i>Vizualizar</a></li>
                        @can('create', new App\Models\User)
                            <li class="{{ Request::routeIs('admin.users.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.users.create') }}">
                            <i class="fas fa-user"></i>Generar cuenta</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="{{ Request::routeIs( ['admin.users.show', 'admin.users.edit'] ) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.users.show', auth()->user()) }}">
                        <i class="fa fa-user"></i> <span>Perfil</span>
                   </a>
            </li>
            
            @can('view', new \Spatie\Permission\Models\Role)
            <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
                <a href="{{ route('admin.roles.index') }}">
                <i class="fa fa-pencil"></i> <span>Roles</span>
                </a>
            </li>
            @endcan
            @can('view', new \Spatie\Permission\Models\Permission)
            <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
                <a href="{{ route('admin.permissions.index') }}">
                <i class="fa fa-pencil"></i> <span>Permisos</span>
                </a>
            </li>
            @endcan
        </ul>
    </aside>
</div>