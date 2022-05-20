<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                @isset($id_pago)
                    <h3>Informacion de pago</h3>
                @else
                    <h3> Buscar Pago</h3>
                @endauth
            </div>
            <div class="title_right">
                @isset($id_pago)
                    <div class="col-md-2 col-sm-2   form-group pull-right top_search">
                        <div class="btn btn-primary btn-info">
                            <a href="/empleado/pagosMembresias" style="color: white">
                                <i class="fa-solid fa-arrow-left"></i>
                                Volver
                            </a>
                        </div>
                    </div>
                @else
                    <div class="col-md-4 col-sm-4   form-group pull-right top_search">
                        @if( strpos(Route::current()->uri,"search",0) === false)
                            <form action="{{ '/' . Route::current()->uri . '/searchPago'}}" method="POST">
                        @else
                            <form action="{{ '/' . Route::current()->uri}}" method="POST">
                        @endif
                            @csrf
                            <div class="input-group">
                                <input type="text" name="idPagoBuscar" class="form-control inputPatron" placeholder="Id pago">
                                <span class="input-group-btn">
                                    <button class="btn btn-default buttonPatron" type="submit"> Buscar</button>
                                    <script src="{{asset('/js/ofertaActividades/index/botonBusqueda.js')}}"></script>
                                </span>
                            </div>
                        </form>
                    </div>
                @endisset
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x-panel">
                    <div class="x_title">
                        @isset($id_pago)
                            <div style="display:inline-flex;width: 100%">
                                <div style="width: 50%;">
                                    <p style="font-size: 15px"> <b> Id cliente: {{$id_cliente}} </b></p>
                                    <p style="font-size: 15px"> <b> Nombre del cliente: {{$clienteNombre}} </b></p>
                                    <p style="font-size: 15px"> <b> Id empleado: {{$id_empleado}} </b></p>
                                    <p style="font-size: 15px"> <b> Nombre del empleado: {{$empleadoNombre}} </b></p>
                                </div>
                                <div style="width: 50%;">
                                    <p style="font-size: 15px; text-align:right"> <b> Numero de pago: {{$id_pago}}</b></p>
                                    <p style="font-size: 15px; text-align:right"> <b> Fecha del pago: {{$fecha}}</b></p>
                                </div>
                            </div>
                        @else
                            @isset($errorIdPago)
                                <p>
                                    Sin coincidencias para el id: {{$errorIdPago}}
                                </p>
                            @endisset
                        @endisset
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                         @if(session()->has('success'))
                            <div class="alert alert-success text-center" style="text-align: center;">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                {{ session()->get('deleted') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            @isset($id_pago)
                                <div class="col-sm-12">
                                    <p>Clases que se pagaron</p>
                                    <div class="card-box table-responsive">
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
                                                        <p style="text-align: center">Costo</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        {{$id_membresia}}
                                                    </td>
                                                    <td align="center">
                                                        {{$nombreMembresia}}
                                                    </td>
                                                    <td align="center">
                                                        {{$duracion}}
                                                    </td>
                                                    </tr>
                                                <tr>
                                                    <td></td>
                                                    <td align="center"><b>Total:</b></td>
                                                    <td align="center">${{$total}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
