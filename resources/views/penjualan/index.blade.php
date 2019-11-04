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
                                    <th>#</th>
                                    <th>No. Nota</th>
                                    <th>Customer</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Update Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @if (count($data_faktur)!=0)
                                    @foreach ($data_faktur as $faktur)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$faktur->nota_number}}</td>
                                            <td>{{$faktur->getCustomer()->ctm_name}}</td>
                                            <td>{{"Rp. ".number_format($faktur->order_price).",00"}}</td>
                                            <td>{{$faktur->status_pembayaran}}</td>
                                            <td>
                                                <div class="dt-bt">
                                                    <a class="btn btn-primary btn-xs pd-less" href="/produk/{{$faktur->id}}">
                                                        <i class="lnr lnr-eye"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-xs pd-less" href="/produk/{{$faktur->id}}/edit">
                                                        <i class="lnr lnr-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-xs pd-less" href="/produk/{{$faktur->id}}/delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6">No data Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection