<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Agenda</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Oferta de actividades</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                    Ordenar por
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/oferta_actividades">Normal</a>
                                    <a class="dropdown-item" href="/oferta_actividades/dia">Dia L-S</a>
                                    <a class="dropdown-item" href="/oferta_actividades/clase">Clase A-Z</a>
                                    @isset(Auth::user()->id_tipoUsuario)
                                        @if (Auth::user()->id_tipoUsuario == 3)
                                            <a class="dropdown-item" href="/oferta_actividades/clase">Mis clases</a>
                                        @endif
                                    @endisset
                                </div>
                            </li>
                        </ul>
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
                                                    <p style="text-align: center">Clase</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Hora inicio</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Hora fin</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Día</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Cupos</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Maestro</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ofertaActividades as $ofertaActividad)
                                            <tr>
                                                <td align="center">
                                                    {{$ofertaActividad->clase->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$ofertaActividad->horaInicio}}
                                                </td>
                                                <td align="center">
                                                    {{$ofertaActividad->horaFin}}
                                                </td>
                                                <td align="center">
                                                    {{$ofertaActividad->dia}}
                                                </td>
                                                <td align="center">
                                                    {{$ofertaActividad->cupos}}
                                                </td>
                                                <td align="center">
                                                    {{$ofertaActividad->empleado->nombre}}
                                                </td>
                                                @if(isset(Auth::user()->id_tipoUsuario))
                                                <td align="center">
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/ofertaActividad/{{$ofertaActividad->id}}/edit" method="GET">
                                                                <button type="submit" class="btn btn-round btn-info btn-sm">Detalle</button>
                                                            </form>

                                                        </tr>
                                                        <tr>
                                                            <form action="/ofertaActividad/{{$ofertaActividad->id}}/edit" method="GET">
                                                                <button type="submit" class="btn btn-round btn-warning btn-sm">Editar</button>
                                                            </form>
                                                        </tr>
                                                        <tr>
                                                            <form action="/clase/{{$ofertaActividad->id}}" method="POST">
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
