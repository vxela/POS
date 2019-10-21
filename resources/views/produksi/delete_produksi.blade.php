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
                                    ID Produksi
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->id}}
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
                                    Kategori Produk
                                </div>
                                <div class="col-md-9">
                                    {{$data_produksi->activity_date}}
                                </div>   
                            </div>                                                                                  
                        </div>
                        <div class="col-md-4">
                            <form action="{{'/produksi/'.$data_produksi->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">I confirm to delete!</button>
                                <a href="/produk" class="btn btn-default btn-sm">No, bring me back</a>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection