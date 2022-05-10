<!DOCTYPE html>
<!-- Designined by CodingLab - Update by Fantacy Design -->
<html lang="es" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title> Formulario de empleados </title>
        <link rel="stylesheet" href="{{asset('css/clientes/formClientes.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <div class="title">Registro de clientes</div>
            <div class="content">
                <br>
                <p>Id del nuevo cliente: {{$siguienteId}}</p>
                <form action="/empleado/cliente" method="POST">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Selecciona Imagen de perfil (opcional):</span>
                            <div class="inputFile">
                                <input type="file" id="imagen" name="imagen">
                            </div>
                        </div>
                        <div class="input-box">
                            <img id="preview" class="alineadoCentro" src="{{asset('/images/Clases/Form/adjuntarArchivo.png')}}" width="100px" height="100px">
                            <script src="{{asset('js/Clases/formClases.js')}}"></script>
                        </div>
                        <div class="input-box">
                            <span class="details">Nombre del cliente:</span>
                            <input type="text" name="nombre" placeholder="Ejemplo: David Fletes" value="{{ old('nombre') }}" required> <!-- required a un lado del placeholder -->
                            @error('nombre')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Fecha de nacimiento:</span>
                            <input type="text" name="fecha_nacimiento" placeholder="Ejemplo: 04/10/2021" value="{{ old('fecha_nacimiento') }}" required>
                            @error('fecha_nacimiento')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Domicilio: </span>
                            <input type="text" name="domicilio" placeholder="Ejemplo: La Paz #203" value="{{ old('domicilio') }}" required>
                            @error('domicilio')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Telefono:</span>
                            <input type="text" name="telefono" placeholder="Ejemplo: 33454345345" value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Correo:</span>
                            <input type="text" name="correo" placeholder="Ejemplo: hola@gmail.com" value="{{ old('correo') }}" required>
                            @error('correo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box" style="width: 100%;">
                            <span class="details" align="center">Contraseña:</span>
                            <input type="password" name="passwordNuevo" placeholder="Introduce su contraseña" value="{{old('passwordNuevo')}}" required>
                            @error('passwordNuevo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-box" style="width: 100%;">
                            <span class="details" align="center">Confirma contraseña:</span>
                            <input type="password" name="re_password" placeholder="Introduce su contraseña" value="{{old('re_password')}}" required>
                            @error('re_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Registrar">
                    </div>
                </form>
                <div class="button">
                    <a href="/empleado/cliente">Cancelar</a>
                </div>
            </div>
        </div>
    </body>
</html>
