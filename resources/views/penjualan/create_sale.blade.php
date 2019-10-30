@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">
                    <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Penjualan</h3>
                    </div>
                    <div class="panel-body">
                        
                        {{-- @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-info-circle"></i> {{ session('status') }}
                            </div>
                        @endif --}}
                        <form action="{{ route('potemp.store') }}" method="post">
                            <div class="col-lg-12">
                                <div class="row mb-1">
                                    <div class="col-lg-3 no_padding">
                                        <strong>
                                            Nama Customer
                                        </strong>
                                    </div>
                                    <div class="col-lg-9 no_padding">
                                        @csrf
                                        @if(session('customer'))
                                            <input type="text" name="customer_name" id="s_customer" class="form-control dropdown" placeholder="Customer Name" autocomplete="off" value="{{Session::get('customer.cust_name')}}" readonly>
                                            <input type="hidden" name="id_customer" value="{{Session::get('customer.cust_id')}}">
                                        @else
                                            <input type="text" name="customer_name" id="s_customer" class="form-control dropdown" placeholder="Customer Name" autocomplete="off">
                                            <input type="hidden" name="id_customer" value="0">
                                        @endif
                                        <div id="cutomerlist" class="dropdown">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3 no_padding">
                                        <strong>
                                            Nama Produk
                                        </strong>
                                    </div>
                                    <div class="col-lg-9 no_padding">
                                        <select class="form-control" name="produk_id" id="produk_id">
                                            @foreach ($data_produk as $produk)
                                            @if($produk->id == 1)
                                                <option value="{{$produk->id}}" data-price="{{$produk->product_price}}" selected>{{$produk->product_name}}</option>                                        
                                            @else
                                                <option value="{{$produk->id}}" data-price="{{$produk->product_price}}">{{$produk->product_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3 no_padding">
                                        <strong>
                                            Harga Satuan
                                        </strong>
                                    </div>
                                    <div class="col-lg-9 no_padding">
                                        <input type="number" id="produk_price" name="produk_price" class="form-control" placeholder="Harga satuan">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3 no_padding">
                                        <strong>
                                            Jumlah Produk
                                        </strong>
                                    </div>
                                    <div class="col-lg-9 no_padding">
                                        <input type="number" name="jml_produk" id="jml_produk" value="1" class="form-control" placeholder="Jumlah produk">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3 no_padding">
                                        <strong>
                                            Harga Total
                                        </strong>
                                    </div>
                                    <div class="col-lg-9 no_padding">
                                        <input type="text" name="harga_total" id="harga_total" class="form-control" placeholder="Harga total">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3 no_padding">
                                        <strong>
                                            Status
                                        </strong>
                                    </div>
                                    <div class="col-lg-9 no_padding">
                                        dd
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6 no_padding">
                                                <button type="reset" class="btn btn-default"> Reset</button>
                                            </div>
                                            <div class="col-lg-6 no_padding text-right">
                                                <div class="row">
                                                    {{-- <button type="button" class="btn btn-primary add_po_item"> Add To Table</button> --}}
                                                    <button type="button" class="btn btn-primary add_po_item"> Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-4">
                            ss
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->

            </div>
            <div class="col-lg-7">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Preorder List</h3>
                    </div>
                    <div class="panel-body">
                        <div id="preorder">
                            {{-- <div class="row">
                                <div class="col-md-6">
                                        CD: TMM2019101201 <br>
                                        Customer : John Doe
                                </div>
                                <div class="col-md-6 text-right">
                                        Date : Kamis 12/10/2019
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Subtotal</th>
                                                    <th>-</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($data_order))
                                                @php
                                                    $total = 0;
                                                @endphp
                                                    @foreach ($data_order as $order)
                                            <form class="trans_form" action="{{'/penjualan/potemp/'.$order->id}}" method="POST">
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$order->getProduk()->product_name}}</td>
                                                            <td width="15%">
                                                                @csrf
                                                                @method('PUT')
                                                                <input class="trans_input" type="number" name="jml_barang" id="jml_barang" value="{{$order->jml_barang}}" step="1">
                                                                {{-- <input type="number" class="trans_input" name="jml_barang" id="jml_barang" value="{{$order->jml_barang}}" step="1"> --}}
                                                            </td>
                                                            <td>{{number_format($order->getProduk()->product_price)}}</td>
                                                            <td>{{number_format($order->order_price)}}</td>
                                                            <td width="10%" style="padding-left:0px">
                                                                <button type="submit" class="btn btn-info btn-xs pd-less-sm"><i class="lnr lnr-pencil"></i></button>
                                                            <button type="button" id="del_preorder_unit" class="btn btn-danger btn-xs pd-less-sm del_preorder_unit" data-id="{{$order->id}}" data-nama_produk="{{$order->getProduk()->product_name}}"><i class="lnr lnr-trash" data-csrf="{{ csrf_token() }}"></i></button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                        @php
                                                        $total = $total+$order->order_price;
                                                    @endphp
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="4">Total</th>
                                                        <th>{{number_format($total)}}</th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>
                                    @php
                                        // dd(Session::all())
                                    @endphp
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('potemp.clear')}}" class="btn btn-default"> Delete</a>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <div class="row">
                                            {{-- <button type="button" class="btn btn-primary add_po_item"> Add To Table</button> --}}
                                            <button type="button" class="btn btn-primary add_po_item"> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{Session::get('transKey')}}
                            {{$total}}
                            <br>
                            sadad
                            aria-hiddenad
                            asda
                            sadad
                            asda
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</div>  
@endsection