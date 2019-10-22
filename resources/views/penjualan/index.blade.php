@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Tabel Penjualan</h3>
                    <div class="right">
                        <a href="{{'/penjualan/create'}}" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a>
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
                                    <th>No. Nota</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Produksi</th>
                                    <th>Tanggal Produksi</th>
                                    <th>Oleh</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = count($data_penjualan);
                                @endphp
                                @foreach ($data_penjualan as $penjualan)
                                <tr>
                                    <td>{{$penjualan->nota_number}}</td>
                                    <td>{{$penjualan->getProduk()->product_name}}</td>
                                    <td>{{$penjualan->product_quantity." ".$penjualan->getProduk()->product_unit}}</td>
                                    <td>{{$penjualan->created_at}}</td>
                                    <td>{{$penjualan->getUser()->name}}</td>
                                    <td>
                                        <div class="dt-bt">
                                            <a class="btn btn-primary btn-xs pd-less" href="/penjualan/{{$penjualan->id}}">
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                            <a class="btn btn-success btn-xs pd-less" href="/penjualan/{{$penjualan->id}}/edit">
                                                <i class="lnr lnr-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-xs pd-less" href="/penjualan/{{$penjualan->id}}/delete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>  
                                @php
                                    $n--;
                                @endphp  
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