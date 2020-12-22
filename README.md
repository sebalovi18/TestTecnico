 * ### Requisitos:
       * Composer 2
       * NodeJs 12
       * PHP 7.2
### Instalación
Dentro de la carpeta raiz del proyecto ejecutar :
###### composer install && npm install
Crear archivo .env
###### cp .env.example .env
###### php artisan key:generate

Crear una base de datos en mysql

Configurar las siguientes variables del archivo .env correspondiendo a nuestra DB
###### DB_CONNECTION=mysql
###### DB_HOST=127.0.0.1
###### DB_PORT=3306
###### DB_DATABASE=laravel
###### DB_USERNAME=root
###### DB_PASSWORD=

###### php artisan migrate

###### npm run dev

