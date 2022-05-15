<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Empleados registrados</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <form action="/searchEmpleado" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control inputPatron" placeholder="Buscar por id" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary buttonPatron" type="submit" style="color: white">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel" >
                    <div class="x_title">
                        @if(session()->has('success'))
                        <div class="alert alert-success text-center" style="text-align: center;">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        @if(session()->has('deleted'))
                        <div class="alert alert-danger" role="alert" style="text-align: center;">
                            {{ session()->get('deleted') }}
                        </div>
                        @endif

                        <h2>Listado de empleados</h2>
                        <div class="clearfix"></div>
                        <!--@if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session()->get('message') }}</strong>
                        </div>
                        @endif-->
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <p style="text-align: center">Id</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Correo</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Fecha de ingreso</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Tipo de usuario</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($empleados as $empleado)
                                                <tr style="text-align:center">
                                                <td>{{ $empleado->id }}</td>
                                                <td>{{ $empleado->correo }}</td>
                                                <td>{{ $empleado->fecha_ingreso }}</td>
                                                <td>@if ($empleado->id_tipoUsuario == 1) Gerente @elseif ($empleado->id_tipoUsuario == 2) Encargado de sucursal @else Maestro @endif</td>
                                                <td>
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/empleadoCRUD/{{ $empleado->id }}" method="GET">
                                                                <button type="submit" class="btn btn-round btn-info btn-sm">Detalle</button>
                                                            </form>
                                                        </tr>
                                                        <tr>
                                                            <form action="/empleadoCRUD/{{ $empleado->id }}/edit" method="GET">
                                                                <button type="submit" class="btn btn-round btn-warning btn-sm">Editar</button>
                                                            </form>
                                                        </tr>
                                                        <tr>
                                                            <form action="/empleadoCRUD/{{ $empleado->id }}/delete">
                                                                @csrf
                                                                <button type="submit"class="btn btn-round btn-danger btn-sm">Desactivar</button>
                                                            </form>
                                                        </tr>
                                                    </table>
                                                </td>
                                                </tr>
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

