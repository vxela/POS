@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                    <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Penjualan</h3>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-info-circle"></i> {{ session('status') }}
                            </div>
                        @endif
                        <form action="/penjualan/storetemp" method="post">
                            <div class="col-lg-12">
                                <div class="row mb-1">
                                    <div class="col-lg-3">
                                        <strong>
                                            Nama Customer
                                        </strong>
                                    </div>
                                    <div class="col-lg-9">
                                        @csrf
                                        <input type="text" name="customer_name" class="form-control" placeholder="Customer Name">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3">
                                        <strong>
                                            Nama Produk
                                        </strong>
                                    </div>
                                    <div class="col-lg-9">
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
                                    <div class="col-lg-3">
                                        <strong>
                                            Harga Satuan
                                        </strong>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="number" id="produk_price" name="produk_price" class="form-control" placeholder="Harga satuan">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3">
                                        <strong>
                                            Jumlah Produk
                                        </strong>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="number" name="jml_produk" id="jml_produk" value="1" class="form-control" placeholder="Jumlah produk">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3">
                                        <strong>
                                            Harga Total
                                        </strong>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" name="harga_total" id="harga_total" class="form-control" placeholder="Harga total">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-3">
                                        <strong>
                                            Status
                                        </strong>
                                    </div>
                                    <div class="col-lg-9">
                                        dd
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-12">
                                        <button type="reset" class="btn btn-default"> Reset</button>
                                        <button type="submit" class="btn btn-primary"> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-4">
                            @if (session('data_order'))
                                dd($data_order)
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->

            </div>
            <div class="col-lg-6">
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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Harga Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($data_order))
                                                @foreach ($data_order as $order)
                                                <tr>
                                                    <td>{{$order->trans_session}}</td>
                                                    <td>{{$order->getProduk()->product_name}}</td>
                                                    <td>{{$order->jml_barang}}</td>
                                                    <td>{{number_format($order->getProduk()->product_price)}}</td>
                                                    <td>{{number_format($order->order_price)}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    @php
                                        // dd(session()->all());
                                    @endphp
                                </div>
                            </div>

                            {{Session::get('transKey')}}
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