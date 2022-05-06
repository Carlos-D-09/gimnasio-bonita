<div class="right_col" role="main" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Empleados registrados</h3>
            </div>
        </div>
        <br><br><br>
        <p>Tipo de usuario:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 .- Gerente  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2 .- Encargado de sucursal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 .- Maestro</p>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-12">
                <div class="empleadosCRUD">
                    <form>
                        <div class="form-group pull-right top_search" >
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar por id">
                            <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button" style="color: white">Buscar</button>
                        </span>
                        </div>
                        </div>
                    </form>
                    <div class="empleados-body">
                        <table id="example2" class="table table-bordered table-hover">
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
                                    @foreach( $empleados as $empleado )
                                    @if ($empleado->id_tipoUsuario != 1) <!--Probando las validaciones --> 
                                        <tr style="text-align:center">
                                        <td>{{ $empleado->id }}</td>
                                        <td>{{ $empleado->correo }}</td>
                                        <td>{{ $empleado->fecha_ingreso }}</td>
                                        <td>{{ $empleado->id_tipoUsuario }}</td>
                                        <td>  </td>
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
