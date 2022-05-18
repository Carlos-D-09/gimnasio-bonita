1.- Clonar el repositorio

2.- Abrir cmd o la terminal de laragon y moverse a una carpeta en donde desea descargar el proyecto, si tienes laragon es vital que lo hagas en un directorio de este tipo: "C:\laragon\www"

3.- Estando en el CMD o terminal de laragon, usar el comando: composer install

4.- Estando en el CMD o terminal de laragon, usar el comando: npm install

5.- Estando en el CMD o terminal de laragon, usar el comando: npm run dev

6.- Estando en el CMD o terminal de laragon, crear archivo de variables de entorno: cp .env.example .env

6.1 (opcional, base de datos).- Ir al directorio del proyecto clonado y después buscar .env, ahi si quieres puedes puedes modificar el usuario y la contraseña en donde ira la base de datos

7.- Ejecutar en el CMD o terminal e laragon: mysql -u root. O ejecutar en dado caso de que hayas asignado un usuario de la base de datos en el .env: mysql -u "YourUser".

8.- Estando en MySQL, crear la base de datos "gimnasioBonita" y despues de eso sales de MySQL escribiendo "exit" o "quit". 

9.- Crear llave: php artisan key:generate

10.- Ejecutar "php artisan migrate" 
//si no corre bien las migraciones, puede ser por la pequeñisima posibilidad de que los campos unique sean afectados por los factories.
//ejecutar "php artisan migrate:fresh" si genera error.
//ya las migraciones con "php artisan migrate" o "php artisan migrate:fresh" están configuradas para que también migre los seeders y factories.

11.- Si tienes laragon, ir al icono con una letra subrayada que es: h. Y verificar si esta la ruta del proyecto (por lo general si clonas el repositorio la ruta deberia ser: gimnasio-bonita.test con la ip 127.0.0.1).
Si no esta la ruta asignada, pon el nombre de la carpeta del proyecto clonado, ubicada en "C:\laragon\www". De tal forma que quede representado asi:        127.0.0.1      gimnasio-bonita.test

12.- Si no utilizas laragon, ejecuta: php artisan serve

12.1.- Si no utilizas laragon, ve hacia la dirección: localhost:8000



