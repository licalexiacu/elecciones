<template class="c-main">
    <main>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a v-bind:href="ruta+'/'">Home</a></li>
                <li class="breadcrumb-item">Cambio de Clave</li>
            </ol>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div v-show="error" class="alert alert-danger">
                            <ul>
                                <div v-for="error in errors" :key="error" v-text="error"></div>
                            </ul>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-dark mb-0" for="text-input">Contraseña actual</label>
                            <div class="col-md-9">
                                <input type="password" v-model="current_password" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-dark mb-0" for="text-input">Nueva contraseña</label>
                            <div class="col-md-9">
                                <input type="password" v-model="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 font-weight-bold text-dark mb-0" for="text-input">Confirma contraseña</label>
                            <div class="col-md-9">
                                <input type="password" v-model="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10"></div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success" @click="update()" style="position: absolute; right: 0;">
                                    <i class="cil-sync"></i>&nbsp;Actualizar
                                </button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <br>
                        <br>
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
                error : 0,
                errors : [],

                // Campos
                current_password : '', 
                password : '', 
                password_confirmation : ''
            }
        },
        methods : {
            update(){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.put(this.ruta + '/Auth/update_password',{
                    'current_password' : this.current_password,
                    'password' : this.password,
                    'password_confirmation' : this.password_confirmation
                }).then(function (response){
                    me.error = 0;
                    me.errors = [];
                    swal(
                        'Actualizado!',
                        'La Contraseña fue actualizada con EXITO.',
                        'success'
                    )
                    window.location.href = me.ruta + '/';
                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;

                    swal(
                        'Error!',
                        'Debido a un error no pudo actualizar la contraseña!',
                        'error'
                    )
                });
            }
        }
    }
</script>
