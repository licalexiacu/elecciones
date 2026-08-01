<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
                <li class="breadcrumb-item"><b>Mesas</b></li>
            </ol>
            <!-- GRILLA Y BUSCADOR -->
            <div class="container-fluid">
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
                        <table class="table table-responsive-sm table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Descripcion</th>
                                    <th>Fiscal</th>
                                    <th>Conteo</th>
                                    <th>Conteo Seguro</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="conteo in arrayCampos" :key="conteo.id">
                                    <td v-text="conteo.numero_mesa"></td>
                                    <td v-text="conteo.descripcion"></td>
                                    <td v-text="conteo.usuario"></td>
                                    <td v-text="conteo.conteo"></td>
                                    <td v-text="conteo.conteo_seguro"></td>
                                    <td>
                                        <button type="button" @click="abrirModal('update', conteo)" class="btn btn-success btn-md">
                                          <i class="cil-pencil"></i>
                                        </button>
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

            <!--MODAL DE INSERT Y UPDATE-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="max-width: 60%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
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
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Numero</label>
                                    <div class="col-md-3">
                                        <input type="number" v-model="numero_mesa" class="form-control"  readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Descripcion</label>
                                    <div class="col-md-10">
                                        <input type="text" v-model="descripcion" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">fiscal</label>
                                    <div class="col-md-8">
                                        <input type="text" v-model="usuario" class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Conteo</label>
                                    <div class="col-md-2">
                                        <input type="number" v-model="conteo" class="form-control" placeholder="" min="1" max="99999999" style="position: absolute; right: 0; font-size: 20px;">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Conteo Seguros</label>
                                    <div class="col-md-2">
                                        <input type="number" v-model="conteo_seguro" class="form-control" placeholder="" min="1" max="99999999" style="position: absolute; right: 0; font-size: 20px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-if="tipoAccion==2" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold" @click="updateCampos()">
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
                numero_mesa : 0,
                descripcion : '',
                conteo : 0,
                conteo_seguro : 0,
                id_user : 0,
                usuario : '',

                arrayFiscales : []
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
                var url = this.ruta + '/conteo/get?page='+page+'&busqueda='+busqueda;

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
            updateCampos(){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.put(this.ruta + '/conteo/update_conteo',{
                    'id' : this.id,
                    'conteo': this.conteo,
                    'conteo_seguro' : this.conteo_seguro
                }).then(function (response){
                    me.cerrarModal();
                    me.listarCampos(1, me.busqueda);

                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                });
            },
            abrirModal(accion, data = []){
                switch(accion){
                    case 'update': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Actualiza Mesa';
                        this.tipoAccion = 2;

                        // Campos
                        this.id = data['id'];
                        this.numero_mesa = data['numero_mesa'];
                        this.descripcion = data['descripcion'];
                        this.id_user = data['id_user'];
                        this.usuario = data['usuario'];

                        break;
                    }
                }
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
            reiniciaVaribles(){
                this.id = 0;
                this.numero_mesa = 0;
                this.descripcion = '';
                this.conteo = 0;
                this.conteo_seguro = 0;
                this.id_user = 0;
                this.usuario = '';
            }
        },
        mounted() {
            this.listarCampos(1, this.busqueda);
        }
    }
</script>