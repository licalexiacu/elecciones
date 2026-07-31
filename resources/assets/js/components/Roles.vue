<template>
    <main>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Roles</li>
            </ol>
            <!-- GRILLA Y BUSCADOR -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Roles
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="critbusqueda">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="busqueda" @keyup.enter="listarCampos(1, busqueda, critbusqueda)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarCampos(1, busqueda, critbusqueda)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="roles in arrayCampos" :key="roles.id">
                                    <td v-text="roles.nombre"></td>
                                    <td v-text="roles.descripcion"></td>
                                    <td>
                                        <div v-if="roles.condicion">
                                            <span class="badge badge-success">Activo</span>    
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>    
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1, busqueda, critbusqueda)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page, busqueda, critbusqueda)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1, busqueda, critbusqueda)">Sig</a>
                                </li>
                            </ul>
                        </nav>
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
                // Declara todas la Variables
                arrayCampos : [],

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
                critbusqueda : 'nombre',
                busqueda : '',

                // Campos
                id : 0,
                nombre : '',
                descripcion : ''
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
            listarCampos (page, busqueda, critbusqueda){
                let me = this;
                var url = this.ruta + '/rol?page='+page+'&busqueda='+busqueda+'&critbusqueda='+critbusqueda;

                axios.get(url).then(function (response) {
                    me.arrayCampos = response.data.table.data;
                    me.pagination = response.data.pagination;
                })
                    .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page, busqueda, critbusqueda){
                let me = this;

                // Actualiza la pagina actual
                me.pagination.current_page = page;

                me.listarCampos(page, busqueda, critbusqueda);
            }
        },
        mounted() {
            this.listarCampos(1, this.busqueda, this.critbusqueda);
        }
    }
</script>