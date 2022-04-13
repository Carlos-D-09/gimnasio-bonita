<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="clases">
                <div class="clases-header">
                    <h3 class="card-title">Listado de Clases</h3> <br>
                        <a href="/clase/create"> Crear clase</a>
                </div>
                <!-- /.card-header -->
                <div class="clases-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clases as $clase)
                                <tr>
                                    <td> {{$clase->nombre}} </td>
                                    <td> {{$clase->descripcion}} </td>
                                    <td>
                                        <a href="/clase/{{ $clase->id }}">Ver detalles</a> <br>
                                        <a href="/clase/{{ $clase->id }}/edit">Editar</a> <br>
                                        <form action="/clase/{{ $clase->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button>eliminar</button>
                                        </form>
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
