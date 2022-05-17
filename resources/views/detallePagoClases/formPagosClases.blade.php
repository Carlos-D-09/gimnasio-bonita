<div class="right_col" role="main">
    <div class="">
        <form id="formEdit" action="/empleado/PagosClases" class="form-vertical form-label-left" method="POST">
            @csrf
            <div class="page-title">
                <div class="title_left">
                    <h3> Registro de pago de una clase </h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/empleado/PagosClases" style="color: white">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Cancelar
                            </a>
                        </div>
                        @if (@isset($informacion))
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
                            <th>
                                <p style="text-align: center">Id del cliente</p>
                            </th>
                            <th>
                                <p style="text-align: center">Nombre del cliente</p>
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
                                            {{$pago['id_oferta']}}
                                            <input type="hidden" name="pagos[{{$count}}][id_oferta]" value="{{$pago['id_oferta']}}">
                                        </td>
                                        <td>{{$pago['clase']}}</td>
                                        <td>{{$pago['dia']}}</td>
                                        <td>{{$pago['horaInicio'] . ' a ' . $pago['horaFin']}}</td>
                                        <td>{{$pago['costo']}}</td>
                                        <td>
                                            {{$pago['id_cliente']}}
                                            <input type="hidden" name="pagos[{{$count}}][id_cliente]" value="{{$pago['id_cliente']}}">
                                        </td>
                                        <td>{{$pago['cliente']}}</td>
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
                                        {{$siguienteId}}
                                    </td>
                                    <td>
                                        <input type="text" name="pagos[{{$count}}][id_oferta]" class="form-control" placeholder="Id oferta" value= "@if(isset($idOfertaErroneo)){{$idOfertaErroneo}} @else @endif" >
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {{$idCliente}}
                                        <input type="hidden" name="pagos[{{$count}}][id_cliente]" class="form-control" value="{{$idCliente}}" >
                                    </td>
                                    <td>
                                        {{$nombreCliente}}
                                    </td>
                                    <td>
                                        <button class="btn btn-success" type="submit" formaction="/empleado/PagosClases/validarDatos" formmethod="POST">
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
                                    <input type="text" name="pagos[0][id_oferta]" class="form-control" placeholder="Id oferta" value= "@if(isset($idOfertaErroneo)){{$idOfertaErroneo}} @else{{old('pagos[0][id_oferta]')}}@endif" required>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" name="pagos[0][id_cliente]" class="form-control" placeholder="Id cliente" value="@if(isset($idClienteErroneo)){{$idClienteErroneo}} @else{{old('pagos[0][id_oferta]')}}@endif" required>
                                </td>
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
