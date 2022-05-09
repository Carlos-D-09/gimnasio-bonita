<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Empleado </title>
    <link rel="stylesheet" href="{{asset('css/welcome/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/default-min.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/default.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/Linelcons.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/style.cssmap')}}">
   </head>
   <body> 
    <div class="right_col" role="main" style="margin-top: 10px; margin-bottom: 200px; margin-left: 10px; margin-right: 10px;">
        <div class="">
            <div class="page-title">
                <div class="title_left" style="text-align: center;">
                    <h3>Información del empleado</h3> <br>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="empleados-body">
                            
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="x_panel">
                        <div class="empleados-body x-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                    <table id="example2" class="table table-striped table-bordered"  style="width:100%">
                                        <thead>
                                            
                                            <tr style="text-align:center">
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>RFC</th>
                                                    <th>Fecha de nacimiento</th>
                                                    <th>Domicilio</th>
                                                    <th>Telefono</th>
                                                    <th>Correo</th>
                                                    <th>Sueldo</th>
                                                    <th>Fecha de ingreso</th>
                                                    <th>NSS</th>
                                                    <th>Contraseña</th>
                                                    <th>Activo</th>
                                                    <th>Tipo de usuario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <tr style="text-align:center">
                                                    <td>{{ $empleado->id }}</td>
                                                    <td>{{ $empleado->nombre }}</td>
                                                    <td>{{ $empleado->RFC }}</td>
                                                    <td>{{ $empleado->fecha_nacimiento }}</td>
                                                    <td>{{ $empleado->domicilio }}</td>
                                                    <td>{{ $empleado->telefono }}</td>
                                                    <td>{{ $empleado->correo }}</td>
                                                    <td>{{ $empleado->sueldo }}</td>
                                                    <td>{{ $empleado->fecha_ingreso }}</td>
                                                    <td>{{ $empleado->NSS }}</td>
                                                    <td>{{ $empleado->password }}</td>
                                                    <td></td>
                                                    <td>@if ($empleado->id_tipoUsuario == 1) Gerente @elseif ($empleado->id_tipoUsuario == 2) Encargado de sucursal @else Maestro @endif</td>
                                                    </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <br><a href="/empleadoCRUD"> Volver a la consulta de empleados</a></br>
    </div>
    </body>
</html>