<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

Proyecto en desarrollo, de momento para el curso academico 
## Seminario de Computación e Informatica II, de la Universidad de Nariño.
    Elaborado en Laravel en la versión 8.x + TailwindCSS + Jetstream + Livewire + Stisla

## Descripción

Software para el manejo administrativo de equipos y/o dispositivos, asignación de responsables, calidad de préstamo, generar cuentas, registrar productos(estilo blog), manejo de roles (Admin, Supervisor...), permisos (para publicar, generar cuenta, crear roles...)

## Grupo de Trabajo
    Egresado de Ingeniería de Sistemas.

## Instalación

    1. git clone 
    2. composer install
    3. copy .env.example .env
    4. php artisan key:generate
    5. Configurar el archivo .env
        1. DB_PORT=
        2. DB_DATABASE=
        3. DB_USERNAME=
        4. DB_PASSWORD=
    6. php artisan migrate:fresh --seed
    7. npm install
    8. npm run dev
    9. php artisan serve

## Poner en marcha

    1. Iniciar sesión: 
    2. Admin: jose@gmail.com, Contraseña: 12341234
    3. Agsinar permisos a los roles o directamente a un usuario.
    Contraseña por defecto para todos los usuarios es la misma "12341234"


## Licencia

   El marco de Laravel es un software de código abierto con licencia bajo el [Licencia MIT](https://opensource.org/licenses/MIT).
