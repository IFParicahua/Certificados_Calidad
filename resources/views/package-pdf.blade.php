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
        html{margin:0px 120px}
        body{
            font-family: sans-serif;
            font-size: 14px;
          }
        table {
            width: 100%;
            text-align: left;
            border-collapse: collapse;
            margin: 0 0 1em 0;
            caption-side: top;
         }
         {{--  th, td {
            border: 1px solid #000;
         }  --}}

         .title{
            padding-top: 200px;
            font-size: 68pt;
            font-weight: bold;
            padding-bottom: 10px;
            padding-left: 6px
         }
         .subtitle{
            font-size: 36pt;
            padding: 6px;
            padding-bottom: 35px;
         }
         .text_diametro{
            font-size: 36pt;
            font-weight: bold;
         }
         .text_longitud{
            font-size: 36pt;
            padding-bottom: 35px
         }
         .data_title{
            width: 150px;
            padding-right: 20px;
            font-size: 24pt;
            padding-top: 0.4em;
            padding-bottom: 0.4em;
         }
         .data_text{
            font-size: 24pt;
            width: 150px;
            padding-top: 0.4em;
            padding-bottom: 0.4em;
         }
         .title_peso{
            font-size: 24pt;
            padding-top: 35px;
            padding-bottom: 10px;

         }
         .text_peso{
            font-size: 36pt;
            font-weight: bold;
         }
         .footer{
            text-align: center;
            font-size: 68pt;
            font-weight: bold;
            padding-top: 30px
         }
        {{--
         caption, td, th {
            padding: 65px;
         }  --}}

         th:lastchild, td:lastchild {
             border-right: 0;
         }
         th {
            padding-bottom: 5px;
         }
         .tdcode{
            {{--  padding-right: 1px;  --}}
            width: 100px;
         }
         .div_code {
            writing-mode: vertical-lr;
            transform: rotate(-90deg);
            height: 120px
        }
        .code2{
            height: 110px !important;
        }
    </style>

 @forelse ($collection as $item)

 <table>
     <tr>
         <td colspan="3" class="title">LAS LOMAS</td>
     </tr>
     <tr>
        <td colspan="3" class="subtitle">NB732-AH500S</td>


    </tr>
    <tr>
        <td colspan="2" class="text_diametro">{{ str_replace('.', ',', $item->lote->producto->diametro) }} mm</td>

    </tr>
    <tr>
        <td colspan="2" class="text_longitud">{{ str_replace('.', ',', $item->lote->producto->longitud) }} m</td>
    </tr>
    <tr>
        <td colspan="1" class="data_title">Lote:</td>
        <td colspan="1" class="data_text">{{ $item->lote->code }}</td>
        <td colspan="1" rowspan="6" class="tdcode">
            <div class="div_code">
                {{ $item->barcode }}
                {!! DNS1D::getBarcodeHTML($item->barcode, 'C128'); !!}
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="1" class="data_title">Paquete:</td>
        <td colspan="1" class="data_text">0{{ $item->package }}</td>
    </tr>
    <tr>
        <td colspan="1" class="data_title">Material:</td>
        <td colspan="1" class="data_text">{{ $item->lote->producto->material }}</td>
    </tr>
    <tr>
        <td colspan="2" class="title_peso">Peso:</td>
    </tr>
    <tr>
        <td colspan="2" class="text_peso">{{ str_replace('.', ',', (trim(trim($item->peso,0), '.'))) }} kg</td>
    </tr>
    <tr>
        <td colspan="3" class="footer">HECHO EN BOLIVIA</td>
    </tr>

 </table>

 @empty
     <p>No hay datos encontrados</p>
 @endforelse

</body>
</html>
