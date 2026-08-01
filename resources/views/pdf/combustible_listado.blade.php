<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Combustible</title>
    <style>
        @page { 
            size: A4 landscape;
            margin: 20px 25px; 
        }
        body { 
            font-family: Helvetica, Arial, sans-serif; 
            font-size: 9px; 
            color: #333333; 
        }
        
        .header-report { 
            text-align: center; 
            margin-bottom: 15px; 
        }
        .header-report h2 { 
            color: #1e3a5f; 
            margin: 0; 
            font-size: 14px; 
            font-weight: bold; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
        }
        .header-report .subtitle { 
            color: #4b5563; 
            font-size: 11px; 
            margin-top: 3px; 
            font-weight: bold; 
        }
        .header-report .date { 
            color: #6b7280; 
            font-size: 9px; 
            margin-top: 2px; 
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th { 
            background-color: #1d2b45; 
            color: #ffffff; 
            font-weight: bold; 
            padding: 6px 4px; 
            text-align: left; 
            font-size: 8.5px; 
            border: none; 
            text-transform: uppercase; 
        }
        td { 
            padding: 4px 4px; 
            font-size: 9px; 
            border-bottom: 1px dashed #cbd5e1; 
            border-left: none; 
            border-right: none; 
            border-top: none; 
            vertical-align: middle; 
        }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .spacer-col { background-color: #ffffff !important; border: none !important; width: 2%; }
        
        .footer-total { 
            width: 100%; 
            font-size: 9px; 
            margin-top: 8px; 
            border-top: 2px solid #1d2b45; 
            padding-top: 6px; 
        }
        .izquierda { float: left; font-weight: bold; color: #1e3a5f; }
        .derecha { float: right; color: #6b7280; font-size: 8.5px; }
        .alert-text { color: #e74c3c; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header-report">
        <h2>LISTADO CONTROL DE COMBUSTIBLE</h2>
        <div class="subtitle">PRONET SI</div>
        <div class="date">Hasta Fecha: {{ date('d/m/Y') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="24%">NOMBRE</th>
                <th width="8%" class="text-right">AUTORIZADO</th>
                <th width="8%" class="text-right">CARGADO</th>
                <th width="9%" class="text-center">HORA</th>
                
                <th class="spacer-col"></th>
                
                <th width="24%">NOMBRE</th>
                <th width="8%" class="text-right">AUTORIZADO</th>
                <th width="8%" class="text-right">CARGADO</th>
                <th width="9%" class="text-center">HORA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($combustible->chunk(2) as $chunk)
            <tr>
                @php 
                    $first = $chunk->first(); 
                    $last = $chunk->last(); 
                @endphp
                
                <!-- COLUMNA IZQUIERDA -->
                <td>{{ \Illuminate\Support\Str::limit($first->nombre, 25) }}</td>
                <td class="text-right">{{ number_format($first->autorizado, 2, ',', '.') }} L</td>
                <td class="text-right">
                    @if($first->cargado)
                        <span class="{{ $first->cargado > $first->autorizado ? 'alert-text' : '' }}">
                            {{ number_format($first->cargado, 2, ',', '.') }} L
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td class="text-center">{{ $first->fecha_carga ? \Carbon\Carbon::parse($first->fecha_carga)->format('d/m H:i') : '-' }}</td>
                
                <!-- ESPACIADOR -->
                <td class="spacer-col"></td>
                
                <!-- COLUMNA DERECHA -->
                @if($chunk->count() == 2)
                    <td>{{ \Illuminate\Support\Str::limit($last->nombre, 25) }}</td>
                    <td class="text-right">{{ number_format($last->autorizado, 2, ',', '.') }} L</td>
                    <td class="text-right">
                        @if($last->cargado)
                            <span class="{{ $last->cargado > $last->autorizado ? 'alert-text' : '' }}">
                                {{ number_format($last->cargado, 2, ',', '.') }} L
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td class="text-center">{{ $last->fecha_carga ? \Carbon\Carbon::parse($last->fecha_carga)->format('d/m H:i') : '-' }}</td>
                @else
                    <td></td><td></td><td></td><td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-total">
        <div class="izquierda">
            Total Autorizado: {{ number_format($total_autorizado, 2, ',', '.') }} L &nbsp;&nbsp;|&nbsp;&nbsp; 
            Total Entregado: {{ number_format($total_cargado, 2, ',', '.') }} L
        </div>
        <div class="derecha">
            Emisión: {{ date('d/m/Y H:i') }}
        </div>
    </div>
</body>
</html>