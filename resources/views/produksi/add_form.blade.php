@extends('layouts._GdgTempelate')

@section('content')
<h3 class="page-title">Tambah Produk</h3>
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Produk</h3>
                    @if (session('status'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-info-circle"></i>{{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="{{'/produksi/produk'}}" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Kode Produk</label>
                                    <div class="col-lg-9">
                                        @csrf
                                        <select class="form-control" name="produk_code">
                                            <option value="{{$code_produk[0]}}">{{$code_produk[0]}}</option>
                                            <option value="{{$code_produk[1]}}">{{$code_produk[1]}}</option>
                                        </select>
                                        {{-- <input class="form-control" type="text" name="produk_code" placeholder="Kode Produk"> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Produk</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="produk_name" placeholder="Nama Produk" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Kategori</label>
                                    <div class="col-lg-9">
                                        @foreach ($data_cat as $cat)
                                            <label class="radio-inline">
                                                <input type="radio" name="produk_kat_id"
                                                @if($cat->id == 1)
                                                    {{'checked'}}
                                                @endif
                                                value="{{$cat->id}}">{{$cat->category_name}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Harga</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="produk_price" type="number" placeholder="Harga Produk" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Owner</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="produk_owner" type="text" placeholder="Owner Produk" value="Roxzon">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Deskripsi</label>
                                    <div class="col-lg-9">
                                        <textarea rows="6" name="produk_desc" id="produk_desc" class="form-control d-textarea">Roxzon
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-sm-12">   
                                            <div class="image-upload" id="image-upload">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">   
                                            <input type="file" name="produk_img" style="display:none"/>
                                            <input type="button" class="btn btn-secondary" value="Choose">
                                            <input type="submit" class="btn btn-primary" value="Save">                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection