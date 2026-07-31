@extends('dashboard.base')
@section('content')
     @if(Auth::check()) 
        <template v-if="menu==0">
            <escritorio :ruta="ruta"></escritorio>
        </template>
        <template v-if="menu==1">
            <padron :ruta="ruta"></padron>
        </template>

        <template v-if="menu==2">
            <users :ruta="ruta"></users>
        </template>
    
        <template v-if="menu==3">
            <usuarios_password :ruta="ruta"></usuarios_password>
        </template>

        <template v-if="menu==4">
            <notas :ruta="ruta"></notas>
        </template>

        <template v-if="menu==5">
            <punteo :ruta="ruta"></punteo>
        </template>

        <template v-if="menu==6">
            <comida :ruta="ruta"></comida>
        </template>

        <template v-if="menu==7">
            <conteo :ruta="ruta"></conteo>
        </template>

        <template v-if="menu==8">
            <graficos :ruta="ruta"></graficos>
        </template>

        <template v-if="menu==9">
            <conteo_fiscal :ruta="ruta"></conteo_fiscal>
        </template>

        <template v-if="menu==10">
            <combustible :ruta="ruta"></combustible>
        </template>

        <template v-if="menu==99">
            <roles :ruta="ruta"></roles>
        </template>
    @endif 
@endsection
