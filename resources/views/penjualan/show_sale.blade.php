@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Penjualan {{$data_penjualan->getProduk()->product_name}}</h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-info-circle"></i> {{ session('status') }}
                        </div>
                    @endif
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <strong>
                                Nomor Nota
                            </strong>
                        </div>
                        <div class="col-lg-9">
                            <strong>
                                {{$data_penjualan->nota_number}}
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <strong>
                                Nama Produk
                            </strong>
                        </div>
                        <div class="col-lg-9">
                            <strong>
                                {{$data_penjualan->getProduk()->product_name}}
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <strong>
                                Harga Satuan
                            </strong>
                        </div>
                        <div class="col-lg-9">
                            <strong>
                                {{Fprice::Rupiah($data_penjualan->getProduk()->product_price)}}
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <strong>
                                Jumlah Produk
                            </strong>
                        </div>
                        <div class="col-lg-9">
                            <strong>
                                {{$data_penjualan->product_quantity}}
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <strong>
                                Harga Total
                            </strong>
                        </div>
                        <div class="col-lg-9">
                            <strong>
                                {{Fprice::Rupiah($data_penjualan->product_quantity * $data_penjualan->getProduk()->product_price)}}
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <strong>
                                Status
                            </strong>
                        </div>
                        <div class="col-lg-9">
                            <strong>
                                @if ($data_penjualan->status_order == 'lunas')
                                    <span class="label label-primary" style="font-size:100%">
                                        {{$data_penjualan->status_order}}                                        
                                    </span>
                                @elseif ($data_penjualan->status_order == 'utang')
                                    <span class="label label-warning" style="font-size:100%">
                                        {{$data_penjualan->status_order}}                                        
                                    </span>
                                @else 
                                    <span class="label label-info" style="font-size:100%">
                                        {{$data_penjualan->status_order}}                                        
                                    </span>
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-12">
                            <button type="b9tton" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Data</button>
                            <button type="b9tton" class="btn btn-warning"><i class="fa fa-print"></i> Print Nota</button>
                            <button type="b9tton" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Nota</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection