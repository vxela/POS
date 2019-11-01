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
                                            <td>{{$i}}</td>
                                            <td>{{$faktur->nota_number}}</td>
                                            <td>{{$faktur->customer_id}}</td>
                                            <td>{{$faktur->order_price}}</td>
                                            <td>{{$faktur->status_pembayaran}}</td>
                                            <td>{{$faktur->id}}</td>
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