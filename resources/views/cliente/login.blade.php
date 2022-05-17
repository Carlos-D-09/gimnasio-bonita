<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/clientes/login.css')}}">
    <title>Login clientes</title>
</head>
<body>
    <div class="flex-container-login">
        <div class = "image-flex-login">
            <img src="{{asset('/images/Cliente/imagenForm.jpg')}}" height="500px" width="350px" alt="">
        </div>
        <div class = "form-flex-login">
            <div class="box-flex-login">
                <form action="/cliente/login" method="POST" class="flex-form">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <b>{{$error}}</b>
                            @endforeach
                        </div>
                        <br>
                    @endif
                    <label for="correo"> <b>Introduce tu correo</b></label>
                    <div class="flex-form-content">
                        <input type="text" name="correo" class="input-form" value="{{old('correo')}}">
                    </div>
                    @error('correo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="password"><b>Introduce tu contraseña</b></label>
                    <div class="flex-form-content">
                        <input type="password" name="password" class="input-form" value="{{old('password')}}">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <div class="flex-form-bottons">
                        <button type="submit" class="bottonLogin"> <b>Iniciar sesión</b></button>
                        <a href="/" class="bottonCancel"> <b>Cancelar</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
