<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase</title>
</head>
<body>

    <h1>Informacion de clase: </h1>
    <a href="/empleado">Ir a inicio</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
            <tr>
                <td>{{ $clase->id }}</td>
                <td>{{ $clase->nombre }}</td>
                <td>{{ $clase->descripcion }}</td>
            </tr>
    </table>
</body>
</html>
