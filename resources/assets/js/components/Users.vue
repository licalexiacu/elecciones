<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
                <li class="breadcrumb-item"><b>Usuarios</b></li>
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
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="usuarios in arrayCampos" :key="usuarios.id">
                                    <td v-text="usuarios.usuario"></td>
                                    <td v-text="usuarios.nombre"></td>
                                    <td v-text="usuarios.rol"></td>
                                    <td>
                                        <div v-if="usuarios.condicion">
                                            <span class="badge badge-success">ACTIVO</span>    
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">INACTIVO</span>    
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" @click="abrirModal('update', usuarios)" class="btn btn-success btn-md">
                                          <i class="cil-pencil"></i>
                                        </button>
                                        <template v-if="usuarios.id_rol != 1">
                                            <template v-if="usuarios.condicion">
                                                <button type="button" class="btn btn-danger btn-md" @click="desactivar(usuarios.id)">
                                                    <i class="cil-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button type="button" class="btn btn-info btn-md" @click="activar(usuarios.id)">
                                                    <i class="cil-check"></i>
                                                </button>
                                            </template>
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

            <!--MODAL DE INSERT Y UPDATE-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 95%; top: 25px;">
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
                                    <label class="col-md-3 font-weight-bold text-dark mb-0" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre del Usuario" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 font-weight-bold text-dark mb-0" for="text-input">Usuario</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="usuario" class="form-control" placeholder="Nombre del Usuario">
                                    </div>
                                </div>

                                <template v-if="tipoAccion==1">
                                    <div class="form-group row">
                                        <label class="col-md-3 font-weight-bold text-dark mb-0" for="text-input">Rol</label>
                                        <div class="col-md-9">
                                            <select class="form-control" v-model="id_rol">
                                                <option value="0" disabled>Seleccione un rol</option>
                                                <option v-for="roles in arrayRoles" :key="roles.id" :value="roles.id" v-text="roles.nombre"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-md-3 font-weight-bold text-dark mb-0" for="text-input">Contraseña</label>
                                        <div class="col-md-9">
                                            <input type="password" v-model="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 font-weight-bold text-dark mb-0" for="text-input">Confirma contraseña</label>
                                        <div class="col-md-9">
                                            <input type="password" v-model="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </template>

                                <template v-if="tipoAccion==2 && id_rol != 1">
                                    <div class="form-group row">
                                        <label class="col-md-3 font-weight-bold text-dark mb-0" for="text-input">Rol</label>
                                        <div class="col-md-9">
                                            <select class="form-control" v-model="id_rol">
                                                <option value="0" disabled>Seleccione un rol</option>
                                                <option v-for="roles in arrayRoles" :key="roles.id" :value="roles.id" v-text="roles.nombre"></option>
                                            </select>
                                        </div>
                                    </div>
                                </template>
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
                // Declara todas la Variables
                arrayCampos : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                error : 0,
                errors : [],

                //Paginacion
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'first_item' : 0,
                    'last_item' : 0,
                },
                offset : 3,

                //Busquda
                busqueda : '',

                // Campos
                id : 0,
                nombre : '',
                e_mail : '',
                usuario : '',
                id_rol : 0,
                password : '', 
                password_confirmation : '',

                // Variables exclusivas del COMPONENTE
                arrayRoles : []
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
                var url = this.ruta + '/user?page='+page+'&busqueda='+busqueda;

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

                axios.post(this.ruta + '/user/store',{
                    'nombre' : this.nombre,
                	'e_mail' : this.e_mail,
                    'usuario' : this.usuario,
                    'id_rol' : this.id_rol,
                    'password' : this.password,
                    'password_confirmation' : this.password_confirmation

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

                axios.put(this.ruta + '/user/update',{
                    'id' : this.id,
                    'nombre' : this.nombre,
                	'e_mail' : this.e_mail,
                    'usuario' : this.usuario,
                    'id_rol' : this.id_rol

                }).then(function (response){
                    me.cerrarModal();
                    me.listarCampos(1, me.busqueda);

                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                });
            },
            activar(id){
                swal({
                    title: 'Esta Seguro de Activar el registro seleccionado?',
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

                        axios.put(this.ruta + '/user/activar',{
                            'id' : id
                            
                        }).then(function (response){
                            swal(
                               'Activado!',
                                'El registro Seleccionada fue Activado con EXITO.',
                                'success'
                            )
                            me.listarCampos(1, me.busqueda);
                        }).catch(function (error) {
                            swal(
                                'Error!',
                                'Debido a un error no pudo activarse el registro Seleccionado!',
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
            desactivar(id){
                swal({
                    title: 'Esta Seguro de Desactivar el registro seleccionado?',
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

                        axios.put(this.ruta + '/user/desactivar',{
                            'id' : id
                            
                        }).then(function (response){
                            swal(
                               'Desactivado!',
                                'El registro Seleccionada fue Desactivado con EXITO.',
                                'success'
                            )
                            me.listarCampos(1, me.busqueda);
                        }).catch(function (error) {
                            swal(
                                'Error!',
                                'Debido a un error no pudo desactivarse el Registro Seleccionado!',
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
                        this.tituloModal = 'Nuevo Usuario';
                        this.tipoAccion = 1;

                        // Campos
                        this.id = 0;
                        this.nombre = '';
                		this.e_mail = '';
                        this.usuario = '';
                        this.id_rol = 0;
                        this.password = '';
                        this.password_confirmation = '';
                                
                         break;
                    }
                    case 'update': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Actualizar Usuario';
                        this.tipoAccion = 2;

                        // Campos
                        this.id = data['id'];
                        this.nombre = data['nombre'];
                		this.e_mail = data['e_mail'];
                        this.usuario = data['usuario'];
                        this.id_rol = data['id_rol'];

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
                this.id = 0;
                this.nombre = '';
                this.e_mail = '';
                this.usuario = '';
                this.i_drol = 0;
                this.password = ''; 
                this.password_confirmation = '';
            },
            selectRoles(){
                arrayRoles : [];

                let me = this;
                var url = this.ruta + '/rol/select';

                axios.get(url).then(function (response) {
                    me.arrayRoles = response.data.select;
                    //console.log(response);
                })
                    .catch(function (error) {
                        console.log(error); 
                        //alert(error);
                });
            }
        },
        mounted() {
            this.selectRoles();
            this.listarCampos(1, this.busqueda);
        }
    }
</script>