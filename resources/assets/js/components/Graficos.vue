<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
            <li class="breadcrumb-item"><b>Graficos</b></li>
        </ol>
        <div class="container-fluid">
            <div class="card">
                <div class="car-body">
                    <br>
                    <h1 style="text-align:center"><p><strong>Total de Votantes {{ padron }}</strong></p></h1>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <div class="form-group row">
                                        <h4>Punteo</h4>&nbsp;&nbsp;
                                        <button type="button" @click="impresion()" class="btn btn-primary">
                                            <i class="cib-adobe-acrobat-reader"></i> Detalle
                                        </button>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="punteo">
                                        </canvas>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <p><strong></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4>Comida</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="comida">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p><strong></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4>Conteo</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="conteo">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p><strong></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4>Conteo Seguro</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="conteo_seguro">
                                        </canvas>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p><strong></strong></p>
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

                charPunteo : null,
                varPunteo : null,

                charComida : null,
                varComida : null,

                charConteo : null,
                varConteo : null,

                charConteo_Seguro : null,
                varConteo_Seguro : null
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
                this.conteo_si = 0,
                this.conteo_no = 0,

                this.conteo_seguro = 0;
                this.conteo_seguro_si = 0,
                this.conteo_seguro_no = 0,

                this.charPunteo = null;
                this.varPunteo = null;

                this.charComida = null;
                this.varComida = null;

                this.charConteo = null;
                this.varConteo = null;

                this.charConteo_Seguro = null;
                this.varConteo_Seguro = null;

                var url= this.ruta + '/graficos/general';
                axios.get(url).then(function (response) {

                    // PADRON
                    if (!response.data.padron[0]['padron']) {
                        me.padron = 0;
                    } else {
                        me.padron = parseFloat(response.data.padron[0]['padron']);
                    }
                    
                    // PUNTEO
                    if (!response.data.punteo[0]['punteo']) {
                        me.punteo = 0;
                    } else {
                        me.punteo = parseFloat(response.data.punteo[0]['punteo']);
                    }
                    me.punteo_si = parseFloat((me.punteo * 100 / me.padron)).toFixed(2);
                    me.punteo_no = parseFloat(((me.padron - me.punteo) * 100 / me.padron)).toFixed(2);
                    

                    // COMIDA
                    if (!response.data.comida[0]['comida']) {
                        me.comida = 0;
                    } else {
                        me.comida = parseFloat(response.data.comida[0]['comida']);
                    }
                    me.comida_si = parseFloat((me.comida * 100 / me.padron)).toFixed(2);
                    me.comida_no = parseFloat(((me.padron - me.comida) * 100 / me.padron)).toFixed(2);

                    // CONTEO
                    if (!response.data.conteo[0]['conteo'])  {
                        me.conteo = 0;
                    } else {
                        me.conteo = parseFloat(response.data.conteo[0]['conteo']);
                    }
                    me.conteo_si = parseFloat((me.conteo * 100 / me.padron)).toFixed(2);
                    me.conteo_no = parseFloat(((me.padron - me.conteo) * 100 / me.padron)).toFixed(2);


                    // CONTEO SEGURO
                    if (!response.data.conteo_seguro[0]['conteo_seguro'])  {
                        me.conteo_seguro = 0;
                    } else {
                        me.conteo_seguro = parseFloat(response.data.conteo_seguro[0]['conteo_seguro']);
                    }
                    me.conteo_seguro_si = parseFloat((me.conteo_seguro * 100 / me.padron)).toFixed(2);
                    me.conteo_seguro_no = parseFloat(((me.padron - me.conteo_seguro) * 100 / me.padron)).toFixed(2);

                    //cargamos los datos del chart
                    me.load();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            load(){
                let me=this;
                
                // Punteo
                me.varPunteo = document.getElementById('punteo').getContext('2d');
                me.charPunteo = new Chart(me.varPunteo, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Puntedos: '+me.punteo,
                            'No Punteados: '+(me.padron - me.punteo)
                        ],
                        datasets: [{
                            label: 'Punteo',
                            data: [
                                me.punteo_si,
                                me.punteo_no],
                            backgroundColor: ['#36A2EB', '#FF6384'],
                            overBackgroundColor: ['#36A2EB', '#FF6384'],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        responsive: true
                    }
                });

                // Comida
                me.varComida = document.getElementById('comida').getContext('2d');
                me.charComida = new Chart(me.varComida, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Registrados: '+me.comida,
                            'No Registrados: '+(me.padron - me.comida)
                        ],
                        datasets: [{
                            label: 'Comida',
                            data: [
                                me.comida_si,
                                me.comida_no],
                            backgroundColor: ['#FFCE56', '#FF6384'],
                            overBackgroundColor: ['#FFCE56', '#FF6384'],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        responsive: true
                    }
                });

                // Conteo
                me.varConteo = document.getElementById('conteo').getContext('2d');
                me.charConteo = new Chart(me.varConteo, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Votentes: '+me.conteo,
                            'Faltantes: '+(me.padron - me.conteo)
                        ],
                        datasets: [{
                            label: 'Conteo',
                            data: [
                                me.conteo_si,
                                me.conteo_no],
                            backgroundColor: ['#4BC0C0', '#FF6384'],
                            overBackgroundColor: ['#4BC0C0', '#FF6384'],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        responsive: true
                    }
                });

                // Conteo Seguro
                me.varConteo_Seguro = document.getElementById('conteo_seguro').getContext('2d');
                me.charConteo_Seguro = new Chart(me.varConteo_Seguro, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Votentes: '+me.conteo_seguro,
                            'Faltantes: '+(me.padron - me.conteo_seguro)
                        ],
                        datasets: [{
                            label: 'Conteo Seguro',
                            data: [
                                me.conteo_seguro_si,
                                me.conteo_seguro_no],
                            backgroundColor: ['#fd963f', '#FF6384'],
                            overBackgroundColor: ['#fd963f', '#FF6384'],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        responsive: true
                    }
                });
            },
            impresion(){
                window.open(this.ruta + '/punteo/listado', '_blank');
            }
        },
        mounted() {
            this.get();
        }
    }
</script>