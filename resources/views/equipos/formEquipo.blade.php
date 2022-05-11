<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrar equipo</title>
        <script src="https://kit.fontawesome.com/36c2a6041f.js" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('fonts/clases/Material-Design-Iconic-Font.ttf')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('css/Clases/formClases.css')}}">

	</head>

	<body>

        <div class="wrapper">
            <div class="inner">
                <div class="image-holder">
                    <img src="{{asset('images/Clases/Form/registration-form-6.jpg')}}" alt="">
				</div>
				<form action="/empleado/equipos" method="POST" enctype="multipart/form-data">
                    @csrf
					<h3>Registrar equipo</h3>
                    <p>ID del nuevo registro: {{$id}}</p>
                    <br>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value = "{{old('nombre')}}">
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="costo">$</label>
                    <input type="text" name="costo" class="form-control" placeholder="Costo x dia" value = "{{old('costo')}}" style="display: inline">
                    @error('costo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
					<textarea name="descripcion" placeholder="Descripcion" class="form-control" style="height: 130px;">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-row">
                        <button type="submit">
                            Registrar
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </button>
                        <a href="/empleado/equipos" class="cancel">Cancelar</a>
                    </div>
				</form>
			</div>
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
