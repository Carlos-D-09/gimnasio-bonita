<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Membresias registradas</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                    <form action="" method="">
                        <div class="input-group">
                            <input type="search" class="form-control inputPatron" placeholder="Buscar por id" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary buttonPatron" type="submit" style="color: white">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listado de membresias</h2>
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
                                                    <p style="text-align: center">Id</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Nombre</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Duracion</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Costo</p>
                                                </th>
                                                <th>
                                                    <p style="text-align: center">Opciones</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($membresias as $membresia)
                                                <tr style="text-align:center">
                                                <td>{{ $membresia->id }}</td>
                                                <td>{{ $membresia->Nombre }}</td>
                                                <td>{{ $membresia->Duracion }}</td>
                                                <td>{{ $membresia->costo }}</td>
                                                <td>
                                                    <form action="/membresia/{{ $membresia->id }}/delete">
                                                        @csrf
                                                        <button type="submit"class="btn btn-round btn-danger btn-sm">Eliminar membresia</button>
                                                    </form>
                                                    <form action="/membresia/{{ $membresia->id }}/edit" method="GET">
                                                        <button type="submit" class="btn btn-round btn-warning btn-sm">Modificar costo por día</button>
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
            </div>
        </div>
    </div>
</div>
