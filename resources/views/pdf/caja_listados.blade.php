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
		<h1 style="text-align: center;">LISTADO DE MOVIMIENTOS DE CAJA</h1>
	</div>
   
    <header>
        <div id="fact">
            <p>
                <b>Fecha - Desde: </b>{{ $desde_fecha }}
                <br>
                <b>Fecha - Hasta: </b>{{ $hasta_fecha }} 
            </p> 
        </div>
    </header>
    <br>
	<div>
        <h3 style="text-align: center;">INGRESOS</h3>
		<table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Movimiento</th>
                    <th>Comprobante</th>
                    <th>Paciente</th>
                    <th>Medico</th>
                    <th>O. S.</th>
                    <th>Total</th>
                    <th>Efectivo</th>
                    <th>Bancos</th>
                    <th>Cheques</th>
                    <th>Tarjetas</th>
                    <th>Otros</th>
                    <th>Observacion</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($caja_listado_ingresos as $cli)
                <tr>
                    <td>{{ $cli->fecha }}</td>
                    <td>{{ $cli->descripcion_tipo_comprobante }}</td>
                    <td>{{ $cli->comprobante }}</td>
                    <td>{{ $cli->paciente }}</td>
                    <td>{{ $cli->medico }}</td>
                    <td>{{ $cli->obra_social }}</td>
                    <td>{{ $cli->total }}</td>
                    <td>{{ $cli->efectivo }}</td>
                    <td>{{ $cli->bancos }}</td>
                    <td>{{ $cli->cheques }}</td>
                    <td>{{ $cli->tarjetas }}</td>
                    <td>{{ $cli->otros }}</td>
                    <td>{{ $cli->observacion }}</td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
	</div>
    <div class="izquierda">
        @foreach ($caja_listado_ingresos as $cli)
            <p><strong>Total Ingresos:  </strong>{{ $cli->ingresos }}</p>
            <p>
                <strong>Total Efectivo:  </strong>{{ $cli->ingresos_efectivo }}
                <strong>-</strong>
                <strong>Total Tarjetas:  </strong>{{ $cli->ingresos_tarjetas }}
                <strong>-</strong>
                <strong>Total Bancos:  </strong>{{ $cli->ingresos_bancos }}
                <strong>-</strong>
                <strong>Total Cheques:  </strong>{{ $cli->ingresos_cheques }}
                <strong>-</strong>
                <strong>Total otros:  </strong>{{ $cli->ingresos_otros }}
            </p>
            @break
        @endforeach
    </div>
    <br><br><br><br><br>
    <div>
        <h3 style="text-align: center;">EGRESOS</h3>
		<table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Movimiento</th>
                    <th>Comprobante</th>
                    <th>Paciente</th>
                    <th>Medico</th>
                    <th>O. S.</th>
                    <th>Total</th>
                    <th>Efectivo</th>
                    <th>Bancos</th>
                    <th>Cheques</th>
                    <th>Tarjetas</th>
                    <th>Otros</th>
                    <th>Observacion</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($caja_listado_egresos as $cli)
                <tr>
                    <td>{{ $cli->fecha }}</td>
                    <td>{{ $cli->descripcion_tipo_comprobante }}</td>
                    <td>{{ $cli->comprobante }}</td>
                    <td>{{ $cli->paciente }}</td>
                    <td>{{ $cli->medico }}</td>
                    <td>{{ $cli->obra_social }}</td>
                    <td>{{ $cli->total }}</td>
                    <td>{{ $cli->efectivo }}</td>
                    <td>{{ $cli->bancos }}</td>
                    <td>{{ $cli->cheques }}</td>
                    <td>{{ $cli->tarjetas }}</td>
                    <td>{{ $cli->otros }}</td>
                    <td>{{ $cli->observacion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
	</div>
    <div class="izquierda">
        @foreach ($caja_listado_ingresos as $cli)
            <p><strong>Total Egresos:  </strong>{{ $cli->egresos }}</p>
            <p>
                <strong>Total Efectivo:  </strong>{{ $cli->egresos_efectivo }}
                <strong>-</strong>
                <strong>Total Tarjetas:  </strong>{{ $cli->egresos_tarjetas }}
                <strong>-</strong>
                <strong>Total Bancos:  </strong>{{ $cli->egresos_bancos }}
                <strong>-</strong>
                <strong>Total Cheques:  </strong>{{ $cli->egresos_cheques }}
                <strong>-</strong>
                <strong>Total otros:  </strong>{{ $cli->egresos_otros }}
            </p>
            @break
        @endforeach
    </div>
    <br><br><br><br><br>
    <hr>
    <div class="izquierda">
        @foreach ($caja_listado_ingresos as $cli)
            <p><strong>Total General:  </strong>{{ $cli->ingresos - $cli->egresos}}</p>
            <p>
                <strong>Total General Efectivo:  </strong>{{ $cli->ingresos_efectivo - $cli->egresos_efectivo}}
                <strong>-</strong>
                <strong>Total General Tarjetas:  </strong>{{ $cli->ingresos_tarjetas - $cli->egresos_tarjetas }}
                <strong>-</strong>
                <strong>Total General Bancos:  </strong>{{ $cli->ingresos_bancos - $cli->egresos_bancos }}
                <strong>-</strong>
                <strong>Total General Cheques:  </strong>{{ $cli->ingresos_cheques - $cli->egresos_cheques }}
                <strong>-</strong>
                <strong>Total General otros:  </strong>{{ $cli->ingresos_otros - $cli->egresos_otros}}
            </p>
            @break
        @endforeach
    </div>
    <footer>
        <span class="derecha">FECHA DE EMISION {{ now() }}</span>
    </footer>
</body>
</html>