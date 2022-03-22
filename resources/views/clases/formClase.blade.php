<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase</title>
</head>
<body>

    <!--@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
        @isset($clase)
            <h1>Edita clase</h1>
            <form action="/clase/{{ $clase->id }}" method="POST">
                @method('PATCH')
        @else
            <h1>Registrar clase</h1>
            <form action="/clase" method="POST">
        @endisset

    <form action="/clase/create" method="GET">
        @csrf
        <br>
        <label for="nombre">Nombre: </label><br>
        <textarea name="nombre" id="nombre" cols="30" rows="5">{{isset($clase) ? $clase->nombre :''}}{{old('nombre')}}</textarea><br>
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="descripcion">Descripcion: </label><br>
        <textarea name="descripcion" id="descripcion" cols="30" rows="5">{{isset($clase) ? $clase->descripcion :''}}{{old('descripcion')}}</textarea><br>
        @error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
