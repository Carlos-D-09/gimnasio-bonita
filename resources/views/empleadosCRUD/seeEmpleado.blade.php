<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Empleados registrados</h3> <br>
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
                    <div class="empleados-body x-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                <table id="example2" class="table table-striped table-bordered"  style="width:100%">
                                    <thead>
                                        
                                        <tr style="text-align:center">
                                            <th>Id</th>
                                            <th>Correo</th>
                                            <th>Fecha de ingreso</th>
                                            <th>Tipo de usuario</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($empleados as $empleado)
                                            @if ($empleado->id_tipoUsuario != 1) <!--Probando las validaciones --> 
                                                <tr style="text-align:center">
                                                <td>{{ $empleado->id }}</td>
                                                <td>{{ $empleado->correo }}</td>
                                                <td>{{ $empleado->fecha_ingreso }}</td>
                                                <td>@if ($empleado->id_tipoUsuario == 1) Gerente @elseif ($empleado->id_tipoUsuario == 2) Encargado de sucursal @else Maestro @endif</td>
                                                <td>
                                                    <u><a href="/empleadoCRUD/{{ $empleado->id }}">Ver detalles del empleado</a></u><br>
                                                    <u><a href="/empleadoCRUD/{{ $empleado->id }}/edit">Editar información del empleado</a></u>
                                                </td>
                                                </tr>
                                            @endif
                                            
                                            @endforeach
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
