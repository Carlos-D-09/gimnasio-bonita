<div class="right_col" role="main">
    <div class="">
        <form id="formEdit" action="{{ route('membresia.update', $membresia->id) }}" class="form-vertical form-label-left" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="page-title">
                <div class="title_left">
                    <h3> Modificación del costo por día</h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/membresia" style="color: white">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Cancelar
                            </a>
                        </div>
                        <button type="submit" class="btn btn-success" form="formEdit">
                            <i class="fa-solid fa-floppy-disk" style="color: white;"></i>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Datos de la membresia</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                                        <br>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3" style="text-align: right;" for="nombre">
                                                <i class="fa-solid fa-tag fa-2x"></i>
                                                Id de la membresia: 
                                            </label><br><br><br>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="number" name="id" class="form-control" style="display: inline" value="{{ $membresia->id }}" readonly>
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3" style="text-align: right;" for="nombre">
                                                <i class="fa-solid fa-user fa-2x"></i>
                                                Nombre:
                                            </label><br><br><br>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="Nombre" class="form-control" style="display: inline" value="{{ $membresia->Nombre }}" readonly>
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3" style="text-align: right;" for="nombre">
                                                <i class="fa-solid fa-calendar-o fa-2x"></i>
                                                Duracion(dias):
                                            </label><br><br><br>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="number" name="Duracion" class="form-control" style="display: inline" value="{{ $membresia->Duracion }}" readonly>
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3" style="text-align: right;" for="nombre">
                                                <i class="fa-solid fa-money fa-2x"></i>
                                                Costo por día:
                                            </label><br><br><br>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="number" name="costo" class="form-control" style="display: inline" value="{{ $membresia->costo }}">
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>