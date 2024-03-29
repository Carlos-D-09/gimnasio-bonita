{{-- Slidebar para un empleado de tipo administrador --}}
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            {{-- Vista Gerente --}}
            @if(Auth::user()->id_tipoUsuario == 1)
                <h3>Cargo: Gerente</h3> <br><br>
                <li>
                    <a><i class="fa-solid fa-id-card-clip fa-xl"></i> Empleados<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleadoCRUD/create">Alta de empleados</a></li>
                        <li><a href="/empleadoCRUD">Consultar empleados</a></li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-wallet fa-xl"></i> Membresias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/membresia/create">Registrar una membresia</a></li>
                        <li><a href="/membresia">Consultar membresias</a></li>
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
                    <a><i class="fa-solid fa-coins fa-xl"></i> Pagos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/pagosMembresias">Consultar pagos membresias</a></li>
                        <li><a href="/empleado/pagosMembresias/create">Registrar pago membresia</a></li>
                        <li><a href="/empleado/PrestamosPagosEquipos">Consultar pagos prestamos equipos</a></li>
                        <li><a href="/empleado/PrestamosPagosEquipos/create">Registrar pago prestamos de equipo</a></li>
                        <li><a href="/empleado/PagosClases">Consultar pagos clases</a></li>
                        <li><a href="/empleado/PagosClases/create">Registrar pago clase</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-laptop"></i> Soporte técnico<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/email">Enviar email</a></li>
                    </ul>
                </li>
            {{-- Vista encargado sucursal --}}
            @elseif(Auth::user()->id_tipoUsuario == 2)
                <h3>Cargo: Encargado de sucursal </h3> <br><br>
                <li><a><i class="fa-solid fa-wallet fa-xl"></i> Membresias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/membresia/create">Registrar una membresia</a></li>
                        <li><a href="/membresia">Consultar membresias</a></li>
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
                    <a><i class="fa-solid fa-coins fa-xl"></i> Pagos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/pagosMembresias">Consultar pagos membresias</a></li>
                        <li><a href="/empleado/pagosMembresias/create">Registrar pago membresia</a></li>
                        <li><a href="/empleado/PrestamosPagosEquipos">Consultar pagos prestamos equipos</a></li>
                        <li><a href="/empleado/PrestamosPagosEquipos/create">Registrar pago prestamos de equipo</a></li>
                        <li><a href="/empleado/PagosClases">Consultar pagos clases</a></li>
                        <li><a href="/empleado/PagosClases/create">Registrar pago clase</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-laptop"></i> Soporte técnico<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/email">Enviar email</a></li>
                    </ul>
                </li>
            {{-- Vista maestro --}}
            @elseif(Auth::user()->id_tipoUsuario == 3)
                <h3>Cargo: Maestro</h3>  <br><br>
                <li>
                    <a><i class="fa-solid fa-chalkboard-user fa-xl"></i> Clases<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/clase">Mostrar clases</a></li>
                    </ul>
                </li>
                <li><a><i class="fa-solid fa-book fa-xl"></i> Agenda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/empleado/oferta_actividades">Mostrar tus clases</a></li>
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-laptop"></i> Soporte técnico<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/email">Enviar email</a></li>
                    </ul>
                </li>
            @else
                <h3>Cliente</h3> <br><br>
                <li>
                    <a><i class="fa-solid fa-chalkboard-user fa-xl"></i> Clases<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/cliente/clases">Clases</a></li>
                        <li><a href="/cliente/oferta_actividades">Consultar oferta de actividades</a></li>
                        {{-- <li><a href="">Registrarme a clases (proximamente)</a></li> --}}
                        <li><a href="/cliente/clases/misClases">Ver mis clases</a></li>
                    </ul>
                </li>
            @endif

        </div>
</div>
