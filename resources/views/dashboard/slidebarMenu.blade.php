{{-- Slidebar para un empleado de tipo administrador --}}
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            {{-- Vista Gerente --}}
            @if(Auth::user()->id_tipoUsuario == 1)
                <h4> Gerente</h4>
                <li>
                    <a><i class="fa-solid fa-id-card-clip fa-xl"></i> Empleados<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleadoCRUD/create">Alta de empleados</a></li>
                        <li><a href="/empleadoCRUD">Consultar empleados</a></li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-wallet fa-xl"></i> Membresias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/"></a>Consultar membresias</li>
                        <li><a href="/"></a>Modificar costo por día</li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-users fa-xl"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/cliente">Consultar clientes</a></li>
                        <li><a href="/empleado/cliente/create">Alta de clientes</a></li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-book fa-xl"></i> Agenda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/oferta_actividades">Mostrar la oferta de actividades</a></li>
                        <li><a href="/empleado/oferta_actividades/create">Asignar horario y maestro a clase</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-chalkboard-user fa-xl"></i> Control de clases<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/clase">Mostrar clases</a></li>
                        <li><a href="/empleado/clase/create">Agregar una clase</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-baseball-bat-ball"></i></i> Equipos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/equipos">Consultar equipos</a></li>
                        <li><a href="/empleado/equipos/create">Registrar equipo</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-hand-holding-dollar"></i></i></i> Prestamos equipos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/historialPrestamo">Consultar prestamos</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-coins fa-xl"></i> Pagos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/seePagos">Consultar pagos membresias</a></li>
                        <li><a href="/seePagos">Consultar pagos equipos</a></li>
                        <li><a href="/seePagos">Consultar pagos clases</a></li>
                    </ul>
                </li>
                {{-- Vista encargado sucursal --}}
                @elseif(Auth::user()->id_tipoUsuario == 2)
                <h2> Encargado de sucursal </h2>
                <li><a><i class="fa-solid fa-wallet fa-xl"></i> Membresias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/"></a>Consultar membresias</li>
                        <li><a href="/"></a>Modificar costo por día</li>
                        <li><a href="/"></a>Modificar membresias</li>
                        <li><a href="/"></a>Eliminar membresias</li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-book fa-xl"></i> Agenda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/oferta_actividad">Mostrar la oferta de actividades</a></li>
                        <li><a href="/oferta_actividades/create">Asignar horario y maestro a clase</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-chalkboard-user fa-xl"></i> Control de clases<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/clase">Mostrar clases</a></li>
                        <li><a href="/empleado/clase/create">Agregar una clase</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-baseball-bat-ball"></i></i> Equipos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/equipos">Consultar equipos</a></li>
                        <li><a href="/empleado/equipos/create">Registrar equipo</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa-solid fa-coins fa-xl"></i> Pagos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/seePagos">Consultar pagos equipos</a></li>
                        <li><a href="/seePagos">Consultar pagos clases</a></li>
                    </ul>
                </li>
            {{-- Vista maestro --}}
            @elseif(Auth::user()->id_tipoUsuario == 3)
                <h2>Maestro</h2>
                <li>
                    <a><i class="fa-solid fa-chalkboard-user fa-xl"></i> Clases<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/clase">Mostrar clases</a></li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-book fa-xl"></i> Agenda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/oferta_actividades"></a>Mostrar la oferta de actividades</li>
                    </ul>
                </li>
            @endif
    </div>

</div>
