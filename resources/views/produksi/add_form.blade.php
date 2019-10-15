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
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Kode Produk</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="produk_code" placeholder="Kode Produk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Produk</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="produk_name" placeholder="Nama Produk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Kategori</label>
                                    <div class="col-lg-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="produk_kat_id" checked value="1">Minuman
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="produk_kat_id" value="2">Makanan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Harga</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="produk_price" type="number" placeholder="Harga Produk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Owner</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="produk_owner" type="text" placeholder="Owner Produk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Deskripsi</label>
                                    <div class="col-lg-9">
                                        <textarea rows="6" name="produk_desc" id="produk_desc" class="form-control d-textarea" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="col-lg-12">
                                <div class="col-sm-10">   
                                    <div class="image-upload" id="image-upload">
                                    
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="row">
                                        <input type=submit class="btn btn-secondary" value="Upload">
                                    </div>
                                    <div class="row" style="margin-top:5px;">
                                        <input type="submit" class="btn btn-primary" value="Save">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection