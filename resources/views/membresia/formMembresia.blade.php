<!DOCTYPE html>
<!-- Designined by CodingLab - Update by Fantacy Design -->
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Formulario de membresia </title>
    <link rel="stylesheet" href="{{asset('css/EmpleadosCRUD/formEmpleados.css')}}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body> 
  <div class="container">
      <div class="title">Formulario de membresia</div> <!-- Fecha de ingreso e id se asignan en automatico -->
        <div class="content">
            <style>
                .danger {
                    color: red;
                    font-size: 13px;
                }
            </style>
            <form action="{{ route('membresia.store') }}" method="POST">
            @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nombre de la membresia</span>
                        <input type="text" name="Nombre" placeholder="Ejemplo: Membresia premium" value="{{ isset($membresia) ? $membresia->Nombre : ''}}{{ old('Nombre') }}" required> <!-- required a un lado del placeholder -->
                        @error('Nombre')
                        <br>
                        <small class="danger">*{{ $message }}</small>
                        <br>
                        @enderror
                    </div>
                    <div class="input-box">
                        <span class="details">Duracion de la membresia</span>
                        <input type="number" name="Duracion" placeholder="Pon la cantidad de días de la membresia" value="{{ isset($membresia) ? $membresia->Duracion : ''  }}{{ old('Duracion') }}" required>
                        @error('Duracion')
                        <br>
                        <small class="danger">*{{ $message }}</small>
                        <br>
                        @enderror
                    </div>
                    <div class="input-box" style="width: 100%;">
                        <span class="details">Costo por dia de la membresia</span>
                        <input type="number" name="costo" value="{{ isset($membresia) ? $membresia->costo : '' }}{{ old('costo') }}" required>
                        @error('costo')
                        <br>
                        <small class="danger">*{{ $message }}</small>
                        <br>
                        @enderror
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