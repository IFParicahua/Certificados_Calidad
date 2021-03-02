<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9pt;
        }
        .table1 {
            width: 100%;
            text-align: left;
            border-collapse: collapse;
            margin: 0 0 1em 0;
            caption-side: top;

         }
         th, td {
            border: 1px solid #000;

         }
         p {
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .t1{
            font-size: 8pt;
            font-weight: lighter;
        }
        .t2{
            font-size: 8pt;
            font-weight: bold;
        }
        .t3{
            font-size: 9pt;
            font-weight: lighter;
        }
        .t4{
            font-size: 16pt;
            font-weight: bold;
        }
        .t5{
            text-align: center
        }
    </style>
<div style="border-right: 1px solid #000">
    <table class="table1">
        <thead>
            <tr>
                <th colspan="3" >
                    <div >
                        <img src="../public/img/logo_las_lomas-05.png" style="height: 50px" alt="">
                    </div>
                </th>
                <th colspan="10" style="text-align: left">
                    <label class="t2">SIDERURGICA LAS LOMAS LTDA.</label> <br>
                    <label class="t1">
                        PLANTA DON CARLOS, KM 85 AL NORTE<br>
                        TELF.: +591 3 3593500 <br>
                        SANTA CRUZ - BOLIVIA
                    </label>
                </th>
                <th colspan="2" style="border-right: 1px solid #fff">
                    <label>Nº SDLL-FR-1302-003-0 / 26-02-2021</label><br>
                    <label class="t3">Fecha: {{ $fecha }}</label>
                </th>
            </tr>
            <tr>
                <th colspan="15" style="border-right: 1px solid #fff" class="t4">CERTIFICADO DE CALIDAD</th>
            </tr>
            <tr>
                <th colspan="2" style="padding-top: 8px; padding-bottom: 8px">Cliente: </th>
                <th colspan="5"><p class="t3">{{ $titles->cliente->name }}</p></th>
                <th colspan="2">Nº Pedido de venta:</th>
                <th colspan="2"><p class="t3">{{ $titles->n_pedido }}</p></th>
                <th colspan="2">Norma: </th>
                <th colspan="2" style="border-right: 1px solid #fff"><p class="t3">{{ $empresa->rule }}</p></th>
            </tr>
            <tr>
                <th colspan="2" style="padding-top: 8px; padding-bottom: 8px">Producto: </th>
                <th colspan="5"><p class="t3">{{ $titles->lotes[0]->producto->description }}</p></th>
                <th colspan="2">Nº Orden de salida:</th>
                <th colspan="2"><p class="t3">{{ $titles->n_orden }}</p></th>
                <th colspan="2">Peso Neto (kg): </th>
                <th colspan="2" style="border-right: 1px solid #fff"><p class="t3">{{ $titles->lotes[0]->masa_lineal }}</p></th>
            </tr>
            <tr>
                <th colspan="2" rowspan="3" >LOTE</th>
                <th  rowspan="3" style="width: 80px">MASA <br> LINEAL <br> kg/m</th>
                <th colspan="5">PROPIEDADES MECÁNICAS</th>
                <th colspan="4">GEOMETRIA DE CORRUGA</th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
            </tr>
            <tr>
                <th colspan="1">Fy</th>
                <th colspan="1">Fx</th>
                <th colspan="1">A</th>
                <th colspan="1">RE</th>
                <th colspan="1">D</th>
                <th colspan="1"><label class="t2">ALTURA</label></th>
                <th colspan="1"><label class="t2">ESPAC.</label></th>
                <th colspan="1"><label class="t2">GAP</label></th>
                <th colspan="1"><label class="t2">ANGULO</label></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
            </tr>
            <tr>
                <th  colspan="1">( MPa )</th>
                <th  colspan="1">( MPa )</th>
                <th  colspan="1">%</th>
                <th  colspan="1">(Fx/Fy)</th>
                <th  colspan="1">180°</th>
                <th  colspan="1">mm</th>
                <th  colspan="1">mm</th>
                <th  colspan="1">mm</th>
                <th  colspan="1">º</th>
                <th  colspan="1" style="border: 1px solid #ffffff;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td class="item t5" colspan="2"><p>{{ $item->code }}</p></td>
                    <td class="item t5"><p>{{ $item->masa_lineal }}</p></td>
                    <td class="item t5"><p>{{ $item->mechanics->avg->fy }}</p></td>
                    <td class="item t5"><p>{{ $item->mechanics->avg->fx }}</p></td>
                    <td class="item t5"><p>{{ $item->mechanics->avg->a }}</p></td>
                    <td class="item t5"><p>{{ $item->mechanics->avg->re }}</p></td>
                    <td class="item t5"><p>{{ $item->mechanics[0]->d }}</p></td>
                    <td class="item t5"><p>{{ $item->geometries->avg->altura }}</p></td>
                    <td class="item t5"><p>{{ $item->geometries->avg->espaciamiento }}</p></td>
                    <td class="item t5"><p>{{ $item->geometries->avg->gap }}</p></td>
                    <td class="item t5"><p>{{ $item->geometries->avg->angulo }}</p></td>
                    <th style="border: 1px solid #ffffff;"></th>
                </tr>
            @empty

            @endforelse
            @for($i = 0; $i < $val; $i++)
            <tr>
                <td class="item" colspan="2"></td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <td class="item" style="color: #ffffff">_</td>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
            </tr>
            @endfor
        </tbody>
        <thead>
            <tr>
                <th colspan="2" rowspan="2">LOTE</th>
                <th colspan="5">ANÁLISIS QUÌMICO</th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
                <th style="border: 1px solid #ffffff;"></th>
            </tr>
            <tr>
                <th>% C</th>
                <th>% Mn</th>
                <th>% Si</th>
                <th>% P</th>
                <th>% S</th>
                <th style="border: 1px solid #ffffff;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td class="item t5" colspan="2"><p>{{ $item->code }}</p></td>
                    <td class="item t5"><p>{{ $item->chemicals->avg->c }}</p></td>
                    <td class="item t5"><p>{{ $item->chemicals->avg->mn }}</p></td>
                    <td class="item t5"><p>{{ $item->chemicals->avg->si }}</p></td>
                    <td class="item t5"><p>{{ $item->chemicals->avg->p }}</p></td>
                    <td class="item t5"><p>{{ $item->chemicals->avg->s }}</p></td>
                    <th style="border: 1px solid #ffffff;"></th>
                </tr>
            @empty

            @endforelse
            @if ($val > 0)
                @for($i = 0; $i < $val; $i++)
                    @if ($i < 4)
                    <tr>
                        <td class="item" colspan="2"></td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <th style="border: 1px solid #ffffff;"></th>
                    </tr>
                    @else
                    <tr>
                        <td class="item" colspan="2"></td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <td class="item" style="color: #ffffff">_</td>
                        <th style="border-botton: 1px solid #000;"></th>
                    </tr>
                    @endif
                @endfor
            @else
                <tr>
                    <td class="item" colspan="2"></td>
                    <td class="item" style="color: #ffffff">_</td>
                    <td class="item" style="color: #ffffff">_</td>
                    <td class="item" style="color: #ffffff">_</td>
                    <td class="item" style="color: #ffffff">_</td>
                    <td class="item" style="color: #ffffff">_</td>
                    <td style="border-botton: 1px solid #000;"></td>
                </tr>
            @endif
        </tbody>
        <tbody>
            <tr>
                <td style="border-right: 1px  solid #ffffff;width: 130px">REFERENCIAS:</td>
                <td style="border-left:1px  solid #ffffff;width: 50px"></td>
                <td colspan="3" >Fy - Tensión de Fluencia</td>
                <td colspan="3" style="border: 1px solid #000;">Fx - Resistencia a la tracción</td>
                <td colspan="3">A - Alargamiento</td>
                <td colspan="4" style="border-right: 1px solid #fff">D - Doblado</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <td colspan="15" style="border-right: 1px solid #fff;color: #ffffff">- <br> -</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="12" style="padding: 10px" class="t1">
                    Este documento certifica que el material indicado en el presente documento fue producido, ensayado y aprobado en concordancia de los requerimiento de la norma NB732.
                    <br>
                    SIDERURGICA LAS LOMAS no se hace responsable pro las copias de este certificado que pueden ser realizadas por terceros.
                </td>
                <td colspan="3" style="border-right: 1px solid #fff;text-align: center;padding: 20px" class="t1">
                    Ing. Montserrat Zamorano <br>
                    GESTIÓN DE CALIDAD <br>
                    Aprobado por:
                </td>
            </tr>
        </tbody>
    </table>
</div>
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(750, 550, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>
</html>
