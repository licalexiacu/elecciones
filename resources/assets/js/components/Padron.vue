<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
                <li class="breadcrumb-item"><b>Padron Electoral</b></li>
            </ol>
            <!-- GRILLA Y BUSCADOR -->
            <div class="container-fluid">
                <div class="fade-in">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" v-model="busqueda" @keyup.enter="listarCampos(1, busqueda)" class="form-control" placeholder="Texto a buscar">
                                                <button type="submit" @click="listarCampos(1, busqueda)" class="btn btn-info"><i class="cil-search"></i> Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-responsive-lg table-lg">
                                        <thead   thead style="background-color: #2f528f; color: white;">
                                            <tr>
                                                <th>DNI</th>
                                                <th style="text-align: left;">Nombre</th>
                                                <template v-if="id_rol_users==1 || id_rol_users==5">
                                                    <th>Estado</th>
                                                </template>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="padron in arrayCampos" :key="padron.id">
                                                <td class="align-middle font-weight-bold" v-text="padron.dni"></td>
                                                <td v-text="padron.nombre" style="text-align: left;"></td>
                                                <template v-if="id_rol_users==1 || id_rol_users==5">
                                                    <template v-if="padron.estado == 0">
                                                        <td>
                                                            <span class="badge badge-danger">SIN VISITAR</span>
                                                        </td>
                                                    </template>
                                                    <template v-else>
                                                        <td>
                                                            <span class="badge badge-success">VISITADO</span>
                                                        </td>
                                                    </template>
                                                </template>
                                                <td>
                                                    <template v-if="(padron.id_user==0 || padron.id_user==id_user_users) && id_rol_users==5">
                                                        <button type="button" @click="abrirModal('edita', padron)" class="btn btn-success btn-md" title="Editar registro">
                                                            <i class="cil-pencil"></i>
                                                        </button> 
                                                    </template>
                                                    <template v-else>
                                                        <button type="button" @click="abrirModal('consulta', padron)" class="btn btn-warning btn-md" title="Visualiza registro">
                                                            <i class="cil-info"></i>
                                                        </button> 
                                                    </template>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination">
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
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 90%">
                    <div class="modal-content border-0 shadow-lg">
                        <div class="modal-header" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%); color: white;">
                            <h4 class="modal-title font-weight-bold" v-text="tituloModal"></h4>
                            <button type="button" class="close text-white" @click="cerrarModal()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div v-show="error" class="alert alert-danger">
                                <ul>
                                    <div v-for="error in errors" :key="error" v-text="error"></div>
                                </ul>
                            </div>

                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">DNI</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="dni" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">Domicilio</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="domicilio" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">Año</label>
                                    <div class="col-md-2">
                                        <input type="text" v-model="ano" class="form-control" readonly>
                                    </div>
                                    <label class="col-md-2"></label>
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">Edad</label>
                                    <div class="col-md-2">
                                        <template v-if="tipoAccion==1">
                                            <input type="text" v-model="edad" class="form-control">
                                        </template>
                                        <template v-else>
                                            <input type="text" v-model="edad" class="form-control" readonly>
                                        </template>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">Mesa</label>
                                    <div class="col-md-2">
                                        <input type="text" v-model="mesa" class="form-control" readonly>
                                    </div>
                                    <label class="col-md-1 font-weight-bold text-dark mb-0">Mesa local</label>
                                    <div class="col-md-6">
                                        <input type="text" v-model="mesa_local" class="form-control" readonly>
                                    </div>
                                </div>
                                <template v-if="id_rol_users==1 || id_rol_users==5">
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-md-1 font-weight-bold text-dark mb-0">Barrio</label>
                                        <div class="col-md-5">
                                            <template v-if="tipoAccion==1">
                                                <input type="text" v-model="barrio" class="form-control">
                                            </template>
                                            <template v-else>
                                                <input type="text" v-model="barrio" class="form-control" readonly>
                                            </template>
                                        </div>
                                        <label class="col-md-1 font-weight-bold text-dark mb-0">Referencia</label>
                                        <div class="col-md-5">
                                            <template v-if="tipoAccion==1">
                                                <input type="text" v-model="referencia" class="form-control">
                                            </template>
                                            <template v-else>
                                                <input type="text" v-model="referencia" class="form-control" readonly>
                                            </template>
                                        </div>
                                    </div>
                                    <template v-if="(id_rol_users==1 || ((id_user==0 || id_user==id_user_users) && id_rol_users==5))">
                                        <div class="form-group row">
                                            <label class="col-md-1 col-form-label">T. Votante</label>
                                            <div class="col-md-9 col-form-label">
                                                <div class="form-check">
                                                    <template v-if="tipoAccion==1">
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="1">
                                                    </template>
                                                    <template v-else>
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="1" disabled>
                                                    </template>
                                                    <label class="form-check-label">Seguro</label>
                                                    <label class="col-md-1"></label>
                                                    <template v-if="tipoAccion==1">
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="2">
                                                    </template>
                                                    <template v-else>
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="2" disabled>
                                                    </template>
                                                    <label class="form-check-label">Oposicion</label>
                                                    <label class="col-md-1"></label>
                                                    <template v-if="tipoAccion==1">
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="3">
                                                    </template>
                                                    <template v-else>
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="3" disabled>
                                                    </template>
                                                    <label class="form-check-label">Dudoso posible</label>
                                                    <label class="col-md-1"></label>
                                                    <template v-if="tipoAccion==1">
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="4">
                                                    </template>
                                                    <template v-else>
                                                        <input class="form-check-input" type="radio" v-model="tipo_votante" value="4" disabled>
                                                    </template>
                                                    <label class="form-check-label">Dudoso</label>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <div class="form-group row" v-if="id_user!=0">
                                        <label class="col-md-1 font-weight-bold text-dark mb-0">L. Barrial</label>
                                        <div class="col-md-7">
                                            <input type="text" v-model="usuario" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="id_user!=0">
                                        <label class="col-md-1 font-weight-bold text-dark mb-0">Ingresado</label>
                                        <div class="col-md-4">
                                            <input type="text" v-model="updated_at" class="form-control" readonly>
                                        </div>
                                    </div>
                                </template>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-if="tipoAccion==1" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold" @click="updateCampos()">
                                <i class="cil-sync"></i>&nbsp;Actualizar
                            </button>
                            <button type="button" class="btn btn-danger btn-lg shadow-sm px-5 font-weight-bold" @click="cerrarModal()">
                                <i class="cil-x"></i>&nbsp;Cerrar
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
        </main>
