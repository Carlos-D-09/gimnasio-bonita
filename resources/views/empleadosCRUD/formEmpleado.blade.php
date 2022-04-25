<!DOCTYPE html>
<!-- Designined by CodingLab - Update by Fantacy Design -->
<html lang="en" dir="ltr">
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
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre del empleado</span>
            <input type="text" placeholder="Ejemplo: David Fletes" required>
          </div>
          <div class="input-box">
            <span class="details">RFC del empleado</span>
            <input type="text" placeholder="Incluye sólo caracteres" required>
          </div>
          <div class="input-box">
            <span class="details">Fecha de nacimiento del empleado</span>
            <input type="text" placeholder="Ejemplo: 2010-10-04" required>
          </div>
          <div class="input-box">
            <span class="details">Domicilio del empleado</span>
            <input type="text" placeholder="Ejemplo: La Paz #203" required>
          </div>
          <div class="input-box">
            <span class="details">Telefono del empleado</span>
            <input type="text" placeholder="Ejemplo: 33454345345" required>
          </div>
          <div class="input-box">
            <span class="details">Correo del empleado</span>
            <input type="text" placeholder="Ejemplo: hola@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Sueldo mensual del empleado</span>
            <input type="text" placeholder="Ejemplo: 10000" required>
          </div>
          <div class="input-box">
            <span class="details">NSS del empleado</span>
            <input type="text" placeholder="Incluye sólo caracteres" required>
          </div>
          <div class="input-box" style="width: 100%;">
            <span class="details" align="center">Contraseña del empleado</span>
            <input type="password" placeholder="Introduce su contraseña" required>
          </div>
          
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Rol</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Gerente</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Encargado de sucursal</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Maestro</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Registrar">
        </div>
      </form>
    </div>
  </div>

</body>
</html>