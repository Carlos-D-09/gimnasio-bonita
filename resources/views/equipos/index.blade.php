<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Equipos para prestamo</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    @if( strpos(Route::current()->uri,"search",0) === false)
                        <form action="{{ '/' . Route::current()->uri . '/search'}}">
                    @else
                        <form action="{{ '/' . Route::current()->uri}}">
                    @endif
                        <div class="input-group">
                            <input type="text" name="idBuscar" class="form-control inputPatron" placeholder="Buscar por id">
                            <span class="input-group-btn">
                                <button class="btn btn-default buttonPatron" type="submit"> Buscar</button>
                                <script src="{{asset('/js/ofertaActividades/index/botonBusqueda.js')}}"></script>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center" style="text-align: center;">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('edited'))
                            <div class="alert alert-warning text-center" style="text-align: center;">
                                {{ session()->get('edited') }}
                            </div>
                        @endif

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                {{ session()->get('deleted') }}
                            </div>
                        @endif

                            @if(isset($idBuscado))
                                <h2>Resultados de la busqueda para el id: {{$idBuscado}}</h2>
                            @else
                                <h2>Listado de equipos</h2>
                            @endif
                            <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                @if(session()->has('data'))
                                    <div style="text-align: center;">
                                        {{ session()->get('data') }}
                                    </div><br><br>
                                @endif
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <p style="text-align: center">Id</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Nombre</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Descripcion</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Unidades Totales</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Unidades disponibles</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Costo por renta</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($equipos as $equipo)
                                            <tr>
                                                <td align="center">
                                                    {{$equipo->id}}
                                                </td>
                                                <td align="center">
                                                    {{$equipo->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$equipo->descripcion}}
                                                </td>
                                                <td align="center">
                                                    {{$equipo->unidades}}
                                                </td>
                                                <td align="center">
                                                    {{$equipo->unidadesDisponibles}}
                                                </td>
                                                <td align="center">
                                                    {{$equipo->cost_x_renta}}
                                                </td>
                                                @if(isset(Auth::user()->id_tipoUsuario) and Auth::user()->id_tipoUsuario != 3)
                                                <td align="center">
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/empleado/equipos/{{$equipo->id}}/edit" method="GET">
                                                                <button type="submit" class="btn btn-round btn-warning btn-sm">Editar</button>
                                                            </form>
                                                        </tr>
                                                        <tr>
                                                            <form action="/empleado/equipos/{{$equipo->id}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"class="btn btn-round btn-danger btn-sm">Eliminar</button>
                                                            </form>
                                                        </tr>
                                                        @else
                                                        <tr>
                                                            <form action="" method="">
                                                                <button type="submit"class="btn btn-round btn-succes btn-sm">Registrarse</button>
                                                            </form>
                                                        </tr>
                                                        @endif
                                                    </table>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="btn btn-primary btn-warning" style="width: 100%;">
                                    <a href="/equiposJson" style="color: white">
                                        <i class="fa fa-edit m-right-xs"></i>
                                         Hacer una consulta de los equipos en formato json
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
