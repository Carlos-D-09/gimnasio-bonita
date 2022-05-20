<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Historial de prestamos de equipos</h3>
            </div>
            <div class="title_right">
                <div class="col-md-4 col-sm-4  form-group pull-right top_search">
                    <div>
                        @if( strpos(Route::current()->uri,"search",0) === false)
                            <form action="{{ '/' . Route::current()->uri . '/search'}}">
                        @else
                            <form action="{{ '/' . Route::current()->uri}}">
                        @endif
                            <div class="input-group">
                                <input type="text" name="idBuscar" class="form-control inputPatron" placeholder="Buscar por id">
                                <span class="input-group-btn">
                                    <button class="btn btn-default buttonPatron" type="submit">Buscar por id pago</button>
                                    <!--<script src="{{asset('/js/ofertaActividades/index/botonBusqueda.js')}}"></script>-->
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2  form-group pull-right top_search">
                    @isset($proviene)
                        @if ($proviene == "showDetalle")
                            <div class="btn btn-primary btn-info">
                                <a href="/empleado/PrestamosPagosEquipos" style="color: white">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Volver
                                </a>
                            </div>
                        @endif
                    @endisset
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
                                <h2>Listado de prestamos de equipos</h2>
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
                                                    <p style="text-align: center">Id del equipo</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Nombre del equipo</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Devuelto</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Cantidad</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Id del pago</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opcion</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prestamos as $prestamo)
                                            <tr>
                                                <td align="center">
                                                    {{$prestamo->id}}
                                                </td>
                                                <td align="center">
                                                    {{$prestamo->id_equipo}}
                                                </td>
                                                <td align="center">
                                                    {{$prestamo->equipo->nombre}}
                                                </td>
                                                <td align="center">
                                                    @if ($prestamo->devuelto == 0)
                                                    No
                                                    @else
                                                    Si
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    {{$prestamo->cantidad}}
                                                </td>
                                                <td align="center">
                                                    {{$prestamo->id_pagos_prestamos_equipo}}
                                                </td>
                                                <td align="center">
                                                    @if ($prestamo->devuelto == 0)
                                                        <form action="/empleado/historialPrestamosEquipos/edit" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            @isset($proviene)
                                                                @if ($proviene == "showDetalle")
                                                                    <input type="hidden" name="proviene" value="{{"showDetalle"}}">
                                                                @elseif($proviene == "index")
                                                                    <input type="hidden" name="proviene" value="{{"index"}}">
                                                                @endif
                                                            @endisset
                                                            <input type="hidden" name="id_historial_prestamo" value="{{$prestamo->id}}">
                                                            <button type="submit"class="btn btn-round btn-success btn-sm">Marcar como <br> devuelto</button>
                                                        </form>
                                                    @endif
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
