# ElectroPOS

**ElectroPOS** es un sistema de punto de venta (POS) desarrollado en **Laravel**. Este proyecto está diseñado para gestionar inventarios, procesar ventas y generar informes detallados, ideal para tiendas minoristas.

## Características

- **Gestión de inventarios**: Controla el stock de productos en tiempo real.
- **Procesamiento de ventas**: Soporta múltiples métodos de pago.
- **Informes detallados**: Obtén reportes de ventas diarias, semanales y mensuales.

## Tecnologías Utilizadas

- **Framework**: Laravel 10.x
- **Base de Datos**: MySQL
- **Frontend**: Blade, Bootstrap

## Instalación

1. Clona el repositorio:
   `git clone https://github.com/DavidTorres91/ElectroPOS.git`
2. Navega a la carpeta del proyecto:
   `cd ElectroPOS`
3. Instala las dependencias:
   `composer install`
4. Configura el archivo `.env`:
   `cp .env.example .env`  
   `php artisan key:generate`  
   Edita `.env` con la configuración de tu base de datos.
5. Ejecuta las migraciones:
   `php artisan migrate`
6. Inicia el servidor de desarrollo:
   `php artisan serve`

## Despliegue

ElectroPOS puede ser desplegado en servicios como **Heroku**, **AWS**, o **DigitalOcean**.

## Contribución

Las contribuciones son bienvenidas. Abre un *issue* o *pull request* para sugerir mejoras o reportar errores.

## Licencia

Este proyecto está bajo la **Licencia MIT**.
