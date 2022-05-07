<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Información del empleado</h3> <br>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control inputPatron" placeholder="Buscar por id">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary buttonPatron" type="button" style="color: white">Buscar</button>
                                <script src="{{asset('/js/ofertaActividades/index/botonBusqueda.js')}}"></script>
                            </span>
                        </div>
                    </form>
                    <div class="empleados-body">
                        
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <p>Tipo de usuario:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 .- Gerente  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2 .- Encargado de sucursal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 .- Maestro</p>
                        <div class="clearfix"></div>
                    </div>
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
                                                <td>{{ $empleado->activo }}</td>
                                                <td>{{ $empleado->id_tipoUsuario }}</td>
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