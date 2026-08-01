<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
                <li class="breadcrumb-item"><b>Conteo</b></li>
            </ol>
            <!-- GRILLA Y BUSCADOR -->
            <div class="container-fluid">
                <div class="card">
                    <template v-if="id_rol_users==1">
                        <div class="card-header">
                            <button type="button" @click="abrirModal('insert')" class="btn btn-info">
                                <i class="cil-plus"></i>&nbsp;Nuevo
                            </button>
                        </div>
                    </template>
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
                            <thead style="background-color: #2f528f; color: white;">
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
                                    <td class="align-middle font-weight-bold" v-text="conteo.numero_mesa"></td>
                                    <td v-text="conteo.descripcion"></td>
                                    <td v-text="conteo.usuario"></td>
                                    <td class="align-middle font-weight-bold text-danger" v-text="conteo.conteo"></td>
                                    <td class="align-middle font-weight-bold text-danger" v-text="conteo.conteo_seguro"></td>
                                    <td>
                                        <button type="button" @click="abrirModal('update', conteo)" class="btn btn-success btn-md">
                                          <i class="cil-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-md" @click="deleteCampos(conteo.id)">
                                            <i class="cil-trash"></i>
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
                <div class="modal-dialog" role="document" style="max-width: 95%; top: 25px;">
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
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Numero</label>
                                    <div class="col-md-3">
                                        <input type="number" v-model="numero_mesa" class="form-control" placeholder="" min="1" max="99999999">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Descripcion</label>
                                    <div class="col-md-10">
                                        <input type="text" v-model="descripcion" class="form-control" maxlength="100">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="text-input">Fiscal</label>
                                    <div class="col-md-4">
                                        <select class="form-control" v-model="id_user">
                                            <option value="0" disabled>Seleccione el fiscal</option>
                                            <option v-for="fiscales in arrayFiscales" :key="fiscales.id" :value="fiscales.id" v-text="fiscales.nombre"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Conteo</label>
                                    <div class="col-md-2">
                                        <input type="number" v-model="conteo" class="form-control" placeholder="" min="1" max="99999999">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Conteo Seguros</label>
                                    <div class="col-md-2">
                                        <input type="number" v-model="conteo_seguro" class="form-control" placeholder="" min="1" max="99999999">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-if="tipoAccion==1" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold" @click="insertCampos()">
                                <i class="cil-check-alt"></i>&nbsp;Guardar
                            </button>
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
                id_rol_users : 0,

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
                var url = this.ruta + '/conteo?page='+page+'&busqueda='+busqueda;

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
            insertCampos(){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.post(this.ruta + '/conteo/store',{
                    'id': 0,
                    'descripcion': this.descripcion,
                    'numero_mesa': this.numero_mesa,
                    'conteo': this.conteo,
                    'conteo_seguro' : this.conteo_seguro,
                    'id_user': this.id_user

                }).then(function (response){
                    me.cerrarModal();
                    me.listarCampos(1, me.busqueda);
                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                    //console.log(error);
                });
            },
            updateCampos(){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.put(this.ruta + '/conteo/update',{
                    'id' : this.id,
                    'descripcion': this.descripcion,
                    'numero_mesa': this.numero_mesa,
                    'conteo': this.conteo,
                    'conteo_seguro' : this.conteo_seguro,
                    'id_user': this.id_user

                }).then(function (response){
                    me.cerrarModal();
                    me.listarCampos(1, me.busqueda);

                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                });
            },
            deleteCampos(id){
                swal({
                    title: 'Esta Seguro de Eliminar el registro seleccionado?',
                    //text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Aceptar!',
                    cancelButtonText: 'No, cancelar!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        let me = this;

                        axios.put(this.ruta + '/conteo/destroy/',{
                            'id' : id
                        }).then(function (response){
                            swal(
                               'Eliminado!',
                                'El registro Seleccionada fue Eliminado con EXITO.',
                                'success'
                            )
                            me.listarCampos(1, me.busqueda);
                        }).catch(function (error) {
                            swal(
                                'Error!',
                                'Debido a un error no pudo eliminarse el Registro Seleccionado!',
                                'error'
                            )
                        });

                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        // Mensaje para mostrar un mesnaje
                    }
                })
            },
            abrirModal(accion, data = []){
                switch(accion){
                    case 'insert': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Nueva Mesa';
                        this.tipoAccion = 1;

                        // Campos
                        this.reiniciaVaribles();
                         break;
                    }
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
            getUsuario(){
                let me = this;
                var url = this.ruta + '/user/get';

                axios.get(url).then(function (response) {
                    me.id_rol_users = response.data.get[0]['id_rol'];
                })
                    .catch(function (error) {
                    console.log(error);
                });
            },
            selectFiscales(){
                this.arrayFiscales = [];

                let me = this;
                var url = this.ruta + '/user/select?id_rol=4';

                axios.get(url).then(function (response) {
                    me.arrayFiscales = response.data.select;
                    //console.log(response);
                })
                    .catch(function (error) {
                        console.log(error);
                        //alert(error);
                });
            },
            reiniciaVaribles(){
                this.id = 0;
                this.numero_mesa = 0;
                this.descripcion = '';
                this.conteo = 0;
                this.conteo_seguro = 0;
                this.id_user = 0;
            }
        },
        mounted() {
            this.listarCampos(1, this.busqueda);
            this.getUsuario();
            this.selectFiscales();
        }
    }
</script>