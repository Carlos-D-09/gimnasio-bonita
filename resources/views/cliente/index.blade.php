<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Clientes</h3>
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
                            @if(isset($idBuscado))
                                <h2>Resultados de la busqueda para el id: {{$idBuscado}}</h2>
                            @else
                                <h2>Listado de clientes</h2>
                            @endif
                            <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
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
                                                    <p style="text-align: center">Fecha registro</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Correo</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Id empleado que registro</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Nombre empleado <br> que registro</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientes as $cliente)
                                            <tr>
                                                <td align="center">
                                                    {{$cliente->id}}
                                                </td>
                                                <td align="center">
                                                    {{$cliente->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$cliente->fecha_registro}}
                                                </td>
                                                <td align="center">
                                                    {{$cliente->correo}}
                                                </td>
                                                <td align="center">
                                                    {{$cliente->id_empleado}}
                                                </td>
                                                <td align="center">
                                                    {{$cliente->empleado->nombre}}
                                                </td>
                                                @if(isset(Auth::user()->id_tipoUsuario) and Auth::user()->id_tipoUsuario != 3)
                                                <td align="center">
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/empleado/cliente/{{$cliente->id}}" method="GET">
                                                                <button type="submit" class="btn btn-round btn-info btn-sm">Detalle</button>
                                                            </form>
                                                        </tr>
                                                        <tr>
                                                            <form action="/empleado/cliente/{{$cliente->id}}/edit" method="GET">
                                                                <button type="submit" class="btn btn-round btn-warning btn-sm">Editar</button>
                                                            </form>
                                                        </tr>
                                                        <tr>
                                                            <form action="/empleado/cliente/{{$cliente->id}}" method="POST">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
