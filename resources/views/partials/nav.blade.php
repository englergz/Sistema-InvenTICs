<nav class="custom-wrapper" id="menu">
    
    <div class="pure-menu">
        <a href="#" class="custom-toggle btn-bar" id="toggle"></a>
    </div>
    <ul class="container-flex list-unstyled">
        <li class="pure-menu-item">
            <a href="{{ route('pages.home') }}"
                class="pure-menu-link c-gris-2 text-uppercase"><i class="fas fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="pure-menu-item">
        @if (auth()->check())
           
           <a href="{{ route('dashboard') }}" class="pure-menu-link c-gris-2 text-uppercase">
           @if(auth()->user()->getRoleDisplayNames()=='Administrador')
               <i class="fas fa-users-cog"></i> Administrar Tablero
           @else
               <i class="fas fa-user"></i> Mi Tablero
           @endif 
           </a> 
          
       @endif
        </li>
        <li class="pure-menu-item">
                @if (auth()->check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a  href="{{ route('logout') }}" class="pure-menu-link c-gris-2 text-uppercase"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();" ><i class="fas fa-sign-out-alt"></i>
                            {{ __('Cerrar Sesión') }}
                        </a>
                    </form>  
                @else
                    <a href="{{ route('login') }}" class="pure-menu-link c-gris-2 text-uppercase"><i class="fas fa-sign-in-alt"></i>
                        Iniciar Sesión
                    </a>
                @endif
        </li>
        <li class="pure-menu-item">
        @if (auth()->check())
            
            
            
        @endif
        </li>
    </ul>
</nav>
