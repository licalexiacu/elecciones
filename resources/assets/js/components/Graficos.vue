<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
            <li class="breadcrumb-item"><b>Gráficos</b></li>
        </ol>
        <div class="container-fluid">
            <div class="card" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div class="card-body">
                    <br>
                    <h1 style="text-align:center; color: #1e293b;"><p><strong>Total de Votantes {{ padron }}</strong></p></h1>
                    
                    <!-- PANEL BOCA DE URNA (HERO METRIC) -->
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-12">
                            <div class="card" style="background-color: #1e293b; border-radius: 10px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);">
                                <div class="card-body" style="padding: 45px 20px; text-align: center; color: white;">
                                    <h3 style="margin-top: 0; color: #f8fafc; font-weight: 600; letter-spacing: 0.5px;">PROYECCIÓN BOCA DE URNA</h3>
                                    <p style="font-size: 15px; color: #94a3b8;">Porcentaje de los votantes actuales que fueron procesados en el búnker</p>
                                    
                                    <h1 style="font-size: 78px; font-weight: 800; margin: 20px 0; color: #10b981; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                        {{ proyeccion_votos }}%
                                    </h1>
                                    
                                    <div class="progress" style="height: 28px; background-color: #334155; border-radius: 8px; width: 75%; margin: 0 auto; box-shadow: inset 0 2px 4px rgba(0,0,0,0.3);">
                                        <div class="progress-bar progress-bar-striped active" 
                                            role="progressbar" 
                                            :style="{ width: proyeccion_votos + '%', backgroundColor: '#10b981' }">
                                        </div>
                                    </div>
                                    
                                    <p style="margin-top: 25px; font-size: 16px; color: #e2e8f0;">
                                        <strong style="color: #3b82f6; font-size: 18px;">{{ punteo }}</strong> Punteados confirmados sobre 
                                        <strong style="color: #3b82f6; font-size: 18px;">{{ conteo }}</strong> Votantes escrutados
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PANEL BOCA DE URNA -->

                    <div class="row">
                        <!-- PANEL: PUNTEO -->
                        <div class="col-md-6">
                            <div class="card card-chart" style="border: 1px solid #e2e8f0; border-radius: 8px;">
                                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; padding: 15px 20px; border-radius: 8px 8px 0 0;">
                                    <h4 style="margin: 0; color: #334155; font-weight: 600;">Punteo</h4>
                                    <button type="button" @click="impresion()" class="btn btn-default" style="padding: 6px 14px; font-weight: 600; font-size: 13px; color: #475569; background-color: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                                        <i class="cib-adobe-acrobat-reader" style="margin-right: 6px; color: #e11d48;"></i> Exportar Detalle
                                    </button>
                                </div>
                                <div class="card-content" style="padding: 25px 20px;">
                                    <div style="margin-bottom: 20px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #475569; font-size: 14px;">
                                            <strong>No Punteados</strong>
                                            <span style="font-weight: 600;">{{ padron - punteo }} ({{ punteo_no }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: punteo_no + '%', backgroundColor: '#d97706' }"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #0f172a; font-size: 14px;">
                                            <strong>Punteados</strong>
                                            <span style="font-weight: 600;">{{ punteo }} ({{ punteo_si }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: punteo_si + '%', backgroundColor: '#059669' }"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL: COMIDA -->
                        <div class="col-md-6">
                            <div class="card card-chart" style="border: 1px solid #e2e8f0; border-radius: 8px;">
                                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #f1f5f9; padding: 15px 20px; border-radius: 8px 8px 0 0;">
                                    <h4 style="margin: 0; color: #334155; font-weight: 600; line-height: 32px;">Comida</h4>
                                </div>
                                <div class="card-content" style="padding: 25px 20px;">
                                    <div style="margin-bottom: 20px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #475569; font-size: 14px;">
                                            <strong>No Registrados</strong>
                                            <span style="font-weight: 600;">{{ padron - comida }} ({{ comida_no }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: comida_no + '%', backgroundColor: '#d97706' }"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #0f172a; font-size: 14px;">
                                            <strong>Registrados</strong>
                                            <span style="font-weight: 600;">{{ comida }} ({{ comida_si }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: comida_si + '%', backgroundColor: '#059669' }"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL: CONTEO -->
                        <div class="col-md-6">
                            <div class="card card-chart" style="border: 1px solid #e2e8f0; border-radius: 8px;">
                                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #f1f5f9; padding: 15px 20px; border-radius: 8px 8px 0 0;">
                                    <h4 style="margin: 0; color: #334155; font-weight: 600; line-height: 32px;">Conteo Mesa</h4>
                                </div>
                                <div class="card-content" style="padding: 25px 20px;">
                                    <div style="margin-bottom: 20px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #475569; font-size: 14px;">
                                            <strong>Faltantes</strong>
                                            <span style="font-weight: 600;">{{ padron - conteo }} ({{ conteo_no }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: conteo_no + '%', backgroundColor: '#d97706' }"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #0f172a; font-size: 14px;">
                                            <strong>Votantes</strong>
                                            <span style="font-weight: 600;">{{ conteo }} ({{ conteo_si }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: conteo_si + '%', backgroundColor: '#059669' }"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL: CONTEO SEGURO -->
                        <div class="col-md-6">
                            <div class="card card-chart" style="border: 1px solid #e2e8f0; border-radius: 8px;">
                                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #f1f5f9; padding: 15px 20px; border-radius: 8px 8px 0 0;">
                                    <h4 style="margin: 0; color: #334155; font-weight: 600; line-height: 32px;">Conteo Seguro</h4>
                                </div>
                                <div class="card-content" style="padding: 25px 20px;">
                                    <div style="margin-bottom: 20px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #475569; font-size: 14px;">
                                            <strong>Faltantes</strong>
                                            <span style="font-weight: 600;">{{ padron - conteo_seguro }} ({{ conteo_seguro_no }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: conteo_seguro_no + '%', backgroundColor: '#d97706' }"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; color: #0f172a; font-size: 14px;">
                                            <strong>Votantes</strong>
                                            <span style="font-weight: 600;">{{ conteo_seguro }} ({{ conteo_seguro_si }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: conteo_seguro_si + '%', backgroundColor: '#059669' }"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL: COMBUSTIBLE -->
                        <div class="col-md-6">
                            <div class="card card-chart" style="border: 1px solid #e2e8f0; border-radius: 8px;">
                                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; padding: 15px 20px; border-radius: 8px 8px 0 0;">
                                    <h4 style="margin: 0; color: #334155; font-weight: 600;">Combustible</h4>
                                    <button type="button" @click="impresionCombustible()" class="btn btn-default" style="padding: 6px 14px; font-weight: 600; font-size: 13px; color: #475569; background-color: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                                        <i class="cib-adobe-acrobat-reader" style="margin-right: 6px; color: #e11d48;"></i> Exportar Detalle
                                    </button>
                                </div>
                                <div class="card-content" style="padding: 25px 20px;">
                                    <div style="margin-bottom: 20px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px;">
                                            <strong style="color: #475569;">Vales Pendientes</strong>
                                            <span style="font-weight: 600; color: #d97706;">{{ combustible_pendiente }} Lts ({{ combustible_pendiente_porcentaje }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: combustible_pendiente_porcentaje + '%', backgroundColor: '#f59e0b' }"></div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px;">
                                            <strong style="color: #0f172a;">Combustible Entregado</strong>
                                            <span style="font-weight: 600; color: #059669;">{{ combustible_cargado }} Lts ({{ combustible_cargado_porcentaje }}%)</span>
                                        </div>
                                        <div class="progress" style="height: 16px; background-color: #f1f5f9; border-radius: 8px; box-shadow: none;">
                                            <div class="progress-bar" role="progressbar" :style="{ width: combustible_cargado_porcentaje + '%', backgroundColor: '#10b981' }"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        props : ['ruta'],
        data (){
            return {
                padron : 0,

                punteo : 0,
                punteo_si : 0,
                punteo_no : 0,
                
                comida : 0,
                comida_si : 0,
                comida_no : 0,

                conteo : 0,
                conteo_si : 0,
                conteo_no : 0,

                conteo_seguro : 0,
                conteo_seguro_si : 0,
                conteo_seguro_no : 0,

                proyeccion_votos: 0,

                combustible_total: 0,
                combustible_cargado: 0,
                combustible_pendiente: 0,
                combustible_cargado_porcentaje: 0,
                combustible_pendiente_porcentaje: 0,
            }
        },
        methods : {
            get(){
                let me=this;
                
                this.padron = 0;
                this.punteo = 0;
                this.punteo_si = 0;
                this.punteo_no = 0;
                this.comida = 0;
                this.comida_si = 0;
                this.comida_no = 0;
                this.conteo = 0;
                this.conteo_si = 0;
                this.conteo_no = 0;
                this.conteo_seguro = 0;
                this.conteo_seguro_si = 0;
                this.conteo_seguro_no = 0;
                this.proyeccion_votos = 0;
                this.combustible_total = 0;
                this.combustible_cargado = 0;
                this.combustible_pendiente = 0;
                this.combustible_cargado_porcentaje = 0;
                this.combustible_pendiente_porcentaje = 0;

                var url = this.ruta + '/graficos/general';
                axios.get(url).then(function (response) {
                    me.padron = parseInt(response.data.padron, 10);
                    me.punteo = parseInt(response.data.punteo, 10);
                    me.comida = parseInt(response.data.comida, 10);
                    me.conteo = parseInt(response.data.conteo, 10);
                    me.conteo_seguro = parseInt(response.data.conteo_seguro, 10);

                    if (me.padron > 0) {
                        me.punteo_si = parseFloat((me.punteo * 100 / me.padron).toFixed(2));
                        me.punteo_no = parseFloat(((me.padron - me.punteo) * 100 / me.padron).toFixed(2));
                        
                        me.comida_si = parseFloat((me.comida * 100 / me.padron).toFixed(2));
                        me.comida_no = parseFloat(((me.padron - me.comida) * 100 / me.padron).toFixed(2));
                        
                        me.conteo_si = parseFloat((me.conteo * 100 / me.padron).toFixed(2));
                        me.conteo_no = parseFloat(((me.padron - me.conteo) * 100 / me.padron).toFixed(2));
                        
                        me.conteo_seguro_si = parseFloat((me.conteo_seguro * 100 / me.padron).toFixed(2));
                        me.conteo_seguro_no = parseFloat(((me.padron - me.conteo_seguro) * 100 / me.padron).toFixed(2));
                    } 
                    
                    if (me.conteo > 0) {
                        me.proyeccion_votos = parseFloat(((me.punteo / me.conteo) * 100).toFixed(2));
                    }

                    me.combustible_total = parseFloat(response.data.combustible_total) || 0;
                    me.combustible_cargado = parseFloat(response.data.combustible_cargado) || 0;

                    if (me.combustible_total > 0) {
                        me.combustible_pendiente = me.combustible_total - me.combustible_cargado;
                        
                        me.combustible_cargado_porcentaje = parseFloat(((me.combustible_cargado * 100) / me.combustible_total).toFixed(2));
                        me.combustible_pendiente_porcentaje = parseFloat(((me.combustible_pendiente * 100) / me.combustible_total).toFixed(2));
                    } else {
                        me.combustible_pendiente = 0;
                        me.combustible_cargado_porcentaje = 0;
                        me.combustible_pendiente_porcentaje = 0;
                    }
                })
                .catch(function (error) {
                    console.error("Error al obtener los datos:", error);
                });
            },
            impresion(){
                window.open(this.ruta + '/punteo/listado', '_blank');
            },
            impresionCombustible() {
                window.open(this.ruta + '/combustible_carga/listado', '_blank');
            }
        },
        mounted() {
            this.get();
        }
    }
</script>