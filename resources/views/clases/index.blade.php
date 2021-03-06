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
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center" style="text-align: center;">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('edited'))
                            <div class="alert alert-warning text-center" style="text-align: center;">
                                {{ session()->get('edited') }}
                            </div>
                        @endif

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                {{ session()->get('deleted') }}
                            </div>
                        @endif

                        @if(session()->has('data'))
                            <div style="text-align: center;">
                                {{ session()->get('data') }}
                            </div><br><br>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <p style="text-align: center">Id clase</p>
                                                </th>
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
                                                    {{$clase->id}}
                                                </td>
                                                <td align="center">
                                                    {{$clase->nombre}}
                                                </td>
                                                <td align="center">
                                                    {{$clase->descripcion}}
                                                </td>
                                                <td align="center">
                                                    <table style="align-content: center">
                                                        <tr>
                                                            <form action="/empleado/clase/{{$clase->id}}">
                                                                <button type="submit"class="btn btn-round btn-info btn-sm">Detalle</button>
                                                            </form>
                                                        </tr>
                                                        @isset(Auth::user()->id_tipoUsuario)
                                                            @if(Auth::user()->id_tipoUsuario != 3)
                                                                <tr>
                                                                    <form action="/empleado/clase/{{$clase->id}}/edit" method="GET">
                                                                        <button type="submit" class="btn btn-round btn-warning btn-sm">Editar</button>
                                                                    </form>
                                                                </tr>
                                                                <tr>
                                                                    <form action="/empleado/clase/{{$clase->id}}" method="POST">
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
                                <div class="btn btn-primary btn-warning" style="width: 100%;">
                                    <a href="/clasesJson" style="color: white">
                                        <i class="fa fa-edit m-right-xs"></i>
                                         Hacer una consulta de las clases en formato json
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
