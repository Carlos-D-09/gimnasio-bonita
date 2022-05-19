<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 >Listado de pagos para membresias</h3><br><br><br>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-12">
                <div class="pagos">
                    <form action="/empleado/searchPago" method="GET">
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
                        @if(session()->has('data'))
                            <div style="text-align: center;">
                                {{ session()->get('data') }}
                            </div><br>
                        @endif
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Id</th>
                                    <th>Fecha del pago</th>
                                    <th>Dias que se pagaron</th>
                                    <th>ID de membresía</th>
                                    <th>Nombre de la membresia</th>
                                    <th>ID de empleado</th>
                                    <th>Nombre del empleado</th>
                                    <th>ID de cliente</th>
                                    <th>Nombre del cliente</th>
                                    <th>Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagos as $pago)
                                    <tr style="text-align:center">
                                        <td>{{ $pago->id }}</td>
                                        <td>{{ $pago->fecha }}</td>
                                        <td>{{ $pago->dias }}</td>
                                        <td>{{ $pago->id_membresia }}</td>
                                        <td>{{ $pago->membresia->Nombre }}</td>
                                        <td>{{ $pago->id_empleado }}</td>
                                        <td>{{ $pago->empleado->nombre }}</td>
                                        <td>{{ $pago->id_cliente }}</td>
                                        <td>{{ $pago->cliente->nombre }}</td>
                                        <td>{{ $pago->total}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="btn btn-primary btn-warning" style="width: 100%;">
                        <a href="/pagosJson" style="color: white">
                            <i class="fa fa-edit m-right-xs"></i>
                            Hacer una consulta de los pagos en formato json
                        </a>
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
