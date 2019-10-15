@extends('layouts._GdgTempelate')

@section('content')
<h3 class="page-title">Tambah Produk</h3>
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Produk</h3>
                </div>
                <div class="panel-body">
                    <div class="">
                        <table id="table_id" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Owner</th>
                                    <th>Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_produk as $produk)
                                <tr>
                                    <td>{{$produk->product_code}}</td>
                                    <td>{{$produk->product_name}}</td>
                                    <td>{{$produk->category_product_id}}</td>
                                    <td>{{$produk->product_price}}</td>
                                    <td>{{$produk->product_owner}}</td>
                                    <td>{{$produk->user_id}}</td>
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