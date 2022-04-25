<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Control de clases</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listado de clases</h2>
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
                                                    <p style="text-align: center">Nombre</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Descripcion</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clases as $clase)
                                            <tr>
                                                <td align="center">
                                                    {{$clase->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$clase->descripcion}}
                                                </td>
                                                <td align="center">
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/clase/{{$clase->id}}">
                                                                <button type="submit"class="btn btn-round btn-info btn-sm">Detalle</button>
                                                            </form>
                                                        </tr>
                                                        @isset(Auth::user()->id_tipoUsuario)
                                                            @if(Auth::user()->id_tipoUsuario != 3)
                                                                <tr>
                                                                    <form action="/clase/{{$clase->id}}/edit" method="GET">
                                                                        <button type="submit" class="btn btn-round btn-warning btn-sm">Editar</button>
                                                                    </form>
                                                                </tr>
                                                                <tr>
                                                                    <form action="/clase/{{$clase->id}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"class="btn btn-round btn-danger btn-sm">Eliminar</button>
                                                                    </form>
                                                                </tr>
                                                            @endif
                                                        @endisset
                                                    </table>
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
