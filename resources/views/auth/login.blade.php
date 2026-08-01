<style>
    /* =========================================
       1. FUENTES Y GENERALES (Estilo SGA)
       ========================================= */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    * { box-sizing: border-box; }

    html, body {
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        font-size: 100%;
        height: 100%;
        margin: 0;
        background-color: #f8fafc;
    }

    .wrapper {
        display: grid;
        grid-template-columns: 480px 1fr;
        grid-template-rows: 100vh;
        grid-template-areas: "centerLeft centerRight";
        height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    a {
        text-decoration: none;
        color: #2a5298;
        font-weight: 500;
        transition: color 0.2s;
    }
    a:hover { color: #1e3c72; }

    /* =========================================
       2. COLUMNA IZQUIERDA (FORMULARIO)
       ========================================= */
    .login {
        grid-area: centerLeft;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: #ffffff;
        
        background-image: url('{{ asset("assets/img/Fondo_Formularios.jpg") }}'); 
        background-size: cover;
        background-blend-mode: overlay;
        background-color: rgba(255, 255, 255, 0.96);
        
        box-shadow: 5px 0 30px rgba(0,0,0,0.1);
        z-index: 10;
        position: relative;
    }

    .top-bar {
        background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
        display: flex;
        align-items: center;
        height: 80px;
        width: 100%;
        color: #fff;
        padding-left: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .top-bar img {
        height: 40px; /* Ajustado para tu logoal50.jpg */
        width: auto;
        margin-right: 1rem;
        display: block;
    }
    
    .top-bar span {
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 0.9rem;
        text-transform: uppercase;
    }

    .left-column-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        flex-grow: 1;
    }

    .left-column-wrapper form {
        padding: 2rem 4rem;
        margin-top: 1rem;
    }

    .left-column-wrapper form > h3 {
        text-align: left;
        font-size: 2rem;
        font-weight: 800;
        color: #1e3c72;
        margin-bottom: 2rem;
        letter-spacing: -1px;
    }

    /* INPUTS MODERNOS */
    .input-group {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        margin-bottom: 1.5rem;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
    }
    
    .input-group:focus-within {
        transform: translateY(-2px);
        border-color: #2a5298;
        box-shadow: 0 8px 20px rgba(42, 82, 152, 0.15);
    }

    .input-group-prepend {
        position: absolute;
        left: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }

    .input-group-text {
        background: transparent;
        border: none;
        padding: 0;
        color: #2a5298;
        display: flex;
        align-items: center;
    }
    
    .input-group-text svg {
        width: 1.2rem;
        height: 1.2rem;
    }

    .form-control {
        width: 100%;
        height: 50px;
        border: none;
        background: transparent;
        font-size: 1rem;
        color: #4b5563;
        padding: 0.5rem 1.5rem 0.5rem 3.5rem; 
        border-radius: 50px;
        outline: none;
    }
    
    ::placeholder { color: #a0aec0; opacity: 1; }

    /* BOTÓN INGRESAR */
    input[type="submit"] {
        display: block;
        width: auto;
        min-width: 160px;
        margin: 0;
        padding: 0.8rem 2rem;
        background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
        border: none;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: white;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 60, 114, 0.4);
        filter: brightness(1.1);
    }

    .forgot-remember {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
    }

    /* PIE DE PÁGINA LOGO */
    .footer-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 0;
        opacity: 0.8;
    }
    
    .logo-pronet img {
        max-height: 40px;
    }

    /* =========================================
       3. COLUMNA DERECHA (IMAGEN ELECTORAL CON OVERLAY SGA)
       ========================================= */
    .brands {
        grid-area: centerRight;
        position: relative;
        background-color: #e2e8f0;
        /* Apuntando a tu imagen original del sistema electoral */
        background-image: url('{{ asset("assets/img/img_login.jpg") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brands::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(30, 60, 114, 0.85) 0%, rgba(42, 82, 152, 0.7) 100%);
        z-index: 1;
    }

    /* =========================================
       4. RESPONSIVE
       ========================================= */
    @media (max-width: 1000px) {
        .wrapper {
            grid-template-columns: 1fr;
            grid-template-areas: "centerLeft";
        }
        .brands { display: none; }
        .login { width: 100%; }
        .left-column-wrapper form { padding: 2rem; }
    }
</style>

<script src="{{ asset('js/jquery.min.js') }}"></script>
@extends('dashboard.authBase')

@section('content')
    <div class="wrapper">
        <div class="sct login">
            <div class="left-column-wrapper">
                <div class="top-bar">
                    <!-- Tu logo del sistema electoral inyectado correctamente -->
                    <img src="{{ asset('assets/img/logoal50.jpg') }}" alt="Pronet">
                    <span>GESTION DE DATOS ELECTORALES</span>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>Iniciar Sesión</h3>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <svg class="c-icon"><use xlink:href="{{ asset('assets/icons/coreui/free-symbol-defs.svg#cui-user') }}"></use></svg>
                            </span>
                        </div>
                        <input type="text" name="usuario" value="{{ old('usuario') }}" id="usuario" class="form-control" placeholder="Usuario">
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <svg class="c-icon"><use xlink:href="{{ asset('assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked') }}"></use></svg>
                            </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Contraseña') }}" name="password" required>
                    </div>

                    <div class="forgot-remember">
                        <div class="forgot">
                            <button type="button" class="btn btn-link px-0" data-toggle="modal" data-target="#modalRecuperoPassword" style="color: #666; font-size: 0.9rem; background: none; border: none; cursor: pointer;">¿Olvidó su contraseña?</button>
                        </div> 
                        <input type="submit" name="send" value="INGRESAR">
                    </div>
                </form>
            </div>
            
            <div class="footer-wrapper">
                <a href="#" class="logo-pronet">
                    <!-- Tu logo footer inyectado correctamente -->
                    <img src="{{ asset('assets/img/logopronet.jpg') }}" alt="Pronet logo">
                </a>
            </div>
        </div> 

        <div class="sct brands">
            <!-- Capa derecha limpia, solo con el overlay degradado azul -->
        </div>
    </div> 
@endsection

@section('javascript')

@endsection