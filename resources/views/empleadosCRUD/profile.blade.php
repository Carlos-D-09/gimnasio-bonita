<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Perfil de empleado</h3>
            </div>
            <div class="title_right" >
                <div class="col-md-4 col-sm-4   form-group pull-right top_search">
                    <div class="btn btn-primary btn-info">
                    @if(isset(Auth::user()->id_tipoUsuario) and Auth::user()->id_tipoUsuario == 1)
                        <a href="/empleadoCRUD" style="color: white">
                            <i class="fa-solid fa-arrow-left"></i>
                            Volver
                        </a>
                    @else
                        <a href="/empleado/clase" style="color: white">
                            <i class="fa-solid fa-arrow-left"></i>
                            Volver
                        </a>
                    @endif
                    </div>
                    <div class="btn btn-primary btn-warning">
                        <a href="/empleadoCRUD/{{ $empleado->id }}/edit" style="color: white">
                            <i class="fa fa-edit m-right-xs"></i>
                            Editar
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
                        @if(session()->has('edited'))
                        <div class="alert alert-warning text-center" style="text-align: center;">
                            {{ session()->get('edited') }}
                        </div>
                        @endif
                        <h2>Datos personales</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{asset($empleado->imagen)}}" height="100%" width="100%" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{$empleado->nombre}}</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="">
                                <br><br>
                                <ul class="list-unstyled user_data">
                                    <li><i class="fa-solid fa-bookmark-o fa-2x"></i> <h2 style="display:inline;"> &nbsp;&nbsp;&nbsp; <b>ID:</b></h2> <h2 style="display: inline;">&nbsp;{{$empleado->id}}</h2></li><br>
                                    <li><i class="fa-solid fa-barcode fa-2x"></i> <h2 style="display:inline;"> &nbsp;&nbsp; <b>RFC:</b></h2> <h2 style="display: inline;">&nbsp;{{$empleado->RFC}}</h2></li><br>
                                    <li><i class="fa-solid fa-location-dot fa-2x"></i> <h2 style="display:inline;"> &nbsp;&nbsp;&nbsp; <b>Dirección:</b></h2> <h2 style="display: inline;">&nbsp;{{$empleado->domicilio}}</h2></li><br>
                                    <li><i class="fa-solid fa-heart fa-2x"></i> <h2 style="display:inline;">&nbsp;&nbsp; <b>Fecha de nacimiento:</b></h2><h2 style="display: inline;">&nbsp;{{$empleado->fecha_nacimiento}}</h2></li><br>
                                    <li><i class="fa-solid fa-mobile fa-2x"></i> <h2 style="display:inline;">&nbsp;&nbsp;&nbsp; <b>Teléfono:</b></h2><h2 style="display: inline;">&nbsp;{{$empleado->telefono}}</h2></li><br>
                                    <li><i class="fa-solid fa-envelope fa-2x"></i> <h2 style="display:inline;">&nbsp;&nbsp; <b>Correo:</b> </h2> <h2 style="display: inline;">&nbsp;{{$empleado->correo}}</h2></li><br>
                                    <li><i class="fa-solid fa-calendar fa-2x"></i><h2 style="display:inline;">&nbsp;&nbsp;&nbsp;&nbsp; <b>Fecha de registro:</b></h2><h2 style="display: inline;">&nbsp;{{$empleado->fecha_ingreso}}</h2></li><br>
                                    <li><i class="fa-solid fa-book-medical fa-2x"></i><h2 style="display:inline;">&nbsp;&nbsp;&nbsp; <b>NSS:</b></h2><h2 style="display: inline;">&nbsp;{{$empleado->NSS}}</h2></li><br>
                                    <li><i class="fa-solid fa-group fa-2x"></i><h2 style="display:inline;">&nbsp;&nbsp;&nbsp; <b>Tipo de usuario:</b></h2><h2 style="display: inline;">&nbsp;@if ($empleado->id_tipoUsuario == 1) Gerente @elseif ($empleado->id_tipoUsuario == 2) Encargado de sucursal @else Maestro @endif</h2></li><br>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
