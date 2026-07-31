<template class="c-main">
    <main>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Punteo Electoral</li>
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
                                        <thead style="background-color: #2f528f; color: white;">
                                            <tr>
                                                <th>DNI</th>
                                                <th>Nombre</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="punteo in arrayCampos" :key="punteo.id">
                                                <td class="align-middle font-weight-bold" v-text="punteo.dni"></td>
                                                <td v-text="punteo.nombre" style="text-align: left;"></td>
                                                <td>
                                                    <template v-if="punteo.id_punteo > 0">
                                                        <button type="button" @click="abrirModal('consultar', punteo)" class="btn btn-success btn-md" title="Visualiza registro">
                                                            <i class="cil-info"></i>
                                                        </button>
                                                    </template>
                                                    <template v-else>
                                                        <button type="button" @click="abrirModal('puntear', punteo)" class="btn btn-danger btn-md" title="Puntea el registro">
                                                            <i class="cil-pencil"></i>
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
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true" id="modalPunteo">
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
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">DNI</label>
                                    <div class="col-md-4">
                                        <input type="text" v-model="dni" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Domicilio</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="domicilio" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Año</label>
                                    <div class="col-md-2">
                                        <input type="text" v-model="ano" class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Mesa</label>
                                    <div class="col-md-2">
                                        <input type="text" v-model="mesa" class="form-control" readonly>
                                    </div>
                                    <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Mesa local</label>
                                    <div class="col-md-6">
                                        <input type="text" v-model="mesa_local" class="form-control" readonly>
                                    </div>
                                </div>
                                <template v-if="tipoAccion==2">
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Usuario</label>
                                        <div class="col-md-9">
                                            <input type="text" v-model="usuario" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 font-weight-bold text-dark mb-0" for="email-input">Fecha/Hora</label>
                                        <div class="col-md-6">
                                            <input type="text" v-model="created" class="form-control" readonly>
                                        </div>
                                    </div>
                                </template>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-if="tipoAccion==1" class="btn btn-success" @click="puntear()">
                                <i class="cil-check-alt"></i>&nbsp;Puntear
                            </button>
                            <button type="button" class="btn btn-danger" @click="cerrarModal()">
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
                nombre : '',
                domicilio : '',
                dni : 0,
                ano : 0,
                mesa : 0, 
                mesa_local : 0,
                usuario : '',
                created : ''
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
                var url = this.ruta + '/punteo?page='+page+'&busqueda='+busqueda;

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
                    case 'puntear': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Carga Punteo';
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
                                
                         break;
                    }

                    case 'consultar': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Consulta Punteo';
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
                        this.usuario = data['nombre_user'];
                        this.created = data['created_at'];

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
                this.nombre = '';
                this.domicilio = '';
                this.dni = 0;
                this.ano = 0;
                this.mesa = 0;
                this.mesa_local = 0;
                this.usuario = '';
                this.created = '';
            },
            puntear(){
                swal({
                    title: 'Desea puntear el registro seleccionado?',
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
                    reverseButtons: true,
                    target: document.getElementById("modalPunteo"),
                }).then((result) => {
                    if (result.value) {
                        let me = this;

                        axios.put(this.ruta + '/punteo/punteo/',{
                            'id_padron' : this.id
                        }).then(function (response){
                            swal(
                               'Punteado!',
                                'El registro Seleccionado fue punteado con EXITO.',
                                'success'
                            )
                            me.cerrarModal();
                            me.listarCampos(1, me.busqueda);
                        }).catch(function (error) {
                            swal({
                            	target: document.getElementById("modalPunteo"),
                            	title: "Error!",
                            	text: "Debido a un error no pudo puntearse el Registro Seleccionado!",
                            	type: "error",
                            });
                        });

                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        // Mensaje para mostrar un mesnaje
                    }
                })
            }
        },
        mounted() {
            this.listarCampos(1, this.busqueda);
        }
    }
</script>