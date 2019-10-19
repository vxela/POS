@extends('layouts._GdgTempelate')

@section('content')
{{-- <h3 class="page-title">Tambah Produk</h3> --}}
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Produk</h3>
                    <div class="right">
                        <a href="{{'/produksi/create'}}" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-info-circle"></i> {{ session('status') }}
                            </div>
                        @endif
                        <table id="table_id" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Produksi</th>
                                    <th>Tanggal Produksi</th>
                                    <th>Oleh</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_produksi as $produksi)
                                <tr>
                                    <td>{{$produksi->getProduk()->product_name}}</td>
                                    <td>{{$produksi->product_quantity." ".$produksi->getProduk()->product_unit}}</td>
                                    <td>{{$produksi->activity_date}}</td>
                                    <td>{{$produksi->getUser()->name}}</td>
                                    <td>
                                        <div class="dt-bt">
                                            <a class="btn btn-primary btn-xs pd-less" href="/produksi/{{$produksi->id}}">
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                            <a class="btn btn-success btn-xs pd-less" href="/produksi/{{$produksi->id}}/edit">
                                                <i class="lnr lnr-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-xs pd-less" href="/produksi/{{$produksi->id}}/delete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection