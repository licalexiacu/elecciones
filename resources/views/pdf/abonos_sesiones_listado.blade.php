<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="img/SGT_Icono.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Reporte de Turnos por abono</title>

	<style>
		body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.600rem;
            font-weight: normal;
            line-height: 1.5;
            color: #151b1e;           
        }
        .table {
            display: table;
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid #c2cfd6;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #c2cfd6;
            
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #c2cfd6;
            
        }
        .table-bordered thead th, .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #c2cfd6;
        }
        th, td {
            display: table-cell;
            vertical-align: inherit;
        }
        th {
            font-weight: bold;
            text-align: -internal-center;
            text-align: left;
        }
        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .izquierda{
            float:left;
        }
        .derecha{
            float:right;
        }
	</style>
</head>
<body>
	<div>
		<h1 style="text-align: center;">LISTADO DE TURNOS POR PACIENTE</h1>
	</div>
   
    <header>
        <div id="fact">
        </div>
    </header>
    <hr>
	<div>
        <div id="fact">
            @foreach ($turnos as $t)
                <b>DNI: </b>{{ $t->dni }}
                <br>
                <b>Paciente: </b>{{ $t->paciente }}
                <br>
                <b>Ficha: </b>{{ $t->ficha }}
                <hr>
                <b>Numero de Abono: </b>{{ $t->numero }} &nbsp; &nbsp;
                <b>Fecha de Abono: </b>{{ $t->fecha }} &nbsp; &nbsp;
                <b>Obra Social (Prestacion): </b>{{ $t->obra_social_presataciones }}
                <br>
                <b>Sesiones Contratadas: </b>{{ $t->cantidad }} &nbsp; &nbsp;
                <b>Tipo de Vencimiento: </b>{{ $t->tipo_vencimiento_descripcion }} &nbsp; &nbsp;
                <b>Sesiones Restantes: </b>{{ $t->saldo_cantidad }}
                @break 
            @endforeach
        </div>
        <br>
		<table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Fecha Turno</th>
                    <th>Hora Turno</th>
                    <th>Profesional</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($turnos as $t)
                    <tr>
                        <td>{{ $t->fecha_turno }}</td>
                        <td>{{ $t->hora }}</td>
                        <td>{{ $t->medico }}</td>
                        <td>{{ $t->observaciones }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
    <footer>
        <span class="derecha">FECHA DE EMISION {{ now() }}</span>
    </footer>
</body>
</html>