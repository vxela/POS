@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
    <div class="col-md-12">
            <!-- PANEL HEADLINE -->
        <div class="panel panel-headline">
            <form action="{{'/penjualan/kirim/order'}}" method="post">
                @csrf
                <div class="panel-heading">
                    <h3 class="panel-title">Setup Pengiriman Data {{Carbon\Carbon::now()->formatLocalized('%A, %d %h %Y')}}</h3>
                    {{-- <div class="right">
                        <a href="{{'/penjualan/create'}}" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a>
                    </div> --}}
                </div>
                <div class="panel-body">
                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-info-circle"></i> {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <table class="table">
                        <thead>
                            <th>
                                Nama
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                Jml Galon
                            </th>
                            <th>
                                Keterangan
                            </th>
                        </thead>
                        <tbody class="dropzone">
                            @php
                            $n =1; 
                            @endphp
                            @foreach ($data_pengiriman as $order)
                                <tr class="dragable">
                                    <td>
                                        {{$order->getCustomer()->name}}
                                    </td>
                                    <td>
                                        {{$order->getCustomer()->address}}
                                    </td>
                                    <td>
                                        {{$order->getPo()->jml_barang}}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- END PANEL HEADLINE -->
    </div> 
</div>  
@endsection