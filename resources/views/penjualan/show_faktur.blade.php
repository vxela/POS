@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="col-lg-12">
                    <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Penjualan</h3>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('status') && Session::has('msg'))
                            {{Mush::showNotif(Session::get('status'), Session::get('msg'))}}
                        @endif
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <h5 class="po-head">{{$data_faktur->getCustomer()->ctm_name}}</h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="po-head">{{$data_faktur->getCustomer()->ctm_org_address}}</h5>
                                    </div>
                                    <div class="row">
                                        <h5 class="po-head">{{$data_faktur->getCustomer()->ctm_contact}}</h5>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table">
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
                                                    <td>{{$sale->getProduk()->product_price}}</td>
                                                    <td>{{$sale->jml_barang}}</td>
                                                    <td>{{$sale->order_price}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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