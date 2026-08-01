<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
            <li class="breadcrumb-item"><b>Combustible Litros</b></li>
        </ol>
        
        <!-- GRILLA Y BUSCADOR -->
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="form-group row align-items-center mb-4">
                                    <div class="col-md-8 mb-2 mb-md-0">
                                        <div class="input-group">
                                            <input type="text" v-model="busqueda" @keyup.enter="listarCampos(1, busqueda)" class="form-control" placeholder="Buscar por DNI o Nombre...">
                                            <div class="input-group-append">
                                                <button type="submit" @click="listarCampos(1, busqueda)" class="btn btn-info">
                                                    <i class="cil-search"></i> Buscar
                                                </button>
                                                <button type="button" @click="abrirModal('cargar')" class="btn btn-success ml-2 rounded">
                                                    <i class="cil-user"></i> Nueva Carga
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <table class="table table-responsive-lg table-lg">
                                    <thead style="background-color: #2f528f; color: white;">
                                        <tr>
                                            <th style="text-align: center;">Nombre</th>
                                            <th>Litros</th>
                                            <th>Usuario</th>
                                            <th class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="combustible_carga in arrayCampos" :key="combustible_carga.id">
                                            <td class="align-middle" v-text="combustible_carga.nombre" style="text-align: center;"></td>
                                            <td class="align-middle font-weight-bold text-danger" v-text="combustible_carga.litros"></td>
                                            <td class="align-middle" v-text="combustible_carga.nombre_user"></td>
                                            <td class="align-middle text-center">
                                                <button type="button" @click="abrirModal('consultar', combustible_carga)" class="btn btn-success btn-md shadow-sm" title="Visualiza registro">
                                                    <i class="cil-info"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <nav>
                                    <ul class="pagination mb-0">
                                        <li class="page-item" v-if="pagination.current_page > 1">
                                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1, busqueda)">Ant</a>
                                        </li>
                                        <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page, busqueda)" v-text="page"></a>
                                        </li>
                                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1, busqueda)">Sig</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL DE INSERT Y UPDATE-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true" id="modalCombustile">
            <div class="modal-dialog" role="document" style="max-width: 95%; top: 25px;">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%); color: white;">
                        <h4 class="modal-title font-weight-bold" v-text="tituloModal"></h4>
                        <button type="button" class="close text-white" @click="cerrarModal()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <!-- Se eliminó bg-light -->
                    <div class="modal-body">

                        <div v-show="error" class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                <li v-for="err in errors" :key="err" v-text="err"></li>
                            </ul>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row" v-if="tipoAccion==1">
                                <label class="col-md-2 font-weight-bold text-dark mb-0">Votante</label>
                                <div class="col-md-8">
                                    <v-select
                                        :on-search="selectPadron"
                                        label="nombre"
                                        :options="arrayPadron"
                                        :filterable="false"
                                        :autoscroll="true"
                                        placeholder="Buscar Padrón por nombre"
                                        :onChange="getDatosPadron">
                                    </v-select>
                                </div>
                            </div>

                            <template v-if="id > 0">
                                <div class="form-group row" v-if="tipoAccion==2">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Nombre</label>
                                    <div class="col-md-7">
                                        <input type="text" v-model="nombre" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Litros (Lts)</label>
                                    <div class="col-md-3">
                                        <input type="number" step="0.01" v-model="litros" class="form-control font-weight-bold text-danger text-center" :class="{'shadow-sm border-info': tipoAccion == 1}" readonly>
                                    </div>
                                </div>

                                <!-- SECCIÓN: AUDITORÍA -->
                                <template v-if="tipoAccion == 2">
                                    <!-- Se eliminó bg-white -->
                                    <fieldset class="border p-3 rounded shadow-sm">
                                        <legend class="w-auto px-2" style="color: #2c3e50; font-weight: bold; font-size: 1.1rem;">Auditoría de Carga</legend>
                                        <div class="form-group row">
                                            <label class="col-md-1 font-weight-bold text-dark mb-0">Usuario</label>
                                            <div class="col-md-5">
                                                <input type="text" v-model="usuario" class="form-control text-muted" readonly>
                                            </div>
                                            <label class="col-md-2 font-weight-bold text-dark mb-0 text-right">Fecha/Hora</label>
                                            <div class="col-md-4">
                                                <input type="text" v-model="created" class="form-control text-muted text-center" readonly>
                                            </div>
                                        </div>
                                    </fieldset>
                                </template>
                            </template>

                        </form>
                    </div>
                    
                    <!-- Se eliminó border-top-0 y bg-light -->
                    <div class="modal-footer">
                        <button type="button" v-if="tipoAccion == 1" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold" @click="cargar()" :disabled="id == 0 || litros <= 0">
                            <i class="cil-check-alt"></i> Procesar Carga
                        </button>
                        <button type="button" class="btn btn-danger btn-lg shadow-sm px-5 font-weight-bold" @click="cerrarModal()">
                            <i class="cil-x"></i> Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
