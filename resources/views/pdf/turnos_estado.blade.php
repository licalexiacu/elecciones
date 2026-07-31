<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="img/SGT_Icono.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Reporte de Turnos</title>

	<style>
		body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875rem;
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
		<h1 style="text-align: center;">LISTADO DE TURNOS</h1>
	</div>
    @foreach ($turnos as $t)
        <header>
            <div id="fact">
                <p>
                    <b>Fecha: </b>{{ $t->fecha }}
                    <br>
                    <b>Profesional: </b>{{ $t->medico }} 
                    <br>
                    <b>Especialidad: </b>{{ $t->especialidad }}
                </p> 
            </div>
        </header>
        <br>
    @endforeach
	<div>
		<table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>DNI</th>
                    <th>Paciente</th>
                    <th>Obra Social</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($turnos_lineas as $tl)
                <tr>
                    <td>{{ $tl->hora }}</td>
                    <td>{{ $tl->estado_descripcion }}</td>
                    <td>{{ $tl->dni }}</td>
                    <td>{{ $tl->paciente }}</td>
                    <td>{{ $tl->obra_social }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
	</div>
	<div class="izquierda">
		<p><strong>Total de Turnos:  </strong>{{ $contador }}</p>
	</div>
    <br>
    <footer>
        <span class="derecha">FECHA DE EMISION {{ now() }}</span>
    </footer>
</body>
</html>