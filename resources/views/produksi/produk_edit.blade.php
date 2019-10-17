@extends('layouts._GdgTempelate')

@section('content')
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Produk {{$data_produk->product_name}}</h3>
                    <div class="right">
                        {{-- <a href="/produksi/tambah" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a> --}}
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                </div>
                <div class="panel-body">
                    <form action="{{'/produksi/produk/'.$data_produk->id}}" method="post">
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Kode Produk
                                    </div>
                                    <div class="col-md-9">
                                        @csrf
                                        <input type="text" name="produk_code" class="form-control" placeholder="text field" value="{{$data_produk->product_code}}" readonly>
                                    </div>   
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Nama Produk
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="produk_name" placeholder="text field" value="{{$data_produk->product_name}}">
                                    </div>   
                                </div>   
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Kategori Produk
                                    </div>
                                    <div class="col-md-9">
                                        @foreach ($data_cat as $cat)
                                            <label class="radio-inline">
                                                <input type="radio" name="produk_kat_id" 
                                                @if($cat->id == $data_produk->category_product_id)
                                                    {{'checked'}}
                                                @endif
                                                value="{{$cat->id}}">{{$cat->category_name}}
                                            </label>
                                        @endforeach
                                    </div>   
                                </div> 
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Harga Produk
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" step="100" name="produk_price" class="form-control" placeholder="text field" value="{{$data_produk->product_price}}">
                                    </div>   
                                </div> 
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Owner Produk
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="produk_owner" class="form-control" placeholder="text field" value="{{$data_produk->product_owner}}">
                                    </div>   
                                </div> 
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Deskripsi Produk
                                    </div>
                                    <div class="col-md-9">
                                        <textarea rows="6" name="produk_desc" id="produk_desc" class="form-control d-textarea" required="">{{$data_produk->product_desc}}
                                        </textarea>
                                    </div>   
                                </div> 
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        Di input oleh
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="text field" value="{{$data_produk->user_id}}" disabled>
                                    </div>   
                                </div>      
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9">
                                        <a href="/produksi/produk" class="btn btn-default btn-sm">Back</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>   
                                </div>                                                                        
                            </div>
                            <div class="col-md-4">
                                    asda
                            </div>                                                
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection