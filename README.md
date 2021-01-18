<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

Proyecto en desarrollo, de momento para el curso academico 
## Seminario de Computación e Informatica II, de la Universidad de Nariño.
Elaborado en Laravel en la versión 8.x + TailwindCSS + Jetstream + Livewire + Stisla

## Descripción

Software para el manejo administrativo de difusión de noticias academicas, generar cuentas, realizar publicaciones(estilo blog), manejo de roles (Admin, Estudiante, Docente...), permisos (para publicar, generar cuenta, crear roles...)

## Instalación

1. git clone https://github.com/englergonzalez/ProyectoALEN.git
2. composer install
3. copy .env.example .env
4. php artisan key:generate
5. Configurar el archivo .env
5.1. DB_PORT=
5.2. DB_DATABASE=
5.3. DB_USERNAME=
5.4. DB_PASSWORD=
6. php artisan migrate
7. npm install
8. npm run dev
9. php artisan serve

## Poner en marcha

1. Iniciar sesión: 
2. Admin: englergonzalez@hotmail.com, Contraseña: 12341234
3. Agsinar permisos a los roles o directamente a un usuario.
Contraseña por defecto para todos los usuarios es la misma "12341234"


## Licencia

El marco de Laravel es un software de código abierto con licencia bajo el [MIT license](https://opensource.org/licenses/MIT).
