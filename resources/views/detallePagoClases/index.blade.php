<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Detalles Pago de clases</h3>
            </div>
            <div class="title_right" >
                <div class="col-md-2 col-sm-2   form-group pull-right top_search">
                    <div class="btn btn-primary btn-danger">
                        <a href="/empleado/PagosClases" style="color: white">
                            <i class="fa-solid fa-circle-xmark"></i>
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x-panel">
                    <div class="x_title">
                        <h2>Listado del pago con id: {{$idPago}}</h2>
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
                                                    <p style="text-align: center">Id detalle</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Id oferta</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Clase </p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Dia</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Hora</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Costo</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                            <tr>
                                                <td align="center">
                                                    {{$detalle->id}}
                                                </td>
                                                <td align="center">
                                                    {{$detalle->id_oferta}}
                                                </td>
                                                <td align="center">
                                                    {{$detalle->oferta_actividades->clase->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$detalle->oferta_actividades->dia}}
                                                </td>
                                                <td align="center">
                                                    {{$detalle->oferta_actividades->horaInicio . ' a ' . $detalle->oferta_actividades->horaFin}}
                                                </td>
                                                <td align="center">
                                                    ${{$detalle->oferta_actividades->costo}}
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
