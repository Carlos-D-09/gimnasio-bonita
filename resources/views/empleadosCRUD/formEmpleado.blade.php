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
      <form action="{{ route('empleadoCRUD.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="user-details">
          <div class="input-box">
              <br>
            <input type="file" id="imagen" name="imagen">
            <label for="imagen" >
                <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                Selecciona Imagen
            </label>
            <style type="text/css">
                input#imagen{
                    display: none;
                }

                input#imagen + label{
                    background-color:rgb(252, 217, 172);
                    padding: 8px;
                    color: white;
                    border: 2px solid white;
                    border-radius: 9px;
                }

                input#imagen + label:hover{
                    background-color: rgba(197, 160, 112, 0.767);
                    border-color: black;
                    cursor: pointer;
                }
            </style>
          </div>
          <div class="input-box">
              <img id="preview" class="alineadoCentro" src="{{asset('/images/Clases/Form/adjuntarArchivo.png')}}" width="100px" height="100px">
              <script src="{{asset('/js/Empleado/formEmpleado.js')}}"></script>
          </div>
          <div class="input-box">
            <span class="details">Nombre del empleado</span>
            <input type="text" name="nombre" placeholder="Ejemplo: David Fletes" value="{{ old('nombre') }}" required> <!-- required a un lado del placeholder -->
          </div>
          <div class="input-box">
            <span class="details">RFC del empleado</span>
            <input type="text" name="RFC" placeholder="Incluye sólo caracteres" value="{{ old('RFC') }}" required>
          </div>
          <div class="input-box">
            <span class="details">Fecha de nacimiento del empleado</span>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
          </div>
          <div class="input-box">
            <span class="details">Domicilio del empleado</span>
            <input type="text" name="domicilio" placeholder="Ejemplo: La Paz #203" value="{{ old('domicilio') }}" required>
          </div>
          <div class="input-box">
            <span class="details">Telefono del empleado</span>
            <input type="text" name="telefono" placeholder="Ejemplo: 33454345345" value="{{ old('telefono') }}" required>
          </div>
          <div class="input-box">
            <span class="details">Correo del empleado</span>
            <input type="text" name="correo" placeholder="Ejemplo: hola@gmail.com" value="{{ old('correo') }}" required>
          </div>
          <div class="input-box">
            <span class="details">Sueldo mensual del empleado</span>
            <input type="text" name="sueldo" placeholder="Ejemplo: 10000" value="{{ old('sueldo') }}" required>
          </div>
          <div class="input-box">
            <span class="details">NSS del empleado</span>
            <input type="text" name="NSS" placeholder="Incluye sólo caracteres" value="{{ old('NSS') }}" required>
          </div>
          <div class="input-box" style="width: 100%;">
            <span class="details" align="center">Contraseña del empleado</span>
            <input type="password" name="password" placeholder="Introduce su contraseña" value="{{ old('password') }}" required>
          </div>
        </div>
        <div class="cargo-details">
          <input type="radio" name="id_tipoUsuario" id="dot-1" value=1>
          <input type="radio" name="id_tipoUsuario" id="dot-2" value=2>
          <input type="radio" name="id_tipoUsuario" id="dot-3" value=3 checked>
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
          <input type="submit" value="Completar">
        </div>
        <div class="buttonCancel">
          <a href="/empleadoCRUD">Cancelar proceso</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
