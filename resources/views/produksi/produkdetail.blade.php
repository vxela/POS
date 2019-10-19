@extends('layouts._GdgTempelate')

@section('content')
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Produk {{$data_produk->product_name}}</h3>
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
                                    {{$data_produk->product_code}}
                                </div>   
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Nama Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->product_name}}
                                </div>   
                            </div>   
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Kategori Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->category()->category_name}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Harga Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->product_price}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Owner Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->product_owner}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Deskripsi Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->product_desc}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Di input oleh
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->getUser()->name}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                        Di input pada
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->created_at}}
                                </div>   
                            </div> 
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    Di update pada
                                </div>
                                <div class="col-md-9">
                                    {{$data_produk->updated_at}}
                                </div>   
                            </div>  
                            <div class="row mb-1">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    <a href="/produk/{{$data_produk->id}}/edit" class="btn btn-success btn-sm">Edit data</a>
                                </div>   
                            </div>                                                                                  
                        </div>
                        <div class="col-md-4 btn">
                                asda
                        </div>                                                
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection