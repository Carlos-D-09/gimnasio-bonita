<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 >Listado de pagos para prestamos de equipos</h3><br><br><br>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-12">
                <div class="pagos">
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
                    <div class="clases-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>ID de empleado</th>
                                    <th>Nombre de empleado</th>
                                    <th>ID de cliente</th>
                                    <th>Nombre del cliente</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagos as $pago)
                                    <tr style="text-align:center">
                                        <td>{{ $pago->id }}</td>
                                        <td>{{ $pago->fecha }}</td>
                                        <td>{{ $pago->id_empleado }}</td>
                                        <td>{{ $pago->empleado->nombre }}</td>
                                        <td>{{ $pago->id_cliente }}</td>
                                        <td>{{ $pago->cliente->nombre }}</td>
                                        <td>${{ $pago->total }}</td>
                                        <td align="center">
                                            <form action="/empleado/detallePagoPrestamosEquipo/{{$pago->id}}" method="GET">
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
