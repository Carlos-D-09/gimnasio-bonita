<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alumnos que asistiran a la clase</h3>
            </div>
            <div class="title_right">
                <div class="col-md-2 col-sm-2   form-group pull-right top_search">
                    <div class="btn btn-primary btn-info">
                        <a href="/empleado/oferta_actividades" style="color: white">
                            <i class="fa-solid fa-arrow-left"></i>
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x-panel">
                    <div class="x_title">
                            <div style="display:inline-flex;width: 100%">
                                <h2>
                                    Listado de alumnos:
                                </h2>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group row">
                            @isset($alumnos)
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <p style="text-align: center">Id del alumno</p>
                                                    </th>
                                                    <th>
                                                        <p style="text-align: center">Nombre</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($alumnos as $alumno)
                                                    <tr>
                                                        <td align="center">
                                                            {{$alumno['id_cliente']}}
                                                        </td>
                                                        <td align="center">
                                                            {{$alumno['nombreAlumno']}}
                                                        </td>
                                                    </tr>
                                                @endforeach
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
