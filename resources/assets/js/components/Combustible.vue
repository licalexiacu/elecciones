<template>
    <main class="c-main" style="background-image: url('assets/img/Fondo_Formularios.jpg');">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><b>Home</b></a></li>
            <li class="breadcrumb-item"><b>Autorizacion Combustible</b></li>
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
                                            <input type="text" v-model="busqueda" @keyup.enter="listarCampos(1, busqueda)" class="form-control" placeholder="Buscar Nombre...">
                                            <div class="input-group-append">
                                                <button type="submit" @click="listarCampos(1, busqueda)" class="btn btn-info">
                                                    <i class="cil-search"></i> Buscar
                                                </button>
                                                <button type="button" @click="abrirModal('cargar')" class="btn btn-success ml-2 rounded">
                                                    <i class="cil-user"></i> Nuevo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <table class="table table-responsive-lg table-lg">
                                    <thead style="background-color: #2f528f; color: white;">
                                        <tr>
                                            <th style="text-align: center;">Nombre</th>
                                            <th style="text-align: center;">Litros</th>
                                            <th class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="combustible in arrayCampos" :key="combustible.id">
                                            <td class="align-middle" v-text="combustible.nombre" style="text-align: center;"></td>
                                            <td class="align-middle" v-text="combustible.litros" style="text-align: center;"></td>
                                            <td class="align-middle text-center">
                                                <button type="button" @click="abrirModal('consultar', combustible)" class="btn btn-success btn-md shadow-sm" title="Visualiza registro">
                                                    <i class="cil-pencil"></i>
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
                    
                    <!-- Se eliminó bg-light para igualar la transparencia del modal de Comida -->
                    <div class="modal-body">

                        <div v-show="error" class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                <li v-for="err in errors" :key="err" v-text="err"></li>
                            </ul>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-md-2 font-weight-bold text-dark mb-0">Nombre</label>
                                <div class="col-md-7">
                                    <input type="text" v-model="nombre" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-2 font-weight-bold text-dark mb-0">Litros (Lts)</label>
                                    <div class="col-md-3">
                                        <input type="number" step="0.01" v-model="litros" class="form-control font-weight-bold text-danger text-center" :class="{'shadow-sm border-info': tipoAccion == 1}">
                                    </div>
                                </div>
                        </form>
                    </div>
                    
                    <!-- Se eliminó border-top-0 y bg-light para respetar el diseño estructural -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg shadow-sm" @click="cerrarModal()">
                            <i class="cil-x"></i> Cerrar
                        </button>
                        <button type="button" v-if="tipoAccion == 2" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold" @click="update()" :disabled="nombre == ''">
                            <i class="cil-check-alt"></i> Actualizar
                        </button>
                        <button type="button" v-if="tipoAccion == 1" class="btn btn-success btn-lg shadow-sm px-5 font-weight-bold" @click="store()" :disabled="nombre == ''">
                            <i class="cil-check-alt"></i> Guardar
                        </button>
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
                litros: 0
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
                var url = this.ruta + '/combustible?page='+page+'&busqueda='+busqueda;
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
            },
            store(){
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

                        axios.put(this.ruta + '/combustible/store/',{
                            'nombre' : this.nombre,
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
            },
            update(){
                swal({
                    title: '¿Desea Actualizar el registro seleccionado?',
                    text: 'Si el Votante ya fue seleccionado en la carga no se aplicara los cambios!!!',
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

                        axios.put(this.ruta + '/combustible/update/',{
                            'id' : this.id,
                            'nombre' : this.nombre,
                            'litros' : this.litros
                        }).then(function (response){
                            swal(
                                '¡Actualizaro!',
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