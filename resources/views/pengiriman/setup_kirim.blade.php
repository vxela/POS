@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div>
                                data order
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                left
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                roght
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection