<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('meta-title', config('app.name') . " ")</title>
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/framework.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('styles')
  
  </head>
  <body>
  <div class="preload"></div>
  <header class="space-inter">
    <div class="container container-flex space-between">
      <figure class="logoHome">
        <img style="width: 50%;" src="{{ ('/img/logo-liceo.png') }}" alt="logo-liceo">
      </figure>
      @include('partials.nav')
    </div>
  </header>

  @yield('content')

  <section class="footer">
  <footer>
    <div class="container">
      <figure class="logo"><img src="/img/logo-liceo.png" alt=""></figure>
      <nav>
        <ul class="container-flex space-center list-unstyled">
          <li><a href="{{ route('pages.home') }}" class="c-gris-2 text-uppercase active"><i class="fas fa-home"></i> Inicio</a></li>
          <li><a href="{{ route('pages.about') }}" class="c-gris-2 text-uppercase"><i class="fas fa-graduation-cap"></i> Acerca de</a></li>
          <li><a href="{{ route('pages.archive') }}" class="c-gris-2 text-uppercase"><i class="fas fa-archive"></i> Archivo</a></li>
          <li><a href="{{ route('pages.contact') }}" class="c-gris-2 text-uppercase"><i class="fas fa-envelope"></i> Contacto</a></li>
        </ul>
      </nav>
      <div class="divider-2"></div>
      <p>Una sociedad que progresa, para un pueblo que lo necesita.</p> <p>
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, ALEN <i class="material-icons">favorite</i> by 
      <span class="c-white">I. E. Liceo Nacional Max Seidel</span></p>
      <div class="divider-2" style="width:80%;"></div>
     
    </div>
</footer>
</section>



  <script>
      (function (window, document) {
      var menu = document.getElementById('menu'),
          WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

      function toggleHorizontal() {
          [].forEach.call(
              document.getElementById('menu').querySelectorAll('.custom-can-transform'),
              function(el){
                  el.classList.toggle('pure-menu-horizontal');
              }
          );
      };

      function toggleMenu() {
          // set timeout so that the panel has a chance to roll up
          // before the menu switches states
          if (menu.classList.contains('open')) {
              setTimeout(toggleHorizontal, 500);
          }
          else {
              toggleHorizontal();
          }
          menu.classList.toggle('open');
          document.getElementById('toggle').classList.toggle('x');
      };

      function closeMenu() {
          if (menu.classList.contains('open')) {
              toggleMenu();
          }
      }

      document.getElementById('toggle').addEventListener('click', function (e) {
          toggleMenu();
          e.preventDefault();
      });

      window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
      })(this, this.document);

</script>

@stack('scripts')

</body>
</html>


