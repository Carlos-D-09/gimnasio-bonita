<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 >Pagos de clases</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <form action="" method="GET">
                        <div class="form-group pull-right top_search" >
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar por id" name="search">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit" style="color: white">Buscar</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x-panel">
                    <div class="x_title">
                        <h2>Listado de pagos</h2>
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
                                                    <p style="text-align: center">Fecha</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Id empleado</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Nombre empleado</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Id cliente</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Nombre cliente </p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Total</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pagos as $pago)
                                            <tr>
                                                <td align="center">
                                                    {{$pago->id}}
                                                </td>
                                                <td align="center">
                                                    {{$pago->fecha}}
                                                </td>
                                                <td align="center">
                                                    {{$pago->id_empleado}}
                                                </td>
                                                <td align="center">
                                                    {{$pago->empleado->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$pago->id_cliente}}
                                                </td>
                                                <td align="center">
                                                    {{$pago->cliente->nombre}}
                                                </td>
                                                <td align="center">
                                                    ${{$pago->total}}
                                                </td>
                                                <td align="center">
                                                    <form action="/empleado/detallePagoClases/{{$pago->id}}" method="GET">
                                                        <button type="submit"class="btn btn-round btn-info btn-sm">Detalle</button>
                                                    </form>
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