</template>

<script>
    export default {
        props : ['ruta'],
        data (){
            return {
                // Declara todas la Variables GENERALES
                arrayCampos : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                error : 0,
                errors : [],
                id_rol_users : 0,
                id_user_users : 0,

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

                //Busquda GENERALusuario
                busqueda : '',

                // Campos exclusivas del COMPONENTE
                id : 0,
                nombre : '',
                domicilio : '',
                dni : 0,
                ano : 0,
                mesa : 0, 
                mesa_local : 0,
                barrio : '' ,
                referencia : '' ,
                edad : 0,
                tipo_votante : 0,
                id_user : 0,
                estado : 0,
                usuario : '',
                updated_at : ''
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
                var url = this.ruta + '/padron?page='+page+'&busqueda='+busqueda;

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
                    case 'consulta': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Consulta padron';
                        this.tipoAccion = 2;

                        // Campos
                        this.reiniciaVaribles();

                        this.id = data['id'];
                        this.nombre = data['nombre'];
                        this.domicilio = data['domicilio'];
                        this.dni = data['dni'];
                        this.ano = data['ano'];
                        this.mesa = data['mesa'];
                        this.mesa_local = data['mesa_local'];
                        this.barrio = data['barrio'];
                        this.referencia = data['referencia'];
                        this.edad = data['edad'];
                        this.tipo_votante = data['tipo_votante'];
                        this.id_user = data['id_user'];
                        this.estado = data['estado'];
                        this.usuario = data['usuario'];
                        this.updated_at = data['updated_at'];

                        break;
                    }
                    case 'edita': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Edita padron';
                        this.tipoAccion = 1;

                        // Campos
                        this.reiniciaVaribles();

                        this.id = data['id'];
                        this.nombre = data['nombre'];
                        this.domicilio = data['domicilio'];
                        this.dni = data['dni'];
                        this.ano = data['ano'];
                        this.mesa = data['mesa'];
                        this.mesa_local = data['mesa_local'];
                        this.barrio = data['barrio'];
                        this.referencia = data['referencia'];
                        this.edad = data['edad'];
                        this.tipo_votante = data['tipo_votante'];
                        this.id_user = data['id_user'];
                        this.estado = data['estado'];
                        this.usuario = data['usuario'];
                        this.updated_at = data['updated_at'];

                        break;
                    }
                }
            },
            updateCampos(){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.put(this.ruta + '/padron/update',{
                    'id' : this.id,
                    'barrio' : this.barrio,
                    'referencia' : this.referencia,
                    'edad' : this.edad,
                    'tipo_votante' : this.tipo_votante
                }).then(function (response){
                    me.cerrarModal();
                    me.listarCampos(1, me.busqueda);

                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                });
            },
            cerrarModal(){
                // Variables
                this.modal = 0;
                this.tituloModal = '';
                this.tipoAccion = 0;
                this.error = 0;
                this.errors = [];

                // Campos
                this.reiniciaVaribles();
            },
            getUsuario(){
                let me = this;
                var url = this.ruta + '/user/get';

                axios.get(url).then(function (response) {
                    me.id_rol_users = response.data.get[0]['id_rol'];
                    me.id_user_users = response.data.get[0]['id'];
                })
                    .catch(function (error) {
                    console.log(error);
                });
            },
            reiniciaVaribles(){
                this.id = 0;
                this.nombre = '';
                this.domicilio = '';
                this.dni = 0;
                this.ano = 0;
                this.mesa = 0;
                this.mesa_local = 0;
                this.barrio = '';
                this.referencia = '';
                this.edad = 0;
                this.tipo_votante = 0;
                this.id_user = 0;
                this.estado = '';
                this.usuario = '';
                this.updated_at = '';
            },
        },
        mounted() {
            this.listarCampos(1, this.busqueda);
            this.getUsuario();
        }
    }
</script>