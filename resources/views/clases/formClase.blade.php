<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrar clase</title>
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
				<form action="/empleado/clase" method="POST" enctype="multipart/form-data">
                    @csrf
                    <style>
                        .danger {
                            color: red;
                            font-size: 13px;
                        }
                    </style>
					<h3>Registrar clase</h3>
                    <p>ID del nuevo registro: {{$id}}</p>
                    <input type="file" id="imagen" name="imagen">
                    <label for="imagen" >
                        <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                        Selecciona Imagen
                    </label>
                    <img id="preview" class="alineadoCentro" src="{{asset('/images/Clases/Form/adjuntarArchivo.png')}}" width="100px" height="100px">
                    <script src="{{asset('js/Clases/formClases.js')}}"></script>
                    @error('imagen')
                        <div class="danger">*{{ $message }}</div>
                    @enderror
                    <br><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value = "{{old('nombre')}}">
                    @error('nombre')
                        <div class="danger">*{{ $message }}</div>
                    @enderror
                    <br><br>
					<textarea name="descripcion" placeholder="Descripcion" class="form-control" style="height: 130px;">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <div class="danger">*{{ $message }}</div>
                    @enderror
                    <div class="form-row">
                        <button type="submit">
                            Registrar
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </button>
                        <a href="/empleado" class="cancel">Cancelar</a>
                    </div>
				</form>
			</div>
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
