<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Editar equipo</title>
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
				<form action="/empleado/equipos/{{$equipo->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <style>
                        .danger {
                            color: red;
                            font-size: 13px;
                        }
                    </style>
                    @method('PATCH')
					<h3>Editar equipo</h3>
                    <p>ID del del equipo: {{$equipo->id}}</p>
                    <br>
                    <label for="nombre" style="display: inline">Nombre: </label>
                    <input type="text" name="nombre" style="display: inline" class="form-control" placeholder="Nombre" value = "{{$equipo->nombre}}">
                    @error('nombre')
                        <div class="danger">*{{ $message }}</div>
                    @enderror
                    <br><br>
                    <label for="unidades">Unidades:</label>
                    <input type="text" name="unidades" class="form-control" placeholder="Unidades disponibles" value = "{{$equipo->unidades}}" style="display: inline">
                    @error('unidades')
                        <div class="danger">*{{ $message }}</div>
                    @enderror
                    <br><br>
                    <label for="costo">Costo: $</label>
                    <input type="text" name="costo" class="form-control" placeholder="Costo x dia" value = "{{$equipo->cost_x_renta}}" style="display: inline">
                    @error('costo')
                    <div class="danger">*{{ $message }}</div>
                    @enderror
                    <br><br>
                    <label for="descripcion">Descripcion: </label><br> <br>
					<textarea name="descripcion" placeholder="Descripcion" class="form-control" style="height: 130px;">{{$equipo->descripcion}}</textarea>
                    @error('descripcion')
                        <div class="danger">*{{ $message }}</div>
                    @enderror
                    <div class="form-row">
                        <button type="submit">
                            Editar
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </button>
                        <a href="/empleado/equipos" class="cancel">Cancelar</a>
                    </div>
				</form>
			</div>
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
