<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 >Listado de pagos</h3><br><br><br>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-12">
                <div class="pagos">
                    <form action="/searchPago" method="GET">
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
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Dias</th>
                                    <th>Monto</th>
                                    <th>ID de membresía</th>
                                    <th>ID de empleado</th>
                                    <th>ID de cliente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagos as $pago)
                                    <tr style="text-align:center">
                                        <td>{{ $pago->id }}</td>
                                        <td>{{ $pago->Nombre }}</td>
                                        <td>{{ $pago->fecha }}</td>
                                        <td>{{ $pago->dias }}</td>
                                        <td>{{ $pago->monto }}</td>
                                        <td>{{ $pago->id_membresia }}</td>
                                        <td>{{ $pago->id_empleado }}</td>
                                        <td>{{ $pago->id_cliente }}</td>
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
<!-- 'id' => 1,
	'Nombre' => 'Pago de membresia en Gimnasio Bonita',
	'fecha' => '2022-05-09',
	'dias' => 15,
	'monto' => 1000, 	//ejemplo de un seeder de pago
	'id_membresia' => 1,
	'id_empleado' => 1,
	'id_cliente' => 1-->
