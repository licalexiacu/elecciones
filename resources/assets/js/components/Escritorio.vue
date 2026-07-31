<template>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                    <!-- /.col 1 -->
                    <template v-if="id_1 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_1 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_1 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_1)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_1, nota_1)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_1 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_1"></div>
                                        <div v-text="nota_1"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_1"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_1 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_1 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_1)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_1, nota_1)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_1 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_1"></div>
                                        <div v-text="nota_1"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_1"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_1 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_1 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_1)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_1, nota_1)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_1 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_1"></div>
                                        <div v-text="nota_1"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_1"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 2 -->
                    <template v-if="id_2 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_2 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_2 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_2)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_2, nota_2)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_2 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_2"></div>
                                        <div v-text="nota_2"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_2"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_2 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_2 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_2)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_2, nota_2)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_2 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_2"></div>
                                        <div v-text="nota_2"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_2"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_2 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_2 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_2)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_2, nota_2)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_2 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_2"></div>
                                        <div v-text="nota_2"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_2"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 3 -->
                    <template v-if="id_3 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_3 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_3 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_3)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_3, nota_3)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_3 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_3"></div>
                                        <div v-text="nota_3"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_3"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_3 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_3 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_3)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_3, nota_3)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_3 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_3"></div>
                                        <div v-text="nota_3"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_3"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_3 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_3 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_3)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_3, nota_3)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_3 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_3"></div>
                                        <div v-text="nota_3"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_3"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 4 -->
                    <template v-if="id_4 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_4 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_4 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_4)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_4, nota_4)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_4 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_4"></div>
                                        <div v-text="nota_4"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_4"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_4 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_4 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_4)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_4, nota_4)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_4 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_4"></div>
                                        <div v-text="nota_4"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_4"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_4 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_4 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_4)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_4, nota_4)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_4 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_4"></div>
                                        <div v-text="nota_4"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_4"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 5 -->
                    <template v-if="id_5 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_5 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_5 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_5)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_5, nota_5)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_5 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_5"></div>
                                        <div v-text="nota_5"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_5"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_5 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_5 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_5)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_5, nota_5)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_5 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_5"></div>
                                        <div v-text="nota_5"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_5"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_5 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_5 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_5)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_5, nota_5)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_5 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_5"></div>
                                        <div v-text="nota_5"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_5"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 6 -->
                    <template v-if="id_6 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_6 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_6 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_6)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_6, nota_6)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_6 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_6"></div>
                                        <div v-text="nota_6"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_6"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_6 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_6 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_6)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_6, nota_6)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_6 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_6"></div>
                                        <div v-text="nota_6"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_6"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_6 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_6 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_6)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_6, nota_6)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_6 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_6"></div>
                                        <div v-text="nota_6"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_6"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 7 -->
                    <template v-if="id_7 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_7 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_7 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_7)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_7, nota_7)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_7 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_7"></div>
                                        <div v-text="nota_7"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_7"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_7 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_7 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_7)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_7, nota_7)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_7 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_7"></div>
                                        <div v-text="nota_7"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_7"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_7 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_7 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_7)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_7, nota_7)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_7 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_7"></div>
                                        <div v-text="nota_7"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_7"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 8 -->
                    <template v-if="id_8 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_8 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_8 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_8)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_8, nota_8)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_8 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_8"></div>
                                        <div v-text="nota_8"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_8"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_8 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_8 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_8)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_8, nota_8)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_8 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_8"></div>
                                        <div v-text="nota_8"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_8"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_8 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_8 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_8)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_8, nota_8)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_8 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_8"></div>
                                        <div v-text="nota_8"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_8"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 9 -->
                    <template v-if="id_9 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_9 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_9 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_9)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_9, nota_9)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_9 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_9"></div>
                                        <div v-text="nota_9"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_9"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_9 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_9 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_9)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_9, nota_9)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_9 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_9"></div>
                                        <div v-text="nota_9"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_9"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_9 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_9 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_9)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_9, nota_9)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_9 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_9"></div>
                                        <div v-text="nota_9"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_9"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 10 -->
                    <template v-if="id_10 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_10 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_10 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_10)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_10, nota_10)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_10 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_10"></div>
                                        <div v-text="nota_10"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_10"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_10 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_10 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_10)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_10, nota_10)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_10 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_10"></div>
                                        <div v-text="nota_10"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_10"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_10 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_10 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_10)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_10, nota_10)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_10 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_10"></div>
                                        <div v-text="nota_10"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_10"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 11 -->
                    <template v-if="id_11 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_11 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_11 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_11)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_11, nota_11)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_11 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_11"></div>
                                        <div v-text="nota_11"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_11"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_11 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_11 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_11)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_11, nota_11)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_11 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_11"></div>
                                        <div v-text="nota_11"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_11"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_11 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_11 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_11)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_11, nota_11)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_11 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_11"></div>
                                        <div v-text="nota_11"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_11"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                    
                    <!-- /.col 12 -->
                    <template v-if="id_12 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_12 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_12 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_12)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_12, nota_12)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_12 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_12"></div>
                                        <div v-text="nota_12"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_12"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_12 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_12 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_12)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_12, nota_12)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_12 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_12"></div>
                                        <div v-text="nota_12"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_12"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_12 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_12 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_12)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_12, nota_12)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_12 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_12"></div>
                                        <div v-text="nota_12"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_12"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                    
                    <!-- /.col 13 -->
                    <template v-if="id_13 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_13 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_13 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_13)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_13, nota_13)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_13 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_13"></div>
                                        <div v-text="nota_13"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_13"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_13 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_13 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_13)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_13, nota_13)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_13 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_13"></div>
                                        <div v-text="nota_13"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_13"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_13 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_13 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_13)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_13, nota_13)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_13 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_13"></div>
                                        <div v-text="nota_13"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_13"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                    
                    <!-- /.col 14 -->
                    <template v-if="id_14 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_14 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_14 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_14)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_14, nota_14)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_14 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_14"></div>
                                        <div v-text="nota_14"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_14"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_14 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_14 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_14)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_14, nota_14)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_14 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_14"></div>
                                        <div v-text="nota_14"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_14"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_14 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_14 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_14)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_14, nota_14)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_14 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_14"></div>
                                        <div v-text="nota_14"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_14"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                        
                    <!-- /.col 15 -->
                    <template v-if="id_15 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_15 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_15 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_15)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_15, nota_15)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_15 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_15"></div>
                                        <div v-text="nota_15"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_15"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_15 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_15 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_15)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_15, nota_15)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_15 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_15"></div>
                                        <div v-text="nota_15"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_15"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_15 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_15 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_15)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_15, nota_15)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_15 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_15"></div>
                                        <div v-text="nota_15"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_15"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                        
                    <!-- /.col 16 -->
                    <template v-if="id_16 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_16 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_16 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_16)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_16, nota_16)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_16 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_16"></div>
                                        <div v-text="nota_16"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_16"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_16 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_16 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_16)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_16, nota_16)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_16 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_16"></div>
                                        <div v-text="nota_16"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_16"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_16 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_16 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_16)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_16, nota_16)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_16 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_16"></div>
                                        <div v-text="nota_16"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_16"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                        
                    <!-- /.col 17 -->
                    <template v-if="id_17 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_17 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_17 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_17)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_17, nota_17)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_17 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_17"></div>
                                        <div v-text="nota_17"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_17"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_17 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_17 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_17)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_17, nota_17)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_17 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_17"></div>
                                        <div v-text="nota_17"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_17"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_17 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_17 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_17)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_17, nota_17)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_17 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_17"></div>
                                        <div v-text="nota_17"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_17"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                        
                    <!-- /.col 18 -->
                    <template v-if="id_18 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_18 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_18 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_18)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_18, nota_18)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_18 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_18"></div>
                                        <div v-text="nota_18"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_18"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_18 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_18 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_18)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_18, nota_18)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_18 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_18"></div>
                                        <div v-text="nota_18"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_18"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_18 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_18 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_18)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_18, nota_18)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_18 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_18"></div>
                                        <div v-text="nota_18"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_18"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                        
                    <!-- /.col 19 -->
                    <template v-if="id_19 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_19 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_19 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_19)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_19, nota_19)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_19 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_19"></div>
                                        <div v-text="nota_19"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_19"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_19 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_19 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_19)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_19, nota_19)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_19 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_19"></div>
                                        <div v-text="nota_19"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_19"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_19 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_19 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_19)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_19, nota_19)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_19 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_19"></div>
                                        <div v-text="nota_19"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_19"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- /.col 20 -->
                    <template v-if="id_20 != 0">
                        <div class="col-sm-6 col-lg-3">
                            <template v-if="tipo_20 == 1">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_20 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_20)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_20, nota_20)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_20 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_20"></div>
                                        <div v-text="nota_20"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_20"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_20 == 2">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_20 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_20)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_20, nota_20)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_20 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_20"></div>
                                        <div v-text="nota_20"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_20"></small>
                                    </div>
                                </div>
                            </template>
                            <template v-if="tipo_20 == 3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0">
                                        <template v-if="id_user_20 == id_user">
                                            <div class="btn-group float-right">
                                                <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="c-icon">
                                                        <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" @click="archivarNota(id_20)">Archivar</a>
                                                    <a class="dropdown-item" @click="abrirModal('editarNota',id_20, nota_20)">Editar</a>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-if="id_user_20 != id_user">
                                            <button class="btn btn-transparent p-0 float-right" type="button">
                                                <svg class="c-icon">
                                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-location-pin"></use>
                                                </svg>
                                            </button>
                                        </template>
                                        <div class="text-value-lg" v-text="fecha_20"></div>
                                        <div v-text="nota_20"></div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                          <canvas class="chart" id="card-chart2" height="70"></canvas>
                                        </div>
                                        <small class="text-muted" v-text="user_20"></small>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

            </div>
        </div>
    </div>

    <!--MODAL DE INSERT Y UPDATE-->
    <div class="modal fade" tabindex="-1" :class="{mostrar : modal == 1}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered animated" role="document" style="max-width: 60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal('editar')" aria-label="Close">
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
                            <label class="col-md-1 form-control-label">Nota</label>
                            <div class="col-md-11">
                                <textarea class="col-md-12" v-model="nota_update"  rows="20"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" @click="updateNotas()">
                        <i class="cil-sync"></i>&nbsp;Actualizar
                    </button>
                    <button type="button" class="btn btn-danger" @click="cerrarModal('editarNota')">
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
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,

                error : 0,
                errors : [],

                id_user : 0, 
                id_update : 0,
                nota_update : 0,

                id_1 : 0,
                id_user_1 : 0,
                user_1 : '',
                fecha_1 : '',
                tipo_1 : 0,
                nota_1 : '',

                id_2 : 0,
                id_user_2 : 0,
                user_2 : '',
                fecha_2 : '',
                tipo_2 : 0,
                nota_2 : '',

                id_3 : 0,
                id_user_3 : 0,
                user_3 : '',
                fecha_3 : '',
                tipo_3 : 0,
                nota_3 : '',

                id_4 : 0,
                id_user_4 : 0,
                user_4 : '',
                fecha_4 : '',
                tipo_4 : 0,
                nota_4 : '',

                id_5 : 0,
                id_user_5 : 0,
                user_5 : '',
                fecha_5 : '',
                tipo_5 : 0,
                nota_5 : '',

                id_6 : 0,
                id_user_6 : 0,
                user_6 : '',
                fecha_6 : '',
                tipo_6 : 0,
                nota_6 : '',

                id_7 : 0,
                id_user_7 : 0,
                user_7 : '',
                fecha_7 : '',
                tipo_7 : 0,
                nota_7 : '',

                id_8 : 0,
                id_user_8 : 0,
                user_8 : '',
                fecha_8 : '',
                tipo_8 : 0,
                nota_8 : '',

                id_9 : 0,
                id_user_9 : 0,
                user_9 : '',
                fecha_9 : '',
                tipo_9 : 0,
                nota_9 : '',

                id_10 : 0,
                id_user_10 : 0,
                user_10 : '',
                fecha_10 : '',
                tipo_10 : 0,
                nota_10 : '',

                id_11 : 0,
                id_user_11 : 0,
                user_11 : '',
                fecha_11 : '',
                tipo_11 : 0,
                nota_11 : '',

                id_12 : 0,
                id_user_12 : 0,
                user_12 : '',
                fecha_12 : '',
                tipo_12 : 0,
                nota_12 : '',

                id_13 : 0,
                id_user_13 : 0,
                user_13 : '',
                fecha_13 : '',
                tipo_13 : 0,
                nota_13 : '',

                id_14 : 0,
                id_user_14 : 0,
                user_14 : '',
                fecha_14 : '',
                tipo_14 : 0,
                nota_14 : '',

                id_15 : 0,
                id_user_15 : 0,
                user_15 : '',
                fecha_15 : '',
                tipo_15 : 0,
                nota_15 : '',

                id_16 : 0,
                id_user_16 : 0,
                user_16 : '',
                fecha_16 : '',
                tipo_16 : 0,
                nota_16 : '',

                id_17 : 0,
                id_user_17 : 0,
                user_17 : '',
                fecha_17 : '',
                tipo_17 : 0,
                nota_17 : '',

                id_18 : 0,
                id_user_18 : 0,
                user_18 : '',
                fecha_18 : '',
                tipo_18 : 0,
                nota_18 : '',

                id_19 : 0,
                id_user_19 : 0,
                user_19 : '',
                fecha_19 : '',
                tipo_19 : 0,
                nota_19 : '',

                id_20 : 0,
                id_user_20 : 0,
                user_20 : '',
                fecha_20 : '',
                tipo_20 : 0,
                nota_20 : '',
            }
        },
        methods : {
            get(){                
                let me = this;

                this.id_user = 0;

                this.id_1 = 0;
                this.id_user_1 = 0;
                this.user_1 = '';
                this.fecha_1 = '';
                this.tipo_1 = 0;
                this.nota_1 = '';
                
                this.id_2 = 0;
                this.id_user_2 = 0;
                this.user_2 = '';
                this.fecha_2 = '';
                this.tipo_2 = 0;
                this.nota_2 = '';
                
                this.id_3 = 0;
                this.id_user_3 = 0;
                this.user_3 = '';
                this.fecha_3 = '';
                this.tipo_3 = 0;
                this.nota_3 = '';
                
                this.id_4 = 0;
                this.id_user_4 = 0;
                this.user_4 = '';
                this.fecha_4 = '';
                this.tipo_4 = 0;
                this.nota_4 = '';
                
                this.id_5 = 0;
                this.id_user_5 = 0;
                this.user_5 = '';
                this.fecha_5 = '';
                this.tipo_5 = 0;
                this.nota_5 = '';
                
                this.id_6 = 0;
                this.id_user_6 = 0;
                this.user_6 = '';
                this.fecha_6 = '';
                this.tipo_6 = 0;
                this.nota_6 = '';
                
                this.id_7 = 0;
                this.id_user_7 = 0;
                this.user_7 = '';
                this.fecha_7 = '';
                this.tipo_7 = 0;
                this.nota_7 = '';
                
                this.id_8 = 0;
                this.id_user_8 = 0;
                this.user_8 = '';
                this.fecha_8 = '';
                this.tipo_8 = 0;
                this.nota_8 = '';
                
                this.id_9 = 0;
                this.id_user_9 = 0;
                this.user_9 = '';
                this.fecha_9 = '';
                this.tipo_9 = 0;
                this.nota_9 = '';
                
                this.id_10 = 0;
                this.id_user_10 = 0;
                this.user_10 = '';
                this.fecha_10 = '';
                this.tipo_10 = 0;
                this.nota_10 = '';
                
                this.id_11 = 0;
                this.id_user_11 = 0;
                this.user_11 = '';
                this.fecha_11 = '';
                this.tipo_11 = 0;
                this.nota_11 = '';
                
                this.id_12 = 0;
                this.id_user_12 = 0;
                this.user_12 = '';
                this.fecha_12 = '';
                this.tipo_12 = 0;
                this.nota_12 = '';
                
                this.id_13 = 0;
                this.id_user_13 = 0;
                this.user_13 = '';
                this.fecha_13 = '';
                this.tipo_13 = 0;
                this.nota_13 = '';
                
                this.id_14 = 0;
                this.id_user_14 = 0;
                this.user_14 = '';
                this.fecha_14 = '';
                this.tipo_14 = 0;
                this.nota_14 = '';
                
                this.id_15 = 0;
                this.id_user_15 = 0;
                this.user_15 = '';
                this.fecha_15 = '';
                this.tipo_15 = 0;
                this.nota_15 = '';
                
                this.id_16 = 0;
                this.id_user_16 = 0;
                this.user_16 = '';
                this.fecha_16 = '';
                this.tipo_16 = 0;
                this.nota_16 = '';
                
                this.id_17 = 0;
                this.id_user_17 = 0;
                this.user_17 = '';
                this.fecha_17 = '';
                this.tipo_17 = 0;
                this.nota_17 = '';

                this.id_18 = 0;
                this.id_user_18 = 0;
                this.user_18 = '';
                this.fecha_18 = '';
                this.tipo_18 = 0;
                this.nota_18 = '';

                this.id_19 = 0;
                this.id_user_19 = 0;
                this.user_19 = '';
                this.fecha_19 = '';
                this.tipo_19 = 0;
                this.nota_19 = '';

                this.id_20 = 0;
                this.id_user_20 = 0;
                this.user_20 = '';
                this.fecha_20 = '';
                this.tipo_20 = 0;
                this.nota_20 = '';

                var url = this.ruta + '/notas/select';

                axios.get(url).then(function (response) {
                    me.id_user = response.data.select[0]["id_user"];

                    if (response.data.select[0]["id_1"] != 0){
                        me.id_1 = response.data.select[0]["id_1"];
                        me.id_user_1 = response.data.select[0]["id_user_1"];
                        me.user_1 = response.data.select[0]["user_1"];
                        me.fecha_1 = response.data.select[0]["fecha_1"];
                        me.tipo_1 = response.data.select[0]["tipo_1"];
                        me.nota_1 = response.data.select[0]["nota_1"];
                    }

                    if (response.data.select[0]["id_2"] != 0){
                        me.id_2 = response.data.select[0]["id_2"];
                        me.id_user_2 = response.data.select[0]["id_user_2"];
                        me.user_2 = response.data.select[0]["user_2"];
                        me.fecha_2 = response.data.select[0]["fecha_2"];
                        me.tipo_2 = response.data.select[0]["tipo_2"];
                        me.nota_2 = response.data.select[0]["nota_2"];
                    }

                    if (response.data.select[0]["id_3"] != 0){
                        me.id_3 = response.data.select[0]["id_3"];
                        me.id_user_3 = response.data.select[0]["id_user_3"];
                        me.user_3 = response.data.select[0]["user_3"];
                        me.fecha_3 = response.data.select[0]["fecha_3"];
                        me.tipo_3 = response.data.select[0]["tipo_3"];
                        me.nota_3 = response.data.select[0]["nota_3"];
                    }

                    if (response.data.select[0]["id_4"] != 0){
                        me.id_4 = response.data.select[0]["id_4"];
                        me.id_user_4 = response.data.select[0]["id_user_4"];
                        me.user_4 = response.data.select[0]["user_4"];
                        me.fecha_4 = response.data.select[0]["fecha_4"];
                        me.tipo_4 = response.data.select[0]["tipo_4"];
                        me.nota_4 = response.data.select[0]["nota_4"];
                    }

                    if (response.data.select[0]["id_5"] != 0){
                        me.id_5 = response.data.select[0]["id_5"];
                        me.id_user_5 = response.data.select[0]["id_user_5"];
                        me.user_5 = response.data.select[0]["user_5"];
                        me.fecha_5 = response.data.select[0]["fecha_5"];
                        me.tipo_5 = response.data.select[0]["tipo_5"];
                        me.nota_5 = response.data.select[0]["nota_5"];
                    }

                    if (response.data.select[0]["id_6"] != 0){
                        me.id_6 = response.data.select[0]["id_6"];
                        me.id_user_6 = response.data.select[0]["id_user_6"];
                        me.user_6 = response.data.select[0]["user_6"];
                        me.fecha_6 = response.data.select[0]["fecha_6"];
                        me.tipo_6 = response.data.select[0]["tipo_6"];
                        me.nota_6 = response.data.select[0]["nota_6"];
                    }

                    if (response.data.select[0]["id_7"] != 0){
                        me.id_7 = response.data.select[0]["id_7"];
                        me.id_user_7 = response.data.select[0]["id_user_7"];
                        me.user_7 = response.data.select[0]["user_7"];
                        me.fecha_7 = response.data.select[0]["fecha_7"];
                        me.tipo_7 = response.data.select[0]["tipo_7"];
                        me.nota_7 = response.data.select[0]["nota_7"];
                    }

                    if (response.data.select[0]["id_8"] != 0){
                        me.id_8 = response.data.select[0]["id_8"];
                        me.id_user_8 = response.data.select[0]["id_user_8"];
                        me.user_8 = response.data.select[0]["user_8"];
                        me.fecha_8 = response.data.select[0]["fecha_8"];
                        me.tipo_8 = response.data.select[0]["tipo_8"];
                        me.nota_8 = response.data.select[0]["nota_8"];
                    }

                    if (response.data.select[0]["id_9"] != 0){
                        me.id_9 = response.data.select[0]["id_9"];
                        me.id_user_9 = response.data.select[0]["id_user_9"];
                        me.user_9 = response.data.select[0]["user_9"];
                        me.fecha_9 = response.data.select[0]["fecha_9"];
                        me.tipo_9 = response.data.select[0]["tipo_9"];
                        me.nota_9 = response.data.select[0]["nota_9"];
                    }

                    if (response.data.select[0]["id_10"] != 0){
                        me.id_10 = response.data.select[0]["id_10"];
                        me.id_user_10 = response.data.select[0]["id_user_10"];
                        me.user_10 = response.data.select[0]["user_10"];
                        me.fecha_10 = response.data.select[0]["fecha_10"];
                        me.tipo_10 = response.data.select[0]["tipo_10"];
                        me.nota_10 = response.data.select[0]["nota_10"];
                    }

                    ////

                    if (response.data.select[0]["id_11"] != 0){
                        me.id_11 = response.data.select[0]["id_11"];
                        me.id_user_11 = response.data.select[0]["id_user_11"];
                        me.user_11 = response.data.select[0]["user_11"];
                        me.fecha_11 = response.data.select[0]["fecha_11"];
                        me.tipo_11 = response.data.select[0]["tipo_11"];
                        me.nota_11 = response.data.select[0]["nota_11"];
                    }

                    if (response.data.select[0]["id_12"] != 0){
                        me.id_12 = response.data.select[0]["id_12"];
                        me.id_user_12 = response.data.select[0]["id_user_12"];
                        me.user_12 = response.data.select[0]["user_12"];
                        me.fecha_12 = response.data.select[0]["fecha_12"];
                        me.tipo_12 = response.data.select[0]["tipo_12"];
                        me.nota_12 = response.data.select[0]["nota_12"];
                    }

                    if (response.data.select[0]["id_13"] != 0){
                        me.id_13 = response.data.select[0]["id_13"];
                        me.id_user_13 = response.data.select[0]["id_user_13"];
                        me.user_13 = response.data.select[0]["user_13"];
                        me.fecha_13 = response.data.select[0]["fecha_13"];
                        me.tipo_13 = response.data.select[0]["tipo_13"];
                        me.nota_13 = response.data.select[0]["nota_13"];
                    }

                    if (response.data.select[0]["id_14"] != 0){
                        me.id_14 = response.data.select[0]["id_14"];
                        me.id_user_14 = response.data.select[0]["id_user_14"];
                        me.user_14 = response.data.select[0]["user_14"];
                        me.fecha_14 = response.data.select[0]["fecha_14"];
                        me.tipo_14 = response.data.select[0]["tipo_14"];
                        me.nota_14 = response.data.select[0]["nota_14"];
                    }

                    if (response.data.select[0]["id_15"] != 0){
                        me.id_15 = response.data.select[0]["id_15"];
                        me.id_user_15 = response.data.select[0]["id_user_15"];
                        me.user_15 = response.data.select[0]["user_15"];
                        me.fecha_15 = response.data.select[0]["fecha_15"];
                        me.tipo_15 = response.data.select[0]["tipo_15"];
                        me.nota_15 = response.data.select[0]["nota_15"];
                    }

                    if (response.data.select[0]["id_16"] != 0){
                        me.id_16 = response.data.select[0]["id_16"];
                        me.id_user_16 = response.data.select[0]["id_user_16"];
                        me.user_16 = response.data.select[0]["user_16"];
                        me.fecha_16 = response.data.select[0]["fecha_16"];
                        me.tipo_16 = response.data.select[0]["tipo_16"];
                        me.nota_16 = response.data.select[0]["nota_16"];
                    }

                    if (response.data.select[0]["id_17"] != 0){
                        me.id_17 = response.data.select[0]["id_17"];
                        me.id_user_17 = response.data.select[0]["id_user_17"];
                        me.user_17 = response.data.select[0]["user_17"];
                        me.fecha_17 = response.data.select[0]["fecha_17"];
                        me.tipo_17 = response.data.select[0]["tipo_17"];
                        me.nota_17 = response.data.select[0]["nota_17"];
                    }

                    if (response.data.select[0]["id_18"] != 0){
                        me.id_18 = response.data.select[0]["id_18"];
                        me.id_user_18 = response.data.select[0]["id_user_18"];
                        me.user_18 = response.data.select[0]["user_18"];
                        me.fecha_18 = response.data.select[0]["fecha_18"];
                        me.tipo_18 = response.data.select[0]["tipo_18"];
                        me.nota_18 = response.data.select[0]["nota_18"];
                    }

                    if (response.data.select[0]["id_19"] != 0){
                        me.id_19 = response.data.select[0]["id_19"];
                        me.id_user_19 = response.data.select[0]["id_user_19"];
                        me.user_19 = response.data.select[0]["user_19"];
                        me.fecha_19 = response.data.select[0]["fecha_19"];
                        me.tipo_19 = response.data.select[0]["tipo_19"];
                        me.nota_19 = response.data.select[0]["nota_19"];
                    }

                    if (response.data.select[0]["id_20"] != 0){
                        me.id_20 = response.data.select[0]["id_20"];
                        me.id_user_20 = response.data.select[0]["id_user_20"];
                        me.user_20 = response.data.select[0]["user_20"];
                        me.fecha_20 = response.data.select[0]["fecha_20"];
                        me.tipo_20 = response.data.select[0]["tipo_20"];
                        me.nota_20 = response.data.select[0]["nota_20"];
                    }
                })
                    .catch(function (error) {
                        console.log(error);
                        //alert(error);
                });
            },
            abrirModal(accion, par_id, par_nota){
                switch(accion){
                    case 'editarNota': {
                        // Variables
                        this.modal = 1;
                        this.tituloModal = 'Edita Nota';
                        this.tipoAccion = 1;

                        this.id_update = par_id;
                        this.nota_update = par_nota;

                        break;
                    }
                 }
            },
            cerrarModal(accion){
                switch(accion){
                    case 'editarNota': {
                        // Variables
                        this.modal = 0;
                        this.tituloModal = '';
                        this.tipoAccion = 0;

                        this.id_update = 0;
                        this.nota_update = '';
            
                            break;
                    }
                }
            },
            archivarNota(id_update){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.put(this.ruta + '/notas/archivar',{
                    'id' : id_update

                }).then(function (response){
                    me.cerrarModal('editarNota');
                    me.get();

                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                });
            },
            updateNotas(){
                this.error = 0;
                this.errors = [];

                let me = this;

                axios.put(this.ruta + '/notas/update_escritorio',{
                    'id' : this.id_update,
                    'nota': this.nota_update

                }).then(function (response){
                    me.cerrarModal('editarNota');
                    me.get();

                }).catch(function (error) {
                    me.error = 1;
                    me.errors = error.response.data.errors;
                });
            }
        },
        mounted() {
            //this.get();
        }
    }
</script>
<style>
    .modal-header{
        background-color: #3c4b64;
        color: rgb(255, 255, 255);
        text-align: center !important;
    }
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }

    .mostrar{
        display: list-item !important;
        top:0;
        z-index: 9999;
        overflow-y: scroll;
        opacity: 1 !important;
        position: fixed !important;
        background-color: #3c29297a !important;
    }
    .table thead {
        background-color: rgb(47,60,84);
        color: rgb(255, 255, 255);
        text-align: center;
    }
    .table tbody {
        text-align: center;
    }

    .table thead tr th {
        position: sticky;
        top: 0;
        overflow-y: auto; 
    }
    .mx-datepicker-main.mx-datepicker-popup {
        z-index: 20000;
    } 
</style>