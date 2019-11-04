@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                    <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Penjualan</h3>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('status') && Session::has('msg'))
                            {{Mush::showNotif(Session::get('status'), Session::get('msg'))}}
                        @endif
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <h5 class="po-head">sdada</h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <div class="row">
                                        sdsa
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->

            </div>
            <div class="col-lg-7">

            </div>
        </div> 
</div>  
@endsection