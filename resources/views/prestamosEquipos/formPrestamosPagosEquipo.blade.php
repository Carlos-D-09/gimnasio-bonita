<div class="right_col" role="main">
    <div class="">
        <form id="formEdit" action="/empleado/PrestamosPagosEquipos" class="form-vertical form-label-left" method="POST">
            @csrf
            <div class="page-title">
                <div class="title_left">
                    <h3> Registro de pago del prestamo de equipos </h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-4 col-sm-4   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/empleado/PagosClases" style="color: white">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Cancelar
                            </a>
                        </div>
                        @if (isset($informacion))
                            <button type="submit" class="btn btn-success" form="formEdit">
                                <i class="fa-solid fa-floppy-disk" style="color: white;"></i>
                                Guardar
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
                <div class="form-group row">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>
                                <p style="text-align: center">Id del pago</p>
                            </th>
                            <th>
                                <p style="text-align: center">Id del cliente</p>
                            </th>
                            <th>
                                <p style="text-align: center">Nombre del cliente</p>
                            </th>
                            <th>
                                <p style="text-align: center">Id del equipo</p>
                            </th>
                            <th>
                                <p style="text-align: center">Nombre del equipo</p>
                            </th>
                            <th>
                                <p style="text-align: center">Cantidad</p>
                            </th>
                            <th>
                                <p style="text-align: center">Precio por unidad</p>
                            </th>
                            <th>
                                <p style="text-align: center">Precio por prestamo</p>
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
                            @isset($informacion)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($informacion as $pago)
                                    <tr style="text-align:center">
                                        <td>
                                            {{$siguienteId}}
                                        </td>
                                        <td>
                                            {{$pago['id_cliente']}}
                                            <input type="hidden" name="pagos[{{$count}}][id_cliente]" value="{{$pago['id_cliente']}}">
                                        </td>
                                        <td>{{$pago['cliente']}}</td>
                                        <td>
                                            {{$pago['id_equipo']}}
                                            <input type="hidden" name="pagos[{{$count}}][id_equipo]" value="{{$pago['id_equipo']}}">
                                        </td>
                                        <td>{{$pago['equipo']}}</td>
                                        <td>
                                            {{$pago['cantidad']}}
                                            <input type="hidden" name="pagos[{{$count}}][cantidad]" value="{{$pago['cantidad']}}">
                                        </td>
                                        <td>{{$pago['precio_x_unidad']}}</td>
                                        <td>{{$pago['precio_x_prestamo']}}</td>
                                        <td>
                                            <button class="btn btn-danger" type="submit" formaction="/empleado/PrestamosPagosEquipos/quitar/{{$count}}">
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
                                        {{$siguienteId}}
                                    </td>
                                    <td>
                                        {{$idCliente}}
                                        <input type="hidden" name="pagos[{{$count}}][id_cliente]" class="form-control" placeholder="Id cliente" value= "@if(isset($idClienteErroneo)){{$idClienteErroneo}} @else{{$idCliente}}@endif" >
                                    </td>
                                    <td>
                                        {{$nombreCliente}}
                                    </td>
                                    <td>
                                        <input type="text" name="pagos[{{$count}}][id_equipo]" class="form-control" placeholder="Id equipo" value="@if(isset($idEquipoErroneo)){{$idEquipoErroneo}} @endif">
                                    </td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="pagos[{{$count}}][cantidad]" class="form-control" placeholder="cantidad" value="@if(isset($cantidadErronea)){{$cantidadErronea}} @endif">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-success" type="submit" formaction="/empleado/PrestamosPagosEquipos/validarDatos" formmethod="POST">
                                            Agregar
                                        </button>
                                    </td>
                                </tr>
                            @else
                            <tr style="text-align:center">
                                <td>
                                    {{$siguienteId}}
                                </td>
                                <td>
                                    <input type="text" name="pagos[0][id_cliente]" class="form-control" placeholder="Id cliente" value= "@if(isset($idClienteErroneo)){{$idClienteErroneo}} @else{{old('pagos[0][id_cliente]')}}@endif" required>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" name="pagos[0][id_equipo]" class="form-control" placeholder="Id equipo" value="@if(isset($idEquipoErroneo)){{$idEquipoErroneo}} @else{{old('pagos[0][id_equipo]')}}@endif" required>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" name="pagos[0][cantidad]" class="form-control" placeholder="Num. equipos" value="@if(isset($cantidadErronea)){{$cantidadErronea}} @else{{old('pagos[0][cantidad]')}}@endif" required>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-success" type="submit" formaction="/empleado/PrestamosPagosEquipos/validarDatos">
                                        Agregar
                                    </button>
                                </td>
                            </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
                @isset($errors)
                    @for ( $x=0; $x < count($errors); $x++)
                        <ul style="color: red">
                            <li>{{$errors[$x]}}</li>
                        </ul>
                    @endfor
                @endisset
                <h1 style="text-align: right"> <br> <br> Total: {{$total}}</h1>
                <input type="hidden" value="{{$total}}" name="total">
            </div>
        </form>
    </div>
</div>
