<div class="right_col" role="main">
    <div class="">
        <form action="/empleadoCRUD/{{$empleado->id}}/edit/password" class="form-vertical form-label-left" id="formEditPass" method="POST">
            @csrf
            @method('PATCH')
            <div class="page-title">
                <div class="title_left">
                    <h3> Restauracion de la contraseña de perfil de cliente</h3>
                </div>
                <div class="title_right" >
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="btn btn-primary btn-danger">
                            <a href="/empleadoCRUD/{{$empleado->id}}/edit" style="color: white">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Cancelar
                            </a>
                        </div>
                        <button type="submit" class="btn btn-success" form="formEditPass">
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
                            </div>
                            <h3>{{$empleado->nombre}}</h3>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="">
                                    <div class="x_content">
                                        <br>
                                        @if (isset(Auth::user()->id_empleado) && Auth::user()->id_empleado == 3)
                                            <div class="form-group row ">
                                                <label class="control-label col-md-3 col-sm-3" for="oldPassword">
                                                    <i class="fa-solid fa-key"></i>
                                                    Contraseña antigua:
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="password" name="oldPassword" class="form-control" style="display: inline;" value="{{old('oldPassword')}}">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="paswwordNew">
                                                <i class="fa-solid fa-key"></i>
                                                Nueva contraseña:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="password" name="passwordNew" placeholder="Nueva contraseña" class="form-control" style="display: inline;" value="{{old('passwordNew')}}">
                                                @error('passwordNew')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="control-label col-md-3 col-sm-3" for="re_passwordNew">
                                                <i class="fa-solid fa-key"></i>
                                                Confirmar nueva contraseña:
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="password" name="re_passwordNew" class="form-control" placeholder="Confirma contraseña" style="display: inline;" value="{{old('re_passwordNew')}}">
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
