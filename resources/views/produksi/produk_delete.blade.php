@extends('layouts._GdgTempelate')

@section('content')
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Yakin hapus data ?</h3>
                    <div class="right">
                        {{-- <a href="/produksi/tambah" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a> --}}
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
                                        {{$data_produk->category_product_id}}
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
                                        {{$data_produk->user_id}}
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
                            </div>
                            <div class="col-md-4">
                                <form action="{{'/produksi/produk/'.$data_produk->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">I confirm to delete!</button>
                                    <a href="/produksi/produk" class="btn btn-default btn-sm">No, bring me back</a>
                                </form>
                            </div> 
                        {{-- <div class="col-sm-12">
                                <button type="button" class="btn btn-primary btn-sm">I confirm!</button>
                                <button type="button" class="btn btn-primary btn-sm">No, bring me back</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection