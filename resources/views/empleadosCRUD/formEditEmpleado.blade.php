<div class="right_col" role="main">
    <div class="">
        <form id="formEdit" action="/empleadoCRUD/{{ $empleado->id }}" class="form-vertical form-label-left" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="page-title">
                <div class="title_left">
                    <h3> Edicion del perfil de empleado</h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/empleadoCRUD/{{$empleado->id}}" style="color: white">
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
                                        <img id="avatar" name="avatar" class="img-responsive avatar-view" src="{{asset($empleado->imagen)}}" height="100%" width="100%" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <br>
                                <div class="btn btn-primary btn-infor">
                                    <a href="/empleadoCRUD/{{$empleado->id}}/edit/password" style="color: white">
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
                                            <style>
                                                .danger {
                                                    color: red;
                                                    font-size: 13px;
                                                }
                                            </style>
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
                                            <h2>Id: {{$empleado->id}}</h2>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="nombre">
                                                <i class="fa-solid fa-user fa-2x"></i>
                                                Nombre:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="nombre" class="form-control" style="display: inline" value="{{$empleado->nombre}}">
                                                @error('nombre')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="domicilio">
                                                <i class="fa-solid fa-location-dot fa-2x"></i>
                                                Domicilio:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="domicilio" class="form-control" style="display: inline" value="{{$empleado->domicilio}}">
                                                @error('domicilio')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="domicilio">
                                                <i class="fa-solid fa-heart fa-2x"></i>
                                                Fecha de nacimiento:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="date" name="fecha_nacimiento" class="form-control" style="display: inline"  value="{{$empleado->fecha_nacimiento}}">
                                                @error('fecha_nacimiento')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="telefono">
                                                <i class="fa-solid fa-mobile fa-2x"></i>
                                                Teléfono:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="telefono" class="form-control" style="display: inline" value="{{$empleado->telefono}}">
                                                @error('telefono')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="correo">
                                                <i class="fa-solid fa-envelope fa-2x"></i>
                                                Correo:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="correo" class="form-control" style="display: inline" value="{{$empleado->correo}}">
                                                @error('correo')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="fecha_regitro">
                                                <i class="fa-solid fa-calendar fa-2x"></i>
                                                Fecha de registro:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="date" name="fecha_ingreso" class="form-control" style="display: inline;" value="{{$empleado->fecha_ingreso}}" readonly>
                                                @error('fecha_ingreso')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="fecha_regitro">
                                                <i class="fa-solid fa-sack-dollar fa-2x"></i>
                                                Sueldo:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="sueldo" class="form-control" style="display: inline;" value="{{$empleado->sueldo}}">
                                                @error('sueldo')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="fecha_regitro">
                                                <i class="fa-solid fa-book-medical fa-2x"></i>
                                                NSS:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="NSS" class="form-control" style="display: inline;" value="{{$empleado->NSS}}">
                                                @error('NSS')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="fecha_regitro">
                                                <i class="fa-solid fa-barcode fa-2x"></i>
                                                RFC:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" name="RFC" class="form-control" style="display: inline;" value="{{$empleado->RFC}}">
                                                @error('RFC')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        @if(isset(Auth::user()->id_tipoUsuario) and Auth::user()->id_tipoUsuario == 1)
                                        <div class="form-group row ">
                                            <div class="cargo-details" style="display: inline">
                                                <input type="radio" name="id_tipoUsuario" id="dot-1" value=1 {{($empleado->id_tipoUsuario == 1 ? ' checked' : '')}}>
                                                <input type="radio" name="id_tipoUsuario" id="dot-2" value=2 {{($empleado->id_tipoUsuario == 2 ? ' checked' : '')}}>
                                                <input type="radio" name="id_tipoUsuario" id="dot-3" value=3 {{($empleado->id_tipoUsuario == 3 ? ' checked' : '')}}>
                                                <i class="fa-solid fa-user-group fa-2x"></i>
                                                <span class="cargo-title">Rol:</span>
                                                <div class="category">
                                                  <label for="dot-1">
                                                  <span class="dot one"></span>
                                                  <span class="cargo">Gerente</span> &nbsp; &nbsp;
                                                </label>
                                                  <label for="dot-2">
                                                  <span class="dot two"></span>
                                                  <span class="cargo">Encargado de sucursal</span>&nbsp; &nbsp;
                                                </label>
                                                  <label for="dot-3">
                                                  <span class="dot three"></span>
                                                  <span class="cargo">Maestro</span>
                                                  </label>
                                                </div>
                                                @error('id_tipoUsuario')
                                                <br>
                                                <small class="danger">*{{ $message }}</small>
                                                <br>
                                                @enderror
                                              </div>
                                        </div>
                                        @endif
                                        <style>
                                            form .cargo-details .cargo-title{
                                                font-size: 20px;
                                                font-weight: 500;
                                            }
                                            form .category{
                                                display: flex;
                                                width: 80%;
                                                margin: 14px 0 ;
                                                justify-content: space-between;
                                            }
                                            form .category label{
                                                display: flex;
                                                align-items: center;
                                                cursor: pointer;
                                            }
                                             form .category label .dot{
                                                height: 18px;
                                                width: 18px;
                                                border-radius: 50%;
                                                margin-right: 10px;
                                                background: #d9d9d9;
                                                border: 5px solid transparent;
                                                transition: all 0.3s ease;
                                            }
                                            #dot-1:checked ~ .category label .one,
                                            #dot-2:checked ~ .category label .two,
                                            #dot-3:checked ~ .category label .three{
                                                background: #9b59b6;
                                                border-color: #d9d9d9;
                                            }
                                            form input[type="radio"]{
                                                display: none; /**/
                                                }
                                        </style>
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
