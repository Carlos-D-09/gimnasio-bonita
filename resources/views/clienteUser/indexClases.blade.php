<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Mis clases</h3>
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
                    <div class="x_title">
                        Listado de las clases:
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    @isset($misClases)
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <p style="text-align: center">Id oferta</p>
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
                                                        <p style="text-align: center">Maestro</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($misClases as $miClase)
                                                    <tr>
                                                        <td align="center">
                                                            {{$miClase->id}}
                                                        </td>
                                                        <td align="center">
                                                            {{$miClase->clase->nombre}}
                                                        </td>
                                                        <td align="center">
                                                            {{$miClase->horaInicio}}
                                                        </td>
                                                        <td align="center">
                                                            {{$miClase->horaFin}}
                                                        </td>
                                                        <td align="center">
                                                            {{$miClase->dia}}
                                                        </td>
                                                        <td align="center">
                                                            {{$miClase->empleado->nombre}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p style="font-size:30px;color:rgb(41, 165, 41)">No cuentas con ninguna actividad programada</p>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
