<template>
    <main class="c-main" style="grid-area: centerRight; position: relative; overflow: hidden;">
        
        <div class="escritorio-moderno">
            <div class="contenido-centro">
                <h1 class="logo-sgt">SGDE</h1>
                <div class="separador"></div>
                <p class="subtitulo">SISTEMA DE GESTION DE DATOS ELECTORALES</p>
            </div>

            <div class="marca-empresa">
                <span class="pronet-texto">PROnet</span>
                <span class="pronet-bajada">soluciones informáticas</span>
            </div>
        </div>
        
    </main>
</template>
<script>
    export default {
        components: {
        },
        props : ['ruta'],
        data (){
            return {
            }
        },
        methods : {
        },
        mounted() {
            // Escuchamos el teclado cuando se monta el escritorio
            window.addEventListener('keydown', this.atajosTeclado);
        },
        beforeDestroy() {
            // Limpiamos el evento al salir para no arrastrar bugs
            window.removeEventListener('keydown', this.atajosTeclado);
        }
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    /* =========================================
       1. FONDO Y MODAL
       ========================================= */
    .mostrar {
        display: list-item !important;
        top: 0;
        z-index: 9999;
        overflow-y: scroll;
        opacity: 1 !important;
        position: fixed !important;
        background-color: rgba(30, 30, 40, 0.6) !important; 
        backdrop-filter: blur(4px);
    }

    .modal-content {
        width: 100% !important;
        position: absolute !important;
        border-radius: 8px !important;
        border: none !important;
        /* Sombra profunda */
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3) !important; 

        /* --- AQUÍ ESTÁ EL FONDO --- */
        /* Combinamos una capa blanca al 95% de opacidad sobre tu imagen */
        background: url('/sga/public/assets/img/Fondo_Formularios.jpg') !important;
        background-color: #ffffff !important; /* Color base por si la imagen tarda */
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
    }

    /* CABECERA DEL MODAL (Degradado Azul) */
    .modal-header {
        background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%) !important;
        color: white !important;
        text-align: center !important;
        border-top-left-radius: 8px !important;
        border-top-right-radius: 8px !important;
        border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        padding: 1rem 1rem !important;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    
    .modal-header .modal-title {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 1.1rem;
    }
    
    .modal-header .close {
        color: white !important;
        opacity: 0.8;
        text-shadow: none;
    }
    .modal-header .close:hover { opacity: 1; }


    /* =========================================
       2. GRILLAS / TABLAS
       ========================================= */
    .table {
        width: 100%;
        background-color: white !important;
        border-collapse: separate !important; 
        border-spacing: 0 !important; 
        margin-bottom: 0;
    }

    /* ENCABEZADO DE TABLA (Degradado Azul) */
    .table thead tr th {
        background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%) !important;
        color: white !important;
        text-align: center !important;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 600;
        padding: 15px 10px !important;
        border: none !important;
        position: sticky;
        top: 0;
        z-index: 10;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    /* CUERPO DE TABLA */
    .table tbody {
        text-align: center;
        color: #4b5563;
    }

    .table tbody td {
        vertical-align: middle !important;
        padding: 12px 10px !important;
        border-bottom: 1px solid #eaecf0 !important;
        border-top: none !important;
        font-size: 0.9rem;
        background-color: white !important;
    }

    /* HOVER */
    .table-hover tbody tr:hover td {
        background-color: #f8fafc !important;
        transition: background-color 0.2s ease;
    }

    /* BORDES REDONDEADOS TABLA */
    .table thead tr:first-child th:first-child { border-top-left-radius: 8px !important; }
    .table thead tr:first-child th:last-child { border-top-right-radius: 8px !important; }
    .table tbody tr:last-child td:first-child { border-bottom-left-radius: 8px !important; }
    .table tbody tr:last-child td:last-child { border-bottom-right-radius: 8px !important; }

    /* BOTONES (Corrección: Margen 0 para que estén juntos) */
    .table .btn {
        border-radius: 6px !important;
        margin: 0 !important; /* <--- AQUÍ QUITAMOS LA SEPARACIÓN */
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* =========================================
       3. INTERFAZ EXTRA (SWITCHES ROJO/VERDE)
       ========================================= */
    .mx-datepicker-main.mx-datepicker-popup {
        z-index: 20000;
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        border-radius: 8px;
    }

    /* Base (NO / Apagado) -> ROJO */
    .c-switch-slider {
        background-color: #e55353 !important; 
        border: 1px solid transparent;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Activado (SI / Encendido) -> VERDE */
    .c-switch-input:checked + .c-switch-slider {
        background-color: #2eb85c !important;
        border-color: #2eb85c !important;
    }

    /* Efectos de Foco */
    .c-switch-input:focus + .c-switch-slider {
        box-shadow: 0 0 0 3px rgba(229, 83, 83, 0.2);
    }
    .c-switch-input:checked:focus + .c-switch-slider {
        box-shadow: 0 0 0 3px rgba(46, 184, 92, 0.2);
    }

    /* Texto y Bolita */
    .c-switch-input + .c-switch-slider::before {
        color: white !important;
        font-weight: 600;
        text-shadow: 0 1px 1px rgba(0,0,0,0.2);
    }
    .c-switch-slider::after {
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    /* 1. IMPORTAR FUENTE 'INTER' (Desde Google Fonts) */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    /* Aplicar la fuente a todo el sistema */
    body, html, .c-app, .table, .modal, button, input, select, textarea {
        font-family: 'Inter', system-ui, -apple-system, sans-serif !important;
        -webkit-font-smoothing: antialiased; /* Texto más nítido en monitores */
        -moz-osx-font-smoothing: grayscale;
    }

    /* 2. SCROLLBAR PERSONALIZADO (Más elegante) */
    
    /* El "carril" por donde va la barra */
    ::-webkit-scrollbar {
        width: 8px; /* Más finita (antes era como de 16px) */
        height: 8px; /* Para scroll horizontal en tablas */
        background-color: #f1f1f1;
    }

    /* La "manija" que arrastras */
    ::-webkit-scrollbar-thumb {
        background-color: #c1c1c1; /* Gris suave por defecto */
        border-radius: 10px; /* Redondita */
        border: 2px solid #f1f1f1; /* Borde blanco para efecto flotante */
    }

    /* Cuando pasas el mouse por encima de la barra */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #2a5298; /* ¡Se pone AZUL de tu marca al tocarla! */
    }

    /* =========================================
       4. ESTILOS DEL NUEVO ESCRITORIO (SGT MODERNO - VERSIÓN GIGANTE)
       ========================================= */
    .escritorio-moderno {
        /* Posicionamiento Absoluto para que quede al fondo */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0; /* Detrás de las notas */

        /* Fondo real */
        background: url('/sga/public/assets/img/Fondo_Formularios.jpg'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        
        /* Flexbox para centrar contenido */
        display: flex;
        align-items: center;     /* Centrado Vertical */
        justify-content: center; /* Centrado Horizontal */
    }

    /* TARJETA CENTRAL */
    .contenido-centro {
        text-align: center;
        padding: 2rem;
        /* Quitamos z-index aquí porque el padre ya lo maneja */
    }

    /* LOGO SGT (GIGANTE) */
    .logo-sgt {
        font-family: 'Inter', system-ui, sans-serif;
        font-size: 10rem; 
        
        /* CAMBIO 1: Usamos el peso 900 real (ahora que lo importamos) */
        font-weight: 900; 
        
        /* CAMBIO 2: Truco para engordar la letra un poco más */
        -webkit-text-stroke: 2px #1e3c72;
        
        margin: 0;
        line-height: 0.9;
        color: #1e3c72;
        text-shadow: 4px 4px 0px rgba(255,255,255, 0.8); /* Sombra un pelín más fuerte */
        letter-spacing: -4px;
    }

    .separador {
        height: 6px; /* Más grueso */
        width: 100px; /* Más ancho */
        background-color: #2a5298;
        margin: 1.5rem auto;
        border-radius: 4px;
    }

    .subtitulo {
        font-family: 'Inter', system-ui, sans-serif;
        font-size: 1.5rem; /* Aumentado */
        color: #4b5563;
        font-weight: 700;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin: 0;
    }

    /* MARCA PRONET (Posición Absoluta) */
    .marca-empresa {
        position: absolute;
        bottom: 2rem;
        right: 2rem;
        display: flex;
        flex-direction: column;
        text-align: right;
        opacity: 0.8;
    }

    .pronet-texto {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        color: #1e3c72;
        line-height: 1;
    }

    .pronet-bajada {
        font-size: 0.7rem;
        text-transform: uppercase;
        color: #666;
        font-weight: 500;
    }

    /* RESPONSIVE (Para monitores chicos) */
    @media (max-width: 1366px) {
        .logo-sgt {
            font-size: 7rem; /* Se ajusta pero sigue siendo grande */
        }
        .subtitulo {
            font-size: 1.2rem;
        }
    }
</style>