<div class="right_col" role="main">
    <div class="">
        <form id="formEdit" action="/empleado/cliente/{{$cliente->id}}" class="form-vertical form-label-left" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="page-title">
                <div class="title_left">
                    <h3> Edicion del perfil de cliente</h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/empleado/cliente/{{$cliente->id}}" style="color: white">
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
                            <h2>Datos personales</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3  profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img id="avatar" name="avatar" class="img-responsive avatar-view" src="{{asset($cliente->imagen)}}" height="100%" width="100%" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <br>
                                <div class="btn btn-primary btn-infor">
                                    <a href="/empleado/cliente/{{$cliente->id}}/edit/password" style="color: white">
                                        <i class="fa fa-edit m-right-xs"></i>
                                        Cambiar password
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="">
                                    <div class="x_content">
                                        <br>
                                        <div class="form-group row ">
                                            <input type="file" id="imagen" name="imagen">
                                            <label for="imagen" >
                                                <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                                                Selecciona Imagen
                                            </label>
                                            <style type="text/css">
                                                input#imagen{
                                                    display: none;
                                                }

                                                input#imagen + label{
                                                    background-color:rgb(252, 217, 172);
                                                    padding: 8px;
                                                    color: white;
                                                    border: 2px solid white;
                                                    border-radius: 9px;
                                                }

                                                input#imagen + label:hover{
                                                    background-color: rgba(197, 160, 112, 0.767);
                                                    border-color: black;
                                                    cursor: pointer;
                                                }
                                            </style>
                                            <script src="{{asset('/js/Cliente/formEditCliente.js')}}"></script>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="nombre">
                                                <i class="fa-solid fa-user fa-2x"></i>
                                                Nombre:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="nombre" class="form-control" style="display: inline" value="{{$cliente->nombre}}">
                                                @error('nombre')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="domicilio">
                                                <i class="fa-solid fa-location-dot fa-2x"></i>
                                                Domicilio:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="domicilio" class="form-control" style="display: inline" value="{{$cliente->domicilio}}">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="domicilio">
                                                <i class="fa-solid fa-heart fa-2x"></i>
                                                Fecha de nacimiento:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="fecha_nacimiento" class="form-control" style="display: inline" disabled value="{{$cliente->fecha_nacimiento}}">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="telefono">
                                                <i class="fa-solid fa-mobile fa-2x"></i>
                                                Teléfono:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="telefono" class="form-control" style="display: inline" value="{{$cliente->telefono}}">
                                                @error('telefono')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="correo">
                                                <i class="fa-solid fa-envelope fa-2x"></i>
                                                Correo:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="correo" class="form-control" style="display: inline" value="{{$cliente->correo}}">
                                                @error('correo')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="fecha_regitro">
                                                <i class="fa-solid fa-calendar fa-2x"></i>
                                                Fecha de registro:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="fecha_registro" class="form-control" style="display: inline;" disabled value="{{$cliente->fecha_registro}}">
                                            </div>
                                        </div>
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

