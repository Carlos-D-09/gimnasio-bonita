<!DOCTYPE html>
<!-- Designined by CodingLab - Update by Fantacy Design -->
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Formulario de empleados </title>
    <link rel="stylesheet" href="{{asset('css/EmpleadosCRUD/formEmpleados.css')}}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registro de empleados</div> <!-- Fecha de ingreso e id se asignan en automatico -->
    <div class="content">
      <form action="{{ route('empleadoCRUD.store') }}" method="POST">
      @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre del empleado</span>
            <input type="text" name="nombre" placeholder="Ejemplo: David Fletes" required> <!-- required a un lado del placeholder -->
          </div>
          <div class="input-box">
            <span class="details">RFC del empleado</span>
            <input type="text" name="RFC" placeholder="Incluye sólo caracteres" required>
          </div>
          <div class="input-box">
            <span class="details">Fecha de nacimiento del empleado</span>
            <input type="text" name="fecha_nacimiento" placeholder="Ejemplo: 2010-10-04" required>
          </div>
          <div class="input-box">
            <span class="details">Domicilio del empleado</span>
            <input type="text" name="domicilio" placeholder="Ejemplo: La Paz #203" required>
          </div>
          <div class="input-box">
            <span class="details">Telefono del empleado</span>
            <input type="text" name="telefono" placeholder="Ejemplo: 33454345345" required>
          </div>
          <div class="input-box">
            <span class="details">Correo del empleado</span>
            <input type="text" name="correo" placeholder="Ejemplo: hola@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Sueldo mensual del empleado</span>
            <input type="text" name="sueldo" placeholder="Ejemplo: 10000" required>
          </div>
          <div class="input-box">
            <span class="details">NSS del empleado</span>
            <input type="text" name="NSS" placeholder="Incluye sólo caracteres" required>
          </div>
          <div class="input-box" style="width: 100%;">
            <span class="details" align="center">Contraseña del empleado</span>
            <input type="password" name="password" placeholder="Introduce su contraseña" required>
          </div>
          <div class="input-box" style="width: 100%;">
            <span class="details" align="center">Fecha de registro de empleado detectado por el sistema</span>
            <input type="text" name="fecha_ingreso" value="<?php echo now() ?>" readonly>
          </div>
        </div>
        <div class="cargo-details">
          <input type="radio" name="id_tipoUsuario" id="dot-1" value=1>
          <input type="radio" name="id_tipoUsuario" id="dot-2" value=2>
          <input type="radio" name="id_tipoUsuario" id="dot-3" value=3>
          <span class="cargo-title">Rol</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="cargo">Gerente</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="cargo">Encargado de sucursal</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="cargo">Maestro</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Registrar">
        </div>
        <div class="buttonCancel">
          <a href="/empleado">Cancelar registro de empleado</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>