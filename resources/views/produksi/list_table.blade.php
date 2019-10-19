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
                        <a href="{{'/produk/create'}}" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a>
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
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Owner</th>
                                    <th>Oleh</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_produk as $produk)
                                <tr>
                                    <td>{{$produk->product_code}}</td>
                                    <td>{{$produk->product_name}}</td>
                                    <td>{{$produk->category()->category_name}}</td>
                                    <td>{{$produk->product_price}}</td>
                                    <td>{{$produk->product_owner}}</td>
                                    <td>{{$produk->getUser()->name}}</td>
                                    <td>
                                        <div class="dt-bt">
                                            <a class="btn btn-primary btn-xs pd-less" href="/produk/{{$produk->id}}">
                                                <i class="lnr lnr-eye"></i>
                                            </a>
                                            <a class="btn btn-success btn-xs pd-less" href="/produk/{{$produk->id}}/edit">
                                                <i class="lnr lnr-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-xs pd-less" href="/produk/{{$produk->id}}/delete">
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