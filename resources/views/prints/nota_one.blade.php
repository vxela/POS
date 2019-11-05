<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{asset('print/paper.css')}}"> --}}
    <style>
        @media print {
            body {
                width: 75mm;/*width of index card*/
                height: auto;/*height of index card*/
            }
            /* etc */
        }

        /* @page { size: 75mm 100mm} */ /* output size */
        /* body.receipt .sheet {font-family: 'Courier New', Courier, monospace} sheet size */
        /* @media print { body.receipt { width: 58mm } } */
    </style>
</head>
<body class="recipt">
        <section class="sheet recipe">
        =========================
        <div style="text-align:center; font-weight:bold; font-size : 14px">
            ROXZON 
            <br>
            AIR MINUM MALANG <br>
        </div>
        =========================
        <div style="text-align:left; font-weight:light; font-size : 12px">
            Nota ID     : {{$data_faktur->id}} <br>
            Nota Number : {{$data_faktur->nota_number}} <br>
            Nota Date   : {{Carbon\Carbon::createFromFormat('Y-m-d', $data_faktur->order_date)->formatLocalized('%A, %d %h %Y')}} <br>
            Kasir       : {{$data_faktur->getUser()->name}} <br>
            <br>
            Bill untuk  : <br>
            Nama : {{$data_faktur->getCustomer()->ctm_name}} <br>
            Alamat :{{$data_faktur->getCustomer()->ctm_org_address}}<br>
            Kontak :{{$data_faktur->getCustomer()->ctm_contact}}
        </div>
        =========================
        <div style="text-align:left; font-weight:light; font-size : 11px">
        <table style="width:100%;">
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Hrg</th>
                <th>Jml</th>
                <th>Jml Hrg</th>
            </tr>
            @php
                $n = 1;
            @endphp
            @foreach ($data_sale as $sale)
                <tr>
                    <td style="vertical-align: top;">{{$n++}}</td>
                    <td style="vertical-align: top;">{{$sale->getProduk()->product_name}}</td>
                    <td style="vertical-align: top; text-align: right;">{{number_format($sale->getProduk()->product_price)}}</td>
                    <td style="vertical-align: top; text-align: center;">{{$sale->jml_barang}}</td>
                    <td style="vertical-align: top; text-align: right;">{{number_format($sale->order_price)}}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="2" style="font-size: 12px; text-align: left; font-weight: bold;">Total Bayar :</td>
                    <td colspan="3" style="font-size: 12px; text-align: right; font-weight: bold;">{{'Rp. '.number_format($data_faktur->order_price).'-'}}</td>
                </tr>
        </table>
        </div>
        =========================
        <div style="text-align:left; font-weight:light; font-size : 11px; text-align:center;">
            <h4>** TERIMA KASIH **</h4>
        </div>
        </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        window.print();
    });
</script>
</body>
</html>