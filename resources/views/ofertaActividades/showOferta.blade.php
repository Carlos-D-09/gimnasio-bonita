<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de alumnos: </h3>
            </div>
            <div class="title_right">
                <div class="col-md-4 col-sm-4   form-group pull-right top_search" style="text-align: right;">
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
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
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
                                                    <p style="text-align: center">Lista de Alumnos</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($agendaData as $agenda)
                                                <td align="center">
                                                    {{$agenda->cliente->nombre}}
                                                </td>
                                                @endforeach
                                            </tr>   
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