</template>

<script>
    import vSelect from 'vue-select';
    export default {
        props : ['ruta'],
        components: {
            vSelect
        },
        data (){
            return {
                // Declara todas la Variables GENERALES
                arrayCampos : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                error : 0,
                errors : [],

                //Paginacion GENERAL
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'first_item' : 0,
                    'last_item' : 0,
                },
                offset : 3,

                //Busquda GENERAL
                busqueda : '',

                // Campos exclusivas del COMPONENTE
                id : 0,
                nombre : '',
                litros : 0,
                usuario : '',
                created : '',

                arrayPadron : []
            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },

            pagesNumber: function(){
                if(!this.pagination.last_item){
                    return[];
                }

                // Primera Pagina
                var first_page = this.pagination.current_page - this.offset;
                if(first_page < 1) {
                    first_page = 1;
                }

                // Ultima Pagina
                var last_page = first_page + (this.offset * 2);
                if(last_page >= this.pagination.last_page) {
                    last_page = this.pagination.last_page;
                }

                var pagesArray = [];
                while(first_page <= last_page){
                    pagesArray.push(first_page);
                    first_page++;
                }
                return pagesArray;
            }
        },
        methods : {
            listarCampos (page, busqueda){
                let me = this;
                var url = this.ruta + '/combustible_carga?page='+page+'&busqueda='+busqueda;

                axios.get(url).then(function (response) {
                    me.arrayCampos = response.data.table.data;
                    me.pagination = response.data.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page, busqueda){
                let me = this;

                // Actualiza la pagina actual
                me.pagination.current_page = page;

                me.listarCampos(page, busqueda);
            },
            abrirModal(accion, data = []){
                switch(accion){
                    case 'cargar': {
                        this.modal = 1;
                        this.tituloModal = 'Carga de Registro';
                        this.tipoAccion = 1;
                        this.reiniciaVaribles();
                        break;
                    }
                    case 'consultar': {
                        this.modal = 1;
                        this.tituloModal = 'Consulta de Registro';
                        this.tipoAccion = 2;
                        this.reiniciaVaribles();

                        this.id = data['id'];
                        this.nombre = data['nombre'];
                        this.litros = data['litros'];
                        this.usuario = data['nombre_user'];
                        this.created = data['created_at'];
                        break;
                    }
                }
            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal = '';
                this.tipoAccion = 0;
                this.error = 0;
                this.errors = [];
                this.arrayPadron = [];
                this.reiniciaVaribles();
            },
            reiniciaVaribles(){
                this.id = 0;
                this.nombre = '';
                this.litros = 0;
                this.usuario = '';
                this.created = '';
            },
            selectPadron(search,loading){
                let me = this;
                loading(true)

                var url = this.ruta + '/combustible/select?filtro='+search;
                axios.get(url).then(function (response) {
                    let respuesta = response.data;
                    me.arrayPadron = respuesta.combustible;
                    loading(false)
                })
                .catch(function (error) {
                    console.log(error);
                    loading(false)
                });
            }, 
            getDatosPadron(val1){
                this.reiniciaVaribles();

                if (val1 != null) {
                    this.id = val1.id;
                    this.nombre = val1.nombre;
                    this.litros = val1.litros;
                }
            },
            cargar(){
                swal({
                    title: '¿Desea cargar el registro seleccionado?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Aceptar',
                    cancelButtonText: 'No, cancelar',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true,
                    target: document.getElementById("modalCombustile"),
                }).then((result) => {
                    if (result.value) {
                        let me = this;

                        axios.put(this.ruta + '/combustible_carga/store/',{
                            'id_combustible' : this.id,
                            'litros' : this.litros
                        }).then(function (response){
                            swal(
                                '¡Cargado!',
                                'El registro seleccionado fue procesado con ÉXITO.',
                                'success'
                            )
                            me.cerrarModal();
                            me.listarCampos(1, me.busqueda);
                        }).catch(function (error) {
                            swal({
                                target: document.getElementById("modalCombustile"),
                                title: "Error",
                                text: "Debido a un error no pudo cargarse el registro seleccionado.",
                                type: "error",
                            });
                        });
                    }
                })
            }
        },
        mounted() {
            this.listarCampos(1, this.busqueda);
        }
    }
</script>