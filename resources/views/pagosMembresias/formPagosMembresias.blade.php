<div class="right_col" role="main">
    <div class="">
        <form id="formEdit" action="/empleado/PagosClases" class="form-vertical form-label-left" method="POST">
            @csrf
            <div class="page-title">
                <div class="title_left">
                    <h3> Registro de pago de una membresia </h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/empleado/pagosMembresia" style="color: white">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Cancelar
                            </a>
                        </div>
                        @if (@isset($pago->dias))
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
                    @isset($idCliente)
                        <table class="table table-striped table-bordered" style="width:50%">
                            <thead>
                                <th>
                                    <p style="text-align: center">Id de la membresia</p>
                                </th>
                                @isset($pago)
                                    <th>
                                        <p style="text-align: center">Nombre</p>
                                    </th>
                                    @if($pago->id != 1)
                                        <th>
                                            <p style="text-align: center">Duracion</p>
                                        </th>
                                        @else
                                        <th>
                                            <p style="text-align: center">Introduce los días</p>
                                        </th>
                                        @endif
                                    <th>
                                        <p style="text-align: center">Costo</p>
                                    </th>
                                @endisset
                                <th>
                                    <p style="text-align: center">Id del cliente</p>
                                </th>
                                @isset($pago)
                                    <th>
                                        <p style="text-align: center">Nombre del cliente</p>
                                    </th>
                                    @isset($pago->dias)
                                        <th>
                                            <p style="text-align: center">Quitar</p>
                                        </th>
                                    @else
                                        <th>
                                            <p style="text-align: center">Confirmar días</p>
                                        </th>
                                    @endisset
                                @else
                                    <th>
                                        <p style="text-align: center">Validar datos</p>
                                    </th>
                                @endif
                            </thead>
                            <tbody>
                                @isset($pago)
                                @else
                                    <tr style="text-align:center">
                                        <td>
                                            <input type="text" name="pago[id_membresia]" class="form-control" placeholder="Id oferta" value= "" required>
                                        </td>
                                        <td>
                                            <input type="text" name="pagos[id_cliente]" class="form-control" placeholder="Id cliente" value="" required>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="submit" formaction="/empleado/PagosMembresias/validarDatos">
                                                Validar
                                            </button>
                                        </td>
                                    </tr>
                                @endisset
                            </tbody>
                        </table>
                    @else

                    @endisset
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
