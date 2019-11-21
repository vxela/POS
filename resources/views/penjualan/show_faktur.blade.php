@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="col-lg-12">
                    <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="panel-title">Data Penjualan</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="{{'/penjualan/print/nota/'.$data_faktur->id}}" class="btn btn-warning" target="_blank">Print Nota</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('status') && Session::has('msg'))
                            {{Mush::showNotif(Session::get('status'), Session::get('msg'))}}
                        @endif
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <h5 class="po-head">{{$data_faktur->getCustomer()->name}}</h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="po-head">{{$data_faktur->getCustomer()->address}}</h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="po-head">{{$data_faktur->getCustomer()->contact}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <div class="row">
                                        <h5 class="po-head">CV. Tirta Mangkok Merah</h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="po-head">Jl. Villa Tidar Indah No.6 <br> Sukun Kota Malang</h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="po-head">{{Carbon\Carbon::createFromFormat('Y-m-d', $data_faktur->order_date)->formatLocalized('%A, %d %h %Y')}}</h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                            @foreach ($data_sale as $sale)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$sale->getProduk()->product_name}}</td>
                                                    <td class="text-right">{{number_format($sale->getProduk()->product_price)}}</td>
                                                    <td class="text-right">{{$sale->jml_barang}}</td>
                                                    <td class="text-right">{{number_format($sale->order_price)}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total bayar</th>
                                                <th class="text-right">{{number_format($data_faktur->order_price)}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="po-head">
                                        Oleh : {{$data_faktur->getUser()->name}} <br>
                                        @php
                                            $dt = $data_faktur->created_at;
                                            $arfdt = explode(" ", $dt);
                                            $date = $arfdt[0];
                                            $time = $arfdt[1];
                                        @endphp
                                        Tanggal : {{$date}} <br>
                                        Waktu : {{$time}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->

            </div>
        </div> 
</div>  
@endsection