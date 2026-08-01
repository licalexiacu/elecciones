<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="118" height="46" alt="SGT Logo">
    <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="118" height="46" alt="SGT Logo">
</div>
@if(Auth::check()) 
    <ul class="c-sidebar-nav">
        <li @click="menu=0" class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>Escritorio
            </a>
        </li>
        
        <li class="c-sidebar-nav-title">Padron</li>
        <li @click="menu=1" class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link">
                <i class="cil-people c-sidebar-nav-icon"></i>Padron
            </a>
        </li>
        @if (Auth::user()->id_rol == 1 ||  Auth::user()->id_rol == 2)
            <li @click="menu=5" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <i class="cil-pen-alt c-sidebar-nav-icon"></i>Punteo
                </a>
            </li>
        @endif 

        @if (Auth::user()->id_rol == 1 ||  Auth::user()->id_rol == 3)
            <li @click="menu=6" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <i class="cil-restaurant c-sidebar-nav-icon"></i>Comida
                </a>
            </li>
        @endif

        @if (Auth::user()->id_rol == 1 ||  Auth::user()->id_rol == 6)
            @if (Auth::user()->id_rol == 1)
                <li @click="menu=10" class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link">
                        <i class="cil-drop c-sidebar-nav-icon"></i>Combustible
                    </a>
                </li>
            @endif

            <li @click="menu=11" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <i class="cil-truck c-sidebar-nav-icon"></i>Combustible Carga
                </a>
            </li>
        @endif

        @if (Auth::user()->id_rol == 1)
            <li @click="menu=7" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <i class="cil-sort-numeric-up c-sidebar-nav-icon"></i>Conteo
                </a>
            </li>
        @endif

        @if (Auth::user()->id_rol == 4)
            <li @click="menu=9" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <i class="cil-sort-numeric-up c-sidebar-nav-icon"></i>Conteo
                </a>
            </li>
        @endif

        @if (Auth::user()->id_rol == 1)
            <li @click="menu=8" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <i class="cil-chart-pie c-sidebar-nav-icon"></i>Graficos
                </a>
            </li>
        @endif

        <li class="c-sidebar-nav-title">ACCESOS</li>
        @if (Auth::user()->id_rol == 1)
            <li @click="menu=2" class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link">
                    <span class="cil-user c-sidebar-nav-icon"></span>Usuarios
                </a>
            </li>
        @endif 
        <li @click="menu=3" class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link">
                <span class="cil-fingerprint c-sidebar-nav-icon"></span>Password
            </a>
        </li>
    </ul>
@endif 
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>