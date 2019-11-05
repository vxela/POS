<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Receipt</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <!-- <link rel="stylesheet" href="paper.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
  

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A5 landscape }</style>

  <!-- Custom styles for this document -->
  <link href='https://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
  <style>
    body {
      width: 75mm;
    }
    @page {
      size: 2.95in 5.11in;
    }
    @media print and (width: 75mm) and (height: 120mm) {
      @page {
         margin: 3mm;
      }
    }
    /*@media print {
      @page {
        size: 2.95in 5.11in;
        width: 75px;
      }
      body.recipt {
        width: 75mm;
      }
    }*/

    .recipt {
      width: 75mm;
      margin: auto;
    }
    .sheet {
      padding-left: 5mm;
      padding-right: 5mm;
      text-align: center;
    }
  </style>
</head>
<body class="recipt">
        <section class="sheet">
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