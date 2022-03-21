1.- Clonar el repositorio

2.- Moverse al directorio del proyecto

3.- Usar el comando: composer install

4.- Usar el comando npm install

5.- Usar el comando npm run dev

6.- Ejecutar php artisan migrate especificamente de estas tablas:
(ejemplo: php artisan migrate --path=/database/migrations/2014_10_12_000000_create_users_table.php)
2014_10_12_000000_create_users_table.php
2014_10_12_100000_create_password_resets_table.php
2022_03_20_231357_tipo_usuario.php
2022_03_20_231724_membresia.php
2022_03_20_232251_create_clases_table.php

7.- Ejecutar "php artisan migrate"

8.- Crear archivo de variables de entorno: cp .env.example .env

10.- Creamos una base de datos con el nombre gimnasio_bonita

11.- Crear llave: php artisan key:generate

12.- Comando: php artisan db:seed --class=empleados
php artisan db:seed --class=UserTableSeeder
