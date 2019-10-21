@extends('layouts._GdgTempelate')

@section('content')
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Produksi {{$data_produksi->getProduk()->product_name}}</h3>
                    <div class="right">
                        
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Kode Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->getProduk()->product_code}}
                                </div>   
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Nama Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->getProduk()->product_name}}
                                </div>   
                            </div>   
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Jumlah Produksi
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->product_quantity}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Tanggal Produksi
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->activity_date}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Oleh
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->getUser()->name}}
                                </div>   
                            </div>  
                            <div class="row mb-1">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    <a href="/produksi/{{$data_produksi->id}}/edit" class="btn btn-success btn-sm">Edit data</a>
                                </div>   
                            </div>                                                                                  
                        </div>
                        <div class="col-md-4">
                                {{-- here --}}
                        </div>                                                
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection