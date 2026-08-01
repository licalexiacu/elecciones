<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
            <li class="breadcrumb-item"><b>Notas</b></li>
        </ol>
        <!-- GRILLA Y BUSCADOR -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <button type="button" @click="abrirModal('insert')" class="btn btn-info">
                        <i class="cil-plus"></i>&nbsp;Nuevo
                    </button>
                </div>
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
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Visible</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="notas in arrayCampos" :key="notas.id">
                                <td v-text="notas.fecha"></td>
                                <td>
                                    <template v-if="notas.tipo == 1">
                                        <span class="badge badge-success">NORMAL</span>
                                    </template>
                                    <template v-if="notas.tipo == 2">
                                        <span class="badge badge-warning">MODERADO</span>
                                    </template>
                                    <template v-if="notas.tipo == 3">
                                        <span class="badge badge-danger">IMPORTANTE</span>
                                    </template>
                                </td>
                                <td>
                                    <template v-if="notas.visible == 1">
                                        <span class="badge">SOLO USUARIO</span>
                                    </template>
                                    <template v-else>
                                        <span class="badge">TODOS LOS USUARIOS</span>
                                    </template>
                                </td>
                                <template v-if="notas.activo == 1">
                                    <td>
                                        <span class="badge badge-success">VISIBLE</span>
                                    </td>
                                </template>
                                <template v-else>
                                    <td>
                                        <span class="badge badge-danger">ARCHIVADA</span>
                                    </td>
                                </template>
                                <td>
                                    <button type="button" @click="abrirModal('update', notas)" class="btn btn-success btn-md">
                                        <i class="cil-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-md" @click="deleteCampos(notas.id)">
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
                            <div v-if="tipoAccion==2" class="form-group row">
                                <label class="col-md-2 font-weight-bold text-dark mb-0">Fecha</label>
                                <div class="col-md-2">
                                    <input type="text" v-model="fecha" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-dark mb-0">Tipo de Nota</label>
                                <div class="col-md-7">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" v-model="tipo" value="1">
                                            NORMAL
                                        </label>
                                        <label></label>
                                        <label> - </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" v-model="tipo" value="2">
                                            MODERADO
                                        </label>
                                        <label></label>
                                        <label> - </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" v-model="tipo" value="3">
                                            IMPORTANTE
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-dark mb-0">Visible para...</label>
                                <div class="col-md-7">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" v-model="visible" value="1">
                                            SOLO USUARIO
                                        </label>
                                        <label></label>
                                        <label> - </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" v-model="visible" value="2">
                                            TODOS LOS USUARIOS
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-1 font-weight-bold text-dark mb-0">Nota</label>
                                <div class="col-md-11">
                                    <textarea class="col-md-12" v-model="nota"  rows="20"></textarea>
                                </div>
                            </div>

                            <div v-if="tipoAccion==2" class="form-group row">
                                <label class="col-md-2 font-weight-bold text-dark mb-0">Estado</label>
                                <div class="col-md-7">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" v-model="activo" value="1">
                                            VISIBLE
                                        </label>
                                        <label></label>
                                        <label> - </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" v-model="activo" value="2">
                                            ARCHIVADA
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-if="tipoAccion==1" class="btn btn-success" @click="insertCampos()">
                            <i class="cil-check-alt"></i>&nbsp;Guardar
                        </button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-success" @click="updateCampos()">
                            <i class="cil-sync"></i>&nbsp;Actualizar
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
                fecha : '',
                nota : '',
                tipo : 0,
                visible : 0,
                activo : 0
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
                var url = this.ruta + '/notas?page='+page+'&busqueda='+busqueda;

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
                error : 0;
                errors : [];

                let me = this;

                axios.post(this.ruta + '/notas/store',{
                    'id' : 0,
                    'nota': this.nota,
                    'tipo': this.tipo,
                    'visible': this.visible,
                    'activo' : 1

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
                error : 0;
                errors : [];

                let me = this;

                axios.put(this.ruta + '/notas/update',{
                    'id' : this.id,
                    'nota': this.nota,
                    'tipo': this.tipo,
                    'visible': this.visible,
                    'activo' : this.activo

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

                        axios.put(this.ruta + '/notas/destroy/',{
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
                        this.tituloModal = 'Nueva Nota';
                        this.tipoAccion = 1;

                        // Campos
                        this.reiniciaVaribles();

                        this.tipo = 1;
                        this.visible = 1;
                                
                         break;
                    }
                    case 'update': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Actualiza Nota';
                        this.tipoAccion = 2;

                        // Campos
                        this.id = data['id'];
                        this.fecha = data['fecha'];
                        this.nota = data['nota'];
                        this.tipo = data['tipo'];
                        this.visible = data['visible'];
                        this.activo = data['activo'];

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
                this.fecha = '';
                this.nota = '';
                this.tipo = 0;
                this.visible = 0;
                this.activo = 0;
            }
        },
        mounted() {
            this.listarCampos(1, this.busqueda);
        }
    }
</script>