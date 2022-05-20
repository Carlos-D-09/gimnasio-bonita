<div class="right_col" role="main">
    <div class="">
        <form id="formPagos" action="/empleado/pagosMembresias" class="form-vertical form-label-left" method="POST">
            @csrf
            <div class="page-title">
                <div class="title_left">
                    <h3> Registro de pago de una membresia </h3>
                </div>
                <div class="title_right" >
                     {{-- validar si ya se selecciono un cliente al que se le registre el pago --}}
                     @isset($cliente)
                        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                            <div class="btn btn-primary btn-danger">
                                <a href="/empleado/PagosClases" style="color: white">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Cancelar
                                </a>
                            </div>
                            @if (@isset($pago))
                                <button type="submit" class="btn btn-success" form="formPagos">
                                    <i class="fa-solid fa-floppy-disk" style="color: white;"></i>
                                    Guardar
                                </button>
                            @endif
                        </div>
                    @endisset
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="x_panel">
                <div class="x_title">
                    {{-- desplegar informacion del cliente y el numero de folio si esta seleccionado el cliente --}}
                    @isset($cliente)
                        <div style="display:inline-flex;width: 100%">
                            <div style="width: 50%;">
                                <p style="font-size: 15px"> <b> Id cliente: {{$cliente}} </b></p>
                                <input type="hidden" name="id_cliente" value="{{$cliente}}">
                                <p style="font-size: 15px"> <b> Nombre del cliente: {{$clienteNombre}} </b></p>
                            </div>
                            <div style="width: 50%;">
                                <p style="font-size: 15px; text-align:right"> <b> Numero de pago: {{$siguienteId}}</b></p>
                                <p style="font-size: 15px; text-align:right"> <b> Fecha: {{$fecha}}</b></p>
                            </div>
                        </div>
                    @else
                        <h2>Escoger cliente que pagara</h2>
                    @endisset
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group row">
                        @isset($cliente)
                            @isset($pago)
                                <table class="table table-striped table-bordered" style="width:100%">
                            @else
                                <table class="table table-striped table-bordered" style="width:25%">
                            @endisset
                                <thead>
                                    <th>
                                        <p style="text-align: center">Id de la membresia</p>
                                    </th>
                                    @isset($pago)
                                        <th>
                                            <p style="text-align: center">Nombre</p>
                                        </th>
                                        <th>
                                            <p style="text-align: center">Duracion en días</p>
                                        </th>
                                        <th>
                                            <p style="text-align: center">Quitar</p>
                                        </th>
                                    @else
                                        <th>
                                            <p style="text-align: center">Validar y agregar membresia</p>
                                        </th>
                                    @endisset
                                </thead>
                                <tbody>
                                    @isset($pago)
                                        <tr style="text-align: center">
                                            <td>
                                                {{$pago['id_membresia']}}
                                                <input type="hidden" name="id_membresia" value="{{$pago['id_membresia']}}">
                                            </td>
                                            <td>
                                                {{$pago['nombre']}}
                                            </td>
                                            <td>
                                                {{$pago['duracion']}}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" type="submit" formaction="/empleado/pagosMembresias/quitar">
                                                    Quitar
                                                </button>
                                            </td>
                                        </tr>
                                    @else
                                        <tr style="text-align:center">
                                            <td>
                                                <input type="text" name="id_membresia" class="form-control" placeholder="Id membresia" value= "" required>
                                            </td>
                                            <td>
                                                <button class="btn btn-success" type="submit" formaction="/empleado/pagosMembresias/validarDatos" formmethod="POST">
                                                    Validar y agregar
                                                </button>
                                            </td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        @else
                            {{-- Buscar el cliente que se registrara el pago --}}
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <h4>Buscar cliente que pagara: </h4>
                                <div class="input-group">
                                    <input type="text" name="id_clienteBuscar" class="form-control inputPatron" placeholder="Buscar cliente por ID">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default buttonPatron" type="submit" formaction="/empleado/pagosMembresias/searchCliente" formmethod="POST"> Buscar</button>
                                        <script src="{{asset('/js/ofertaActividades/index/botonBusqueda.js')}}"></script>
                                    </span>
                                </div>
                                {{-- Mostrar el resultado de la busqueda --}}
                                @isset($resultadoBusqueda)
                                    @if ($resultadoBusqueda == 'no')
                                        <br>
                                        No se encontraron coincidencias
                                    @elseif($resultadoBusqueda == 'activo')
                                        <br>
                                        <p style="font-size: 15px">
                                            El cliente {{$nombreCliente}} con id {{$idCliente}} ya cuenta con una membresia activa
                                        </p>
                                    @else
                                        <h2>
                                            Nombre del cliente con ID {{$idCliente}}: {{$resultadoBusqueda}} <br>
                                            <input type="hidden" name="cliente" value="{{$idCliente}}">
                                            <input type="hidden" name="clienteNombre" value="{{$resultadoBusqueda}}">
                                        </h2>
                                        <h2 style="display: inline">
                                            Deseas continuar:
                                        </h2>
                                        <button type="submit" class="btn btn-success" formaction="/empleado/pagosMembresias/nuevo" formaction="POST" style="display:inline">
                                            <i class="fa-solid fa-circle-check" style="color:white"></i>
                                            Confirmar
                                        </button>
                                    @endif
                                @endisset
                            </div>
                        @endisset
                    </div>
                    @isset($errors)
                        @for ( $x=0; $x < count($errors); $x++)
                            <ul style="color: red">
                                <li>{{$errors[$x]}}</li>
                            </ul>
                        @endfor
                    @endisset
                    @isset($cliente)
                        <h1 style="text-align: right"> <br> <br> Total: ${{$total}}</h1>
                        <input type="hidden" value="{{$total}}" name="total">
                    @endisset
                </div>
            </div>
        </form>
    </div>
</div>
