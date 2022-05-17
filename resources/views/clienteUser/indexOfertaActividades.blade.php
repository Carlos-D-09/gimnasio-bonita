<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Agenda</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    @if( strpos(Route::current()->uri,"search",0) === false)
                        <form action="{{ '/' . Route::current()->uri . '/search'}}">
                    @else
                        <form action="{{ '/' . Route::current()->uri}}">
                    @endif
                        <div class="input-group">
                            <input type="text" name="patron" class="form-control inputPatron" placeholder="Buscar por nombre">
                            <span class="input-group-btn">
                                <button class="btn btn-default buttonPatron" type="submit"> Buscar</button>
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
                        @if(session()->has('data'))
                            <div style="text-align: center;">
                                {{ session()->get('data') }}
                            </div>
                        @endif
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                    Ordenar por
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="">Todos</a>
                                    <a class="dropdown-item" href="">Dia L-S</a>
                                    <a class="dropdown-item" href="">Clase A-Z</a>
                                    <a class="dropdown-item" href="">Maestros A-Z</a>
                                </div>
                            </li>
                        </ul>
                        @if(isset($dia))
                            <h2>Oferta de actividades ordenada por día</h2>
                        @elseif(isset($clase))
                            <h2>Oferta de actividades ordenada de la A-Z en base a la clase</h2>
                        @elseif(isset($maestro))
                            <h2>Oferta de actividades ordenada de la A-Z en base a los maestros</h2>
                        @else
                            <h2>Oferta de actividades</h2>
                        @endif
                        @if(isset($patronBuscado))
                            <br><br>
                            <p>Resultados de la busqueda para la cadena "{{$patronBuscado}}"</p>
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
                                                    <p style="text-align: center">Costo</p>
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
                                                    {{$ofertaActividad->id}}
                                                </td>
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
                                                    {{'$'.$ofertaActividad->costo}}
                                                </td>
                                                <td align="center">
                                                    {{$ofertaActividad->empleado->nombre}}
                                                </td>
                                                
                                                <td align="center">
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/cliente/clase/register" method="">
                                                            <button type="button" class="btn btn-success">Registrarse</button>
                                                            </form>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="btn btn-primary btn-warning" style="width: 100%;">
                                    <a href="" style="color: white">
                                        <i class="fa fa-edit m-right-xs"></i>
                                         Hacer una consulta de las ofertas en formato json
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