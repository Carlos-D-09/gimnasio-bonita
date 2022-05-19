<div class="right_col" role="main">
    <div class="">
        <form id="formPagos" action="/empleado/PagosClases" class="form-vertical form-label-left" method="POST">
            @csrf
            <div class="page-title">
                <div class="title_left">
                    <h3> Registro de pago de una clase </h3>
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
                            @if (@isset($informacion))
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
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>
                                        <p style="text-align: center">Id de la oferta</p>
                                    </th>
                                    <th>
                                        <p style="text-align: center">Clase</p>
                                    </th>
                                    <th>
                                        <p style="text-align: center">Dia</p>
                                    </th>
                                    <th>
                                        <p style="text-align: center">Horario</p>
                                    </th>
                                    <th>
                                        <p style="text-align: center">Costo</p>
                                    </th>
                                    @isset($informacion)
                                        <th>
                                            <p style="text-align: center">Quitar / validar y agregar</p>
                                        </th>
                                    @else
                                        <th>
                                            <p style="text-align: center">Validar y agregar</p>
                                        </th>
                                    @endisset
                                </thead>
                                <tbody>
                                    {{-- Cuando ya se tienen varias clases agregadas en el grid --}}
                                    @isset($informacion)
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($informacion as $pago)
                                            <tr style="text-align:center">
                                                <td>
                                                    {{$pago['id_oferta']}}
                                                    <input type="hidden" name="pagos[{{$count}}][id_oferta]" value="{{$pago['id_oferta']}}">
                                                </td>
                                                <td>{{$pago['clase']}}</td>
                                                <td>{{$pago['dia']}}</td>
                                                <td>{{$pago['horaInicio'] . ' a ' . $pago['horaFin']}}</td>
                                                <td>{{$pago['costo']}}</td>
                                                <td>
                                                    <button class="btn btn-danger" type="submit" formaction="/empleado/PagosClases/quitar/{{$count}}">
                                                        Quitar
                                                    </button>
                                                </td>
                                            </tr>
                                            @php
                                                $count += 1;
                                            @endphp
                                        @endforeach
                                        <tr style="text-align:center">
                                            <td>
                                                <input type="text" name="pagos[{{$count}}][id_oferta]" class="form-control" placeholder="Id oferta" value= "@if(isset($idOfertaErroneo)){{$idOfertaErroneo}}@endif">
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button class="btn btn-success" type="submit" formaction="/empleado/PagosClases/validarDatos" formmethod="POST">
                                                    Agregar
                                                </button>
                                            </td>
                                        </tr>
                                    {{-- Cuando es la primera clase que se agregara --}}
                                    @else
                                        <tr style="text-align:center">
                                            <td>
                                                <input type="text" name="pagos[0][id_oferta]" class="form-control" placeholder="Id oferta" value= "@if(isset($idOfertaErroneo)){{$idOfertaErroneo}} @else{{old('pagos[0][id_oferta]')}}@endif" required>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button class="btn btn-success" type="submit" formaction="/empleado/PagosClases/validarDatos">
                                                    Agregar
                                                </button>
                                            </td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                            {{-- desplegar posibles errores --}}
                        @else
                            {{-- Buscar el cliente que se registrara el pago --}}
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <h4>Buscar cliente que pagara: </h4>
                                <div class="input-group">
                                    <input type="text" name="id_clienteBuscar" class="form-control inputPatron" placeholder="Buscar cliente por ID">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default buttonPatron" type="submit" formaction="/empleado/PagosClases/searchCliente" formmethod="POST"> Buscar</button>
                                        <script src="{{asset('/js/ofertaActividades/index/botonBusqueda.js')}}"></script>
                                    </span>
                                </div>
                                {{-- Mostrar el resultado de la busqueda --}}
                                @isset($resultadoBusqueda)
                                    @if ($resultadoBusqueda == 'no')
                                        No se encontraron coincidencias
                                    @else
                                        <h2>
                                            Nombre del cliente con ID {{$idCliente}}: {{$resultadoBusqueda}} <br>
                                            <input type="hidden" name="cliente" value="{{$idCliente}}">
                                            <input type="hidden" name="clienteNombre" value="{{$resultadoBusqueda}}">
                                        </h2>
                                        <h2 style="display: inline">
                                            Deseas continuar:
                                        </h2>
                                        <button type="submit" class="btn btn-success" formaction="/empleado/PagosClases/nuevo" formaction="POST" style="display:inline">
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
                    {{-- total de a pagar por las clases --}}
                    @isset($cliente)
                        <h1 style="text-align: right"> <br> <br> Total: ${{$total}}</h1>
                        <input type="hidden" value="{{$total}}" name="total">
                    @endisset
                </div>
            </div>
        </form>
    </div>
</div>
