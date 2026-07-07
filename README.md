<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-[...]"></a></p>

## Sistema de Inventario TIC para la Cámara de Comercio en el municipio de Tumaco
Elaborado en Laravel en la versión 8.x + TailwindCSS + Jetstream + Livewire + Stisla

## Descripción

Software para el manejo administrativo de equipos y/o dispositivos, asignación de responsables, calidad de préstamo, generar cuentas, registrar productos (estilo blog), manejo de roles (Admin, Supervisor...), permisos (para publicar, generar cuenta, crear roles...)

## Advertencia importante (credenciales de demo)

Las credenciales que aparecen a continuación son cuentas de demostración para facilitar pruebas en entornos locales y de desarrollo. NO uses estas credenciales en entornos de producción.

- Usuario administrador (demo): jose@gmail.com
- Contraseña (demo): 12341234

Por favor, después del primer inicio de sesión en cualquier despliegue real, cambia inmediatamente la contraseña del administrador. Recomendamos ejecutar:

- Crear usuario admin seguro: php artisan tinker  (o usar un seeder `AdminSeeder`)
- Cambiar contraseña vía interfaz de la aplicación o con comando/consulta SQL.

## Instalación

1. git clone https://github.com/englergz/Sistema-InvenTICs.git
2. composer install
3. copiar .env.example a .env y configurar las variables
4. php artisan key:generate
5. Configurar el archivo .env:
   - DB_PORT=
   - DB_DATABASE=
   - DB_USERNAME=
   - DB_PASSWORD=
6. php artisan migrate:fresh --seed
7. npm install
8. npm run dev
9. php artisan serve

## Poner en marcha

1. Iniciar sesión con el usuario demo (si lo deseas) y cambiar la contraseña.

## Buenas prácticas

- No subas archivos .env con credenciales reales.
- Usa .env.example para documentar qué variables son necesarias.
- Activa secret scanning y Dependabot en el repositorio para detectar secretos y dependencias vulnerables.

## Licencia

Este repositorio incluye un archivo LICENSE con derechos reservados. Contacta al propietario para permisos de uso o distribución.
