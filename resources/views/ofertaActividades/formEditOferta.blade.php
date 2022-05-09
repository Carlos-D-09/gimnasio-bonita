<!DOCTYPE html>
    <html style="font-size: 16px;">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="page_type" content="np-template-header-footer-from-plugin">
        <title>Oferta actividades</title>
        <link rel="stylesheet" href="{{asset('/css/ofertaActividades/form/Home.css')}}" media="screen">
        <link rel="stylesheet" href="{{asset('/css/ofertaActividades/form/nicepage.css')}}" media="screen">
        <meta name="generator" content="Nicepage 4.8.2, nicepage.com">
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="Home">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
    </head>
    <body data-home-page="Home.html" data-home-page-title="Home.html" class="u-body u-xl-mode">
        <section class="u-align-center u-clearfix u-section-1" id="sec-5c09" data-image-width="450" data-image-height="301">
            <div class="u-clearfix u-sheet u-sheet-1">
                <br>
                <img src="{{asset('/images/ofertaActividades/Form/logoForm.png')}}" width="230px" height="200px" alt="">
                <h2 style="color: white"class="u-text u-text-1">Editar oferta de actividad</h2>
                <div class="u-form u-palette-2-base u-radius-10 u-form-1">
                    <form action="/empleado/oferta_actividades/{{$oferta->id}}" method="POST" class="u-clearfix u-form-spacing-30 u-form-vertical u-inner-form" style="padding: 50px;" >
                        @csrf
                        @method('PATCH')
                        <div class="u-form-group u-form-select u-form-group-1">
                            <div class="u-form-select-wrapper">
                                <p> <b> Id de la oferta de actividad: {{$oferta->id}} </b> </p>
                            </div>
                        </div>
                        <div class="u-form-group u-form-select u-form-group-1">
                            <label for="id_clase" class="u-label u-text-body-alt-color u-label-1">Clase</label>
                            <div class="u-form-select-wrapper">
                                <select id="id_clase" name="id_clase" style="color: black" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" disabled>
                                    @foreach ($clases as $clase)
                                        <option value="{{$clase->id}}" {{$oferta->id_clase == $clase->id ? 'selected' : ''}}>{{$clase->nombre}}</option>
                                    @endforeach
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                            </div>
                        </div>
                        <div class="u-form-group u-form-select u-form-group-2">
                            <label for="horaInicio" class="u-label u-text-body-alt-color u-label-2">Hora Inicio</label>
                            <div class="u-form-select-wrapper">
                                <select id="horaInicio" style="color: black" name="horaInicio" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle">
                                    @for ($x=7; $x <= 23; $x++)
                                        <option value="{{$x . ':00'}}" {{strtotime($oferta->horaInicio) == strtotime($x . ':00') ? 'selected': ''}}>{{$x . ':00'}}</option>
                                    @endfor
                                </select>
                                @error('horaInicio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                            </div>
                        </div>
                        <div class="u-form-group u-form-select u-form-group-3">
                            <label for="horaFin" class="u-label u-text-body-alt-color u-label-3">Hora Fin</label>
                            <div class="u-form-select-wrapper">
                                <select id="horaFin" name="horaFin" style="color: black" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle">
                                    @for ($x=7; $x <= 23; $x++)
                                        <option value="{{$x . ':00'}}" {{strtotime($oferta->horaFin) == strtotime($x . ':00') ? 'selected' : ''}}>{{$x . ':00'}}</option>
                                    @endfor
                                </select>
                                @error('horaFin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                            </div>
                        </div>
                        <div class="u-form-group u-form-select u-form-group-3">
                            <label for="dia" class="u-label u-text-body-alt-color u-label-3">Dia</label>
                            <div class="u-form-select-wrapper">
                                <select id="dia" name="dia" style="color: black" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle">
                                    <option value="lunes" {{$oferta->dia == 'lunes' ? 'selected' : ''}}> Lunes </option>
                                    <option value="martes" {{$oferta->dia == 'martes' ? 'selected' : ''}}> Martes </option>
                                    <option value="miercoles" {{$oferta->dia == 'miercoles' ? 'selected' : ''}}> Miercoles </option>
                                    <option value="jueves" {{$oferta->dia == 'jueves' ? 'selected' : ''}}> Jueves </option>
                                    <option value="viernes" {{$oferta->dia == 'viernes' ? 'selected' : ''}}> Viernes </option>
                                    <option value="sabado" {{$oferta->dia == 'sabado' ? 'selected' : ''}}> Sabado </option>
                                </select>
                                @error('dia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                            </div>
                        </div>
                        <div class="u-form-group u-form-group-4">
                            <label for="cupos" class="u-label u-text-body-alt-color u-label-4">Cupos</label>
                            <input type="text" placeholder="Introduce cupos" id="cupos" name="cupos" style="color: black" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" value = "{{$oferta->cupos}}">
                            @error('cupos')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="u-form-group u-form-select u-form-group-5">
                            <label for="id_maestro" class="u-label u-text-body-alt-color u-label-5">Selecciona maestro</label>
                            <div class="u-form-select-wrapper">
                                <select id="id_maestro" name="id_maestro" style="color: black"class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle">
                                    @foreach ($maestros as $maestro)
                                        <option value="{{$maestro->id}}" {{$oferta->id_empleado == $maestro->id ? 'selected' : ''}}>{{$maestro->nombre}}</option>
                                    @endforeach
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                            </div>
                            @error('id_maestro')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class = "u-align-right u-form u-form-submit u-form-group-6 ">
                            <button type="submit" class="u-align-center u-active-palette-2-light-2 u-border-none u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-2-light-2 u-radius-8 u-text-palette-2-base u-white u-btn-1" style="width: 45%">Editar</button>
                            <a href="/empleado/oferta_actividades" class="u-align-center u-active-palette-2-light-2 u-border-none u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-2-light-2 u-radius-8 u-text-palette-2-base u-white u-btn-1" style="width: 45%">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
            <span>Website Templates</span>
        </a>
        <p class="u-text">
            <span>created with</span>
        </p>
        <span>Website Builder Software</span>
        </section>
    </body>
</html>
