<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Perfil de cliente</h3>
            </div>
            <div class="title_right" >
                <div class="col-md-4 col-sm-4   form-group pull-right top_search">
                    <div class="btn btn-primary btn-info">
                        <a href="/empleado/cliente" style="color: white">
                            <i class="fa-solid fa-arrow-left"></i>
                            Volver
                        </a>
                    </div>
                    <div class="btn btn-primary btn-warning">
                        <a href="/empleado/cliente/{{$cliente->id}}/edit" style="color: white">
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
                                    <img class="img-responsive avatar-view" src="{{asset($cliente->imagen)}}" height="100%" width="100%" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{$cliente->nombre}}</h3>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="">
                                <br><br>
                                <ul class="list-unstyled user_data">
                                    <li><i class="fa-solid fa-location-dot fa-2x"></i> <h2 style="display:inline;"> &nbsp;&nbsp; <b>Dirección:</b></h2> <h2 style="display: inline;">&nbsp;{{$cliente->domicilio}}</h2></li><br>
                                    <li><i class="fa-solid fa-heart fa-2x"></i> <h2 style="display:inline;">&nbsp; <b>Fecha de nacimiento:</b></h2><h2 style="display: inline;">&nbsp;{{$cliente->fecha_nacimiento}}</h2></li><br>
                                    <li><i class="fa-solid fa-mobile fa-2x"></i> <h2 style="display:inline;">&nbsp;&nbsp; <b>Teléfono:</b></h2><h2 style="display: inline;">&nbsp;{{$cliente->telefono}}</h2></li><br>
                                    <li><i class="fa-solid fa-envelope fa-2x"></i> <h2 style="display:inline;">&nbsp; <b>Correo:</b> </h2> <h2 style="display: inline;">&nbsp;{{$cliente->correo}}</h2></li><br>
                                    <li><i class="fa-solid fa-calendar fa-2x"></i><h2 style="display:inline;">&nbsp;&nbsp; <b>Fecha de registro:</b></h2><h2 style="display: inline;">&nbsp;{{$cliente->fecha_registro}}</h2></li><br>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
